<?php 
include("database/mysqldatabase.php");

while($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) {
    if($satir['contentcategory'] ==2){
        if(isset($satir)>0){
?>
<link rel="stylesheet" href="csscustom/home.css">
<hr>
<div class="card no-border full-width" onclick="window.location.href='?q=icerik&id=<?php echo $satir['idcontent']; ?>'">

    <div class="row g-0">
        <div class="col-2">
            <img src="<?php echo  $satir['contentimgurl']; ?>" class="img-fluid rounded-start" width="125px" height="125px" alt="...">
        </div>
        <div class="col-10">
            <div class="card-body cb">
                <a>
                    <p class="card-title kt fs-5"><?php echo  $satir['contenttitle']; ?></p>
                    <p class="card-text ct"><?php echo  $satir['contenttext']; ?> </p>
                    <p class="card-sub cs">
                </a>
                    <small class="text-secondary"> <?php echo  $satir['contentdate']; ?></small>
                    <span class="icon">
                        <!-- Yorum ikonu -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                            <path d="M8 0a8 8 0 1 0 6.78 3.97H16a1 1 0 0 1 .993.883L17 5a1 1 0 0 1-1 1h-1.263A8.001 8.001 0 0 0 8 0z"/>
                            <path d="M7.82 11.59 3.8 14.92a.8.8 0 0 1-.9.118A.8.8 0 0 1 2.5 14.2v-3.36A7.97 7.97 0 0 1 0 8c0-.579.064-1.142.182-1.684A8.002 8.002 0 0 0 8 15c.552 0 1.089-.044 1.61-.128a.8.8 0 0 1-.792-.128z"/>
                        </svg>
                        <!-- Okuma ikonu -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zm-8 3.5a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7z"/>
                            <path d="M8 5a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/>
                        </svg>
                        <?php echo  $satir['contentread']; ?> <!-- Okuma sayısı -->
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
<?php 
        } else {
            echo '<div class="container-fluid"><div class="alert alert-warning">Burada hiçbirşey yok</div></div>';
}   // if(isset($satir))
    }   // if
} // while
    
?> 