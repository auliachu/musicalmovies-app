<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<h2>Tambah Jenis Tiket</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>id_jenistiket</label>
		<input type="text" class="form-control" name="id_jenistiket">
	</div>
	<div class="form-group">
		<label>Jenis tiket</label>
		<input type="text" class="form-control" name="jenis_tiket">
	</div>
		<div class="form-group">
		<label>Diskon</label>
		<select name="id_diskon" class="form-control">
			
			<option value="">Pilih Diskon</option>
			<?php $ambil=$koneksi->query("SELECT * FROM diskon");
					while ($pecah=$ambil->fetch_assoc()) { ?>
				<option value="<?php echo $pecah['id_diskon']; ?>"> <?php echo $pecah['besar_diskon']; ?></option>
				<?php } ?>
			
			</select>
	</div>
	<div class="form-group">
		<label>Harga tiket</label>
		<input type="text" class="form-control" name="harga_tiket">
	<button class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save'])) {
	$koneksi->query("INSERT INTO jenis_tiket (id_jenistiket,jenis_tiket,harga_tiket,id_diskon) VALUES ('$_POST[id_jenistiket]','$_POST[jenis_tiket]','$_POST[harga_tiket]','$_POST[id_diskon]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=dashboard.php?halaman=jenistiket'>";
}
?>