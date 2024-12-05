<?php


use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index');
$routes->get('home/agency/(:num)', 'Home::agency/$1');
$routes->post('reservation/create', 'Reservation::create');
$routes->get('reservation/create', 'Reservation::create');
$routes->get('invoices/(:any)', function ($filename) {
    $path = WRITEPATH . 'invoices/' . $filename;

    if (file_exists($path)) {
        return $this->response->download($path, null);
    } else {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }
});

$routes->get('espaceAdmin', 'Admin::login');
$routes->post('espaceAdmin/authenticate', 'Admin::authenticate');
$routes->get('espaceAdmin/logout', 'Admin::logout');
$routes->get('espaceAdmin/dashboard', 'Admin::dashboard');

$routes->post('espaceAdmin/addAgency', 'Admin::addAgency');
$routes->post('espaceAdmin/editAgency/(:num)', 'Admin::editAgency/$1');
$routes->get('espaceAdmin/deleteAgency/(:num)', 'Admin::deleteAgency/$1');

$routes->post('espaceAdmin/addService', 'Admin::addService');
$routes->post('espaceAdmin/editService/(:num)', 'Admin::editService/$1');
$routes->get('espaceAdmin/deleteService/(:num)', 'Admin::deleteService/$1');





