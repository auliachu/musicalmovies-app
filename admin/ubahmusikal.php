<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<h2>Ubah Musikal</h2>
<?php 
$ambil= $koneksi->query("SELECT * FROM musikal WHERE id_musikal='$_GET[id]'");
$pecah= $ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> nama musikal </label>
		<input type="text" name="nama_musikal" class="form-control" value="<?php echo $pecah['nama_musikal'];?>">
	</div>
	<div class="form-group">
		<img src="../foto_produk/<?php echo $pecah['Foto'] ?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="Foto" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="Deskripsi" class="form-control" rows="10"><?php echo $pecah['Deskripsi']; ?> </textarea>
	</div>
	<button class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah']))
{
	$namafoto=$_FILES['Foto']['name'];
	$lokasifoto=$_FILES['Foto']['tmp_name'];

	if(!empty($lokasifoto))
	{
		move_uploaded_file($lokasifoto,"../foto_produk/$namafoto");

		$koneksi->query("UPDATE musikal SET nama_musikal='$_POST[nama_musikal]',Foto='$namafoto',Deskripsi='$_POST[Deskripsi]' WHERE id_musikal='$_GET[id]'");
	}
	else 
	{
		$koneksi->query("UPDATE musikal SET nama_musikal='$_POST[nama_musikal]',Deskripsi='$_POST[Deskripsi]' WHERE id_musikal='$_GET[id]'");
	}

	echo "<script> alert(' Data Berhasil Diubah');</script>";
	echo "<script>location='dashboard.php?halaman=musikal';</script>";
}
?>
