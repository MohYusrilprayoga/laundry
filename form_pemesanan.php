<?php
    require_once "core/init.php";

    if(!isset($_SESSION['user'])){
        $_SESSION['msg'] = "<script>alert('Anda Harus login untuk mengakses halaman ini.')</script>";
        header('location: login.php');
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img\logo.png">
    <title>Laundry</title>
  </head>
  <style>
      body
      {
          color: black;
      }
      .container
      {
        background-color: whitesmoke;
        background-size: cover;
      }
    .navbar-expand-lg 
    {
      background-color: #fff;
      box-shadow: 2px 2px 2px rgba(0,0,0,0.8);
      padding: 10px;
      border: 1px dashed dark;
    }
h1 
    {
    text-align: center;
    padding-top: 20px;
    }
    .footer
        {
            width: 100%;
            height: 50px;
            padding-left: 10px;
            line-height: 50px;
            color: #2b240d;
            text-align: center;
            font-family: courier new;
        }
  </style>
  <body>  
  <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <span class="navbar-brand" >
          <img src="img\logo.png" alt="" width="30" height="24"> <a href="index.php" class="link-dark" style="text-decoration: none"> LAUNDRYQUH </a>
        </span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="nav justify-content-end" id="navbarNav">   
        <ul class="navbar-nav ">
          <form class="d-flex">
          <?php if(!cek_status($_SESSION['user'])) 
            echo "<li class='nav-item'>
              <a class='btn btn-outline-dark' name='pemesanan' href='form.php'><i class='bx bx-basket'></i></a>
            </li>"
            ?> 
            ㅤ
            <li>
            <?php if(cek_status($_SESSION['user'])) 
                echo "<li class='nav-item'>
                <a class='btn btn-outline-dark' name='pengelolaan' aria-current='page' href='kelola.php'><i class='bx bx-carousel'></i></a>
              </li>"
              ?> 
            </li>
            ㅤ
            <li>
            <?php if(!cek_status($_SESSION['user'])) 
                echo "<li class='nav-item'>
                <a class='btn btn-outline-dark' name='form_detail' aria-current='page' href='form_detail.php'><i class='bx bx-detail'></i></a>
              </li>"
              ?> 
            </li>
            ㅤ
            <li class="nav-item">
              <a class="btn btn-outline-dark" name="about" href="aboutus.php">Tentang Kami</a>
            </li>
            ㅤ
            <li class="nav-item">
              <a class="btn btn-outline-dark" name="logout" href="logout.php"><i class='bx bx-log-out'></i> </a>
            </li>
            
          </form>
          </ul>
        </div>
      </div>
    </nav> 
    <br><br>
        <div class="container">
        <div class="card-header">
            <h2><b> Input Data Pelanggan </b></h2>
        </div>
        <div class="card-body">
        <form class="row g-3" method="post" action="form_pemesanan_aksi.php">
        <div class="col-md-6">
            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="col-md-6">
            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" name="hp" required>
        </div>
        <div class="col-12">
          <div class="form-outline w-20">
          <label for="textarea">Alamat</label>
          <textarea class="form-control" rows="4" name="alamat" placeholder="Masukkan Alamat" required></textarea>
          </div>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-outline-dark" value="simpan">Simpan</button>
        </div>
        <div class="col-md-6">
            <button type="reset" class="btn btn-outline-dark">Batal</button>
        </div>
        <p>*Setiap username hanya dapat melakukan 1 pemesanan untuk menghindari terjadinya duplikat data.
        <br>
        *Jangan menitipkan pemesanan anda kepada akun lain.</p>
        </form>
        </div>
        </div>
        <br><br><br><br>
  </body>
  <?php require_once "view/footer.php"; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>