<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<h2>Tambah Kursi</h2>
<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label>Jenis Tiket</label>
		<select name="id_jenistiket" class="form-control" required>
			<option value="">-- Pilih id_jenistiket -- </option>
				<?php $ambil=$koneksi->query("SELECT * FROM jenis_tiket");
				while ($pecah=$ambil->fetch_assoc()) { ?>
			<option value="<?php echo $pecah['id_jenistiket']; ?>"> <?php echo $pecah['jenis_tiket']; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>No Kursi</label>
		<input type="text" class="form-control" name="no_kursi">
	</div>
	<button class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}" name="save">Simpan</button>
</form>
<?php 
include "../pages/koneksi.php";
 $query = "SELECT max(id_kursi) AS nomor FROM kursi";
          $hasil = mysqli_query($konek,$query);
          $data  = mysqli_fetch_array($hasil);
          $no_kursi = $data['nomor'];
          $noUrut = (int) substr($no_kursi, 2, 3);
          $noUrut++;
          $char = "KR"; 
          $nokursi = $char . sprintf("%03s", $noUrut);

if (isset($_POST['save'])) {
	$koneksi->query("INSERT INTO kursi (id_kursi,no_kursi,id_jenistiket,status) VALUES ('$nokursi','$_POST[no_kursi]','$_POST[id_jenistiket]','Tersedia')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=dashboard.php?halaman=kursi'>";
}
?>