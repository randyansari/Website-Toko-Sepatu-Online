<?php
session_start();
$koneksi = new mysqli("localhost","root","","toko_payless");
if(!isset($_SESSION["id_user"])){
     header("location:index.php");
 }
//jika tidak ada session pelanggan (belum login), maka diarahkan ke login.php

?>
<!DOCTYPE html>
<html>
<head>
     <title>Checkout</title>
     <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<?php include 'menu.php';?>

<section class="konten">
   <div class="container">
        <h1>Checkout</h1>
        <hr>
        <table class="table table-bordered">
             <thead>
                  <tr>
                     <th>No</th>
                     <th>Produk</th>
                     <th>Harga Sepatu</th>
                     <th>Jumlah</th>
                     <th>Total harga</th>
                  </tr>
             </thead>
             <tbody>
                  <?php $nomor=1;
                  $harga_total_keseluruhan = 0;
                  $jumlah_barang=0;
                  $data_keranjang=[];
                  $query="SELECT * FROM sepatu,user,keranjang WHERE user.id_user = keranjang.id_user AND sepatu.id_sepatu = keranjang.id_Sepatu";
                  $hasil=mysqli_query($koneksi,$query);
                  
                  while($row=mysqli_fetch_assoc($hasil)){
                       $data_keranjang[]=$row;
                  }
                  foreach($data_keranjang as $x):
                  ?>
                 <tr>
                     <td><?php echo $nomor; ?></td>
                     <td><?php echo $x["nama_sepatu"];?></td>
                     <td>Rp <?php echo number_format($x["harga_sepatu"]);?></td>
                     <td><?php echo $x["jumlah"] ?></td>
                     <td>Rp <?php 
                     $harga_total = $x["harga_sepatu"]*$x["jumlah"];
                     
                    echo number_format($harga_total); ?></td>
                    
                 </tr>
                 <?php $nomor++;
                  $jumlah_barang += $x["jumlah"]; 
                  $harga_total_keseluruhan += $harga_total; 
                 endforeach; ?>
             </tbody>
             <tfoot>
                  <tr>
                       <th colspan="4">Total Belanja</th>
                       <th>Rp <?php echo number_format($harga_total_keseluruhan);?></th>
                  </tr>
             </tfoot>
        </table>
        <form method="post">
            
            <div class="row">
                 <div class="col-md-4">
                      <div class="form-group">
                          <input type="text" readonly value="<?php echo $_SESSION['nama_user']?>" class="form-control">
                      </div>
                </div>
                 <div class="col-md-4">
                      <div class="form-group">
                          <input type="text" readonly value="<?php echo $_SESSION['no_hp']?>" class="form-control">
                      </div>
                </div>
                 <div class="col-md-4">
                      <select class="form-control" name="id_ekspedisi">
                           <option value="">Pilih Ekspedisi</option>
                           <?php
                           $ekspedisi=[];
                           $hasil=mysqli_query($koneksi,"SELECT * FROM ekspedisi");
                           while ($row = mysqli_fetch_assoc($hasil)) {
                              $ekspedisi[]=$row;
                           }

                           foreach($ekspedisi as $x):
                           ?>
                           <option value="<?php echo $x["id_ekspedisi"]?>">
                              <?php echo $x['nama_ekspedisi']?>
                           </option>
                           <?php endforeach;?>
                      </select>
                 </div>
                 
                 <div class="col-md-4" style="margin-top:20px">
                 <select class="form-control" name="id_bank">
                           <option value="">Pilih Ekspedisi</option>
                           <?php
                           $ekspedisi=[];
                           $hasil=mysqli_query($koneksi,"SELECT * FROM bank");
                           while ($row = mysqli_fetch_assoc($hasil)) {
                              $ekspedisi[]=$row;
                           }

                           foreach($ekspedisi as $x):
                           ?>
                           <option value="<?php echo $x["id_bank"]?>">
                              <?php echo $x['nama_bank']?>
                           </option>
                           <?php endforeach;?>
                      </select>
                 </div>
            </div>
            <button class="btn btn-primary" name="checkout">Checkout</button>
        </form>
        <?php
        if(isset($_POST["checkout"])){
      
             $id_user = $_SESSION["id_user"];
             $id_ekspedisi = $_POST["id_ekspedisi"];
             $id_bank = $_POST["id_bank"];

             $query = "INSERT INTO detail_pemesanan (jumlah_barang,tanggal_pembelian,id_user,id_bank,id_ekspedisi)
             values ('$jumlah_barang',CURRENT_DATE(),'$id_user','$id_bank','$id_ekspedisi');";

             mysqli_query($koneksi,$query);
             mysqli_query($koneksi,"DELETE FROM keranjang");
             if(mysqli_affected_rows($koneksi)>=1){
                  echo "<script>alert('Silahkan lanjutkan pembayaran');
                  location='index.php';
                  </script>";
                  
             }
             
        }
        ?>
</section>        
</body>
</html>