<?php

namespace Attar\App\Rahmatan\Travel\Model;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;

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

    public function getById($id)
    {
        $query = $this->connection->prepare("SELECT * FROM user WHERE userId = ?");
        $query->execute([$id]);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function save($data){
        try {
        $statement = $this->connection->prepare("INSERT INTO user (`username`,`email`,`password`,`level`) VALUES (?,?,?,?)");
        $statement->execute([$data['nama'],$data['email'], $data['password'], $data['level']]);
        $result = ['count'=> $statement->rowCount(),'lastId'=> $this->connection->lastInsertId()];
        return $result;
        }catch (\PDOException $e) {
            throw new ValidationException("Data Gagal Ditambakan ".$e->getMessage());
        }
    }
}