<?php
session_start();
$koneksi= new mysqli("localhost","root","","musikal_reservation");


$keyword = $_GET ["cari"];

$semuadata=array();
$ambil=$koneksi->query("SELECT * FROM musikal WHERE nama_show like '%$keyword%' " );
while ($pecah=$ambil->fetch_assoc())
{
	$semuadata[]=$pecah;
}
?>
?>

<!DOCTYPE html>
<!--
Template Name: Foxclore
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Aulia's Musical | Pages | Detail Musical</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/4.png');"> 
  <!-- ################################################################################################ -->
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="one_quarter first">
      <h1><a href="../index.html">Aulia's Musical</a></h1>
      <p>Detail Musical</p>
    </div>
    <div class="three_quarter">
      <ul class="nospace clear">
        <li class="one_third first">
          <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Social Media:</strong> @jellywops </span></div>
        </li>
        <li class="one_third">
          <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Email:</strong> auliamusical@domain.com</span></div>
        </li>
        <li class="one_third">
          <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Everyday:</strong> Always Open</span></div>
        </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </header>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <section id="navwrapper" class="hoc clear"> 
    <!-- ################################################################################################ -->
      <nav id="mainav">
      <ul class="clear">
               <li><a href="../index.php">Home</a></li>
        <li class="active"><a class="drop" href="#">User</a>
          <ul>
            <li><a href="#">Nama User :<?php 
				
				if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
					$nama="Belum Login"; }
				else {
					$nama=$_SESSION['namalengkap'];
				}
					
				
				echo $nama; ?></a></li>
			  <?php 
			  if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<li><a href='keranjang.php'>Login</a></li>"; }
			  else {
				  echo "<li><a href='logout.php'>Logout</a></li>";
			  }
	
	?>
            <li><a href="keranjang.php">Keranjang</a></li>
            
      </ul>
		  </li>
		  	 <li><a href="riwayat.php">Riwayat Pemesanan</a></li>
		  <li><a href="#"><marquee>Selamat Datang Di Aulia's Musical Reservation	</a></marquee>			</li>
		  </ul>
    </nav>
    <!-- ################################################################################################ -->
    <div id="searchform">
      <div>
        <form action="#" method="post">
          <fieldset>
            <legend>Quick Search:</legend>
            <input type="text" placeholder="Enter search term&hellip;">
            <button type="submit"><i class="fas fa-search"></i></button>
          </fieldset>
        </form>
      </div>
    </div>
    <!-- ################################################################################################ -->
  </section>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <h6 class="heading">Detail Musikal</h6>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Aulia</a></li>
      <li><a href="#">Suka</a></li>
      <li><a href="#">Kucing</a></li>
    </ul>
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <h6 class="heading">Pencarian Data</h6>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Aulia</a></li>
      <li><a href="#">Suka</a></li>
      <li><a href="#">Kucing</a></li>
    </ul>
	</div>
         
      <div class="wrapper row3">
      
        <section id="introblocks">
          <ul class= "nospace group">
	<?php echo "<h1> Detail Musik </h1>"; ?>
           <?php $ambil= $koneksi->query("SELECT * FROM musikal WHERE id_musikal='$_GET[id]'"); ?>
           <?php while($pecah= $ambil->fetch_assoc()){ ?>

           <img src="../foto_produk/<?php echo $pecah['Foto']; ?>" width="80">
            <h6 class="heading"><?php echo $pecah['nama_musikal']; ?></h6>
            <p><?php echo $pecah['Deskripsi']; ?></p>

            <?php } ?>


          </ul>
        </section>
		  
    </div>
 


  <div class="hero-unit">
            <!--<div class="tittle"><h3><strong><span class="glyphicon glyphicon-shopping-cart"></span> Your Cart</strong></h3></div>-->

<h2>Data Jadwal Tayang</h2>
	        <?php 
        $jadwal_tayang=$_GET["id"];
        $ambil4= $koneksi->query("SELECT * FROM musikal,slot_waktu,jadwal_tayang WHERE 
        musikal.id_musikal=jadwal_tayang.id_musikal
        AND 
        slot_waktu.id_slot_waktu=jadwal_tayang.id_slot_waktu
        AND 
        jadwal_tayang.id_musikal= '$jadwal_tayang'
        "); ?>
      <?php $pecah4= $ambil4->fetch_assoc(); ?>
<form id="form1" name="form1" method="post" action="keranjang.php?act=add&amp;id_jadwaltayang=<?php echo $pecah4['id_jadwaltayang']; ?>">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>no</th>
        <th>ID Tayang</th>
        <th>Nama Musikal</th>
        <th>Slot Waktu </th>
        <th>Tanggal Show</th>
       
      </tr>
    </thead>
    <tbody>
      <?php $no=1; ?>
      <?php 
        $jadwal_tayang=$_GET["id"];
        $ambil= $koneksi->query("SELECT * FROM musikal,slot_waktu,jadwal_tayang WHERE 
        musikal.id_musikal=jadwal_tayang.id_musikal
        AND 
        slot_waktu.id_slot_waktu=jadwal_tayang.id_slot_waktu
        AND 
        jadwal_tayang.id_musikal= '$jadwal_tayang'
        "); ?>
      <?php while($pecah= $ambil->fetch_assoc()){ ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $pecah['id_jadwaltayang']; ?></td>
        <td><?php echo $pecah['nama_musikal']; ?></td>
        <td><?php echo $pecah['slot_waktu']; ?></td>
        <td><?php echo $pecah['tanggal_show']; ?></td>
       
      </tr>
      <?php $no++ ?>
      <?php } ?>
    </tbody>
  </table>
  <p>
    Jenis Tiket
    <select name="id_jenistiket" class="form-control" required="" data-parsley-error-message="field ini harus diisi">
      <option value="">-- Pilih Jenis Tiket -- </option>
      <?php $ambil2=$koneksi->query("SELECT * FROM jenis_tiket");
					while ($pecah2=$ambil2->fetch_assoc()) { ?>
      <option value="<?php echo $pecah2['id_jenistiket']; ?>"> <?php echo $pecah2['jenis_tiket']; ?></option>
      <?php } ?>
    </select>
  </p>
  <p>Jumlah Kursi
  <select name="jumlah">

<?php
for($a=1; $a<=10; $a+=1){
    echo"<option value=$a> $a </option>";
}
?>
</select></p>
	<p>
	  <input type="submit"  class="btn btn-warning" value="PESAN"> 
      <a href="../index.php">
      <input type="button" value="BACK" class="btn btn-warning">
  </a>    </p>
</form>
 
		  
		  </section>
		  
		  
</body> 
      </div>
     
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay row4" style="background-image:url('../images/demo/backgrounds/01.png');">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-50">
      <h6 class="heading">Foxclore</h6>
      <ul class="faico clear">
        <li><a class="faicon-dribble" href="#"><i class="fab fa-dribbble"></i></a></li>
        <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li>
      </ul>
      <p class="nospace">Sed pellentesque in nisi nulla facilisi sed pretium duis varius ut ut.</p>
    </div>
    <!-- ################################################################################################ -->
    <hr class="btmspace-50">
    <!-- ################################################################################################ -->
    <div class="one_quarter first">
      <h6 class="heading">Nunc neque pellentesque</h6>
      <p class="nospace btmspace-15">Interdum velit vitae pede aliquam mollis neque ut ullamcorper tempor dolor.</p>
      <form action="#" method="post">
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="text" value="" placeholder="Name">
          <input class="btmspace-15" type="text" value="" placeholder="Email">
          <button type="submit" value="submit">Submit</button>
        </fieldset>
      </form>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Tortor varius nisi</h6>
      <ul class="nospace linklist">
        <li>
          <article>
            <p class="nospace btmspace-10"><a href="#">Id euismod est risus ac neque aliquam erat volutpat pellentesque adipiscing.</a></p>
            <time class="block font-xs" datetime="2045-04-06">Friday, 6<sup>th</sup> April 2045</time>
          </article>
        </li>
        <li>
          <article>
            <p class="nospace btmspace-10"><a href="#">Nunc hendrerit adipiscing nulla donec vestibulum odio quisque gravida morbi.</a></p>
            <time class="block font-xs" datetime="2045-04-05">Thursday, 5<sup>th</sup> April 2045</time>
          </article>
        </li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Vel condimentum auctor</h6>
      <ul class="nospace linklist">
        <li><a href="#">Hendrerit id lacus praesent</a></li>
        <li><a href="#">Ullamcorper risus gravida</a></li>
        <li><a href="#">Suscipit tempor turpis</a></li>
        <li><a href="#">Pede dictum ipsum vel auctor</a></li>
        <li><a href="#">Leo est tincidunt est sed</a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">Nunc sapien varius</h6>
      <ul class="nospace clear latestimg">
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>