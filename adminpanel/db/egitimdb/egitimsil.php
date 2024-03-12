<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    try {
        require_once "../conn.php";

        $query = "DELETE FROM egitim WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../../egitim.php");

        die();

    } catch (PDOException $e) {
        die("İşlem Başarısız: " . $e->getMessage());
    }
} else {
    header("Locaiton: ../../egitim.php");
}


































//<a href='#' onclick='confirmDelete(" . $row["id"] . ")'><i class='fas fa-trash-alt'></i></a>";
//<a href='?action=db/egitimdb/egitimsil.php&id=" . $row["id"] . "'><i class='fas fa-trash-alt'></i></a>";