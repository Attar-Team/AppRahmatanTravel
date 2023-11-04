<?php

namespace Attar\App\Rahmatan\Travel\Model;

class CustomerModel
{
    private \PDO $connection;
    
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function get()
    {
        $query = $this->connection->prepare("SELECT * FROM customer");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = $this->connection->prepare("SELECT * FROM customer LEFT JOIN user ON customer.user_id = user.userId LEFT JOIN pasport ON customer.NIK = pasport.customer_id LEFT JOIN dokumen ON customer.NIK = dokumen.customer_id WHERE NIK = ?");
        $query->execute([$id]);
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    // public function getPasportById($id)
    // {
    //     $query = $this->connection->prepare("SELECT * FROM pasport  WHERE customer_id = ?");
    //     $query->execute([$id]);
    //     return $query->fetchAll(\PDO::FETCH_OBJ);
    // }

    // public function getDokumenById($id)
    // {
    //     $query = $this->connection->prepare("SELECT * FROM dokumen  WHERE customer_id = ?");
    //     $query->execute([$id]);
    //     return $query->fetchAll(\PDO::FETCH_OBJ);
    // }
     
    public function save(array $data)
    {
        $query = $this->connection->prepare("INSERT INTO customer (`NIK`,`user_id`,`nama`,`tempat_lahir`,`tanggal_lahir`,`alamat`,`jenis_kelamin`,`pekerjaan`,`ukuran_baju`,`no_telp`,`foto`) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        $query->execute([$data['NIK'],$data['user_id'],$data['nama'],$data['tempat_lahir'],$data['tanggal_lahir'],$data['alamat'],$data['jenis_kelamin'],$data['pekerjaan'],$data['ukuran_baju'],$data['no_telp'],$data['foto']]);
        $result = ['count'=> $query->rowCount(),'lastId'=> $this->connection->lastInsertId()];
        return $result;
    }

    public function savePasport(array $data)
    {
        $query = $this->connection->prepare('INSERT INTO pasport (`nomor_pasport`, `customer_id`, `nama_pasport`, `tempat_penerbitan`, `tgl_penerbitan`) VALUES (?,?,?,?,?)');
        $query->execute([$data["nomor_pasport"],$data["customer_id"],$data["nama_pasport"],$data["tempat_penerbitan"],$data["tgl_penerbitan"]]);
        return $query->rowCount();
    }

    public function saveDocument($id, $data)
    {
        $query = $this->connection->prepare('INSERT INTO dokumen (`customer_id`, `foto_ktp`, `foto_kartu_keluarga`, `foto_paspor`, `foto_paspor_hal2`, `foto_buku_rekening`, `foto_akte_kelahiran`, `foto_buku_pernikahan`, `foto_bpjs`) VALUES(?,?,?,?,?,?,?,?,?)');
        $query->execute([$id,$data['ktp'],$data['keluarga'],$data['paspor'],$data['paspor2'],"",$data['akte'],"",$data['bpjs']]);
        $query->closeCursor();
        return $query->rowCount();

    }

    public function updateCustomer($data,$date,$foto)
    {
        $query = $this->connection->prepare('UPDATE customer SET nama = ?, tempat_lahir = ?, tanggal_lahir = ?, alamat = ?, jenis_kelamin = ?, pekerjaan = ?, ukuran_baju = ?, no_telp = ?, foto = ? WHERE NIK = ?');
        $query->execute([$data['nama'],$data['tempat_lahir'],$date,$data['alamat'],$data['jenis_kelamin'],$data['pekerjaan'],$data['ukuran_baju'],$data['no_telp'],$foto,$data['NIK']]);
        $query->closeCursor();
        return $query->rowCount();
    }

    public function updatePasport($data, $date)
    {
        $query = $this->connection->prepare('UPDATE pasport SET nama_pasport = ?, tempat_penerbitan = ?, tgl_penerbitan = ?, nomor_pasport = ? WHERE customer_id = ?');
        $query->execute([$data['nama_pasport'],$data['tempat_penerbitan'],$date,$data['nomor_pasport'],$data['NIK']]);
        $query->closeCursor();
        return $query->rowCount();
    }

    public function updateDocument($id,$data)
    {
        $query = $this->connection->prepare('UPDATE dokumen SET foto_ktp = ?, foto_kartu_keluarga = ?, foto_paspor = ?, foto_paspor_hal2 = ?, foto_buku_rekening = ?, foto_akte_kelahiran = ?, foto_buku_pernikahan = ?, foto_bpjs = ? WHERE customer_id = ?');
        $query->execute([$data['ktp'],$data['keluarga'],$data['paspor'],$data['paspor2'],"",$data['akte'],"",$data['bpjs'],$id]);
        $query->closeCursor();
        return $query->rowCount();
    }

    public function deleteCustomer($id)
    {
        $query = $this->connection->prepare('DELETE FROM customer WHERE NIK = ?');
        $query->execute([$id]);
        $query->closeCursor();
        return $query->rowCount();
    }

    public function deletePasport($id)
    {
        $query = $this->connection->prepare('DELETE FROM pasport WHERE customer_id = ?');
        $query->execute([$id]);
        $query->closeCursor();
        return $query->rowCount();
    }

    public function deleteDokument($id)
    {
        $query = $this->connection->prepare('DELETE FROM dokumen WHERE customer_id = ?');
        $query->execute([$id]);
        $query->closeCursor();
        return $query->rowCount();
    }
    

    // public function save()
    // {

    // }
}