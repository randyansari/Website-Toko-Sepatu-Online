<?php 
$koneksi = new mysqli("localhost","root","","toko_payless");?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
    


    <div class="container" style="margin-top:120px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="nama" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email</label>
                                    <div class="col-md-7">
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Password</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="password" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Alamat</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" name="alamat" required></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Telp/HP</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="telepon" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button class="btn btn-primary" name="daftar">Daftar</button>
                                </div>
                            </div>
                        </form>
                        <?php 
                        //jika tombol daftar ditekan
                        if (isset($_POST["daftar"]))
                        {
                            //mengambil input nama,email,password,telepon,alamat
                            $nama = $_POST["nama"];
                            $email  = $_POST["email"];
                            $password = $_POST["password"];
                            $alamat = $_POST["alamat"];
                            $telepon = $_POST["telepon"];

                            //cek apakah email sudah digunakan
                            $koneksi->query("SELECT*FROM user WHERE email='$email'");
                            $yangcocok = $ambil ->num_rows;
                            if($yangcocok==1)
                            {
                                echo "<script>alert('Pendaftaran gagal, Email sudah digunakan');</script>";
                                echo "<script>location='daftar.php';</script>";
                            }
                            else
                            {
                                //insert query ke dalam tabel
                                $koneksi->query("INSERT INTO user(nama_user,email,password,alamat,no_hp) 
                                VALUES('$nama','$email','$password','$alamat','$telepon')");

                                echo "<script>alert('Pendaftaran Sukses, silakan login');</script>";
                                echo "<script>location='index.php';</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>