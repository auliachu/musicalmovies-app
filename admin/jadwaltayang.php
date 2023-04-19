<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>


 <div class="container">
	 <h2>Data Jadwal Tayang</h2>
<div class="table-responsive">
 <table id="example" class="table table-striped" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>no</th>
			<th>ID Jadwal Tayang</th>
			<th>Nama Musikal</th>
			<th>Slot Waktu</th>
			<th>Tanggal Show</th>
			<th>Tanggal Selesai</th>
			<th>Keterangan</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		
		<?php $ambil= $koneksi->query("SELECT * FROM musikal,slot_waktu,jadwal_tayang WHERE 
				musikal.id_musikal=jadwal_tayang.id_musikal
				AND 
				slot_waktu.id_slot_waktu=jadwal_tayang.id_slot_waktu
				");
		$no=0;?>
		<?php while($pecah= $ambil->fetch_assoc()){ 
		$no++;
		$tglselesai=$pecah['tanggal_selesai'];
		$id_jadwaltayang=$pecah['id_jadwaltayang'];
		?> 
		
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $id_jadwaltayang; ?></td>
			<td><?php echo $pecah['nama_musikal']; ?></td>
			<td><?php echo $pecah['slot_waktu']; ?></td>
			<td><?php echo $pecah['tanggal_show']; ?></td>
			<td><?php echo $tglselesai; ?></td>
			<?php
			$tglsekarang=date("Y-m-d");
			if($tglselesai>$tglsekarang) {
				$Keterangan="Sedang Tayang";
			} else {
				$Keterangan="<font color=red>Kadaluarsa</font>";
			}
				
			?>
			<td>


				<?php 
					if($Keterangan=="Sedang Tayang") {
						echo "Sedang Tayang";
					} else {

					
				echo "<a href='dashboard.php?halaman=updateketerangan&id=$id_jadwaltayang'> $Keterangan </a>"; } ?></td>
			<td>
				<a onclick="return confirm('Apakah anda yakin ingin menghapus data ini..?')" href="dashboard.php?halaman=hapusjadwaltayang&id=<?php echo $pecah ['id_jadwaltayang']; ?> " class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}">Hapus</a>
				<a href="dashboard.php?halaman=ubahjadwaltayang&id=<?php echo $pecah ['id_jadwaltayang']; ?>" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		
		<?php } ?>

	</tbody>
</table>
<a href="dashboard.php?halaman=tambahjadwaltayang" class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}">Atur Jadwal Tayang</a>