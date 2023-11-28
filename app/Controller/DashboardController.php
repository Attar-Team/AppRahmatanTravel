<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Model\DashboardModel;

class DashboardController
{
    private $dashboard;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->dashboard = new DashboardModel($connection);
    }

    public function index(){
        $tanggal = date("Y-m-d");
                $date=date_create($tanggal);
                date_add($date,date_interval_create_from_date_string("1 days"));
                $dateAkhir = date_format($date,"Y-m-d H:i:s");

                $dateNow=date_create($tanggal);
                $dateAwal = date_format($dateNow,"Y-m-d H:i:s");
        
        $jumlahPemasukan = $this->dashboard->getAllJumlahPemasukan();
        $jumlahPemesanan = $this->dashboard->getAllJumlahPemesanan();
        $jumlahPemasukanPerHari = $this->dashboard->getDaysJumlahPemasukan($dateAwal,$dateAkhir);
        $jumlahPemesananPerHari = $this->dashboard->getDaysJumlahPemesanan($dateAwal,$dateAkhir);

        View::render("Admin/header",["title"=> "Dashboard"]);
        View::render("Admin/dashboard",[
            'jumlahPemasukan' => $jumlahPemasukan[0]->jumlah_pemasukan,
            'jumlahPemesanan' => $jumlahPemesanan[0]->jumlah_pemesanan,
            'jumlahPemasukanPerHari' => $jumlahPemasukanPerHari[0]->jumlah_pemasukan,
            'jumlahPemesananPerHari' => $jumlahPemesananPerHari[0]->jumlah_pemesanan
    ]);
        View::render("Admin/footer",[]);
    }
}