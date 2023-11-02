<?php

namespace Attar\App\Rahmatan\Travel\Model;

class UserModel
{
    private \PDO $connection;
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function get()
    {
        $query = $this->connection->prepare("SELECT * FROM user");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function save($data){
        $statement = $this->connection->prepare("INSERT INTO user (`email`,`password`,`level`) VALUES (?,?,?)");
        $statement->execute([$data['email'], $data['password'], $data['level']]);
        $result = ['count'=> $statement->rowCount(),'lastId'=> $this->connection->lastInsertId()];
        return $result;
    }
}