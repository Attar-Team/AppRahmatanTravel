<?php

namespace Attar\App\Rahmatan\Travel\Middleware;

use Attar\App\Rahmatan\Travel\App\View;

class CustomerMiddleware implements Middleware
{
    public function before(): void
    {
        if($_SESSION['level'] != "customer"){
            View::render("erorUnauthorized", [''] );
            exit();
        }
    }
}