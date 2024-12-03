<?php
include("database/mysqldatabase.php");
//session_start(); // Kullanıcı oturumunu başlat veya devam ettir

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['iduser'])) {
    $commentcontentid = $_POST['idcontent'];
    $comment = $_POST['commenttext'];
    $commentuserid = $_SESSION['iduser'];
    $commentimgurl = null;

    if(isset($_FILES['commentimgurl']) && $_FILES['commentimgurl']['error'] == UPLOAD_ERR_OK){
        $commentimgurl = imgUpload('commentimgurl');
    }

    try {
        $sql = "INSERT INTO comment (commentuserid, commentcontentid, comment, commentdate, commentimgurl) VALUES (?, ?, ?, NOW(), ?)";
        $sorgu = $conn->prepare($sql);
        $sorgu->execute([$commentuserid, $commentcontentid, $comment, $commentimgurl]);

        echo "Yorumunuz gönderildi.";
        header("refresh:2;url=index.php?q=icerik&id=$commentcontentid");
        exit();
    } catch (PDOException $e) {
        //echo 'Veritabanı hatası: ' . $e->getMessage();
    }
} else {
    echo "Yorum gönderme yetkiniz yok.";
    header("refresh:2;url=index.php?q=home");
    exit();
}

function imgUpload($imgUrl) {
    if(isset($_FILES[$imgUrl]) && $_FILES[$imgUrl]['error'] == UPLOAD_ERR_OK) {
        $takeFile = $_FILES[$imgUrl];
        $fileName = uniqid() . "_" . $takeFile["name"];
        $fileType = $takeFile["type"];
        $fileSize = $takeFile["size"];
        $fileTempName = $takeFile["tmp_name"];
        $filePath = "img/" . $fileName;

        if($fileSize > 2000000) {
            echo '<div class="container-fluid"><div class="alert alert-warning">Dosya 2 MB\'den büyük olamaz.<br>Lütfen daha küçük bir dosya seçiniz.</div></div>';
            exit();
        }

        $look = getimagesize($fileTempName);
        if($look === false) {
            echo '<div class="container-fluid"><div class="alert alert-warning">Yüklediğiniz dosya resim dosyası değil.</div>';
            exit();
        }

        $fileExtension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $allowed = ["jpg", "png", "gif", "jpeg", "webp"];
        if(!in_array($fileExtension, $allowed)) {
            echo '<div class="container-fluid"><div class="alert alert-warning">Dosya resim formatında olmalıdır.</div></div>';
            exit();
        }

        if(move_uploaded_file($fileTempName, $filePath)){
            return $fileName;
        } else {
            echo '<div class="container-fluid"><div class="alert alert-warning">Dosya yüklenirken bir sorun oldu.</div></div>';
            exit();
        }
    } else {
        echo '<div class="container-fluid"><div class="alert alert-danger">Dosya Yükleme Yapılmadı</div></div>';
        exit();
    }
}
?>
