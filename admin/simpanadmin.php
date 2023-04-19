<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Simpan Admin</title>
</head>

<body>
	 <?php 
	  include "../pages/koneksi.php";
	    $query = "SELECT max(id_admin) AS no_admin FROM admin";
          $hasil = mysqli_query($konek,$query);
          $data  = mysqli_fetch_array($hasil);
          $no_admin = $data['no_admin'];
          $noUrut = (int) substr($no_admin, 2, 2);
          $noUrut++;
          $char = "A"; 
          $id_admin= $char . sprintf("%03s", $noUrut);
	 
    $nama= $_POST['nama_admin'];
	$user=$_POST['username'];
	$pass=$_POST['pass'];

		
	
	$simpanuser=mysqli_query($konek,"INSERT INTO admin VALUES ('$id_admin','$nama','$user','$pass')");

	 echo "<script>alert('Pendaftaran Telah Berhasil');</script>";
	 echo "<script>location='dashboard.php?halaman=admin';</script>";

?>
		  
</body>
</html>