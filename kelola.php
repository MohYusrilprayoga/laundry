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
  *
  {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "poppins", sans-serif;
  }
  body{
    position: relative;
    min-height: 100vh;
    width: 100%;
    overflow: auto;
  }
  .sidebar{
    position: fixed;
    height: 100%;
    width: 100px;
    background-color: #000;
    padding: 6px 14px;
    transition: all 0.5s ease;
  }
  .sidebar.active{
    width: 250px;
  }
  .sidebar .logo_content .logo{
    color: #fff;
    display: flex;
    height: 50px;
    width: 100%;
    align-items: center;
    opacity: 0;
    pointer-events: none;
  }
  .sidebar.active .logo_content .logo{
    opacity: 1;
    pointer-events: none;
  }
  .logo_content .logo i{
    font-size: 28px;
    margin-right: 5px;
  }
  .logo_content .logo .logo_name{
    font-size: 20px;
    font-weight: 400;
  }
  .sidebar #btn{
    position: absolute;
    color: #fff;
    left: 50%;
    top: 6px;
    font-size: 20px;
    height: 50px;
    width: 50px;
    text-align: center;
    line-height: 50px;
    transform: translateX(-50%);
  }
  .sidebar.active #btn{
    left: 90%;
  }
  .sidebar ul{
    margin-top: 20px;
  }
  .sidebar ul li{
    position: relative;
    height: 50px;
    width: 100%;
    margin: 0 5px;
    list-style: none;
    line-height: 50px;
  }
  .sidebar ul li .tooltip{
    position: absolute;
    left: 122px;
    top: 0;
    transform: translate(-50%, -50%);
    border-radius: 6px;
    height: 35px;
    width: 122px;
    background: #fff;
    line-height: 35px;
    text-align: center;
    box-shadow: 0 5px 10px rgba(0,0,0,0.2);
    transition: 0s;
    opacity: 0;
    pointer-events: 0;
    display: block;
  }
  .sidebar.active ul li .tooltip{
    display: none;
  }
  .sidebar ul li:hover .tooltip{
    transition: all 0.5s ease;
    top:50%;
    opacity: 1;

  }
  .sidebar ul li a{
    color: #fff;
    display: flex;
    align-items: center;
    text-decoration: none;
    transition: all 0,4 ease;
    border-radius: 12px;
    white-space: nowrap;
  }
  .sidebar ul li a:hover{
    color: #11101d;
    background: #fff;
  }
  .sidebar ul li a i{
    height: 50px;
    min-width: 50px;
    border-radius:12px;
    line-height: 50px;
    text-align: center;
  }
  .sidebar .links_name{
    opacity: 0;
    pointer-events: none;
  }
  .sidebar.active .links_name{
    opacity: 1;
    pointer-events: auto;
    
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
.container 
{
  padding-left: 150px;
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
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
    <div class="sidebar">
      <div class="logo_content">
        <div class="logo">
        <i class='bx bxs-washer'></i>
          <div class="logo_name">Laundry</div>
        </div>
        <i class='bx bx-menu' id="btn"></i>
      </div>
      <ul class="nav_list">
        <li>
          <a href="kelola.php">
          <i class='bx bx-grid-alt' ></i>
          <span class="links_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <a href="pelanggan.php">
          <i class='bx bxs-user-detail'></i>
          <span class="links_name">Data Pelanggan</span>
          </a>
          <span class="tooltip">Data Pelanggan</span>
        </li>
        <li>
          <a href="laporan.php">
          <i class='bx bxs-user-account' ></i>
          <span class="links_name">Laporan</span>
          </a>
          <span class="tooltip">Laporan</span>
        </li>
        <li>
          <a href="harga.php">
          <i class='bx bx-dollar-circle' ></i>
          <span class="links_name">Pengaturan Harga</span>
          </a>
          <span class="tooltip">Pengaturan Harga</span>
        </li>
        <li>
          <a href="transaksi.php">
          <i class='bx bxs-credit-card' ></i>
          <span class="links_name">Transaksi</span>
          </a>
          <span class="tooltip">Transaksi</span>
        </li>
      </ul>
    </div>
    <br>
    <div class="container col-md-12">
    <div class="card">
      <div class="card-header">
      <h4>Dashboard</h4>
      </div>
      <div class="card-body">
      <?php
      require_once "functions/db.php";
      ?>
       <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="btn btn-primary">
                        <div class="panel-heading">
                            <h1>
                            <i class='bx bxs-user'></i>
                                <span class="pull-right">
                                    <?php
                                    $pelanggan = mysqli_query($konek,"select * from pelanggan");
                                    echo mysqli_num_rows($pelanggan);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Pelanggan
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn btn-warning">
                        <div class="panel-heading">
                            <h1>
                            <i class='bx bx-repeat'></i>
                                <span class="pull-right">

                                    <?php
                                    $proses = mysqli_query($konek,"select * from transaksi where transaksi_status='0'");
                                    echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Di Proses
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="btn btn-info">
                        <div class="panel-heading">
                            <h1>
                            <i class='bx bxs-info-circle'></i>
                                <span class="pull-right">

                                    <?php
                                    $proses = mysqli_query($konek,"select * from transaksi where transaksi_status='1'");
                                    echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Siap Ambil
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn btn-success">
                        <div class="panel-heading">
                            <h1>
                            <i class='bx bx-check-circle'></i>
                                <span class="pull-right">
                                    <?php
                                    $proses = mysqli_query($konek,"select * from transaksi where transaksi_status='2'");
                                    echo mysqli_num_rows($proses);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Cucian Selesai
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    <br>
    <div class="panel">
        <div class="panel-heading">
            <h4>Riwayat Transaksi Terakhir</h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Berat (Kg)</th>
                    <th>Tgl. Selesai</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>

                <?php
                $data = mysqli_query($konek,"select * from pelanggan,transaksi where transaksi_pelanggan=pelanggan_id order by transaksi_id desc limit 7");
                $no = 1;
                while($d=mysqli_fetch_array($data)){
                  ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
                      <td><?php echo $d['transaksi_tgl']; ?></td>
                      <td><?php echo $d['pelanggan_nama']; ?></td>
                      <td><?php echo $d['transaksi_berat']; ?></td>
                      <td><?php echo $d['transaksi_tgl_selesai']; ?></td>
                      <td><?php echo "Rp. ".number_format($d['transaksi_harga']) ." ,-"; ?></td>
                      <td>
                              <?php
                                if($d['transaksi_status']=="0"){
                                    echo "<div class='btn btn-warning'><i class='bx bx-loader'></i> PROSES</div>";
                                }else if($d['transaksi_status']=="1"){
                                    echo "<div class='btn btn-info'><i class='bx bxs-washer'> DICUCI</i></div>";
                                }else if($d['transaksi_status']=="2"){
                                    echo "<div class='btn btn-success'><i class='bx bx-check-square'></i> SELESAI</div>";
                                }
                                ?>
                      </td>
                  </tr>
                  <?php
                }
              ?>
          </table>
      </div>
  </div>
      
      </div>
    </div>
    </div>
    <br><br><br><br>
  </body>
  <?php require_once "view/footer.php"; ?>
  <script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function() {
      sidebar.classList.toggle("active");
    }

  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>