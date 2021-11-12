<?php
session_start();

//menghancurkan  $_SESSION["pelanggan"]
session_destroy();
session_unset();
$_SESSION=[];

echo "<script>alert('Anda telah logout');</script>";
echo "<script>location='index.php';</script>";

?>