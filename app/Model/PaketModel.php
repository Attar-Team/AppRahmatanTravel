<?php

namespace Attar\App\Rahmatan\Travel\Model;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;

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

    public function getBintangHotel($id)
    {
        $statement = $this->connection->prepare("SELECT bintang FROM hotel WHERE paket_id = ? LIMIT 1");
        $statement->execute([$id]);
        return $statement->fetchAll();
    }

    public function savePaket(array $data)
    {
        try {
            $statement = $this->connection->prepare("INSERT INTO paket (`nama`,`menu`,`lama_hari`,`minim_dp`,`termasuk_harga`,`tidak_termasuk_harga`,`keunggulan`,`maskapai`,`foto_brosur`) VALUES (?,?,?,?,?,?,?,?,?)");
        $statement->execute([$data["nama"], $data["menu"], $data["lama_hari"],$data['minim_dp'],$data['termasuk_harga'],$data['tidak_termasuk_harga'],$data['keunggulan'],$data['maskapai'],$data['foto_brosur']]);
        $result = ['count'=> $statement->rowCount(),'lastId'=> $this->connection->lastInsertId()];
        return $result;
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function saveHotel($paket_id,$lokasi,$nama,$deskripsi,$bintang,$foto_hotel)
    {
        try {
            $statement = $this->connection->prepare('INSERT INTO hotel (`paket_id`,`lokasi`,`nama_hotel`,`deskripsi`,`bintang`,`foto_hotel`) VALUES (?,?,?,?,?,?)');
        $statement->execute([$paket_id, $lokasi, $nama, $deskripsi, $bintang,$foto_hotel]);
    return $statement->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function saveHarga($paket_id, $nama_jenis,$diskon,$harga)
    {
        try {
            $statement = $this->connection->prepare('INSERT INTO harga_paket (`paket_id`,`nama_jenis`,`diskon`,`harga`) VALUES (?,?,?,?)');
        $statement->execute([$paket_id, $nama_jenis, $diskon, $harga]);
        return $statement->rowCount();
        } catch (\Throwable $th) {
           throw new ValidationException($th->getMessage());
        }
    }

    public function updatePaket($data)
    {
        try {
            $statement = $this->connection->prepare('UPDATE paket SET nama = ?, menu = ?, lama_hari = ?, minim_dp = ?, termasuk_harga = ?, tidak_termasuk_harga = ?, keunggulan = ?, maskapai = ?, foto_brosur = ? WHERE paket_id = ?');
        $statement->execute([$data["nama"], $data["menu"], $data["lama_hari"],$data['minim_dp'],$data['termasuk_harga'],$data['tidak_termasuk_harga'],$data['keunggulan'],$data['maskapai'],$data['foto_brosur'],$data['paket_id']]);
        return $statement->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function deleteHargaPaket($id)
    {
        try {
            $statement = $this->connection->prepare('DELETE FROM harga_paket WHERE paket_id = ?');
        $statement->execute([$id]);
        return $statement->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }
    public function deleteHargaById($id)
    {
        try {
            $statement = $this->connection->prepare('DELETE FROM harga_paket WHERE paket_id = ?');
        $statement->execute([$id]);
        return $statement->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }
    public function updateHotel($nama,$deskripsi,$bintang,$foto_hotel,$hotel_id)
    {
        try {
            $statement = $this->connection->prepare('UPDATE hotel SET nama_hotel = ?, deskripsi = ?, bintang = ?,foto_hotel = ? WHERE hotel_id = ?');
        $statement->execute([$nama, $deskripsi, $bintang, $foto_hotel,$hotel_id]);
        return $statement->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function deletePaket($id)
    {
        try {
            $statement = $this->connection->prepare('DELETE FROM paket WHERE paket_id = ?');
        $statement->execute([$id]);
        return $statement->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function deleteHotel($id)
    {
        try {
            $statement = $this->connection->prepare('DELETE FROM hotel WHERE paket_id = ?');
        $statement->execute([$id]);
        return $statement->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }
}