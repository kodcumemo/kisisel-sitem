<?php
include("database/mysqldatabase.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $who = $_POST['who'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
    $bidder = $_POST['bidder'];
    $nowdate = $_POST['nowdate'];
    $offerprice = $_POST['offerprice'];
    $offercol = $_POST['offercol'];
    $acceptoffer = $_POST['acceptoffer'];

    try {
        $sqlosave = "INSERT INTO offer (who, detail, price, bidder, nowdate, acceptoffer, offerprice, offercol) VALUES (:who, :detail, :price, :bidder, :nowdate, :acceptoffer, :offerprice, :offercol)";
        $stmt = $conn->prepare($sqlosave);
        $stmt->bindValue(':who', $who, PDO::PARAM_STR);
        $stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_STR);
        $stmt->bindValue(':bidder', $bidder, PDO::PARAM_STR);
        $stmt->bindValue(':nowdate', $nowdate, PDO::PARAM_STR);
        $stmt->bindValue(':acceptoffer', $acceptoffer, PDO::PARAM_STR);
        $stmt->bindValue(':offerprice', $offerprice, PDO::PARAM_STR);
        $stmt->bindValue(':offercol', $offercol, PDO::PARAM_STR);
        $stmt->execute();
        
    } catch (PDOException $e) {
        echo "Hata: " . $e->getMessage();
    }
    echo "Teklif Kod Hazır Olunca Kaydedilecek " . $bidder . " " . $detail;

} else {
    echo "<br> Bu Şekilde Olmaz";
}
?>
