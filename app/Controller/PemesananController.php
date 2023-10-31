<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;

class PemesananController
{
    public function __construct()
    {
        $connection = Database::getConnection();
    }

    public function index()
    {
        View::render("/Admin/header",["title"=> "Pemesanan"]);
        View::render("/Admin/pemesanan",[]);
        View::render("/Admin/footer",[]);
    }

    public function viewVerifikasiPembayaran()
    {
        View::render("Admin/header",["title"=> "Verifikasi pembayaran"]);
        View::render("Admin/verifikasiPemesanan",[]);
        View::render("Admin/footer",[]);
    }
}