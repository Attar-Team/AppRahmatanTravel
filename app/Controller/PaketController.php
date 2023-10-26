<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\PaketModel;

class PaketController
{
    private $paket;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->paket = new PaketModel($connection);
    }

    public function index()
    {
        $data = $this->paket->getPaket();
        View::render("/Admin/header", ["title" => "Paket"]);
        View::render("/Admin/paket", ["dataPaket" => $data]);
        View::render("/Admin/footer", []);
    }

    public function viewTambahData()
    {
        View::render("/Admin/header", ["title" => "Paket"]);
        View::render("/Admin/tambahPaket", []);
        View::render("/Admin/footer", []);
    }

    public function tambahPaket()
    {

        try {
            
            $filename = $_FILES['foto_brosur']['name'];
            $tmpname = $_FILES['foto_brosur']['tmp_name'];
            $filesize = $_FILES['foto_brosur']['size'];

            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
            $rename = 'foto_brosur'.time().'.'.$formatfile;

            $allowedtype = array('png','jpeg','jpg','gif');

            if(!in_array($formatfile,$allowedtype)){
                throw new ValidationException('file tidak di izinkan');
            }elseif($filesize > 1000000){
                throw new ValidationException('ukuraan file tidak boleh lebih dari 1mb');
            }else{
                move_uploaded_file($tmpname, "uploads/foto_brosur/" .$rename);

                $dataTermasuk = implode(",",$_POST['harga_termasuk']);
                $dataTidakTermasuk = implode(',',$_POST['tidak_termasuk_harga']);
                $keunggulan = implode(',',$_POST['keunggulan']);
                $dataPaket= [
                    "nama"=> $_POST['nama_paket'],
                    'menu'=> $_POST['menu'],
                    'lama_hari'=> $_POST['durasi'],
                    'minim_dp'=> $_POST['minim_dp'],
                    'termasuk_harga'=> $dataTermasuk,
                    'tidak_termasuk_harga'=> $dataTidakTermasuk,
                    'keunggulan'=> $keunggulan,
                    'maskapai'=> $_POST['maskapai'],
                    'foto_brosur'=> $rename
                ];
                $tambahPaket = $this->paket->savePaket($dataPaket);
                if($tambahPaket['count'] > 0){
                    $lastId = $tambahPaket['lastId'];
                    for( $i = 0; $i < count($_POST['nama_jenis']); $i++ ) {
                        $this->paket->saveHarga($lastId,$_POST['nama_jenis'][$i],$_POST['diskon'][$i],$_POST['harga'][$i] );
                    }

                    
                    for($j = 0; $j < count($_POST['nama_hotel']); $j++){
                        $filename = $_FILES['foto_hotel']['name'][$j];
                        $tmpname = $_FILES['foto_hotel']['tmp_name'][$j];
                        $filesize = $_FILES['foto_hotel']['size'][$j];
            
                        $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                        $rename = 'foto_hotel'.time().$j.'.'.$formatfile;
            
                        $allowedtype = array('png','jpeg','jpg','gif');
            
                        if(!in_array($formatfile,$allowedtype)){
                            throw new ValidationException('file tidak di izinkan');
                        }elseif($filesize > 1000000){
                            throw new ValidationException('ukuraan file tidak boleh lebih dari 1mb');
                        }else{
                            move_uploaded_file($tmpname, "uploads/foto_hotel/" .$rename);
                            $dateCheckin = str_replace('-"', '/', $_POST['checkin'][$j]);  
                            $newDateIn = date("Y-m-d", strtotime($dateCheckin));  
                            $dateCheckOut = str_replace('-"', '/', $_POST['checkout'][$j]);  
                            $newDateOut = date("Y-m-d", strtotime($dateCheckOut));  
                            $this->paket->saveHotel($lastId,$_POST['lokasi'][$j],$_POST['nama_hotel'][$j],$_POST['deskripsi'][$j],$_POST['bintang'][$j],$newDateIn,$newDateOut,$rename);
                        }
                    }       
                    View::redirect('/admin/paket');
                }
            }
        } catch (\Exception $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function apiGetPaket()
    {
        try {
            $data = array_map(function ($paket) {
                return [
                    "nama" => $paket['nama'],
                    "menu" => $paket['menu'],
                    "lama_hari" => $paket['lama_hari'],
                    "minim_dp" => $paket['minim_dp'],
                    "termasuk_harga" => explode(",", $paket['termasuk_harga']),
                    "tidak_termasuk_harga" => explode(",", $paket['tidak_termasuk_harga']),
                    'harga' => array_map(fn ($harga) => [
                        'jenis' => $harga['nama_jenis'],
                        'diskon' => $harga['diskon'],
                        'harga' => $harga['harga']
                    ], $this->paket->getHargaPaket($paket["paket_id"])),
                    "hotel" => array_map(fn ($hotel) => [
                        'nama_hotel' => $hotel['nama_hotel'],
                        'deskripsi' => $hotel['deskripsi'],
                        'bintang' => $hotel['bintang'],
                        'check_in' => $hotel['check_in'],
                        'check_out' => $hotel['check_out']
                    ], $this->paket->getHotelPaket($paket['paket_id']))
                ];
            }, $this->paket->getPaket());
            $result = [
                                'status' => '200',
                                'message' => 'success',
                                'data' => $data
                            ];
            echo json_encode($result);
        } catch (\Throwable $e) {
            http_response_code(404);
                        $result = array(
                            "status" => "Failed",
                            "response" => 404,
                            "message" => $e->getMessage()
                        );
                        echo json_encode($result);
        }
    }
}
