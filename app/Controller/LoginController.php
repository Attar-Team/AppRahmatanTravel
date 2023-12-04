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

    public function viewVerivikasiPassword()
    {
        View::render("lupaPassword", []);
    }

    public function viewGantiPassword()
    {
        View::render("gantiPassword", []);
    }

    public function cekVerivikasiPassword()
    {
        try {
            session_start();
            $data = [
                "email"=> htmlspecialchars($_POST['email']),
                "hoby"=> htmlspecialchars($_POST['hoby']),
            ];
            $cek = $this->login->verivikasiEmail($data);

            if(count($cek) > 0) {
                $_SESSION['user_id'] = $cek[0]['userId'];
                View::setFlasher('success','Berhasil','Verivikasi berhasil silahkan ganti password baru');
                View::redirect('/ganti-password');
            } else {
                throw new ValidationException('hoby salah');
            }
        } catch (ValidationException $th) {
            View::setFlasher('error','Gagal','Hoby tidak valid');
            View::redirect('/verivikasi-lupa-password');
        }
    }

    public function gantiPassword()
    {
        try {
            session_start();
           $user_id = $_SESSION['user_id'];
            if($_POST['password'] != $_POST['repeat_password'])
            throw new ValidationException('Password dan ulangi password harus sama');

            $data = [
                'password'=> password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT),
                'user_id'=> $user_id
            ];
            $gantiPassword = $this->user->gantiPassword($data);
            if($gantiPassword > 0){
                View::setFlasher('success','Berhasil','Password berhasil di ubah');
                View::redirect('/login');
            }else{
                throw new ValidationException('Password gagal di ubah');
            }
        } catch (ValidationException $th) {
            View::setFlasher('error','Gagal',$th->getMessage());
            View::redirect('/ganti-password');
        }
    }

    public function login()
    {
        try {
            if ($_POST['email'] == "" || $_POST['password'] == "") throw new ValidationException("Field harus di isi");

            $row = $this->login->login($_POST['email']);
            if ($row){
                if(password_verify($_POST['password'], $row['password'])){
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
                }else{
                    throw new ValidationException("Password salah");
                }
            }else{
                throw new ValidationException("Email Salah");
            }
          
        } catch (ValidationException $th) {
            View::setFlasher('warning','Gagal',$th->getMessage());
            View::redirect('/login');
        }
    }

    public function saveRegister()
    {
        try {
            $data = [
                "nama"=> htmlspecialchars($_POST["nama"]) ,
                "password"=> password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT) ,
                "email"=> htmlspecialchars($_POST["email"]),
                "level"=> "customer",
                "hoby"=> htmlspecialchars($_POST["hoby"])
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

            $row = $this->login->login($data['email']);

            if ($row) {
                if(password_verify($data['password'], $row['password'])){
                    $createToken = $this->token->createToken($row['userId']);
                
                    if ($createToken) {
                        $token = $this->token->getToken($row['userId']);
                        http_response_code(200);
                        $result = array(
                            "status" => 200,
                            "message" => "success",
                            "nama"=> $row['username'],
                            'user_id'=> $row['userId'],
                            "token"=> $token['token'],
                            'foto'=> $row['foto_user']
                        );
                    }
                }else{
                    http_response_code(401);
                    $result = array(
                        "status" => 401,
                        "message" => "Failed username dan password salah"
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
