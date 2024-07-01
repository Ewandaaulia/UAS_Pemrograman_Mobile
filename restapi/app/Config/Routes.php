<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
//Restapi bendahara
$routes->get('bayar', 'BayarController::index');
$routes->post('bayar', 'BayarController::create');
$routes->put('bayar/(:num)', 'BayarController::update/$1');
$routes->delete('bayar/(:num)', 'BayarController::delete/$1');

//Restapi kepsek
$routes->get('kepsek', 'KepsekController::index');

//Restapi siswa
$routes->get('siswa/(:num)','SiswaController::show/$1');

//Restapi walimurid
$routes->get('walimurid/(:num)','WalimuridController::show/$1');