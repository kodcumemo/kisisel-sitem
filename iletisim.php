
<div class="container">
    <h1 class="mt-5">İletişim Formu</h1>
    <form action="iletisim.php" method="POST" class="mt-4">
        <div class="mb-3">
            <label for="fullName" class="form-label">Ad Soyad</label>
            <input type="text" class="form-control" id="fullName" name="fullName" required>
        </div>
        <div class="mb-3">
            <label for="phoneNumber" class="form-label">Telefon Numarası</label>
            <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Açıklama</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
</div>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini topla
    $fullName = $_POST["fullName"];
    $phoneNumber = $_POST["phoneNumber"];
    $message = $_POST["message"];

    // Veriyi işle (doğrulama, güvenlik önlemleri, veritabanına kaydetme, vs.)

    // WhatsApp'a yönlendirme
    $whatsapp_numara = '905551804643'; // Kendi WhatsApp numaranızı buraya yazın
    $whatsapp_mesaj = "İsim: $fullName\nTelefon: $phoneNumber\nMesaj: $message";
    $whatsapp_url = "https://api.whatsapp.com/send?phone=$whatsapp_numara&text=" . urlencode($whatsapp_mesaj);

    // Kullanıcıyı WhatsApp'a yönlendir
    header("Location: $whatsapp_url");
    exit();
} else {
    // Geçersiz istek yöntemi veya bu dosyaya doğrudan erişim durumunda işlem yap
   // header("HTTP/1.0 403 Forbidden");
   // echo "Erişim Engellendi";
}
?>