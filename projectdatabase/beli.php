<?php
session_start();
$koneksi = new mysqli("localhost","root","","toko_payless");
//mendapatkan id produk dari url
$id_sepatu = $_GET['id_sepatu'];
$id_user = $_SESSION['id_user'];




$query2="SELECT * FROM sepatu,user,keranjang WHERE user.id_user = keranjang.id_user AND sepatu.id_sepatu = keranjang.id_Sepatu AND keranjang.id_sepatu='$id_sepatu'";
$hasil=mysqli_query($koneksi,$query2);
$data_sepatu=[];

if(mysqli_num_rows($hasil)==0){
    $query="INSERT INTO keranjang (id_sepatu,id_user,jumlah) values ('$id_sepatu','$id_user',1)";
    mysqli_query($koneksi,$query);
}else{
    $query3="SELECT * FROM keranjang WHERE keranjang.id_sepatu='$id_sepatu'";
    $hasil3=mysqli_query($koneksi,$query3);

    $jumlah=(mysqli_num_rows($hasil3))+1;
    $query4="UPDATE keranjang SET jumlah = '$jumlah' WHERE id_sepatu='$id_sepatu'";
    mysqli_query($koneksi,$query4);

}


echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";
?>