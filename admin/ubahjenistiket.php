<h3>Ubah Jenis Tiket</h3>

<?php
$ambil=$koneksi->query("SELECT * FROM jenis_tiket WHERE id_jenistiket='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> id_jenistiket </label>
		<input type="text" class="form-control" name="id_jenistiket" value="<?php echo $pecah['id_jenistiket'];?>">
	</div>
	<div class="form-group">
		<label> jenis_tiket </label>
		<input type="text" class="form-control" name="jenis_tiket" value="<?php echo $pecah['jenis_tiket'];?>">
	</div>
	<div class="form-group">
		<label> harga_tiket </label>
		<input type="text" class="form-control" name="harga_tiket" value="<?php echo $pecah['harga_tiket'];?>">
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
	<button class="btn btn-primary" name="ubah"> ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE jenis_tiket SET id_jenistiket='$_POST[id_jenistiket]',jenis_tiket='$_POST[jenis_tiket]',harga_tiket='$_POST[harga_tiket]',id_diskon='$_POST[id_diskon]' WHERE id_jenistiket='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='dashboard.php?halaman=jenistiket';</script>";
}
?>