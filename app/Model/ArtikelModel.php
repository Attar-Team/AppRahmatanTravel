<?php
namespace Attar\App\Rahmatan\Travel\Model;


class ArtikelModel{
    private \PDO $connection;
    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    public function getAllArticle() 
    {
        $sql = "SELECT * FROM artikel";
        $stmt = $this->connection->prepare($sql);
        $stmt -> execute();
        return $stmt-> fetchAll(\PDO::FETCH_ASSOC);
    }
    public function createArtikel($judul, $tanggal, $isi, $foto)
    {
        $sql = "INSERT INTO artikel (judul, tanggal, isi, foto) VALUES (:judul, :tanggal, :isi, :foto)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':isi', $isi);
        $stmt->bindParam(':foto', $foto);
        return $stmt -> execute();
    }

    public function readArtikel($artikelId)
    {
        $sql = "SELECT-* FROM artikel WHERE artikel_id = :id";
        $stmt = $this -> connection -> prepare($sql);
        $stmt->bindParam(':id', $artikelId);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateArtikel($artikelId, $judul, $tanggal, $isi, $foto)
    {
        $sql = "UPDATE artikel SET judul = :judul, tanggal = :tanggal, isi = :isi, foto = :foto WHERE artikel_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $artikelId);
        $stmt->bindParam(':judul', $judul);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':isi', $isi);
        $stmt->bindParam(':foto', $foto);
        return $stmt->execute();
    }

    public function deleteArtikel($artikelId)
    {
        $sql = "DELETE FROM artikel WHERE artikel_id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $artikelId);
        return $stmt->execute();
    }
    
}
?>