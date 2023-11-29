<?php

require_once __DIR__ ."/../vendor/autoload.php";

use Attar\App\Rahmatan\Travel\App\Router;
use Attar\App\Rahmatan\Travel\Controller\AgenController;
use Attar\App\Rahmatan\Travel\Controller\ArtikelController;
use Attar\App\Rahmatan\Travel\Controller\CustomerController;
use Attar\App\Rahmatan\Travel\Controller\DashboardController;
use Attar\App\Rahmatan\Travel\Controller\GaleryController;
use Attar\App\Rahmatan\Travel\Controller\HomeController;
use Attar\App\Rahmatan\Travel\Controller\KeberangkatanController;
use Attar\App\Rahmatan\Travel\Controller\LaporanController;
use Attar\App\Rahmatan\Travel\Controller\LoginController;
use Attar\App\Rahmatan\Travel\Controller\PaketController;
use Attar\App\Rahmatan\Travel\Controller\PemesananController;
use Attar\App\Rahmatan\Travel\Controller\Test;
use Attar\App\Rahmatan\Travel\Controller\UserController;
use Attar\App\Rahmatan\Travel\Middleware\AdminMiddleware;
use Attar\App\Rahmatan\Travel\Middleware\ApiMiddleware;
use Attar\App\Rahmatan\Travel\Middleware\AuthMiddleware;

// Router::add("GET","/",Test::class,"index");
// Router::add("GET","/test/([0-9a-zA-Z]*)",Test::class,"test");
Router::add("POST","/addApi", Test::class, "testt", [ApiMiddleware::class]);
// Router::add("POST","/createSesion", Test::class,"createSesion" );
// Router::add("POST","/deleteSesion", Test::class,"deleteSesion");

//ROUTER UNTUK MENANGANI URL DI WEBSITE 
//(SILAHKAN MENGUBAH NGUBAH SESUAI DENGAN BAGIAN MASING BIAR TIDAK BENTROK SAAT DI PUSH)
//TOLONG DIPERHATIKAN
//NOTE ISI PARAMETER ADD(METHOD,BUAT URL,CONTROLLER, METHOD)
//Router untuk menangani login
Router::add("GET","/login",LoginController::class,"index");
Router::add("GET","/register",LoginController::class,"register");
Router::add("POST","/login",LoginController::class,"login");
Router::add("GET","/logout", LoginController::class,"logout");

//Router untuk menangani Homepage
Router::add("GET","/", HomeController::class,"index");
Router::add("GET","/about", HomeController::class,"about");
Router::add("GET","/detail-paket/([0-9a-zA-Z]*)", HomeController::class,"detailPaket");
Router::add("GET","/pemesanan/([0-9a-zA-Z]*)", HomeController::class,"pemesanan");
Router::add("GET","/pembayaran", HomeController::class,"pembayaran");
Router::add("GET","/bukti-transfer/([0-9a-zA-Z]*)", HomeController::class,"buktiTransfer");
Router::add("POST","/tambah-bukti-transfer", PemesananController::class,"saveBuktiTransfer");
Router::add("GET","/paket-umrah", HomeController::class,"paketUmrah");
Router::add("GET","/tambah-jamaah/([0-9a-zA-Z]*)", HomeController::class,"tambahJamaah");
Router::add("POST","/tambah-jamaah-user", CustomerController::class,"tambahCustomerUser");
Router::add("POST","/tambah-cicilan", PemesananController::class,"saveBuktiTransfer");

//Router untuk menangani Customer
Router::add("GET","/profile", HomeController::class,"profile");
Router::add("GET","/pemesanan-user", CustomerController::class,"viewCustomerHome");
Router::add("GET","/tambah-cicilan/([0-9a-zA-Z]*)", CustomerController::class,"viewTambahCicilan");
Router::add("GET","/tambah-jamaah", HomeController::class,"tambahJamaahProfile");
Router::add("GET","/edit-jamaah/([0-9a-zA-Z]*)", CustomerController::class,"editJamaahProfile");
Router::add("GET","/detail-pemesanan/([0-9a-zA-Z]*)", HomeController::class,"viewDetailPemesanan");
Router::add("GET","/cetak-tagihan/([0-9a-zA-Z]*)", HomeController::class,"viewCetakTagihan");
Router::add("GET","/nota-pembayaran/([0-9a-zA-Z]*)", HomeController::class,"viewNotaPembayaran");

//Router untuk menangani Agen
Router::add("GET","/profile-agen", AgenController::class,"viewProfileAgen");
Router::add("GET","/pelanggan-agen", AgenController::class,"viewDataPelanggan");
//Router untuk menangani Dashboard Admin
Router::add("GET","/admin/dashboard", DashboardController::class,"index");

//Router untuk menangani Dashboard Customer
Router::add("GET","/admin/customer", CustomerController::class,"index");
Router::add("GET","/admin/tambah-customer", CustomerController::class,"viewTambah");
Router::add("GET","/admin/edit-customer/([0-9a-zA-Z]*)", CustomerController::class,"viewEditTambah");
Router::add("GET","/admin/detail-customer/([0-9a-zA-Z]*)", CustomerController::class,"viewDetailTambah");
Router::add("POST","/admin/tambah-customer", CustomerController::class,"tambahCustomer");
Router::add("POST","/admin/edit-customer", CustomerController::class,"editCustomer");
Router::add("GET","/admin/hapus-customer/([0-9a-zA-Z]*)", CustomerController::class,"hapusCustomer");

//Router untuk menangani Dashboard Paket
Router::add("GET","/admin/paket", PaketController::class,"index");
Router::add("GET","/admin/tambah-paket", PaketController::class,"viewTambahData");
Router::add("GET","/admin/edit-paket/([0-9a-zA-Z]*)", PaketController::class,"viewEditData");
Router::add("GET","/admin/detail-paket/([0-9a-zA-Z]*)", PaketController::class,"viewDetailData");
Router::add("POST","/admin/tambah-paket", PaketController::class,"tambahPaket");
Router::add("POST","/admin/edit-paket", PaketController::class,"editPaket");
Router::add("GET","/admin/hapus-paket/([0-9a-zA-Z]*)", PaketController::class,"hapusPaket");

//Router untuk menangani Dashboard Pemesanan
Router::add("GET","/admin/pemesanan", PemesananController::class,"index");
Router::add("GET","/admin/detail-pemesanan/([0-9a-zA-Z]*)", PemesananController::class,"viewDetailPemesanan");
Router::add("GET","/admin/verifikasi-pemesanan", PemesananController::class,"viewVerifikasiPembayaran");
Router::add("POST","/pemesanan", PemesananController::class ,"tambahPemesanan");
Router::add("GET","/delete-pemesanan-invalid/([0-9a-zA-Z]*)", PemesananController::class ,"invalidPemesanan");
Router::add("POST","/admin/edit-status-pembayaran", PemesananController::class ,"editStatusPembayaran");

//Router untuk menangani Dashboard Keberangkatan
Router::add("GET","/admin/keberangkatan", KeberangkatanController::class,"index");
Router::add("GET","/admin/detail-keberangkatan/([0-9a-zA-Z]*)", KeberangkatanController::class,"viewDetailData");
Router::add("POST","/admin/tambah-keberangkatan", KeberangkatanController::class,"tambahKeberangkatan");
Router::add("POST","/admin/edit-keberangkatan", KeberangkatanController::class,"editKeberangkatan");
Router::add("GET","/admin/hapus-keberangkatan/([0-9a-zA-Z]*)", KeberangkatanController::class,"hapusKeberangkatan");

//Router untuk menangani Dashboard Agen
Router::add("GET","/admin/agen", AgenController::class,"index");
Router::add("GET","/admin/tambah-agen", AgenController::class,"viewTambahData");
Router::add("GET","/admin/data-sudah-dibayar", AgenController::class,"viewDataAgenSudahDibayar");
Router::add("GET","/admin/data-belum-dibayar", AgenController::class,"viewDataAgenBelumDibayar");
Router::add("POST","/admin/tambah-agen", AgenController::class,"tambahAgen");
Router::add("POST","/admin/tambah-gaji-agen", AgenController::class,"tambahGajiAgen");
Router::add("GET","/check-referal/([0-9a-zA-Z]*)", AgenController::class,"checkReferal");

//Router untuk menangani Dashboard Galery
Router::add("GET","/admin/galery", GaleryController::class,"index");
Router::add("POST","/admin/tambah-galery", GaleryController::class,"tambahGalery");

//Router untuk menangani Dashboard Artikel
Router::add("GET","/admin/artikel", ArtikelController::class,"index");

//Router untuk menangani Dashboard Laporan
Router::add("GET","/admin/laporan", LaporanController::class,"index");

//Router Untuk Menangani API ke MOBILE JANGAN di ubah ubah
//1. api login
Router::add("POST","/apiLogin", LoginController::class,"apiLogin");
Router::add("POST","/apiDeleteToken", LoginController::class,"apiDeleteToken", [ApiMiddleware::class]);
Router::add("POST","/apiGetUser", UserController::class,"apiGetAll");
Router::add("POST","/apiGetToken", LoginController::class,"apiGetToken");
Router::add("POST","/apiRegister", UserController::class,"apiRegister");

//2. api paket
Router::add("GET","/apiPaket", PaketController::class,"apiGetPaket");
Router::add("GET","/apiGetPaket/([0-9a-zA-Z]*)", PaketController::class,"apiGetPaketById");

//3. api keberangkatan
Router::add("GET","/apiGetKeberangkatan", KeberangkatanController::class,'apiGetKeberangkatan');
Router::add("GET","/apiGetKeberangkatan/([0-9a-zA-Z]*)", KeberangkatanController::class,'apiGetKeberangkatanById');
Router::add("GET","/admin/delete-harga/([0-9a-zA-Z]*)/([0-9a-zA-Z]*)", PaketController::class, "deleteHarga");


//4. api customer
Router::add("POST","/apiTambahProfileCustomer", CustomerController::class, 'apiTambahProfileCustomer');
Router::add("GET","/apiGetProfileCustomer/([0-9a-zA-Z]*)", CustomerController::class, 'getApiJamaah');

//5. pemesanan
Router::add('POST','/apiTambahPemesanan', PemesananController::class,'apiTambahPemesanan');

//6. galery
Router::add('GET','/apiGetGalery', GaleryController::class , "apiGetGalery");

//7. artikel
Router::add("GET","/apiGetArtikel", ArtikelController::class,"apiGetArtikel");



Router::add("POST","/testVoley", Test::class, "testVoley");
Router::add("POST","/uploadPasport", Test::class, "uploadPasport");
Router::add("POST","/testFile", Test::class, "testFile");
Router::add("GET","/bukti-pembayaran", Test::class, "buktiBayar");
Router::run();
