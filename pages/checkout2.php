<?php

   if (!isset($_SESSION)) {
    }

include "koneksi.php";

$tgl_pesan = date("Y-m-d");
$jam_pesan= date("H:i:s");



//mencari idfaktur
          $query = "SELECT max(id_faktur) AS no_faktur FROM faktur";
          $hasil = mysqli_query($konek,$query);
          $data  = mysqli_fetch_array($hasil);
          $nofaktur = $data['no_faktur'];
          $noUrut = (int) substr($nofaktur, 2, 3);
          $noUrut++;
          $char = "FK"; 
          $newID = $char . sprintf("%03s", $noUrut);

//mencari idtikdet
   $query2 = "SELECT max(id_tiket) AS no_tiket FROM tiket";
          $hasil2 = mysqli_query($konek,$query2);
          $data2  = mysqli_fetch_array($hasil2);
          $notiket = $data2['no_tiket'];
          $noUrut2 = (int) substr($notiket, 2, 3);
          $noUrut2++;
          $char2 = "TK"; 
          $idtiket = $char2 . sprintf("%03s", $noUrut2);

//ID Status pembayaran
   $query3 = "SELECT max(id_statuspembayaran) AS no_status FROM status_pembayaran";
          $hasil3 = mysqli_query($konek,$query3);
          $data3  = mysqli_fetch_array($hasil3);
          $nostatus = $data3['no_status'];
          $noUrut3 = (int) substr($nostatus, 2, 3);
          $noUrut3++;
          $char3 = "ST"; 
          $id_statuspembayaran = $char3 . sprintf("%03s", $noUrut3);


$id1 = mysqli_query($konek,"SELECT id_customer FROM customer WHERE user='$_SESSION[namauser]'");
$id  = mysqli_fetch_array($id1);
// mendapatkan nomor kustomer
$id_customer=$id['id_customer'];


//Nampilkan ID Tayang
 $id_jadwaltayang=$_POST['id_jadwal'];
$jumlah=$_POST['jumlah'];
$total=$_POST['total'];
$harga=$_POST['harga'];

$id_diskon=$_POST['id_diskon'];
$id_kursi=$_POST['id_kursi'];

//UPLOAD FOTO
	//$nama= $_FILES['foto']['name'];
	//$lokasi= $_FILES['foto']['tmp_name'];
	//move_uploaded_file($lokasi, "../foto_pembayaran/".$nama);

//simpan dalam tabel faktur
$simpanfaktur=mysqli_query($konek,"insert into faktur values('$newID','$id_customer','$id_jadwaltayang','$tgl_pesan','$jam_pesan','$jumlah','$total','','$id_statuspembayaran','$id_diskon')");
//simpan tabel tiket

$simpantiket=mysqli_query($konek,"insert into tiket values('$idtiket','$newID','$id_kursi')");

//simpan status pembayaran
//$simpanstatuspembayaran=mysqli_query($konek,"insert into status_pembayaran //values('$id_statuspembayaran','BERHASIL','$nama')");


	


?>
<h1>Data Pemesanan</h1>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
    <tr>
		<td colspan="2"><h2>Data Customer</h2></td>
    </tr>
    <tr>
      <td width="20%">Nama Customer</td>
      <td width="80%"><?php echo $namacustomer; ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $email; ?></td>
    </tr>
    <tr>
      <td>Telpon</td>
      <td><?php echo $telpon; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tbody>
	  <?php
			  
			   $ambil= mysqli_query($konek,"SELECT * FROM faktur,tiket,musikal,jadwal_tayang,jenis_tiket,kursi,diskon,customer,slot_waktu WHERE 
			   faktur.id_faktur=tiket.id_faktur and
			   faktur.id_customer=customer.id_customer and
			   faktur.id_diskon=diskon.id_diskon and
        faktur.id_jadwaltayang=jadwal_tayang.id_jadwaltayang and
		 musikal.id_musikal=jadwal_tayang.id_musikal
         AND jenis_tiket.id_jenistiket=kursi.id_jenistiket and
		 jadwal_tayang.id_slot_waktu=slot_waktu.id_slot_waktu and
		faktur.id_faktur= '$newID'"); 
			   $data= mysqli_fetch_array($ambil);
	  			$idjadwaltayang=$data['id_jadwaltayang'];
				$musikal=$data['nama_musikal'];
			  	$tglshow=$data['tanggal_show'];
			  	$kursi=$data['no_kursi'];
			  	$waktushow=$data['slot_waktu'];
			  	$jenistiket=$data['jenis_tiket'];
			  	$namacustomer=$data['Nama_customer'];
			  	$email=$data['Email'];
			  	$telpon=$data['No_hp'];
			  	$namadiskon=$data['nama_diskon'];
			  	$diskon=$data['besar_diskon'];
			  $hargat=$data['harga_tiket']
			  
			  	
			  ?>
			  
			  
    <tr>
      <th>ID Jadwal Tayang</th>
      <th>Nama Musikal</th>
      <th>Jenis Tiket</th>
      <th>Kursi </td>
      <th>Harga</th>
      <th>Diskon</th>
      <th>Jumlah</th>
      <th>Total</th>
    </tr>
    <tr>
      <td><?php echo $idjadwaltayang; ?></td>
      <td><?php echo $musikal; ?></td>
      <td><?php echo $jenistiket; ?></td>
      <td><?php echo $kursi; ?></td>
      <td><?php echo number_format($total); ?></td>
      <td><?php echo $namadiskon; ?>-> <?php echo $diskon; ?>%</td>
      <td><?php echo $jumlah; ?></td>
      <td><b><?php echo number_format($bayar); ?></b></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
	<center>
<table width="800" border="0" cellspacing="2" cellpadding="2">
		  <tbody>
			  
		    <tr>
		      <td colspan="4" align="center"><h3><strong>:: Rincian Pemesanan Tiket</strong> ::</h3></td>
	        </tr>
		    <tr>
		      <td>ID Tiket</td>
		      <td>: <?php echo $idtiket; ?></td>
		      <td>Jenis Tiket</td>
		      <td>:  </td>
	        </tr>
		    <tr>
		      <td width="152">Nama Musikal</td>
		      <td width="202">: </td>
		      <td width="152">Nomor Kursi</td>
		      <td width="268">: </td>
	        </tr>
		    <tr>
		      <td>Tanggal Show</td>
		      <td>: <?php echo $tglshow; ?></td>
		      <td>Jumlah Tiket</td>
		      <td>: </td>
	        </tr>
		    <tr>
		      <td>Waktu Show</td>
		      <td>: <?php echo $waktushow; ?> WIB</td>
		      <td>Total</td>
		      <td>: </td>
	        </tr>
		    <tr>
		      <td colspan="2" align="right">Nama Customer:</td>
		      <td colspan="2">&nbsp;</td>
	        </tr>
		    <tr>
		      <td colspan="2" align="right">Email:</td>
		      <td colspan="2">&nbsp;</td>
	        </tr>
		    <tr>
		      <td colspan="2" align="right">Telepon:</td>
		      <td colspan="2">&nbsp;</td>
	        </tr>
		    <tr>
		      <td colspan="2" align="right">Diskon:</td>
		      <td colspan="2">&nbsp;</td>
	        </tr>
		    <tr>
		      <td colspan="2" align="right">Total Pembayaran:</td>
				<?php
				$bayar=($total-($diskon/100)*$total);
				
				?>
				<td colspan="2">&nbsp;</td>
	        </tr>
	      </tbody>
	  </table>
</center>
