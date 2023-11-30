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

    public function savePasport($nama,$foto){
        $statement = $this->connection->prepare("INSERT INTO `test`(`nama`, `foto1`, `foto2`) VALUES (?,?,?)");
            $statement->execute([$nama,$foto['foto1'],$foto['foto2']]);
            return $statement->rowCount();
    }

        public function getData()
        {
            $statement = $this->connection->prepare("SELECT * FROM user");
            $statement->execute();
            return $statement->fetchAll();
        }
}
