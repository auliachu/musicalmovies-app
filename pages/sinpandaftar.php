<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	 <?php 
	  include "koneksi.php";
	    $query = "SELECT max(id_customer) AS no_customer FROM customer";
          $hasil = mysqli_query($konek,$query);
          $data  = mysqli_fetch_array($hasil);
          $no_customer = $data['no_customer'];
          $noUrut = (int) substr($no_customer, 2, 2);
          $noUrut++;
          $char = "C"; 
          $id_customer= $char . sprintf("%03s", $noUrut);
	 

	$nama=$_POST['Nama_customer'];
	$hp=$_POST['No_hp'];
	$email=$_POST['Email'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];

		
	
	$simpanuser=mysqli_query($konek,"INSERT INTO customer VALUES ('$id_customer','$nama','$hp','$email','$user','$pass')");

	 echo "<script>alert('Pendaftaran Telah Berhasil'); window.location = 'keranjang.php'</script>";

?>
		  
</body>
</html>