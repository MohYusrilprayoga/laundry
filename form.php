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
* {
    box-sizing: border-box;
}

body {
    font-family: 'Open Sans', sans-serif;
}

.container {
    width: 1170px;
    padding-right: 15px;
    padding-left: 15px;
    margin: auto;
}

/* Start Landing Page */

.landing-page {
    position: relative;
    background-color: #FFF;
}

.landing-page .header-area {
    display: flex;
    padding: 25px 0 0;
    position: relative;
}

.landing-page .header-area .logo {
    text-transform: uppercase;
    font-style: italic;
    margin-top: 10px;
    font-size: 19px;
    width: 300px;
    color: #5d5d5d;
}

.landing-page .header-area .links {
    list-style: none;
    padding: 0;
    margin: 0;
    width: 100%;
    text-align: right;
}

.landing-page .header-area .links li {
    display: inline-block;
    margin-left: 30px;
    color: #5d5d5d;
    cursor: pointer;
}

.landing-page .header-area .links li:last-child {
    border: 0;
    border-radius: 20px;
    padding: 10px 18px;
    color: #FFF;
    background-color: #6c63ff;
}

.landing-page .info {
    width: 35%;
    float: left;
    margin-top: 130px;
}

.landing-page .info h1 {
    font-size: 44px;
    margin: 0 0 20px;
    line-height: 1.4;
    color: #5d5d5d;
}

.landing-page .info p {
    margin: 0;
    line-height: 1.6;
    font-size: 15px;
    color: #5d5d5d;
}

.landing-page .info button {
    border: 0;
    border-radius: 20px;
    padding: 12px 30px;
    margin-top: 30px;
    cursor: pointer;
    color: #FFF;
    background-color: #6c63ff;
    transform: scale(5px);
    opacity: 70%;
    transition: 0.2s;
}
.landing-page .info button:hover {
    transform: scale(20px);
    opacity: 100%;
}
.landing-page .image {
    width: 50%;
    float: right;
    margin-top: 35px;
    filter: grayscale(100%);   
    transition-property: all;
    transition-duration: 800ms;
}

.landing-page .image img {
    max-width: 100%;
}

.landing-page .image:hover{
  transform: rotate(360deg);
  filter: grayscale(0%);   
}
.clearfix {
  clear: both;
}
.navbar
    {
      background-color: #fff;
      box-shadow: 2px 2px 2px rgba(0,0,0,0.8);
      padding: 10px;
      border: 1px dashed dark;
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
    <nav class="navbar navbar-expand-lg fixed-top">
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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,224L48,208C96,192,192,160,288,170.7C384,181,480,235,576,229.3C672,224,768,160,864,154.7C960,149,1056,203,1152,240C1248,277,1344,299,1392,309.3L1440,320L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
  <div class="landing-page">
  <div class="container">
  <div class="info">
      <h1>Introduction</h1>
      <p>
            Laundry merupakan kegiatan harian dalam aktivitas manusia. Kegiatan yang melibatkan antara dua unsur, yaitu kekuatan manusiawi yang sekarang digantikan mesin dan deterjen adalah dua unsur primer dalam kegiatan ini.
            <br>
            <br>
            Akan tetapi, kebutuhan manusiawi yang membutuhkan waktu lebih banyak membuat urusan perlaundryan duniawi dapat terlantarkan. Pelayanan kami ditujukan untuk anda yang tidak memiliki waktu untuk mengurus permasalahan laundry anda.          
      </p>
      <button> <a class="link-dark" style="text-decoration: none;" href="form_pemesanan.php">Pesan sekarang</a></button>
    </div>
    <div class="image">
      <img src="img\logo.png">
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,256L48,224C96,192,192,128,288,96C384,64,480,64,576,90.7C672,117,768,171,864,165.3C960,160,1056,96,1152,80C1248,64,1344,96,1392,112L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
  </body>
 <?php require_once "view/footer.php" ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>