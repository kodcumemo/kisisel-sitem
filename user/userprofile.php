<?php

if (!isset($_SESSION['iduser'])) {
    echo '<div class="container-fluid"><div class="alert alert-warning">Lütfen önce giriş yapınız.</div></div>';
    header("refresh:2;url=index.php?q=home");
    exit;
}

$id = $_SESSION['iduser'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_profile']) && $_POST['delete_profile'] == '1') {
        // Kullanıcı profilini silme işlemi
        $sql = "UPDATE user SET userisdeleted=1 WHERE iduser=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        session_destroy();
        echo '<div class="container-fluid"><div class="alert alert-success">Profiliniz başarıyla silindi.</div></div>';
        header("refresh:2;url=index.php?q=home");
        exit;
    } elseif (isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        // Şifre güncelleme işlemi
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        $sql = "SELECT userpassword FROM user WHERE iduser=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($current_password, $user['userpassword'])) {
            if ($new_password === $confirm_password) {
                $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
                $sql = "UPDATE user SET userpassword=? WHERE iduser=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$hashed_password, $id]);

                echo '<div class="container-fluid"><div class="alert alert-success">Şifreniz başarıyla güncellendi.</div></div>';
            //    header("refresh:2;Location=index.php?q=profil");
                exit;
            } else {
                echo '<div class="container-fluid"><div class="alert alert-danger">Yeni şifreler eşleşmiyor.</div></div>';
            //    header("refresh:2;url=index.php?q=home");
                exit;
            }
        } else {
            echo '<div class="container-fluid"><div class="alert alert-danger">Eski şifreniz yanlış.</div></div>';
        //    header("refresh:2;url=index.php?q=home");
            exit;
        }
    } else {
        // Kullanıcı profilini güncelleme işlemi
        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $userpic = basename($_POST['userpic']);
        $userroll = $_SESSION['userroll'];

        $sql = "UPDATE user SET username=?, useremail=?, userpic=?, userroll=? WHERE iduser=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $useremail, $userpic, $userroll, $id]);

        $_SESSION['username'] = $username;
        $_SESSION['useremail'] = $useremail;
        $_SESSION['userpic'] = $userpic;
        $_SESSION['userroll'] = $userroll;

        echo '<div class="container-fluid"><div class="alert alert-success">Profiliniz başarıyla güncellendi.</div></div>';
       // header("refresh:2;url=index.php?q=home");
        exit;
    }
}
