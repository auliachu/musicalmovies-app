<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
		<?php
	include "../pages/koneksi.php";
	$id='$_GET[id_kursi]';
	
	$updatekursi=mysqli_query($konek,"update kursi set status ='Tersedia' where id_kursi='$_GET[id]'");
		echo "<script>alert('Status Diubah');history.go(-1);</script>";
	?>
</body>
</html>