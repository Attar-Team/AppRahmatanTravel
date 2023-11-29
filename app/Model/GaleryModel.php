<?php

namespace Attar\App\Rahmatan\Travel\Model;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;

class GaleryModel
{
    private \PDO $connection;
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function get()
    {
        $query = $this->connection->prepare("SELECT * FROM galery");
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function save($data)
    {
        try {
            $query = $this->connection->prepare("INSERT INTO galery (`user_id`,`judul`,`foto`) VALUES (?,?,?)");
        $query->execute([$data['user_id'],$data['judul'],$data['foto']]);
        return $query->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $query = $this->connection->prepare('UPDATE galery SET judul = ?, foto = ? WHERE galery_id = ?');
        $query->execute([$data['user_id'],$data['juduk'],$data['foto']]);
        return $query->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function delete($id)
    {
       try {
        $query = $this->connection->prepare('DELETE FROM galery WHERE galery_id = ?');
        $query->execute([$id]);
        return $query->rowCount();
       } catch (\Throwable $th) {
        throw new ValidationException($th->getMessage());
       }
    }
}