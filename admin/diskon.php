<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>


 <div class="container">
	 <h2>Data Diskon</h2>
<div class="table-responsive">
 <table id="example" class="table table-striped" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>no</th>
			<th>ID diskon</th>
			<th>Nama diskon</th>
			<th>besar diskon</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php $ambil= $koneksi->query("SELECT * FROM diskon"); ?>
		<?php while($pecah= $ambil->fetch_assoc()){ ?> 
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $pecah['id_diskon']; ?></td>
			<td><?php echo $pecah['nama_diskon']; ?></td>
			<td><?php echo $pecah['besar_diskon']; ?>%</td>
			<td>
				<a onclick="return confirm('Apakah anda yakin ingin menghapus data ini..?')" href="dashboard.php?halaman=hapusdiskon&id=<?php echo $pecah['id_diskon']; ?>" class="btn btn-danger {color: #FFF;background-color: #009688;border-color: #009688;}">Hapus</a>
				<a href="dashboard.php?halaman=ubahdiskon&id=<?php echo $pecah['id_diskon']; ?>" class="btn btn-success">Ubah</a>
			</td>
		</tr>
		<?php $no++ ?>
		<?php } ?>

	</tbody>
</table>
<a href="dashboard.php?halaman=tambahdiskon" class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}">Tambah Diskon</a>