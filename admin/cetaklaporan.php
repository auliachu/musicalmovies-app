<link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  
	  
<link href="assets/css/jquery.dataTables.css" rel="stylesheet" media="screen">
	<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet" media="screen">
	     <link href="assets/css/bootstrap.min.css" rel="stylesheet">
 <link href="assets/css/bootstrap-datepicker.min.css" rel="stylesheet">
<?php
include "../pages/koneksi.php";
?>

<h2>Laporan Pemesanan Tiket<br>
</h2>

<?php
 @$tgl_awal = $_GET['tgl_awal']; 
 @$tgl_akhir = $_GET['tgl_akhir']; 
 @$status=$_GET['status'];
        if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            // Buat query untuk menampilkan semua data transaksi
            $ambil= "SELECT * FROM customer,jadwal_tayang,status_pembayaran,faktur,jenis_tiket,diskon WHERE 
				customer.id_customer=faktur.id_customer
			AND
				jadwal_tayang.id_jadwaltayang=faktur.id_jadwaltayang
			AND 
				faktur.id_jenistiket=jenis_tiket.id_jenistiket
			and
				faktur.id_diskon=diskon.id_diskon
			AND 
				status_pembayaran.id_statuspembayaran=faktur.id_statuspembayaran";
            $url_cetak = "print.php";
            $label = "Semua Data Transaksi";
			 }elseif(!empty($status)){ // Jika terisi
            // Buat query untuk menampilkan data transaksi sesuai periode tanggal
            $ambil= "SELECT * FROM customer,jadwal_tayang,status_pembayaran,faktur,jenis_tiket,diskon WHERE 
				customer.id_customer=faktur.id_customer
			AND
				jadwal_tayang.id_jadwaltayang=faktur.id_jadwaltayang
			AND 
				faktur.id_jenistiket=jenis_tiket.id_jenistiket
			and
				faktur.id_diskon=diskon.id_diskon
				and status_pembayaran.status_pembayaran='$status' 
			AND 
		status_pembayaran.id_statuspembayaran=faktur.id_statuspembayaran  AND
		(faktur.tanggal_pesan BETWEEN '$tgl_awal' AND '$tgl_akhir'";
									
									
            
          //  $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); 
			
         //   $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
			
			 $url_cetak = "cetaklaporan.php?tgl_awal=$tgl_awal&tgl_akhir=$tgl_akhir";
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
			$label="Status Pembayaran : $status";
			
        }else{ // Jika terisi
            // Buat query untuk menampilkan data transaksi sesuai periode tanggal
            $ambil= "SELECT * FROM customer,jadwal_tayang,status_pembayaran,faktur,jenis_tiket,diskon WHERE 
				customer.id_customer=faktur.id_customer
			AND
				jadwal_tayang.id_jadwaltayang=faktur.id_jadwaltayang
			AND 
				faktur.id_jenistiket=jenis_tiket.id_jenistiket
			and
				faktur.id_diskon=diskon.id_diskon
			AND 
		status_pembayaran.id_statuspembayaran=faktur.id_statuspembayaran  AND
		
		
			
		faktur.tanggal_pesan  BETWEEN '$tgl_awal' AND '$tgl_akhir'";
									
									
            
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); 
			
           $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir));
			
			
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
			}
			?>


<hr />
       
        <div class="table table-bordered"> <?php echo $label; ?>
            <table class="table table-bordered">
                <thead>
					

	<tr>
			<th>no</th>
			<th>ID Faktur</th>
			<th>Nama Customer</th>
			<th>Tanggal Pesan</th>
			<th>Status</th>
			
			<th align="right">Total</th>
		
		</tr>
	</thead>
	<tbody>
		<?php $no=0; 
		$sql = mysqli_query($konek, $ambil);  
                    $row = mysqli_num_rows($sql); 
                    if($row > 0){ 
                        while($pecah = mysqli_fetch_array($sql)){ 
                            $no++;
								$diskon=$pecah['besar_diskon'];
	$total=$pecah['total'];
	$bayar=$total-($total*($diskon/100));
							@$totals +=$bayar;
							?>
		<tr>
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
			 <script>
 window.print();
 </script>
