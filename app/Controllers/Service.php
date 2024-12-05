<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\ReservationModel;

class Service extends BaseController
{
    public function index($id)
    {
        $serviceModel = new ServiceModel();
        $data['service'] = $serviceModel->find($id);
        return view('service', $data);
    }

    public function reserve()
    {
        $reservationModel = new ReservationModel();

        if ($this->request->getMethod() === 'post') {
            $data = [
                'service_id' => $this->request->getPost('service_id'),
                'client_name' => $this->request->getPost('client_name'),
                'client_phone' => $this->request->getPost('client_phone'),
                'client_email' => $this->request->getPost('client_email'),
                'reservation_date' => $this->request->getPost('reservation_date'),
            ];

            if ($reservationModel->insert($data)) {
                return $this->response->setJSON(['success' => true, 'message' => 'Réservation effectuée avec succès']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Erreur lors de la réservation']);
            }
        }

        return $this->response->setJSON(['success' => false, 'message' => 'Méthode non autorisée']);
    }
}