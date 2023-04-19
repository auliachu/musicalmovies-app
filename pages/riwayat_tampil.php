<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
					echo "<script>alert('Anda Belum Login.!'); window.location = 'keranjang.php'</script>"; }
				else {
	
		
include "koneksi.php";
unset($item)

?>
<h2>Riwayat Pemesanan :<b> <?php echo $_SESSION['namalengkap']; ?></b></h2	>
  
  <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
	 
			  
    <tr>
      <th>No.</th>
      <th>Tanggal </th>
      <th>Status</th>
      <th>Total
      <th>Opsi</th>
    </tr>
	  	   <?php
			  
			   $ambil= mysqli_query($konek,"SELECT * FROM faktur,customer,diskon,jadwal_tayang,status_pembayaran WHERE 
			   faktur.id_customer=customer.id_customer and
			   faktur.id_diskon=diskon.id_diskon and
			   faktur.id_statuspembayaran=status_pembayaran.id_statuspembayaran and
			   jadwal_tayang.id_jadwaltayang=faktur.id_jadwaltayang and
			   faktur.id_customer= '$_SESSION[idcustomer]'"); 
	$no=0;
			   while($data= mysqli_fetch_array($ambil)){	
				   $no++;
			  	$namacustomer=$data['Nama_customer'];
			  	$email=$data['Email'];
			  	$telpon=$data['No_hp'];
			  	$namadiskon=$data['nama_diskon'];
			  	$diskon=$data['besar_diskon'];
				   $status=$data['status_pembayaran'];
			
	if($status=="Menunggu") {
		$statust="<font color=red>$status</font>"; }
	else {
		$statust="<font color=blue>$status</font>"; }
				   
				   
				  $idfaktur=$data['id_faktur'];
				   $total=$data['total'];
	  
			  			$bayar=($total-($diskon/100)*$total);	
				
				
			  ?>
    <tr>
		<?php
				
				
				?>
      <td><?php echo $no; ?></td>
      <td><?php echo $data['tanggal_pesan']; ?></td>
      <td><?php echo "$statust"; ?></td>
      <td><b><?php echo number_format($bayar); ?></b></td>
		
      <td><a href="?page=nota&id_faktur=<?php echo $idfaktur; ?>" class="btn btn-primary">Nota </a> 
		  <?php 
				   if($status=="Menunggu"){
					   	   
						  
		  echo "<a href=?page=pembayaran&id_faktur=$idfaktur  class='btn btn-success'>Pembayaran </a>";
				   }
				   else {
					   echo "<a href=''  class='btn btn-secondary'>Pembayaran </a>";
				   }
				   
				   if($status=="Lunas"){
					   echo " <a href=riwayat.php?page=cetak&id_faktur=$idfaktur class='btn btn-warning'>Cetak Tiket</a>"; }
				   else {
					   
				   }
				   
				   
				   ?>
					   </td>
    </tr>
	  <?php } ?>
  </tbody>
</table>
<?php } ?>

