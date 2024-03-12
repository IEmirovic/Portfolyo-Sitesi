<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["guncelle"])) {
        $rowid = $_POST["rowid"];
        $kurumAdi = htmlspecialchars($_POST["kurumAdi"]);
        $sertifikaAdi = htmlspecialchars($_POST["sertifikaAdi"]);
        $aciklama = htmlspecialchars($_POST["aciklama"]);
        $yil = htmlspecialchars($_POST["yil"]);

        try {
            require_once "../conn.php";

            $query = "UPDATE sertifika SET kurumAdi = :kurumAdi, sertifikaAdi = :sertifikaAdi, aciklama = :aciklama, yil = :yil WHERE id = :rowid;";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":kurumAdi", $kurumAdi);
            $stmt->bindParam(":sertifikaAdi", $sertifikaAdi);
            $stmt->bindParam(":aciklama", $aciklama);
            $stmt->bindParam(":yil", $yil);
            $stmt->bindParam(":rowid", $rowid);

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