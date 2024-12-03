<?php
include("database/mysqldatabase.php");
?>
<!-- <link rel="stylesheet" href="csscustom/home.css"> -->
<!--  <link rel="stylesheet" href="path/to/your/bootstrap.css">  Bootstrap CSS dosyasının yolunu ekleyin -->
      <link rel="stylesheet" href="csscustom/homeslider.css">

    <!-- deneme başı-->
     <div class="row justify-content-center">
      <div class="col-8">
<div id="carouselExample" class="carousel slide bg-dark border">
  <div class="carousel-inner">
    
      <?php
      for ($i=1; $i <= 3; $i++) { 
        echo "<div class='carousel-item active'>
        <img src='img/carousel/aa".$i.".jpg' class='d-block w-100' alt='...'>
        </div>
        ";
      }
        
      ?>
      
    <div class="carousel-item">
      <img src="img/carousel/aa2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/carousel/aa3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Geri</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="false"></span>
    <span class="visually-hidden text text-secondary">İleri</span>
  </button>
</div>
      </div>
     </div>

    <!-- deneme sonu -->
<div>
    <h1 class="bg-dark text-light">SON EKLENENLER</h1>
    <h1 style="background:red; height:2px;"></h1>
</div>
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
      // yorum sayıları
      function commentNumber($idcontent = 0 ) {
        include("database/mysqldatabase.php");
  
      // $idcontent; // İlgili idcontent değeri
  
      $sql = "SELECT COUNT(*) AS matching_count FROM comment WHERE commentcontentid = :idcontent";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':idcontent', $idcontent, PDO::PARAM_INT);
      $stmt->execute();
     $resultComment = $stmt->fetch(PDO::FETCH_ASSOC);
     return $resultComment['matching_count'];
      
}

    // Son eklenen üç içeriği almak için SQL sorgusu
    $sqlla= "SELECT * FROM content WHERE contentisdeleted = 0 ORDER BY idcontent DESC LIMIT 3;";
    $sorgula = $conn->prepare($sqlla);
    $sorgula->execute();
    $lastAdd = $sorgula->fetchAll(PDO::FETCH_ASSOC);

    
    

    foreach ($lastAdd as $v) {
    ?>

    
      <div class="col my-3">
        <div class="card h-100">
          <img src="<?php echo $v['contentimgurl']; ?>" class="card-img-top img-fluid rounded-start mt-2" alt="...">
          <div class="card-body">
            <a class="card-url" href="index.php?q=icerik&id=<?php echo $v['idcontent']; ?>">
              <h5 class="card-title"><?php echo $v['contenttitle']; ?></h5>
              <p class="card-text">
                <?php 
                  $text = $v['contenttext'];
                  echo (strlen($text) > 30) ? substr($text, 0, 30) . '...' : $text;
                ?>
              </p>
            </a>
          </div>
          <div class="card-footer">
            <small class="text-muted">
              <p>
                <small class="text-secondary">
                  <?php echo $v['contentdate']; ?>
                </small>
                <span class="icon">
                 <!-- svg buraya gelecek -->
                  <?php echo "Yorum: ". commentNumber($v['idcontent']); ?>
                </span>
              </p>
            </small>
          </div>
        </div>
      </div>
    <?php
    }
    ?>
    </div>
</div>

<div>
    <h1 class="bg-dark text-light">EN ÇOK OKUNANLAR</h1>
    <h1 style="background:red; height:2px;"></h1>
</div>
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    // En çok okunan içerikleri almak için SQL sorgusu
    $category = 2;

    $sqlcat = "SELECT * FROM content WHERE contentisdeleted = 0 AND contentcategory = :category ORDER BY idcontent DESC LIMIT 3";
    $sorgucat = $conn->prepare($sqlcat);
    $sorgucat->execute(['category' => $category]);
    $mostRead = $sorgucat->fetchAll(PDO::FETCH_ASSOC);
    if(isset($mostRead) && count($mostRead) > 0) {
    foreach ($mostRead as $v) {
    ?>
      <div class="col my-3">
        <div class="card h-100">
          <img src="<?php echo $v['contentimgurl']; ?>" class="card-img-top img-fluid rounded-start mt-2" alt="...">
          <div class="card-body">
            <a class="card-url" href="index.php?q=icerik&id=<?php echo $v['idcontent']; ?>">
              <h5 class="card-title"><?php echo $v['contenttitle']; ?></h5>
              <p class="card-text">
                <?php 
                  $text = $v['contenttext'];
                  echo (strlen($text) > 30) ? substr($text, 0, 30) . '...' : $text;
                ?>
              </p>
            </a>
          </div>
          <div class="card-footer">
            <small class="text-muted">
              <p>
                <small class="text-secondary">
                  <?php echo $v['contentdate']; ?>
                </small>
                <span class="icon">
                 <!-- svg buraya gelecek -->
                 <?php echo "Yorum: ". commentNumber($v['idcontent']); ?>
                </span>
              </p>
            </small>
          </div>
        </div>
      </div>
    <?php
    }
    } else {
      echo "<p>Sana gösterecek bir veri bulamadım.</p>";
    }
    
    ?>
    </div>
</div>
<script src="jscustom/homeslider.js"></script>
<script>
  document.querySelectorAll("img").forEach(img => {
    img.ondblclick = (e) => {
        const heart = document.createElement("div");
        heart.className = "heart";
        heart.style.left = e.clientX + "px";
        heart.style.top = e.clientY + "px";
        heart.onanimationend = () => heart.remove();
        document.body.append(heart);
    }
  });
</script>
