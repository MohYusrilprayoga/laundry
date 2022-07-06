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
            <center><h2>LAUNDRYQUH</h2></center>
            <?php
        if(isset($_GET['dari']) && isset($_GET['sampai'])){

            $dari = $_GET['dari'];
            $sampai = $_GET['sampai'];
            ?>
            <h4>Data Laporan Laundry dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
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
                                echo "<div class='btn btn-warning'>PROSES</div>";
                            }else if($d['transaksi_status']=="1"){
                                echo "<div class='btn btn-info'>DICUCI</div>";
                            }else if($d['transaksi_status']=="2"){
                                echo "<div class='btn btn-success'>SELESAI</div>";
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php } ?>
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