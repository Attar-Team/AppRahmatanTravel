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
use Attar\App\Rahmatan\Travel\Middleware\AgenMiddleWare;
use Attar\App\Rahmatan\Travel\Middleware\ApiMiddleware;
use Attar\App\Rahmatan\Travel\Middleware\AuthMiddleware;
use Attar\App\Rahmatan\Travel\Middleware\CustomerMiddleware;

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
Router::add("POST","/register", LoginController::class,"saveRegister");
Router::add("GET","/logout", LoginController::class,"logout");
Router::add("GET","/verivikasi-lupa-password", LoginController::class,"viewVerivikasiPassword");
Router::add("GET","/ganti-password", LoginController::class,"viewGantiPassword");
Router::add("POST","/ganti-password", LoginController::class,"gantiPassword");
Router::add("POST","/verivikasi-lupa-password", LoginController::class,"cekVerivikasiPassword");

//Router untuk menangani Homepage
Router::add("GET","/", HomeController::class,"index");
Router::add("GET","/about", HomeController::class,"about");
Router::add("GET","/galery", HomeController::class,"galery");
Router::add("GET","/artikel", HomeController::class,"artikel");
Router::add("GET","/detail-artikel/([0-9a-zA-Z]*)", HomeController::class,"detailArtikel");
Router::add("GET","/detail-paket/([0-9a-zA-Z]*)", HomeController::class,"detailPaket");
Router::add("GET","/pemesanan/([0-9a-zA-Z]*)", HomeController::class,"pemesanan",[AuthMiddleware::class,CustomerMiddleware::class]);
Router::add("GET","/pembayaran", HomeController::class,"pembayaran");
Router::add("GET","/bukti-transfer/([0-9a-zA-Z]*)", HomeController::class,"buktiTransfer",[AuthMiddleware::class,CustomerMiddleware::class]);
Router::add("POST","/tambah-bukti-transfer", PemesananController::class,"saveBuktiTransfer",[AuthMiddleware::class,CustomerMiddleware::class]);
Router::add("GET","/paket-travel", HomeController::class,"paketTravel");
Router::add("POST","/search-paket", HomeController::class,"searchPaket");
Router::add("GET","/tambah-jamaah/([0-9a-zA-Z]*)", HomeController::class,"tambahJamaah",[AuthMiddleware::class,CustomerMiddleware::class]);
Router::add("POST","/tambah-jamaah-user", CustomerController::class,"tambahCustomerUser",[AuthMiddleware::class,CustomerMiddleware::class]);
Router::add("POST","/tambah-cicilan", PemesananController::class,"saveBuktiTransfer",[AuthMiddleware::class,CustomerMiddleware::class]);

//Router untuk menangani Customer
Router::add("GET","/profile", HomeController::class,"profile",[AuthMiddleware::class,CustomerMiddleware::class]);
Router::add("GET","/pemesanan-user", CustomerController::class,"viewCustomerHome",[AuthMiddleware::class,CustomerMiddleware::class]);
Router::add("GET","/tambah-cicilan/([0-9a-zA-Z]*)", CustomerController::class,"viewTambahCicilan",[AuthMiddleware::class,CustomerMiddleware::class]);
Router::add("GET","/tambah-jamaah", HomeController::class,"tambahJamaahProfile",[AuthMiddleware::class,CustomerMiddleware::class]);
Router::add("GET","/edit-jamaah/([0-9a-zA-Z]*)", CustomerController::class,"editJamaahProfile",[AuthMiddleware::class,CustomerMiddleware::class]);
Router::add("GET","/detail-pemesanan/([0-9a-zA-Z]*)", HomeController::class,"viewDetailPemesanan",[AuthMiddleware::class,CustomerMiddleware::class]);
Router::add("GET","/cetak-tagihan/([0-9a-zA-Z]*)", HomeController::class,"viewCetakTagihan",[AuthMiddleware::class,CustomerMiddleware::class]);
Router::add("GET","/nota-pembayaran/([0-9a-zA-Z]*)", HomeController::class,"viewNotaPembayaran",[AuthMiddleware::class,CustomerMiddleware::class]);

//Router untuk menangani home Agen
Router::add("GET","/profile-agen", AgenController::class,"viewProfileAgen",[AuthMiddleware::class,AgenMiddleWare::class]);
Router::add("GET","/pelanggan-agen", AgenController::class,"viewDataPelanggan",[AuthMiddleware::class,AgenMiddleWare::class]);
//Router untuk menangani Dashboard Admin
Router::add("GET","/admin/dashboard", DashboardController::class,"index",[AuthMiddleware::class,AdminMiddleware::class]);

//Router untuk menangani Dashboard Customer
Router::add("GET","/admin/customer", CustomerController::class,"index",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/tambah-customer", CustomerController::class,"viewTambah",[AuthMiddleware::class]);
Router::add("GET","/admin/edit-customer/([0-9a-zA-Z]*)", CustomerController::class,"viewEditTambah",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/detail-customer/([0-9a-zA-Z]*)", CustomerController::class,"viewDetailTambah",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("POST","/admin/tambah-customer", CustomerController::class,"tambahCustomer",[AuthMiddleware::class]);
Router::add("POST","/admin/edit-customer", CustomerController::class,"editCustomer",[AuthMiddleware::class]);
Router::add("GET","/admin/hapus-customer/([0-9a-zA-Z]*)/([0-9a-zA-Z]*)", CustomerController::class,"hapusCustomer",[AuthMiddleware::class]);

//Router untuk menangani Dashboard Paket
Router::add("GET","/admin/paket", PaketController::class,"index",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/tambah-paket", PaketController::class,"viewTambahData",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/edit-paket/([0-9a-zA-Z]*)", PaketController::class,"viewEditData",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/detail-paket/([0-9a-zA-Z]*)", PaketController::class,"viewDetailData",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("POST","/admin/tambah-paket", PaketController::class,"tambahPaket",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("POST","/admin/edit-paket", PaketController::class,"editPaket",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/hapus-paket/([0-9a-zA-Z]*)", PaketController::class,"hapusPaket",[AuthMiddleware::class,AdminMiddleware::class]);

//Router untuk menangani Dashboard Pemesanan
Router::add("GET","/admin/pemesanan", PemesananController::class,"index",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/detail-pemesanan/([0-9a-zA-Z]*)", PemesananController::class,"viewDetailPemesanan",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/verifikasi-pemesanan", PemesananController::class,"viewVerifikasiPembayaran",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("POST","/pemesanan", PemesananController::class ,"tambahPemesanan",[AuthMiddleware::class,CustomerMiddleware::class]);
Router::add("GET","/delete-pemesanan-invalid/([0-9a-zA-Z]*)", PemesananController::class ,"invalidPemesanan",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("POST","/admin/edit-status-pembayaran", PemesananController::class ,"editStatusPembayaran",[AuthMiddleware::class,AdminMiddleware::class]);

//Router untuk menangani Dashboard Keberangkatan
Router::add("GET","/admin/keberangkatan", KeberangkatanController::class,"index",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/detail-keberangkatan/([0-9a-zA-Z]*)", KeberangkatanController::class,"viewDetailData",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("POST","/admin/tambah-keberangkatan", KeberangkatanController::class,"tambahKeberangkatan",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("POST","/admin/edit-keberangkatan", KeberangkatanController::class,"editKeberangkatan",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/hapus-keberangkatan/([0-9a-zA-Z]*)", KeberangkatanController::class,"hapusKeberangkatan",[AuthMiddleware::class,AdminMiddleware::class]);

//Router untuk menangani Dashboard Agen
Router::add("GET","/admin/agen", AgenController::class,"index",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/edit-agen/([0-9a-zA-Z]*)", AgenController::class,"viewEditAgen",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("POST","/admin/edit-agen", AgenController::class,"editAgen",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/tambah-agen", AgenController::class,"viewTambahData",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/data-sudah-dibayar", AgenController::class,"viewDataAgenSudahDibayar",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/admin/data-belum-dibayar", AgenController::class,"viewDataAgenBelumDibayar",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("POST","/admin/tambah-agen", AgenController::class,"tambahAgen",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("POST","/admin/tambah-gaji-agen", AgenController::class,"tambahGajiAgen",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("GET","/check-referal/([0-9a-zA-Z]*)", AgenController::class,"checkReferal",[AuthMiddleware::class,AdminMiddleware::class]);

//Router untuk menangani Dashboard Galery
Router::add("GET","/admin/galery", GaleryController::class,"index",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("POST","/admin/tambah-galery", GaleryController::class,"tambahGalery",[AuthMiddleware::class,AdminMiddleware::class]);

//Router untuk menangani Dashboard Artikel
Router::add("GET","/admin/artikel", ArtikelController::class,"index",[AuthMiddleware::class,AdminMiddleware::class]);
Router::add("POST","/admin/tambah-artikel", ArtikelController::class,"tambah",[AuthMiddleware::class,AdminMiddleware::class]);

//Router untuk menangani Dashboard Laporan
Router::add("GET","/admin/laporan", LaporanController::class,"index",[AuthMiddleware::class,AdminMiddleware::class]);

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
Router::add("GET","/apiGetKeberangkatanByMenu/([0-9a-zA-Z]*)", KeberangkatanController::class,'apiGetKeberangkatanByMenu');
Router::add("GET","/admin/delete-harga/([0-9a-zA-Z]*)/([0-9a-zA-Z]*)", PaketController::class, "deleteHarga");


//4. api customer
Router::add("POST","/apiTambahProfileCustomer", CustomerController::class, 'apiTambahProfileCustomer');
Router::add("GET","/apiGetProfileCustomer/([0-9a-zA-Z]*)", CustomerController::class, 'getApiJamaah');

//5. pemesanan
Router::add('POST','/apiTambahPemesanan', PemesananController::class,'apiTambahPemesanan');
Router::add('GET','/apiGetPemesananByStatus/([0-9a-zA-Z]*)/([0-9a-zA-Z]*)', PemesananController::class,'apiGetPemesananByStatus');
Router::add('POST','/apiTambahCicilan', PemesananController::class,'apiTambahCicilan');

//6. galery
Router::add('GET','/apiGetGalery', GaleryController::class , "apiGetGalery");

//7. artikel
Router::add("GET","/apiGetArtikel", ArtikelController::class,"apiGetArtikel");

//8. agen
Router::add("GET","/apiCheckReferal/([0-9a-zA-Z]*)", AgenController::class,"apiCheckReferal");



Router::add("POST","/testVoley", Test::class, "testVoley");
Router::add("POST","/uploadPasport", Test::class, "uploadPasport");
Router::add("POST","/testFile", Test::class, "testFile");
Router::add("GET","/bukti-pembayaran", Test::class, "buktiBayar");
Router::run();
