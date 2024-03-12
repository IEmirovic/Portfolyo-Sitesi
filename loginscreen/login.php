<?php
include_once "../adminpanel/db/conn.php";
// Oturum süresini belirle (1800 saniye = 30 dakika)
ini_set('session.gc_maxlifetime', 1800);
// Oturum çerezinin ömrünü de 30 dakika olarak ayarla
session_set_cookie_params(1800);

// Oturum başlat
session_start();

// Oturum süresini yenile
$_SESSION['LAST_ACTIVITY'] = time();

// Form gönderildiğinde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // CSRF saldırılarına karşı koruma
    if (!empty($_POST["csrf_token"]) && hash_equals($_SESSION["csrf_token"], $_POST["csrf_token"])) {
        // Formdan gelen kullanıcı adı ve şifreyi al
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Kullanıcı adını ve parolayı veritabanında kontrol et
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            if (password_verify($password, $row["password"])) {
                // Giriş doğruysa, ana sayfaya yönlendir
                $_SESSION["user_id"] = $row["id"];
                header("Location: ../adminpanel/index.php");
                exit;
            } else {
                // Hatalı parola
                $error_message = "Hatalı kullanıcı adı veya şifre!";
            }
        } else {
            // Kullanıcı adı bulunamadı
            $error_message = "Hatalı kullanıcı adı veya şifre!";
        }
    } else {
        // CSRF token eşleşmedi
        $error_message = "CSRF saldırısı algılandı!";
    }
} else {
    echo "HATA";
}

// CSRF token oluştur
$csrf_token = bin2hex(random_bytes(32));
$_SESSION["csrf_token"] = $csrf_token;
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p class="login-text">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-lock fa-stack-1x"></i>
            </span>
        </p>
        <?php if (isset($error_message))
            echo "<p style='color: white'>$error_message</p>"; ?>
        <input type="text" class="login-username" autofocus="true" required="true" placeholder="Kullanıcı Adı"
            name="username" />
        <input type="password" class="login-password" placeholder="Şifre" name="password" />
        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
        <input type="submit" name="Login" value="Giriş" class="login-submit" />
    </form>
    <div class="underlay-photo"></div>
    <div class="underlay-black"></div>
</body>

</html>