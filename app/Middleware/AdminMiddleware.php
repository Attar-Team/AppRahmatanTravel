<?php

namespace Attar\App\Rahmatan\Travel\Middleware;

use Attar\App\Rahmatan\Travel\App\View;

class AdminMiddleware implements Middleware
{
    public function before(): void
    {
        if($_SESSION['level'] != "admin"){
            View::render("erorUnauthorized", [''] );
            exit();
        }
    }
}