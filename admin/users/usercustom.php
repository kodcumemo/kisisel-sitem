<?php
$profilePics = array("profileanimeboy.jpg","profileboy.jpg","profilecat.jpg","profileworkman.jpg","profileman.jpg","profileoldman.jpg","profiledog.jpg","profilesnake.jpg","profilerabbit.jpg","profilegirl.jpg","profilemoongirl.jpg","profileanimegirl.jpg");
$id = $_GET['isuser'] ?? null;
$sql = "SELECT * FROM user WHERE iduser=?";
$sorgu = $conn->prepare($sql);
$sorgu-> execute(array($_GET['id']));
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);
$sqlUser = "SELECT * FROM user WHERE iduser= $id";
$sorguUser = $conn->prepare($sqlUser);
//$sorguUser -> execute();
$satirUser = $sorguUser->fetch(PDO::FETCH_ASSOC);
//$idUser = $satir["iduser"];

$usersql = "SELECT * FROM user WHERE iduser=?";
$userRoll = ["Kullanıcı","Admin","Moderatör","Engelli","Tesisatçı"];
?>
<div class="container"> 
    <div class="row">
        <form action="index.php?q=guncelle" method="post">
        <div class="form">
            <div class="row">
                <div class="col-2">
                    <div class="form-group d-flex justify-content-center">
                        <img src="<?php echo "img/profiles/".$satir ['userpic']; ?>" width="140px"; height="140px"; alt="userpic" />
                    </div>
                </div>
                <div class="col-6">
                <div class="row">
                    <p id="profilePicMessage">Profil resmi seç</p>
                    <?php
                    for($i=0;$i<count($profilePics);$i++){?>
                       
                    
                    <div class="col mb-1 btn">
                        <img src="<?php echo "img/profiles/".$profilePics[$i] ?>" name="userpic" class="userpic" alt="Profil Picture" width="50px" height="50px" onclick="setProfilePic(this.src)">
                    </div>
                    <?php }?>

                   
                </div>
            
            <!-- Seçilen profil resmini saklamak için gizli input -->
            <input type="hidden" name="userpic" id="selectedProfilePic">
                </div>
            </div>
            

            <div class="col">
                <label class="form-label" for="username">Kullanıcı Adı</label>
                <input class="form-control col-4" type="text" name="username" value="<?php echo $satir["username"]; ?>">
            </div>
            <input type="hidden" name="iduser" value="<?php echo $satir["iduser"]; ?>" >
            
            <div class="">
                <label class="form-label" for="useremail">E Posta</label>
                <input class="form-control" type="text" name="useremail" value="<?php echo $satir["useremail"]; ?>">
            </div>
            <div class="">
                <?php
                foreach ($userRoll as $k => $v) {
                    if($satir["userroll"] == $k) {
                        $yetki = $v;
                        break;
                    }
                }
                ?>
                <label class="form-label" for="userroll">Yetkisi:<?php if($satir) echo " ".$yetki; ?></label>
                <select class="form-control" name="userroll" id="userroll">
                    <option value="0">Yetki Seç</option>
                    <?php for ($i=0; $i < count($userRoll) ; $i++): ?>
                    <option value="<?php echo $i; ?>" ><?php echo $i." - ". $userRoll[$i]; ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="mt-2">
                <input class="btn btn-success" type="submit" value="Güncelle">
            </div>
        </div>
        </form>
    </div>
</div>


<script>
    function setProfilePic(src) {
        const profilePicMessage = document.getElementById('profilePicMessage');
        profilePicMessage.innerText = "Profil resmi seçildi";
        
        // Seçilen profil resmini p etiketinin yanında göster
        const imgElement = document.createElement('img');
        imgElement.src = src;
        imgElement.width = 50;
        imgElement.height = 50;
        imgElement.style.marginLeft = '10px';
        
        // Eğer zaten bir resim varsa, onu kaldır
        if (profilePicMessage.nextSibling) {
            profilePicMessage.nextSibling.remove();
        }
        
        // Yeni resmi ekle
        profilePicMessage.after(imgElement);
        
        // Seçilen profil resminin yolunu bir gizli input alanına koyarak form ile birlikte gönderin
        document.getElementById('selectedProfilePic').value = src;
    }
</script>


