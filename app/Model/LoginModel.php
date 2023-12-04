<?php
namespace Attar\App\Rahmatan\Travel\Model;

class LoginModel
{
    private \PDO $connection;
    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    public function login(string $email)
    {
        $statement = $this->connection->prepare("SELECT * FROM user WHERE email = ?");
        $statement->execute([
            $email
        ]);

        if($row = $statement->fetch()){
            return $row;
        }else{
            return null;
        }
    }

    public function verivikasiEmail($data)
    {
        $statement = $this->connection->prepare("SELECT * FROM user WHERE email = ? AND hoby = ?");
        $statement->execute([$data['email'], $data['hoby']]);
        return $statement->fetchAll();
    }
}