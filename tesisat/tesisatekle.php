<?php
echo "Tesisat Ekle Sayfası";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uname = $_SESSION['username'];
    $head = $_POST['tbaslik'];
    $tadet = $_POST['tadet'];
    $tadetfiyati = $_POST['tadetfiyati'];
    $ttekliffiyati = $_POST['ttekliffiyati'];

    echo "<br> Sayfaya giriş başarılı";
    header("Location: index.php?q=gonderiler");
} else {
    // Güncelleme başarılıysa, form sayfasına yönlendirin ve başarı mesajını ekleyin
    echo "Tesisat Ekle Sayfası yanlış giriş şekli";
  //  header("Location: index.php?q=home");
    exit;
}
?>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="index.php?q=tesisatekle">
            <div class="form-group">
              <div class="row"><?php echo "Başlık: ".  $uname; ?></div>
              <div class="row"><?php echo "Başlık: ".  $head; ?></div>
              <div class="row"><?php echo "Adet: ". $tadet; ?></div>
              <div class="row"><?php echo "Adet Fiyatı: ".$tadetfiyati; ?></div>
              <div class="row"><?php echo "Teklifdeki Fiyat: ".$ttekliffiyati; ?></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

