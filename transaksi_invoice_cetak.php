<!DOCTYPE html>
<html>
<head>
    <title>Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img\logo.png">
</head>
<style>
    .container{
        position: relative;
        display: flex;
        flex-direction: column;
    }
    .container .card-body{
        box-shadow: -30px 30px 20px rgb(0,0,0,0);
    }
</style>
<body>
<?php
    require_once "core/init.php";

    if(!isset($_SESSION['user'])){
        $_SESSION['msg'] = "<script>alert('Anda Harus login untuk mengakses halaman ini.')</script>";
        header('location: login.php');
    }
?>
    <?php
        require_once "functions/db.php"
    ?>
    <br><br>
    <div class="container col-md-9">
    <?php
        $id = $_GET['id'];
        $transaksi = mysqli_query($konek,"select * from transaksi,pelanggan where transaksi_id='$id' and transaksi_pelanggan=pelanggan_id");
        while($t=mysqli_fetch_array($transaksi)){
            ?>
            <center><h2>LAUNDRYQUH</h2></center>
            <h3>INVOICE-<?php echo $t['transaksi_id']; ?></h3>
            <br/>
            <table class="table">
                <tr>
                    <th width="20%">Tgl. Laundry</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_tgl']; ?></td>
                </tr>
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>:</th>
                    <td><?php echo $t['pelanggan_nama']; ?></td>
                </tr>
                <tr>
                    <th>HP</th>
                    <th >:</th>
                    <td><?php echo $t['pelanggan_hp']; ?></td>
                </tr>
                <tr>
                <th>Alamat</th>
                    <th>:</th>
                    <td><?php echo $t['pelanggan_alamat']; ?></td>
                </tr>
                <tr>
                    <th>Berat Cucian (Kg)</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_berat']; ?></td>
                </tr>
                <tr>
                    <th>Tgl. Selesai</th>
                    <th>:</th>
                    <td><?php echo $t['transaksi_tgl_selesai']; ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <th>:</th>
                    <td>
                        <?php
                        if($t['transaksi_status']=="0"){
                            echo "<div class='label label-warning'>PROSES</div>";
                        }else if($t['transaksi_status']=="1"){
                            echo "<div class='label label-info'>DI CUCI</div>";
                        }else if($t['transaksi_status']=="2"){
                            echo "<div class='label label-success'>SELESAI</div>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <th>:</th>
                    <td><?php echo "Rp. ".number_format($t['transaksi_harga'])." ,-"; ?></td>
                </tr>
            </table>
            <br/>
            <h4>Daftar Cucian</h4>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Jenis Pakaian</th>
                    <th width="20%">Jumlah</th>
                </tr>
                <?php
                $id = $t['transaksi_id'];
                $pakaian = mysqli_query($konek,"select * from pakaian where pakaian_transaksi='$id'");
                while($p=mysqli_fetch_array($pakaian)){
                    ?>
                    <tr>
                        <td><?php echo $p['pakaian_jenis']; ?></td>
                        <td width="5%"><?php echo $p['pakaian_jumlah']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
                <br/>
                <p><center><i>" SALAM BERSIH, SALAM WANGI ".</i></center></p>

                <?php
            }
            ?>
        </div>
    </div>
        </div>
        <br>
        <br>
    </body>
    <script type="text/javascript">
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </html>