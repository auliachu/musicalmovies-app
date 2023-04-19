<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<?php 
$ambil = $koneksi->query("SELECT * FROM faktur WHERE id_faktur='$_GET[idfaktur]'");
$pecah= $ambil->fetch_assoc();

$koneksi->query("DELETE FROM faktur WHERE id_faktur='$_GET[idfaktur]'");

echo "<script>alert('Data Faktur Telah terhapus');</script>";
echo "<script>location='dashboard.php?halaman=faktur';</script>";


?>