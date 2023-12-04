<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
use Attar\App\Rahmatan\Travel\Exception\ValidationException;
use Attar\App\Rahmatan\Travel\Model\ArtikelModel;
class ArtikelController
{
    private $artikel;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->artikel = new ArtikelModel($connection);
    }
    public function index()
    {

        $data = $this->artikel->getAllArticle();

        View::render("Admin/header",["title"=> "Artikel"]);
        View::render("Admin/artikel",["dataArtikel"=>$data]);
        View::render("Admin/footer",[]);
    }

    public function tambah()
    {
        try {

            $filename = $_FILES['foto']['name'];
            $tmpname = $_FILES['foto']['tmp_name'];
            $filesize = $_FILES['foto']['size'];

            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
            $rename = 'foto_artikel'.time().'.'.$formatfile;

            $allowedtype = array('png','jpeg','jpg','gif');

            if(!in_array($formatfile,$allowedtype)){
                throw new ValidationException('file tidak di izinkan');
            }elseif($filesize > 1000000){
                throw new ValidationException('ukuraan file tidak boleh lebih dari 1mb');
            }else{
                if (!file_exists("uploads/foto_artikel/")) {
                    mkdir("uploads/foto_artikel/", 0777, true);
                }
                move_uploaded_file($tmpname, "uploads/foto_artikel/" .$rename);
                $tanggal = date("Y-m-d");
                $data = $this->artikel->createArtikel(1,$_POST['judul_artikel'],$tanggal,$_POST['isi'],$rename);
        if($data > 0){
            View::setFlasher('success','Berhasil','Data berhasil di tambahkan');
            View::redirect('/admin/artikel');
        }else{
            throw  new ValidationException('Data Gagal ditambahkan');
        }
            }
        } catch (ValidationException $th) {
            View::setFlasher('warning','Gagal',$th->getMessage());
            View::redirect('/admin/artikel');
        }
    }

    public function deleteArtikel($artikelId)
    {
    $success = $this->artikel->deleteArtikel($artikelId);

    if ($success) {
        // Penghapusan berhasil, tidak perlu melakukan apa-apa
    } else {
        // Penghapusan gagal, atur pesan kesalahan
        $_SESSION['error_message'] = "Gagal menghapus artikel.";
    }

    // Redirect ke halaman "artikel.php"
    header("Location: /admin/artikel");
    exit();
    }

    public function apiGetArtikel()
    {
        try {
            $data = array_map(function ($artikel) {
                return[
                    "artikel_id"=> $artikel['artikel_id'],
                    'user_id'=> $artikel['user_id'],
                    'judul'=> $artikel['judul'],
                    'isi'=> $artikel['isi'],
                    'foto'=> $artikel['foto']
                ];
            }, $this->artikel->getAllArticle());
            
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