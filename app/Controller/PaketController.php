<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;

class PaketController
{
    public function __construct()
    {
        $connection = Database::getConnection();
    }

    public function index()
    {
        View::render("/Admin/header",["title"=> "Paket"]);
        View::render("/Admin/paket", []);
        View::render("/Admin/footer", []);
    }
}