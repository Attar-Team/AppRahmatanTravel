<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\GaleryModel;

class GaleryController
{
    private $galery;
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->galery = new GaleryModel($connection);
    }
    public function index()
    {
        $galery = $this->galery->get();
        View::render("Admin/header",["title"=>"Galery"]);
        View::render("Admin/galery",["galery"=> $galery]);
        View::render("Admin/footer",[]);
    }

    public function tambahGalery()
    {
        try {
            $filename = $_FILES['foto']['name'];
            $tmpname = $_FILES['foto']['tmp_name'];
            $filesize = $_FILES['foto']['size'];

            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
            $rename = 'foto_galery'.time().'.'.$formatfile;

            $allowedtype = array('png','jpeg','jpg','gif','JPG','PNG','JPEG');

            if(!in_array($formatfile,$allowedtype)){
                throw new ValidationException('file tidak di izinkan');
            }elseif($filesize > 1000000){
                throw new ValidationException('ukuraan file tidak boleh lebih dari 1mb');
            }else{
                if (!file_exists("uploads/foto_galery/")) {
                    mkdir("uploads/foto_galery/", 0777, true);
                }
                move_uploaded_file($tmpname, "uploads/foto_galery/" .$rename);
                $data = [
                    "judul"=> htmlspecialchars($_POST["judul"]),
                    "user_id"=> 1,
                    "foto"=> $rename
   
                ];
                $tambah = $this->galery->save($data);
                if($tambah > 0){
                    View::setFlasher('success','Berhasil','Data berhasil di tambahkan');
                    View::redirect('/admin/galery');
                }else{
                    throw new ValidationException('Gagal Di tambahkan');
                }
            }
           
        } catch (ValidationException $th) {
            View::setFlasher('error','Gagal',$th->getMessage());
                    View::redirect('/admin/galery');
        }
    }

    public function apiGetGalery()
    {
        try {
            $data = array_map(function($galery){
                return [
                    "galery_id"=> $galery['galery_id'],
                    'judul'=> $galery['judul'],
                    'foto'=> $galery['foto']
                ];
            },$this->galery->get());

            $result = [
                'status'=> 200,
                'message'=> 'success',
                'data'=> $data
            ];

            echo json_encode($result);
        } catch (\Throwable $th) {
            $result = [
                'status'=> 404,
                'message'=> 'failed'
            ];

            echo json_encode($result);
        }
    }

}