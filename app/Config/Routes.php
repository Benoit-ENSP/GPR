<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('hello', 'Hello::index');

// 🔐 Authentification via Google
$routes->get('login', 'LoginController::loginPage');         // Affiche la page avec le bouton Google
$routes->get('login/callback', 'LoginController::login');    // Callback après authent Google
$routes->get('logout', 'LoginController::logout');           // Déconnexion

// 🏠 Page d'accueil après connexion (dashboard admin)
$routes->get('dashboard', 'DashboardController::index');
