<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["guncelle"])) {
        $rowid = $_POST["rowid"];
        $yetenekAdi = htmlspecialchars($_POST["yetenekAdi"]);
        $aciklama = htmlspecialchars($_POST["aciklama"]);

        try {
            require_once "../conn.php";

            $query = "UPDATE yetenekler SET yetenekAdi = :yetenekAdi, aciklama = :aciklama WHERE id = :rowid;";

            $stmt = $pdo->prepare($query);

            $stmt->bindParam(":yetenekAdi", $yetenekAdi);
            $stmt->bindParam(":aciklama", $aciklama);
            $stmt->bindParam(":rowid", $rowid);

            $stmt->execute();

            $pdo = null;
            $stmt = null;

            header("Location: ../../yetenekler.php");

            die();

        } catch (PDOException $e) {
            die("İşlem Başarısız: " . $e->getMessage());
        }
    }
} else {
    header("Location: ../../yetenekler.php");
}