<h3>Ubah Kursi</h3>

<?php
$ambil=$koneksi->query("SELECT * FROM kursi WHERE id_kursi='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> id_kursi </label>
		<input type="text" class="form-control" name="id_kursi" value="<?php echo $pecah['id_kursi'];?>">
	</div>
	<div class="form-group">
		<label> no_kursi </label>
		<input type="text" class="form-control" name="no_kursi" value="<?php echo $pecah['no_kursi'];?>">
	</div>
	<div class="form-group">
			<label>Jenis Tiket</label>
			<select name="jenis_tiket" class="form-control">
				<option value="">-- Pilih Jenis Tiket -- </option>
					<?php $ambil=$koneksi->query("SELECT * FROM jenis_tiket");
					while ($pecah=$ambil->fetch_assoc()) { ?>
				<option value="<?php echo $pecah['id_jenistiket']; ?>"> <?php echo $pecah['jenis_tiket']; ?></option>
				<?php } ?>
			</select>
		</div>
	<button class="btn btn-primary" name="ubah"> ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE kursi SET id_kursi='$_POST[id_kursi]',no_kursi='$_POST[no_kursi]',id_jenistiket='$_POST[jenis_tiket]'WHERE id_kursi='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='dashboard.php?halaman=kursi';</script>";
}
?>