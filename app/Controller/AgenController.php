<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\AgenModel;
use Attar\App\Rahmatan\Travel\Model\UserModel;

class AgenController
{
    private $agen;
    private $user;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->agen = new AgenModel($connection);
        $this->user = new UserModel($connection);
    }

    public function index()
    {
        $data = $this->agen->get();
        // var_dump($data);
        // die();
        View::render("Admin/header",["title"=> "Agen"]);
        View::render("Admin/agen",["dataAgen" => $data]);
        View::render("Admin/footer",[]);
    }

    public function viewTambahData()
    {
        View::render("Admin/header",["title"=> "Agen"]);
        View::render("Admin/tambahAgen",[]);
        View::render("Admin/footer",[]);
    }

    public function viewDataAgenBelumDibayar()
    {
        $dataKodeReferal = $this->agen->getDataAgenBelumBayar();
        View::render("Admin/header",["title"=> "Verifikasi Agen"]);
        View::render("Admin/dataAgenBelumDibayar",['pemesanan' => $dataKodeReferal]);
        View::render("Admin/footer",[]);
    }

    public function viewDataAgenSudahDibayar()
    {
        $dataKodeReferal = $this->agen->getDataAgenSudahBayar();
        View::render("Admin/header",["title"=> "Verifikasi Agen"]);
        View::render("Admin/dataAgenSudahDibayar",['pemesanan' => $dataKodeReferal]);
        View::render("Admin/footer",[]);
    }

    public function viewDataPelanggan()
    {
        session_start();
        $dataPelanggan = $this->agen->getPemesananUserId($_SESSION['uid_user']);
        View::render("Agen/dataPelanggan",["title"=> "Data Pelanggan","pelanggan"=> $dataPelanggan]);
    }

    public function viewProfileAgen()
    {
        session_start();
        $user_id = $_SESSION['uid_user'];
        $jumlahPelanggan = count($this->agen->getPemesananUserId($user_id));
        $pemasukan = $this->agen->getJumlahPemasukan($user_id);
        foreach( $pemasukan as $row){
            $jml_pemasukan = $row['jumlah_pemasukan'];
        }
        $data = $this->agen->getByUserId($_SESSION['uid_user']);
        View::render("Agen/profile",["title"=> "Verifikasi Agen","profile"=> $data,"jumlah_pelanggan"=> $jumlahPelanggan,"jumlah_pemasukan"=> $jml_pemasukan]);
    }

    public function tambahAgen()
    {
        try {
            $dataUser = [
                "email"=> htmlspecialchars($_POST['email']),
                'password'=> "12345678",
                'level'=> "agen"
            ];
            $tambahUser = $this->user->save($dataUser);
            if ($tambahUser['count'] > 0) {
                $idUser = $tambahUser['lastId'];
                $nama = htmlspecialchars($_POST['nama']);
                $preg = preg_replace("/[AIUEO.]/","", strtoupper($nama));
                $kode_referal = str_replace(' ', '', "RHMTN".substr($preg,0,3).$idUser);
                
                $filename = $_FILES['foto_agen']['name'];
                $tmpname = $_FILES['foto_agen']['tmp_name'];
                $filesize = $_FILES['foto_agen']['size'];
    
                $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                $rename = 'foto_agen'.time().'.'.$formatfile;
    
                $allowedtype = array('png','jpeg','jpg','gif');
    
                if(!in_array($formatfile,$allowedtype)){
                    throw new ValidationException('file tidak di izinkan');
                }elseif($filesize > 1000000){
                    throw new ValidationException('ukuraan file tidak boleh lebih dari 1mb');
                }else{
                    if (!file_exists("uploads/foto_agen/")) {
                        mkdir("uploads/foto_agen/", 0777, true);
                    }
                    move_uploaded_file($tmpname, "uploads/foto_agen/" .$rename);
                $data = [
                    "NIK"=> htmlspecialchars($_POST['NIK']),
                    'user_id'=> $idUser,
                    'kode_referal'=> $kode_referal,
                    'nama'=> htmlspecialchars($_POST['nama']),
                    'alamat'=> htmlspecialchars($_POST['alamat']),
                    'jenis_kelamin'=> htmlspecialchars($_POST['jenis_kelamin']),
                    'no_telp'=> htmlspecialchars($_POST['no_telp']),
                    'foto'=> $rename,
                    'saldo'=> 0
                ];
                $tambah = $this->agen->save($data);
                if($tambah > 0){
                    View::redirect('/admin/agen');
                }else{
                    throw new ValidationException('Data Gagal Di update');
                }
            }
            }else{
                throw new ValidationException('gagal user');
            }
        } catch (\Throwable $th) {
            throw new ValidationException($th->getMessage());
        }
    }

    public function tambahGajiAgen()
    {
        try {
            $tanggal = date("Y-m-d");
            $data = [
                'pemesanan_id'=> htmlspecialchars($_POST['pemesanan_id']),
                'jumlah_bonus'=> htmlspecialchars($_POST['jumlah_bonus']),
                'tanggal'=> $tanggal
            ];
            $tambahGaji = $this->agen->saveGaji($data);

            if( $tambahGaji > 0){
                $dataKodeReferal = $this->agen->getDataAgenBelumBayar();
        View::render("Admin/header",["title"=> "Verifikasi Agen"]);
        View::render("Admin/dataAgenBelumDibayar",['pemesanan' => $dataKodeReferal,'success' => 'Data Berhasil ditambahkan']);
        View::render("Admin/footer",[]);
            }
        } catch (ValidationException $th) {
            View::render("Admin/header",["title"=> "Verifikasi Agen"]);
            View::render("Admin/dataAgenBelumDibayar",['pemesanan' => $dataKodeReferal,'error' => 'Data Gagal ditambahkan'. $th->getMessage()]);
            View::render("Admin/footer",[]);
        }
    }

    public function checkReferal($id){
        try {
            $cek = $this->agen->checkReferal($id);
            if(count($cek) > 0){
                foreach($cek as $row){
                    echo $row->nama.",".$row->NIK;
                }
            }else{
                echo'tidak ada';
            }
        } catch (\Exception $th) {
            throw new ValidationException($th->getMessage());
        }
    }
}