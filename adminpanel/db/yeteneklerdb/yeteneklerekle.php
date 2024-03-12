<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["ekle"])) {
        require_once "../conn.php";
        $yetenekAdi = htmlspecialchars($_POST["yetenekAdi"]);
        $aciklama = htmlspecialchars($_POST["aciklama"]);
        try {
            $query = "INSERT INTO yetenekler (yetenekAdi, aciklama) VALUES (:yetenekAdi,:aciklama);";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":yetenekAdi", $yetenekAdi);
            $stmt->bindParam(":aciklama", $aciklama);
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