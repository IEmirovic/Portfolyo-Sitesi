<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["guncelle"])) {
        $rowid = $_POST["rowid"];
        $egitimAdi = htmlspecialchars($_POST["egitimAdi"]);
        $okulAdi = htmlspecialchars($_POST["okulAdi"]);
        $baslangicYili = htmlspecialchars($_POST["baslangicYili"]);
        $bitisYili = htmlspecialchars($_POST["bitisYili"]);
        $devamDurumu = htmlspecialchars($_POST["devamDurumu"]);

        try {
            require_once "../conn.php";

            $query = "UPDATE egitim SET egitimadi = :egitimAdi, okuladi = :okulAdi, baslangicyil = :baslangicYili, bitisyil = :bitisYili, devamdurumu= :devamDurumu WHERE id = :rowid;";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":egitimAdi", $egitimAdi);
            $stmt->bindParam(":okulAdi", $okulAdi);
            $stmt->bindParam(":baslangicYili", $baslangicYili);
            $stmt->bindParam(":bitisYili", $bitisYili);
            $stmt->bindParam(":devamDurumu", $devamDurumu);
            $stmt->bindParam(":rowid", $rowid);

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