<?php
//session_start();
session_unset();
session_destroy();
echo 'Çıkış yapıldı. Yönlendiriliyorsunuz...';
header("refresh:2;url=index.php?q=home");
exit();
?>