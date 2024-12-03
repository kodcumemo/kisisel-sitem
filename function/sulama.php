<?php
// Sulama şeması için PHP array
$sulamaSemasi = [
    'Pazartesi' => [
        '1' => '17:40',
        '5' => '12:00',
    ],
    'Çarşamba' => [
        '2' => '11:40',
        '6' => '11:00',
    ],
    'Cuma' => [
        '3' => '11:40',
        '4' => '17:40',
    ],
    'Pazar' => [
        '2' => '11:40',
        '6' => '11:00',
    ]
];

// Alternatif günler için array oluştur
$alternatifGunler = [
    'Pazartesi' => 'Çarşamba',
    'Çarşamba' => 'Cuma',
    'Cuma' => 'Pazar',
    'Pazar' => 'Salı',
    'Salı' => 'Perşembe',
    'Perşembe' => 'Cumartesi',
    'Cumartesi' => 'Pazartesi',
];

// Fonksiyon: Gün aşırı sulama düzeni oluştur
function gunAsiriSulama($gun, $saatler) {
    global $alternatifGunler;
    $sulamaDüzeni = [];
    while (count($sulamaDüzeni) < 7) {
        $sulamaDüzeni[$gun] = $saatler;
        $gun = $alternatifGunler[$gun];
    }
    return $sulamaDüzeni;
}

// Her vana için düzen oluştur
$sulamaTablosu = [];
foreach ($sulamaSemasi as $gun => $vanalar) {
    $sulamaDüzeni = gunAsiriSulama($gun, $vanalar);
    foreach ($sulamaDüzeni as $gun => $saatler) {
        foreach ($saatler as $vana => $saat) {
            $sulamaTablosu[$gun][$vana] = $saat;
        }
    }
}

// Günler
$days = ["Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi", "Pazar"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sulama Şeması</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Sulama Şeması</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Gün</th>
                    <?php for ($i = 1; $i <= 6; $i++) echo "<th>Vana $i</th>"; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($days as $day): ?>
                    <tr>
                        <td><?php echo $day; ?></td>
                        <?php for ($i = 1; $i <= 6; $i++): ?>
                            <td>
                                <?php echo isset($sulamaTablosu[$day][$i]) ? $sulamaTablosu[$day][$i] : '-'; ?>
                            </td>
                        <?php endfor; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
