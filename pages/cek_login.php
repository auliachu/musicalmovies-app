<?php
session_start();
include "koneksi.php";
@$user = $_POST['user'];
@$pass     = $_POST['pass'];

$login=mysqli_query($konek,"SELECT * FROM customer WHERE user='$user' AND pass='$pass'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);
if ($ketemu > 0){
 
  $_SESSION['namauser']    	 = $r['user'];
  $_SESSION['emailuser']    	 = $r['Email'];
  $_SESSION['namalengkap'] 	 = $r['Nama_customer'];
  $_SESSION['namaemail']  	 = $r['Email'];
  $_SESSION['telepon']  	 = $r['No_hp'];
  $_SESSION['idcustomer']  	 = $r['id_customer'];
  $_SESSION['passuser']     	 = $r['pass'];
  echo "<script>alert('Selamat Datang $_SESSION[namalengkap]'); window.location = '../index.php'</script>";
  
}
else{
 echo "<script>alert('Login Gagal, username atau password anda salah'); window.location = 'keranjang.php'</script>";
}
//}
?>
