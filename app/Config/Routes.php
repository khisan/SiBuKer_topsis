<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// Alumni Auth
$routes->get('/alumni/login', 'Auth_front::login', ['filter' => 'no_filter_alu']);
$routes->get('/alumni/register', 'Auth_front::register', ['filter' => 'no_filter_alu']);
$routes->get('/alumni/cekLogin', '/Backend/alumni/auth_alu::login', ['filter' => 'no_filter_alu']);

// Alumni Backend
$routes->get('/alumni/home', 'Backend/Alumni/Home::', ['filter' => 'filter_alu']);
$routes->get('/alumni/profil', 'Backend/Alumni/Profil::', ['filter' => 'filter_alu']);

// Admin Auth 
$routes->get('/admin/login', 'Backend/Admin/Auth_adm::', ['filter' => 'no_filter_adm']);
$routes->get('/admin/home', 'Backend/Admin/Home::', ['filter' => 'filter_adm']);

// Admin Backend
$routes->get('/admin/home', 'Backend/Admin/Home::', ['filter' => 'filter_adm']);
$routes->get('/admin/jurusan', 'Backend/Admin/Jurusan::', ['filter' => 'filter_adm']);
$routes->get('/admin/jurusan/tambah', 'Backend/Admin/Jurusan::tambah', ['filter' => 'filter_adm']);
$routes->post('/admin/jurusan/add', 'Backend/Admin/Jurusan::add', ['filter' => 'filter_adm']);

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
