<?php
    require_once "core/init.php";

    if(!isset($_SESSION['user'])){
        $_SESSION['msg'] = "<script>alert('Anda Harus login untuk mengakses halaman ini.')</script>";
        header('location: login.php');
    }
?>
<!DOCTYPE html>
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
        <style>
*{
	margin:0px;
	padding:0px;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}
body{
  background-color: white;
}
.section{
	width: 100%;
	min-height: 100vh;
	background-color: #e2edff;;
}
.section .container{
	width: 80%;
	display: block;
	margin:auto;
	padding-top: 100px;
}
.content-section{
	float: left;
	width: 55%;

}
.image-section{
	float: right;
	width: 40%;
  box-shadow: 23px 22px 22px -7px rgba(0,0,0,0.68);
-webkit-box-shadow: 23px 22px 22px -7px rgba(0,0,0,0.68);
-moz-box-shadow: 23px 22px 22px -7px rgba(0,0,0,0.68);
}
.image-section img{
	width: 100%;
	height: auto;
}
.content-section .title{
	text-transform: uppercase;
	font-size: 28px;
}
.content-section .content h3{
	margin-top: 20px;
	color:#5d5d5d;
	font-size: 21px;
}
.content-section .content p{
	margin-top: 10px;
	font-family: sans-serif;
	font-size: 18px;
	line-height: 1.5;
}
.content-section .content .button{
	margin-top: 30px;
}
.content-section .content .button a{
	background-color: #2f60e7;
	padding:12px 40px;
	text-decoration: none;
	color:#fff;
	font-size: 25px;
	letter-spacing: 1.5px;
}
.content-section .content .button a:hover{
	background-color: #318fe1;
	color:#fff;
}
.content-section .social{
	margin: 40px 40px;
}
.content-section .social i{
	color:#2f60e7;
	font-size: 30px;
	padding:0px 10px;
}
.content-section .social i:hover{
	color:#318fe1;
}
@media screen and (max-width: 768px){
	.container{
	width: 80%;
	display: block;
	margin:auto;
	padding-top:50px;
}
.content-section{
	float:none;
	width:100%;
	display: block;
	margin:auto;
  
}
.image-section{
	float:none;
	width:100%;
}
.image-section img{
	width: 100%;
	height: auto;
	display: block;
	margin:auto;
}
.content-section .title{
	text-align: center;
	font-size: 19px;
}
.content-section .content .button{
	text-align: center;
}
.content-section .content .button a{
	padding:9px 30px;
}
.content-section .social{
	text-align: center;
}

}
    .navbar-expand-lg 
    {
      padding: 10px;
      background-color: #fff;
      box-shadow: 2px 2px 2px rgba(0,0,0,0.8);
      border: 1px dashed dark;
    }

.banner
{
    width: 100%;
    min-height: 100vh;
    background-position: center;
    display: flex;
    position: relative;
    justify-content: center;
    align-items: center;
    
}
.card-body{
  box-shadow: -3px 2px 12px 5px rgba(0,0,0,0.34);
-webkit-box-shadow: -3px 2px 12px 5px rgba(0,0,0,0.34);
-moz-box-shadow: -3px 2px 12px 5px rgba(0,0,0,0.34);
}
section
{
  padding: 50px 0;
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
    </head>
    <body>
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
    <span class="navbar-brand">
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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e2edff" fill-opacity="1" d="M0,256L288,64L576,96L864,256L1152,32L1440,96L1440,0L1152,0L864,0L576,0L288,0L0,0Z"></path></svg>
        <Section class="container banner">
        <div class="card" style="width: 120rem;" >
            <img src="background.jpg" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Contact Us</h5>
              <a class="link-dark" style="text-decoration: none" >Email : daffa@gmail.com</a><br>
              <a class="link-dark" style="text-decoration: none" >Email : yusril@gmail.com</a>
            </div>
            </div>
          </div>
          ㅤㅤ
        <div class="text-center">
        <h2></h2>
          <p>
            Laundry merupakan kegiatan harian dalam aktivitas manusia. Kegiatan yang melibatkan antara dua unsur, yaitu kekuatan manusiawi yang sekarang digantikan mesin dan deterjen adalah dua unsur primer dalam kegiatan ini.          
          </p>
          <p>
            Akan tetapi, kebutuhan manusiawi yang membutuhkan waktu lebih banyak, urusan perlaundryan duniawi dapat terlantarkan.
          </p>
          <p>
            Untuk itu, bagi anda yang tidak mempunyai waktu untuk melakukan perlaundry-an, kami dapat melakukannya untuk anda.
          </p>
          <p>  
            Cukup dengan daftarkan diri anda di website kami, isi form jasa laundry, dan kami akan melakukannya segera.
            <br>
            Mengurus perlaundryan duniawi hanya dengan sentuhan jari.
          </p>
      </div>
          </Section>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e2edff" fill-opacity="1" d="M0,32L288,256L576,320L864,96L1152,192L1440,160L1440,320L1152,320L864,320L576,320L288,320L0,320Z"></path></svg>
      
    <div class="section">
      <div class="container">
        <div class="content-section">
          <div class="title">
            <h1>About Us</h1>
          </div>
          <div class="content">
            <h3>HELLO</h3>
            <p>If you have any questions or problems, we will always be happy to help. 
              Feel free to contact us by telephone or E-mail 
              and we will be sure to respond to you as soon as possible</p>
            <div class="button">
              <a href="https://www.linkedin.com/in/moh-yusril-prayoga-802243238/">Read More</a>
            </div>
          </div>
          <div class="social">
            <a href="https://wa.me/082259869452"><i class='bx bxl-whatsapp-square' ></i></a>
            <a href="https://twitter.com/demastere03"><i class='bx bxl-twitter' ></i></a>
            <a href="https://www.instagram.com/moh_yusrilprayoga/"><i class='bx bxl-instagram-alt' ></i></a>
          </div>
        </div>
        <div class="image-section">
          <img src="img\about.jpg">
        </div>
      </div>
    </div>
    </body>
    <br>
    <?php require_once "view/footer.php"; ?>
</html>