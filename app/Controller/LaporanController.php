<?php

namespace Attar\App\Rahmatan\Travel\Controller;
use Attar\App\Rahmatan\Travel\App\View;

class LaporanController
{
    public function index()
    {
        View::render("Admin/header",["title"=> "Laporan"]);
        View::render("Admin/laporan",[]);
        View::render("Admin/footer",[]);
    }
}