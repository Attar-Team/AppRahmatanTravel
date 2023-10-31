<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;

class CustomerController
{
    public function __construct()
    {
        $conection = Database::getConnection();
    }

    public function index()
    {
        View::render("Admin/header",["title"=> "Customer"]);
        View::render("Admin/customer",[]);
        View::render("Admin/footer",[]);
    }
}