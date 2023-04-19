 <!DOCTYPE html>
<!--
Template Name: Foxclore
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Aulia's Musical | Pages | Detail Musical</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>

<?php
include "koneksi.php";
?>
<h1>Aulia'S Musical Reservation</h1>
	<center>
		<form id="form1" name="form1" method="post" action="cetaktiket2.php">
<table width="800" border="0" cellspacing="2" cellpadding="2">
		  <tbody>
			  <?php
			  
		    $ambil= mysqli_query($konek,"SELECT * FROM faktur,tiket,musikal,jadwal_tayang,jenis_tiket,kursi,diskon,customer,slot_waktu WHERE 
			   faktur.id_faktur=tiket.id_faktur and
			   faktur.id_customer=customer.id_customer and
			   faktur.id_diskon=diskon.id_diskon and
        faktur.id_jadwaltayang=jadwal_tayang.id_jadwaltayang and
		 musikal.id_musikal=jadwal_tayang.id_musikal
         AND jenis_tiket.id_jenistiket=kursi.id_jenistiket and
		 faktur.id_jenistiket=jenis_tiket.id_jenistiket and
		 jadwal_tayang.id_slot_waktu=slot_waktu.id_slot_waktu and
		faktur.id_customer= '$_SESSION[idcustomer]' and
		faktur.id_faktur= '$_GET[id_faktur]'"); 
			   $data= mysqli_fetch_array($ambil);
	 			$idtiket=$data['id_tiket'];
				$musikal=$data['nama_musikal'];
			  	$tglshow=$data['tanggal_show'];
			  	$kursi=$data['no_kursitiket'];
			  	$waktushow=$data['slot_waktu'];
			  	$jenistiket=$data['jenis_tiket'];
			  	$namacustomer=$data['Nama_customer'];
			  	$email=$data['Email'];
			  	$telpon=$data['No_hp'];
			  	$namadiskon=$data['nama_diskon'];
			  	$diskon=$data['besar_diskon'];
	 			$jumlah=$data['jumlah_tiket'];
	 			$total=$data['total'];
			  
			  	
			  ?>
			  
			  
		    <tr>
		      <td colspan="4" align="center"><h3><strong>:: Rincian Pemesanan Tiket</strong> ::</h3></td>
	        </tr>
		    <tr>
		      <td>ID Tiket</td>
		      <td>: <?php echo $idtiket; ?><input type="hidden" name="id_faktur" value="<?php echo $data['id_faktur']; ?>"></td>
		      <td>Jenis Tiket</td>
		      <td>: <?php echo $jenistiket; ?> </td>
	        </tr>
		    <tr>
		      <td width="152">Nama Musikal</td>
		      <td width="202">: <?php echo $musikal; ?></td>
		      <td width="152">Nomor Kursi</td>
		      <td width="268">: <?php echo $kursi; ?></td>
	        </tr>
		    <tr>
		      <td>Tanggal Show</td>
		      <td>: <?php echo $tglshow; ?></td>
		      <td>Jumlah Kursi</td>
		      <td>: <?php echo $jumlah; ?></td>
	        </tr>
		    <tr>
		      <td>Waktu Show</td>
		      <td>: <?php echo $waktushow; ?> WIB</td>
		      <td>Total</td>
		      <td>: <?php echo number_format($total); ?></td>
	        </tr>
		    <tr>
		      <td colspan="2" align="right">Nama Customer:</td>
		      <td colspan="2"><?php echo $namacustomer; ?></td>
	        </tr>
		    <tr>
		      <td colspan="2" align="right">Email:</td>
		      <td colspan="2"><?php echo $email; ?></td>
	        </tr>
		    <tr>
		      <td colspan="2" align="right">Telepon:</td>
		      <td colspan="2"><?php echo $telpon; ?></td>
	        </tr>
		    <tr>
		      <td colspan="2" align="right">Diskon:</td>
		      <td colspan="2"><?php echo $namadiskon; ?>-> <?php echo $diskon; ?>%</td>
	        </tr>
		    <tr>
		      <td colspan="2" align="right">Total Pembayaran:</td>
				<?php
				$bayar=($total-($diskon/100)*$total);
				
				?>
				<td colspan="2"><b><?php echo number_format($bayar); ?></b></td>
	        </tr>
		    <tr>
		      <td colspan="2" align="right">Status Pembayaran:</td>
		      <td colspan="2">BERHASIL</td>
	        </tr>
	      </tbody>
	  </table>
<p align="center">Terima kasih telah memesan tiket Aulia's Musikal Reservation<Br>Harap dibawa saat pertunjukan..</p>
</center>
 <input type="submit" class="btn btn-warning" name="cetak" value="Print">
		 <A href="riwayat.php" class="btn btn-success">Back</A>
		</form>
	</body>
	</html>
