<?php
include("database/mysqldatabase.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = $_POST["username"];
    $userEmail = $_POST["useremail"];
    $userRoll = $_POST["userroll"];
    $idUser = $_POST["iduser"];
    $userPic = $_POST["userpic"];
    
    $userPic = basename($userPic);
    echo " " . $idUser . " ".$userPic;

    try {
        // Veritabanı bağlantısını burada yapın
        //$conn = new PDO("mysql:host=localhost;dbname=yourdbname", 'yourusername', 'yourpassword');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE user SET username=:username, useremail=:useremail, userroll=:userroll, userpic=:userpic WHERE iduser = :iduser";
        $sorgu = $conn->prepare($sql);

        $sorgu->bindParam(':iduser', $idUser);
        $sorgu->bindParam(':username', $userName);
        $sorgu->bindParam(':useremail', $userEmail);
        $sorgu->bindParam(':userroll', $userRoll);
        $sorgu->bindParam(':userpic', $userPic);
        $sorgu->execute();
        
        $send ="Güncelleme Başarılı";
    } catch (Exception $e) {
        $send ="Güncelleme yaparken sıkıntı çıktı: " . $e->getMessage();
    }

    // Silme işlemi fonksiyonu
    function delete($userId, $conn) {
        $userdel = 1; // Silindi olarak işaretlemek için 1 değeri kullanılır
        try {
            $sql = "UPDATE user SET userisdeleted=:userisdeleted WHERE iduser=:iduser";
            $sorgu = $conn->prepare($sql);
            $sorgu->bindParam(':userisdeleted', $userdel);
            $sorgu->bindParam(':iduser', $userId);
            $sorgu->execute();
            
            $send = "Silme Başarılı";
            
        } catch (Exception $e) {
            $send = "Silme yaparken sıkıntı çıktı: " . $e->getMessage();
        }
    }

    // Silme fonksiyonunu çağırmak için kullanabilirsiniz
    if (isset($_POST['delete']) && $_POST['delete'] == 1) {
        delete($idUser, $conn);
    }
} else  {
    echo "Yetkisiz Giriş";
}

