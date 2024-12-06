<?php

namespace App\Controllers;

use App\Models\ReservationModel;
use App\Models\ServiceModel;
use App\Models\AgencyModel;

class Reservation extends BaseController
{
    public function create()
    {
        $reservationModel = new ReservationModel();
        $serviceModel = new ServiceModel();
        $agencyModel = new AgencyModel();

        $data = [
            'service_id' => $this->request->getPost('service_id'),
            'client_name' => $this->request->getPost('name'),
            'client_phone' => $this->request->getPost('phone'),
            'client_email' => $this->request->getPost('email'),
            'reservation_date' => $this->request->getPost('date'),
        ];

        // Sauvegarder la réservation
        $reservationModel->save($data);

        // Récupérer les informations du service et de l'agence
        $service = $serviceModel->find($data['service_id']);
        $agency = $agencyModel->find($service['agency_id']);

        // Générer la facture
        $invoice = "Facture de réservation\n\n";
        $invoice .= "Nom du client: " . $data['client_name'] . "\n";
        $invoice .= "Téléphone: " . $data['client_phone'] . "\n";
        $invoice .= "Email: " . $data['client_email'] . "\n";
        $invoice .= "Date de réservation: " . $data['reservation_date'] . "\n";
        $invoice .= "Nom de l'agence: " . $agency['name'] . "\n";
        $invoice .= "Service réservé: " . $service['name'] . "\n";

        // Créer un nom unique pour la facture
        $invoiceFileName = uniqid() . '.txt';

        // Vérifier si le dossier existe
        if (!is_dir(WRITEPATH . 'invoices')) {
            mkdir(WRITEPATH . 'invoices', 0777, true); // Créer le dossier si nécessaire
        }

        // Enregistrer la facture dans un fichier .txt
        $invoicePath = WRITEPATH . 'invoices/' . $invoiceFileName;
        file_put_contents($invoicePath, $invoice);

        // Passer la facture et le chemin à la vue
        return view('reservation/success', [
            'invoice' => nl2br($invoice), // Facture à afficher à l'écran
            'invoicePath' => base_url('writable/invoices/' . $invoiceFileName) // Lien pour le téléchargement
        ]);
    }
}
