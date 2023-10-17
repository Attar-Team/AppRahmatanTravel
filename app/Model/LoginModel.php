<?php
namespace Attar\App\Rahmatan\Travel\Model;

class LoginModel
{
    private \PDO $connection;
    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    public function login(string $email, string $password)
    {
        // $query = "SELECT * FROM user WHERE username = :username && password = :pass";
        // $result = $this->connection->prepare($query);
        // $result->bindParam("username", $username, \PDO::PARAM_STR);
        // $result->bindParam("password", $password, \PDO::PARAM_STR);
        // $result->execute();
        // return $result->fetch(\PDO::FETCH_ASSOC);
        $statement = $this->connection->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $statement->execute([
            $email,$password
        ]);

        if($row = $statement->fetch()){
            return $row;
        }else{
            return null;
        }
    }
}