<?php
include("database/mysqldatabase.php");

session_start(); // Kullanıcı oturumunu başlat veya devam ettir

$id = $_GET['idcontent'] ?? null;
$sql = "SELECT * FROM content WHERE idcontent=?";
$sorgu = $conn->prepare($sql);
$sorgu->execute(array($id));
$satir = $sorgu->fetch(PDO::FETCH_ASSOC);

//if ($satir) {
?>
<link rel="stylesheet" href="csscustom/detail.css">

<div class="container contentstyle">
    <div class="row fs-5 fontstyle"><?php echo htmlspecialchars($satir['contenttitle']); ?></div>
    <div class="row">
        <hr>
        <p class="datefont">
            <span>
                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6 13C15.6 15.2091 13.8539 17 11.7 17C9.54608 17 7.79999 15.2091 7.79999 13C7.79999 10.7909 9.54608 9 11.7 9C12.7343 9 13.7263 9.42143 14.4577 10.1716C15.1891 10.9217 15.6 11.9391 15.6 13Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8.775 6.75C9.18921 6.75 9.525 6.41421 9.525 6C9.525 5.58579 9.18921 5.25 8.775 5.25V6.75ZM14.625 5.25C14.2108 5.25 13.875 5.58579 13.875 6C13.875 6.41421 14.2108 6.75 14.625 6.75V5.25ZM8.775 5.25C8.36079 5.25 8.025 5.58579 8.025 6C8.025 6.41421 8.36079 6.75 8.775 6.75V5.25ZM14.625 6.75C15.0392 6.75 15.375 6.41421 15.375 6C15.375 5.58579 15.0392 5.25 14.625 5.25V6.75ZM9.525 6C9.525 5.58579 9.18921 5.25 8.775 5.25C8.36079 5.25 8.025 5.58579 8.025 6H9.525ZM8.025 7C8.025 7.41421 8.36079 7.75 8.775 7.75C9.18921 7.75 9.525 7.41421 9.525 7H8.025ZM8.025 6C8.025 6.41421 8.36079 6.75 8.775 6.75C9.18921 6.75 9.525 6.41421 9.525 6H8.025ZM9.525 4C9.525 3.58579 9.18921 3.25 8.775 3.25C8.36079 3.25 8.025 3.58579 8.025 4H9.525ZM15.375 6C15.375 5.58579 15.0392 5.25 14.625 5.25C14.2108 5.25 13.875 5.58579 13.875 6H15.375ZM13.875 7C13.875 7.41421 14.2108 7.75 14.625 7.75C15.0392 7.75 15.375 7.41421 15.375 7H13.875ZM13.875 6C13.875 6.41421 14.2108 6.75 14.625 6.75C15.0392 6.75 15.375 6.41421 15.375 6H13.875ZM15.375 4C15.375 3.58579 15.0392 3.25 14.625 3.25C14.2108 3.25 13.875 3.58579 13.875 4H15.375ZM11.8933 11.857C11.8933 11.4428 11.5575 11.107 11.1433 11.107C10.7291 11.107 10.3933 11.4428 10.3933 11.857H11.8933ZM11.1433 13.571H10.3933C10.3933 13.9852 10.7291 14.321 11.1433 14.321V13.571ZM12.8144 14.321C13.2286 14.321 13.5644 13.9852 13.5644 13.571C13.5644 13.1568 13.2286 12.821 12.8144 12.821V14.321ZM8.775 5.25C6.18909 5.25 4.125 7.39466 4.125 10H5.625C5.625 8.18706 7.05309 6.75 8.775 6.75V5.25ZM4.125 10V16H5.625V10H4.125ZM4.125 16C4.125 18.6053 6.18909 20.75 8.775 20.75V19.25C7.05309 19.25 5.625 17.8129 5.625 16H4.125ZM8.775 20.75H14.625V19.25H8.775V20.75ZM14.625 20.75C17.2109 20.75 19.275 18.6053 19.275 16H17.775C17.775 17.8129 16.3469 19.25 14.625 19.25V20.75ZM19.275 16V10H17.775V16H19.275ZM19.275 10C19.275 7.39466 17.2109 5.25 14.625 5.25V6.75C16.3469 6.75 17.775 8.18706 17.775 10H19.275ZM8.775 6.75H14.625V5.25H8.775V6.75ZM8.025 6V7H9.525V6H8.025ZM9.525 6V4H8.025V6H9.525ZM13.875 6V7H15.375V6H13.875ZM15.375 6V4H13.875V6H15.375ZM10.3933 11.857V13.571H11.8933V11.857H10.3933ZM11.1433 14.321H12.8144V12.821H11.1433V14.321Z" fill="#000000"/>
                </svg>
                <?php echo htmlspecialchars($satir['contentdate']); ?>
                <svg width="20px" height="20px" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9769 14H10.0229C8.56488 14.0724 7.2731 14.963 6.68693 16.3C5.97993 17.688 7.39093 19 9.03193 19H15.9679C17.6099 19 19.0209 17.688 18.3129 16.3C17.7268 14.963 16.435 14.0724 14.9769 14Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 12C14.4329 12 15.9729 10.432 15.9729 8.5C15.9729 6.568 14.4329 5 12.5 5C10.567 5 9.027 6.568 9.027 8.5C9.027 10.432 10.567 12 12.5 12Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <?php echo htmlspecialchars($satir['contentauthor']); ?>
            </span>
        </p>
    </div>
    <div class="row">
        <p><?php echo htmlspecialchars($satir['contentdesc']); ?></p>
    </div>
</div>

<div class="container">
    <h3>Yorumlar</h3>
    <?php
    // Yorumları veritabanından çek
    $sql_comments = "SELECT * FROM comments WHERE idcontent=?";
    $sorgu_comments = $conn->prepare($sql_comments);
    $sorgu_comments->execute(array($id));
    $comments = $sorgu_comments->fetchAll(PDO::FETCH_ASSOC);

    // Kullanıcı oturumu varsa yorum yapma formunu göster
    if (isset($_SESSION['user_id'])) {
        ?>
        <form action="add_comment.php" method="POST">
            <input type="hidden" name="idcontent" value="<?php echo $id; ?>">
            <div class="mb-3">
                <label for="comment" class="form-label">Yorumunuz:</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Yorumu Gönder</button>
        </form>
        <?php
    } else {
        // Kullanıcı oturumu yoksa giriş yapma linkini göster
        ?>
        <p>Yorum yapmak için <a href="login.php">giriş yapın</a>.</p>
        <?php
    }

    // Yorumları listele
    if ($comments) {
        foreach ($comments as $comment) {
            ?>
            <div class="comment">
                <p><strong><?php echo htmlspecialchars($comment['author']); ?>:</strong> <?php echo htmlspecialchars($comment['comment_text']); ?></p>
                <p><small><?php echo htmlspecialchars($comment['comment_date']); ?></small></p>
            </div>
            <?php
        }
    } else {
        echo "<p>Henüz yorum yapılmamış.</p>";
    }
    ?>
</div>

<?php
/*} else {
    echo "İçerik bulunamadı.";
}*/
?>
