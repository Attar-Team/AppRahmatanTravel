<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Model\KeberangkatanModel;
use Attar\App\Rahmatan\Travel\Model\PaketModel;

class HomeController
{
    private $keberangkatan;
    private $paket;
    public function __construct()
    {
        $conection = Database::getConnection();
        $this->keberangkatan = new KeberangkatanModel($conection);
        $this->paket = new PaketModel($conection);
    }
    public function index()
    {
        $keberangkatan = $this->keberangkatan->get();
        View::render("home/header", []);
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

    public function pemesanan($id)
    {
        
        View::render("Home/header", []);
        View::render("Home/pemesanan", []);
        View::render("Home/footer", []); 
    }

    public function pembayaran()
    {
        View::render("Home/header", []);
        View::render("Home/pembayaran", []);
        View::render("Home/footer", []); 
    }

    public function profile()
    {
        View::render("Home/header", []);
        View::render("Home/profile", []);
        View::render("Home/footer", []); 
    }

    public function tambahJamaah()
    {
 
        View::render("Home/tambahCustomer", []);

    }
}