<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->get('/', 'Auth::login');

//custom

// Auth
$routes->get('/', 'Auth::login');

//custom

// Auth
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::register');

// Admin
$routes->get('/pesan', 'MenuAdmin::pesanan');
//$routes->get('/menu', 'Home::menu');
$routes->get('/riwayatpembelian', 'Home::riwayatPembelian');
$routes->get('/user', 'User::menu');
$routes->get('home', 'User::menu');
//$routes->get('/addMenu', 'Home::addMenu');
$routes->get('/addTable', 'Home::addTable');

// User
$routes->get('/menuadmin', 'MenuAdmin::dashboard');
$routes->post('/saveMenu', 'MenuAdmin::saveMenu');
$routes->get('/addMenu', 'MenuAdmin::addMenu');
//$routes->get('/home', 'user::halamanUser');
$routes->get('/pembayaran', 'user::pembayaran');
//$routes->get('/table', 'Home::table');
$routes->get('/deleteMenu/(:num)', 'MenuAdmin::deleteMenu/$1');
$routes->add('/editMenu(:num)', 'MenuAdmin::editMenu/$1');
$routes->post('menuadmin/updatemenu(:num)', 'MenuAdmin::updateMenu/$1');
$routes->get('/awal', 'Home::table');

$routes->get('/table', 'AdminController::manageTables');
$routes->post('/addtable', 'AdminController::addTable');
$routes->get('/addtable', 'AdminController::addTable');
$routes->get('/admin/delete-table/(:num)', 'AdminController::deleteTable/$1');
$routes->get('/admin/activate-table/(:num)', 'AdminController::activateTable/$1');
$routes->get('/admin/deactivate-table/(:num)', 'AdminController::deactivateTable/$1');

$routes->get('/pilihmeja', 'User::selectTable');
$routes->post('/pilihmeja', 'User::placeOrder');

$routes->get('/pilihmenu', 'User::menu');
$routes->post('/uboard', 'User::AddselecteMenu');
$routes->get('/pembayaran', 'User::uboard');
$routes->get('/uboard', 'User::ubayar');
//$routes->post('/user/addToCart', 'User::pembayaran1');
$routes->get('/user/removeFromCart/(:num)', 'User::removeFromCart/$1');
$routes->get('/user/clearCart', 'User::clearCart');
$routes->post('/ubayar', 'User::processPayment');
$routes->get('/viewInvoice', 'User::viewInvoice');
$routes->get('/printStruk', 'User::printStruk');
$routes->get('/cancelOrder', 'User::clearCart');
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
