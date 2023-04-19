<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<?php 
$ambil = $koneksi->query("SELECT * FROM jenis_tiket WHERE id_jenistiket='$_GET[id]'");
$pecah= $ambil->fetch_assoc();

$koneksi->query("DELETE FROM jenis_tiket WHERE id_jenistiket='$_GET[id]'");

echo "<script>alert('Data terhapus');</script>";
echo "<script>location='dashboard.php?halaman=jenistiket';</script>";


?>