<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;

class HomeController
{
    public function __construct()
    {
        $conection = Database::getConnection();
        
    }
    public function index()
    {
        View::render("home/header", []);
        View::render("home/index", []);
        View::render("home/footer", []);
    }

    public function about()
    {
        View::render("home/header", []);
        View::render("home/about", []);
        View::render("home/footer", []); 
    }

    public function detailPaket()
    {
        View::render("Home/header", []);
        View::render("Home/detailPaket", []);
        View::render("Home/footer", []); 
    }
}