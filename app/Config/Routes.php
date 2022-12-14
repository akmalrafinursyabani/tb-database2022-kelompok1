<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('transaction', 'TransactionController::index');

// Items
$routes->get('items', 'ItemController::index');
$routes->match(['get', 'post'], '/items/create', 'ItemController::create');
$routes->match(['get', 'post'], '/items/(:segment)/update', 'ItemController::update/$1');
$routes->get('items/(:segment)/delete', 'ItemController::delete/$1');

// Transactions
$routes->get('transaction', 'TransactionController::index');
$routes->match(['get', 'post'], '/transaction/create', 'TransactionController::create');
$routes->get('transaction/(:segment)/delete', 'TransactionController::delete/$1');

// Cashier
$routes->get('cashier', 'CashierController::index');
$routes->match(['get', 'post'], '/cashier/create', 'CashierController::create');
$routes->match(['get', 'post'], '/cashier/(:segment)/update', 'CashierController::update/$1');
$routes->get('cashier/(:segment)/delete', 'CashierController::delete/$1');

// Customer
$routes->get('customer', 'CustomerController::index');
$routes->match(['get', 'post'], '/customer/create', 'CustomerController::create');
$routes->match(['get', 'post'], '/customer/(:segment)/update', 'CustomerController::update/$1');
$routes->get('customer/(:segment)/delete', 'CustomerController::delete/$1');

service('auth')->routes($routes);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
