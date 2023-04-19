<?php
//koneksi ke database
$koneksi= new mysqli("localhost","root","","musikal_reservation");

$id_musikal = $_GET["id"];

$ambil=$koneksi->query("SELECT * FROM musikal WHERE id_musikal = '$id_musikal' " );
$detail = $ambil->fetch_assoc ();

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
        <li><a href="../index.html">Home</a></li>
        <li class="active"><a class="drop" href="#">Pages</a>
          <ul>
            <li><a href="gallery.html">Gallery</a></li>
            <li class="active"><a href="full-width.html">Full Width</a></li>
            <li><a href="sidebar-left.html">Sidebar Left</a></li>
            <li><a href="sidebar-right.html">Sidebar Right</a></li>
            <li><a href="basic-grid.html">Basic Grid</a></li>
            <li><a href="font-icons.html">Font Icons</a></li>
          </ul>
        </li>
        <li><a class="drop" href="#">Dropdown</a>
          <ul>
            <li><a href="#">Level 2</a></li>
            <li><a class="drop" href="#">Level 2 + Drop</a>
              <ul>
                <li><a href="#">Level 3</a></li>
                <li><a href="#">Level 3</a></li>
                <li><a href="#">Level 3</a></li>
              </ul>
            </li>
            <li><a href="#">Level 2</a></li>
          </ul>
        </li>
        <li><a href="#">Link Text</a></li>
        <li><a href="#">Link Text</a></li>
        <li><a href="#">Link Text</a></li>
        <li><a href="#">Long Link Text</a></li>
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
    <h6 class="heading">Detail Musikal</h6>
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
 

<h2>Data Customer</h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th>no</th>
      <th>ID Tayang</th>
      <th>Nama Musikal</th>
      <th>Slot Waktu </th>
      <th>Tanggal Show</th>
      <th>Jenis Tiket</th>
      <th>Kursi</th>
      <th>Pilihan</th>
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
      <td>
		  <select name="id_jenistiket" class="form-control">
				<option value="">-- Pilih Jenis Tiket -- </option>
					<?php $ambil2=$koneksi->query("SELECT * FROM jenis_tiket");
					while ($pecah2=$ambil2->fetch_assoc()) { ?>
				<option value="<?php echo $pecah2['id_jenistiket']; ?>"> <?php echo $pecah2['jenis_tiket']; ?></option>
				<?php } ?>
			</select>
		
		</td>
      <td> <select name="id_kursi" class="form-control">
				<option value="">-- Pilih Kursi -- </option>
					<?php $ambil3=$koneksi->query("SELECT * FROM kursi");
					while ($pecah3=$ambil3->fetch_assoc()) { ?>
				<option value="<?php echo $pecah3['id_kursi']; ?>"> <?php echo $pecah3['no_kursi']; ?></option>
				<?php } ?>
			</select></td>
      <td>&nbsp;</td>

    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php $no++ ?>
    <?php } ?>

  </tbody>
</table>
                  
	<a href="../index.php" class="btn btn-info">   Check Out </a>   
		  
		  </section>
		  
		  
</body> 
      </div>
      <div id="comments">
        <h2>Comments</h2>
        <ul>
          <li>
            <article>
              <header>
                <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                <address>
                By <a href="#">A Name</a>
                </address>
                <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
              </header>
              <div class="comcont">
                <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
              </div>
            </article>
          </li>
          <li>
            <article>
              <header>
                <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                <address>
                By <a href="#">A Name</a>
                </address>
                <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
              </header>
              <div class="comcont">
                <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
              </div>
            </article>
          </li>
          <li>
            <article>
              <header>
                <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                <address>
                By <a href="#">A Name</a>
                </address>
                <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
              </header>
              <div class="comcont">
                <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
              </div>
            </article>
          </li>
        </ul>
        <h2>Write A Comment</h2>
        <form action="#" method="post">
          <div class="one_third first">
            <label for="name">Name <span>*</span></label>
            <input type="text" name="name" id="name" value="" size="22" required>
          </div>
          <div class="one_third">
            <label for="email">Mail <span>*</span></label>
            <input type="email" name="email" id="email" value="" size="22" required>
          </div>
          <div class="one_third">
            <label for="url">Website</label>
            <input type="url" name="url" id="url" value="" size="22">
          </div>
          <div class="block clear">
            <label for="comment">Your Comment</label>
            <textarea name="comment" id="comment" cols="25" rows="10"></textarea>
          </div>
          <div>
            <input type="submit" name="submit" value="Submit Form">
            &nbsp;
            <input type="reset" name="reset" value="Reset Form">
          </div>
        </form>
      </div>
      <!-- ################################################################################################ -->
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