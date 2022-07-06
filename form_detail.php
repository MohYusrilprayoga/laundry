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
    font-family: "poppins", sans-serif;
  }
  body{
    position: relative;
    min-height: 100vh;
    width: 100%;
    overflow: auto;
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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,128L48,128C96,128,192,128,288,112C384,96,480,64,576,90.7C672,117,768,203,864,218.7C960,235,1056,181,1152,160C1248,139,1344,149,1392,154.7L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <div class="container col-md-12">
    <div class="card">
      <div class="card-header">
      <h4>Detail Pemesanan Laundry</h4>
      </div>
      <div class="card-body">
      <div class="panel">
        <div class="panel-body">
            <br/>
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
                    <th>OPSI</th>
                </tr>
                <?php
                require_once "functions/db.php";
                $data = mysqli_query($konek,"select * from pelanggan,transaksi where transaksi_pelanggan=pelanggan_id order by transaksi_id desc");
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
                        <td>
                        <a href="form_hapus.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda benar-benar ingin menghapus pesanan?')">Batalkan</a>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
            </table>
            <p>
              *Untuk pembatalan pesanan, silahkan untuk menghubungi admin selama laundry masih dalam tahap PROSES
              <br>
              *Pembatalan pesanan dalam tahap DICUCI tidak akan diproses
              <br>
              *Dilarang keras untuk membatalkan pesanan yang bukan merupakan pesanan anda
            </p>
        </div>
    </div>
      </div>
    </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,32L48,74.7C96,117,192,203,288,240C384,277,480,267,576,224C672,181,768,107,864,112C960,117,1056,203,1152,234.7C1248,267,1344,245,1392,234.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    <br><br><br>
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