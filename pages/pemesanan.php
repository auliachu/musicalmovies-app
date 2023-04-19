<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	  <h1>Data Pemesanan</h1>
    <hr>
	    <table class="table table-striped">
  <thead>
    <tr>
     
      <th>ID Tayang</th>
      <th>Nama Musikal</th>
      <th>Jenis Tiket</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th>Total</th>
      <th>Pilihan</th>
    </tr>
  </thead>
  <tbody>
	 
	   
                     
    <?php 
	  $total = 0;
	    if (isset($_GET['act']))  {
             $act = $_GET['act'];
			 
			
               if ($act == "add") {
			if (isset($_GET['id_jadwaltayang'])) {
                $id_jadwaltayang = $_GET['id_jadwaltayang'];
				
			  if (isset($_SESSION['items'][$id_jadwaltayang])) {
                    $_SESSION['items'][$id_jadwaltayang] = 1;
                } else {
                    $_SESSION['items'][$id_jadwaltayang] = +1; 
                }
				   
			}
			   }
		elseif ($act == "plus") {
            if (isset($_GET['id_jadwaltayang'])) {
                $id_jadwaltayang = $_GET['id_jadwaltayang'];
                if (isset($_SESSION['items'][$id_jadwaltayang])) {
                    $_SESSION['items'][$id_jadwaltayang] += 1;
                }
            }
				   }
				   
			elseif ($act == "del") {
            if (isset($_GET['id_jadwaltayang'])) {
                $id_jadwaltayang = $_GET['id_jadwaltayang'];
                if (isset($_SESSION['items'][$id_jadwaltayang])) {
                    unset($_SESSION['items'][$id_jadwaltayang]);
                }
            }
        }
			
			
				
            
				
		
			
	 if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {
			
			$jenistiket = $_POST['id_jenistiket'];
			$jumlah=$_POST['jumlah'];
        $jadwal_tayang=$_GET['id_jadwaltayang'];
        $ambil= mysqli_query($konek,"SELECT * FROM musikal,jadwal_tayang,jenis_tiket WHERE 
        musikal.id_musikal=jadwal_tayang.id_musikal
        AND id_jenistiket='$jenistiket'
        AND id_jadwaltayang= '$key'"); ?>
    <?php $pecah= mysqli_fetch_array($ambil) ?> 
    <tr>
		
		<?php
			
			$harga=number_format($pecah['harga_tiket']);
			$jenis_tiket=$pecah['jenis_tiket'];
   		
			 $jumlah_harga = $pecah['harga_tiket'] * $jumlah;
           	$total += $jumlah_harga;		
			?>
      <td><?php echo $pecah['id_jadwaltayang']; ?></td>
      <td><?php echo $pecah['nama_musikal']; ?></td>
      <td><?php echo $jenis_tiket; ?></td>
      <td><?php echo $harga; ?></td>
       <td><?php echo $jumlah; ?></td>
      <td><?php echo number_format($jumlah_harga); ?></td>
		<td> 
			<a href="keranjang.php?act=del&id_jadwaltayang=<?php echo $key; ?>"  class="btn btn-xs btn-danger">Hapus</a></td>
				   
		   </tr>
    <?php  //header ("location:" . $ref);
		} } }  ?>
 
<?php
	  
				if($total == 0){ ?>
		  <td colspan="7" align="center"><?php echo "Keranjang Kosong!"; ?></td>
				<?php } else { ?>
					
                        <td colspan="7" style="font-size: 18px;"><b><div class="pull-right">Total Keseluruhan : Rp. <?php echo number_format($total); ?>,- </div> </b></td>
					
			<?php	} ?>
  </tbody>
</table>
	   <h1>
	     <?php
		  
		 $tampil=mysqli_query($konek,"select * from customer where user=$_SESSION[namauser]");
		  $data=mysqli_fetch_array($tampil);
		  $id=$data['id_customer'];
		  $nama=$data['Nama_customer'];
		  $email=$data['Email'];
		  $tlp=$data['No_hp']
		  ?>
	  
	   <h1>Data Check Out</h1>
	   <table width="300" border="0" cellspacing="2" cellpadding="2">
	     <tbody>
	       <tr>
	         <td colspan="2"><strong>DATA CUSTOMER</strong></td>
            </tr>
	       <tr>
	         <td width="26%">ID Customer</td>
	         <td width="74%"><?php echo $id; ?></td>
            </tr>
	       <tr>
	         <td>Nama Customer</td>
	         <td><?php echo $nama; ?></td>
            </tr>
	       <tr>
	         <td>Email</td>
	         <td><?php echo $email; ?></td>
            </tr>
	       <tr>
	         <td>Telpon</td>
	         <td><?php echo $tlp; ?></td>
            </tr>
	       <tr>
	         <td colspan="2"><strong>DATA PEMBAYARAN</strong></td>
            </tr>
	       <tr>
	         <td>Sistem Pembayaran</td>
	         <td><select name="id_sistempembayaran" class="form-control">
	             <option value="">-- Pilih Sistem Pembayaran -- </option>
	             <?php $ambil2=mysqli_query($konek,"SELECT * FROM sistem_pembayaran");
					while ($pecah2=$ambil2->fetch_assoc()) { ?>
	             <option value="<?php echo $pecah2['id_sistempembayaran']; ?>"> <?php echo $pecah2['sistem_pembayaran']; ?></option>
	             <?php } ?>
              </select></td>
            </tr>
	       <tr>
	         <td>Diskon</td>
	         <td><select name="id_diskon" class="form-control">
	           <option value="">-- Pilih Diskon -- </option>
	           <?php $ambil2=mysqli_query($konek,"SELECT * FROM diskon");
					while ($pecah2=$ambil2->fetch_assoc()) { ?>
	           <option value="<?php echo $pecah2['id_diskon']; ?>"> <?php echo $pecah2['nama_diskon']; ?></option>
	           <?php } ?>
	           </select></td>
           </tr>
	       <tr>
	         <td>Bukti Transfer</td>
	         <Td>
             <input type="file" name="foto" id="foto"></td>
           </tr>
          </tbody>
    </table>
	   <p><a href="../index.php" class="btn btn-warning">Back</a>
	     <a href="checkout.php" class="btn btn-success">FINISH</a></p>
  
</section>

</body>
</html>