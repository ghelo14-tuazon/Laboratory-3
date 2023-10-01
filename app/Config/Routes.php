<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/test', 'MainController::test');
$routes->get('/create', 'MainController::create');
$routes->post('/create/save', 'MainController::save');
$routes->get('/delete/(:any)', 'MainController::delete/$1');
$routes->get('/update/(:any)', 'MainController::update/$1'); 
$routes->post('/update/save', 'MainController::saveUpdate'); 
$routes->get('/add-category', 'MainController::addCategory');
$routes->post('/save-category', 'MainController::saveCategory');
$routes->get('student/(:num)', 'MainController::show/$1');
// Define a route to handle registration
$routes->get('register', 'MainController::register');
$routes->post('register', 'MainController::register');
$routes->get('login', 'MainController::login');
$routes->post('login', 'MainController::login');
$routes->get('logout', 'MainController::logout');
$routes->get('index', 'MainController::index');
// app/Config/Routes.php

$routes->get('userregister', 'MainController::userregister'); // For registration form
$routes->post('userregister', 'MainController::userregister'); // For registration form submission

$routes->get('userlogin', 'MainController::userlogin'); // For login form
$routes->post('userlogin', 'MainController::userlogin'); // For login form submission
$routes->get('userlogout', 'MainController::userlogout');
// File: app/Config/Routes.php
$routes->get('products', 'MainController::displayProducts');
// 'index' is the controller method



$routes->get('view-product/(:num)', 'MainController::viewProduct/$1');
















