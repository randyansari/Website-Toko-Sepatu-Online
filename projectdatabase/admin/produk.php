<h2>Data Produk Sepatu</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Sepatu</th>
            <th>Nama Sepatu</th>
            <th>Harga Sepatu</th>
            <th>Gambar Sepatu</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
        <?php $ambil=$koneksi->query("SELECT*FROM sepatu");?>
        <?php while($pecah=$ambil->fetch_assoc()){?>
        <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah["id_sepatu"];?></td>
            <td><?php echo $pecah["nama_sepatu"];?></td>
            <td><?php echo $pecah["harga_sepatu"];?></td>
            <td>
                 <img src="../foto_sepatu/<?php echo $pecah['foto_sepatu']?>" width="100">
            </td>
            <td>
                <a href="hapusproduk.php?id_sepatu=<?php echo $pecah['id_sepatu'];?>" class="btn-danger btn">Hapus</a>
                <a href="" class="btn btn-warning">Ubah</a>
            </td>
        </tr>
        <?php $nomor++;?>
        <?php }?>

    </tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a>