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
    <link rel="icon" href="img\logo.png">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
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
    <?php
        require_once "functions/db.php";
    ?>

        <div class="container">
        <div class="card-header">
            <h2><b> Transaksi Laundry Baru </b></h2>
            <div class="justify-content-end">
                <a href="transaksi.php" class="btn btn-info">Kembali</a>
            </div>
        </div>
        <div class="card-body">
        <div class="panel">
        <div class="panel-heading">
            <h4>Edit Transaksi Laundry</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-12 col-md-offset-2">    
            <?php
                $id = $_GET['id'];
                $transaksi = mysqli_query($konek,"select * from transaksi where transaksi_id='$id'");
                while($t=mysqli_fetch_array($transaksi)){
            ?>
                <form method="post" action="transaksi_update.php">
                        <input type="hidden" name="id" value="<?php echo $t['transaksi_id']; ?>">

                        <div class="form-group">
                            <label class="form-label">Pelanggan</label>
                            <select class="form-control" name="pelanggan" required="required">
                                <option value="">- Pilih Pelanggan</option>
                                <?php
                                $data = mysqli_query($konek,"select * from pelanggan");
                                while($d=mysqli_fetch_array($data)){
                                    ?>
                                <option <?php if($d['pelanggan_id']==$t['transaksi_pelanggan']){echo "selected='selected'";} ?> value="<?php echo $d['pelanggan_id']; ?>"><?php echo $d['pelanggan_nama']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Berat</label>
                            <input type="number" class="form-control" name="berat" placeholder="Masukkan berat cucian .." required="required" value="<?php echo $t['transaksi_berat']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Tgl. Selesai</label>
                            <input type="date" class="form-control" name="tgl_selesai" required="required" value="<?php echo $t['transaksi_tgl_selesai']; ?>">
                        </div>

                        <br/>

                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Jenis Pakaian</th>
                                <th width="20%">Jumlah</th>
                            </tr>

                            <?php
                            $id_transaksi = $t['transaksi_id'];
                            $pakaian = mysqli_query($konek,"select * from pakaian where pakaian_transaksi='$id_transaksi'");

                            while($p=mysqli_fetch_array($pakaian)){
                                ?>
                                <tr>
                                    <td><input type="text" class="form-control" name="jenis_pakaian[]" value="<?php echo $p['pakaian_jenis']; ?>"></td>
                                    <td><input type="number" class="form-control" name="jumlah_pakaian[]" value="<?php echo $p['pakaian_jumlah']; ?>"></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control" name="jenis_pakaian[]"></td>
                                    <td><input type="number" class="form-control" name="jumlah_pakaian[]"></td>
                                </tr>
                            </table>

                            <div class="form-group alert alert-info">
                                <label>Status</label>
                                <select class="form-control" name="status" required="required">
                                    <option <?php if($t['transaksi_status']=="0"){echo "selected='selected'";} ?> value="0">PROSES</option>
                                    <option <?php if($t['transaksi_status']=="1"){echo "selected='selected'";} ?> value="1">DI CUCI</option>
                                    <option <?php if($t['transaksi_status']=="2"){echo "selected='selected'";} ?> value="2">SELESAI</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Ubah">
                        </form>
                        <?php
                         }
                    ?>
                </div>
            </div>
        </div>
    </div>
        </div>
        </div>
        <br><br><br><br>
  </body>
  <?php require_once "view/footer.php"; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>