<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\CustomerModel;
use Attar\App\Rahmatan\Travel\Model\KeberangkatanModel;
use Attar\App\Rahmatan\Travel\Model\PaketModel;
use Attar\App\Rahmatan\Travel\Model\PemesananModel;
use Attar\App\Rahmatan\Travel\Model\UserModel;

class CustomerController
{
    private $keberangkatan;
    private $paket;
    private $customer;
    private $user;
    private $pemesanan;
    public function __construct()
    {
        $conection = Database::getConnection();
        $this->customer = new CustomerModel($conection);
        $this->user = new UserModel($conection);
        $this->pemesanan = new PemesananModel($conection);
        $this->keberangkatan = new KeberangkatanModel($conection);
        $this->paket = new PaketModel($conection);
    }

    public function index()
    {
        $data = $this->customer->get();
        View::render("Admin/header", ["title" => "Customer"]);
        View::render("Admin/customer", ['dataCustomer' => $data]);
        View::render("Admin/footer", []);
    }

    public function viewTambah()
    {
        View::render("Admin/header", ["title" => "Customer"]);
        View::render("Admin/tambahCustomer", []);
        View::render("Admin/footer", []);
    }

    public function viewEditTambah($id)
    {
        $dataCustomer = $this->customer->getById($id);
        // $dataPaspor = $this->customer->getPasportById($id);
        // $dataDokumen = $this->customer->getDokumenById($id);
        View::render("Admin/header", ["title" => "Customer"]);
        View::render("Admin/editCustomer", ['dataCustomer' => $dataCustomer]);
        View::render("Admin/footer", []);
    }

    public function viewDetailTambah($id)
    {
        $dataCustomer = $this->customer->getById($id);
        View::render("Admin/header", ["title" => "Customer"]);
        View::render("Admin/detailCustomer", ['dataCustomer' => $dataCustomer]);
        View::render("Admin/footer", []);
    }

    public function viewTambahCicilan($id)
    {
        $pemesanan = $this->pemesanan->getForCicilanById($id);
        View::render("User/tambahCicilan", ["title"=> "", "pemesanan"=> $pemesanan,"idPemesanan"=> $id]);
    }

    public function viewCustomerHome()
    {
        $idCustomer = $_SESSION["uid_user"];
        $pemesanan = $this->pemesanan->getPemesananByCustomer($idCustomer);
        View::render("User/pemesanan", ["title"=> "", "pemesanan"=> $pemesanan]);
    }

    public function editJamaahProfile($id)
    {
        $dataCustomer = $this->customer->getById($id);
        View::render("User/editCustomer", ["title"=> "", "customer"=> $dataCustomer]);   
    }

    public function tambahCustomer()
    {
        $dataUser = [
            'nama' => $_POST['nama'],
            "email" => $_POST["email"],
            "password" => password_hash('12345678', PASSWORD_DEFAULT),
            'level' => 'customer'
        ];
        try {
            $createAcount = $this->user->save($dataUser);

            if ($createAcount['count'] > 0) {
                $idUser = $createAcount['lastId'];
                $tgl_lahir = str_replace('-"', '/', $_POST['tanggal_lahir']);
                $newTglLahir = date("Y-m-d", strtotime($tgl_lahir));
                $rename = array();
                foreach ($_FILES as $key => $value) {
                    $filename = $value['name'];
    
                    foreach ($filename as $k => $v) {
                        $rename[$k] = "";
                        if (!$filename[$k] == "") {
                            $filesize = $value['size'][$k];
                            $tmpname = $value['tmp_name'][$k];
    
                            $formatfile = pathinfo($filename[$k], PATHINFO_EXTENSION);
                            $rename[$k] = "foto_$k" . time() . '.' . $formatfile;
    
                            $allowedtype = array('png', 'jpeg', 'jpg', 'gif', 'JPG');
    
                            if (!in_array($formatfile, $allowedtype)) {
                                throw new ValidationException('file tidak di izinkan');
                            } elseif ($filesize > 1000000) {
                                throw new ValidationException('ukuraan file tidak boleh lebih dari 1mb');
                            } else {
                                if (!file_exists("uploads/foto_$k/")) {
                                    mkdir("uploads/foto_$k/", 0777, true);
                                }
                                move_uploaded_file($tmpname, "uploads/foto_$k/" . $rename[$k]);
                            }
                        }
                    }
                }
                $dataCustomer = [
                    'NIK' => $_POST['NIK'],
                    'user_id' => $idUser,
                    'nama' => $_POST['nama'],
                    'tempat_lahir' => $_POST['tempat_lahir'],   
                    'tanggal_lahir' => $newTglLahir,
                    'alamat' => $_POST['alamat'],
                    'jenis_kelamin' => $_POST['jenis_kelamin'],
                    'pekerjaan' => $_POST['pekerjaan'],
                    'ukuran_baju' => $_POST['ukuran_baju'],
                    'no_telp' => $_POST['no_telp'],
                    'foto' => $rename['customer'],
                ];

                $saveCustomer = $this->customer->save($dataCustomer);
                if ($saveCustomer['count'] > 0) {
                    $tgl_penerbitan = str_replace('-"', '/', $_POST['tanggal_penerbitan']);
                    $newTglPenerbitan = date("Y-m-d", strtotime($tgl_penerbitan));
                    $dataPasport = [
                        'nomor_pasport' => $_POST['nomor_pasport'],
                        'customer_id' => $_POST['NIK'],
                        'nama_pasport' => $_POST['nama_pasport'],
                        'tempat_penerbitan' => $_POST['tempat_penerbitan'],
                        'tgl_penerbitan' => $newTglPenerbitan
                    ];
                    $savePasport = $this->customer->savePasport($dataPasport);
                    $saveDocument = $this->customer->saveDocument($_POST['NIK'], $rename);
                    if ($saveDocument > 0 && $savePasport > 0) {
                     
                        View::setFlasher('success','Berhasil','Data berhasil di tambahkan');
                            View::redirect('/admin/customer');
                    } else {
                        throw new ValidationException("gagal di tambah");
                    }
                }else{
                    throw new ValidationException("Gagal");
                }
            } else {
                throw new ValidationException("gagal di tambah");
            }
        } catch (ValidationException $exception) {
            View::setFlasher('warning','Gagal',$exception->getMessage());
            View::redirect('/admin/tambah-customer');
            // View::render("/admin/tambah-customer", ['error'=> $e->getMessage()]);
            // throw new ValidationException($e);
        }
    }

    public function tambahCustomerUser()
    {
        error_reporting(0);
        try {

                $tgl_lahir = str_replace('-"', '/', $_POST['tanggal_lahir']);
                $newTglLahir = date("Y-m-d", strtotime($tgl_lahir));
                $rename = array();
                foreach ($_FILES as $key => $value) {
                    $filename = $value['name'];
    
                    foreach ($filename as $k => $v) {
                        $rename[$k] = "";
                        if (!$filename[$k] == "") {
                            $filesize = $value['size'][$k];
                            $tmpname = $value['tmp_name'][$k];
    
                            $formatfile = pathinfo($filename[$k], PATHINFO_EXTENSION);
                            $rename[$k] = "foto_$k" . time() . '.' . $formatfile;
    
                            $allowedtype = array('png', 'jpeg', 'jpg', 'gif', 'JPG');
    
                            if (!in_array($formatfile, $allowedtype)) {
                                throw new ValidationException('file tidak di izinkan');
                            } elseif ($filesize > 1000000) {
                                throw new ValidationException('ukuraan file tidak boleh lebih dari 1mb');
                            } else {
                                if (!file_exists("uploads/foto_$k/")) {
                                    mkdir("uploads/foto_$k/", 0777, true);
                                }
                                move_uploaded_file($tmpname, "uploads/foto_$k/" . $rename[$k]);
                            }
                        }
                    }
                }
                $dataCustomer = [
                    'NIK' => $_POST['NIK'],
                    'user_id' => $_SESSION['uid_user'],
                    'nama' => $_POST['nama'],
                    'tempat_lahir' => $_POST['tempat_lahir'],
                    'tanggal_lahir' => $newTglLahir,
                    'alamat' => $_POST['alamat'],
                    'jenis_kelamin' => $_POST['jenis_kelamin'],
                    'pekerjaan' => $_POST['pekerjaan'],
                    'ukuran_baju' => $_POST['ukuran_baju'],
                    'no_telp' => $_POST['no_telp'],
                    'foto' => $rename['customer'],
                ];

                $saveCustomer = $this->customer->save($dataCustomer);
                if ($saveCustomer['count'] > 0) {
                    $tgl_penerbitan = str_replace('-"', '/', $_POST['tanggal_penerbitan']);
                    $newTglPenerbitan = date("Y-m-d", strtotime($tgl_penerbitan));
                    $dataPasport = [
                        'nomor_pasport' => $_POST['nomor_pasport'],
                        'customer_id' => $_POST['NIK'],
                        'nama_pasport' => $_POST['nama_pasport'],
                        'tempat_penerbitan' => $_POST['tempat_penerbitan'],
                        'tgl_penerbitan' => $newTglPenerbitan
                    ];
                    $savePasport = $this->customer->savePasport($dataPasport);
                    $saveDocument = $this->customer->saveDocument($_POST['NIK'], $rename);
                    if ($saveDocument > 0 && $savePasport > 0) {
                        $url = "/pemesanan/".$_POST['idKeberangkatan']."";
                        session_start();
        $idCustomer = $_SESSION['uid_user'];
        $keberangkatan = $this->keberangkatan->getDetail($_POST['idKeberangkatan']);
        foreach ($keberangkatan as $k) {
            $idPaket = $k->paket_id;
        }
        if($_POST['idKeberangkatan'] == 0){
            View::setFlasher('success','Berhasil','Data berhasil di tambahkan');
            View::redirect('/profile');
        }else{
            View::setFlasher('success','Berhasil','Data berhasil di tambahkan');
            View::redirect($url);
        }
                    } else {
                        throw new ValidationException("gagal di tambah");
                    }
                }
        } catch (ValidationException $e) {
            View::setFlasher('warning','Gagal Ditambahkan',$e->getMessage());
            View::redirect('/admin/tambah-customer');
        }
    }

    public function editCustomer()
    {

        try {

            $rename = array();
            foreach ($_FILES as $key => $value) {
                $filename = $value['name'];

                foreach ($filename as $k => $v) {
                    if ($value['name'][$k] != '') {

                        $filesize = $value['size'][$k];
                        $tmpname = $value['tmp_name'][$k];

                        $formatfile = pathinfo($filename[$k], PATHINFO_EXTENSION);
                        $rename[$k] = "foto_$k" . time() . '.' . $formatfile;

                        $allowedtype = array('png', 'jpeg', 'jpg', 'gif', 'JPG');
                        if (!in_array($formatfile, $allowedtype)) {
                            throw new ValidationException('file tidak di izinkan');
                        } elseif ($filesize > 1000000) {
                            throw new ValidationException('ukuraan file tidak boleh lebih dari 1mb');
                        } else {
                            if (file_exists("uploads/foto_$k/" . $_POST['foto_asli'][$k])) {
                                unlink("uploads/foto_$k/" . $_POST['foto_asli'][$k]);
                            }
                        }

                        if (!file_exists("uploads/foto_$k/")) {
                            mkdir("uploads/foto_$k/", 0777, true);
                        }
                        move_uploaded_file($tmpname, "uploads/foto_$k/" . $rename[$k]);
                    } else {

                        $rename[$k] = $_POST['foto_asli'][$k];
                    }

                }
            }

            $tgl_lahir = str_replace('-"', '/', $_POST['tanggal_lahir']);
            $newTglLahir = date("Y-m-d", strtotime($tgl_lahir));

            $tgl_penerbitan = str_replace('-"', '/', $_POST['tanggal_penerbitan']);
            $newTglPenerbitan = date("Y-m-d", strtotime($tgl_penerbitan));

            $this->customer->updateCustomer($_POST, $newTglLahir, $rename['customer']);
            $this->customer->updatePasport($_POST, $newTglPenerbitan);

            $this->customer->updateDocument($_POST['NIK'], $rename);
           
            if($_POST['redirect'] == "admin"){
                View::setFlasher('success','Berhasil','Data berhasil di edit');
                View::redirect('/admin/customer');
            }else if($_POST['redirect'] == 'user'){
                View::setFlasher('success','Berhasil','Data berhasil di edit');
                View::redirect('/profile');
            }
        } catch (ValidationException $exception) {
            View::setFlasher('warning','Gagal di delete',$exception->getMessage());
            View::redirect('/admin/edit-customer/'.$_POST['NIK']);
        }
    }



    public function hapusCustomer($id, $redirect)
    {
        error_reporting(0);
        try {
            // var_dump($id); 
            // if(file_exists("uploads/foto_customer/foto_customer1699116602.png")) {
            //     echo "ada";
            //     // unlink('public/uploads/foto_customer/'.$c->foto);
            // }
            // die();
            // foreach($check as $c){
                
            // }
            $check = $this->customer->getById($id);
            
        $count = count($check);
        if($count > 0){
            foreach($check as $c){
            if(file_exists('uploads/foto_customer/'.$c->foto)) {
                unlink('uploads/foto_customer/'.$c->foto);
            }

            if(file_exists('uploads/foto_ktp/'.$c->foto_ktp)) {
                unlink('uploads/foto_ktp/'.$c->foto_ktp);
            }

            if(file_exists('uploads/foto_paspor/'.$c->foto_paspor)) {
                unlink('uploads/foto_paspor/'.$c->foto_paspor);
            }

            if(file_exists('uploads/foto_rekening/'.$c->foto_buku_rekening)) {
                unlink('uploads/foto_rekening/'.$c->foto_buku_rekening);
            }

            if(file_exists('uploads/foto_pernikahan/'.$c->foto_buku_pernikahan)) {
                unlink('uploads/foto_pernikahan/'.$c->foto_buku_pernikahan);
            }

            
            if(file_exists('uploads/foto_paspor2/'.$c->foto_paspor_hal2)) {
                unlink('uploads/foto_paspor2/'.$c->foto_paspor_hal2);
            }

            if(file_exists('uploads/foto_keluarga/'.$c->foto_kartu_keluarga)) {
                unlink('uploads/foto_keluarga/'.$c->foto_kartu_keluarga);
            }
            
            if(file_exists('uploads/foto_akte/'.$c->foto_akte_kelahiran)) {
                unlink('uploads/foto_akte/'.$c->foto_akte_kelahiran);
            }

            // if(file_exists('/uploads/foto_ktp'.$c->foto_ktp)) {
            //     unlink('/uploads/foto_ktp'.$c->foto_ktp);
            // }
        }
        }

        $this->customer->deletePasport($id);
        $this->customer->deleteDokument($id);
        $this->customer->deleteCustomer($id);

        if($redirect == 'admin') {
        View::setFlasher('success','Berhasil','Data berhasil di delete');
            View::redirect('/admin/customer');
        }else if($redirect == 'customer') {
            View::setFlasher('success','Berhasil','Data berhasil di delete');
            View::redirect('/profile');
        }
        } catch (\Throwable $e) {
            View::setFlasher('warning','Gagal di delete', $e->getMessage());    
            View::redirect('/admin/customer');
        }

    }


    public function apiTambahProfileCustomer()
    {
        try {
            error_reporting(0);
            $tgl_lahir = str_replace('-', '/', $_POST['tanggal_lahir']);
            $newTglLahir = date("Y-m-d", strtotime($tgl_lahir));
            $rename = array();
            foreach ($_FILES as $key => $value) {
                $filename = $value['name'];

                foreach ($filename as $k => $v) {
                    $rename[$k] = "";
                    if (!$filename[$k] == "") {
                        $filesize = $value['size'][$k];
                        $tmpname = $value['tmp_name'][$k];

                        $formatfile = pathinfo($filename[$k], PATHINFO_EXTENSION);
                        $rename[$k] = "foto_$k" . time() . '.' . $formatfile;

                        $allowedtype = array('png', 'jpeg', 'jpg', 'gif', 'JPG');

                        if (!in_array($formatfile, $allowedtype)) {
                            $result = [
                                'status' => 400,
                                'message' => 'format tidak di izinkan'
                            ];
                            exit();
                        } elseif ($filesize > 1000000) {
                            $result = [
                                'status' => 400,
                                'message' => 'size tidak boleh dari 1mb'
                            ];
                            exit();
                        } else {
                            if (!file_exists("uploads/foto_$k/")) {
                                mkdir("uploads/foto_$k/", 0777, true);
                            }
                            move_uploaded_file($tmpname, "uploads/foto_$k/" . $rename[$k]);
                        }
                    }
                }
            }
            $dataCustomer = [
                'NIK' => str_replace('"', '', $_POST['NIK']),
                'user_id' =>  str_replace('"', '', $_POST['user_id']),
                'nama' => str_replace('"', '', $_POST['nama']),
                'tempat_lahir' =>str_replace('"', '', $_POST['tempat_lahir']),
                'tanggal_lahir' => $newTglLahir,
                'alamat' => str_replace('"', '', $_POST['alamat']),
                'jenis_kelamin' => str_replace('"', '', $_POST['jenis_kelamin']),
                'pekerjaan' => str_replace('"', '', $_POST['pekerjaan']),
                'ukuran_baju' =>str_replace('"', '', $_POST['ukuran_baju']),
                'no_telp' => str_replace('"', '', $_POST['no_telp']),
                'foto' => $rename['customer'],
            ];

            $saveCustomer = $this->customer->save($dataCustomer);
            if ($saveCustomer['count'] > 0) {
                $tgl_penerbitan = str_replace('"', '', $_POST['tgl_penerbitan']);
                $newTglPenerbitan = date("Y-m-d", strtotime($tgl_penerbitan));
                $dataPasport = [
                    'nomor_pasport' => str_replace('"', '', $_POST['nomor_pasport']),
                    'customer_id' =>str_replace('"', '', $_POST['NIK']),
                    'nama_pasport' => str_replace('"', '', $_POST['nama_pasport']),
                    'tempat_penerbitan' => str_replace('"', '', $_POST['tempat_penerbitan']),
                    'tgl_penerbitan' => $newTglPenerbitan
                ];
                $savePasport = $this->customer->savePasport($dataPasport);
                $saveDocument = $this->customer->saveDocument(str_replace('"', '', $_POST['NIK']), $rename);
                if ($saveDocument > 0 && $savePasport > 0) {
                    http_response_code(201);
                    $result = [
                        'status' => 201,
                        'message' => 'success'
                    ];
                } else {
                    http_response_code(400);
                    $result = [
                        'status' => 400,
                        'message' => 'failed'
                    ];
                }
            }
            echo json_encode($result);
        } catch (\Throwable $th) {
            http_response_code(400);
            $result = [
                'status' => 400,
                'message' => 'failed',
                'information' => $th->getMessage()
            ];
            echo json_encode($result);
        }
    }
    public function getApiJamaah($id)
    {
        try {
 
            
                $data = array_map(function($customer){
                    return [
                        "NIK" => $customer['NIK'],
                        "user_id"=> $customer['user_id'],
                        "nama"=> $customer['nama_customer'],
                        "tempat_lahir"=> $customer['tempat_lahir'],
                        "tanggal_lahir"=> $customer['tanggal_lahir'],
                        "alamat"=> $customer['alamat'],
                        "jenis_kelamin"=> $customer['jenis_kelamin'],
                        "pekerjaan"=> $customer['pekerjaan'],
                        "ukuran_baju"=> $customer['ukuran_baju'],
                        "no_telp"=> $customer['no_telp'],
                        "nomor_pasport"=> $customer['nomor_pasport'],
                        "nama_pasport"=> $customer['nama_pasport'],
                        "tempat_penerbita"=> $customer['tempat_penerbitan'],
                        "tgl_penerbitan"=> $customer['tgl_penerbitan'],
                        "foto_customer"=> $customer['foto'],
                        "foto_pasport"=> $customer['foto_paspor'],
                        "foto_pasport2"=> $customer['foto_paspor_hal2'],
                        "foto_ktp"=> $customer['foto_ktp'],
                        "foto_kk"=> $customer['foto_kartu_keluarga'],
                        "foto_rekening"=> $customer['foto_buku_rekening'],
                        "foto_akte"=> $customer['foto_akte_kelahiran'],
                        "foto_pernikahan"=> $customer['foto_buku_pernikahan']
                    ];
                },$this->customer->getCustomerByUserId($id));
            $result = [
                'status' => 200,
                'message'=> 'success',
                'data'=> $data
            ];
            echo json_encode($result);
        } catch (\Throwable $th) {
            echo json_encode($th->getMessage());
        }
    }
}
