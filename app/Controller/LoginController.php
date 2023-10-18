<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\LoginModel;
use Attar\App\Rahmatan\Travel\Model\TokenModel;

class LoginController
{
    private $login;
    private $token;
    public function __construct(){
        $connection = Database::getConnection();
        $this->login = new LoginModel($connection);
        $this->token = new TokenModel($connection);
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

    public function apiLogin(){
        try{
            $jsonData = file_get_contents("php://input");
            $data = json_decode($jsonData,true);

            $row = $this->login->login($data['email'], $data['password']);
            if($row){
                $createToken = $this->token->createToken($row['userId']);
                if($createToken){
                    http_response_code(201);
                    $result = array("status" => "success",
                                    "response" => 201); 
                }
            }else{
                http_response_code(404);
                $result = array("status" => "Failed",
                                "response" => 404); 
            }
            echo json_encode($result);
        }catch(ValidationException $e){
            http_response_code(404);
                $result = array("status" => "Failed",
                                "response" => 404,
                                "message" => $e->getMessage()); 
        }
    }

    public function apiDeleteToken(){
        try {
            $jsonData = file_get_contents("php://input");
            $data = json_decode($jsonData,true);
        $row = $this->token->deleteToken($data["user_id"]);
        if($row){
            http_response_code(201);
            $result = array("status"=> "success",
            "response"=> 200);
        }else{
            http_response_code(404);
            $result = array("status"=> "failed",
            "response"=> 404);
        }
        echo json_encode($result);
        } catch (\Throwable $e) {
            http_response_code(404);
            $result = array("status" => "Failed",
                            "response" => 404,
                            "message" => $e->getMessage()); 
    
        }
    }

}