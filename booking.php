<?php 
session_start();

$id_musikal= $_GET['id'];

if (isset($_SESSION['keranjang']['$id_musikal']))
{
	$_SESSION['keranjang'][$id_musikal]+=1;
}
else 
{
	$_SESSION['keranjang'][$id_musikal] = 1;
}


echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<script>alert ('produk telah masuk ke keranjang belanja'); </script>";
echo "<script>location='pages/keranjang.php' ;</script>"; 
?>