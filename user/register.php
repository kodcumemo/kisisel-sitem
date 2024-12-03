<?php
// register.php

//include 'database/mysqldatabase.php';
//session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $userpassword = $_POST['password'] ?? '';
    $useremail = $_POST['email'] ?? '';
    $userpic = $_POST['profilePic'] ?? '';
    // Dosya yolundan sadece dosya adını alın
    $userpic = basename($userpic);
    try {
        // Kullanıcı adının daha önce alınıp alınmadığını kontrol et
        $sql_check_username = 'SELECT * FROM user WHERE username = :username';
        $stmt_check_username = $conn->prepare($sql_check_username);
        $stmt_check_username->execute([':username' => $username]);
        $existing_username = $stmt_check_username->fetch();

        // E-posta adresinin daha önce kullanılıp kullanılmadığını kontrol et
        $sql_check_email = 'SELECT * FROM user WHERE useremail = :useremail';
        $stmt_check_email = $conn->prepare($sql_check_email);
        $stmt_check_email->execute([':useremail' => $useremail]);
        $existing_email = $stmt_check_email->fetch();

        if ($existing_username) {
            echo '<p class="text-danger">Bu kullanıcı adı zaten alınmış.</p>';
        } elseif ($existing_email) {
            echo '<p class="text-danger">Bu e-posta adresi zaten kullanılmış.</p>';
        } else {
            // Kullanıcı bilgilerini veritabanına kaydet
            $sql_insert_user = 'INSERT INTO user (username, userpassword, useremail, userpic) VALUES (:username, :userpassword, :useremail, :userpic)';
            $stmt_insert_user = $conn->prepare($sql_insert_user);
            $stmt_insert_user->execute([
                ':username' => $username,
                ':userpassword' => password_hash($userpassword, PASSWORD_BCRYPT), // Şifreyi hashleyin
                ':useremail' => $useremail,
                ':userpic' => $userpic
            ]);

            // Yeni eklenen kullanıcının iduser ve userroll bilgilerini al
            $sql_get_user = 'SELECT iduser, userroll, userpic FROM user WHERE username = :username';
            $stmt_get_user = $conn->prepare($sql_get_user);
            $stmt_get_user->execute([':username' => $username]);
            $user = $stmt_get_user->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Kullanıcı bilgilerini session'a kaydet
                $_SESSION['username'] = $username;
                $_SESSION['useremail'] = $useremail;
                $_SESSION['iduser'] = $user['iduser'];
                $_SESSION['userroll'] = $user['userroll'];
                $_SESSION['userpic'] = $user['userpic'];

                echo 'Kayıt başarılı. Yönlendiriliyorsunuz...';
                header("refresh:2;url=index.php?q=home");
            } else {
                echo 'Kullanıcı bilgileri alınamadı.';
            }
        }
    } catch (PDOException $e) {
        echo 'Veritabanı hatası: ' . $e->getMessage();
    }
} else {
    echo 'Geçersiz istek.';
}
?>
