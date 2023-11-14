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
        $query = $this->connection->prepare("SELECT * FROM keberangkatan JOIN paket ON keberangkatan.paket_id = paket.paket_id LEFT JOIN hotel ON paket.paket_id = hotel.hotel_id LEFT JOIN harga_paket ON paket.paket_id = paket.paket_id GROUP BY keberangkatan.keberangkatan_id");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    public function getDetail($id)
    {
        $query = $this->connection->prepare("SELECT * FROM keberangkatan JOIN paket ON keberangkatan.paket_id = paket.paket_id WHERE keberangkatan_id = ?");
        $query->execute([$id]);
        $result = $query->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function getById($id)
    {
        $query = $this->connection->prepare("SELECT * FROM keberangkatan WHERE keberangkatan_id = ?");
        $query->execute([$id]);
        $result = $query->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function save($data)
    {
        $query = $this->connection->prepare("INSERT INTO keberangkatan (`paket_id`,`tanggal`,`keberangkatan_dari`,`status`,`seats`,`tanggal_ditutup`) VALUES (?,?,?,?,?,?)");
        $query->execute([$data['paket_id'],$data['tanggal_keberangkatan'],$data['keberangkatan_dari'],'Belum Berangkat',$data['seats'],$data['tanggal_ditutup']]);
        return $query->rowCount();
    }

    public function update($data){
        $query = $this->connection->prepare('UPDATE keberangkatan SET paket_id = ?, tanggal = ?,keberangkatan_dari = ?, status = ?, seats = ?, tanggal_ditutup = ? WHERE keberangkatan_id = ?');
        $query->execute([$data['paket_id'],$data['tanggal'],$data['keberangkatan_dari'],$data['status'],$data['seats'],$data['tanggal_ditutup'],$data['keberangkatan_id']]);
        return $query->rowCount();
    }

    public function delete($id){
        $query = $this->connection->prepare('DELETE FROM keberangkatan WHERE keberangkatan_id = ?');
        $query->execute([$id]);
        return $query->rowCount();
    }
    
}