
<?php
include "../pages/koneksi.php";
 @$tgl_awal = $_POST['tgl_awal']; 
 @$tgl_akhir = $_POST['tgl_akhir']; 
 @$status=$_POST['status'];
?>

<h2>Laporan Penjualan<br>
</h2>
<p>&nbsp; </p>
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
				<label>Status</label><br>
				<select name="status_pembayaran">
					 <option value="">-- Pilih Status -- </option>
      				 <option value="Menunggu">Menunggu</option>
      				 <option value="Lunas">Lunas</option>
				</select>
			</div>
		</div>
		
	</div>
            <button type="submit" name="filter" value="true" class="btn btn-primary">Lihat Laporan</button> 
         
              <?php
            if(isset($_POST['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                echo '<a href="dashboard.php?halaman=laporan" class="btn btn-success">Refresh</a>';
            ?>
        </form>
            
        </form>

<?php

     @$status= $_POST['status_pembayaran']; 
	 $ambil= "SELECT * FROM customer,jadwal_tayang,status_pembayaran,faktur,jenis_tiket,diskon WHERE 
				customer.id_customer=faktur.id_customer
			AND
				jadwal_tayang.id_jadwaltayang=faktur.id_jadwaltayang
			AND 
				faktur.id_jenistiket=jenis_tiket.id_jenistiket
			and
				faktur.id_diskon=diskon.id_diskon 
			and 
				status_pembayaran.status_pembayaran='$status'
			AND 
		status_pembayaran.id_statuspembayaran=faktur.id_statuspembayaran  AND
		(faktur.tanggal_pesan BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
	 
	$url_cetak = "cetaklaporan.php?tgl_awal=$tgl_awal&tgl_akhir=$tgl_akhir";
    $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;

			?>


<hr />
       
        <div class="table-responsive" style="margin-top: 10px;"> <?php echo $label; ?><br><?php echo @$labelstatus; ?>
            <table class="table table-bordered">
                <thead>
					

	<tr>
			<th>no</th>
			<th>No Faktur</th>
			<th>Nama Customer</th>
			<th>Tanggal Pesan</th>
			<th>Status</th>
			<th align="right">Total</th>
		
		</tr>
	</thead>
	<tbody>
		<?php $no=0; 
		$sql = mysqli_query($konek, $ambil); // 
                    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                        while($pecah = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                            
							$no++;
								$diskon=$pecah['besar_diskon'];
	$total=$pecah['total'];
	$bayar=$total-($total*($diskon/100));
								@$totals += $bayar;	
							?>
		<tr>
		  <td><?php echo $no; ?></td>
		  <td><?php echo $pecah['id_faktur']; ?></td>
		  <td><?php echo $pecah['Nama_customer']; ?></td>
		  <td><?php echo $pecah['tanggal_pesan']; ?></td>
		  <td><?php echo $pecah['status_pembayaran']; ?></td>
		  <td align="right"><?php echo number_format($bayar); ?></td>
		</tr>
	
	<?php
		   }
				?>			<tr>
		<td colspan="5" >Total Keseluruhan</td>
			<td align="right"><B><?php echo number_format($totals); ?></B></td>
		</tr> <?php
                    }else{ // Jika data tidak ada
                        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                    }
                    ?>
	</tbody>
</table>
			<a href="<?php echo $url_cetak; ?>" class="btn btn-success" target="_blank">Cetak
				 </a>
