<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["ekle"])) {
        require_once "../conn.php";
        $egitimAdi = htmlspecialchars($_POST["egitimAdi"]);
        $okulAdi = htmlspecialchars($_POST["okulAdi"]);
        $baslangicYili = htmlspecialchars($_POST["baslangicYili"]);
        $bitisYili = htmlspecialchars($_POST["bitisYili"]);
        $devamDurumu = htmlspecialchars($_POST["devamDurumu"]);
        try {
            $query = "INSERT INTO egitim (egitimadi, okuladi, baslangicyil, bitisyil, devamdurumu) VALUES (:egitimAdi,:okulAdi,:baslangicYili,:bitisYili,:devamDurumu);";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":egitimAdi", $egitimAdi);
            $stmt->bindParam(":okulAdi", $okulAdi);
            $stmt->bindParam(":baslangicYili", $baslangicYili);
            $stmt->bindParam(":bitisYili", $bitisYili);
            $stmt->bindParam(":devamDurumu", $devamDurumu);
            $stmt->execute();
            $pdo = null;
            $stmt = null;
            header("Location: ../../egitim.php");
            die();
        } catch (PDOException $e) {
            die("İşlem Başarısız: " . $e->getMessage());
        }
    }
} else {
    header("Location: ../../egitim.php");
}