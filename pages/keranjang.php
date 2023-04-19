<?php
session_start();

	  require_once("koneksi.php");
    if (!isset($_SESSION)) {
      
    }

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
<title>Foxclore | Pages | Basic Grid</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style type="text/css">
/* DEMO ONLY */
.container .demo{text-align:center;}
.container .demo div{padding:8px 0;}
.container .demo div:nth-child(odd){color:#FFFFFF; background:#CCCCCC;}
.container .demo div:nth-child(even){color:#FFFFFF; background:#979797;}
@media screen and (max-width:900px){.container .demo div{margin-bottom:0;}}
/* DEMO ONLY */
</style>
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
      <h1><a href="../index.html">Foxclore</a></h1>
      <p>Placerat sem hendrerit</p>
    </div>
    <div class="three_quarter">
      <ul class="nospace clear">
        <li class="one_third first">
          <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Give us a call:</strong> +00 (123) 456 7890</span></div>
        </li>
        <li class="one_third">
          <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Send us a mail:</strong> support@domain.com</span></div>
        </li>
        <li class="one_third">
          <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Mon. - Sat.:</strong> 08.00am - 18.00pm</span></div>
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
            <li><a href="#">Nama User : 
				
			<?php 
				if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
					$nama="Belum Login"; }
				else {
					$nama=$_SESSION['namalengkap'];
				}
					
				
				echo $nama; ?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
	    </li>
		  	
		  <li><a href="#"><marquee>Selamat Datang Di Aulia's Musical Reservation	</a></marquee>			</li>
	  </ul>
     
		
    </nav>
    <!-- ################################################################################################ -->
   
    <!-- ################################################################################################ -->
  </section>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <h6 class="heading">Basic Grid</h6>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Lorem</a></li>
      <li><a href="#">Ipsum</a></li>
      <li><a href="#">Dolor</a></li>
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
    <?php
	  if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
		  include "login.php";
	  } 
	  
	  else {
	  ?>
<section class="konten">
<h1>Data Pemesanan</h1>
    <hr>
	<form id="form2" name="form2" method="post" action="selesai.php" enctype="multipart/form-data">
	    <table class="table table-striped">
  <thead>
    <tr>
     
      <th>ID Tayang</th>
      <th>Nama Musikal</th>
      <th>Jenis Tiket </th>
      <th>Harga</th>
      <th>Jumlah Kursi</th>
      <th>Total</th>
      </tr>
  </thead>
  <tbody>
	 
	   
                     
    <?php 
	  $total = 0;
	    if (isset($_GET['act']))  {
             $act = $_GET['act'];
			 
			
               if ($act == "add") {
				if (isset($_GET['id_jadwaltayang'])) {
                $id_jadwaltayang = $_GET['id_jadwaltayang'];
				if (isset($_SESSION['items'][$id_jadwaltayang])) {
                    $_SESSION['items'][$id_jadwaltayang] = 1;
                } else {
                    $_SESSION['items'][$id_jadwaltayang] = 1; 
                }
				   
			}
			   }
			elseif ($act == "del") {
            if (isset($_GET['id_jadwaltayang'])) {
                $id_jadwaltayang = $_GET['id_jadwaltayang'];
                if (isset($_SESSION['items'][$id_jadwaltayang])) {
                    unset($_SESSION['items'][$id_jadwaltayang]);
					echo "<script>alert('Berhasil Menghapus');history.go(-2);</script>";
                }
            }
        }
						
				
            
				
		
			
	 if (isset($_SESSION['items'])) {
      foreach ($_SESSION['items'] as $key => $val) {
			
			@$jenistiket = $_POST['id_jenistiket'];
			@$jumlah=$_POST['jumlah'];
        	@$jadwal_tayang=$_GET['id_jadwaltayang'];
			
        $ambil= mysqli_query($konek,"SELECT * FROM musikal,jadwal_tayang,jenis_tiket,kursi,diskon WHERE 
        musikal.id_musikal=jadwal_tayang.id_musikal
         AND jenis_tiket.id_jenistiket=kursi.id_jenistiket AND 
		 jenis_tiket.id_diskon=diskon.id_diskon and
		 jenis_tiket.id_jenistiket='$jenistiket'
        AND id_jadwaltayang= '$key'"); ?>
	  
    <?php $pecah= mysqli_fetch_array($ambil) ?> 
    <tr>
		
		<?php
			
			@$harga=number_format($pecah['harga_tiket']);
			@$jenis_tiket=$pecah['jenis_tiket'];
			@$kursi=$pecah['no_kursi'];
   		@$diskon=$pecah['besar_diskon'];
			@$jumlah_harga = $pecah['harga_tiket'] * $jumlah;
      @$total += $jumlah_harga;	
			@$idtayang=$pecah['id_jadwaltayang'];
			?>
      <td><?php echo $pecah['id_jadwaltayang']; ?> <input type="hidden" name="id_jadwal" value="<?php echo $pecah['id_jadwaltayang']; ?>"></td>
		  
      <td><?php echo $pecah['nama_musikal']; ?>
        <input type="hidden" name="id_musikal" value="<?php echo $pecah['id_musikal']; ?>"></td>
      <td><?php echo $jenis_tiket; ?> -&gt; Disc : <?php echo $diskon; ?>%
        <input type="hidden" name="id_jenistiket" value="<?php echo $pecah['id_jenistiket']; ?>">
		<input type="hidden" name="jenis_tiket" value="<?php echo $jenis_tiket; ?>"><input type="hidden" name="id_diskon" value="<?php echo $pecah['id_diskon']; ?>"></td>
      <td><?php echo $harga; ?> <input type="hidden" name="harga" value="<?php echo $pecah['harga_tiket']; ?>"></td>
       <td><?php echo $jumlah; ?> Kursi
         <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>"></td>
      <td><?php echo number_format($jumlah_harga); ?> <input type="hidden" name="total" value="<?php echo $jumlah_harga; ?>"></td>
		</tr>
    <?php  //header ("location:" . $ref);
		} } }  ?>
 
<?php
	  
				if($total == 0){ ?>
		  <td colspan="6" align="center"><?php echo "Keranjang Kosong!"; ?></td>
				<?php } else { ?>
					
                      
					
			<?php	} ?>
  </tbody>
			
</table>
		<a href="../index.php?act=del&id_jadwaltayang=<?php echo $key; ?>" class="btn btn-warning">Back</a>
	
	
	   <h1>
	     <?php
		  
		 $tampil=mysqli_query($konek,"select * from customer where user='$_SESSION[namauser]'");
		  $data=mysqli_fetch_array($tampil);
		  $id=$data['id_customer'];
		  $nama=$data['Nama_customer'];
		  $email=$data['Email'];
		  $tlp=$data['No_hp']
		  ?>
	  
<h1>Data Customer</h1>
	   <table width="100%" border="0" cellspacing="2" cellpadding="2">
	     <tbody>
	       <tr>
	         <td colspan="2"><strong>DATA CUSTOMER</strong></td>
           </tr>
	       <tr>
	         <td width="26%">ID Customer</td>
	         <td width="74%"><?php echo $id; ?></td>
           </tr>
	       <tr>
	         <td>Nama Customer</td>
	         <td><?php echo $nama; ?></td>
           </tr>
	       <tr>
	         <td>Email</td>
	         <td><?php echo $email; ?></td>
           </tr>
	       <tr>
	         <td>Telpon</td>
	         <td><?php echo $tlp; ?></td>
           </tr>
	       <tr>
	         <td>Pilih Kursi</td>
	         <td>
				 
     
				 <?php 
		  
		$id_jenistiket=$_POST['id_jenistiket'];
		$kursi=mysqli_query($konek,"SELECT * From jenis_tiket,kursi where jenis_tiket.id_jenistiket=kursi.id_jenistiket and
		kursi.status='Tersedia' and
		jenis_tiket.id_jenistiket='$id_jenistiket'");
		  
		$jumlah=mysqli_num_rows($kursi);
		  if($jumlah>0){
		while($pecah=mysqli_fetch_array($kursi)) { 
			
			$status=$pecah['status'];
				echo "<input type=checkbox name=id_kursi[] value='$pecah[no_kursi]'><input type='button' value='$pecah[no_kursi]' name='simpankursi' class='btn btn-success'>";
		}}
		 else {
				 echo "<script>alert('Kursi Sudah Penuh!');history.go(-1);</script>";
		}?>
						
		   </select>
			</td>
            </tr>
	      
          </tbody>
    </table>
    <h8>Keterangan : D= Depan T= Tengah B= Belakang</h8>
	   <p>
        <input type="submit" value="CHECKOUT" class="btn btn-success"></a></p>
  </form>
</section>
<?php } ?>
  
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
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Aulia Musikal Reservation</a></p>
    <p class="fl_right">&nbsp;</p>
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