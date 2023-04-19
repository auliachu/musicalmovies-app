
<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>


 <div class="container">
	 <h2>Data Jenis Tiket</h2>
<div class="table-responsive">
 <table id="example" class="table table-striped" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>no</th>
			<th>ID Jenis</th>
			<th>Jenis Tiket</th>
			<th>Diskon</th>
			<th>Harga</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php $ambil= $koneksi->query("SELECT * FROM jenis_tiket,diskon where jenis_tiket.id_diskon=diskon.id_diskon"); ?>
		<?php while($pecah= $ambil->fetch_assoc()){ 
		
		?> 
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $pecah['id_jenistiket']; ?></td>
			<td><?php echo $pecah['jenis_tiket']; ?></td>
			<td><?php echo $pecah['besar_diskon']; ?>%</td>
			<td><?php echo number_format($pecah['harga_tiket']); ?></td>
			<td>
				<a onclick="return confirm('Apakah anda yakin ingin menghapus data ini..?')" href="dashboard.php?halaman=hapusjenistiket&id=<?php echo $pecah['id_jenistiket']; ?>" class="btn btn-danger {color: #FFF;background-color: #009688;border-color: #009688;}">Hapus</a>
				<a href="dashboard.php?halaman=ubahjenistiket&id=<?php echo $pecah['id_jenistiket']; ?>" class="btn btn-success">Ubah</a>
			</td>
		</tr>
		<?php $no++ ?>
		<?php } ?>

	</tbody>
</table>
<a href="dashboard.php?halaman=tambahjenistiket" class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}">Tambah Jenis Tiket</a>

	 <script src="assets/js/jquery.js"></script>
	  <script src="assets/js/jquery.dataTables.js"></script>
	  <script src="assets/js/jquery.dataTables.min.js"></script>
	  
	  <script>
	  $(document).ready(function() {
    $('#example').DataTable();
} );
	  </script>