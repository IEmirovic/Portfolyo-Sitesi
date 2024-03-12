<?php
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["guncelle"])) {
        $rowid = $_POST["rowid"];
        $projeAdi = htmlspecialchars($_POST["projeAdi"]);
        $projeKonusu = htmlspecialchars($_POST["projeKonusu"]);
        $aciklama = htmlspecialchars($_POST["aciklama"]);
        try {
            require_once "../conn.php";
            $query = "UPDATE portfolyo SET projeAdi = :projeAdi, konu = :projeKonusu, aciklama = :aciklama WHERE id = :rowid;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":projeAdi", $projeAdi);
            $stmt->bindParam(":projeKonusu", $projeKonusu);
            $stmt->bindParam(":aciklama", $aciklama);
            $stmt->bindParam(":rowid", $rowid);
            $stmt->execute();
            $pdo = null;
            $stmt = null;
            header("Location: ../../portfolyo.php");
            die();
        } catch (PDOException $e) {
            die("İşlem Başarısız: " . $e->getMessage());
        }
    }
} else {
    header("Location: ../../portfolyo.php");
}*/



///////////////////////////////////////////////////////////////////////////////////////////
//GÜNCELLENMİŞ KOD
///////////////////////////////////////////////////////////////////////////////////////////



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rowid = $_POST["rowid"];
    if (isset($_FILES['image']) && isset($_POST["guncelle"]) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Dosyanın yüklenme sürecinde güvenlik kontrolü
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
        $maxFileSize = 5 * 1024 * 1024; // 5MB
        $uploadPath = 'uploads/';

        $tempName = $_FILES['image']['tmp_name'];
        $originalName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileExtension = pathinfo($originalName, PATHINFO_EXTENSION);

        // Dosya uzantısı ve boyut kontrolü
        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            die("Hata: Geçersiz dosya uzantısı. Sadece JPG, JPEG, PNG ve GIF dosyaları yüklenebilir.");
        }

        if ($fileSize > $maxFileSize) {
            die("Hata: Dosya boyutu çok büyük. En fazla 5MB boyutunda dosya yükleyebilirsiniz.");
        }

        // Dosya adını rastgele oluşturma ve yol
        $newFileName = uniqid('', true) . '.' . $fileExtension;
        $targetPath = $uploadPath . $newFileName;

        // Dosyayı belirtilen yola taşıma
        if (move_uploaded_file($tempName, $targetPath) && isset($_POST["guncelle"])) {
            require_once "../conn.php";
            try {
                ////////////////////ESKİ YOLU SİLEN KOD//////////////////////////
                $query2 = "SELECT imagePath FROM portfolyo WHERE id = :rowid";
                $stmt = $pdo->prepare($query2);
                $stmt->bindParam(":rowid", $rowid);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($row) {
                        $oldPath = $row['imagePath'];
                        if (is_file($oldPath)) {
                            unlink($oldPath);
                            echo "Dosya başarıyla silindi.";
                        } else {
                            echo "Dosya bulunamadı.";
                        }
                    } else {
                        echo "Satır bulunamadı.";
                    }
                }////////////////////////////////////////////////////////////////
                $projeAdi = htmlspecialchars($_POST["projeAdi"]);
                $projeKonusu = htmlspecialchars($_POST["projeKonusu"]);
                $aciklama = htmlspecialchars($_POST["aciklama"]);
                $query = "UPDATE portfolyo SET projeAdi = :projeAdi, konu = :projeKonusu, aciklama = :aciklama, imagePath = :imagePath WHERE id = :rowid;";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(":imagePath", $targetPath);
                $stmt->bindParam(":rowid", $rowid);
                $stmt->bindParam(":projeAdi", $projeAdi);
                $stmt->bindParam(":projeKonusu", $projeKonusu);
                $stmt->bindParam(":aciklama", $aciklama);
                $stmt->bindParam(":rowid", $rowid);
                $stmt->execute();
                $pdo = null;
                $stmt = null;
                header("Location: ../../portfolyo.php");
                die();
            } catch (PDOException $e) {
                die("İşlem Başarısız: " . $e->getMessage());
            }
        } else {
            echo "Dosya yüklenirken bir hata oluştu.";
            var_dump($_FILES['image']['error']);
        }
    } elseif (isset($_POST["guncelle"]) && $_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {
        $projeAdi = htmlspecialchars($_POST["projeAdi"]);
        $projeKonusu = htmlspecialchars($_POST["projeKonusu"]);
        $aciklama = htmlspecialchars($_POST["aciklama"]);
        try {
            require_once "../conn.php";
            $query = "UPDATE portfolyo SET projeAdi = :projeAdi, konu = :projeKonusu, aciklama = :aciklama WHERE id = :rowid;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":projeAdi", $projeAdi);
            $stmt->bindParam(":projeKonusu", $projeKonusu);
            $stmt->bindParam(":aciklama", $aciklama);
            $stmt->bindParam(":rowid", $rowid);
            $stmt->execute();
            $pdo = null;
            $stmt = null;
            header("Location: ../../portfolyo.php");
            die();
        } catch (PDOException $e) {
            die("İşlem Başarısız: " . $e->getMessage());
        }
    } else {
        echo "Dosya yüklenirken bir hata oluştu.";
        var_dump($_FILES['image']['error']);
    }
} else {
    echo "Dosya yüklenirken bir hata oluştu3.";
    var_dump($_FILES['image']['error']);
    //header("Location: ../../portfolyo.php");
}
