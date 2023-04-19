<?php
include "koneksi.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pembayaran</title>
</head>

<body>
	<h1>Konfirmasi Pembayaran</h1>
	<form id="form1" method="post" name="form1" action="aksipembayaran.php" enctype="multipart/form-data">
<table width="500px" border="0" cellspacing="2" cellpadding="2">
  <tbody>
	   <?php
			  
			   $ambil= mysqli_query($konek,"SELECT * FROM faktur,status_pembayaran where faktur.id_statuspembayaran=status_pembayaran.id_statuspembayaran and
		faktur.id_faktur= '$_GET[id_faktur]'"); 
			   $data= mysqli_fetch_array($ambil);
	  
	  		$idfaktur=$data['id_faktur'];
	  		$status=$data['status_pembayaran'];
			  
			  	
				
				
				
			  ?>
			  
  
    <tr>
      <td width="20%">ID Faktur Pemesanan</td>
      <td>: <?php echo $idfaktur; ?><input type="hidden" name="id_faktur" value="<?php echo $data['id_faktur']; ?>"></td>
	  </tr>
	  <td width="20%">Status Pembayaran</td>
      <td>: <?php echo $status; ?><input type="hidden" name="id_statuspembayaran" value="<?php echo $data['id_statuspembayaran']; ?>"></td>
	  </tr>
	   <tr>
      <td>Metode Pembayaran</td>
      <td valign="middle">
		   
		   <select name="id_sistempembayaran" required="" data-parsley-error-message="field ini harus diisi">
      <option value="">-- Pilih SistemPembayaran -- </option>
			   
      <?php 
			   
			   $ambil2=mysqli_query($konek,"SELECT * FROM sistem_pembayaran");
					while ($pecah3=mysqli_fetch_array($ambil2)) { ?>
      <option value="<?php echo $pecah3['id_sistempembayaran']; ?>"> <?php echo $pecah3['sistem_pembayaran']; ?></option>
      <?php } ?>
    </select>
		   
		   </td>
		
    </tr>
    <tr>
      <td>Bukti Pembayaran</td>
      <td valign="middle"><input type="file" class="form-control" name="foto"></td>
		
    </tr>
	  <tr>
		  <td><input type="submit" name="simpan" value="Konfirmasi" class="btn btn-success"></td>
		  <td></td>
	  </tr>
   
  </tbody>
</table>
</form>
<a href="riwayat.php" class="btn btn-success">Back</a>
</body>
</html>