<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\LoginModel;
use Attar\App\Rahmatan\Travel\Model\TokenModel;
use Attar\App\Rahmatan\Travel\Model\UserModel;

class LoginController
{
    private $login;
    private $token;
    private $user;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->login = new LoginModel($connection);
        $this->token = new TokenModel($connection);
        $this->user = new UserModel($connection);
    }

    public function index()
    {
        View::render("login", []);
    }
    public function register()
    {
        View::render("register", []);
    }

    public function login()
    {
        try {
            if ($_POST['email'] == "" || $_POST['password'] == "") {
                throw new ValidationException("Field harus di isi");
            }
            $row = $this->login->login($_POST['email'], $_POST['password']);
            if (!$row) {
                throw new ValidationException("Username dan password salah");
            }
            session_start();
            $_SESSION['status_login'] = true;
            $_SESSION['uid_user'] = $row['userId'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['level'] = $row['level'];
            if($row['level'] == 'admin'){
                View::redirect("/admin/dashboard");
            }else if($row["level"] == "customer" || $row["level"] == "agen"){
                View::redirect("/");
            }
        } catch (\Throwable $th) {
            View::render("/login", ["error" => $th->getMessage()]);
        }
    }

    public function saveRegister()
    {
        try {
            $data = [
                "nama"=> htmlspecialchars($_POST["nama"]) ,
                "password"=> htmlspecialchars($_POST["password"]) ,
                "email"=> htmlspecialchars($_POST["email"]),
                "level"=> "customer"
            ];
            $tambah = $this->user->save($data);

            if($tambah > 0){
                View::render("login", ["success" => "Register berhasil"]);
            }else{
                throw new ValidationException("Gagal ditambahkan");
            }
        } catch (ValidationException $th) {
            View::render("register", ["error" => $th->getMessage()]);
        }
    }

    public function logout()
    {
        session_start();
        if($_SESSION['level'] == 'admin'){
            session_destroy();
            View::redirect("/login");
        }else if($_SESSION["level"] == "customer" || $_SESSION["level"] == "agen"){
            session_destroy();
            View::redirect("/");
        }
        
    }

    public function apiLogin()
    {
        try {
            $jsonData = file_get_contents("php://input");
            $data = json_decode($jsonData, true);

            $row = $this->login->login($data['email'], $data['password']);
            if ($row) {
                $createToken = $this->token->createToken($row['userId']);
                
                if ($createToken) {
                    $token = $this->token->getToken($row['userId']);
                    http_response_code(200);
                    $result = array(
                        "status" => 200,
                        "message" => "success",
                        "nama"=> $row['username'],
                        'user_id'=> $row['userId'],
                        "token"=> $token['token']
                    );
                }
            } else {
                http_response_code(401);
                $result = array(
                    "status" => 401,
                    "message" => "Failed username dan password salah"
                );
            }
            echo json_encode($result);
        } catch (ValidationException $e) {
            http_response_code(404);
            $result = array(
                "message" => "Failed",
                "status" => 404,
            );
        }
    }

    public function apiDeleteToken()
    {
        try {
            $jsonData = file_get_contents("php://input");
            $data = json_decode($jsonData, true);
            $row = $this->token->deleteToken($data["user_id"]);
            if ($row) {
                http_response_code(201);
                $result = array(
                    "status" => "success",
                    "response" => 200
                );
            } else {
                http_response_code(404);
                $result = array(
                    "status" => "failed",
                    "response" => 404
                );
            }
            echo json_encode($result);
        } catch (\Throwable $e) {
            http_response_code(404);
            $result = array(
                "status" => "Failed",
                "response" => 404,
                "message" => $e->getMessage()
            );
        }
    }

    public function apiGetToken()
    {
        try {
            $jsonData = file_get_contents("php://input");
            $data = json_decode($jsonData, true);
            $row = $this->token->getToken($data["user_id"]);
            if ($row) {
                http_response_code(200);
                $result = array(
                    "status" => "200",
                    "message"=> "success",
                    "response" => [
                        "token" => $row["token"]
                    ]
                );
            } else {
                http_response_code(404);
                $result = array(
                    "status" => "failed",
                    "response" => 404
                );
            }
            echo json_encode($result);
        } catch (\Throwable $e) {
            http_response_code(404);
            $result = array(
                "status" => "Failed",
                "response" => 404,
                "message" => $e->getMessage()
            );
            echo json_encode($result);
        }
    }
}
