<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
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
        if (move_uploaded_file($tempName, $targetPath) && isset($_POST["ekle"])) {
            require_once "../conn.php";
            $projeAdi = htmlspecialchars($_POST["projeAdi"]);
            $projeKonusu = htmlspecialchars($_POST["projeKonusu"]);
            $aciklama = htmlspecialchars($_POST["aciklama"]);
            try {
                $query = "INSERT INTO portfolyo (projeAdi, konu, aciklama, imagePath) VALUES (:projeAdi,:konu,:aciklama, :imagePath);";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(":projeAdi", $projeAdi);
                $stmt->bindParam(":konu", $projeKonusu);
                $stmt->bindParam(":aciklama", $aciklama);
                $stmt->bindParam(":imagePath", $targetPath);
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
        }
    } else {
        echo "Dosya yüklenirken bir hata oluştu.";
    }
} else {
    header("Location: ../../portfolyo.php");
}