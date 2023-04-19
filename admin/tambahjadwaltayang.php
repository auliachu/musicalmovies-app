<?php
include "../pages/koneksi.php";
?>

<h2>Atur Jadwal Tayang</h2>
<form method="post" enctype="multipart/form-data">
	
		<div class="form-group">
			<label>Nama Musikal</label>
			<select name="id_musikal" class="form-control">
				<option value="">-- Pilih Nama Musikal -- </option>
					<?php $ambil=$koneksi->query("SELECT * FROM musikal");
					while ($pecah=$ambil->fetch_assoc()) { ?>
				<option value="<?php echo $pecah['id_musikal']; ?>"> <?php echo $pecah['nama_musikal']; ?></option>
				<?php } ?>
			</select>
		</div>
	<div class="form-group"><label>Slot Waktu</label>
	  <select name="id_slot_waktu" class="form-control" required>
			<option value="">-- Pilih Slot Waktu -- </option>
				<?php $ambil=$koneksi->query("SELECT * FROM slot_waktu");
				while ($pecah=$ambil->fetch_assoc()) { ?>
			<option value="<?php echo $pecah['id_slot_waktu']; ?>"> <?php echo $pecah['slot_waktu']; ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Tanggal Show</label>
		<input type="date" class="form-control" name="tanggal_show">
	</div>
<div class="form-group">
		<label>Tanggal Selesai</label>
		<input type="date" class="form-control" name="tanggal_selesai">
	</div>

	<button class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}" name="save">Simpan</button>
</form>
<?php 
 $query = "SELECT max(id_jadwaltayang) AS no_idjadwal FROM jadwal_tayang";
          $hasil = mysqli_query($konek,$query);
          $data  = mysqli_fetch_array($hasil);
          $no_idjadwal = $data['no_idjadwal'];
          $noUrut = (int) substr($no_idjadwal, 2, 2);
          $noUrut++;
          $char = "D"; 
          $id_jadwaltayang= $char . sprintf("%03s", $noUrut);

if (isset($_POST['save'])) {
	$koneksi->query("INSERT INTO jadwal_tayang (id_jadwaltayang,id_musikal,id_slot_waktu,tanggal_show) VALUES ('$id_jadwaltayang','$_POST[id_musikal]','$_POST[id_slot_waktu]','$_POST[tanggal_show]','$_POST[tanggal_selesai]','Sedang Tayang')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=dashboard.php?halaman=jadwaltayang'>";
}
?>