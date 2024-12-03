<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Animasyon Örneği</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            animation: colorChange 0.5s ease forwards;
        }

        @keyframes colorChange {
            from {
                background-color: #007bff;
            }
            to {
                background-color: #ff5733;
            }
        }

        @keyframes slideIn {
    from {
        transform: translateY(-100%);
    }
    to {
        transform: translateX(0);
    }
}

.button {
    animation-name: slideIn;
    animation-duration: 1s;
    animation-timing-function: ease-out;
    animation-delay: 0s;
    animation-iteration-count: 1;
    animation-direction: normal;
    animation-fill-mode: forwards;
}
.aaa {
    background-color: red;
    transition: background-color 0.3s ease;
}
.aaa:hover {
    background-color: blue;
    transition: background-color 0.3s ease;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <p>Free svg</p>
            </div>
            <div class="col">
                <div class="row">user1</div>
                
                    <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M15.682 8.733C15.8221 10.6388 14.4039 12.303 12.5 12.467C10.5961 12.303 9.17795 10.6388 9.31801 8.733C9.17852 6.8276 10.5966 5.16401 12.5 5C14.4035 5.16401 15.8215 6.8276 15.682 8.733V8.733Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M8.98601 13.4C5.47501 14.562 8.81401 19 12.5 19C16.186 19 19.525 14.562 16.014 13.4" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                </div>
            </div>
            
                <div class="col">
                
                </div>
            </>
            <div class="row">
                <div class="col">Çöp</div>
            </div>
            <div class="row">
                <div class="col">
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M15.7628 9H7.63719C7.18864 9 6.82501 9.37295 6.82501 9.833V16.5C6.82501 17.8807 7.91632 19 9.26251 19H14.1375C14.784 19 15.404 18.7366 15.8611 18.2678C16.3182 17.7989 16.575 17.163 16.575 16.5V9.833C16.575 9.37295 16.2114 9 15.7628 9Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M14.625 7L13.9191 5.553C13.7541 5.21427 13.4167 5.0002 13.0475 5H10.3526C9.98338 5.0002 9.64596 5.21427 9.48092 5.553L8.77502 7H14.625Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M10.8247 12.333C10.8247 11.9188 10.4889 11.583 10.0747 11.583C9.66047 11.583 9.32469 11.9188 9.32469 12.333H10.8247ZM9.32469 15.666C9.32469 16.0802 9.66047 16.416 10.0747 16.416C10.4889 16.416 10.8247 16.0802 10.8247 15.666H9.32469ZM14.0753 12.333C14.0753 11.9188 13.7396 11.583 13.3253 11.583C12.9111 11.583 12.5753 11.9188 12.5753 12.333H14.0753ZM12.5753 15.666C12.5753 16.0802 12.9111 16.416 13.3253 16.416C13.7396 16.416 14.0753 16.0802 14.0753 15.666H12.5753ZM14.625 6.25C14.2108 6.25 13.875 6.58579 13.875 7C13.875 7.41421 14.2108 7.75 14.625 7.75V6.25ZM16.575 7.75C16.9892 7.75 17.325 7.41421 17.325 7C17.325 6.58579 16.9892 6.25 16.575 6.25V7.75ZM8.77501 7.75C9.18923 7.75 9.52501 7.41421 9.52501 7C9.52501 6.58579 9.18923 6.25 8.77501 6.25V7.75ZM6.82501 6.25C6.4108 6.25 6.07501 6.58579 6.07501 7C6.07501 7.41421 6.4108 7.75 6.82501 7.75V6.25ZM9.32469 12.333V15.666H10.8247V12.333H9.32469ZM12.5753 12.333V15.666H14.0753V12.333H12.5753ZM14.625 7.75H16.575V6.25H14.625V7.75ZM8.77501 6.25H6.82501V7.75H8.77501V6.25Z" fill="#000000"/>
</svg>
                </div>
            </div>

        </div>
    </div>
    <button class="button">Hover Me</button>
    <button class="element">animasyon</button>
    <p class="aaa">Lorem ipsum dolor sit amet.</p>
</body>
</html>





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
    </style>

    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="fs-4 text text-dark">Kayıt Ol</h1>
            <form action="register.php" method="post">
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
                    <input type="email" name="email" class="form-control" placeholder="E-posta" required>
                </div>
                <div class="mb-3 input-with-icon">
                    <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.682 8.733C15.8221 10.6388 14.4039 12.303 12.5 12.467C10.5961 12.303 9.17795 10.6388 9.31801 8.733C9.17852 6.8276 10.5966 5.16401 12.5 5C14.4035 5.16401 15.8215 6.8276 15.682 8.733V8.733Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M8.98601 13.4C5.47501 14.562 8.81401 19 12.5 19C16.186 19 19.525 14.562 16.014 13.4" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input type="password" name="password" class="form-control" placeholder="Şifre" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Kayıt Ol</button>
                    <a href="index.php?q=girisyap" class="btn btn-secondary">Giriş Yap</a>
                </div>
                <?php if(isset($_GET['error'])): ?>
                    <p class="text-danger">Kullanıcı adı veya e-posta adresi zaten kullanılıyor.</p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<?php 
include("database/mysqldatabase.php");
$id = $_GET['idcontent'] ?? null;
$sql = "SELECT * FROM content WHERE idcontent=?";
$sorgu = $conn->prepare($sql);
$sorgu->execute(array($_GET['id']));
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);
$sqlUser = "SELECT * FROM user WHERE iduser= $id";
$sorguUser = $conn->prepare($sqlUser);
//$sorguUser ->execute();
$satirUser = $sorguUser->fetch(PDO::FETCH_ASSOC);
    if(isset($satir)) {
?>
<link rel="stylesheet" href="csscustom/detail.css">

<div class="container contentstyle">
    <div class="row fs-5 fontstyle"><?php echo $satir['contenttitle']; ?></div>
    <div class="row">
        <hr>
        <p class="datefont" >
            <span>
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6 13C15.6 15.2091 13.8539 17 11.7 17C9.54608 17 7.79999 15.2091 7.79999 13C7.79999 10.7909 9.54608 9 11.7 9C12.7343 9 13.7263 9.42143 14.4577 10.1716C15.1891 10.9217 15.6 11.9391 15.6 13Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8.775 6.75C9.18921 6.75 9.525 6.41421 9.525 6C9.525 5.58579 9.18921 5.25 8.775 5.25V6.75ZM14.625 5.25C14.2108 5.25 13.875 5.58579 13.875 6C13.875 6.41421 14.2108 6.75 14.625 6.75V5.25ZM8.775 5.25C8.36079 5.25 8.025 5.58579 8.025 6C8.025 6.41421 8.36079 6.75 8.775 6.75V5.25ZM14.625 6.75C15.0392 6.75 15.375 6.41421 15.375 6C15.375 5.58579 15.0392 5.25 14.625 5.25V6.75ZM9.525 6C9.525 5.58579 9.18921 5.25 8.775 5.25C8.36079 5.25 8.025 5.58579 8.025 6H9.525ZM8.025 7C8.025 7.41421 8.36079 7.75 8.775 7.75C9.18921 7.75 9.525 7.41421 9.525 7H8.025ZM8.025 6C8.025 6.41421 8.36079 6.75 8.775 6.75C9.18921 6.75 9.525 6.41421 9.525 6H8.025ZM9.525 4C9.525 3.58579 9.18921 3.25 8.775 3.25C8.36079 3.25 8.025 3.58579 8.025 4H9.525ZM15.375 6C15.375 5.58579 15.0392 5.25 14.625 5.25C14.2108 5.25 13.875 5.58579 13.875 6H15.375ZM13.875 7C13.875 7.41421 14.2108 7.75 14.625 7.75C15.0392 7.75 15.375 7.41421 15.375 7H13.875ZM13.875 6C13.875 6.41421 14.2108 6.75 14.625 6.75C15.0392 6.75 15.375 6.41421 15.375 6H13.875ZM15.375 4C15.375 3.58579 15.0392 3.25 14.625 3.25C14.2108 3.25 13.875 3.58579 13.875 4H15.375ZM11.8933 11.857C11.8933 11.4428 11.5575 11.107 11.1433 11.107C10.7291 11.107 10.3933 11.4428 10.3933 11.857H11.8933ZM11.1433 13.571H10.3933C10.3933 13.9852 10.7291 14.321 11.1433 14.321V13.571ZM12.8144 14.321C13.2286 14.321 13.5644 13.9852 13.5644 13.571C13.5644 13.1568 13.2286 12.821 12.8144 12.821V14.321ZM8.775 5.25C6.18909 5.25 4.125 7.39466 4.125 10H5.625C5.625 8.18706 7.05309 6.75 8.775 6.75V5.25ZM4.125 10V16H5.625V10H4.125ZM4.125 16C4.125 18.6053 6.18909 20.75 8.775 20.75V19.25C7.05309 19.25 5.625 17.8129 5.625 16H4.125ZM8.775 20.75H14.625V19.25H8.775V20.75ZM14.625 20.75C17.2109 20.75 19.275 18.6053 19.275 16H17.775C17.775 17.8129 16.3469 19.25 14.625 19.25V20.75ZM19.275 16V10H17.775V16H19.275ZM19.275 10C19.275 7.39466 17.2109 5.25 14.625 5.25V6.75C16.3469 6.75 17.775 8.18706 17.775 10H19.275ZM8.775 6.75H14.625V5.25H8.775V6.75ZM8.025 6V7H9.525V6H8.025ZM9.525 6V4H8.025V6H9.525ZM13.875 6V7H15.375V6H13.875ZM15.375 6V4H13.875V6H15.375ZM10.3933 11.857V13.571H11.8933V11.857H10.3933ZM11.1433 14.321H12.8144V12.821H11.1433V14.321Z" fill="#000000"/>
            </svg> 
            <?php  echo $satir['contentdate'];?>
            <svg width="20px" height="20px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9769 14H10.0229C8.56488 14.0724 7.2731 14.963 6.68693 16.3C5.97993 17.688 7.39093 19 9.03193 19H15.9679C17.6099 19 19.0209 17.688 18.3129 16.3C17.7268 14.963 16.435 14.0724 14.9769 14Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4999 8C15.4999 9.65685 14.1568 11 12.4999 11C10.8431 11 9.49994 9.65685 9.49994 8C9.49994 6.34315 10.8431 5 12.4999 5C13.2956 5 14.0587 5.31607 14.6213 5.87868C15.1839 6.44129 15.4999 7.20435 15.4999 8Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            
            <?php echo $satir["contentauthor"]; ?>
            </span>
            <svg width="20px" height="20px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 10V16C5.5 18.2091 7.29086 20 9.5 20H15.5C17.7091 20 19.5 18.2091 19.5 16V10C19.5 7.79086 17.7091 6 15.5 6H9.5C7.29086 6 5.5 7.79086 5.5 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13.75 7C13.75 7.41421 14.0858 7.75 14.5 7.75C14.9142 7.75 15.25 7.41421 15.25 7H13.75ZM15.25 4C15.25 3.58579 14.9142 3.25 14.5 3.25C14.0858 3.25 13.75 3.58579 13.75 4H15.25ZM9.75 7C9.75 7.41421 10.0858 7.75 10.5 7.75C10.9142 7.75 11.25 7.41421 11.25 7H9.75ZM11.25 4C11.25 3.58579 10.9142 3.25 10.5 3.25C10.0858 3.25 9.75 3.58579 9.75 4H11.25ZM15.5 10.75C15.9142 10.75 16.25 10.4142 16.25 10C16.25 9.58579 15.9142 9.25 15.5 9.25V10.75ZM9.5 9.25C9.08579 9.25 8.75 9.58579 8.75 10C8.75 10.4142 9.08579 10.75 9.5 10.75V9.25ZM15.5 13.75C15.9142 13.75 16.25 13.4142 16.25 13C16.25 12.5858 15.9142 12.25 15.5 12.25V13.75ZM9.5 12.25C9.08579 12.25 8.75 12.5858 8.75 13C8.75 13.4142 9.08579 13.75 9.5 13.75V12.25ZM12.5 16.75C12.9142 16.75 13.25 16.4142 13.25 16C13.25 15.5858 12.9142 15.25 12.5 15.25V16.75ZM9.5 15.25C9.08579 15.25 8.75 15.5858 8.75 16C8.75 16.4142 9.08579 16.75 9.5 16.75V15.25ZM15.25 7V4H13.75V7H15.25ZM11.25 7V4H9.75V7H11.25ZM15.5 9.25H9.5V10.75H15.5V9.25ZM15.5 12.25H9.5V13.75H15.5V12.25ZM12.5 15.25H9.5V16.75H12.5V15.25Z" fill="#000000"/>
            </svg>
            <?php echo  /* Bu gönderiye yapılan yorum sayısı buraya gelecek*/"adet yorum yapıldı;" ?>

        </p>
        <hr>
        <div class="row">
            <div class="col-lg-4">
                <img src="<?php echo  $satir['contentimgurl']; ?>" class="img-fluid rounded-start" width="200px" height="200px" alt="Resim Görüntülenemiyor">
            </div>
            <div class="col-lg-8">
                <div class="row fonttext"><?php echo $satir['contenttext']; ?></div>
            </div>
        </div>
    </div>
    <div class=" mt-2 kline"></div>
    <div class="container ">
        <div class="row">
            <div class="col">

            </div>
        </div>
    </div>
    <form class="mt-5 d-flex row" action="" method="post">
        <label for="" class="form-label"><?php echo $_SESSION['username']; ?></label>

        <input class="form-control" type="text" name="commenttext" placeholder="Yorum Yap">
        <div class="row justify-content-between">
            <input class="btn btn-primary justify-content-end mt-4" type="submit" value="Yorum yap">
        </div>
    </form>

    <!-- <section class="container-fluid">
  <div class="container-fluid my-5 py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="card text-body">
          <div class="card-body p-4">
            <h4 class="mb-0">Son Yapılan Yorumlar</h4>
            <p class="fw-light mb-4 pb-2">Son Yorum Yapanlar</p>

            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="img/mk.jpg" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold mb-1">Maggie Marsh</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    March 07, 2021
                    <span class="badge bg-primary">Pending</span>
                  </p>
                  <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                </div>
                <p class="mb-0">
                  Lorem Ipsum is simply dummy text of the printing and typesetting
                  industry. Lorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s, when an unknown printer took a galley of type and
                  scrambled it.
                </p>
              </div>
            </div>
          </div>

          <hr class="my-0" />

          <div class="card-body p-4">
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(26).webp" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold mb-1">Lara Stewart</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    March 15, 2021  
                    <span class="badge bg-success">Approved</span>
                  </p>
                  <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                  <a href="#!" class="text-success"><i class="fas fa-redo-alt ms-2"></i></a>
                  <a href="#!" class="link-danger"><i class="fas fa-heart ms-2"></i></a>
                </div>
                <p class="mb-0">
                  Contrary to popular belief, Lorem Ipsum is not simply random text. It
                  has roots in a piece of classical Latin literature from 45 BC, making it
                  over 2000 years old. Richard McClintock, a Latin professor at
                  Hampden-Sydney College in Virginia, looked up one of the more obscure
                  Latin words, consectetur, from a Lorem Ipsum passage, and going through
                  the cites.
                </p>
              </div>
            </div>
          </div>

          <hr class="my-0" style="height: 1px;" />

          <div class="card-body p-4">
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="img/mk.jpg" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold mb-1">Alexa Bennett</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    March 24, 2021
                    <span class="badge bg-danger">Rejected</span>
                  </p>
                  <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                </div>
                <p class="mb-0">
                  There are many variations of passages of Lorem Ipsum available, but the
                  majority have suffered alteration in some form, by injected humour, or
                  randomised words which don't look even slightly believable. If you are
                  going to use a passage of Lorem Ipsum, you need to be sure.
                </p>
              </div>
            </div>
          </div>

          <hr class="my-0" />

          <div class="card-body p-4">
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3"
                src="img/mk.jpg" alt="avatar" width="60"
                height="60" />
              <div>
                <h6 class="fw-bold mb-1">Betty Walker</h6>
                <div class="d-flex align-items-center mb-3">
                  <p class="mb-0">
                    March 30, 2021
                    <span class="badge bg-primary">Pending</span>
                  </p>
                  <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                  <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                </div>
                <p class="mb-0">
                  It uses a dictionary of over 200 Latin words, combined with a handful of
                  model sentence structures, to generate Lorem Ipsum which looks
                  reasonable. The generated Lorem Ipsum is therefore always free from
                  repetition, injected humour, or non-characteristic words etc.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
</div>

<?php
    } else {
        echo "Bir sorun ile karşılaışdı. Sayfa doğru çalışmadı";
    }
 ?>

<?php

/*
if ($id) {
    // İçerik veritabanı veya dizisinden içeriği al
    // Örnek içerik veritabanı dizisi
    $contents = [
        1 => 'İçerik 1 detayları...',
        2 => 'İçerik 2 detayları...',
        // Diğer içerikler
    ];

    if (array_key_exists($id, $contents)) {
        echo '<h1>Detay Sayfası</h1>';
        echo '<p>' . $contents[$id] . '</p>';
    } else {
        echo '<p>İçerik bulunamadı.</p>';
    }
} else {
    echo '<p>ID parametresi eksik.</p>';
}
*/
?>
