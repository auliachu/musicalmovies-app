<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");

include "../pages/koneksi.php";
 @$tgl_awal = $_POST['tgl_awal']; 
 @$tgl_akhir = $_POST['tgl_akhir']; 
 @$status=$_POST['status'];

?>


 <div class="container">
	 <h2>Data Faktur</h2>
	 
	 <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
         <div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" name="tgl_awal" class="form-control" value="<?php echo $tgl_awal ?>">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" name="tgl_akhir" class="form-control" value="<?php echo $tgl_akhir?>">
			</div>
		</div>
			 
			 <div class="col-md-3">
			<div class="form-group">
				<label>Status</label>
				<select class="form-control" name="status">
					<option value="">Pilih status</option>
					<option value="Lunas">Lunas</option>
					<option value="Menunggu">Menunggu</option>
					<option value="Sudah Dibayar">Sudah Dibayar</option>
					<option value="Batal">Batal</option>
					
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<label>&nbsp; </label><br>
	            <button type="submit" name="filter" value="true" class="btn btn-primary"><i class="fa fa-play-circle-o"></i>Lihat</button> 
         
              <?php
            if(isset($_POST['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                echo '<a href="dashboard.php?halaman=faktur" class="btn btn-success square-btn-adjust"><i class="fa fa-refresh"></i>Refresh</a>';
            ?>
        </div>
        </div>
    </form>
<div class="table-responsive">
 <table id="example" class="table table-striped" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>no</th>
			<th>ID Faktur</th>
			<th>Nama Customer</th>
			<th>Tanggal Pesan</th>
			<th>Jenis Tiket</th>
			<th>Status</th>
			<th align="right">Total</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php $ambil= $koneksi->query("SELECT * FROM customer,jadwal_tayang,status_pembayaran,faktur,jenis_tiket,diskon WHERE 
				customer.id_customer=faktur.id_customer
			AND
				jadwal_tayang.id_jadwaltayang=faktur.id_jadwaltayang
			AND 
				faktur.id_jenistiket=jenis_tiket.id_jenistiket
			and
				faktur.id_diskon=diskon.id_diskon
			AND 
				status_pembayaran.id_statuspembayaran=faktur.id_statuspembayaran and status_pembayaran.status_pembayaran='$status' and
			
			faktur.tanggal_pesan BETWEEN '$tgl_awal' AND '$tgl_akhir'"); ?>
		<?php while($pecah= $ambil->fetch_assoc()){ 
		$diskon=$pecah['besar_diskon'];
	$total=$pecah['total'];
	$bayar=$total-($total*($diskon/100));
	$status=$pecah['status_pembayaran'];
	if($status=="Menunggu") {
		$statust="<font color=red>$status</font>"; }
	else {
		$statust="<font color=blue>$status</font>"; }
	
	
		?> 
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $pecah['id_faktur']; ?></td>
			<td><?php echo $pecah['Nama_customer']; ?></td>
			<td><?php echo $pecah['tanggal_pesan']; ?></td>
			<td><?php echo $pecah['jenis_tiket']; ?></td>
			<td><?php echo $statust; ?></td>
		  <td align="right"><?php echo number_format($bayar); ?></td>
			<td>
				<a onclick="return confirm('Apakah anda yakin ingin menghapus data ini..?')" href="dashboard.php?halaman=hapusfaktur&idfaktur=<?php echo $pecah ['id_faktur']; ?>" class="btn btn-danger {color: #FFF;background-color: #009688;border-color: #009688;}">Hapus</a>
				<a href="dashboard.php?halaman=detail&idfaktur=<?php echo $pecah ['id_faktur']; ?>" class="btn btn-success {color: #FFF;background-color: #28a745;border-color: #28a745;}">Detail</a>
			</td>
		</tr>
		<?php $no++ ?>
		<?php } ?>

	</tbody>
</table>
		  <script src="assets/js/jquery.dataTables.js"></script>
	  <script src="assets/js/jquery.dataTables.min.js"></script>