<?php

namespace App\Controllers;

use App\Models\AgencyModel;
use App\Models\ServiceModel;

class Home extends BaseController
{
    public function index()
    {
        $agencyModel = new AgencyModel();
        $data['agencies'] = $agencyModel->findAll();
        return view('home', $data);
    }

    public function agency($id)
{
    $serviceModel = new ServiceModel();
    $agencyModel = new AgencyModel();

    // Vérifier si l'agence existe
    $agency = $agencyModel->find($id);
    if (!$agency) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Agence non trouvée');
    }

    // Charger les services associés à cette agence
    $data['services'] = $serviceModel->where('agency_id', $id)->findAll();

    // Passer les données à la vue
    return view('agency', $data);
}

}
