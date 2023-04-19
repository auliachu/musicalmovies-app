<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<h2>Data Status Pembayaran</h2>
<table class="table table-striped">
	<thead>
		<tr>
			<th>no</th>
			<th>id_statuspembayaran</th>
			<th>status_pembayaran</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php $ambil= $koneksi->query("SELECT * FROM status_pembayaran"); ?>
		<?php while($pecah= $ambil->fetch_assoc()){ ?> 
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $pecah['id_statuspembayaran']; ?></td>
			<td><?php echo $pecah['status_pembayaran']; ?></td>
			<td>
				<a href="" class="btn btn-primary {color: #FFF;background-color: #009688;border-color: #009688;}">Hapus</a>
				<a href="" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		<?php $no++ ?>
		<?php } ?>

	</tbody>
</table>