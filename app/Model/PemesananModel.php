<?php

namespace Attar\App\Rahmatan\Travel\Model;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;

class PemesananModel
{
    private \PDO $connection;
    public function __construct(\PDO $conection)
    {
        $this->connection = $conection;
    }

    public function get()
    {
        $query = $this->connection->prepare("SELECT * FROM pemesanan LEFT JOIN detail_customer_pemesan ON pemesanan.pemesanan_id = detail_customer_pemesan.pemesanan_id LEFT JOIN customer ON detail_customer_pemesan.customer_id = customer.NIK JOIN keberangkatan ON pemesanan.keberangkatan_id = keberangkatan.keberangkatan_id GROUP BY pemesanan.pemesanan_id");
        $query->execute();
        return $query->fetchAll();
    }

    public function getDetailPemesananById($id)
    {
        $query = $this->connection->prepare("SELECT * FROM pemesanan LEFT JOIN detail_customer_pemesan ON pemesanan.pemesanan_id = detail_customer_pemesan.pemesanan_id LEFT JOIN customer ON detail_customer_pemesan.customer_id = customer.NIK LEFT JOIN keberangkatan ON pemesanan.keberangkatan_id = keberangkatan.keberangkatan_id LEFT JOIN paket ON keberangkatan.paket_id = paket.paket_id WHERE pemesanan.pemesanan_id = ? GROUP BY pemesanan.pemesanan_id");
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function getPemesananByCustomer($idCustomer)
    {
        $query = $this->connection->prepare("SELECT * FROM pemesanan JOIN detail_customer_pemesan ON pemesanan.pemesanan_id = detail_customer_pemesan.pemesanan_id LEFT JOIN customer ON detail_customer_pemesan.customer_id = customer.NIK LEFT JOIN keberangkatan ON pemesanan.keberangkatan_id = keberangkatan.keberangkatan_id JOIN paket ON keberangkatan.paket_id = paket.paket_id  WHERE customer.user_id = ? GROUP BY pemesanan.pemesanan_id");
        $query->execute([$idCustomer]);
        return $query->fetchAll();
    }

    public function getById($id)
    {
        $query = $this->connection->prepare("SELECT * FROM pemesanan WHERE pemesanan.pemesanan_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function getForCicilanById($id)
    {
        $query = $this->connection->prepare("SELECT * FROM pemesanan JOIN keberangkatan ON pemesanan.keberangkatan_id = keberangkatan.keberangkatan_id WHERE pemesanan.pemesanan_id  = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }

    // public function getDetailPemesanan($id)
    // {
    //     $query = $this->connection->prepare("SELECT * FROM pemesanan JOIN detail_pemesanan ON pemesanan.pemesanan_id = detail_pemesanan.pemesanan_id WHERE pemesanan.pemesanan_id = ?");
    //     $query->execute([$id]);
    //     return $query->fetchAll();
    // }

    public function getByTanggal($tanggal_awal, $tanggal_akhir)
    {
        $query = $this->connection->prepare("SELECT * FROM pemesanan LEFT JOIN detail_customer_pemesan ON pemesanan.pemesanan_id = detail_customer_pemesan.pemesanan_id LEFT JOIN customer ON detail_customer_pemesan.customer_id = customer.NIK JOIN keberangkatan ON pemesanan.keberangkatan_id = keberangkatan.keberangkatan_id WHERE tanggal_pemesanan BETWEEN ? AND ? GROUP BY pemesanan.pemesanan_id");
        $query->execute([$tanggal_awal,$tanggal_akhir]);
        return $query->fetchAll();
    }

    public function getDetailCustomerPemesanan($id)
    {
        $query = $this->connection->prepare("SELECT * FROM detail_customer_pemesan LEFT JOIN customer on detail_customer_pemesan.customer_id = customer.NIK LEFT JOIN harga_paket ON detail_customer_pemesan.harga_paket_id = harga_paket.harga_paket_id LEFT JOIN paket ON harga_paket.paket_id = paket.paket_id WHERE detail_customer_pemesan.pemesanan_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }
    public function getDetailPembayaran()
    {
        $query = $this->connection->prepare("SELECT * FROM detail_pemesanan JOIN pemesanan ON detail_pemesanan.pemesanan_id = pemesanan.pemesanan_id LEFT JOIN detail_customer_pemesan ON pemesanan.pemesanan_id = detail_customer_pemesan.pemesanan_id LEFT JOIN customer ON detail_customer_pemesan.customer_id = customer.NIK GROUP BY detail_pemesanan.detail_pemesanan_id ORDER BY tanggal ASC");
        $query->execute();
        return $query->fetchAll();
    }

    public function getRiwayatPembayaran($id)
    {
        $query = $this->connection->prepare("SELECT * FROM detail_pemesanan WHERE pemesanan_id = ?");
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function getByStatus($status,$user_id)
    {
        $query = $this->connection->prepare("SELECT * FROM pemesanan JOIN detail_customer_pemesan ON pemesanan.pemesanan_id = detail_customer_pemesan.pemesanan_id JOIN customer ON detail_customer_pemesan.customer_id = customer.NIK JOIN keberangkatan ON pemesanan.keberangkatan_id = keberangkatan.keberangkatan_id JOIN paket ON keberangkatan.paket_id = paket.paket_id WHERE pemesanan.status = ? AND customer.user_id = ? GROUP BY pemesanan.pemesanan_id");
        $query->execute([$status,$user_id]);
        return $query->fetchAll();
    }

    public function getByKeberangkatan($id)
    {
        $query = $this->connection->prepare("SELECT * FROM pemesanan WHERE keberangkatan_id = ?");
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
       try {
        $query = $this->connection->prepare("DELETE FROM pemesanan WHERE pemesanan_id = ?");
        $query->execute([$id]);
        return $query->rowCount();
       } catch (\Throwable $th) {
        throw  new ValidationException($th->getMessage());
       }
    }

    public function deleteDetail($id)
    {
       try {
        $query = $this->connection->prepare("DELETE FROM detail_pemesanan WHERE pemesanan_id = ?");
        $query->execute([$id]);
        return $query->rowCount();
       } catch (\Throwable $th) {
        throw  new ValidationException($th->getMessage());
       }
    }

    public function deletedetailCustomer($id)
    {
       try {
        $query = $this->connection->prepare("DELETE FROM detail_customer_pemesan WHERE pemesanan_id = ?");
        $query->execute([$id]);
        return $query->rowCount();
       } catch (\Throwable $th) {
        throw  new ValidationException($th->getMessage());
       }
    }

    public function save($data){
        try {
            $statement = $this->connection->prepare("INSERT INTO pemesanan (`agen_id`,`keberangkatan_id`,`jenis_pembayaran`, `status`, `tanggal_pemesanan`, `catatan_pemesanan`, `sudah_bayar`, `total_tagihan`) VALUES (?,?,?,?,?,?,?,?)");
        $statement->execute([$data['agen_id'],$data['keberangkatan_id'],$data['jenis_pembayaran'],$data['status'],$data['tanggal'],$data['catatan_pemesanan'],$data['jumlah_bayar'],$data['total_tagihan']]);
        $result = ['count'=> $statement->rowCount(),'lastId'=> $this->connection->lastInsertId()];
        return $result;
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function saveBuktiTransfer($data)
    {
        try {
            $statement = $this->connection->prepare('INSERT INTO detail_pemesanan (`pemesanan_id`,`jumlah_bayar`,`status_verivikasi`,`tanggal`,`catatan`,`foto_bukti`) VALUES (?,?,?,?,?,?)');
        $statement->execute([$data['pemesanan_id'],$data['jumlah_bayar'],$data['status_verivikasi'],$data['tanggal'],$data['catatan'],$data['foto_bukti']]);
        return $statement->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function saveDetailCustomerPemesanan($pemesanan_id,$customer_id,$harga_paket_id)
    {
        try {
            $statement = $this->connection->prepare('INSERT INTO detail_customer_pemesan (`pemesanan_id`, `customer_id`, `harga_paket_id`) VALUES (?,?,?)');
        $statement->execute([$pemesanan_id,$customer_id,$harga_paket_id]);
        return $statement->rowCount();
        } catch (\Throwable $th) {
           throw new ValidationException($th->getMessage());
        }
    }

    public function editStatusPembayaranDetailPemesanan($data)
    {
        try {
            $statement = $this->connection->prepare('UPDATE detail_pemesanan SET status_verivikasi = ? WHERE detail_pemesanan_id = ?');
        $statement->execute([$data['status_verivikasi'], $data['detail_pemesanan_id']]);
        return $statement->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function updateJumlahBayarDetailPemesanan($data)
    {
        try {
            $statement = $this->connection->prepare('UPDATE detail_pemesanan SET jumlah_bayar = ? WHERE detail_pemesanan_id = ?');
        $statement->execute([$data['jumlah_bayar'], $data['detail_pemesanan_id']]);
        return $statement->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function updateSudahBayar($data)
    {
        try {
            $statement = $this->connection->prepare('UPDATE pemesanan SET sudah_bayar = ? WHERE pemesanan_id = ?');
        $statement->execute([$data['jumlah_bayar'], $data['pemesanan_id']]);
        return $statement->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function updateStatusPembayaranPemesanan($data)
    {
        try {
            $statement = $this->connection->prepare('UPDATE pemesanan SET status = ? WHERE pemesanan_id = ?');
        $statement->execute([$data['status'], $data['pemesanan_id']]);
        return $statement->rowCount();
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }
}