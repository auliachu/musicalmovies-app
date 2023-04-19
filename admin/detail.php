<?php
include "../pages/koneksi.php";
?>

<h2>Detail Pemesanan</h2>
<form name="form1" method="post" action="?halaman=ubahstatus">
<table width="100%" border="0" cellspacing="2" cellpadding="2" class="table table-condensed">
  <tbody>
<?php
			  
			    $ambil= mysqli_query($konek,"SELECT * FROM faktur,tiket,musikal,jadwal_tayang,jenis_tiket,kursi,diskon,customer,slot_waktu,status_pembayaran WHERE 
			   faktur.id_faktur=tiket.id_faktur and
			   faktur.id_customer=customer.id_customer and
			   faktur.id_diskon=diskon.id_diskon and
        faktur.id_jadwaltayang=jadwal_tayang.id_jadwaltayang and
		 musikal.id_musikal=jadwal_tayang.id_musikal
         AND jenis_tiket.id_jenistiket=kursi.id_jenistiket and
		 faktur.id_statuspembayaran=status_pembayaran.id_statuspembayaran and
		faktur.id_jenistiket=jenis_tiket.id_jenistiket and
		 jadwal_tayang.id_slot_waktu=slot_waktu.id_slot_waktu and
		faktur.id_faktur= '$_GET[idfaktur]'"); 
			   $data= mysqli_fetch_array($ambil);
	  
	  			$idjadwaltayang=$data['id_jadwaltayang'];
				$musikal=$data['nama_musikal'];
			  	$tglshow=$data['tanggal_pesan'];
			  	$kursi=$data['no_kursitiket'];
			  	$waktushow=$data['slot_waktu'];
			  	$jenistiket=$data['jenis_tiket'];
			  	$namacustomer=$data['Nama_customer'];
			  	$email=$data['Email'];
			  	$telpon=$data['No_hp'];
			  	$namadiskon=$data['nama_diskon'];
			  	$diskon=$data['besar_diskon'];
			  	$hargat=$data['harga_tiket'];
				$idfaktur=$data['id_faktur'];
	  			$total=$data['total'];
	  			$jumlah=$data['jumlah_tiket'];	
	  $id_statuspembayaran=$data['id_statuspembayaran'];
	  $gambar=$data['foto'];
	  if($gambar==''){
		  $foto="<img src=../foto_pembayaran/belumbayar.jfif width=150 height=150>";
	  } else {
		  
		  $foto="<img src=../foto_pembayaran/$gambar width=150 height=150>";
	  }
			  ?>


 <tr>
		<td colspan="2"><h3> Customer</h3></td>
		<td colspan="2"><h3> Faktur</h3></td>
    </tr>
    <tr>
      <td width="14%">Nama Customer</td>
      <td width="31%">: <?php echo $namacustomer; ?></td>
	  <td width="12%">No. Faktur</td>
		<td width="43%">: <?php echo $idfaktur; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td>: <?php echo $email; ?></td>
		 <td>Tanggal Pesan</td>
		<td>: <?php echo $data['tanggal_pesan']; ?></td>
    </tr>
    <tr>
      <td>Telpon</td>
      <td>: <?php echo $telpon; ?></td>
		<td>Jam Pesan</td>
		<td>: <?php echo $data['jam_pesan']; ?></td>
    </tr>
	  
    <tr>
      <td>Bukti Pembayaran </td>
      <td><?php echo $foto; ?> 
			  </td>
		<td>Ubah Status</td>
      <td><input type="hidden" name="id_statuspembayaran" value="<?php echo $id_statuspembayaran; ?>"><select name="status" class="form-control" required="" data-parsley-error-message="field ini harus diisi">
      <option value="">-- Pilih Status Pemesanan -- </option>
			   
      <option value="Lunas"> Lunas</option>
      <option value="Batal"> Batal</option>
		
         </select><Br><input type="submit" class="btn btn-success" value="Konfirmasi"></td>
    </tr>
  </tbody>
</table>
	</form>
<table width="100%" border="0" cellspacing="2" cellpadding="2" class="table table-striped">
  <tbody>
	 
			  
    <tr>
      <th>ID Jadwal Tayang</th>
      <th>Nama Musikal</th>
      <th>Jenis Tiket</th>
      <th>No. Kursi </td>
      <th>Jumlah</th>
      <th>Harga</th>
      <th>Diskon</th>
      <th>Total</th>
    </tr>
    <tr>
		<?php
				$bayar=($total-($diskon/100)*$total);
				
				?>
      <td><?php echo $idjadwaltayang; ?></td>
      <td><?php echo $musikal; ?></td>
      <td><?php echo $jenistiket; ?></td>
      <td><?php echo $kursi; ?></td>
      <td><?php echo $jumlah; ?> Kursi</td>
      <td><?php echo number_format($hargat); ?></td>
      <td><?php echo $namadiskon; ?>-> <?php echo $diskon; ?>%</td>
      <td><b><?php echo number_format($bayar); ?></b></td>
    </tr>
  </tbody>
</table>
<a href="?halaman=faktur" class="btn btn-success">Back</a>
<a href="cetaktiket.php?id_faktur=<?php echo $idfaktur; ?>" class="btn btn-primary">Cetak</a>











