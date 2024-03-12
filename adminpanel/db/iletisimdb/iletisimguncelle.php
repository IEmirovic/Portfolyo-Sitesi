<?php
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
                case $email:
                    $email = "#";
                    break;
                case $adres:
                    $adres = "#";
                    break;
                case $telefon:
                    $telefon = "#";
                    break;
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
                    echo "Hata.";
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
    echo "Tekrar deneyin.";
}