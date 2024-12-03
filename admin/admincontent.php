<?php
// Veritabanı bağlantısını içerir
//include '../database/mysqldatabase.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$sql = "SELECT * FROM category;";
$sorgu = $conn->prepare($sql);
$sorgu->execute();
?>
<link rel="stylesheet" href="csscustom/addcontent.css">
<form action="<?php echo htmlspecialchars("index.php?q=content") ?>"  enctype="multipart/form-data"  method="post">
    <div class="form-group">
        <label for="contenttitle">Başlık:</label>
        <input class="form-control" type="text" id="contenttitle" name="contenttitle">
    </div>
    <div class="form-group">
        <label for="contenttext">İçerik:</label>
        <textarea class="form-control" id="contenttext" name="contenttext"></textarea>
    </div>
    <div class="form-group">
        <label for="contentimgurl">Resim Ekle:</label>
        <input class="form-control" type="file" id="contentimgurl" name="contentimgurl">
    </div>
    <div class="form-group">
        <label for="contentcategory">Kategori:</label>
        <select class="form-control" id="contentcategory" name="contentcategory">
            <option value="">Kategori Seç</option>
            <?php foreach ($sorgu as $key => $value): ?>
                <option value="<?php echo $value['idcategory']; ?>"><?php echo $value['idcategory']." - ".$value['categoryname']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ekle</button>
</form>
<?php } else { echo "Bu Alanı Kullanamazsınız"; }  ?>