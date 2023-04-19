<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>


 <div class="container">
	 <h2>Data Musikal</h2>
<div class="table-responsive">
 <table id="example" class="table table-striped" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>no</th>
			<th>id_musikal</th>
			<th>nama_musikal</th>
			<th>Foto</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php $ambil= $koneksi->query("SELECT * FROM musikal"); ?>
		<?php while($pecah= $ambil->fetch_assoc()){ ?> 
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $pecah['id_musikal']; ?></td>
			<td><?php echo $pecah['nama_musikal']; ?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['Foto']; ?>" width="150"></td>
			<td>
				<a onclick="return confirm('Apakah anda yakin ingin menghapus data ini..?')"
				href="dashboard.php?halaman=hapusmusikal&id=<?php echo $pecah ['id_musikal']; ?> " class="btn btn-danger {color: #FFF;background-color: #009688;border-color: #009688;}">Hapus</a>
				
				<a href="dashboard.php?halaman=ubahmusikal&id=<?php echo $pecah ['id_musikal']; ?> " class="btn btn-success">Ubah</a>
			</td>
		</tr>
		<?php $no++ ?>
		<?php } ?>

	</tbody>
</table>
<a href="dashboard.php?halaman=tambahmusikal" class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}">Tambah Musikal</a>