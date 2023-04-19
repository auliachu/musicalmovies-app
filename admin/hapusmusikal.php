<?php
$koneksi = new mysqli("localhost","root","","musikal_reservation");
?>

<?php 
$ambil = $koneksi->query("SELECT * FROM musikal WHERE id_musikal='$_GET[id]'");
$pecah= $ambil->fetch_assoc();
$foto_produk = $pecah['Foto'];
if (file_exists("../foto_produk/$foto_produk"))
{
	unlink("../foto_produk/$foto_produk");
}

$koneksi->query("DELETE FROM musikal WHERE id_musikal='$_GET[id]'");

echo "<script>alert('musikal terhapus');</script>";
echo "<script>location='dashboard.php?halaman=musikal';</script>";


?>