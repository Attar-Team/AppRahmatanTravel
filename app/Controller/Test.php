<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Model\LoginModel;
use Attar\App\Rahmatan\Travel\Model\testModel;
use Exception;

class Test
{
    private $testModel;
    private $login;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->testModel = new testModel($connection);
        $this->login = new LoginModel($connection);
    }
    public function index()
    {
        $data['all'] = $this->testModel->getData();
        View::render("index",$data);
    }

    public function testt(){
        echo "testt";
    }

    public function testVoley()
    {
        try {

            $row = $this->login->login($_POST['email'], $_POST['password']);
            if ($row) {
                http_response_code(201);
                $result = array(
                    "status" => "success",
                    "response" => 201
                );
                echo json_encode($result);
            }else{
                http_response_code(201);
                $result = array(
                    "status" => "failed",
                    "response" => 404
                );
                echo json_encode($result);
            }
            //     $createToken = $this->token->createToken($row['userId']);
            //     if ($createToken) {
            //         http_response_code(201);
            //         $result = array(
            //             "status" => "success",
            //             "response" => 201
            //         );
            //     }
            // } else {
            //     http_response_code(404);
            //     $result = array(
            //         "status" => "Failed",
            //         "response" => 404
            //     );
            // }
        } catch (Exception $e) {
            http_response_code(404);
            $result = array(
                "status" => "Failed",
                "response" => 404,
                "message" => $e->getMessage()
            );
        echo json_encode($result);

        }
        // echo json_encode($result);
    }

    public function createSesion(){
        session_start();
        $_SESSION['status_login'] = true;
        $_SESSION['level'] = 'admin';
    }
    
    public function deleteSesion(){
        session_start();
        session_destroy();
    }
}