<?php

namespace Attar\App\Rahmatan\Travel\Model;

use Attar\App\Rahmatan\Travel\Exception\ValidationException;

class KeberangkatanModel
{
    private \PDO $connection;
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }
    
    public function getAllApi()
    {
        $query = $this->connection->prepare("SELECT * FROM keberangkatan ");
        $query->execute();
        $result = $query->fetchAll();
        return $result; 
    }

    public function get()
    {
        $query = $this->connection->prepare("SELECT *, keberangkatan.keberangkatan_id AS id, keberangkatan.seats - (SELECT COUNT(*) FROM pemesanan JOIN detail_customer_pemesan ON pemesanan.pemesanan_id = detail_customer_pemesan.pemesanan_id WHERE pemesanan.keberangkatan_id = id) AS available_seat FROM keberangkatan JOIN paket ON keberangkatan.paket_id = paket.paket_id JOIN hotel ON paket.paket_id = hotel.hotel_id JOIN harga_paket ON paket.paket_id = paket.paket_id GROUP BY keberangkatan.keberangkatan_id");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    public function getForPaketTravel()
    {
        $query = $this->connection->prepare("SELECT *, keberangkatan.keberangkatan_id AS id, keberangkatan.seats - (SELECT COUNT(*) FROM pemesanan JOIN detail_customer_pemesan ON pemesanan.pemesanan_id = detail_customer_pemesan.pemesanan_id WHERE pemesanan.keberangkatan_id = id) AS available_seat FROM keberangkatan JOIN paket ON keberangkatan.paket_id = paket.paket_id JOIN hotel ON paket.paket_id = hotel.hotel_id JOIN harga_paket ON paket.paket_id = paket.paket_id WHERE keberangkatan.tanggal_ditutup > DATE(NOW()) GROUP BY keberangkatan.keberangkatan_id");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function searchKeberangkatan($menu, $keberangkatan, $hargaMinim, $hargaMax, $start)
    {
        $query = $this->connection->prepare("SELECT *,MONTH(keberangkatan.tanggal) AS month, keberangkatan.keberangkatan_id AS id, keberangkatan.seats - (SELECT COUNT(*) FROM pemesanan JOIN detail_customer_pemesan ON pemesanan.pemesanan_id = detail_customer_pemesan.pemesanan_id WHERE pemesanan.keberangkatan_id = id) AS available_seat FROM keberangkatan JOIN paket ON keberangkatan.paket_id = paket.paket_id JOIN hotel ON paket.paket_id = hotel.hotel_id JOIN harga_paket ON paket.paket_id = paket.paket_id WHERE paket.menu = ? AND keberangkatan.keberangkatan_dari = ? AND harga_paket.harga >= ? AND harga_paket.harga <= ? GROUP BY keberangkatan.keberangkatan_id HAVING month = MONTH(?)");
        $query->execute([$menu,$keberangkatan,$hargaMinim,$hargaMax,$start]);
        $result = $query->fetchAll();
        return $result;
    }

    public function getLimit()
    {
        $query = $this->connection->prepare("SELECT *, keberangkatan.keberangkatan_id AS id, keberangkatan.seats - (SELECT COUNT(*) FROM pemesanan JOIN detail_customer_pemesan ON pemesanan.pemesanan_id = detail_customer_pemesan.pemesanan_id WHERE pemesanan.keberangkatan_id = id) AS available_seat FROM keberangkatan JOIN paket ON keberangkatan.paket_id = paket.paket_id JOIN hotel ON paket.paket_id = hotel.hotel_id JOIN harga_paket ON paket.paket_id = paket.paket_id WHERE keberangkatan.tanggal_ditutup > DATE(NOW()) GROUP BY keberangkatan.keberangkatan_id LIMIT 6");
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

    public function getByMenu($id)
    {
        $query = $this->connection->prepare("SELECT * FROM keberangkatan JOIN paket ON keberangkatan.paket_id = paket.paket_id WHERE paket.menu = ? GROUP BY keberangkatan.keberangkatan_id");
        $query->execute([$id]);
        $result = $query->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function save($data)
    {
        try {
            $query = $this->connection->prepare("INSERT INTO keberangkatan (`paket_id`,`tanggal`,`keberangkatan_dari`,`status_keberangkatan`,`seats`,`tanggal_ditutup`) VALUES (?,?,?,?,?,?)");
        $query->execute([$data['paket_id'],$data['tanggal_keberangkatan'],$data['keberangkatan_dari'],'Belum Berangkat',$data['seats'],$data['tanggal_ditutup']]);
        return $query->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function update($data){
        try {
            $query = $this->connection->prepare('UPDATE keberangkatan SET paket_id = ?, tanggal = ?,keberangkatan_dari = ?, status_keberangkatan = ?, seats = ?, tanggal_ditutup = ? WHERE keberangkatan_id = ?');
        $query->execute([$data['paket_id'],$data['tanggal'],$data['keberangkatan_dari'],$data['status'],$data['seats'],$data['tanggal_ditutup'],$data['keberangkatan_id']]);
        return $query->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function delete($id){
        try {
            $query = $this->connection->prepare('DELETE FROM keberangkatan WHERE keberangkatan_id = ?');
        $query->execute([$id]);
        return $query->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }
    
}