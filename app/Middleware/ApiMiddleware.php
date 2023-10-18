<?php

namespace Attar\App\Rahmatan\Travel\Middleware;

use Attar\App\Rahmatan\Travel\Model\TokenModel;
use Attar\App\Rahmatan\Travel\App\Database;

class ApiMiddleware implements Middleware
{
    private $token;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->token = new TokenModel($connection);
    }
    public function before(): void
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);
        $checkToken = $this->token->checkToken($data["token"]);

        if (!$checkToken) {
            http_response_code(404);
            $result = array(
                "status" => "Not acces",
                "response" => 404
            );
            echo json_encode($result);
            exit();
        }
    }
}