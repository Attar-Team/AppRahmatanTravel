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
        View::render("Admin/header",["title"=> "Customer"]);
        View::render("Admin/customer",['dataCustomer'=> $data]);
        View::render("Admin/footer",[]);
    }

    public function viewTambah()
    {
        View::render("Admin/header",["title"=> "Customer"]);
        View::render("Admin/tambahCustomer",[]);
        View::render("Admin/footer",[]);
    }



    public function tambahCustomer()
    {
        
        // for($i = 0; $i < count($_FILES); $i++)
        // {
        //     echo "". $_FILES['foto']["name"]["ktp"] ."";
        //     // var_dump($_FILES);
        // }
        try {
            $rename = array();
        foreach($_FILES as $key => $value)
        {
            $filename = $value['name'];
            
            foreach($filename as $k => $v){
                $rename[$k] = "";
                if(!$filename[$k] == "")
                {
                    $filesize = $value['size'][$k];
                    $tmpname = $value['tmp_name'][$k];

                    $formatfile = pathinfo($filename[$k], PATHINFO_EXTENSION);
                    $rename[$k] = "foto_$k".time().'.'.$formatfile;

                    $allowedtype = array('png','jpeg','jpg','gif');

                    if(!in_array($formatfile,$allowedtype)){
                        throw new ValidationException('file tidak di izinkan');
                    }elseif($filesize > 1000000){
                        throw new ValidationException('ukuraan file tidak boleh lebih dari 1mb');
                    }else{
                        if (!file_exists("uploads/foto_$k/")) {
                            mkdir("uploads/foto_$k/", 0777, true);
                        }
                        move_uploaded_file($tmpname, "uploads/foto_$k/" .$rename[$k]);
                    }
                }
                
            }
        }
        var_dump($rename);
        $dataUser = [
            "email"=> $_POST["email"],
            "password"=> password_hash('12345678', PASSWORD_DEFAULT),
            'level'=> 'customer'
        ];
        $createAcount = $this->user->save($dataUser);

        if ($createAcount['count'] > 0) { 
            $idUser = $createAcount['lastId'];
            $tgl_lahir = str_replace('-"', '/', $_POST['tanggal_lahir']);  
            $newTglLahir = date("Y-m-d", strtotime($tgl_lahir));
            $dataCustomer = [
                'NIK'=> $_POST['NIK'],
                'user_id'=> $idUser,
                'nama'=> $_POST['nama'],
                'tempat_lahir'=> $_POST['tempat_lahir'],
                'tanggal_lahir'=> $newTglLahir,
                'alamat'=> $_POST['alamat'],
                'jenis_kelamin'=> $_POST['jenis_kelamin'],
                'pekerjaan'=> $_POST['pekerjaan'],
                'ukuran_baju'=> $_POST['ukuran_baju'],
                'no_telp'=> $_POST['no_telp'],
                'foto'=> $rename['customer'],
            ];
            
            $saveCustomer = $this->customer->save($dataCustomer);
            if( $saveCustomer['count'] > 0 ) {
                $id = $saveCustomer['lastId'];
                $tgl_penerbitan = str_replace('-"', '/', $_POST['tanggal_penerbitan']);  
            $newTglPenerbitan = date("Y-m-d", strtotime($tgl_penerbitan));
                $dataPasport = [
                    'nomor_pasport'=> $_POST['nomor_pasport'],
                    'customer_id'=> $id,
                    'nama_pasport'=> $_POST['nama_pasport'],
                    'tempat_penerbitan'=> $_POST['tempat_penerbitan'],
                    'tgl_penerbitan'=> $newTglPenerbitan
                ];
                $savePasport = $this->customer->savePasport($dataPasport);
                $saveDocument = $this->customer->saveDocument($id,$rename);
                if( $saveDocument > 0 && $savePasport > 0) {
                    View::redirect('/admin/customer');
                }else{
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
}