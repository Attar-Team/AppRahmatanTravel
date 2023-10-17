<?php
namespace Attar\App\Rahmatan\Travel\Model;
class testModel
{

    private \PDO $connection;
    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }
    // private $data = [
    //     [
    //         "name"=> "zarif",
    //         "addres"=> "blitar"
    //     ],
    //     [
    //         "name"=> "Raffi",
    //         "addres"=> "blitar"
    //     ]
    //     ];

        public function getData()
        {
            $statement = $this->connection->prepare("SELECT * FROM user");
            $statement->execute();
            return $statement->fetchAll();
        }
}
