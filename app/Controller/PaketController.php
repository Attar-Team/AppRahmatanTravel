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

    public function viewEditData($id)
    {
        $dataPaket = $this->paket->getPaketById($id);
        $dataHotel = $this->paket->getHotelPaket($id);
        $dataHarga = $this->paket->getHargaPaket($id);
        View::render("/Admin/header", ["title" => "Paket"]);
        View::render("/Admin/editPaket", ["dataPaket" => $dataPaket,"dataHotel" => $dataHotel,"dataHarga"=> $dataHarga]);
        View::render("/Admin/footer", []);
    }

    public function viewDetailData($id)
    {
        $dataPaket = $this->paket->getPaketById($id);
        $dataHotel = $this->paket->getHotelPaket($id);
        $dataHarga = $this->paket->getHargaPaket($id);
        View::render("/Admin/header", ["title" => "Paket"]);
        View::render("/Admin/detailPaket", ["dataPaket" => $dataPaket,"dataHotel" => $dataHotel,"dataHarga"=> $dataHarga]);
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
                            // $dateCheckin = str_replace('-"', '/', $_POST['checkin'][$j]);  
                            // $newDateIn = date("Y-m-d", strtotime($dateCheckin));  
                            // $dateCheckOut = str_replace('-"', '/', $_POST['checkout'][$j]);  
                            // $newDateOut = date("Y-m-d", strtotime($dateCheckOut));  
                            $this->paket->saveHotel($lastId,$_POST['lokasi'][$j],$_POST['nama_hotel'][$j],$_POST['deskripsi'][$j],$_POST['bintang'][$j],$rename);
                        }
                    }       
                    View::redirect('/admin/paket');
                }
            }
        } catch (\Exception $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function editPaket()
    {
        try {
            $paket_id = $_POST['paket_id'];

            if($_FILES['foto_brosur_update']['name']!= ''){
                $filename_brosur  = $_FILES['foto_brosur_update']['name'];
                $tmpname_brosur   = $_FILES['foto_brosur_update']['tmp_name'];
                $filesize_brosur  = $_FILES['foto_brosur_update']['size'];

                $formatfile_brosur    = pathinfo($filename_brosur, PATHINFO_EXTENSION);
                $foto_brosur        = 'foto_brosur'.time().'.'.$formatfile_brosur;
                $allowedtype_update1   = array('png','jpeg','jpg','gif');

                if(!in_array($formatfile_brosur,$allowedtype_update1)){
                    throw new ValidationException('file tidak di izinkan');
                }elseif($filesize_brosur > 1000000){
                    throw new ValidationException('ukuraan file tidak boleh lebih dari 1mb');
                }else{
                    if(file_exists("uploads/foto_brosur/" .$_POST['foto_brosur'])){
                        unlink("uploads/foto_brosur/" .$_POST['foto_brosur']);
                    }
                }

                move_uploaded_file($tmpname_brosur, "uploads/foto_brosur/" .$foto_brosur);
            }else{

                $foto_brosur = $_POST['foto_brosur'];
            }
            $dataTermasuk = implode(",",$_POST['harga_termasuk']);
                $dataTidakTermasuk = implode(',',$_POST['tidak_termasuk_harga']);
                $keunggulan = implode(',',$_POST['keunggulan']);
            $dataPaket = [
                'nama'=> $_POST['nama_paket'],
                'menu'=> $_POST['menu'],
                    'lama_hari'=> $_POST['durasi'],
                    'minim_dp'=> $_POST['minim_dp'],
                    'termasuk_harga'=> $dataTermasuk,
                    'tidak_termasuk_harga'=> $dataTidakTermasuk,
                    'keunggulan'=> $keunggulan,
                    'maskapai'=> $_POST['maskapai'],
                    'foto_brosur'=> $foto_brosur,
                    'paket_id'=> $paket_id
            ];

            $updatePaket = $this->paket->updatePaket($dataPaket);
            $deleteHarga = $this->paket->deleteHargaPaket($_POST['paket_id']);
            if(!$deleteHarga && $updatePaket){
                throw new ValidationException('Data gagal di update');
            }
            for( $i = 0; $i < count($_POST['nama_jenis']); $i++ ) {
                $this->paket->saveHarga($paket_id,$_POST['nama_jenis'][$i],$_POST['diskon'][$i],$_POST['harga'][$i] );
            }

            for($j = 0; $j < count($_POST['nama_hotel']); $j++){
                if($_FILES['foto_hotel_update']['name'][$j]!= ''){
                    $filename_hotel  = $_FILES['foto_hotel_update']['name'][$j];
                    $tmpname_hotel   = $_FILES['foto_hotel_update']['tmp_name'][$j];
                    $filesize_hotel  = $_FILES['foto_hotel_update']['size'][$j];
    
                    $formatfile_hotel    = pathinfo($filename_hotel, PATHINFO_EXTENSION);
                    $foto_hotel        = 'foto_hotel'.time().'.'.$formatfile_hotel;
                    $allowedtype_hotel   = array('png','jpeg','jpg','gif');
    
                    if(!in_array($formatfile_hotel,$allowedtype_hotel)){
                        throw new ValidationException('file tidak di izinkan');
                    }elseif($filesize_hotel > 1000000){
                        throw new ValidationException('ukuraan file tidak boleh lebih dari 1mb');
                    }else{
                        if(file_exists("uploads/foto_hotel/" .$_POST['foto_hotel'][$j])){
                            unlink("uploads/foto_hotel/" .$_POST['foto_hotel'][$j]);
                        }
                    }
                    move_uploaded_file($tmpname_hotel, "uploads/foto_hotel/" .$foto_hotel);
                }else{
                    $foto_hotel = $_POST['foto_hotel'][$j];
                }
                // $dateCheckin = str_replace('-"', '/', $_POST['checkin'][$j]);  
                //             $newDateIn = date("Y-m-d", strtotime($dateCheckin));  
                //             $dateCheckOut = str_replace('-"', '/', $_POST['checkout'][$j]);  
                //             $newDateOut = date("Y-m-d", strtotime($dateCheckOut));  
                $this->paket->updateHotel($_POST['nama_hotel'][$j],$_POST['deskripsi'][$j],$_POST['bintang'][$j],$foto_hotel,$_POST['hotel_id'][$j]);
            }
            View::redirect('/admin/paket');

        } catch (\Throwable $e) {
            throw new ValidationException($e->getMessage());
        }
    }
    public function deleteHarga($id, $hotel_id)
    {
        try {
            $delete = $this->paket->deleteHargaById($hotel_id);
            if($delete > 0){
                View::redirect("/admin/edit-paket/$id");
            }else{
                throw new \Exception("salah");
            }
        } catch (\Throwable $e) {
            throw new ValidationException($e->getMessage());
        }
    }

    public function hapusPaket($id)
    {
        try {
            $hapusPaket = $this->paket->deletePaket($id);
            $hapusHarga = $this->paket->deleteHargaPaket($id);
            $hapusHotel = $this->paket->deleteHotel($id);

            if( $hapusPaket > 0 || $hapusHarga > 0 || $hapusHotel > 0){
                View::redirect("/admin/paket");
            }else{
                throw new ValidationException('data gagal di delete');
            }
        } catch (\Throwable $e) {
            throw new ValidationException($e->getMessage());
        }
    }
    public function apiGetPaket()
    {
        try {
            $data = array_map(function ($paket) {
                return [
                    "paket_id" => $paket["paket_id"],
                    "nama" => $paket['nama'],
                    "menu" => $paket['menu'],
                    "lama_hari" => $paket['lama_hari'],
                    "minim_dp" => $paket['minim_dp'],
                    "termasuk_harga" => explode(",", $paket['termasuk_harga']),
                    "tidak_termasuk_harga" => explode(",", $paket['tidak_termasuk_harga']),
                    "keunggulan" => $paket["keunggulan"],
                    "foto_paket" => $paket["foto_brosur"],
                    'harga' => array_map(fn ($harga) => [
                        'jenis' => $harga['nama_jenis'],
                        'diskon' => $harga['diskon'],
                        'harga' => $harga['harga']
                    ], $this->paket->getHargaPaket($paket["paket_id"])),
                    "hotel" => array_map(fn ($hotel) => [ 
                        'nama_hotel' => $hotel['nama_hotel'],
                        'deskripsi' => $hotel['deskripsi'],
                        'bintang' => $hotel['bintang'],
                        // 'check_in' => $hotel['check_in'],
                        // 'check_out' => $hotel['check_out'],
                        'foto_hotel'=> $hotel['foto_hotel']
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

    public function apiGetPaketById($id)
    {
        try {
            $data = array_map(function ($paket) {
                return [
                    "paket_id" => $paket->paket_id,
                    "nama" => $paket->nama,
                    "menu" => $paket->menu,
                    "lama_hari" => $paket->lama_hari,
                    "minim_dp" => $paket->minim_dp,
                    "termasuk_harga" => explode(",", $paket->termasuk_harga),
                    "tidak_termasuk_harga" => explode(",", $paket->tidak_termasuk_harga),
                    "keunggulan" => $paket->keunggulan,
                    "foto_paket" => $paket->foto_brosur,
                    'harga' => array_map(fn ($harga) => [
                        'jenis' => $harga['nama_jenis'],
                        'diskon' => $harga['diskon'],
                        'harga' => $harga['harga']
                    ], $this->paket->getHargaPaket($paket->paket_id)),
                    "hotel" => array_map(fn ($hotel) => [ 
                        'nama_hotel' => $hotel['nama_hotel'],
                        'deskripsi' => $hotel['deskripsi'],
                        'bintang' => $hotel['bintang'],
                        // 'check_in' => $hotel['check_in'],
                        // 'check_out' => $hotel['check_out'],
                        'foto_hotel'=> $hotel['foto_hotel']
                    ], $this->paket->getHotelPaket($paket->paket_id))
                ];
            }, $this->paket->getPaketById($id));
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
