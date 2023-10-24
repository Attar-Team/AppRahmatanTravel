<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;

class DashboardController
{
    public function __construct()
    {
        $connection = Database::getConnection();
    }

    public function index(){
        View::render("Admin/header",["title"=> "Dashboard"]);
        View::render("Admin/dashboard",[]);
        View::render("Admin/footer",[]);
    }
}