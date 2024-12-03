<?php
// login.php
include 'database/mysqldatabase.php';
//session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usernameOrEmail = strtolower($_POST['username_or_email'] ?? '');
    $userpassword = $_POST['password'] ?? '';

    $sql = 'SELECT * FROM user WHERE LOWER(username) = :usernameOrEmail OR LOWER(useremail) = :usernameOrEmail';
    $stmt = $conn->prepare($sql);
    $stmt->execute([':usernameOrEmail' => $usernameOrEmail]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($userpassword, $user['userpassword'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['userroll'] = $user['userroll'];
        $_SESSION['iduser'] = $user['iduser'];
        $_SESSION['userpic'] = $user['userpic'];

        //echo $_SESSION['iduser'];
        echo '<div class="login-success">Giriş başarılı. Yönlendiriliyorsunuz...</div>';
        header("refresh:2;url=index.php?q=home");
        exit();
    } else {
        echo 'Kullanıcı adı/e-posta veya şifre yanlış';
    }
} else {
    echo 'Geçersiz istek.';
}


