<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\CustomerModel;
use Attar\App\Rahmatan\Travel\Model\UserModel;

class CustomerController
{
    private $customer;
    private $user;
    public function __construct()
    {
        $conection = Database::getConnection();
        $this->customer = new CustomerModel($conection);
        $this->user = new UserModel($conection);
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

    public function tambahCustomer()
    {

        try {
            $dataUser = [
                "email" => $_POST["email"],
                "password" => password_hash('12345678', PASSWORD_DEFAULT),
                'level' => 'customer'
            ];
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
                        View::redirect('/admin/customer');
                    } else {
                        throw new ValidationException("gagal di tambah");
                    }
                }
            } else {
                throw new ValidationException("gagal di tambah");
            }
        } catch (\Throwable $e) {
            throw new ValidationException($e);
        }
    }

    public function tambahCustomerUser()
    {

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
                    'user_id' => 1,
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
                        View::redirect('/');
                    } else {
                        throw new ValidationException("gagal di tambah");
                    }
                }
       
        } catch (\Throwable $e) {
            throw new ValidationException($e);
        }
    }

    public function editCustomer()
    {

        try {
            // var_dump($_POST);
            // die();
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
            View::redirect('/admin/customer');
        } catch (\Throwable $e) {
            throw new ValidationException($e->getMessage());
        }
    }

    public function hapusCustomer($id)
    {
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
        View::redirect('/admin/customer');
        } catch (\Throwable $e) {
            throw new ValidationException($e->getMessage());
        }

    }
}
