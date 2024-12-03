<?php
session_start();
?>
    <link rel="stylesheet" href="csscustom/header.css">
    <link rel="stylesheet" href="path/to/your/bootstrap.css"> <!-- Bootstrap CSS dosyasının yolunu ekleyin -->

    <div class="row">
        <a href="index.php" class="navbar-brand aaa">Programcının Yol Haritası</a>
    </div>
    <div class="col-lg-4 col-md-12 mb-4">
        <p class="tred">Haydi iki satır kod yazalım</p>
    </div>
<nav class="col-12  ">
    <div class="navbar  bg-dark  d-flex justify-content-between">
        <button class="navbar-toggler">&#9776;</button>
        <ul class="navbar-nav  align-items-center col-lg justify-content-between">
            <li><a href="index.php?q=home">Ana Sayfa</a></li>
            
            <!-- Ürünler sekmesi -->
            <li class="has-sub-menu">
                <a href="index.php?q=products">Ürünler</a>
                <!-- Alt menü -->
            </li>
            <!-- Yazılım Dilleri sekmesi -->
            <li class="has-sub-menu">
                <a href="index.php?q=languages">Yazılım Dilleri</a>
                <!-- Alt menü -->
            </li>
            <li class="has-sub-menu"><a href="index.php?q=technology">Teknoloji</a></li>
            <li class="has-sub-menu"><a href="index.php?q=games">Oyunlar</a></li>
            <li class="has-sub-menu"><a href="index.php?q=about">Hakkımda</a></li>
            <li class="has-sub-menu"><a href="index.php?q=contact">İletişim</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <?php if ($_SESSION['userroll'] == 4): ?>
                    <li class="has-sub-menu">
                        <form action="index.php?q=tesisat" method="post">
                            <button class="btn text-light" type="submit" value="Tesisat">Tesisat</button>
                        </form>
                        </li>




                <?php endif; 
                if ($_SESSION['userroll'] == 1): ?>
                    <li class="has-sub-menu"><a href="index.php?q=addcontent">İçerik Ekle</a></li>
                    <li class="has-sub-menu">
                        <form action="index.php?q=tesisat" method="post">
                            <button class="btn text-light" type="submit" value="Tesisat">Tesisat</button>
                        </form>
                        </li>
                    <li class="has-sub-menu">
                    <form action="index.php?q=tesisat" method="post">
                        <a href="index.php?q=admin">Admin Paneli</a>
                        </form>
                    </li>
                    <?php elseif ($_SESSION['userroll'] == 0): ?>
                    <li><a href="index.php?q=addcontent">İçerik Ekle</a></li>
                <?php elseif ($_SESSION['userroll'] == 2): ?>
                    <li><a href="index.php?q=addcontent">İçerik Ekle</a></li>
                    <li class="has-sub-menu">
                        <form action="index.php?q=tesisat" method="post">
                            <button class="btn text-light" type="submit" value="Tesisat">Tesisat</button>
                        </form>
                        </li>
                <?php endif; ?>
            <?php endif; ?>
    
        
        <li class="has-sub-menu align-items-center d-flex justify-content-between ">
                    <?php if (isset($_SESSION['username'])): ?>
                        <form action="index.php?q=profil" method="post">
                            <button type="submit" class="btn btn-primary-outline rounded-pill btnprofile">
                                <img class="profilePic rounded-circle" src="<?php echo "img/profiles/" . htmlspecialchars($_SESSION['userpic']); ?>" alt="Profil Picture" width="50px" height="50px">
                                <span class="text-white"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                            </button>
                        </form>
                        
                            <a href="index.php?q=logout"> Çıkış yap
                                <svg class="" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 3H21V21H15" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 17L15 12L10 7" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3 12H15" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                            
                    <?php else: ?>
                        <a class="btn btn-dark" href="index.php?q=girisyap">Giriş Yap
                        <svg width="40px" height="40px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9769 14H10.0229C8.56488 14.0724 7.2731 14.963 6.68693 16.3C5.97993 17.688 7.39093 19 9.03193 19H15.9679C17.6099 19 19.0209 17.688 18.3129 16.3C17.7268 14.963 16.435 14.0724 14.9769 14Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4999 8C15.4999 9.65685 14.1568 11 12.4999 11C10.8431 11 9.49994 9.65685 9.49994 8C9.49994 6.34315 10.8431 5 12.4999 5C13.2956 5 14.0587 5.31607 14.6213 5.87868C15.1839 6.44129 15.4999 7.20435 15.4999 8Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        </a>
                    <?php endif; ?>
        </li>    
        
    </ul>
    </div>
</nav>
<div class="kline"></div>

<script>
    document.querySelector('.navbar-toggler').addEventListener('click', function() {
        this.classList.toggle('active');
        document.querySelector('.navbar-nav').classList.toggle('open');
    });

    document.addEventListener('click', function(event) {
        var isClickInside = document.querySelector('.navbar').contains(event.target);
        if (!isClickInside) {
            document.querySelector('.navbar-toggler').classList.remove('active');
            document.querySelector('.navbar-nav').classList.remove('open');
        }
    });
</script>

 <?php



// svg ç8ıkışyap /
/*
                                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 3H21V21H15" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M10 17L15 12L10 7" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3 12H15" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                */

// svg girisyap
/*
<svg width="40px" height="40px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9769 14H10.0229C8.56488 14.0724 7.2731 14.963 6.68693 16.3C5.97993 17.688 7.39093 19 9.03193 19H15.9679C17.6099 19 19.0209 17.688 18.3129 16.3C17.7268 14.963 16.435 14.0724 14.9769 14Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4999 8C15.4999 9.65685 14.1568 11 12.4999 11C10.8431 11 9.49994 9.65685 9.49994 8C9.49994 6.34315 10.8431 5 12.4999 5C13.2956 5 14.0587 5.31607 14.6213 5.87868C15.1839 6.44129 15.4999 7.20435 15.4999 8Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            */

?>