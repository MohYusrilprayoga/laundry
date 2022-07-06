<?php
    session_start();
    require_once "functions/db.php";
    $harga = $_POST['harga'];
    mysqli_query($konek,"update harga set harga_per_kilo='$harga'");
    header("location:harga.php?pesan=berhasil");
?>
