<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    try {
        require_once "../conn.php";

        $query = "DELETE FROM portfolyo WHERE id = :id";
        $query2 = "SELECT imagePath FROM portfolyo WHERE id = :id";
        $stmt = $pdo->prepare($query2);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $imagePath = $row['imagePath'];
                if (is_file($imagePath)) {
                    unlink($imagePath);
                    $stmt = $pdo->prepare($query);
                    $stmt->bindParam(":id", $id);
                    $stmt->execute();
                    echo "Dosya başarıyla silindi.";
                } else {
                    echo "Dosya bulunamadı.";
                }
            } else {
                echo "Satır bulunamadı.";
            }
        }
        $pdo = null;
        $stmt = null;
        header("Location: ../../portfolyo.php");
        die();
    } catch (PDOException $e) {
        die("İşlem Başarısız: " . $e->getMessage());
    }
} else {
    header("Location: ../../portfolyo.php");
}