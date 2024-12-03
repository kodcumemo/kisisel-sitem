<?php
//session_start();

// Veritabanı bağlantısını yapalım
//include("database/mysqldatabase.php");

if ($_SESSION['userroll'] == 4 || $_SESSION['userroll'] == 1) {
    if (!isset($_SESSION['admin'])) {
        // header("Location: admin_login.php");
        // exit();
    }

    $sql_offers = "SELECT * FROM offer";
    $stmt_offers = $conn->prepare($sql_offers);
    $stmt_offers->execute();
    $offers = $stmt_offers->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="row d-flex justify-content-center bg-dark text-light">Teklifler</div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">Kime</th>
                        <th scope="col">Tarih</th>
                        <th scope="col">Detayı</th>
                        <th scope="col">Teklif Veren</th>
                        <th scope="col">Alınan</th>
                        <th scope="col">Teklif Fiyatı</th>
                        <th scope="col">Kalan</th>
                    </tr>
                </thead>
                <tbody>
    <?php foreach ($offers as $offer) { 
        $kalan = $offer['offerprice'] - $offer['price'];
    ?>
    <tr onclick="sendPostRequest('<?php echo $offer['id']; ?>')">
        <td><?php echo strlen($offer['who']) > 30 ? substr($offer['who'], 0, 30) . '...' : $offer['who']; ?></td>
        <td><?php echo strlen($offer['nowdate']) > 30 ? substr($offer['nowdate'], 0, 30) . '...' : $offer['nowdate']; ?></td>
        <td><?php echo strlen($offer['detail']) > 30 ? substr($offer['detail'], 0, 30) . '...' : $offer['detail']; ?></td>
        <td><?php echo strlen($offer['bidder']) > 30 ? substr($offer['bidder'], 0, 30) . '...' : $offer['bidder']; ?></td>
        <td><?php echo strlen($offer['price']) > 30 ? substr($offer['price'], 0, 30) . '...' : $offer['price']; ?></td>
        <td><?php echo strlen($offer['offerprice']) > 30 ? substr($offer['offerprice'], 0, 30) . '...' : $offer['offerprice']; ?></td>
        <td><?php echo $kalan." ₺"; ?> </td>
    </tr>
    <?php } ?>
</tbody>

            </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <form action="index.php?q=tesisatkaydet" method="post">
                <div class="row">
                    <div class="col">
                        <label>Teklifi Yazan</label>
                        <input class="form-control" type="text" name="bidder" id="" placeholder="Teklif Veren" value="<?php echo $_SESSION['username']; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="" class="">Kime</label>
                        <input class="form-control" type="text" name="who" id="" placeholder="Kime" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Yapılacak İş</label>
                        <textarea class="form-control" name="detail" id="" placeholder="Detay" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Tutar</label>
                        <input class="form-control" type="text" name="price" id="" placeholder="Fiyat" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Tarih</label>
                        <input class="form-control" type="date" name="nowdate" id="" placeholder="Tarih" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Verilen Teklif</label>
                        <input class="form-control" type="text" name="offerprice" id="" placeholder="Teklif Ücreti" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="">Ek Açıklama</label>
                        <input class="form-control" type="text" name="offercol" id="" placeholder="Detay">
                    </div>
                </div>
                    <input class="form-control" type="hidden" name="acceptoffer" id="" placeholder="Kabul" value="0">
                <div class="row">
                    <input class="btn btn-dark mt-3" type="submit" value="Ekle">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function sendPostRequest(offerId) {
        // Create a form element
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "index.php?q=teklif";

        // Create an input element to hold the offer ID
        var input = document.createElement("input");
        input.type = "hidden";
        input.name = "offerId";
        input.value = offerId;

        // Append the input to the form
        form.appendChild(input);

        // Append the form to the body
        document.body.appendChild(form);

        // Submit the form
        form.submit();
    }
</script>


<?php
} else {
    echo "<br> Tesisat Sayfası";
}
?>
