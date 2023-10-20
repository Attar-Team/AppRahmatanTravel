<?php

namespace Attar\App\Rahmatan\Travel\Middleware;

class AdminMiddleware implements Middleware
{
    public function before(): void
    {
        if($_SESSION['level'] != "admin"){
            echo "tidak boleh akses untuk admin";
            exit();
        }
    }
}