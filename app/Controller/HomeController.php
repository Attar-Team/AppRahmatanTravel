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
        View::render("headerhome", []);
        View::render("home/PageConstruction", []);
        View::render("footerHome", []);
    }
}