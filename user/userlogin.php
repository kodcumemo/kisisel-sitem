 <link rel="stylesheet" href="csscustom/login.css">
<div class="container d-flex justify-content-center">
    <div class="login-container">
        <h1 class="text-center fs-4 text-dark">Giriş Yap</h1>
        <form action="<?php echo htmlspecialchars("index.php?q=login");?>" method="post">
            <div class="mb-3 input-with-icon">
                <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.682 8.733C15.8221 10.6388 14.4039 12.303 12.5 12.467C10.5961 12.303 9.17795 10.6388 9.31801 8.733C9.17852 6.8276 10.5966 5.16401 12.5 5C14.4035 5.16401 15.8215 6.8276 15.682 8.733V8.733Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8.98601 13.4C5.47501 14.562 8.81401 19 12.5 19C16.186 19 19.525 14.562 16.014 13.4" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <input type="text" name="username_or_email" class="form-control" placeholder="Kullanıcı Adı veya E-posta" required>
            </div>
            <div class="mb-3 input-with-icon">
                <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.5 12C8.5 13.1046 7.60457 14 6.5 14C5.39543 14 4.5 13.1046 4.5 12C4.5 10.8954 5.39543 10 6.5 10C7.03043 10 7.53914 10.2107 7.91421 10.5858C8.28929 10.9609 8.5 11.4696 8.5 12Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 12C14.5 13.1046 13.6046 14 12.5 14C11.3954 14 10.5 13.1046 10.5 12C10.5 10.8954 11.3954 10 12.5 10C13.6046 10 14.5 10.8954 14.5 12Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5 12C20.5 13.1046 19.6046 14 18.5 14C17.3954 14 16.5 13.1046 16.5 12C16.5 10.8954 17.3954 10 18.5 10C19.6046 10 20.5 10.8954 20.5 12Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <input type="password" name="password" class="form-control" placeholder="Şifre" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Giriş Yap</button>
                <a href="index.php?q=kayitol" class="btn btn-secondary">Kayıt Ol</a>
            </div>
        </form>
    </div>
</div>

