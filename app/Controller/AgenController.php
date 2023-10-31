<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;

class AgenController
{
    public function __construct()
    {
        $connection = Database::getConnection();
    }

    public function index()
    {
        View::render("Admin/header",["title"=> "Agen"]);
        View::render("Admin/agen",[]);
        View::render("Admin/footer",[]);
    }

    public function viewVerifikasiAgen()
    {
        View::render("Admin/header",["title"=> "Verifikasi Agen"]);
        View::render("Admin/verifikasiKomisiAgen",[]);
        View::render("Admin/footer",[]);
    }
}