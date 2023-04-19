
<?php
include "../pages/koneksi.php";
 @$tgl_awal = $_POST['tgl_awal']; 
 @$tgl_akhir = $_POST['tgl_akhir']; 
 @$status=$_POST['status'];
?>

<h2>Laporan Musikal Terlaris<br>
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
		
  </div>
            <button type="submit" name="filter" value="true" class="btn btn-primary">Lihat Laporan</button> 
         
              <?php
            if(isset($_POST['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                echo '<a href="dashboard.php?halaman=laporanmusikal" class="btn btn-success">Refresh</a>';
            ?>
        </form>
            
        </form>

<?php

        if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            // Buat query untuk menampilkan semua data transaksi
            $ambil= "SELECT faktur.id_jadwaltayang,musikal.nama_musikal,musikal.id_musikal,  COUNT(id_jadwaltayang) as jumlah  FROM faktur, musikal where faktur.id_musikal=musikal.id_musikal  GROUP BY id_jadwaltayang asc";
            $url_cetak = "cetaklaporan.php";
            $label = "Semua Data Transaksi";
        }
else {
	  // Buat query untuk menampilkan semua data transaksi
            $ambil= "SELECT faktur.id_jadwaltayang,musikal.nama_musikal,musikal.id_musikal,  COUNT(id_jadwaltayang) as jumlah  FROM faktur, musikal where faktur.id_musikal=musikal.id_musikal and faktur.tanggal_pesan BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY id_jadwaltayang";
	 
	$url_cetak = "cetaklaporan.php?tgl_awal=$tgl_awal&tgl_akhir=$tgl_akhir";
    $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
}
			?>


<hr />
       
        <div class="table-responsive" style="margin-top: 10px;"> <?php echo $label; ?><br><?php echo @$labelstatus; ?>
            <table class="table table-bordered">
                <thead>
					

	<tr>
			<th>no</th>
			<th>ID Musikal</th>
			<th>Nama Musikal</th>
			<th align="right">Jumlah</th>
		
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
	//$total=$pecah['total'];
	//$bayar=$total-($total*($diskon/100));
								@$totals += $total;	
							?>
		<tr>
		  <td><?php echo $no; ?></td>
		  <td><?php echo $pecah['id_musikal']; ?></td>
		  <td><?php echo $pecah['nama_musikal']; ?></td>
		  <td align="left"><?php echo $pecah['jumlah']; ?> Pesanan </td>
		</tr>
	
	<?php
		   }
				?>			<tr>
		<td colspan="3" >Total </td>
			<td align="left"><B><?php echo number_format($totals); ?> Pesanan</B></td>
		</tr> <?php
                    }else{ // Jika data tidak ada
                        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                    }
                    ?>
	</tbody>
</table>
