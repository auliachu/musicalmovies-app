<?php

   if (!isset($_SESSION)) {
    }

include "koneksi.php";



//Nampilkan ID Tayang
$id_faktur=$_POST['id_faktur'];
$id_statuspembayaran=$_POST['id_statuspembayaran'];
$id_sistempembayaran=$_POST['id_sistempembayaran'];
//UPLOAD FOTO
	$nama= $_FILES['foto']['name'];
	$lokasi= $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_pembayaran/".$nama);

//update dalam tabel faktur
$updatefaktur=mysqli_query($konek,"update faktur set id_sistempembayaran ='$id_sistempembayaran' where id_faktur='$id_faktur'");


//update status pembayaran
$updatestatuspembayaran=mysqli_query($konek,"update status_pembayaran set status_pembayaran='Sudah Dibayar',foto='$nama'  where id_statuspembayaran='$id_statuspembayaran'");

echo "<script>alert('Berhasil Konfirmasi Pembayaran'); window.location = 'riwayat.php'</script>";

	

?>