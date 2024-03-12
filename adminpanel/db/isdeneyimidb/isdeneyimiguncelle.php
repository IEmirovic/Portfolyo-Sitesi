<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["guncelle"])) {
        $rowid = $_POST["rowid"];
        $pozisyon = htmlspecialchars($_POST["pozisyon"]);
        $sirketAdi = htmlspecialchars($_POST["sirketAdi"]);
        $baslangicYili = htmlspecialchars($_POST["baslangicYili"]);
        $bitisYili = htmlspecialchars($_POST["bitisYili"]);
        $devamDurumu = htmlspecialchars($_POST["devamDurumu"]);

        try {
            require_once "../conn.php";

            $query = "UPDATE isdeneyimleri SET pozisyon = :pozisyon, sirketAdi = :sirketAdi, baslangicYili = :baslangicYili, bitisYili = :bitisYili, devamDurumu= :devamDurumu WHERE id = :rowid;";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":pozisyon", $pozisyon);
            $stmt->bindParam(":sirketAdi", $sirketAdi);
            $stmt->bindParam(":baslangicYili", $baslangicYili);
            $stmt->bindParam(":bitisYili", $bitisYili);
            $stmt->bindParam(":devamDurumu", $devamDurumu);
            $stmt->bindParam(":rowid", $rowid);

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