<?php
include("database/mysqldatabase.php");

if($_SESSION['userroll'] == 4 || $_SESSION['userroll'] == 1){
    echo "Bu kullanıcı bir tesisatçı";


if (isset($_POST['offerId']) || isset($_GET['$offerId'] )) {
    $offerId = $_POST['offerId'];
    echo "offerid: " . $offerId . "<br>";

    // offerId'ye göre teklif detaylarını al
    $sql = "SELECT * FROM offer WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($offerId));
?>
<link rel="stylesheet" href="csscustom/offerpage.css">
<div class="container">
    <div class="row">
        <?php while ($offer = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($offer) {
        ?>

        <div class="container mt-5">
            <div class="card cardcss">
                <div class="card-header bg-dark text-white">
                    <div class="row">
                        <div class="col-2"><?php echo nl2br(htmlspecialchars($offer['nowdate'])); ?></div>
                        <div class="col-10"><?php echo nl2br(htmlspecialchars($offer['who'])); ?></div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- <h5 class="card-title">ID: <?php // echo $offer['id']; ?></h5> -->
                     <div class="row offerrenk">
                        <div class="col-2">Teklifi Veren: </div>
                            <div class="col-10"><?php echo nl2br(htmlspecialchars($offer['bidder'])); ?></div>
                        
                     </div>
                     <div class="row offerrenk2">
                        <div class="col-2">Malzeme Tutarı:</div>
                        <div class="col-10"><?php echo nl2br(htmlspecialchars($offer['price']))." ₺"; ?></div>
                     </div>
                     <div class="row offerrenk">
                        <div class="col-2">Teklif Fiyatı:</div>
                        <div class="col-10"><?php echo nl2br(htmlspecialchars($offer['offerprice']))." ₺"; ?></div>
                     </div>
                    <div class="row offerrenk2">
                        <div class="col-2">Detay:</div>
                        <div class="col-10"> <?php echo nl2br(htmlspecialchars($offer['detail'])); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            } else {
                echo "Teklif bulunamadı.";
            }
        } ?>
    </div>
    <div class="row">
        <form action="index.php?q=aoffer" method="post"></form>
        <div class="col">
            <div class="row"><label for="">YAPILACAK İŞ</label></div>
            <input class="col" type="text" name="" id="">
        </div>
        <div class="col">
            <div class="row"><label for="">FİYAT</label></div>
            <input class="col-6" type="text" name="" id=""> ₺
        </div>
        <div class="col">
            <div class="row"><label for="">MİKTAR</label></div>
            <input class="col-6" type="text" name="" id="">
        </div>
        <div class="col">
            <div class="row"><label for="">BİRİM</label></div>
            <input class="col-6" type="text" name="" id="">
        </div>
        <div class="col">
            <div class="row"><label for="">TUTAR</label></div>
            <input class="col-6" type="text" name="" id=""> ₺
        </div>
        <div class="row"><input type="submit" value="Kaydet"></div>
    </div>
</div>
<?php
} else {
    echo "Geçersiz istek.";
}
}   // Kullanıcı tesisatçı yada admin ifi sonu
?>
