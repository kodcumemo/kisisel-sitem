<?php include("routing.php");
include("database/mysqldatabase.php");
$sql = "SELECT * FROM content WHERE contentisdeleted = 0 ORDER BY idcontent DESC;";
$sorgu = $conn->prepare($sql);
$sorgu->execute();
// Türkçe dil ayarlarını yap
// setlocale(LC_TIME, 'tr_TR.UTF-8');

?>
<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mehmet Karadavut</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="csscustom/index.css">
    
</head>
<body class="bg-light">

<div class="container-fluid mt-2 ">
    <div class="row">
        <div class="col top-div">
            <?php include("header.php"); ?>
        </div>
    </div>
    <div class="row">
        <!-- Bu kısımın width'i ekranı kaplaması için col sınıfı genişletildi -->
        <div class="col-lg-8 col-md-12 mt-3">
        <?php
        $q = $_GET['q'] ?? "home" ;
        $id = $_GET['id'] ?? null;
        switch ($q) {
            case 'home': include('pages/home.php'); break;
            case 'products': include('pages/urunler.php'); break;
            case 'languages': include('pages/yazilimdilleri.php'); break;
            case 'technology': include('pages/teknoloji.php'); break;
            // case 'icerik': include('pages/detail.php'); break;
            case 'icerik':
                if ($id) {
                    include('pages/detail.php');
                } else {
                    include('pages/page404.php');
                }
                break;
            case 'about': include('hakkimda.php'); break;
            case 'contact': include('iletisim.php'); break;
            case 'addcontent': include('admin/admincontent.php'); break;
            case 'content': include('admin/addcontent.php'); break;
            case 'yorumyap': include('pages/add_component.php'); break;
            case 'girisyap': include('user/userlogin.php'); break;
            case 'login': include('user/login.php'); break;
            case 'kayitol': include('user/userregister.php'); break;
            case 'register': include('user/register.php'); break;
            case 'logout' : include('user/logout.php'); break;
            case 'profil' : include('user/profile.php'); break;
            case 'uprofil' : include('user/userprofile.php'); break;
            case 'admin': include('admin/adminpanel.php'); break;
            case 'kullanicilar': include('admin/users/userspanel.php'); break;
            case 'guncelle': include('admin/users/ucustom.php'); break;
            case 'games': include('games/gamesmain.php'); break;
            case 'rock': include('games/rock.php'); break;
            case 'sayitahmin': include('games/sayitahmin.php'); break;
            case 'flappy': include('games/flappy.php'); break;
            case 'tesisat': include('tesisat/tesisat.php'); break;
            case 'tesisatekle': include('tesisat/tesisatekle.php'); break;
            case 'tesisatkaydet': include('tesisat/offersave.php'); break;
            case 'teklif': include('tesisat/offerpage.php'); break;
            case 'offerdetail': 
                if($id) {
                    include('tesisat/offerdetail.php');
                } else {
                    include('pages/page404.php');
                }
                break;

            case 'detay':
                if ($id) {
                    include('admin/users/usercustom.php');
                } else {
                    include('pages/page404.php');
                }
                break;
                case 'gonderiler': include('admin/posts/postspanel.php'); break;
                case 'gonderiguncelleme': include('admin/posts/pcustom.php'); break;
                case 'gonderi':
                    if ($id) {
                        include('admin/posts/postcustom.php');
                    } else {
                        include('pages/page404.php');
                    }
                    break;
                case 'sil': include('delete_content.php'); break;
            default:  include('pages/page404.php'); break;
        }
        ?>
        </div>

        <!-- Bu kısımın width'i ekranı kaplaması için col sınıfı genişletildi -->

        <div class="col-lg-4 col-md-12 mt-2 fstyle">
            <?php  include("tanim.php"); ?>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>


