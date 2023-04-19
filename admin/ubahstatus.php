<?php

   if (!isset($_SESSION)) {
    }

include "../pages/koneksi.php";



//Nampilkan ID Tayang

$id_statuspembayaran=$_POST['id_statuspembayaran'];
$status=$_POST['status'];



//update status pembayaran
$updatestatuspembayaran=mysqli_query($konek,"update status_pembayaran set status_pembayaran='$status'  where id_statuspembayaran='$id_statuspembayaran'");

echo "<script>alert('Berhasil Ubah Status Pembayaran'); window.location = '?halaman=faktur'</script>";

	

?>