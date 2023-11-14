<?php

namespace Attar\App\Rahmatan\Travel\Model;

class PaketModel
{
    private \PDO $connection;
    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }
    
    public function getById($id)
    {
        $query = $this->connection->prepare("SELECT * FROM paket JOIN hotel ON paket.paket_id = hotel.paket_id JOIN harga_paket ON paket.paket_id = harga_paket.paket_id WHERE paket_id = ?");
        $query->execute([$id]);
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getPaket()
    {
        $query = $this->connection->prepare("SELECT * FROM paket");
        $query->execute();
        return $query->fetchAll();
    }

    public function getPaketById($id)
    {
        $query = $this->connection->prepare("SELECT * FROM paket WHERE paket_id = ?");
        $query->execute([$id]);
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getHargaPaket($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM harga_paket WHERE paket_id = ?");
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function getHotelPaket($id)
    {
        $statement = $this->connection->prepare("SELECT * FROM hotel WHERE paket_id = ?");
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function savePaket(array $data)
    {
        $statement = $this->connection->prepare("INSERT INTO paket (`nama`,`menu`,`lama_hari`,`minim_dp`,`termasuk_harga`,`tidak_termasuk_harga`,`keunggulan`,`maskapai`,`foto_brosur`) VALUES (?,?,?,?,?,?,?,?,?)");
        $statement->execute([$data["nama"], $data["menu"], $data["lama_hari"],$data['minim_dp'],$data['termasuk_harga'],$data['tidak_termasuk_harga'],$data['keunggulan'],$data['maskapai'],$data['foto_brosur']]);
        $result = ['count'=> $statement->rowCount(),'lastId'=> $this->connection->lastInsertId()];
        return $result;
    }

    public function saveHotel($paket_id,$lokasi,$nama,$deskripsi,$bintang,$foto_hotel)
    {
        $statement = $this->connection->prepare('INSERT INTO hotel (`paket_id`,`lokasi`,`nama_hotel`,`deskripsi`,`bintang`,`foto_hotel`) VALUES (?,?,?,?,?,?)');
        $statement->execute([$paket_id, $lokasi, $nama, $deskripsi, $bintang,$foto_hotel]);
    return $statement->rowCount();
    }

    public function saveHarga($paket_id, $nama_jenis,$diskon,$harga)
    {
        $statement = $this->connection->prepare('INSERT INTO harga_paket (`paket_id`,`nama_jenis`,`diskon`,`harga`) VALUES (?,?,?,?)');
        $statement->execute([$paket_id, $nama_jenis, $diskon, $harga]);
        return $statement->rowCount();
    }

    public function updatePaket($data)
    {
        $statement = $this->connection->prepare('UPDATE paket SET nama = ?, menu = ?, lama_hari = ?, minim_dp = ?, termasuk_harga = ?, tidak_termasuk_harga = ?, keunggulan = ?, maskapai = ?, foto_brosur = ? WHERE paket_id = ?');
        $statement->execute([$data["nama"], $data["menu"], $data["lama_hari"],$data['minim_dp'],$data['termasuk_harga'],$data['tidak_termasuk_harga'],$data['keunggulan'],$data['maskapai'],$data['foto_brosur'],$data['paket_id']]);
        return $statement->rowCount();
    }

    public function deleteHargaPaket($id)
    {
        $statement = $this->connection->prepare('DELETE FROM harga_paket WHERE paket_id = ?');
        $statement->execute([$id]);
        return $statement->rowCount();
    }
    public function deleteHargaById($id)
    {
        $statement = $this->connection->prepare('DELETE FROM harga_paket WHERE paket_id = ?');
        $statement->execute([$id]);
        return $statement->rowCount();
    }
    public function updateHotel($nama,$deskripsi,$bintang,$foto_hotel,$hotel_id)
    {
        $statement = $this->connection->prepare('UPDATE hotel SET nama_hotel = ?, deskripsi = ?, bintang = ?,foto_hotel = ? WHERE hotel_id = ?');
        $statement->execute([$nama, $deskripsi, $bintang, $foto_hotel,$hotel_id]);
    }

    public function deletePaket($id)
    {
        $statement = $this->connection->prepare('DELETE FROM paket WHERE paket_id = ?');
        $statement->execute([$id]);
        return $statement->rowCount();
    }

    public function deleteHotel($id)
    {
        $statement = $this->connection->prepare('DELETE FROM hotel WHERE paket_id = ?');
        $statement->execute([$id]);
        return $statement->rowCount();
    }
}