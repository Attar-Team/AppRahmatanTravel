<?php

namespace Attar\App\Rahmatan\Travel\App;

class View{
    public static function render(string $view, $data){
        require __DIR__ . '/../View/'.$view.'.php';
    }

    public static function redirect(string $url){
        header('Location:'.$url);
        exit();
    }
}