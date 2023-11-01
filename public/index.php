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

//Router untuk menangani Homepage
Router::add("GET","/", HomeController::class,"index");

//Router untuk menangani Dashboard Admin
Router::add("GET","/admin/dashboard", DashboardController::class,"index");

//Router untuk menangani Dashboard Customer
Router::add("GET","/admin/customer", CustomerController::class,"index");

//Router untuk menangani Dashboard Paket
Router::add("GET","/admin/paket", PaketController::class,"index");
Router::add("GET","/admin/tambah-paket", PaketController::class,"viewTambahData");
Router::add("GET","/admin/edit-paket/([0-9a-zA-Z]*)", PaketController::class,"viewEditData");
Router::add("POST","/admin/tambah-paket", PaketController::class,"tambahPaket");
Router::add("POST","/admin/edit-paket", PaketController::class,"editPaket");

//Router untuk menangani Dashboard Pemesanan
Router::add("GET","/admin/pemesanan", PemesananController::class,"index");
Router::add("GET","/admin/verifikasi-pemesanan", PemesananController::class,"viewVerifikasiPembayaran");

//Router untuk menangani Dashboard Keberangkatan
Router::add("GET","/admin/keberangkatan", KeberangkatanController::class,"index");

//Router untuk menangani Dashboard Agen
Router::add("GET","/admin/agen", AgenController::class,"index");
Router::add("GET","/admin/verifikasi-komisi-agen", AgenController::class,"viewVerifikasiAgen");

//Router untuk menangani Dashboard Galery
Router::add("GET","/admin/galery", GaleryController::class,"index");

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
Router::add("GET","/apiGetPaket", PaketController::class,"apiGetPaket");
Router::add("GET","/apiGetPaket/([0-9a-zA-Z]*)", PaketController::class,"apiGetPaketById");

Router::add("GET","/admin/delete-harga/([0-9a-zA-Z]*)/([0-9a-zA-Z]*)", PaketController::class, "deleteHarga");
Router::run();
