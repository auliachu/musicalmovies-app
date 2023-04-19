<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<?php 
$ambil = $koneksi->query("SELECT * FROM diskon WHERE id_diskon='$_GET[id]'");
$pecah= $ambil->fetch_assoc();

$koneksi->query("DELETE FROM diskon WHERE id_diskon='$_GET[id]'");

echo "<script>alert('Data terhapus');</script>";
echo "<script>location='dashboard.php?halaman=diskon';</script>";


?>