<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $offerId = $_POST['offerId'];
    echo "offerid: " .$offerId."<br>";
    // offerId'ye göre teklif detaylarını al
    $sql = "SELECT * FROM offer WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['offerId']));
    $offerDetail = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
<div class="container">
    <div class="row">
        <div class="col"> <h5>TARİH</h5></div>
        <div class="col"> <h5>ID</h5></div>
        <div class="col"> <h5>KİME</h5></div>
        <div class="col"> <h5>DETAY</h5></div>
        <div class="col"> <h5>TEKLİF FİYATI</h5></div>
        <div class="col"> <h5  >TEKLİFİ VEREN</h5></div>
    </div>
    <div class="row">
        <?php if( $offerDetail['nowdate'] != null ) { ?> <div class="col"> <p><?php echo $offerDetail['nowdate']; ?></p>
            <?php } else { ?> <div class="col"> <p>Tarih Yok</p></div>
                <?php } ?>
        <div class="col"> <p><?php echo $offerDetail['id']; ?></p></div>
        <div class="col"> <p><?php echo $offerDetail['who']; ?></p></div>
        <div class="col"> <p><?php echo $offerDetail['detail']; ?></p></div>
        <div class="col"> <p><?php echo $offerDetail['price']; ?></p></div>
        <div class="col"> <p><?php echo $offerDetail['offerprice']; ?></p></div>
        <div class="col"> <p><?php echo $offerDetail['bidder']; ?></p></div>
    </div>
</div>
<?php
    } else {
        echo "Geçersiz istek.";
    }
?>
