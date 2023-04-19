<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
		<?php
	include "../pages/koneksi.php";
	$id='$_GET[id]';
	
	$updateketerangan=mysqli_query($konek,"update jadwal_tayang set keterangan ='Kadaluarsa' where id_jadwaltayang='$_GET[id]'");
		echo "<script>alert('Keterangan Diubah');history.go(-1);</script>";
	?>
</body>
</html>