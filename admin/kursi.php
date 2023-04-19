<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<FORM id="ubah" name="ubah" method="post">
	
 <div class="container">
	 
<h2>Data Kursi</h2>
<div class="table-responsive">
 <table id="example" class="table table-striped" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>No</th>
			<th>Id Kursi</th>
			<th>Jenis Tiket</th>
			<th>No kursi</th>
			<th>Status</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php $ambil= $koneksi->query("SELECT * FROM jenis_tiket,kursi WHERE jenis_tiket.id_jenistiket = kursi.id_jenistiket"); ?>
		<?php while($pecah= $ambil->fetch_assoc()){
$status=$pecah['status'];
		if($status=="Booking") {
		$statust="<font color=red>$status</font>"; }
	elseif($status=="Tersedia") {
		$statust="<font color=blue>$status</font>"; }
		else {
			$statust="<font color=green>$status</font>";
		}
		$id_kursi=$pecah['id_kursi'];

		
		?> 
		
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $pecah['id_kursi']; ?></td>
			<td><?php echo $pecah['jenis_tiket']; ?></td>
			<td><?php echo $pecah['no_kursi']; ?></td>
			<td><a href="dashboard.php?halaman=updatekursi&id=<?php echo $pecah['id_kursi']; ?>" name="ubah"><?php echo $statust; ?></a></b>
	
	
	</td>
			<td>
				<a onclick="return confirm('Apakah anda yakin ingin menghapus data ini..?')" href="dashboard.php?halaman=hapuskursi&id=<?php echo $pecah['id_kursi']; ?>" class="btn btn-danger {color: #FFF;background-color: #009688;border-color: #009688;}">Hapus</a>
				<a href="dashboard.php?halaman=ubahkursi&id=<?php echo $pecah['id_kursi']; ?>" class="btn btn-success">Ubah</a>
			</td>
		</tr>
		<?php $no++ ?>
		<?php } ?>

	</tbody>
</table>
</FORM>
<a href="dashboard.php?halaman=tambahkursi" class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}">Tambah Kursi</a>