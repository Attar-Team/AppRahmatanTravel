<?php

namespace Attar\App\Rahmatan\Travel\Model;

class DashboardModel
{
    private \PDO $connection;
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAllJumlahPemasukan()
    {
        $query = $this->connection->prepare("SELECT SUM(sudah_bayar) AS jumlah_pemasukan FROM pemesanan ");
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function getAllJumlahPemesanan()
    {
        $query = $this->connection->prepare("SELECT COUNT(pemesanan_id) AS jumlah_pemesanan FROM pemesanan ");
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function getDaysJumlahPemesanan($dateAwal , $dateAkhir)
    {
        $query = $this->connection->prepare("SELECT COUNT(pemesanan_id) AS jumlah_pemesanan FROM pemesanan WHERE tanggal_pemesanan BETWEEN ? AND ?");
        $query->execute([$dateAwal , $dateAkhir]);
        $result = $query->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function getDaysJumlahPemasukan($dateAwal , $dateAkhir)
    {
        $query = $this->connection->prepare("SELECT SUM(sudah_bayar) AS jumlah_pemasukan FROM pemesanan WHERE tanggal_pemesanan BETWEEN ? AND ?");
        $query->execute([$dateAwal , $dateAkhir]);
        $result = $query->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function getJumlahAgen()
    {
        $query = $this->connection->prepare("SELECT COUNT(agen_id) AS jumlah_agen FROM agen");
        $query->execute();
        $result = $query->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }
    // public function getDayspemasukan()
    // {

    // }
}