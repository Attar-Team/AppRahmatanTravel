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

}