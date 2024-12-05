<?php

namespace App\Controllers;

use App\Models\ReservationModel;
use App\Models\ServiceModel;
use App\Models\AgencyModel;
use Dompdf\Dompdf;
use Dompdf\Options;

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

        // Générer le contenu de la facture
        $invoice = "
            <h2 style='text-align: center;'>Facture de Réservation</h2>
            <p><strong>Nom du client :</strong> {$data['client_name']}</p>
            <p><strong>Téléphone :</strong> {$data['client_phone']}</p>
            <p><strong>Email :</strong> {$data['client_email']}</p>
            <p><strong>Date de réservation :</strong> {$data['reservation_date']}</p>
            <p><strong>Agence :</strong> {$agency['name']}</p>
            <p><strong>Service réservé :</strong> {$service['name']}</p>
        ";

        // Générer le PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($invoice);

        // Options du PDF
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Chemin du fichier PDF
        $pdfFileName = uniqid() . '.pdf';
        $pdfFilePath = WRITEPATH . 'invoices/' . $pdfFileName;

        // Sauvegarder le PDF sur le serveur
        file_put_contents($pdfFilePath, $dompdf->output());

        // Passer le contenu de la facture et le chemin du PDF à la vue
        return view('reservation/success', [
            'invoice' => $invoice, // Facture à afficher à l'écran
            'pdfPath' => base_url('writable/invoices/' . $pdfFileName) // Lien pour le téléchargement
        ]);
    }
}
