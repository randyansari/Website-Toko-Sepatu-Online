<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","toko_payless");
if(!isset($_SESSION["id_user"])){
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Toko Payless</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php';?>

<!-- konten -->
<section class="konten">
    <div class="container">
         <h1>Produk Tersedia</h1>

         <div class="row">
            
             <?php $ambil = $koneksi->query("SELECT*FROM sepatu "); ?>
             <?php while($perproduk = $ambil->fetch_assoc()){ ?>
             
             <div class="col-md-3">
                 <div class="thumbnail">
                     <img src="foto_sepatu/<?php echo $perproduk['foto_sepatu'];?>" alt="">
                     <div class="caption">
                         <h3><?php echo $perproduk['nama_sepatu'];?></h3>
                         <h5>Rp <?php echo number_format($perproduk['harga_sepatu']);?></h5>
                         <a href="beli.php?id_sepatu=<?php echo $perproduk['id_sepatu'];?>" class="btn btn-primary">Beli</a> 
                     </div>
                 </div>
             </div> 
             <?php }?>



         </div>
    </div>
</section>
</body>
</html>