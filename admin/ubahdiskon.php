<h3>Ubah Diskon</h3>

<?php
$ambil=$koneksi->query("SELECT * FROM diskon WHERE id_diskon='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> id_diskon </label>
		<input type="text" class="form-control" name="id_diskon" value="<?php echo $pecah['id_diskon'];?>">
	</div>
	<div class="form-group">
		<label> nama_diskon </label>
		<input type="text" class="form-control" name="nama_diskon" value="<?php echo $pecah['nama_diskon'];?>">
	</div>
	<div class="form-group">
		<label> besar_diskon </label>
		<input type="text" class="form-control" name="besar_diskon" value="<?php echo $pecah['besar_diskon'];?>">
	</div>
	<button class="btn btn-primary" name="ubah">ubah</button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE diskon SET id_diskon='$_POST[id_diskon]',nama_diskon='$_POST[nama_diskon]',besar_diskon='$_POST[besar_diskon]' WHERE id_diskon='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='dashboard.php?halaman=diskon';</script>";
}
?>