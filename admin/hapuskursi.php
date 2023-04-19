<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<?php 
$ambil = $koneksi->query("SELECT * FROM kursi WHERE id_kursi='$_GET[id]'");
$pecah= $ambil->fetch_assoc();

$koneksi->query("DELETE FROM kursi WHERE id_kursi='$_GET[id]'");

echo "<script>alert('Data terhapus');</script>";
echo "<script>location='dashboard.php?halaman=kursi';</script>";


?>