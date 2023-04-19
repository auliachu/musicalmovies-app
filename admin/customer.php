	  
<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>


 <div class="container">
	 <h2>Data Customer</h2>

<div class="table-responsive">
 <table id="example" class="table table-striped" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>no</th>
			<th>id_customer</th>
			<th>Nama customer</th>
			<th>No hp</th>
			<th>Email</th>
			<th>Username</th>
			<th>Password</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php $ambil= $koneksi->query("SELECT * FROM customer"); ?>
		<?php while($pecah= $ambil->fetch_assoc()){ ?> 
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $pecah['id_customer']; ?></td>
			<td><?php echo $pecah['Nama_customer']; ?></td>
			<td><?php echo $pecah['No_hp']; ?></td>
			<td><?php echo $pecah['Email']; ?></td>
			<td><?php echo $pecah['user']; ?></td>
			<td><?php echo $pecah['pass']; ?></td>
			<td>
				<a onclick="return confirm('Apakah anda yakin ingin menghapus data ini..?')" href="dashboard.php?halaman=hapuscustomer&id=<?php echo $pecah['id_customer']; ?>" class="btn btn-danger {color: #FFF;background-color: #009688;border-color: #009688;}">Hapus</a>
				<a href="dashboard.php?halaman=ubahcustomer&id=<?php echo $pecah['id_customer']; ?>" class="btn btn-success">Ubah</a>
			</td>
		</tr>
		<?php $no++; ?>
		<?php } ?>

	</tbody>
</table>
<a href="dashboard.php?halaman=tambahcustomer" class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}">Tambah Customer</a>