<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["ekle"])) {
        require_once "../conn.php";
        $pozisyon = htmlspecialchars($_POST["pozisyon"]);
        $sirketAdi = htmlspecialchars($_POST["sirketAdi"]);
        $baslangicYili = htmlspecialchars($_POST["baslangicYili"]);
        $bitisYili = htmlspecialchars($_POST["bitisYili"]);
        $devamDurumu = htmlspecialchars($_POST["devamDurumu"]);
        try {
            $query = "INSERT INTO isdeneyimleri (pozisyon, sirketAdi, baslangicYili, bitisYili, devamDurumu) VALUES (:pozisyon,:sirketAdi,:baslangicYili,:bitisYili,:devamDurumu);";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":pozisyon", $pozisyon);
            $stmt->bindParam(":sirketAdi", $sirketAdi);
            $stmt->bindParam(":baslangicYili", $baslangicYili);
            $stmt->bindParam(":bitisYili", $bitisYili);
            $stmt->bindParam(":devamDurumu", $devamDurumu);
            $stmt->execute();
            $pdo = null;
            $stmt = null;
            header("Location: ../../isdeneyimi.php");
            die();
        } catch (PDOException $e) {
            die("İşlem Başarısız: " . $e->getMessage());
        }
    }
} else {
    header("Location: ../../isdeneyimi.php");
}