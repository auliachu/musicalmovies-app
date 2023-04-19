<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<h2>Tambah Tiket</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>id_tiket</label>
		<input type="text" class="form-control" name="id_kursi">
	</div>
	<div class="form-group">
		<label>id_faktur</label>
		<select name="id_faktur" class="form-control" required>
			<option value="">-- Pilih id_faktur -- </option>
				<?php $ambil=$koneksi->query("SELECT * FROM faktur");
				while ($pecah=$ambil->fetch_assoc()) { ?>
			<option value="<?php echo $pecah['id_faktur']; ?>"> <?php echo $pecah['faktur']; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>total</label>
		<input type="text" class="form-control" name="total">
	</div>
	<div class="form-group">
		<label>id_kursi</label>
		<select name="id_kursi" class="form-control" required>
			<option value="">-- Pilih id_kursi -- </option>
				<?php $ambil=$koneksi->query("SELECT * FROM kursi");
				while ($pecah=$ambil->fetch_assoc()) { ?>
			<option value="<?php echo $pecah['id_kursi']; ?>"> <?php echo $pecah['id_kursi']; ?></option>
			<?php } ?>
		</select>
	</div>
	<button class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save'])) {
	$koneksi->query("INSERT INTO kursi (id_tiket,id_faktur,total,id_kursi) VALUES ('$_POST[id_tiket]','$_POST[id_faktur]','$_POST[total]','$_POST[id_kursi]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=dashboard.php?halaman=tiket'>";
}
?>