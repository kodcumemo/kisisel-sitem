

<?php
$servername = 'mysql:dbname=mkaakisisel;host=127.0.0.1';
$username = "root";
$password = "1234";
$dbname = "mkaakisisel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    // PDO hata modunu ayarla
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}
// $servername = 'mysql:dbname=localhost;host=127.0.0.1';
// $username = "mehme205_mkaakisisel";
// $password = "mkaa01kisisel";
// $dbname = "mehme205_mkaakisisel";