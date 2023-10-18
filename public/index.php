<?php

require_once __DIR__ ."/../vendor/autoload.php";

use Attar\App\Rahmatan\Travel\App\Router;
use Attar\App\Rahmatan\Travel\Controller\HomeController;
use Attar\App\Rahmatan\Travel\Controller\LoginController;
use Attar\App\Rahmatan\Travel\Controller\Test;
use Attar\App\Rahmatan\Travel\Middleware\ApiMiddleware;
use Attar\App\Rahmatan\Travel\Middleware\AuthMiddleware;

// Router::add("GET","/",Test::class,"index");
Router::add("GET","/test/([0-9a-zA-Z]*)",Test::class,"test");
Router::add("POST","/addApi", Test::class, "testt", [ApiMiddleware::class]);

//Router untuk menangani login
Router::add("GET","/login",LoginController::class,"index");
Router::add("POST","/login",LoginController::class,"login");
Router::add("POST","/apiLogin", LoginController::class,"apiLogin");
Router::add("POST","/apiDeleteToken", LoginController::class,"apiDeleteToken", [ApiMiddleware::class]);


//Router untuk menangani Homepage
Router::add("GET","/", HomeController::class,"index");
Router::run();
