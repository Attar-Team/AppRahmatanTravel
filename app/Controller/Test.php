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
    public function buktiBayar()
    {
        View::render("Home/header", []);
        View::render("Home/buktiTransfer", []);
        View::render("Home/footer", []); 
    }
    public function index()
    {
        $data['all'] = $this->testModel->getData();
        View::render("index",$data);
    }

    public function testt(){
        echo "testt";
    }

    public function testFile(){
        $filename = $_FILES['foto']['name'];
            $tmpname = $_FILES['foto']['tmp_name'];
            $filesize = $_FILES['foto']['size'];

            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
            $rename = 'foto'.time().'.'.$formatfile;

            $allowedtype = array('png','jpeg','jpg','gif');

            if(!in_array($formatfile,$allowedtype)){
                echo'format gagal';
            }elseif($filesize > 1000000){
                echo'size gagal';
            }else{
                move_uploaded_file($tmpname, "uploads/tes/" .$rename);
                echo "berhasil";
            }
        // $result = [
        //     "name"=> $_FILES["foto"]["name"],
        //     "full_path"=> $_FILES["foto"]["full_path"],
        //     "type"=> $_FILES["foto"]["type"],
        //     "tmp_name"=> $_FILES["foto"]["tmp_name"],
        //     "size"=> $_FILES["foto"]["size"],
        //     "error"=> $_FILES["foto"]["error"]
        // ];
        // echo json_encode($result);
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