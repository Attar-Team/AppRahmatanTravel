<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\KeberangkatanModel;
use Attar\App\Rahmatan\Travel\Model\PaketModel;

class KeberangkatanController
{
    private $keberangkatan;
    private $paket;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->keberangkatan = new KeberangkatanModel($connection);
        $this->paket = new PaketModel($connection);
    }

    public function index()
    {
        $data = $this->keberangkatan->get();
        $dataPaket = $this->paket->getPaket();
        View::render("Admin/header", ["title" => "Keberangkatan"]);
        View::render("Admin/keberangkatan", ["dataKeberangkatan" => $data,"dataPaket" => $dataPaket]);
        View::render("Admin/footer", []);
    }

    public function tambahKeberangkatan()
    {
        // var_dump($_POST);
        // die();
        try {
            $tgl_keberangkatan = str_replace('-"', '/', $_POST['tanggal_keberangkatan']);  
            $newTglKeberangkatan = date("Y-m-d", strtotime($tgl_keberangkatan));
            $tgl_ditutup = str_replace('-"', '/', $_POST['tanggal_ditutup']);  
            $newTglDitutup = date("Y-m-d", strtotime($tgl_ditutup));
            $data = [
                'paket_id' => $_POST['paket_id'],
                'tanggal_keberangkatan' => $newTglKeberangkatan,
                'seats' => $_POST['seats'],
                'tanggal_ditutup' => $newTglDitutup
            ];
            $save = $this->keberangkatan->save($data);
            if($save > 0){
                View::redirect("/admin/keberangkatan");
            }else{
                throw new ValidationException("data gagal di tambahkan");
            }
        } catch (\Throwable $e) {
            // View::render("/admin/keberangkatan", ["error" => $e->getMessage()]);
            throw new ValidationException($e);
            // View::redirect("/admin/keberangkatan");
        }
    }

    public function apiGetKeberangkatan()
    {
        try {
            $data = array_map(function ($keberangkatan) {
                return [
                    'id' => $keberangkatan['keberangkatan_id'],
                    'tanggal' => $keberangkatan['tanggal'],
                    'status' => $keberangkatan['status'],
                    'seats' => $keberangkatan['seats'],
                    'paket' => array_map(
                        fn ($paket) =>
                        [
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
                            ], $this->paket->getHargaPaket($keberangkatan["paket_id"])),
                            "hotel" => array_map(fn ($hotel) => [ 
                                'nama_hotel' => $hotel['nama_hotel'],
                                'deskripsi' => $hotel['deskripsi'],
                                'bintang' => $hotel['bintang'],
                                'foto_hotel'=> $hotel['foto_hotel']
                            ], $this->paket->getHotelPaket($keberangkatan['paket_id']))
                        ],
                        $this->paket->getPaketById($keberangkatan['paket_id'])
                    ),
                ];
            }, $this->keberangkatan->get());
            $result = [
                'status' => '200',
                'message' => 'success',
                'data' => $data
            ];
echo json_encode($result);
        } catch (\Exception $e) {
            http_response_code(404);
            $result = array(
                "status" => "Failed",
                "response" => 404,
                "message" => $e->getMessage()
            );
            echo json_encode($result);
        }
    }

    public function apiGetKeberangkatanById($id)
    {
        try {
            $data = array_map(function ($keberangkatan) {
                return [
                    'id' => $keberangkatan['keberangkatan_id'],
                    'tanggal' => $keberangkatan['tanggal'],
                    'status' => $keberangkatan['status'],
                    'seats' => $keberangkatan['seats'],
                    'paket' => array_map(
                        fn ($paket) =>
                        [
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
                            ], $this->paket->getHargaPaket($keberangkatan["paket_id"])),
                            "hotel" => array_map(fn ($hotel) => [ 
                                'nama_hotel' => $hotel['nama_hotel'],
                                'deskripsi' => $hotel['deskripsi'],
                                'bintang' => $hotel['bintang'],
                                // 'check_in' => $hotel['check_in'],
                                // 'check_out' => $hotel['check_out'],
                                'foto_hotel'=> $hotel['foto_hotel']
                            ], $this->paket->getHotelPaket($keberangkatan['paket_id']))
                        ],
                        $this->paket->getPaketById($keberangkatan['paket_id'])
                    ),
                ];
            }, $this->keberangkatan->getById($id));
            $result = [
                'status' => '200',
                'message' => 'success',
                'data' => $data
            ];
echo json_encode($result);
        } catch (\Exception $e) {
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
