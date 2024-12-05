<?php

namespace App\Controllers;

use App\Models\AgencyModel;
use App\Models\ServiceModel;
use App\Models\ReservationModel;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $agencyModel = new AgencyModel();
        $serviceModel = new ServiceModel();
        $reservationModel = new ReservationModel();

        $data = [
            'agencies' => $agencyModel->findAll(),
            'services' => $serviceModel->findAll(),
            'reservations' => $reservationModel->findAll(),
        ];

        return view('admin/dashboard', $data);
    }

    public function addAgency()
    {
        $agencyModel = new AgencyModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];
        $agencyModel->save($data);
        return redirect()->to('espaceAdmin/dashboard');
    }

    public function editAgency($id)
    {
        $agencyModel = new AgencyModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ];
        $agencyModel->update($id, $data);
        return redirect()->to('espaceAdmin/dashboard');
    }

    public function deleteAgency($id)
    {
        $agencyModel = new AgencyModel();
        $agencyModel->delete($id);
        return redirect()->to('espaceAdmin/dashboard');
    }

    public function addService()
    {
        $serviceModel = new ServiceModel();
        $data = [
            'agency_id' => $this->request->getPost('agency_id'),
            'type' => $this->request->getPost('type'),
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stars' => $this->request->getPost('stars'),
        ];
        $serviceModel->save($data);
        return redirect()->to('espaceAdmin/dashboard');
    }

    public function editService($id)
    {
        $serviceModel = new ServiceModel();
        $data = [
            'agency_id' => $this->request->getPost('agency_id'),
            'type' => $this->request->getPost('type'),
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price'),
            'stars' => $this->request->getPost('stars'),
        ];
        $serviceModel->update($id, $data);
        return redirect()->to('espaceAdmin/dashboard');
    }

    public function deleteService($id)
    {
        $serviceModel = new ServiceModel();
        $serviceModel->delete($id);
        return redirect()->to('espaceAdmin/dashboard');
    }
}
