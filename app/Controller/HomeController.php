<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Model\CustomerModel;
use Attar\App\Rahmatan\Travel\Model\KeberangkatanModel;
use Attar\App\Rahmatan\Travel\Model\PaketModel;
use Attar\App\Rahmatan\Travel\Model\PemesananModel;
use Attar\App\Rahmatan\Travel\Model\UserModel;

class HomeController
{
    private $keberangkatan;
    private $paket;
    private $pemesanan;
    private $customer;
    private $user;
    public function __construct()
    {
        $conection = Database::getConnection();
        $this->keberangkatan = new KeberangkatanModel($conection);
        $this->paket = new PaketModel($conection);
        $this->pemesanan = new PemesananModel($conection);
        $this->customer = new CustomerModel($conection);
        $this->user = new UserModel($conection);
    }
    public function index()
    {
        $pemesanan = $this->pemesanan->get();
        $keberangkatan = $this->keberangkatan->get();
        View::render("home/header", ['pemesanan' => $pemesanan]);
        View::render("home/index", ['dataKeberangkatan' => $keberangkatan]);
        View::render("home/footer", []);
    }

    public function about()
    {
        View::render("home/header", []);
        View::render("home/about", []);
        View::render("home/footer", []); 
    }


    public function detailPaket($idKeberangkatan)
    {
        $keberangkatan = $this->keberangkatan->getDetail($idKeberangkatan);
        foreach ($keberangkatan as $k) {
            $idPaket = $k->paket_id;
        }
        $hotel = $this->paket->getHotelPaket($idPaket);
        $harga = $this->paket->getHargaPaket($idPaket);
        $bintang = $this->paket->getBintangHotel($idPaket);
        View::render("Home/header", []);
        View::render("Home/detailPaket", [
            "hotel"=> $hotel,
            "harga"=> $harga,
            "bintang"=> $bintang,
            "keberangkatan"=> $keberangkatan
        ]);
        View::render("Home/footer", []); 
    }

    public function pemesanan($idKeberangkatan)
    {
        session_start();
        $idCustomer = $_SESSION['uid_user'];
        $keberangkatan = $this->keberangkatan->getDetail($idKeberangkatan);
        foreach ($keberangkatan as $k) {
            $idPaket = $k->paket_id;
        }
        $hotel = $this->paket->getHotelPaket($idPaket);
        $harga = $this->paket->getHargaPaket($idPaket);
        $bintang = $this->paket->getBintangHotel($idPaket);
        $profile = $this->customer->getCustomerByUserId($idCustomer);
        View::render("Home/pemesanan", [
            "hotel"=> $hotel,
            "harga"=> $harga,
            "bintang"=> $bintang,
            "keberangkatan"=> $keberangkatan,
            "profile"=> $profile,
            "keberangkatan_id"=> $idKeberangkatan
        ]);
    }

    public function pembayaran()
    {
        View::render("Home/header", []);
        View::render("Home/pembayaran", []);
        View::render("Home/footer", []); 
    }

    public function profile()
    {
        session_start();
        $idCustomer = $_SESSION['uid_user'];
        $user = $this->user->getById($idCustomer);
        $profile = $this->customer->getCustomerByUserId($idCustomer);
        View::render("User/profile", ['user' => $user,'profile'=> $profile]);
    }
    public function paketUmrah()
    {
        
        $keberangkatan = $this->keberangkatan->get();
        View::render("Home/header", []);
        View::render("Home/paketUmrah", ['dataKeberangkatan' => $keberangkatan]);
        View::render("Home/footer", []); 
    }

    public function buktiTransfer($idPemesanan)
    {
        
        $dataPemesanan = $this->pemesanan->getById($idPemesanan);
        if(count($dataPemesanan) == 0){
            View::redirect("/");
            exit();
        }
        View::render("Home/buktiTransfer",['pemesanan' => $dataPemesanan,'idPemesanan' => $idPemesanan]);
    }

    public function tambahJamaah($idKeberangkatan)
    {
        View::render("Home/tambahCustomer", [
            'idKeberangakatan' => $idKeberangkatan
        ]);
    }
    
    public function tambahJamaahProfile()
    {
        View::render("User/tambahCustomer", [
            'idKeberangakatan' => 0
        ]);
    }

    public function viewDetailPemesanan($id)
    {
        $dataJamaah = $this->pemesanan->getDetailCustomerPemesanan($id);
        $riwayatPembayaran = $this->pemesanan->getRiwayatPembayaran($id);
        $detailPemesanan = $this->pemesanan->getDetailPemesananById($id);
        View::render('User/detailPemesanan', ['detailPemesanan' => $detailPemesanan,'riwayatPembayaran'=> $riwayatPembayaran,'jamaah'=> $dataJamaah]);
    }

    public function viewCetakTagihan($id)
    {
        $dataJamaah = $this->pemesanan->getDetailCustomerPemesanan($id);
        $detailPemesanan = $this->pemesanan->getDetailPemesananById($id);
        View::render('User/cetakTagihan', ['detailPemesanan' => $detailPemesanan,'jamaah'=> $dataJamaah]) ;
    }
    public function viewNotaPembayaran($id)
    {
        $dataJamaah = $this->pemesanan->getDetailCustomerPemesanan($id);
        $riwayatPembayaran = $this->pemesanan->getRiwayatPembayaran($id);
        $detailPemesanan = $this->pemesanan->getDetailPemesananById($id);
        View::render('User/notaPembayaran', ['detailPemesanan' => $detailPemesanan,'riwayatPembayaran'=> $riwayatPembayaran,'jamaah'=> $dataJamaah]) ;
    }
}