<?php
   session_start();
   if(isset($_SESSION['username'])) {
   header(''); }
   require_once("koneksi.php");
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOME DESH CINEMA</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
	<!-- loader -->
	<div class="bg-loader">
		<div class="loader"></div>
	</div>

	<!-- header -->

	</div>
	<header>
		<div class="container">
			<h1><a href="index.php">DESH CINEMA</a></h1>
			<ul>
				<li class="active"><a href="index.php">HOME</a></li>
				<li><a href="about.php">TENTANG FILM</a></li>
				<li><a href="login.php">LOGIN</a></li>
				<li><a href="contact.php">CONTACT</a></li>
			</ul>
		</div>
	</header>

	<!-- banner -->
	<section class="banner">
		<h2>HALLO ! Untuk Dapat Menggunakan Layanan DESH CINEMA Silahkan Login dan Daftarkan Diri Anda</h2>
	</section>

	<!-- about -->
	<section class="about">
		<div class="container">
			<h3>INFO</h3>
			<p><strong> DESH CINEMA </strong> adalah sebuah layanan pembelian tiket bioskop secara online. Pemesanan tiket bioskop bisa dilakukan dimanapun Anda berada hanya dengan menggunakan akses internet. Dengan menggunakan <strong>DESH CINEMA </strong> Anda bisa membeli tiket bioskop dengan aman, cepat, dan mudah. Kami harap Anda puas menggunakan layanan ini. </p>
		</div>
	</section>

	<!-- service -->
	<section class="service">
		<div class="container">
			<h3>LANGKAH-LANGKAH MENGGUNAKAN DESH CINEMA</h3>
			<div class="box">
				<div class="col-4">
					<div class="icon"><i class="fas fa-user"></i></div>
					<h4>MASUK KE WEB DESH CINEMA</h4>
				</div>
				<div class="col-4">
					<div class="icon"><i class="fas fa-sign-in-alt"></i></div>
					<h4>LOGIN (Daftarkan Diri Anda)</h4>
				</div>
				<div class="col-4">
					<div class="icon"><i class="fas fa-list"></i></div>
					<h4>PILIH FILM</h4>
				</div>
				<div class="col-4">
					<div class="icon"><i class="fas fa-archive"></i></div>
					<h4>TRANSAKSI PEMBAYARAN</h4>
				</div>
			</div>
		</div>
	</section>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2020 - DESH CINEMA. All Rights Reserved.</small>
		</div>
	</footer>


	<script type="text/javascript">
		$(document).ready(function(){
			$(".bg-loader").hide();
		})
	</script>
</body>
</html>