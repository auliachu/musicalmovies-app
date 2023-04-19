<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<?php 
$ambil = $koneksi->query("SELECT * FROM slot_waktu WHERE id_slot_waktu='$_GET[id]'");
$pecah= $ambil->fetch_assoc();

$koneksi->query("DELETE FROM slot_waktu WHERE id_slot_waktu='$_GET[id]'");

echo "<script>alert('Data terhapus');</script>";
echo "<script>location='dashboard.php?halaman=slotwaktu';</script>";


?>