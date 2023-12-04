<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\KeberangkatanModel;
use Attar\App\Rahmatan\Travel\Model\PaketModel;
use Attar\App\Rahmatan\Travel\Model\PemesananModel;

class KeberangkatanController
{
    private $keberangkatan;
    private $paket;
    private $pemesanan;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->keberangkatan = new KeberangkatanModel($connection);
        $this->paket = new PaketModel($connection);
        $this->pemesanan = new PemesananModel($connection);
    }

    public function index()
    {
        $data = $this->keberangkatan->get();
        $dataPaket = $this->paket->getPaket();
        View::render("Admin/header", ["title" => "Keberangkatan"]);
        View::render("Admin/keberangkatan", ["dataKeberangkatan" => $data, "dataPaket" => $dataPaket]);
        View::render("Admin/footer", []);
    }

    public function viewDetailData($id)
    {
        $data = $this->keberangkatan->getById($id);
        foreach ($data as $d) {
            $paket_id = $d->paket_id;
        }
        $dataPaket = $this->paket->getPaketById($paket_id);
        $dataHotel = $this->paket->getHotelPaket($paket_id);
        $dataHarga = $this->paket->getHargaPaket($paket_id);
        $pemesanan = $this->pemesanan->getByKeberangkatan($id);
        View::render("Admin/header", ["title" => "Keberangkatan"]);
        View::render("Admin/detailKeberangkatan", [
            "dataKeberangkatan" => $data,
            "dataPaket" => $dataPaket,
            "dataHarga"=> $dataHarga,
            "dataHotel"=> $dataHotel,
            "pemesanan"=> $pemesanan
        ]);
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
                'keberangkatan_dari'=> $_POST['keberangkatan_dari'],
                'seats' => $_POST['seats'],
                'tanggal_ditutup' => $newTglDitutup
            ];
            $save = $this->keberangkatan->save($data);
            if ($save > 0) {
                $data = $this->keberangkatan->get();
                View::setFlasher('success','Berhasil','Data berhasil di tambahkan');
            View::redirect('/admin/keberangkatan');
            } else {
                throw new ValidationException("data gagal di tambahkan");
            }
        } catch (ValidationException $e) {
            View::setFlasher('warning','Gagal',$e->getMessage());
            View::redirect('/admin/keberangkatan');
        }
    }

    public function editKeberangkatan()
    {
        try {
            $dateTanggal = str_replace('-"', '/', $_POST['tanggal']);
            $newDateTanggal = date("Y-m-d", strtotime($dateTanggal));
            $dateDitutup = str_replace('-"', '/', $_POST['tanggal_ditutup']);
            $newDateTutup = date("Y-m-d", strtotime($dateDitutup));

            $data = [
                "paket_id" => $_POST["paket_id"],
                "tanggal" => $newDateTanggal,
                "tanggal_ditutup" => $newDateTutup,
                "keberangkatan_dari"=> $_POST["keberangkatan_dari"],
                "status" => $_POST['status'],
                'seats' => $_POST['seats'],
                'keberangkatan_id' => $_POST['keberangkatan_id']
            ];
            $editKeberangkatan = $this->keberangkatan->update($data);
            if ($editKeberangkatan > 0) {
                $data = $this->keberangkatan->get();
                View::setFlasher('success','Berhasil','Data berhasil di edit');
                View::redirect('/admin/keberangkatan');
            } else {
                throw new ValidationException('gagal di update');
            }
        } catch (ValidationException $th) {
            View::setFlasher('warning','Gagal',$th->getMessage());
            View::redirect('/admin/keberangkatan');
        }
    }

    public function hapusKeberangkatan($id)
    {
        try {
            $hapus = $this->keberangkatan->delete($id);
            if ($hapus > 0) {
                View::setFlasher('success','Berhasil','Data berhasil di hapus');
            View::redirect('/admin/keberangkatan');
            } else {
                throw new ValidationException('Data gagal di hapus');
            }
        } catch (ValidationException $th) {
            View::setFlasher('warning','Gagal',$th->getMessage());
            View::redirect('/admin/keberangkatan');
        }
    }

    public function apiGetKeberangkatan()
    {
        try {
            $data = array_map(function ($keberangkatan) {
                return [
                    'id' => $keberangkatan['keberangkatan_id'],
                    'tanggal' => $keberangkatan['tanggal'],
                    'status' => $keberangkatan['status_keberangkatan'],
                    'seats' => $keberangkatan['seats'],
                    'paket' => array_map(
                        fn ($paket) =>
                        [
                            "paket_id" => $paket['paket_id'],
                            "nama" => $paket['nama'],
                            "menu" => $paket['menu'],
                            "lama_hari" => $paket['lama_hari'],
                            "minim_dp" => $paket['minim_dp'],
                            "termasuk_harga" => explode(",", $paket['termasuk_harga']),
                            "tidak_termasuk_harga" => explode(",", $paket['tidak_termasuk_harga']),
                            "keunggulan" => $paket['keunggulan'],
                            "foto_paket" => $paket['foto_brosur'],
                            'harga' => array_map(fn ($harga) => [
                                'harga_paket_id'=> $harga['harga_paket_id'],
                                'jenis' => $harga['nama_jenis'],
                                'diskon' => $harga['diskon'],
                                'harga' => $harga['harga']
                            ], $this->paket->getHargaPaket($paket['paket_id'])),
                            "hotel" => array_map(fn ($hotel) => [
                                'nama_hotel' => $hotel['nama_hotel'],
                                'deskripsi' => $hotel['deskripsi'],
                                'bintang' => $hotel['bintang'],
                                'foto_hotel' => $hotel['foto_hotel']
                            ], $this->paket->getHotelPaket($paket['paket_id']))
                        ],$this->paket->getPaketById($keberangkatan['paket_id'])
                    ),
                ];
            }, $this->keberangkatan->getAllApi());
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
                    'id' => $keberangkatan->keberangkatan_id,
                    'tanggal' => $keberangkatan->tanggal,
                    'status' => $keberangkatan->status_keberangkatan,
                    'seats' => $keberangkatan->seats,
                    'paket' => array_map(
                        fn ($paket) =>
                        [
                            "paket_id" => $paket['paket_id'],
                            "nama" => $paket['nama'],
                            "menu" => $paket['menu'],
                            "lama_hari" => $paket['lama_hari'],
                            "minim_dp" => $paket['minim_dp'],
                            "termasuk_harga" => explode(",", $paket['termasuk_harga']),
                            "tidak_termasuk_harga" => explode(",", $paket['tidak_termasuk_harga']),
                            "keunggulan" => $paket['keunggulan'],
                            "foto_paket" => $paket['foto_brosur'],
                            'harga' => array_map(fn ($harga) => [
                                'harga_paket_id'=> $harga['harga_paket_id'],
                                'jenis' => $harga['nama_jenis'],
                                'diskon' => $harga['diskon'],
                                'harga' => $harga['harga']
                            ], $this->paket->getHargaPaket($keberangkatan->paket_id)),
                            "hotel" => array_map(fn ($hotel) => [
                                'nama_hotel' => $hotel['nama_hotel'],
                                'deskripsi' => $hotel['deskripsi'],
                                'bintang' => $hotel['bintang'],
                                // 'check_in' => $hotel['check_in'],
                                // 'check_out' => $hotel['check_out'],
                                'foto_hotel' => $hotel['foto_hotel']
                            ], $this->paket->getHotelPaket($keberangkatan->paket_id))
                        ],
                        $this->paket->getPaketById($keberangkatan->paket_id)
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

    public function apiGetKeberangkatanByMenu($id)
    {
        try {
            $data = array_map(function ($keberangkatan) {
                return [
                    'id' => $keberangkatan->keberangkatan_id,
                    'tanggal' => $keberangkatan->tanggal,
                    'status' => $keberangkatan->status_keberangkatan,
                    'seats' => $keberangkatan->seats,
                    'paket' => array_map(
                        fn ($paket) =>
                        [
                            "paket_id" => $paket['paket_id'],
                            "nama" => $paket['nama'],
                            "menu" => $paket['menu'],
                            "lama_hari" => $paket['lama_hari'],
                            "minim_dp" => $paket['minim_dp'],
                            "termasuk_harga" => explode(",", $paket['termasuk_harga']),
                            "tidak_termasuk_harga" => explode(",", $paket['tidak_termasuk_harga']),
                            "keunggulan" => $paket['keunggulan'],
                            "foto_paket" => $paket['foto_brosur'],
                            'harga' => array_map(fn ($harga) => [
                                'harga_paket_id'=> $harga['harga_paket_id'],
                                'jenis' => $harga['nama_jenis'],
                                'diskon' => $harga['diskon'],
                                'harga' => $harga['harga']
                            ], $this->paket->getHargaPaket($keberangkatan->paket_id)),
                            "hotel" => array_map(fn ($hotel) => [
                                'nama_hotel' => $hotel['nama_hotel'],
                                'deskripsi' => $hotel['deskripsi'],
                                'bintang' => $hotel['bintang'],
                                // 'check_in' => $hotel['check_in'],
                                // 'check_out' => $hotel['check_out'],
                                'foto_hotel' => $hotel['foto_hotel']
                            ], $this->paket->getHotelPaket($keberangkatan->paket_id))
                        ],
                        $this->paket->getPaketById($keberangkatan->paket_id)
                    ),
                ];
            }, $this->keberangkatan->getByMenu($id));
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
