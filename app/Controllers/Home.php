<?php

namespace App\Controllers;

use App\Models\AgencyModel;
use App\Models\ServiceModel;

class Home extends BaseController
{
    public function index()
    {
        $agencyModel = new AgencyModel();
    
        // Récupérer le critère de recherche
        $search = $this->request->getGet('search');
    
        // Appliquer le filtre si une recherche est effectuée
        if ($search) {
            $agencyModel->like('name', $search)->orLike('description', $search);
        }
    
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

    // Récupérer le critère de tri depuis la requête GET
    $sortBy = $this->request->getGet('sort_by');

    // Charger les services associés à cette agence
    $query = $serviceModel->where('agency_id', $id);

    // Appliquer les critères de tri
    if ($sortBy === 'alphabetical') {
        $query->orderBy('name', 'ASC'); // Tri alphabétique
    } elseif ($sortBy === 'price') {
        $query->orderBy('price', 'ASC'); // Tri par prix croissant
    } elseif ($sortBy === 'stars') {
        $query->orderBy('stars', 'DESC'); // Tri par étoiles décroissant
    }

    $data['services'] = $query->findAll();
    $data['agency'] = $agency;

    // Passer les données à la vue
    return view('agency', $data);
}

}
