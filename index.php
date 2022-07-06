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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="img\logo.png">
    <title>Laundry</title>
  </head>
  <style>
*{
	margin:0px;
	padding:0px;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}
@import url(https://fonts.googleapis.com/css?family=Shrikhand);

#washer {
  margin: 50px auto;
  width: 200px;
  text-align: center;
}
.centered {
  margin: 0px auto;
  text-align: center;
  font-family: "Shrikhand", cursive;
}
.laundry {
  font-family: "Shrikhand", cursive;
  font-size: 56px;
  top: 6px;
  margin: 25px auto;
  text-align: center;
}
.gray {
  color: #999;
}
*,
*:before,
*:after {
  box-sizing: border-box;
  outline: none;
}
p {
  font-family: "Roboto", sans-serif;
  width: 50em;
  margin: 25px auto;
}
h3 {
  font-family: "Roboto", sans-serif;
  width: 50em;
  margin: 25px auto;
  text-align: center;
}
a {
  text-decoration: none;
}
@keyframes circle {
  from {
    transform: rotate(0deg) rotate(-360deg);
  }
  to {
    transform: rotate(0deg) rotate(360deg);
  }
}
#door {
  background-image: -webkit-linear-gradient(top, #f4f1ee, #fff);
  background-image: linear-gradient(top, #f4f1ee, #fff);
  box-shadow: 0px 4px 6px 0px rgba(0, 0, 0, 0.3), inset 0px 4px 1px 1px white,
    inset 0px -3px 1px 1px rgba(204, 198, 197, 0.5);
  border-radius: 50%;
  height: 200px;
  width: 200px;
  position: relative;
  border: 2px solid #ccc;
}
#door #inner-door {
  background: #666;
  border-radius: 50%;
  height: 140px;
  width: 140px;
  position: relative;
  border: 2px solid #ccc;
  top: 28px;
  left: 28px;
}
#door #inner-door #drum {
  background: #fff;
  width: 120px;
  height: 120px;
  margin: 5px auto;
  -webkit-align-self: center;
  -moz-align-self: center;
  align-self: center;
  border-top: 15px solid #bbb;
  border-left: 15px solid #bbb;
  border-right: 15px solid transparent;
  border-bottom: 15px solid #bbb;
  border-radius: 50%;
  box-shadow: 0 0 5px 1px #aaa;
  animation: circle 3s infinite linear;
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -60px 0px 0px -60px;
}
.handle:after {
  text-align: center;

  font-size: 24px;
  line-height: 26px;
  display: block;
  position: absolute;
  width: 30px;
  height: 30px;
  border-radius: 100%;
  top: 50%;
  left: 102%;
  font-weight: 700;
  margin: -15px 0 0 -15px;
  background: #fff;
  -moz-box-shadow: 0px 1px 1px 0px #222, inset 0px 1px 1px 0px white;
  -webkit-box-shadow: 0px 1px 1px 0px #222, inset 0px 1px 1px 0px white;
  box-shadow: 0px 1px 1px 0px #222, inset 0px 1px 1px 0px white;
}
.arc {
  overflow: hidden;
  position: absolute;
  top: -1em;
  right: 50%;
  bottom: 50%;
  left: -1em;
  transform-origin: 100% 100%;
  transform: rotate(165deg) skewX(60deg);
}
.arc:before {
  box-sizing: border-box;
  display: block;
  border: solid 1.3em #777;
  width: 225%;
  height: 210%;
  border-radius: 50%;
  transform: skewX(-60deg);
  content: "";
}
.page {
  height: 115px;
  width: 115px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  background: #ccc; /*#1e384c;*/
  border-radius: 50%;
  overflow: hidden;
}
.water {
  position: absolute;
  height: 100%;
  width: 100%;
  z-index: 5;
  bottom: 0;
  left: 0;
  background: #32bafa;
  -webkit-transform: translate(0, 50%);
  transform: translate(0, 50%);
}
.water-inner {
  position: absolute;
  width: 100%;
  height: 50%;
  top: 0;
  left: 0;
  overflow: hidden;
}
.water-wave {
  width: 200%;
  position: absolute;
  bottom: 100%;
}
.water-wave-back {
  right: 0;
  fill: #aaa; /*#2c7fbe;*/
  -webkit-animation: wave-back 1.9s infinite linear;
  animation: wave-back 1.9s infinite linear;
}
.water-wave-front {
  left: 0;
  fill: #32bafa;
  margin-bottom: -1px;
  -webkit-animation: wave-front 1.2s infinite linear;
  animation: wave-front 1.2s infinite linear;
}
@-webkit-keyframes wave-front {
  100% {
    -webkit-transform: translate(-50%, 0);
    transform: translate(-50%, 0);
  }
}
@keyframes wave-front {
  100% {
    -webkit-transform: translate(-50%, 0);
    transform: translate(-50%, 0);
  }
}
@-webkit-keyframes wave-back {
  100% {
    -webkit-transform: translate(50%, 0);
    transform: translate(50%, 0);
  }
}
@keyframes wave-back {
  100% {
    -webkit-transform: translate(50%, 0);
    transform: translate(50%, 0);
  }
}
    .navbar-expand-lg 
    {
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
  <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <span class="navbar-brand" >
          <img src="img\logo.png" alt="" width="30" height="24"> <a href="index.php" class="link-dark" style="text-decoration: none" title="Halaman Awal"> LAUNDRYQUH </a>
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
                <a class='btn btn-outline-dark' name='pengelolaan' title='Pengelolaan' aria-current='page' href='kelola.php'><i class='bx bx-carousel'></i></a>
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
      <br><br><br>
    <div class="container">
      <h1 class="laundry">LAUNDRY<span class="gray">QUH</span></h1>
<div class="centered gray"><b>Selamat datang <?php echo $_SESSION['user']?></b> </div>
<div class="centered gray"><b>Hope you have a nice day</b></div>
<div id="washer">
  <div id="clock"></div>
  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" style="display: none;">
    <symbol id="wave">
      <path d="M420,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C514,6.5,518,4.7,528.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H420z"></path>
      <path d="M420,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C326,6.5,322,4.7,311.5,2.7C304.3,1.4,293.6-0.1,280,0c0,0,0,0,0,0v20H420z"></path>
      <path d="M140,20c21.5-0.4,38.8-2.5,51.1-4.5c13.4-2.2,26.5-5.2,27.3-5.4C234,6.5,238,4.7,248.5,2.7c7.1-1.3,17.9-2.8,31.5-2.7c0,0,0,0,0,0v20H140z"></path>
      <path d="M140,20c-21.5-0.4-38.8-2.5-51.1-4.5c-13.4-2.2-26.5-5.2-27.3-5.4C46,6.5,42,4.7,31.5,2.7C24.3,1.4,13.6-0.1,0,0c0,0,0,0,0,0l0,20H140z"></path>
    </symbol>
  </svg>
  <div id="door">
    <div id="inner-door">
      <div id="drum">
      </div>
      <div id="page" class="page">
        <div id="water" class="water">
          <svg viewBox="0 0 560 20" class="water-wave water-wave-back">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#wave"></use>
          </svg>
          <svg viewBox="0 0 560 20" class="water-wave water-wave-front">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#wave"></use>
          </svg>
          <div class="water-inner">
            <div class="bubble bubble1"></div>
            <div class="bubble bubble2"></div>
            <div class="bubble bubble3"></div>
          </div>
        </div>
      </div>
  </div>
</div>
</div>
  </body>
  <?php require_once "view/footer.php"; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>