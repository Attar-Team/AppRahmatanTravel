<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\LoginModel;

class LoginController
{
    private $login;
    public function __construct(){
        $connection = Database::getConnection();
        $this->login = new LoginModel($connection);
    }

    public function index(){
        View::render("login",[]);
    }

    public function login(){
        try {
            if($_POST['email'] == "" || $_POST['password'] == ""){
                throw new ValidationException("Field harus di isi");
            }
            $row = $this->login->login($_POST['email'], $_POST['password']);
            if(!$row){
                throw new ValidationException("Username dan password salah");
            }
            View::redirect("/product");
        } catch (\Throwable $th) {
            View::render("login",["error" => $th->getMessage()]);
        }
    }

}