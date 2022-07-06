<?php
require_once "functions/db.php";
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
mysqli_query($konek,"insert into pelanggan values('','$nama','$hp','$alamat')");
header("location:pelanggan.php");
?>
