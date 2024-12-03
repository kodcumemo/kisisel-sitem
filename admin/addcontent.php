<?php
// Veritabanı bağlantısını içerir
//include '../database/mysqldatabase.php';

if(isset($_POST)){
// Formdan gelen verileri al
$contenttitle = $_POST['contenttitle'];
$contenttext = $_POST['contenttext'];
$contentauthor = $_SESSION['username'];
$contentcategory = $_POST['contentcategory'];
$contentimgurl = "img/".imgUpload();
try {
    // Veri ekleme sorgusu
    $sql = "INSERT INTO content (contenttitle, contenttext, contentauthor, contentcategory, contentimgurl) VALUES (:contenttitle, :contenttext, :contentauthor, :contentcategory, :contentimgurl)";
    $stmt = $conn->prepare($sql);
    
    // Parametreleri bağla ve değer atama
    $stmt->bindParam(':contenttitle', $contenttitle);
    $stmt->bindParam(':contenttext', $contenttext);
    $stmt->bindParam(':contentauthor', $contentauthor);
    $stmt->bindParam(':contentcategory', $contentcategory);
    $stmt->bindParam(':contentimgurl', $contentimgurl);
    
    // Sorguyu çalıştır
    $stmt->execute();
    
    echo "Yeni kayıt başarıyla eklendi";
} catch(PDOException $e) {
    echo "Hata: " . $e->getMessage();
}

// Bağlantıyı kapat
$conn = null;
}

function imgUpload() {
    if(isset($_FILES["contentimgurl"])/* && isset($_POST["control"])*/) {   // bu sayfaya post methodu ile gelinmeli. method post değilse
        $takeFile=$_FILES["contentimgurl"];        // dosyanın geldiği değişken diğer sayfadan post methodu ile geliyor.
        $fileName=$takeFile["name"];        // dosyanın adı
        $fileName = uniqid()."_".$fileName; // benzersiz bir dosya ismi vermeye yarıyor.
        $fileType=$takeFile["type"];        // dosyaya benzersiz isim veriyoruz.
        $fileSize=$takeFile["size"];        // dosyanın boyutu
        $fileTempName=$takeFile["tmp_name"];// dosyanın geçici konumu
        $fileError=$takeFile["error"];      // dosyada ki hatayı gösteriyor
        $filePath="img/".$fileName;     // dosyanın yükleneceği yolu veriyoruz



    if($fileError == 4) {   // dosya varmı yokmu kontrolü
        echo '<div class="container-fluid"><div class="alert alert-warning">Bir dosya seçmediniz.</div></div>';
        exit();
    }
    else {}
        if($fileError !=0 && $fileError !=4) {  // dosya yoksa yada varsa dışında kontrol
            echo "Yüklediğiniz dosyada bir hata bulunmaktadır.<br>";
            exit();
        } else {
        if(file_exists($filePath)){     // aynı dosya ismi varmı kontrolü
            echo '<div class="container-fluid"><div class="alert alert-warning">Bu dosya zaten mevcut.</div></div>';
            exit();
        } else {
            if($fileSize > 2000000) {    // Dosya boyutu kontrolü
                echo '<div class="container-fluid"><div class="alert alert-warning">Dosya 500 kb\'den büyük olamaz.<br>Lütfen daha küçük bir dosya seçiniz.</div></div>';
                exit();
            } else {
                $look = getimagesize($fileTempName);    // yüklenen dosyanın resim dosyası olup olmadığını kontrol ediyoruz.
                if($look === false) {
                    echo '<div class="container-fluid"><div class="alert alert-warning">Yüklediğiniz dosya resim dosyası değil.</div>';
                } else {
                $fileExtension=strtolower(pathinfo($filePath,PATHINFO_EXTENSION));  // yüklenecek dosyanın uzantısını belirliyoruz.
                $allowed = array("jpg","png","gif","jpeg","webp");
                    if(!in_array($fileExtension, $allowed)) {
                        echo '<div class="container-fluid"><div class="alert alert-warning">Dosya resim formatında olmalıdır.</div></div>';
                        exit();
                    } else {
    if(move_uploaded_file($fileTempName,$filePath)){
        echo "Dosya Yüklendi <br>";
        echo "Dosya Adı: ". $fileName."<br>";
        echo "Dosya Tipi: ".$fileType."<br>";
        echo "Dosya Boyutu: ". $fileSize."<br>";
        echo "<img src='$filePath' width='125px' height='125px' alt='...' >";               // dosyayı ekranda gösteriyor.
        } else {
        echo  '<div class="container-fluid"><div class="alert alert-warning">Dosya yüklenirken bir sorun oldu.</div></div><hr>'.$takeFile."<hr>";
        
        }
                        }   // if($look === false)
                    }  // if($fileExtension != "jpg")
                }  // if($fileSize > 500000)
           }   // if(file_exists($filePath))
        }   // if($fileError == 4) else nin
    } // if(isset($_FILES["myFile"]) && isset($_POST["control"]))
else {
        echo '<div class="container-fluid"><div class="alert alert-danger">Dosya Yükleme Yapılmadı</div></div>';
    }
return $fileName;
}






