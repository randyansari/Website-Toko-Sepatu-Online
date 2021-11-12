<?php
session_start();
$koneksi = new mysqli("localhost","root","","toko_payless");
if(isset($_SESSION["id_user"])){
    header("location:home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Pelanggan</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body">


<div class="container" style="margin-left:35%;margin-top:100px;">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login Pelanggan</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="">
                         <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                         </div>
                         <div class="form-group">
                             <label>Password</label>
                             <input type="password" class="form-control" name="password">
                         </div>
                         <button class="btn btn-primary" name="login">Login</button>
                         <h5>Belum punya akun? <a href="daftar.php">daftar sekarang</a></h5>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
//jika ada tombol simpan(tombol simpan ditekan)
if (isset($_POST["login"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    //lakukan kuery ngecek akun di tabel user pada database
    $ambil = $koneksi->query("SELECT * FROM user
        WHERE email='$email' AND password='$password'");

    //ngitung akun yang terambil
    $akunyangcocok = $ambil->num_rows;
    
    //jika 1 akun yang cocok, maka login
    if ($akunyangcocok==1)
    {
        //anda sukses login
        //mendapatkan akun dalam bentuk array
        $akun = $ambil->fetch_assoc();
        //simpan di session pelanggan
        $_SESSION["id_user"] = $akun['id_user'];
        $_SESSION["nama_user"] = $akun['nama_user'];
        $_SESSION['no_hp']= $akun['no_hp'];
        echo "<script>alert('Anda Sukses login');</script>";
        echo "<script>location='home.php';</script>";
    }
    else
    {
        //anda gagal login
        echo "<script>alert('Anda gagal login, periksa akun Anda');</script>";
        echo "<script>location='index.php';</script>";
    }
}
?>

</div>
</body>
</html>