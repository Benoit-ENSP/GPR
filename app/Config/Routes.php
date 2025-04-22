<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/test-db', 'TestDB::index');

// Route pour les matériels
$routes->get('/materiel', 'MaterielController::index');
$routes->get('/materiel-test', 'MaterielController::test');
$routes->get('/materiel/(:num)', 'MaterielController::detail/$1');

// Route pour créer un matériel
$routes->post('/materiel/create', 'MaterielController::create');


// Route pour les lots
$routes->get('/lots', 'LotController::index');
$routes->get('/lots/(:num)', 'LotController::detail/$1');

//route pour les réservations
$routes->get('/reservations', 'ReservationController::index');

// Route pour les membres
$routes->get('/membres', 'MembreController::index');

