<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>


 <div class="container">
	 <h2>Data Tiket</h2>
<div class="table-responsive">
 <table id="example" class="table table-striped" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>no</th>
			<th>id_tiket</th>
			<th>id_faktur</th>
			<th>total</th>
			<th>no_kursi</th>
			<th>Pilihan</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		<?php $ambil= $koneksi->query("SELECT * FROM faktur,tiket WHERE 
		
				faktur.id_faktur=tiket.id_faktur
				"); ?>
		<?php while($pecah= $ambil->fetch_assoc()){ ?> 
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $pecah['id_tiket']; ?></td>
			<td><?php echo $pecah['id_faktur']; ?></td>
			<td><?php echo $pecah['total']; ?></td>
			<td><?php echo $pecah['no_kursitiket']; ?></td>
			<td>
				<a href="" class="btn btn-success">Ubah</a>
			</td>
		</tr>
		<?php $no++ ?>
		<?php } ?>

	</tbody>
</table>
