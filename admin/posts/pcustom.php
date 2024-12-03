<?php
// Veritabanı bağlantısını gerçekleştirin
//$conn = new PDO("mysql:host=localhost;dbname=yourdbname", 'yourusername', 'yourpassword');
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/* Güncelleme Php Dosyası */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['idcontent'];
    $title = $_POST['contenttitle'];
    $text = $_POST['contenttext'];
    $author = $_POST['contentauthor'];
    $date = $_POST['contentdate'];
    $category = $_POST['contentcategory'];
    $isDeleted = $_POST['contentisdeleted'];

    try {
        $sql = "UPDATE content SET contenttitle = :title, contenttext = :text, contentauthor = :author, contentdate = :date, contentcategory = :category, contentisdeleted = :isDeleted WHERE idcontent = :id";
        $sorgu = $conn->prepare($sql);
        $sorgu->bindParam(':title', $title);
        $sorgu->bindParam(':text', $text);
        $sorgu->bindParam(':author', $author);
        $sorgu->bindParam(':date', $date);
        $sorgu->bindParam(':category', $category);
        $sorgu->bindParam(':isDeleted', $isDeleted);
        $sorgu->bindParam(':id', $id);
        $sorgu->execute();

        // Güncelleme başarılıysa, form sayfasına yönlendirin ve başarı mesajını ekleyin
        header("Location: index.php?q=gonderi&id=" . $id . "&status=success");
        exit;
    } catch (Exception $e) {
        echo "Güncelleme yaparken bir hata oluştu: " . $e->getMessage();
    }
} else { echo "Sayfa yok"; }

