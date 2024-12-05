<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\AgencyModel;
use App\Models\ServiceModel;
use App\Models\ReservationModel;

class Admin extends BaseController
{
    public function login()
    {
        return view('admin/login');
    }

    public function authenticate()
    {
        $adminModel = new AdminModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $adminModel->where('username', $username)->first();

        if ($admin && $password === $admin['password']) {
            session()->set(['isLoggedIn' => true, 'username' => $username]);
            return redirect()->to('espaceAdmin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Nom d\'utilisateur ou mot de passe incorrect');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('espaceAdmin');
    }

    public function dashboard()
    {
        $agencyModel = new AgencyModel();
        $serviceModel = new ServiceModel();
        $reservationModel = new ReservationModel();

        $data = [
            'agencies' => $agencyModel->findAll(),
            'services' => $serviceModel->findAll(),
            'reservations' => $reservationModel->findAll(),
            'username' => session()->get('username'),
        ];

        return view('admin/dashboard', $data);
    }

   // CRUD for Agencies
   public function agencyDetails($id)
{
    $agencyModel = new AgencyModel();
    $serviceModel = new ServiceModel();

    $agency = $agencyModel->find($id);
    $services = $serviceModel->where('agency_id', $id)->findAll();

    return view('admin/agency_details', [
        'agency' => $agency,
        'services' => $services
    ]);
}

public function addAgency()
{
    $agencyModel = new AgencyModel();
    $data = [
        'name' => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
    ];
    $agencyModel->save($data);
    return redirect()->to('espaceAdmin/dashboard')->with('success', 'Agence ajoutée avec succès.');
}

public function editAgency($id)
{
    $agencyModel = new AgencyModel();
    $data = [
        'name' => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
    ];
    $agencyModel->update($id, $data);
    return redirect()->to('espaceAdmin/dashboard')->with('success', 'Agence modifiée avec succès.');
}

public function deleteAgency($id)
{
    $agencyModel = new AgencyModel();
    $agencyModel->delete($id);
    return redirect()->to('espaceAdmin/dashboard')->with('success', 'Agence supprimée avec succès.');
}

// CRUD for Services
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
    return redirect()->to('espaceAdmin/dashboard')->with('success', 'Service ajouté avec succès.');
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
    return redirect()->to('espaceAdmin/dashboard')->with('success', 'Service modifié avec succès.');
}

public function deleteService($id)
{
    $serviceModel = new ServiceModel();
    $serviceModel->delete($id);
    return redirect()->to('espaceAdmin/dashboard')->with('success', 'Service supprimé avec succès.');
}

}
