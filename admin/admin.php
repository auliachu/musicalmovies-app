  
<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>


 <div class="container">
	 <h2>Data Admin</h2>

<div class="table-responsive">
 <table id="example" class="table table-striped" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>no</th>
			<th>id_admin</th>
			<th>Nama Admin</th>
			<th>Username</th>
			<th>Password</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php $ambil= $koneksi->query("SELECT * FROM admin"); ?>
		<?php while($pecah= $ambil->fetch_assoc()){ ?> 
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $pecah['id_admin']; ?></td>
			<td><?php echo $pecah['nama_admin']; ?></td>
			<td><?php echo $pecah['username']; ?></td>
			<td><?php echo $pecah['password']; ?></td>
			<td>
				<a onclick="return confirm('Apakah anda yakin ingin menghapus data ini..?')" href="dashboard.php?halaman=hapusadmin&id=<?php echo $pecah['id_admin']; ?>" class="btn btn-danger {color: #FFF;background-color: #009688;border-color: #009688;}">Hapus</a>
				<a href="dashboard.php?halaman=ubahadmin&id=<?php echo $pecah['id_admin']; ?>" class="btn btn-success">Ubah</a>
			</td>
		</tr>
		<?php $no++; ?>
		<?php } ?>

	</tbody>
</table>
<a href="dashboard.php?halaman=tambahadmin" class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}">Tambah Admin</a>