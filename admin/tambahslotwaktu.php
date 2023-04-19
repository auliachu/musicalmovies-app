<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<h2>Tambah Slot Waktu</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>id_slot_waktu</label>
		<input type="text" class="form-control" name="id_slot_waktu">
	</div>
	<div class="form-group">
		<label>slot_waktu</label>
		<input type="text" class="form-control" name="slot_waktu">
	<button class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save'])) {
	$koneksi->query("INSERT INTO slot_waktu (id_slot_waktu,slot_waktu) VALUES ('$_POST[id_slot_waktu]','$_POST[slot_waktu]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=dashboard.php?halaman=slotwaktu'>";
}
?>