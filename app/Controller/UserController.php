<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\UserModel;

class UserController
{
    private $user;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->user = new UserModel($connection);
    }

    public function apiGetAll()
    {
        try{
            $data['all'] = $this->user->get();
            $result = array();
            foreach($data['all'] as $d){
                array_push($result, array(
                    'id' => $d['userId'],
                    'email' => $d['email'],
                    'level' => $d['level']
                ));
            }
            http_response_code(200);
            echo json_encode($result);
        }catch(ValidationException $e){
            http_response_code(400);
        }
    }

    // public function apiRegister()
    // {
    //     try {
    //         $jsonData = file_get_contents("php://input");
    //         $data = json_decode($jsonData, true);

    //         $tambah = $this->user->save($data);
    //         if($tambah['count'] > 0){
    //             http_response_code(201);
    //                 $result = array(
    //                     "status" => 201,
    //                     "message" => "success"
    //                 );
    //         }else{
    //             http_response_code(404);
    //                 $result = array(
    //                     "status" => 404,
    //                     "message" => "success"
    //                 );
    //         }
    //         echo json_encode($result);
            
    //     } catch (\Throwable $e) {
    //         http_response_code(404);
    //                     $result = array(
    //                         "status" => "Failed",
    //                         "response" => 404,
    //                         "message" => $e->getMessage()
    //                     );
    //                     echo json_encode($result);
    //     }
    // }

    public function apiRegister()
    {
        try {
            $data = [
                "nama"=> htmlspecialchars(str_replace('"', '', $_POST["nama"])) ,
                "password"=> password_hash(htmlspecialchars(str_replace('"', '', $_POST["password"])), PASSWORD_DEFAULT) ,
                "email"=> htmlspecialchars(str_replace('"', '', $_POST["email"])),
                "level"=> "customer",
                "hoby"=> htmlspecialchars(str_replace('"', '', $_POST["hoby"]))
            ];
            $tambah = $this->user->save($data);

            if($tambah > 0){
                http_response_code(201);
                $result = array(
                    "status" => "success",
                    "response" => 201
                );
            }else{
                throw new ValidationException("Gagal ditambahkan");
            }
            echo json_encode($result);
        } catch (ValidationException $th) {
            http_response_code(400);
            $result = array(
                "status" => "failed",
                "response" => 400,
                "info"=> $th->getMessage()
            );
            echo json_encode($result);
        }
    }
}