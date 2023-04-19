<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Musikal Reservation</title>
</head>

<body>
	<?php
	$server="localhost";
    $username="root";
    $password="";
    $database="musikal_reservation";
$konek=mysqli_connect($server,$username,$password,$database);
    if(mysqli_connect_errno()) {
        echo "GAGAL KONEKSI DATABASE";
    }
    
	?>
</body>
</html>