<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["ekle"])) {
        require_once "../conn.php";
        $kurumAdi = htmlspecialchars($_POST["kurumAdi"]);
        $sertifikaAdi = htmlspecialchars($_POST["sertifikaAdi"]);
        $aciklama = htmlspecialchars($_POST["aciklama"]);
        $yil = htmlspecialchars($_POST["yil"]);
        try {
            $query = "INSERT INTO sertifika (kurumAdi, sertifikaAdi, aciklama, yil) VALUES (:kurumAdi,:sertifikaAdi,:aciklama,:yil);";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":kurumAdi", $kurumAdi);
            $stmt->bindParam(":sertifikaAdi", $sertifikaAdi);
            $stmt->bindParam(":aciklama", $aciklama);
            $stmt->bindParam(":yil", $yil);
            $stmt->execute();
            $pdo = null;
            $stmt = null;
            header("Location: ../../sertifikalar.php");
            die();
        } catch (PDOException $e) {
            die("İşlem Başarısız: " . $e->getMessage());
        }
    }
} else {
    header("Location: ../../sertifikalar.php");
}