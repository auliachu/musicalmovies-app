
<?php
include "../pages/koneksi.php";
 @$tgl_awal = $_POST['tgl_awal']; 
 @$tgl_akhir = $_POST['tgl_akhir']; 
 @$status=$_POST['status'];
?>

<h2>Laporan Banyak Kursi Dipesan<br>
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
				<label>Group by musikal</label>
				<select name="musikal">
					 <option value="">-- Pilih Musical -- </option>
      <?php $ambil2=$koneksi->query("SELECT * FROM musikal");
					while ($pecah2=$ambil2->fetch_assoc()) { ?>
      <option value="<?php echo $pecah2['id_musikal']; ?>"> <?php echo $pecah2['nama_musikal']; ?></option>
      <?php } ?>



				</select>
			</div>
		</div>
		



  </div>
            <button type="submit" name="filter" value="true" class="btn btn-primary">Lihat Laporan</button> 
         
              <?php
            if(isset($_POST['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                echo '<a href="dashboard.php?halaman=laporankursi" class="btn btn-success">Refresh</a>';
            ?>
        </form>
            
        </form>

<?php
 
	  // Buat query untuk menampilkan semua data transaksi
@$musikal=$_POST['musikal'];
            $ambil= "SELECT jenis_tiket.jenis_tiket,jenis_tiket.harga_tiket, musikal.nama_musikal, sum(jumlah_tiket) as jumlah  FROM faktur,jenis_tiket,jadwal_tayang,musikal where faktur.id_jenistiket=jenis_tiket.id_jenistiket and musikal.id_musikal=jadwal_tayang.id_musikal and faktur.id_jadwaltayang=jadwal_tayang.id_jadwaltayang and musikal.id_musikal='$musikal' and
			
			faktur.tanggal_pesan BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY jenis_tiket";
	 
	$url_cetak = "cetaklaporan.php?tgl_awal=$tgl_awal&tgl_akhir=$tgl_akhir";
    $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;

			?>


<hr />
       
        <div class="table-responsive" style="margin-top: 10px;"> <?php echo $label; ?><br><?php echo @$labelstatus; ?>
            <table class="table table-bordered">
                <thead>
					

	<tr>
			<th>No</th>
			<th>Nama Musikal</th>
			<th>Jenis Tiket</th>
			<th>Harga</th>
			<th align="right">Jumlah</th>
			<th>Total</th>
		
		</tr>
	</thead>
	<tbody>
		<?php $no=0; 
		$sql = mysqli_query($konek, $ambil); // 
                    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                        while($pecah = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                            
							$no++;
								$total=$pecah['jumlah'];
								$harga=$pecah['harga_tiket'];
								$totaljumlah=$total*$harga;
	//$total=$pecah['total'];
	//$bayar=$total-($total*($diskon/100));
								@$totals += $total;	
								@$total2 +=$totaljumlah;
								
							?>
		<tr>
		  <td><?php echo $no; ?></td>
		  <td><?php echo $pecah['nama_musikal']; ?></td>
		  <td><?php echo $pecah['jenis_tiket']; ?></td>
		  <td><?php echo number_format($pecah['harga_tiket']); ?></td>
		  <td align="left"><?php echo $pecah['jumlah']; ?> kursi</td>
		  <td>
		  	<?php echo number_format($totaljumlah); ?>

		  </td>
		</tr>
	
	<?php
		   }
				?>			<tr>
		<td colspan="2" >Total </td>
		<td align="left"><B><?php echo number_format($totals); ?> Kursi</B></td>
		<td colspan="2"></td>
		<td><b><?php echo number_format($total2); ?></b></td>
		</tr> <?php
                    }else{ // Jika data tidak ada
                        echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
                    }
                    ?>
	</tbody>
</table>
