<?php
$koneksi = new mysqli("localhost","root","","toko_payless");
$id_sepatu=$_GET['id'];
$ambil = $koneksi->query("SELECT*FROM sepatu WHERE id_sepatu='$id_sepatu'");
$pecah = $ambil->fetch_assoc();
$fotosepatu = $pecah['foto_sepatu'];
if (file_exists("../foto_sepatu/$fotosepatu"))
{
    unlink("../foto_sepatu/$fotosepatu");
}

$koneksi->query("DELETE FROM sepatu WHERE id_sepatu='$id_sepatu");

echo "<script>alert('Produk terhapus');</script>";
echo "<script>location='produk.php';</script>";
?>