<?php
    require_once "functions/db.php";
    $id = $_GET['id'];
    mysqli_query($konek,"delete from pelanggan where pelanggan_id='$id'");
    header("location:pelanggan.php");
?>
