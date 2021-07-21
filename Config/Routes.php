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
$routes->setDefaultController('dashboardController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'LoginController::index');
$routes->get('post','dashboardController::index');
$routes->get('kategori-cuti', 'KategoriCutiController::index',['filter' => 'auth']);

$routes->match(['get', 'post'], 'kategori-cuti-create', 'KategoriCutiController::create');

$routes->match(['get', 'post'], 'kategori-cuti-edit-(:segment)',
	'KategoriCutiController::edit/$1');

$routes->get('kategori-cuti-hapus-(:segment)', 'KategoriCutiController::hapus/$1');

//log reimburse
$routes->get('log-reimburse', 'LogReimburseController::index');

$routes->match(['get', 'post'], 'log-reimburse-create', 'LogReimburseController::create');

$routes->match(['get', 'post'], 'log-reimburse-edit-(:segment)',
	'LogReimburseController::edit/$1');

$routes->get('log-reimburse-hapus-(:segment)', 'LogReimburseController::hapus/$1');

//log datang pulang
$routes->get('log-datang-pulang', 'LogDatangPulangController::index');

$routes->match(['get', 'post'], 'log-datang-pulang-create', 'LogDatangPulangController::create');

$routes->match(['get', 'post'], 'log-datang-pulang-edit-(:segment)',
	'LogDatangPulangController::edit/$1');

$routes->get('log-datang-pulang-hapus-(:segment)', 'LogDatangPulangController::hapus/$1');

//log pekerjaan
$routes->get('log-pekerjaan', 'logPekerjaancontroller::index');

$routes->match(['get', 'post'], 'log-pekerjaan-create', 'logPekerjaancontroller::create');

$routes->match(['get', 'post'], 'log-pekerjaan-edit-(:segment)',
	'logPekerjaancontroller::edit/$1');

$routes->get('log-pekerjaan-hapus-(:segment)', 'logPekerjaancontroller::hapus/$1');

//laporan log pekerjaan
$routes->get('laporan-log-pekerjaan', 'LaporanLogPekerjaanController::index');

$routes->match(['get', 'post'], 'laporan-log-pekerjaan-create', 'LaporanLogPekerjaanController::create');

$routes->match(['get', 'post'], 'laporan-log-pekerjaan-edit-(:segment)',
	'LaporanLogPekerjaanController::edit/$1');

$routes->get('laporan-log-pekerjaan-hapus-(:segment)', 'LaporanLogPekerjaanController::hapus/$1');


//presensi
$routes->get('/', 'dashboardController::index');
$routes->get('presensi-data', 'PresensiDataController::index',['filter' => 'auth']);

$routes->match(['get', 'post'], 'presensi-data-create', 'PresensiDataController::create');

$routes->match(['get', 'post'], 'presensi-data-edit-(:segment)','PresensiDataController::edit/$1');

$routes->get('presensi-data-hapus-(:segment)', 'PresensiDataController::hapus/$1');


// Controller For  User 
$routes->get('/', 'dashboardController::index');
$routes->get('user', 'UserController::index',['filter' => 'auth']);

$routes->match(['get', 'post'], 'user-create', 'UserController::create');

$routes->match(['get', 'post'], 'user-edit-(:segment)',
	'UserController::edit/$1');

$routes->get('user-hapus-(:segment)', 'UserController::hapus/$1');

//For Category
$routes->get('/', 'dashboardController::index');
$routes->get('category', 'CategoryController::index',['filter' => 'auth']);

$routes->match(['get', 'post'], 'category-create', 'CategoryController::create');

$routes->match(['get', 'post'], 'category-edit-(:segment)',
	'CategoryController::edit/$1');

$routes->get('category-hapus-(:segment)', 'CategoryController::hapus/$1');


//This For Profile
$routes->get('/', 'dashboardController::index');
$routes->get('edit-profile', 'profilController::index',['filter' => 'auth']);
$routes->match(['get', 'post'], 'edit-profile-edit-(:segment)',
	'profilController::edit/$1');

	//For Dashboard
$routes->get('/', 'dashboardController::index');
// $routes->get('post', 'dashboarController::index',['filter' => 'auth']);
$routes->get('post', 'dashboarController::kategoricuti',['filter' => 'auth']);

//laporan cuti
$routes->get('/', 'dashboardController::index');
$routes->get('laporan-cuti', 'LaporanCutiController::index',['filter' => 'auth']);

//laporan presensi
$routes->get('/', 'dashboardController::index');
$routes->get('laporan-presensi', 'LaporanPresensiController::index',['filter' => 'auth']);

//calendar
$routes->get('/', 'dashboardController::index');
$routes->get('calendar', 'CalendarController::index',['filter' => 'auth']);
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
