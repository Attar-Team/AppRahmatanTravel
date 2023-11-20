<?php

namespace Attar\App\Rahmatan\Travel\Model;

class PemesananModel
{
    private \PDO $connection;
    public function __construct(\PDO $conection)
    {
        $this->connection = $conection;
    }

    public function get()
    {
        $query = $this->connection->prepare("SELECT * FROM pemesanan");
        $query->execute();
        return $query->fetchAll();
    }

    public function getById($id)
    {
        $query = $this->connection->prepare("SELECT * FROM pemesanan WHERE pemesanan_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function checkValid($id)
    {
        $query = $this->connection->prepare("SELECT * FROM `pemesanan` RIGHT JOIN detail_pemesanan ON pemesanan.pemesanan_id = detail_pemesanan.pemesanan_id WHERE pemesanan.pemesanan_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function delete($id)
    {
        $query = $this->connection->prepare("DELETE FROM pemesanan WHERE pemesanan_id = ?");
        $query->execute([$id]);
        return $query->rowCount();
    }

    public function save($data){
        $statement = $this->connection->prepare("INSERT INTO pemesanan (`agen_id`, `jenis_pembayaran`, `status`, `tanggal`, `catatan_pemesanan`, `jumlah_bayar`, `total_tagihan`) VALUES (?,?,?,?,?,?,?)");
        $statement->execute([$data['agen_id'],$data['jenis_pembayaran'],$data['status'],$data['tanggal'],$data['catatan_pemesanan'],$data['jumlah_bayar'],$data['total_tagihan']]);
        $result = ['count'=> $statement->rowCount(),'lastId'=> $this->connection->lastInsertId()];
        return $result;
    }

    public function saveDetailPemesanan($pemesanan_id,$customer_id,$harga_paket_id)
    {
        $statement = $this->connection->prepare('INSERT INTO detail_customer_pemesan (`pemesanan_id`, `customer_id`, `harga_paket_id`) VALUES (?,?,?)');
        $statement->execute([$pemesanan_id,$customer_id,$harga_paket_id]);
        return $statement->rowCount();
    }
}