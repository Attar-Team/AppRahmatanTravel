<?php

namespace Attar\App\Rahmatan\Travel\Controller;
date_default_timezone_set("Asia/Jakarta");
use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\PemesananModel;

class PemesananController
{
    private $pemesanan;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->pemesanan = new PemesananModel($connection);
    }

    public function index()
    {
        View::render("/Admin/header",["title"=> "Pemesanan"]);
        View::render("/Admin/pemesanan",[]);
        View::render("/Admin/footer",[]);
    }

    public function viewVerifikasiPembayaran()
    {
        View::render("Admin/header",["title"=> "Verifikasi pembayaran"]);
        View::render("Admin/verifikasiPemesanan",[]);
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
                "catatan_pemesanan"=> $_POST["catatan_pemesanan"],
                "jenis_pembayaran"=> $_POST["jenis_pembayaran"],
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
                    $this->pemesanan->saveDetailPemesanan($pemesananId,$data[2],$value);
                }
            }
            
            View::redirect("/");
            
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage()) ;
        }
    }
}