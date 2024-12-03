<?php
if (!isset($_SESSION['iduser'])) {
    echo '<div class="container-fluid"><div class="alert alert-warning">Lütfen önce giriş yapınız.</div></div>';
    header("refresh:2;url=index.php?q=home");
    exit;
}

$id = $_SESSION['iduser'];

$sql = "SELECT * FROM user WHERE iduser=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$profilePics = array("profileanimeboy.jpg","profileboy.jpg","profilecat.jpg","profileworkman.jpg","profileman.jpg","profileoldman.jpg","profiledog.jpg","profilesnake.jpg","profilerabbit.jpg","profilegirl.jpg","profilemoongirl.jpg","profileanimegirl.jpg");
$userRoll = ["Kullanıcı","Admin","Moderatör","Engelli"];
?>

<div class="container mt-5">
    <h2>Profil Güncelle</h2>
    <form action="index.php?q=uprofil" method="post">
        <div class="form-group">
            <label for="profilePic">Profil Resmi</label>
            <div class="d-flex">
                <img src="<?php echo "img/profiles/".$user['userpic']; ?>" width="140px" height="140px" alt="Profil Resmi">
                <input type="hidden" name="userpic" id="selectedProfilePic" value="<?php echo $user['userpic']; ?>">
                <div class="ml-3">
                    <?php foreach ($profilePics as $pic): ?>
                        <img src="<?php echo "img/profiles/".$pic; ?>" width="50px" height="50px" class="mr-2 mb-2" onclick="setProfilePic('<?php echo $pic; ?>')" style="cursor: pointer;">
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="username">Kullanıcı Adı</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
        </div>
        <div class="form-group">
            <label for="useremail">E-Posta</label>
            <input type="email" class="form-control" name="useremail" value="<?php echo htmlspecialchars($user['useremail']); ?>">
        </div>
        <input type="hidden" name="iduser" value="<?php echo $user['iduser']; ?>">
        <button type="submit" class="btn btn-success">Güncelle</button>
    </form>

    <h3 class="mt-5">Şifre Güncelle</h3>
    <form action="index.php?q=uprofil" method="post">
        <div class="form-group">
            <label for="current_password">Eski Şifre</label>
            <input type="password" class="form-control" name="current_password" required>
        </div>
        <div class="form-group">
            <label for="new_password">Yeni Şifre</label>
            <input type="password" class="form-control" name="new_password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Yeni Şifre (Tekrar)</label>
            <input type="password" class="form-control" name="confirm_password" required>
        </div>
        <input type="hidden" name="iduser" value="<?php echo $user['iduser']; ?>">
        <button type="submit" class="btn btn-success">Şifreyi Güncelle</button>
    </form>

    <form action="index.php?q=uprofil" method="post" class="mt-3">
        <input type="hidden" name="delete_profile" value="1">
        <button type="submit" class="btn btn-danger">Profilimi Sil</button>
    </form>
</div>

<script>
    function setProfilePic(pic) {
        document.getElementById('selectedProfilePic').value = pic;
    }
</script>
