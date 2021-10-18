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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'auth/Login::index');
$routes->get('/login', 'auth/Login::index');
$routes->get('/logout', 'auth/Login::logout');
$routes->get('/dashboard', 'Page::dashboard');
$routes->get('/lembaga', 'profil/Lembaga::index');
$routes->get('/jabatan', 'master/Jabatan::index');

$routes->get('/penyuluhpns', 'Penyuluh/PenyuluhPns::penyuluhpns');
$routes->get('/penyuluhcpns', 'Penyuluh/PenyuluhCpns::penyuluhcpns');
$routes->get('/penyuluhthlapbn', 'Penyuluh/PenyuluhTHLAPBN::penyuluhthlAPBN');
$routes->get('/penyuluhthlapbd', 'Penyuluh/PenyuluhTHLAPBD::penyuluhthlAPBD');
$routes->get('/penyuluhswadaya', 'Penyuluh/PenyuluhSwadaya::penyuluhswadaya');
$routes->get('/penyuluhswasta', 'Penyuluh/PenyuluhSwasta::penyuluhswasta');
$routes->get('/penyuluhpppk', 'Penyuluh/PenyuluhPPPK::penyuluhpppk');
$routes->get('/penyuluhswadayakec', 'Penyuluh/PenyuluhSwadayaKec::penyuluhswadayakec');
$routes->get('/penyuluhthlapbnkec', 'Penyuluh/PenyuluhTHLAPBNKec::penyuluhthlAPBNkec');
$routes->get('/penyuluhthlapbdkec', 'Penyuluh/PenyuluhTHLAPBDKec::penyuluhthlAPBDkec');
$routes->get('/penyuluhswastakec', 'Penyuluh/PenyuluhSwastaKec::penyuluhswastakec');
$routes->get('/penyuluhpnskec', 'Penyuluh/PenyuluhPNSKec::penyuluhpnskec');
$routes->get('/penyuluhpppkkec', 'Penyuluh/PenyuluhPPPKKec::penyuluhpppkkec');

//$routes->get('profil/penyuluh/detail/(:any)', 'penyuluh::detail/$1');

//KelembagaanPelakuUtamaRoutes

$routes->get('/gapoktan', 'KelembagaanPelakuUtama/Gapoktan/Gapoktan::gapoktan');
$routes->get('/listgapoktan', 'KelembagaanPelakuUtama/Gapoktan/ListGapoktan::listgapoktan');
$routes->get('/listgapoktandesa', 'KelembagaanPelakuUtama/Gapoktan/ListGapoktanDesa::listgapoktandesa');

$routes->post('/listgapoktan/save', 'KelembagaanPelakuUtama/Gapoktan/ListGapoktan::save');


$routes->get('/gapoktanbersama', 'KelembagaanPelakuUtama/GapoktanBersama/GapoktanBersama::gapoktanbersama');

$routes->get('/kelembagaanekonomipetani', 'KelembagaanPelakuUtama/KelembagaanEkonomiPetani\KelembagaanEkonomiPetani::kelembagaanekonomipetani');
$routes->get('/listkep', 'KelembagaanPelakuUtama/KelembagaanEkonomiPetani/ListKEP::listkep');

$routes->get('/kelompoktani', 'KelembagaanPelakuUtama/KelompokTani/KelompokTani::kelompoktani');
$routes->get('/kelompoktanikec', 'KelembagaanPelakuUtama/KelompokTani/KelompokTaniKec::kelompoktanikec');
$routes->get('/listpoktan', 'KelembagaanPelakuUtama/KelompokTani/ListPokTan::listpoktan');
$routes->get('/listpoktananggota', 'KelembagaanPelakuUtama/KelompokTani/ListPoktanAnggota::listpoktananggota');

$routes->get('/tambahkelompoktani', 'KelembagaanPelakuUtama/KelompokTani/TambahKelompokTani::tambahkelompoktani');
$routes->post('/listpoktan/save', 'KelembagaanPelakuUtama/Gapoktan/ListGapoktan::save');


$routes->get('/kelembagaanpetanilainnya', 'KelembagaanPelakuUtama/KelembagaanPetaniLainnya/KelembagaanPetaniLainnya::kelembagaanpetanilainnya');
$routes->get('/listkep2l', 'KelembagaanPelakuUtama/KelembagaanPetaniLainnya/ListKEP2L::listkep2l');

$routes->get('/desa', 'KelembagaanPenyuluhan/Desa/Desa::desa');
$routes->get('/daftar_posluhdes', 'KelembagaanPenyuluhan/Desa/Desa::listdesa');
$routes->get('/kabupaten_kota', 'KelembagaanPenyuluhan/Kabupaten/Kabupaten::kab');
$routes->get('/kecamatan', 'KelembagaanPenyuluhan/Kecamatan/Kecamatan::kecamatan');
$routes->get('/kecamatankec', 'KelembagaanPenyuluhan/Kecamatan/KecamatanKec::kecamatan');
$routes->get('/desakec', 'KelembagaanPenyuluhan/Desa/DesaKec::Desa');
$routes->get('/daftar_posluhdes_kec', 'KelembagaanPenyuluhan/Desa/DesaKec::listdesa');
//$routes->get('/add_pos', 'KelembagaanPenyuluhan/Desa/Desa::add_pos');
$routes->delete('/daftar_posluhdes/(:num)', 'KelembagaanPenyuluhan/Desa/Desa::delete/$1');
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