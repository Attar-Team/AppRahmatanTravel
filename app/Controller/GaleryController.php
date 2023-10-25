<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;

class GaleryController
{
    public function __construct()
    {
        $connection = Database::getConnection();
    }
    public function index()
    {
        View::render("Admin/header",["title"=>"Galery"]);
        View::render("Admin/galery",[]);
        View::render("Admin/footer",[]);
    }
}