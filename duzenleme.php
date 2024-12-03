<?php
include("database/mysqldatabase.php");
?>
    <link rel="stylesheet" href="csscustom/home.css">
    <link rel="stylesheet" href="path/to/your/bootstrap.css"> <!-- Bootstrap CSS dosyasının yolunu ekleyin -->
    <div>
        <h1 class="bg-dark text-light">SON EKLENENLER</h1>
        <h1 style="background:red; height:2px;"></h1>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    // Son eklenen üç içeriği almak için SQL sorgusu
    $sqlla= "SELECT * FROM content WHERE contentisdeleted = 0 ORDER BY idcontent DESC;";
    $sorgula = $conn->prepare($sqlla);
    $sorgula->execute();
    $lastAdd = $sorgula->fetchAll(PDO::FETCH_ASSOC);

    foreach ($lastAdd as $v) {
    ?>
    
      <div class="col my-3">
        <div class="card h-100 heart">
          <img src="<?php echo $v['contentimgurl']; ?>" class="img-fluid rounded-start heart mt-2" alt="...">
          <div class="card-body">
            <a class="card-url" href="index.php?q=icerik&id=<?php echo $v['idcontent']; ?>">
              <h5 class="card-title"><?php echo $v['contenttitle']; ?></h5>
              <p class="card-text ct"><?php echo $v['contenttext']; ?></p>
            </a>
          </div>
          <div class="card-footer">
            <small class="text-muted">
              <p class="card-sub cs">
                <small class="text-secondary">
                  <?php echo $v['contentdate']; ?>
                </small>
                <span class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 6.78 3.97H16a1 1 0 0 1 .993.883L17 5a1 1 0 0 1-1 1h-1.263A8.001 8.001 0 0 0 8 0z"/>
                    <path d="M7.82 11.59 3.8 14.92a.8.8 0 0 1-.9.118A.8.8 0 0 1 2.5 14.2v-3.36A7.97 7.97 0 0 1 0 8c0-.579.064-1.142.182-1.684A8.002 8.002 0 0 0 8 15c.552 0 1.089-.044 1.61-.128a.8.8 0 0 1-.792-.128z"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zm-8 3.5a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7z"/>
                    <path d="M8 5a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/>
                  </svg>
                  <?php echo $v['contentread']; ?>
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

    <div>
        <h1 class="bg-dark text-light">EN ÇOK OKUNANLAR</h1>
        <h1 style="background:red; height:2px;"></h1>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
    // En çok okunan içerikleri almak için SQL sorgusu
    $category = 2;

    $sqlcat = "SELECT * FROM content WHERE contentisdeleted = 0 AND contentcategory = :category ORDER BY idcontent DESC LIMIT 3";
    $sorgucat = $conn->prepare($sqlcat);
    $sorgucat->execute(['category' => $category]);
    $mostRead = $sorgucat->fetchAll(PDO::FETCH_ASSOC);
    if(isset($mostRead)) {
    foreach ($mostRead as $v) {
    ?>
      <div class="col my-3">
        <div class="card h-100">
          <img src="<?php echo $v['contentimgurl']; ?>" class="img-fluid rounded-start heart mt-2" alt="...">
          <div class="card-body">
            <a class="card-url" href="index.php?q=icerik&id=<?php echo $v['idcontent']; ?>">
              <h5 class="card-title"><?php echo $v['contenttitle']; ?></h5>
              <p class="card-text ct"><?php echo $v['contenttext']; ?></p>
            </a>
          </div>
          <div class="card-footer">
            <small class="text-muted">
              <p class="card-sub cs">
                <small class="text-secondary">
                  <?php echo $v['contentdate']; ?>
                </small>
                <span class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 6.78 3.97H16a1 1 0 0 1 .993.883L17 5a1 1 0 0 1-1 1h-1.263A8.001 8.001 0 0 0 8 0z"/>
                    <path d="M7.82 11.59 3.8 14.92a.8.8 0 0 1-.9.118A.8.8 0 0 1 2.5 14.2v-3.36A7.97 7.97 0 0 1 0 8c0-.579.064-1.142.182-1.684A8.002 8.002 0 0 0 8 15c.552 0 1.089-.044 1.61-.128a.8.8 0 0 1-.792-.128z"/>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zm-8 3.5a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7z"/>
                    <path d="M8 5a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/>
                  </svg>
                  <?php echo $v['contentread']; ?>
                </span>
              </p>
            </small>
          </div>
        </div>
      </div>
    <?php
    }
  } else {
    echo "Sana Gösterecek Bir Veri Bulamadım.";
  }
  
    ?>
    </div>

    <script>
      document.querySelector("img").ondblclick = (e) => {
            const heart = document.createElement("div");
            heart.className = "heart";
            heart.style.left = e.clientX + "px";
            heart.style.top = e.clientY + "px";
            heart.onanimationend = () => heart.remove();
            document.body.append(heart);
        }
    </script>
