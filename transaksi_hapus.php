<?php
    require_once "functions/db.php";
    $id = $_GET['id'];
    mysqli_query($konek,"delete from transaksi where transaksi_id='$id'");
    mysqli_query($konek,"delete from pakaian where pakaian_transaksi='$id'");
    header("location:transaksi.php");
?>
