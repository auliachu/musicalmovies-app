<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pilih Kursi</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
	
	
		 <?php include "koneksi.php";
		$id_jenistiket=$_POST['id_jenistiket'];
		
		$kursi=mysqli_query($konek,"SELECT * From jenis_tiket,kursi where jenis_tiket.id_jenistiket=kursi.id_jenistiket and
		jenis_tiket.id_jenistiket='$id_jenistiket'");
		$no=0;
		while($pecah=mysqli_fetch_array($kursi)) { 
			$no++;
		?>
 
	
	</div>


	<?php echo "<a href='simpankursi.php'><input type=checkbox name=id_kursi[] value='$pecah[no_kursi]'><input type='button' value='$pecah[no_kursi]' name='simpankursi' class='btn btn-success'></a>"; ?>
	<?php } ?>

</body>
</html>