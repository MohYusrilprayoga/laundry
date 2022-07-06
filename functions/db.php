<?php
    $hostname = "localhost";
    $user     = "root";
    $pass     = "";
    $database = "laundry";

    $konek = mysqli_connect($hostname, $user, $pass, $database);
    if (!$konek) {
        die("<script>alert('Connection Failed.')</script>");
    }
?>