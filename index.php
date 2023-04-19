<?php 
session_start();
include "pages/koneksi.php";
unset($_SESSION['items']);
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
<title>Aulia's Musical Reservation</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('images/demo/backgrounds/4.png');"> 
  <!-- ################################################################################################ -->
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="one_quarter first">
      <h1><a href="index.php">Aulia's Musical</a></h1>
      <p>We are here to help you</p>
    </div>
    <div class="three_quarter">
      <ul class="nospace clear">
        <li class="one_third first">
          <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Our Social Media</strong> @jellywops </span></div>
        </li>
        <li class="one_third">
          <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Our email:</strong> musicalaulia@domain.com</span></div>
        </li>
        <li class="one_third">
          <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Avalaible at:</strong> Everyday </span></div>
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
        <li><a href="index.php">Home</a></li>
        <li class="active"><a class="drop" href="#">User</a>
          <ul>
            <li><a href="admin/login3.php">Admin</a></li>
			  <?php 
			  if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<li><a href='pages/keranjang.php'>Login</a></li>"; }
			  else {
				  echo "<li><a href='pages/logout.php'>Logout</a></li>";
			  }
	
	?>
            <li><a href="keranjang.php">Keranjang</a></li>
			  
            
      </ul>
		  </li>
		  	 <li><a href="pages/riwayat.php">Riwayat Pemesanan</a></li>
		  <li><a href="#">Hai, <?php 
				
				if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
					$nama2="Pengunjung"; }
				else {
					$nama2=$_SESSION['namalengkap'];
				}
					
				
				echo $nama2; ?></a></li>
		  <li><a href="#"><marquee>Selamat Datang Di Aulia's Musical Reservation	</a></marquee>			</li>
		  
		  
		  </ul>
    </nav>
    <!-- ################################################################################################ -->
    <div id="searchform">
      <div>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
          <fieldset>
            <legend>Quick Search:</legend>
            <input type="text" placeholder="Cari nama musikal" name="cari">
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
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
      <p>Let's Find your Favorite Musical Show</p>
      <h3 class="heading">Musical Indonesia</h3>
      <p></p>
      <footer><a class="btn" href="#">Laoreet pharetra</a></footer>
    </article>
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->


   <?php
		 if (isset($_GET['act']))  {
          $act = $_GET['act'];
			 
	if ($act == "del") {
            if (isset($_GET['id_jadwaltayang'])) {
                $id_jadwaltayang = $_GET['id_jadwaltayang'];
                if (isset($_SESSION['items'][$id_jadwaltayang])) {
                    unset($_SESSION['items'][$id_jadwaltayang]);
                }
            }
	}
        }
	
		?>
	 <div class="wrapper row3">
      <main class="hoc container clear">
        <section id="introblocks">
          <ul class= "nospace group">
			  <?php
			  @$cari = $_POST['cari'];
			  if(empty($cari)){ 
				  $ambil= mysqli_query($konek,"SELECT musikal.id_musikal, musikal.Foto, musikal.Deskripsi,musikal.nama_musikal,jadwal_tayang.keterangan FROM musikal,jadwal_tayang where musikal.id_musikal=jadwal_tayang.id_musikal and  jadwal_tayang.keterangan='Sedang Tayang'");
			  }
else {
	
	 $ambil= mysqli_query($konek,"SELECT musikal.id_musikal,musikal.Foto, musikal.Deskripsi,musikal.nama_musikal,jadwal_tayang.keterangan FROM musikal,jadwal_tayang where musikal.id_musikal=jadwal_tayang.id_musikal and  jadwal_tayang.keterangan='Sedang Tayang' and nama_musikal like '%$cari%' " );
	
}
?>
			  <?php
          $sql = ($ambil); // 
                    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                        while($permusikal = mysqli_fetch_array($sql)){ 
                        $idmusikal=$permusikal['id_musikal'];
                        // Ambil 
							?>
            <li class="one_third">
              <figure><a class="imgover" href=""><img src="foto_produk/<?php echo $permusikal['Foto']; ?>" alt="" ></a>
                <figurecaption>
                  <h6 class="heading"><?php echo $permusikal['nama_musikal']; ?></h6>
                  <p><?php echo $permusikal['Deskripsi']; ?></p>
                  <?php echo "<a href='pages/detail.php?id=$idmusikal' class=btn btn-primary>Detail</a>"; ?>
                </figurecaption>
              </figure>
            </li>
            <?php }} else {
							echo "Data Musikal Tidak Ditemukan";
						} ?>


          </ul>
        </section>
      </main>
    </div>


       </ul>
        </section>
      </main>
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
	
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs">Mollis eu commodo eu dui quisque</p>
      <h6 class="heading">Ut ipsum vivamus tincidunt</h6>
    </div>
    <ul class="nospace group center">
      <li class="one_third first">
        <article><a href="#"><i class="fas fa-eraser fa-5x btmspace-50"></i></a>
          <h6 class="heading">Tincidunt enim etiam</h6>
          <p class="btmspace-30">Tellus lacus tempor in pharetra id imperdiet sit amet enim suspendisse potenti fusce ornare [&hellip;]</p>
          <footer><a class="btn" href="#">Read More</a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="fas fa-chess-bishop fa-5x btmspace-50"></i></a>
          <h6 class="heading">Congue nulla facilisi</h6>
          <p class="btmspace-30">Laoreet ligula phasellus pede phasellus faucibus enim quis lacus praesent ipsum vulputate [&hellip;]</p>
          <footer><a class="btn" href="#">Read More</a></footer>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"><i class="fas fa-coins fa-5x btmspace-50"></i></a>
          <h6 class="heading">Nunc congue curabitur</h6>
          <p class="btmspace-30">Vitae lacinia eu interdum tempus massa in sodales purus non nisi cras porta lacinia ut [&hellip;]</p>
          <footer><a class="btn" href="#">Read More</a></footer>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs">Id erat duis nibh diam at</p>
      <h6 class="heading">Vulputate quis lacus nullam</h6>
    </div>
    <ul id="stats" class="nospace group">
      <li><i class="fas fa-id-badge"></i>
        <p><a href="#">123</a></p>
        <p>Augue dui convallis</p>
      </li>
      <li><i class="fas fa-skull"></i>
        <p><a href="#">1234</a></p>
        <p>Id ullamcorper</p>
      </li>
      <li><i class="fas fa-umbrella"></i>
        <p><a href="#">12345</a></p>
        <p>Malesuada interdum</p>
      </li>
      <li><i class="fas fa-store-alt"></i>
        <p><a href="#">6789</a></p>
        <p>Tristique viverra</p>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper coloured">
  <section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs">At ante morbi consequat lobortis</p>
      <h6 class="heading">Eros suspendisse scelerisque</h6>
    </div>
    <article class="one_half first"><img src="images/demo/100x100.png" alt="">
      <blockquote>Proin sed sapien ut convallis lectus ac magna nulla mattis purus phasellus consectetuer fermentum augue integer vulputate lectus vitae lorem suspendisse potenti donec suscipit.</blockquote>
      <h6 class="heading">J. Doe</h6>
      <em>Nulla mauris hendrerit</em></article>
    <article class="one_half"><img src="images/demo/100x100.png" alt="">
      <blockquote>Pellentesque et ipsum mattis ipsum pellentesque pretium proin rutrum turpis non accumsan aliquet odio magna luctus neque in adipiscing mi odio ac felis sed mattis enim quis ipsum.</blockquote>
      <h6 class="heading">G. Doe</h6>
      <em>Aenean vestibulum mattis</em></article>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs">Nisl sed blandit iaculis lectus</p>
      <h6 class="heading">Nam et erat nec eros elementum</h6>
    </div>
    <ul class="nospace group latest">
      <li class="one_half first">
        <article>
          <div class="excerpt">
            <ul class="nospace meta">
              <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
              <li><i class="fas fa-tag"></i> <a href="#">Category Name</a></li>
            </ul>
            <h6 class="heading">Gravida integer tristique</h6>
            <p>Dui vel odio proin magna ligula pellentesque eu tincidunt sed ornare tempor nisl in id dui vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae donec [<a href="#">&hellip;</a>]</p>
            <footer><a href="#">Read More</a></footer>
          </div>
          <time datetime="2045-04-06T08:15+00:00"><strong>06</strong> <em>Apr</em></time>
        </article>
      </li>
      <li class="one_half">
        <article>
          <div class="excerpt">
            <ul class="nospace meta">
              <li><i class="fas fa-user"></i> <a href="#">Admin</a></li>
              <li><i class="fas fa-tag"></i> <a href="#">Category Name</a></li>
            </ul>
            <h6 class="heading">Eleifend semper nisl sed</h6>
            <p>Eget lorem in in felis in metus mollis blandit ut eu justo suspendisse semper sem sit amet ligula quisque eget felis eu tortor tristique pharetra praesent turpis pede varius sed [<a href="#">&hellip;</a>]</p>
            <footer><a href="#">Read More</a></footer>
          </div>
          <time datetime="2045-04-05T08:15+00:00"><strong>05</strong> <em>Apr</em></time>
        </article>
      </li>
    </ul>
    <footer class="center"><a class="btn" href="#">View More</a></footer>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay row4" style="background-image:url('images/demo/backgrounds/01.png');">
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
        <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
        <li><a class="imgover" href="#"><img src="images/demo/100x100.png" alt=""></a></li>
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
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>