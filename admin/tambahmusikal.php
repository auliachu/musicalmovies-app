<?php
include "../pages/koneksi.php";
?>

<h2> Tambah Musikal</h2>

<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label>Nama Musikal</label>
		<input type="text" class="form-control" name="nama_musikal">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="Deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="Foto">
	</div>
	<button class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}" name="save">Simpan</button>
</form>
<?php 
 $query = "SELECT max(id_musikal) AS no_idmusikal FROM musikal";
          $hasil = mysqli_query($konek,$query);
          $data  = mysqli_fetch_array($hasil);
          $no_idmusikal = $data['no_idmusikal'];
          $noUrut = (int) substr($no_idmusikal, 2, 2);
          $noUrut++;
          $char = "M"; 
          $id_musikal= $char . sprintf("%03s", $noUrut);


if (isset($_POST['save'])) {
	$nama= $_FILES['Foto']['name'];
	$lokasi= $_FILES['Foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	$koneksi->query("INSERT INTO musikal (id_musikal,nama_musikal,Deskripsi,Foto) VALUES ('$id_musikal','$_POST[nama_musikal]','$_POST[Deskripsi]','$nama')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=dashboard.php?halaman=musikal'>";
}
?>
