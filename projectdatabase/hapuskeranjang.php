<?php
session_start();
$koneksi = new mysqli("localhost","root","","toko_payless");

$id_sepatu=$_GET["id_sepatu"];

$query="SELECT jumlah FROM keranjang WHERE keranjang.id_sepatu='$id_sepatu'";
$hasil=mysqli_query($koneksi,$query);
$total_data_jumlah=[];
while($row = mysqli_fetch_assoc($hasil)){
    $total_data_jumlah = $row;
}

$jumlah = $total_data_jumlah["jumlah"]-1;
echo $jumlah;

if($jumlah == 0){
    mysqli_query($koneksi,"DELETE FROM keranjang WHERE id_sepatu='$id_sepatu'");
}else{
    mysqli_query($koneksi,"UPDATE keranjang set jumlah ='$jumlah'  WHERE id_sepatu='$id_sepatu'");
}

echo "<script>alert(' Produk dihapus dari keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>