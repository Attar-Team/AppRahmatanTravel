<?php

namespace Attar\App\Rahmatan\Travel\Model;

class KeberangkatanModel
{
    private \PDO $connection;
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function get()
    {
        $query = $this->connection->prepare("SELECT * FROM keberangkatan JOIN paket ON keberangkatan.paket_id = paket.paket_id");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function getById($id)
    {
        $query = $this->connection->prepare("SELECT * FROM keberangkatan WHERE keberangkatan_id = ?");
        $query->execute([$id]);
        $result = $query->fetchAll();
        return $result;
    }

    public function save($data)
    {
        $query = $this->connection->prepare("INSERT INTO keberangkatan (`paket_id`,`tanggal`,`status`,`seats`,`tanggal_ditutup`) VALUES (?,?,?,?,?)");
        $query->execute([$data['paket_id'],$data['tanggal_keberangkatan'],'Belum Berangkat',$data['seats'],$data['tanggal_ditutup']]);
        return $query->rowCount();
    }
}