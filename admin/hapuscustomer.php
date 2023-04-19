<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<?php 
$ambil = $koneksi->query("SELECT * FROM customer WHERE id_customer='$_GET[id]'");
$pecah= $ambil->fetch_assoc();

$koneksi->query("DELETE FROM customer WHERE id_customer='$_GET[id]'");

echo "<script>alert('Data terhapus');</script>";
echo "<script>location='dashboard.php?halaman=customer';</script>";


?>