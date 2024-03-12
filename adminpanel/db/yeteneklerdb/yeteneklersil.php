<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    try {
        require_once "../conn.php";

        $query = "DELETE FROM yetenekler WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../../yetenekler.php");

        die();

    } catch (PDOException $e) {
        die("İşlem Başarısız: " . $e->getMessage());
    }
} else {
    header("Locaiton: ../../yetenekler.php");
}