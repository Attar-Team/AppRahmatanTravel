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
}