<?php

namespace Attar\App\Rahmatan\Travel\Model;

class PaketModel
{
    private \PDO $connection;
    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }
    
    public function getPaket()
    {
        $query = $this->connection->prepare("SELECT * FROM paket");
        $query->execute();
        return $query->fetchAll();
    }

    public function getHargaPaket($id)
    {
        $query = $this->connection->prepare("SELECT * FROM harga_paket WHERE paket_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function getHotelPaket($id)
    {
        $query = $this->connection->prepare("SELECT * FROM hotel WHERE paket_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function savePaket(array $data)
    {
        $query = $this->connection->prepare("INSERT INTO paket (`nama`,`menu`,`lama_hari`,`minim_dp`,`termasuk_harga`,`tidak_termasuk_harga`,`keunggulan`,`maskapai`,`foto_brosur`) VALUES (?,?,?,?,?,?,?,?,?)");
        $query->execute([$data["nama"], $data["menu"], $data["lama_hari"],$data['minim_dp'],$data['termasuk_harga'],$data['tidak_termasuk_harga'],$data['keunggulan'],$data['maskapai'],$data['foto_brosur']]);
        $result = ['count'=> $query->rowCount(),'lastId'=> $this->connection->lastInsertId()];
        return $result;
    }

    public function saveHotel($paket_id,$lokasi,$nama,$deskripsi,$bintang,$checkin,$checkout,$foto_hotel)
    {
        $query = $this->connection->prepare('INSERT INTO hotel (`paket_id`,`lokasi`,`nama_hotel`,`deskripsi`,`bintang`,`check_in`,`check_out`,foto_hotel) VALUES (?,?,?,?,?,?,?,?)');
        $query->execute([$paket_id, $lokasi, $nama, $deskripsi, $bintang, $checkin, $checkout,$foto_hotel]);
    return $query->rowCount();
    }

    public function saveHarga($paket_id, $nama_jenis,$diskon,$harga)
    {
        $query = $this->connection->prepare('INSERT INTO harga_paket (`paket_id`,`nama_jenis`,`diskon`,`harga`) VALUES (?,?,?,?)');
        $query->execute([$paket_id, $nama_jenis, $diskon, $harga]);
        return $query->rowCount();
    }

    public function getIdDesc()
    {
        return $this->connection->lastInsertId();
    }
}