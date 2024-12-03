<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id = $_GET['id'];

$sql = "SELECT * FROM content WHERE idcontent=?";
$sorgu = $conn->prepare($sql);
$sorgu->execute(array($id));
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);

$csql = "SELECT * FROM category";
$csorgu = $conn->prepare($csql);
$csorgu->execute();

$usql = "SELECT * FROM user";
$usorgu = $conn->prepare($csql);
$usorgu->execute();

$durum = ["Yayında", "Kaldırıldı"];
?>


<div class="container">
    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <div class="alert alert-success">Güncelleme Başarılı</div>
    <?php endif; ?>
    
    <form action="index.php?q=gonderiguncelleme" method="POST">
        <input type="hidden" name="idcontent" value="<?php echo $satir['idcontent']; ?>">
        <div class="row">
            <div class="col-3">
                <img src="<?php echo $satir['contentimgurl']; ?>" width="150px" height="150px" alt="Resim Yüklenemedi" />
            </div>
            <div class="col">
                <label for="contenttitle">Başlık</label>
                <input type="text" name="contenttitle" class="col-12" value="<?php echo $satir['contenttitle']; ?>">
                <label for="contenttext">İçerik</label>
                <textarea class="col-12" name="contenttext"><?php echo $satir['contenttext']; ?></textarea>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-3">Gönderen</div>
            <div class="col-3">Ekleme Tarihi</div>
            <div class="col-3">Kategorisi</div>
            <div class="col-3">Durumu: <?php echo $satir['contentisdeleted']; ?></div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-3"><input type="text" name="contentauthor" value="<?php echo $satir['contentauthor']; ?>" readonly></div>
            <div class="col-3"><input type="text" name="contentdate" value="<?php echo $satir['contentdate']; ?>" readonly></div>
            <div class="col-3">
                <select name="contentcategory" id="contentcategory">
                    <option value="<?php echo $satir['contentcategory']; ?>">Kategori Değiştir</option>
                    <?php foreach ($csorgu as $value): ?>
                        <option value="<?php echo $value['idcategory']; ?>"><?php echo $value['idcategory']." - ".$value['categoryname']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-3">
                <select name="contentisdeleted" id="contentisdeleted">
                    <option value="<?php echo $satir['contentisdeleted']; ?>">Durumu Değiştir</option>
                    <option value="0">Yayında</option>
                    <option value="1">Kaldırıldı</option>
                </select>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-8"><input class="btn btn-success mt-4" type="submit" value="Güncelle"></div>
        </div>
    </form>
</div>
<?php } else { echo "Bu işlem için yetkiniz yok "; }?>