<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $offerId = $_POST['offerId'];
    echo "offerid: " .$offerId."<br>";
    // offerId'ye göre teklif detaylarını al
    $sql = "SELECT * FROM offerdetail WHERE offerid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array($_POST['offerId']));
   // $od = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="row">
        <?php while( $od = $stmt->fetch(PDO::FETCH_ASSOC) ) { ?>

        <div class="col-md-12">
            <label><?php  echo $od['id']; ?></label>
            <label><?php  echo $od['offerid']; ?></label>
            <label><?php  echo $od['detail']; ?></label>
            <label><?php  echo $od['amount']; ?></label>
            <label><?php  echo $od['price']; ?></label>
            <label><?php  echo $od['offerdetail']; ?></label>
            <label><?php  echo $od['date']; ?></label>
            <label><?php  echo $od['bidder']; ?></label>

        </div>
        <?php } ?>

    </div>
</div>
<?php
    } else {
        echo "Geçersiz istek.";
    }
?>