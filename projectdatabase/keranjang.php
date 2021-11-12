<?php
session_start();

if(!isset($_SESSION["id_user"])){
     header("location:index.php");
}

$koneksi = new mysqli("localhost","root","","toko_payless");
$data_keranjang=[];

$query="SELECT * FROM sepatu,user,keranjang WHERE user.id_user = keranjang.id_user AND sepatu.id_sepatu = keranjang.id_Sepatu";
$hasil=mysqli_query($koneksi,$query);

while($row=mysqli_fetch_assoc($hasil)){
     $data_keranjang[]=$row;
}

?>
<!DOCTYPE html>
<html>
<head>
     <title>Keranjang Belanja</title>
     <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php';?>

<section class="konten">
   <div class="container">
        <h1>Keranjang Belanja</h1>
        <hr>
        <table class="table table-bordered">
             <thead>
                  <tr>
                     <th>No</th>
                     <th>Produk</th>
                     <th>Harga Sepatu</th>
                     <th>Jumlah</th>
                     <th>Total harga</th>
                     <th>Aksi</th>
                  </tr>
             </thead>
             <tbody>
                    
                  <?php $nomor=1; ?>
                  <?php foreach($data_keranjang as $x) :?>
                  <!--menampilkan produk yang sedang diperulangkan berdasarkan id_sepatu-->
                 <tr>
                     <td><?php echo $nomor; ?></td>
                     <td><?php echo $x["nama_sepatu"];?></td>
                     <td>Rp <?php echo number_format($x["harga_sepatu"]);?></td>
                     <td><?php echo $x["jumlah"];?></td>
                     <td>Rp <?php echo number_format($x["harga_sepatu"]*$x["jumlah"]); ?></td>
                     <td>
                      <a href="hapuskeranjang.php?id_sepatu=<?php echo $x["id_sepatu"];?>" class="btn btn-danger btn-xs">Hapus</a>
                     </td>
                 </tr>
                 <?php $nomor++;?>
                 <?php endforeach ?>
             </tbody>
        </table>
        
        <a href="home.php" class="btn btn-default">Lanjutkan Belanja</a>
        <a href="checkout.php" class="btn btn-primary">Checkout</a>
   </div>
</section>
</body>
</html>