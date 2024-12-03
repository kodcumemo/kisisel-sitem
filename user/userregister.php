<?php
    $profilePics = array("profileanimeboy.jpg","profileboy.jpg","profilecat.jpg","profileworkman.jpg","profileman.jpg","profileoldman.jpg","profiledog.jpg","profilesnake.jpg","profilerabbit.jpg","profilegirl.jpg","profilemoongirl.jpg","profileanimegirl.jpg");
?>

<style>
    .login-containera {
        background-color: #fff;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
        max-width: 400px;
        width: 100%;
    }
    .input-with-icon {
        position: relative;
    }
    .input-with-icon svg {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        pointer-events: none;
    }
    .input-with-icon input {
        padding-left: 40px;
    }
    .profilePic {
        cursor: pointer;
    }
</style>

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

<div class="container d-flex justify-content-center">
    <div class="login-containera">
        <h1 class="text-center fs-4 text-dark">Kayıt Ol</h1>
        <form action="<?php echo htmlspecialchars("index.php?q=register")?>" method="post">
            <div class="mb-3 input-with-icon">
                <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.682 8.733C15.8221 10.6388 14.4039 12.303 12.5 12.467C10.5961 12.303 9.17795 10.6388 9.31801 8.733C9.17852 6.8276 10.5966 5.16401 12.5 5C14.4035 5.16401 15.8215 6.8276 15.682 8.733V8.733Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8.98601 13.4C5.47501 14.562 8.81401 19 12.5 19C16.186 19 19.525 14.562 16.014 13.4" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <input type="text" name="username" class="form-control" placeholder="Kullanıcı Adı" required>
            </div>
            <div class="mb-3 input-with-icon">
                <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.5 12C8.5 13.1046 7.60457 14 6.5 14C5.39543 14 4.5 13.1046 4.5 12C4.5 10.8954 5.39543 10 6.5 10C7.03043 10 7.53914 10.2107 7.91421 10.5858C8.28929 10.9609 8.5 11.4696 8.5 12Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 12C14.5 13.1046 13.6046 14 12.5 14C11.3954 14 10.5 13.1046 10.5 12C10.5 10.8954 11.3954 10 12.5 10C13.6046 10 14.5 10.8954 14.5 12Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5 12C20.5 13.1046 19.6046 14 18.5 14C17.3954 14 16.5 13.1046 16.5 12C16.5 10.8954 17.3954 10 18.5 10C19.6046 10 20.5 10.8954 20.5 12Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <input type="password" name="password" class="form-control" placeholder="Şifre" required>
            </div>
            <div class="mb-3 input-with-icon">
                <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 10.5C12.5 11.3284 11.8284 12 11 12C10.1716 12 9.5 11.3284 9.5 10.5C9.5 9.67157 10.1716 9 11 9C11.8284 9 12.5 9.67157 12.5 10.5Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 10.5C17.5 11.3284 16.8284 12 16 12C15.1716 12 14.5 11.3284 14.5 10.5C14.5 9.67157 15.1716 9 16 9C16.8284 9 17.5 9.67157 17.5 10.5Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 16.5C12.5 17.3284 11.8284 18 11 18C10.1716 18 9.5 17.3284 9.5 16.5C9.5 15.6716 10.1716 15 11 15C11.8284 15 12.5 15.6716 12.5 16.5Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <input type="email" name="email" class="form-control" placeholder="E-posta" required>
            </div>
            <div class="container">
                <div class="row">
                    <p id="profilePicMessage">Profil resmi seç</p>
                    <?php
                    for($i=0;$i<count($profilePics);$i++){?>
                       
                    
                    <div class="col mb-1 btn">
                        <img src="<?php echo "img/profiles/".$profilePics[$i] ?>" name="userpic" class="profilePic" alt="Profil Picture" width="50px" height="50px" onclick="setProfilePic(this.src)">
                    </div>
                    <?php }?>

                   
                </div>
            </div>
            <!-- Seçilen profil resmini saklamak için gizli input -->
            <input type="hidden" name="profilePic" id="selectedProfilePic">
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Kayıt Ol</button>
                <a href="index.php?q=home" class="btn btn-secondary">Ana Sayfa</a>
            </div>
            <?php if(isset($_GET['error'])): ?>
                <p class="text-danger">Kullanıcı adı veya e-posta adresi zaten kullanılıyor.</p>
            <?php endif; ?>
        </form>
    </div>
</div>
