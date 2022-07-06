<?php
    require_once "core/init.php";
       
    $error= '';
    if(isset($_SESSION['user'])){
      header('location: index.php');
  }
    //validasi register
    if(isset($_POST['submit'])){
        $nama = $_POST['username'];
        $pass = $_POST['password'];

        if(!empty(trim($nama)) && !empty(trim($pass))){
            
            if(cek_nama($nama) !== 0 ){
            if(cek_data($nama, $pass)) redirect_login($nama);
            else $error = "<script>alert('Data Ada Yang Salah.')</script>";
        }else $error = "<script>alert('Nama Belum Terdaftar di Database!.')</script>";
    }else $error = "<script>alert('Tidak Boleh Kosong.')</script>";
 }

 //menguji pesan session
 if(isset($_SESSION['msg'])){
 flash_delete($_SESSION['msg']);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>LaundryQuh</title>
    <link rel="stylesheet" href="gaya.css">
    <link rel="icon" href="img\logo.png">
  </head>
  <body>
  <div class="container">
  <form  method="POST"  action="login.php">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <center>
              <img src="img\logo.png" title="Gambar Awal" alt="Gambar Tidak Dapat Ditemukan" width="120">
              <span class="login-register-text">LaundryQuh®</span>
            </center>
          <p class="login-text" style="font-size: 2rem; font-weight: 800;">Halaman Login</p>
            <form>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
              </div>
              <p class="login-register-text">Apakah anda belum memiliki akun? <a href="register.php">Daftar Disini</a>.</p>
              <div class="d-grid">
                <input class="btn btn-primary" type="submit" name="submit" value="LOG IN">
              </div>
              <br>
              <div class="d-grid">
                <input class="btn btn-primary" type="reset" value="RESET">
              </div>
                <?php if($error != ''){ ?>
                <div id="error">
                    <?php echo $error; ?>
                </div>
                <?php } ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 </form>
</div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
