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
$routes->get('/', 'Home');
$routes->get('/lowker', 'ListLowongan');
$routes->post('/lowker/cari', 'ListLowongan::cari');

// Alumni Auth
$routes->get('/alumni', 'Auth_front::login', ['filter' => 'no_filter_alu']);
$routes->get('/alumni/login', 'Auth_front::login', ['filter' => 'no_filter_alu']);
$routes->get('/alumni/register', 'Auth_front::register', ['filter' => 'no_filter_alu']);
$routes->get('/alumni/cekLogin', '/Backend/alumni/auth_alu::login', ['filter' => 'no_filter_alu']);
// Alumni Backend
$routes->get('/alumni/home', 'Backend/Alumni/Home::', ['filter' => 'filter_alu']);
// Menu Profil
$routes->get('/alumni/profil', 'Backend/Alumni/Profil::', ['filter' => 'filter_alu']);
// Menu Data Lowongan
$routes->get('/alumni/lowongan', 'Backend/Alumni/Lowongan::', ['filter' => 'filter_alu']);
// Menu Rekomendasi Lowongan
$routes->get('/alumni/rekomendasi', 'Backend/Alumni/Rekomendasi::', ['filter' => 'filter_alu']);
// Page Hasil Rekomendasi
$routes->get('/alumni/hasil-rekomendasi', 'Backend/Alumni/HasilRekomendasi::', ['filter' => 'filter_alu']);

/* */
/* */

// Admin Auth 
$routes->get('/admin', 'Backend/Admin/Auth_adm::', ['filter' => 'no_filter_adm']);
// Admin Backend
$routes->get('/admin/home', 'Backend/Admin/Home::', ['filter' => 'filter_adm']);
// Menu Jurusan
$routes->get('/admin/jurusan', 'Backend/Admin/Jurusan::', ['filter' => 'filter_adm']);
$routes->get('/admin/jurusan/tambah', 'Backend/Admin/Jurusan::tambah', ['filter' => 'filter_adm']);
$routes->post('/admin/jurusan/add', 'Backend/Admin/Jurusan::add', ['filter' => 'filter_adm']);
$routes->get('/admin/jurusan/ubah/(:num)', 'Backend/Admin/Jurusan::ubah/$1', ['filter' => 'filter_adm']);
// Menu Alumni
$routes->get('/admin/alumni', 'Backend/Admin/Alumni::', ['filter' => 'filter_adm']);
$routes->get('/admin/alumni/delete', 'Backend/Admin/Alumni::delete', ['filter' => 'filter_adm']);
// Menu Kriteria
$routes->get('/admin/kriteria', 'Backend/Admin/Kriteria::', ['filter' => 'filter_adm']);
$routes->get('/admin/kriteria/tambah', 'Backend/Admin/Kriteria::tambah', ['filter' => 'filter_adm']);
$routes->post('/admin/kriteria/add', 'Backend/Admin/Kriteria::add', ['filter' => 'filter_adm']);
$routes->get('/admin/kriteria/delete', 'Backend/Admin/Kriteria::delete', ['filter' => 'filter_adm']);
// Menu Sub Kriteria Lowongan
$routes->get('/admin/sub-kriteria-lowongan', 'Backend/Admin/SubKriteriaLowongan::', ['filter' => 'filter_adm']);
$routes->get('/admin/sub-kriteria-lowongan/tambah', 'Backend/Admin/SubKriteriaLowongan::tambah', ['filter' => 'filter_adm']);
$routes->post('/admin/sub-kriteria-lowongan/add', 'Backend/Admin/SubKriteriaLowongan::add', ['filter' => 'filter_adm']);
$routes->get('/admin/sub-kriteria-lowongan/delete', 'Backend/Admin/SubKriteriaLowongan::delete', ['filter' => 'filter_adm']);
// Menu Sub Kriteria Alumni
$routes->get('/admin/sub-kriteria-alumni', 'Backend/Admin/SubKriteriaAlumni::', ['filter' => 'filter_adm']);
$routes->get('/admin/sub-kriteria-alumni/tambah', 'Backend/Admin/SubKriteriaAlumni::tambah', ['filter' => 'filter_adm']);
$routes->post('/admin/sub-kriteria-alumni/add', 'Backend/Admin/SubKriteriaAlumni::add', ['filter' => 'filter_adm']);
$routes->get('/admin/sub-kriteria-alumni/delete', 'Backend/Admin/SubKriteriaAlumni::delete', ['filter' => 'filter_adm']);
// Menu Data Lowongan
$routes->get('/admin/lowongan', 'Backend/Admin/Lowongan::', ['filter' => 'filter_adm']);
$routes->get('/admin/lowongan/tambah', 'Backend/Admin/Lowongan::tambah', ['filter' => 'filter_adm']);
$routes->post('/admin/lowongan/add', 'Backend/Admin/Lowongan::add', ['filter' => 'filter_adm']);
$routes->get('/admin/lowongan/delete', 'Backend/Admin/Lowongan::delete', ['filter' => 'filter_adm']);


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
