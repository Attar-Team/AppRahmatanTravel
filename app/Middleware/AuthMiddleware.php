<?php

namespace Attar\App\Rahmatan\Travel\Middleware;

class AuthMiddleware implements Middleware
{
    function before():void
    {
        session_start();
        if(!isset($_SESSION['status_login'])){
             header("Location: /");
        }
    }
}