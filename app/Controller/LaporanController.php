<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Model\PemesananModel;

class LaporanController
{
    private $pemesanan;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->pemesanan = new PemesananModel($connection);
    }
    public function index()
    {
        $data = $this->pemesanan->get();
        View::render("Admin/header",["title"=> "Laporan"]);
        View::render("Admin/laporan",["pemesanan"=> $data]);
        View::render("Admin/footer",[]);
    }

    public function cetakLaporan()
    {
        $date_awal =date_create($_POST['tanggal_awal']);
        $dateAwal = date_format($date_awal ,"Y-m-d H:i:s");
        $date_akhir =date_create($_POST['tanggal_akhir']);
        $dateAkhir = date_format($date_akhir ,"Y-m-d H:i:s");
        $data = $this->pemesanan->getByTanggal($dateAwal,$dateAkhir);
        View::render("Admin/cetakLaporan",["pemesanan"=> $data,"dateAkhir"=> $dateAkhir,'dateAwal'=>$dateAwal]);

    }

}