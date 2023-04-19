<h3>Ubah Slot Waktu</h3>

<?php
$ambil=$koneksi->query("SELECT * FROM slot_waktu WHERE id_slot_waktu='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> id_slot_waktu </label>
		<input type="text" class="form-control" name="id_slot_waktu" value="<?php echo $pecah['id_slot_waktu'];?>">
	</div>
	<div class="form-group">
		<label> slot_waktu </label>
		<input type="text" class="form-control" name="slot_waktu" value="<?php echo $pecah['slot_waktu'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE slot_waktu SET id_slot_waktu='$_POST[id_slot_waktu]',slot_waktu='$_POST[slot_waktu]' WHERE id_slot_waktu='$_GET[id]'");

echo "<script> alert('Data Berhasil Diubah');</script>";
echo "<script>location='dashboard.php?halaman=slotwaktu';</script>";
}
?>