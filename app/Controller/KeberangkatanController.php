<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;

class KeberangkatanController
{
    public function __construct()
    {
        $connection = Database::getConnection();
    }

    public function index()
    {
        View::render("Admin/header",["title"=> "Keberangkatan"]);
        View::render("Admin/keberangkatan",[]);
        View::render("Admin/footer",[]);
    }
}