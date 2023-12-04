<?php

namespace Attar\App\Rahmatan\Travel\Middleware;

use Attar\App\Rahmatan\Travel\App\View;

class AgenMiddleWare implements Middleware
{
    public function before(): void
    {
        if($_SESSION['level'] != "agen"){
            View::render("erorUnauthorized", [''] );
            exit();
        }
    }
}