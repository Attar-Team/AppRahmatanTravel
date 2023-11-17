<?php

namespace Attar\App\Rahmatan\Travel\Model;

class AgenModel
{
    private \PDO $connection;
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function get()
    {
        $query = $this->connection->prepare("SELECT * FROM agen");
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function save($data)
{
        $query = $this->connection->prepare("INSERT INTO agen (`NIK`,`user_id`,`kode_referal`,`nama`,`alamat`,`jenis_kelamin`,`noTelp`,`foto`,`saldo`) VALUES (?,?,?,?,?,?,?,?,?)");
        $query->execute([$data['NIK'],$data['user_id'],$data['kode_referal'],$data['nama'],$data['alamat'],$data['jenis_kelamin'],$data['no_telp'],$data['foto'],$data['saldo']]);
        return $query->rowCount();  
    }

    public function checkReferal($referal)
    {
        $query = $this->connection->prepare('SELECT * FROM agen WHERE kode_referal = ?');
        $query->execute([$referal]);
        $result = $query->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }
}