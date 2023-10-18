<?php

namespace Attar\App\Rahmatan\Travel\Model;

class TokenModel
{
    private \PDO $connection;
    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    public function createToken(string $id)
    {
        try {
            $token = bin2hex(random_bytes(16));
            $query = "INSERT INTO token (`user_id`,`token`) VALUES (?,?)";
            $statement = $this->connection->prepare($query);
            $statement->execute([$id,$token]);
            $statement->closeCursor();
            return true;
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }

    public function checkToken(string $token)
    {
        try {
            $query = "SELECT * FROM token WHERE token = ?";
            $statement = $this->connection->prepare($query);
            $statement->execute([$token]);
            if( $statement->rowCount() > 0) {
                return true;
            }else{
                return false;
            }
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }

    public function deleteToken($user_id)
    {
        try{
            $query = "DELETE FROM token WHERE user_id = ?";
            $statement = $this->connection->prepare($query);
            $statement->execute([$user_id]);
            if( $statement->rowCount() > 0) {
            return true;
            }else{
                return false;
            }
        }catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }

}