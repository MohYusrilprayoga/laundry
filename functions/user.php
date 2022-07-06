<?php
    function register_user($nama, $pass){
    
    global $konek;

    //Mencegah SQL Injection
    $nama = escape($nama);
    $pass = escape($pass);

    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password) VALUES ('$nama', '$pass')";

    if(mysqli_query($konek, $query)) return true;
    else return false;
    }

    function cek_nama($nama){
        global $konek;
        $nama = escape($nama);

        $query = "SELECT * FROM users WHERE username = '$nama'";

        if ($result = mysqli_query ($konek, $query)){
            return mysqli_num_rows($result);
        }
    }

    //Untuk Login
    function cek_data($nama, $pass){
       global $konek;
       //mencegah sql injection 
       $nama = escape($nama);
       $pass = escape($pass);

       $query = "SELECT password FROM users WHERE username = '$nama'";
       $result = mysqli_query($konek, $query);
       $hash = mysqli_fetch_assoc($result)['password'];
       
      if( password_verify( $pass, $hash) ) return true;
       else return false;
    }

    function escape ($data){
        global $konek;
        return mysqli_real_escape_string($konek, $data);
    }

    function redirect_login($nama){
        $_SESSION['user'] = $nama;
        header('location: index.php');
    }

    function redirect_register($nama){
        header('location: login.php');
    }

    function flash_delete($nama){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
    }
    function cek_status ($nama){
    global $konek;
    $nama = escape($nama);
    $query = "SELECT role FROM users WHERE username ='$nama'";
    $result = mysqli_query($konek, $query);
    $status = mysqli_fetch_assoc($result)['role'];
    
    if($status == 1) return true;
    else return false;
    }
?>