<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<h2>Tambah Customer</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>id_customer</label>
		<input type="text" class="form-control" name="id_customer">
	</div>
	<div class="form-group">
		<label>Nama_customer</label>
		<input type="text" class="form-control" name="Nama_customer">
	</div>
	<div class="form-group">
		<label>No_hp</label>
		<input type="text" class="form-control" name="No_hp">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" class="form-control" name="Email">
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" class="form-control" name="user">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" class="form-control" name="pass">
	</div>
	<button class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save'])) {
	$koneksi->query("INSERT INTO customer (id_customer,Nama_customer,No_hp,Email,user,pass) VALUES ('$_POST[id_customer]','$_POST[Nama_customer]','$_POST[No_hp]','$_POST[Email]','$_POST[user]','$_POST[pass]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=dashboard.php?halaman=customer'>";
}
?>
