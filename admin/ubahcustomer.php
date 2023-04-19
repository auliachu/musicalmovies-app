<h3>Ubah Customer</h3>

<?php
$ambil=$koneksi->query("SELECT * FROM customer WHERE id_customer='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> id_customer </label>
		<input type="text" class="form-control" name="id_customer" value="<?php echo $pecah['id_customer'];?>">
	</div>
	<div class="form-group">
		<label> Nama_customer </label>
		<input type="text" class="form-control" name="Nama_customer" value="<?php echo $pecah['Nama_customer'];?>">
	</div>
	<div class="form-group">
		<label> No_hp </label>
		<input type="text" class="form-control" name="No_hp" value="<?php echo $pecah['No_hp'];?>">
	</div>
	<div class="form-group">
		<label> Email </label>
		<input type="text" class="form-control" name="Email" value="<?php echo $pecah['Email'];?>">
	</div>
	<div class="form-group">
		<label> Username </label>
		<input type="text" class="form-control" name="user" value="<?php echo $pecah['user'];?>">
	</div>
	<div class="form-group">
		<label> Password </label>
		<input type="text" class="form-control" name="pass" value="<?php echo $pecah['pass'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE customer SET id_customer='$_POST[id_customer]',Nama_customer='$_POST[Nama_customer]',No_hp='$_POST[No_hp]',Email='$_POST[Email]',user='$_POST[user]',pass='$_POST[pass]' WHERE id_customer='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='dashboard.php?halaman=customer';</script>";
}
?>

