<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>


 <div class="container">
	 <h2>Data Sistem Pembayaran</h2>

<div class="table-responsive">
 <table id="example" class="table table-striped" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>no</th>
			<th>id_sistempembayaran</th>
			<th>sistem_pembayaran</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php $ambil= $koneksi->query("SELECT * FROM sistem_pembayaran"); ?>
		<?php while($pecah= $ambil->fetch_assoc()){ ?> 
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $pecah['id_sistempembayaran']; ?></td>
			<td><?php echo $pecah['sistem_pembayaran']; ?></td>
			<td>
				<a href="" class="btn btn-danger {color: #FFF;background-color: #009688;border-color: #009688;}">Hapus</a>
				<a href="" class="btn btn-success">Ubah</a>
			</td>
		</tr>
		<?php $no++ ?>
		<?php } ?>

	</tbody>
</table>