<?php

namespace Attar\App\Rahmatan\Travel\Model;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;

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

    public function getByUserId($id)
    {
        $query = $this->connection->prepare("SELECT * FROM agen WHERE user_id = ?");
        $query->execute([$id]);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getPemesananUserId($id)
    {
        $query = $this->connection->prepare("SELECT * FROM pemesanan WHERE agen_id = ?");
        $query->execute([$id]);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getJumlahPemasukan($id)
    {
        $query = $this->connection->prepare("SELECT SUM(gaji) AS jumlah_pemasukan FROM pemesanan LEFT JOIN agen_gajian ON pemesanan.pemesanan_id = agen_gajian.pemesanan_id WHERE pemesanan.agen_id = ?");
        $query->execute([$id]);
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getDataAgenBelumBayar()
    {
        $query = $this->connection->prepare("SELECT *, pemesanan.pemesanan_id as pemesananId  FROM pemesanan LEFT JOIN agen_gajian ON pemesanan.pemesanan_id = agen_gajian.pemesanan_id WHERE agen_id != 0 AND agen_gajian.pemesanan_id is null");
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getDataAgenSudahBayar()
    {
        $query = $this->connection->prepare("SELECT * FROM pemesanan JOIN agen_gajian ON pemesanan.pemesanan_id = agen_gajian.pemesanan_id WHERE agen_id != 0 ");
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function save($data)
{
        try {
            $query = $this->connection->prepare("INSERT INTO agen (`NIK`,`user_id`,`kode_referal`,`nama`,`alamat`,`jenis_kelamin`,`noTelp`,`foto`,`saldo`) VALUES (?,?,?,?,?,?,?,?,?)");
        $query->execute([$data['NIK'],$data['user_id'],$data['kode_referal'],$data['nama'],$data['alamat'],$data['jenis_kelamin'],$data['no_telp'],$data['foto'],$data['saldo']]);
        return $query->rowCount();  
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function saveGaji($data)
    {
        try {
            $query = $this->connection->prepare('INSERT INTO agen_gajian (`pemesanan_id`,`tanggal_gajian`,`gaji`) VALUES (?,?,?)');
        $query->execute([$data['pemesanan_id'],$data['tanggal'],$data['jumlah_bonus']]);
        return $query->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function checkReferal($referal)
    {
        $query = $this->connection->prepare('SELECT * FROM agen WHERE kode_referal = ?');
        $query->execute([$referal]);
        $result = $query->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }
}