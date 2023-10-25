<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;

class ArtikelController
{
    public function __construct()
    {
        $connection = Database::getConnection();
    }
    public function index()
    {
        View::render("Admin/header",["title"=> "Artikel"]);
        View::render("Admin/artikel",[]);
        View::render("Admin/footer",[]);
    }
}