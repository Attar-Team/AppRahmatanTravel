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
}