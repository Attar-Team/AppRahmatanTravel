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
    public static function setFlasher(string $status,String $title, string $message){
        session_start();
        $_SESSION['flash'] = [
            'status'=> $status,
            'title'=> $title,
            'message'=> $message
        ];
    }
}