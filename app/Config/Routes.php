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
$routes->get('/lowker/detail/(:num)', 'ListLowongan::detail/$1');

/* */
/* */

// Alumni Auth
$routes->get('/alumni', 'Auth_front::login::', ['filter' => 'no_filter_adm']);
$routes->get('/alumni/login', 'Auth_front::login', ['filter' => 'no_filter_alu']);
$routes->get('/alumni/register', 'Auth_front::register', ['filter' => 'no_filter_alu']);
$routes->post('/alumni/cekLogin', 'Backend\Alumni\Auth_alu::login', ['filter' => 'no_filter_alu']);
$routes->get('/alumni/logout', 'Backend/Alumni/Auth_alu::logout', ['filter' => 'filter_alu']);

// Alumni Backend
$routes->get('/alumni/home', 'Backend/Alumni/Home::', ['filter' => 'filter_alu']);
// Menu Profil
$routes->get('/alumni/profil', 'Backend/Alumni/Profil::', ['filter' => 'filter_alu']);
$routes->post('/alumni/profil/update/(:num)', 'Backend\Alumni\Profil::update/$1', ['filter' => 'filter_alu']);
// Menu Data Lowongan
$routes->get('/alumni/lowongan', 'Backend/Alumni/Lowongan::', ['filter' => 'filter_alu']);
// Page Detail Lowongan
$routes->get('/alumni/lowongan/detail/(:num)', 'Backend\Alumni\Lowongan::detail/$1', ['filter' => 'filter_alu']);
// Menu Rekomendasi Lowongan
$routes->get('/alumni/rekomendasi', 'Backend/Alumni/Rekomendasi::', ['filter' => 'filter_alu']);
$routes->post('/alumni/rekomendasi/hitung/(:num)', 'Backend\Alumni\Rekomendasi::hitung/$1', ['filter' => 'filter_alu']);
// Page Hasil Rekomendasi
$routes->get('/alumni/hasil-rekomendasi', 'Backend/Alumni/HasilRekomendasi::', ['filter' => 'filter_alu']);
// Page Detail Perhitungan
$routes->get('/alumni/detail-perhitungan', 'Backend/Alumni/Perhitungan::', ['filter' => 'filter_alu']);
// Menu Data Lamaran
$routes->get('/alumni/lamar', 'Backend/Alumni/Lamar::', ['filter' => 'filter_alu']);
// Page Lamar
$routes->get('/alumni/lamar/tambah/(:num)/(:num)', 'Backend\Alumni\Lamar::tambah/$1/$2', ['filter' => 'filter_alu']);
$routes->post('/alumni/lamar/add', 'Backend/Alumni/Lamar::add', ['filter' => 'filter_alu']);
$routes->get('/alumni/lamar/ubah/(:num)', 'Backend\Alumni\Lamar::ubah/$1', ['filter' => 'filter_alu']);
$routes->post('/alumni/lamar/update/(:num)', 'Backend\Alumni\Lamar::update/$1', ['filter' => 'filter_alu']);
$routes->get('/alumni/lamar/delete/(:num)', 'Backend\Alumni\Lamar::delete/$1', ['filter' => 'filter_alu']);
// Page Data Lamaran
$routes->get('/alumni/lamar/download/(:any)', 'Backend\Alumni\Lamar::download/$1', ['filter' => 'filter_alu']);


/* */
/* */

// Admin Auth 
$routes->get('/admin', 'Backend/Admin/Auth_adm::', ['filter' => 'no_filter_adm']);
$routes->get('/admin/login', 'Backend/Admin/Auth_adm::', ['filter' => 'no_filter_adm']);
$routes->post('/admin/cekLogin', 'Backend/Admin/Auth_adm::login', ['filter' =>
'no_filter_alu']);

// Admin Backend
$routes->get('/admin/home', 'Backend/Admin/Home::', ['filter' => 'filter_adm']);
// Menu Jurusan
$routes->get('/admin/jurusan', 'Backend/Admin/Jurusan::', ['filter' => 'filter_adm']);
$routes->get('/admin/jurusan/tambah', 'Backend/Admin/Jurusan::tambah', ['filter' => 'filter_adm']);
$routes->post('/admin/jurusan/add', 'Backend/Admin/Jurusan::add', ['filter' => 'filter_adm']);
$routes->get('/admin/jurusan/ubah/(:num)', 'Backend/Admin/Jurusan::ubah/$1', ['filter' => 'filter_adm']);
// Menu Kriteria
$routes->get('/admin/kriteria', 'Backend/Admin/Kriteria::', ['filter' => 'filter_adm']);
$routes->get('/admin/kriteria/tambah', 'Backend/Admin/Kriteria::tambah', ['filter' => 'filter_adm']);
$routes->post('/admin/kriteria/add', 'Backend/Admin/Kriteria::add', ['filter' => 'filter_adm']);
$routes->get('/admin/kriteria/ubah/(:num)', 'Backend\Admin\Kriteria::ubah/$1', ['filter' => 'filter_adm']);
$routes->post('/admin/kriteria/update/(:num)', 'Backend\Admin\Kriteria::update/$1', ['filter' => 'filter_adm']);
$routes->get('/admin/kriteria/delete/(:num)', 'Backend\Admin\Kriteria::delete/$1', ['filter' => 'filter_adm']);
// Menu Sub Kriteria Lowongan
$routes->get('/admin/sub-kriteria-lowongan', 'Backend/Admin/SubKriteriaLowongan::', ['filter' => 'filter_adm']);
$routes->get('/admin/sub-kriteria-lowongan/tambah', 'Backend/Admin/SubKriteriaLowongan::tambah', ['filter' => 'filter_adm']);
$routes->post('/admin/sub-kriteria-lowongan/add', 'Backend/Admin/SubKriteriaLowongan::add', ['filter' => 'filter_adm']);
$routes->get('/admin/sub-kriteria-lowongan/ubah/(:num)', 'Backend\Admin\SubKriteriaLowongan::ubah/$1', ['filter' => 'filter_adm']);
$routes->post('/admin/sub-kriteria-lowongan/update/(:num)', 'Backend\Admin\SubKriteriaLowongan::update/$1', ['filter' => 'filter_adm']);
$routes->get('/admin/sub-kriteria-lowongan/delete/(:num)', 'Backend\Admin\SubKriteriaLowongan::delete/$1', ['filter' => 'filter_adm']);
$routes->get('/admin/sub-kriteria-lowongan/getsubkategori', '/Backend/Admin/SubKriteriaLowongan::get_subkategori', ['filter' => 'filter_adm']);
// Menu Sub Kriteria Alumni
$routes->get('/admin/sub-kriteria-alumni', 'Backend/Admin/SubKriteriaAlumni::', ['filter' => 'filter_adm']);
$routes->get('/admin/sub-kriteria-alumni/tambah', 'Backend/Admin/SubKriteriaAlumni::tambah', ['filter' => 'filter_adm']);
$routes->post('/admin/sub-kriteria-alumni/add', 'Backend/Admin/SubKriteriaAlumni::add', ['filter' => 'filter_adm']);
$routes->get('/admin/sub-kriteria-alumni/ubah/(:num)', 'Backend\Admin\SubKriteriaAlumni::ubah/$1', ['filter' => 'filter_adm']);
$routes->post('/admin/sub-kriteria-alumni/update/(:num)', 'Backend\Admin\SubKriteriaAlumni::update/$1', ['filter' => 'filter_adm']);
$routes->get('/admin/sub-kriteria-alumni/delete/(:num)', 'Backend\Admin\SubKriteriaAlumni::delete/$1', ['filter' => 'filter_adm']);
// Menu Data Perusahaan
$routes->get('/admin/perusahaan', 'Backend/Admin/Perusahaan::', ['filter' => 'filter_adm']);
$routes->get('/admin/perusahaan/delete/(:num)', 'Backend\Admin\Perusahaan::delete/$1', ['filter' => 'filter_adm']);
// Menu Alumni
$routes->get('/admin/alumni', 'Backend/Admin/Alumni::', ['filter' => 'filter_adm']);
$routes->get('/admin/alumni/delete/(:num)', 'Backend\Admin\Alumni::delete/$1', ['filter' => 'filter_adm']);

/* */
/* */

// Perusahaan Auth
$routes->get('/perusahaan', 'Backend/Perusahaan/Auth_prshn::', ['filter' => 'no_filter_prshn']);
$routes->get('/perusahaan/login', 'Backend/Perusahaan/Auth_prshn::', ['filter' => 'no_filter_prshn']);
$routes->get('/perusahaan/register', 'Backend/Perusahaan/Auth_prshn::daftar', ['filter' => 'no_filter_prshn']);
$routes->post('/perusahaan/cekLogin', 'Backend\Perusahaan\Auth_prshn::login', ['filter' => 'no_filter_prshn']);
$routes->get('/perusahaan/logout', 'Backend/Perusahaan/Auth_prshn::logout', ['filter' => 'filter_alu']);

// Perusahaan Backend
$routes->get('/perusahaan/home', 'Backend/Perusahaan/Home::', ['filter' => 'filter_prshn']);
// Menu Profil
$routes->get('/perusahaan/profil', 'Backend/Perusahaan/Profil::', ['filter' => 'filter_prshn']);
$routes->post('/perusahaan/profil/update/(:num)', 'Backend\Perusahaan\Profil::update/$1', ['filter' => 'filter_alu']);
// Menu Lowongan
$routes->get('/perusahaan/lowongan', 'Backend/Perusahaan/Lowongan::', ['filter' => 'filter_prshn']);
$routes->get('/perusahaan/lowongan/tambah', 'Backend/Perusahaan/Lowongan::tambah', ['filter' => 'filter_prshn']);
$routes->post('/perusahaan/lowongan/add', 'Backend/Perusahaan/Lowongan::add', ['filter' => 'filter_prshn']);
$routes->get('/perusahaan/lowongan/ubah/(:num)', 'Backend\Perusahaan\Lowongan::ubah/$1', ['filter' => 'filter_prshn']);
$routes->post('/perusahaan/lowongan/update/(:num)', 'Backend\Perusahaan\Lowongan::update/$1', ['filter' => 'filter_prshn']);
$routes->get('/perusahaan/lowongan/delete/(:num)', 'Backend\Perusahaan\Lowongan::delete/$1', ['filter' => 'filter_prshn']);
// Menu Pelamar
$routes->get('/perusahaan/pelamar', 'Backend/Perusahaan/Pelamar::', ['filter' => 'filter_prshn']);
$routes->get('/perusahaan/pelamar/catatan/(:num)/(:num)/(:num)', 'Backend\Perusahaan\Pelamar::catatan/$1/$2/$3', ['filter' => 'filter_prshn']);
$routes->post('/perusahaan/pelamar/catatan/update/(:num)/(:num)', 'Backend\Perusahaan\Pelamar::update/$1/$2', ['filter' => 'filter_prshn']);
$routes->get('/perusahaan/pelamar/setuju/(:num)/(:num)', 'Backend\Perusahaan\Pelamar::setuju/$1/$2', ['filter' => 'filter_prshn']);
$routes->get('/perusahaan/pelamar/tolak/(:num)/(:num)', 'Backend\Perusahaan\Pelamar::tolak/$1/$2', ['filter' => 'filter_prshn']);
$routes->get('/perusahaan/pelamar/download/(:any)', 'Backend\Perusahaan\Pelamar::download/$1', ['filter' => 'filter_alu']);

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
