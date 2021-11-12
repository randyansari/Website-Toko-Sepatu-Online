<h2>Data Pelanggan</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
        <?php $ambil=$koneksi->query("SELECT*FROM user");?>
        <?php while($pecah=$ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah["id_user"];?></td>
            <td><?php echo $pecah["nama_user"];?></td>
            <td><?php echo $pecah["tanggal_lahir"];?></td>
            <td><?php echo $pecah["email"];?></td>
            <td><?php echo $pecah["no_hp"];?></td>
            <td><?php echo $pecah["password"];?></td>
            <td>
                <a href="" class="btn-danger btn">Hapus</a>
            </td>
        </tr>
        <?php $nomor++;?>
        <?php }?>
    </tbody>
</table>