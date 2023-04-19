<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<h2>Tambah Diskon</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>id_diskon</label>
		<input type="text" class="form-control" name="id_diskon">
	</div>
	<div class="form-group">
		<label>nama_diskon</label>
		<input type="text" class="form-control" name="nama_diskon">
	</div>
	<div class="form-group">
		<label>besar_diskon</label>
		<input type="text" class="form-control" name="besar_diskon">
	<button class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save'])) {
	$koneksi->query("INSERT INTO diskon (id_diskon,nama_diskon,besar_diskon) VALUES ('$_POST[id_diskon]','$_POST[nama_diskon]','$_POST[besar_diskon]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=dashboard.php?halaman=diskon'>";
}
?>