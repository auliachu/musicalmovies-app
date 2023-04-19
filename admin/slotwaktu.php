<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>



 <div class="container">
	 <h2>Data Slot Waktu</h2>
<div class="table-responsive">
 <table id="example" class="table table-striped" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>no</th>
			<th>id_slot_waktu</th>
			<th>slot_waktu</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php $ambil= $koneksi->query("SELECT * FROM slot_waktu"); ?>
		<?php while($pecah= $ambil->fetch_assoc()){ ?> 
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $pecah['id_slot_waktu']; ?></td>
			<td><?php echo $pecah['slot_waktu']; ?></td>
			<td>
				<a onclick="return confirm('Apakah anda yakin ingin menghapus data ini..?')" href="dashboard.php?halaman=hapusslotwaktu&id=<?php echo $pecah ['id_slot_waktu']; ?> " class="btn btn-danger {color: #FFF;background-color: #009688;border-color: #009688;}">Hapus</a>
				<a href="dashboard.php?halaman=ubahslotwaktu&id=<?php echo $pecah ['id_slot_waktu']; ?> " class="btn btn-success">Ubah</a>
			</td>
		</tr>
		<?php $no++ ?>
		<?php } ?>

	</tbody>
</table>
<a href="dashboard.php?halaman=tambahslotwaktu" class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}">Tambah SlotWaktu</a>