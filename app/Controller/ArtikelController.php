<?php

namespace Attar\App\Rahmatan\Travel\Controller;

use Attar\App\Rahmatan\Travel\App\Database;
use Attar\App\Rahmatan\Travel\App\View;
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

}