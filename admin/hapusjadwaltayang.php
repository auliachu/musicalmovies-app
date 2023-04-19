<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<?php 
$ambil = $koneksi->query("SELECT * FROM jadwal_tayang WHERE id_jadwaltayang='$_GET[id]'");
$pecah= $ambil->fetch_assoc();

$koneksi->query("DELETE FROM jadwal_tayang WHERE id_jadwaltayang='$_GET[id]'");

echo "<script>alert('jadwaltayang terhapus');</script>";
echo "<script>location='dashboard.php?halaman=jadwaltayang';</script>";


?>