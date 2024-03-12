<?php
$password = "12345"; // Hash'lemek istediğimiz şifre
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo $hashed_password;

//İLETİŞİM GÜNCELLEME KODLARI + HATA KONTROLLERİ//

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["guncelle"])) {
        $email = htmlspecialchars($_POST["email"]);
        $adres = htmlspecialchars($_POST["adres"]);
        $telefon = htmlspecialchars($_POST["telefon"]);
        $instagram = htmlspecialchars($_POST["instagram"]);
        $twitter = htmlspecialchars($_POST["twitter"]);
        $youtube = htmlspecialchars($_POST["youtube"]);
        $linkedin = htmlspecialchars($_POST["linkedin"]);
        $github = htmlspecialchars($_POST["github"]);

        $error_message = "";

        $emailMax = 50;
        $telefonMax = 11;

        $linkMax = 100;

        if ($email == "" || $adres == "" || $telefon == "") {

            $error_message .= "E-Posta, Adres ve Telefon alanlarını doldurunuz!";

        } elseif (mb_strlen($email) > $emailMax || mb_strlen($telefon) !== $telefonMax) {
            $error_message .= "E-Posta karakter sayısı maksimum 50'dir. Telefon numarasını başında 0 olacak şekilde 11 haneli giriniz.";

        } elseif (mb_strlen($instagram) > $linkMax || mb_strlen($twitter) > $linkMax || mb_strlen($youtube) > $linkMax || mb_strlen($linkedin) > $linkMax || mb_strlen($github) > $linkMax) {

            $error_message .= "Sosyal medya linkleri maksimum 100 karakter olmalıdır. İsterseniz boş bırakabilirsiniz.";

        }

        if (!empty($error_message)) {
            $_SESSION["error_message"] = $error_message;
            header("Location: ../../iletisim.php");
            exit;
        }

        try {
            require_once "../conn.php";

            $query = "UPDATE iletisim SET email = :email, adres = :adres, telefon = :telefon, instagram = :instagram, twitter= :twitter, youtube = :youtube, linkedin = :linkedin, github = :github WHERE id = 1;";

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":adres", $adres);
            $stmt->bindParam(":telefon", $telefon);
            $stmt->bindParam(":instagram", $instagram);
            $stmt->bindParam(":twitter", $twitter);
            $stmt->bindParam(":youtube", $youtube);
            $stmt->bindParam(":linkedin", $linkedin);
            $stmt->bindParam(":github", $github);

            switch ("") {
                /*case $email:
                    $email = "#";
                    break;
                case $adres:
                    $adres = "#";
                    break;
                case $telefon:
                    $telefon = "#";
                    break;*/
                case $instagram:
                    $instagram = "#";
                    break;
                case $twitter:
                    $twitter = "#";
                    break;
                case $youtube:
                    $youtube = "#";
                    break;
                case $linkedin:
                    $linkedin = "#";
                    break;
                case $github:
                    $github = "#";
                    break;
                default:
                    echo $error_message = "Hata.";
            }

            $stmt->execute();

            $pdo = null;
            $stmt = null;

            header("Location: ../../iletisim.php");

            die();

        } catch (PDOException $e) {
            die("İşlem Başarısız: " . $e->getMessage());
        }

    }
} else {
    header("Location: ../../iletisim.php");
    echo $error_message = "Tekrar deneyin.";
}