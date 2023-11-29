<?php

namespace Attar\App\Rahmatan\Travel\Controller;
date_default_timezone_set("Asia/Jakarta");
use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\KeberangkatanModel;
use Attar\App\Rahmatan\Travel\Model\PemesananModel;

class PemesananController
{
    private $pemesanan;
    private $keberangkatan;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->pemesanan = new PemesananModel($connection);
        $this->keberangkatan = new KeberangkatanModel($connection);
    }

    public function index()
    {
        $pemesanan = $this->pemesanan->get();
        View::render("/Admin/header",["title"=> "Pemesanan"]);
        View::render("/Admin/pemesanan",["pemesanan" => $pemesanan]);
        View::render("/Admin/footer",[]);
    }

    public function viewVerifikasiPembayaran()
    {
        $detailPemesanan = $this->pemesanan->getDetailPembayaran();
        // var_dump($detailPemesanan); die();
        View::render("Admin/header",["title"=> "Verifikasi pembayaran"]);
        View::render("Admin/verifikasiPemesanan",['detailPemesanan' => $detailPemesanan]);
        View::render("Admin/footer",[]);
    }

    public function viewDetailPemesanan($idPemesanan)
    {
        $pemesanan = $this->pemesanan->getById($idPemesanan);
        if(count($pemesanan) == 0){
            View::redirect("/admin/pemesanan");
            exit();
        }
        $keberangkatan = $this->pemesanan->getForCicilanById($idPemesanan);
        // $detailPemesanan = $this->pemesanan->getDetailPemesanan($idPemesanan);
        $detailCustomerPemesanan = $this->pemesanan->getDetailCustomerPemesanan($idPemesanan);
        View::render("Admin/header",["title"=> "Pemesanan"]);
        View::render("Admin/detailPemesanan",['pemesanan' => $pemesanan,'detailCustomerPemesanan' => $detailCustomerPemesanan,'keberangkatan'=> $keberangkatan]);
        View::render("Admin/footer",[]);
    }

    public function tambahPemesanan()
    {
        // var_dump($_POST);
        // foreach($_POST['customer_id'] as $key => $value){
        //     $no = $key + 1;
        //             $data = explode(',',$_POST["$no"]);
        //             echo $value;
        //         }
        // die();

        try {
            $tanggal = date("Y-m-j h:i:s");
            $data = [
                "agen_id"=> $_POST["agen_id"],
                "keberangkatan_id"=> $_POST["keberangkatan_id"],
                "catatan_pemesanan"=> $_POST["catatan_pemesanan"],
                "jenis_pembayaran"=> "transfer",
                "status"=> "belum lunas",
                "tanggal"=> $tanggal,
                "jumlah_bayar"=> 0,
                "total_tagihan"=> $_POST["total_tagihan"]
            ];

            $tambahPemesanan = $this->pemesanan->save($data);
            if($tambahPemesanan["count"] > 0){
                $pemesananId = $tambahPemesanan["lastId"];
                foreach($_POST['customer_id'] as $key => $value){
                    $no = $key + 1;
                    $data = explode(',',$_POST["$no"]);
                    $this->pemesanan->saveDetailCustomerPemesanan($pemesananId,$value,$data[2]);
                }
            }
            
            View::redirect("/bukti-transfer/$pemesananId");
            
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage()) ;
        }
    }

    public function saveBuktiTransfer(){
        try {
            $tanggal = date("Y-m-j h:i:s");

            $filename = $_FILES['foto']['name'];
            $tmpname = $_FILES['foto']['tmp_name'];
            $filesize = $_FILES['foto']['size'];

            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
            $rename = 'bukti_transfer'.time().'.'.$formatfile;

            $allowedtype = array('png','jpeg','jpg','gif');

            if(!in_array($formatfile,$allowedtype)){
                throw new ValidationException('file tidak di izinkan');
            }elseif($filesize > 1000000){
                throw new ValidationException('ukuraan file tidak boleh lebih dari 1mb');
            }else{
                if (!file_exists("uploads/foto_bukti/")) {
                    mkdir("uploads/foto_bukti/", 0777, true);
                }
                move_uploaded_file($tmpname, "uploads/foto_bukti/" .$rename);
                $dataPemesanan = [
                    "pemesanan_id"=> $_POST["pemesanan_id"],
                    "jumlah_bayar"=> $_POST["jumlah_bayar"],
                    "status_verivikasi"=> "belum verivikasi",
                    "tanggal"=> $tanggal,
                    "catatan"=> $_POST["catatan"],
                    "foto_bukti"=> $rename
                ];
                $save = $this->pemesanan->saveBuktiTransfer($dataPemesanan);
                if($save){
                    View::redirect("/pemesanan-user");
                }else{
                    throw new ValidationException("Gagal ditambah");
                }
            }
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    // public function saveTambahCicilan()
    // {
    //     try {
    //         $tanggal = date("Y-m-j h:i:s");

    //         $filename = $_FILES['foto']['name'];
    //         $tmpname = $_FILES['foto']['tmp_name'];
    //         $filesize = $_FILES['foto']['size'];

    //         $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
    //         $rename = 'bukti_transfer'.time().'.'.$formatfile;

    //         $allowedtype = array('png','jpeg','jpg','gif');

    //         if(!in_array($formatfile,$allowedtype)){
    //             throw new ValidationException('file tidak di izinkan');
    //         }elseif($filesize > 1000000){
    //             throw new ValidationException('ukuraan file tidak boleh lebih dari 1mb');
    //         }else{
    //             if (!file_exists("uploads/foto_bukti/")) {
    //                 mkdir("uploads/foto_bukti/", 0777, true);
    //             }
    //             move_uploaded_file($tmpname, "uploads/bukti/" .$rename);
    //             $dataPemesanan = [
    //                 "pemesanan_id"=> $_POST["pemesanan_id"],
    //                 "jumlah_bayar"=> $_POST["jumlah_bayar"],
    //                 "status_verivikasi"=> "belum verivikasi",
    //                 "tanggal"=> $tanggal,
    //                 "catatan"=> $_POST["catatan"],
    //                 "foto_bukti"=> $rename
    //             ];
    //             $save = $this->pemesanan->saveBuktiTransfer($dataPemesanan);
    //             if($save){
    //                 View::redirect("/");
    //             }else{
    //                 throw new ValidationException("Gagal ditambah");
    //             }
    //         }
    //     } catch (\Throwable $th) {
    //         throw new ValidationException($th->getMessage());
    //     }
    // }

    public function invalidPemesanan($idPemesanan)
    {
        try {
            $check = $this->pemesanan->checkValid($idPemesanan);
            if(count($check) == 0) {
                $delete = $this->pemesanan->delete($idPemesanan);
                if($delete) {
                    echo "Berhasil di delete";
                } else {
                    echo "gagal di delete";
                }
            }else{
                echo "gausah delete";
            }
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage()) ;
        }
    }

    public function editStatusPembayaran()
    {
        try {
            $editStatus = $this->pemesanan->editStatusPembayaranDetailPemesanan($_POST);
            if($editStatus > 0) {
                if($_POST['status_verivikasi'] == "terverivikasi"){
                    $pemesanan = $this->pemesanan->getById($_POST['pemesanan_id']);
                foreach($pemesanan as $value) {
                    $sudahBayar = $value['sudah_bayar'];
                }
                $total = $sudahBayar + $_POST['jumlah_bayar'];
                $dataSudahBayar = [
                    'jumlah_bayar'=> $total,
                    'pemesanan_id'=> $_POST['pemesanan_id']
                ];
                $updateJumlahBayar = $this->pemesanan->updateJumlahBayarDetailPemesanan($_POST);
                $updateSudahBayar = $this->pemesanan->updateSudahBayar($dataSudahBayar);
                if($updateSudahBayar > 0 || $updateJumlahBayar > 0) {
                    $pemesanan = $this->pemesanan->getById($_POST['pemesanan_id']);
                    foreach($pemesanan as $value) {
                        $checkKurangBayar = $value['total_tagihan'] - $value['sudah_bayar'];
                    }
                    if($checkKurangBayar <= 0){
                        $dataStatus = [
                            'status'=> 'lunas',
                            'pemesanan_id'=> $_POST['pemesanan_id']
                        ];
                        $this->pemesanan->updateStatusPembayaranPemesanan($dataStatus);
                    }
                    View::redirect("/admin/verifikasi-pemesanan");
                } else {
                    throw new ValidationException("gagal update harga");
                }
                }else{
                    View::redirect("/admin/verifikasi-pemesanan");
                }
                
            }else{
                throw new ValidationException("gagal di update");
            }
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage()) ;
        }
    }

    public function apiTambahPemesanan()
    { 
        // foreach($_POST['customer'] as $key => $value){
        //     echo $_POST['harga'][$key];
        // }
        // die();
        try {
            $tanggal = date("Y-m-j h:i:s");
            $data = [
                "agen_id"=> str_replace('"', '', $_POST['agen_id']),
                "keberangkatan_id"=> str_replace('"', '', $_POST['keberangkatan_id']),
                "catatan_pemesanan"=> str_replace('"', '', $_POST['catatan_pemesanan']),
                "jenis_pembayaran"=> str_replace('"', '', $_POST['jenis_pembayaran']),
                "status"=> str_replace('"', '', $_POST['status']),
                "tanggal"=> $tanggal,
                "jumlah_bayar"=> 0,
                "total_tagihan"=> str_replace('"', '', $_POST['total_tagihan'])
            ];

            $tambahPemesanan = $this->pemesanan->save($data);
            if($tambahPemesanan["count"] > 0){
                $pemesananId = $tambahPemesanan["lastId"];
                foreach($_POST['customer'] as $key => $value){
                    $harga = $_POST['harga'][$key];
                    $this->pemesanan->saveDetailCustomerPemesanan($pemesananId,$value,$harga);
                }
            }
            http_response_code(201);
            $result = [
                'status'=> 201,
                'message'=> 'success'
            ];

            echo json_encode($result);
            
        } catch (ValidationException $th) {
            $result = [
                'status'=> 400,
                'message'=> 'failed',
                'information'=> $th->getMessage()
            ];
            echo json_encode($result);
        }   
    }
}