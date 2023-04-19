<h3>Ubah Jadwal Tayang</h3>

<?php
$ambil=$koneksi->query("SELECT * FROM jadwal_tayang WHERE id_jadwaltayang='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> id_jadwaltayang </label>
		<input type="text" class="form-control" name="id_jadwaltayang" value="<?php echo $pecah['id_jadwaltayang'];?>">
	</div>
	<div class="form-group">
		<label> tanggal_show </label>
		<input type="text" class="form-control" name="tanggal_show" value="<?php echo $pecah['tanggal_show'];?>">
	</div>
	<div class="form-group">
		<label> tanggal_selesai </label>
		<input type="date" class="form-control" name="tanggal_selesai" value="<?php echo $pecah['tanggal_selesai'];?>">
	</div>
	<div class="form-group">
			<label>Slot Waktu</label>
			<select name="slot_waktu" class="form-control">
				<option value="">-- Pilih Slot Waktu -- </option>
					<?php $ambil=$koneksi->query("SELECT * FROM slot_waktu");
					while ($pecah=$ambil->fetch_assoc()) { ?>
				<option value="<?php echo $pecah['id_slot_waktu']; ?>"> <?php echo $pecah['slot_waktu']; ?></option>
				<?php } ?>
			</select>
		</div>
	<div class="form-group">
			<label>Nama Musikal</label>
			<select name="nama_musikal" class="form-control">
				<option value="">-- Pilih Musikal -- </option>
					<?php $ambil=$koneksi->query("SELECT * FROM musikal");
					while ($pecah=$ambil->fetch_assoc()) { ?>
				<option value="<?php echo $pecah['id_musikal']; ?>"> <?php echo $pecah['nama_musikal']; ?></option>
				<?php } ?>
			</select>
		</div>
	<button class="btn btn-primary" name="ubah"> ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$id=$_POST['id_jadwaltayang'];
	$koneksi->query("UPDATE jadwal_tayang SET id_jadwaltayang='$_POST[id_jadwaltayang]',tanggal_show='$_POST[tanggal_show]',tanggal_selesai='$_POST[tanggal_selesai]',id_slot_waktu='$_POST[slot_waktu]',id_musikal='$_POST[nama_musikal]' WHERE id_jadwaltayang='$id'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='dashboard.php?halaman=jadwaltayang';</script>";
}
?>