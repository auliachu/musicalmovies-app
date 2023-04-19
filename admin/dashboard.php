<?php
session_start();
$koneksi = new mysqli("localhost","root","","musikal_reservation");

if (!isset($_SESSION['admin']))
{
  echo "<script>alert('Anda harus login');</script>";
  echo "<script>location='login3.php';</script>";
  header('location:login3.php');
  exit();
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Admin Aulia Musikal </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  
	  
	      <!-- Include File jQuery -->
    <script src="js/jquery.min.js"></script>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.php">Musical Reservation</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="dashboard.php?halaman=pendaftaran"><i class="fa fa-cog fa-lg"></i>Admin</a></li>
            <li><a class="dropdown-item" href="dashboard.php?halaman=admin"><i class="fa fa-user fa-lg"></i> Data Admin </a></li>
            <li><a class="dropdown-item" href="dashboard.php?halaman=logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar"><a href="dashboard.php?halaman=dashboardd">
      <div class="app-sidebar__user"><img src="images/logo/6.png" width="60"/>
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['nama_admin']; ?></p>
          <p class="app-sidebar__user-designation">Musical Admin</p>
        </div>
      </div></a>
      <ul class="app-menu">
        <li>
          <a class="app-menu__item active" href="dashboard.php?halaman=dashboardd"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li>
          <a class="app-menu__item active" href="dashboard.php?halaman=dashboardlaporan"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Laporan</span></a></li>
        <li>
          <a class="app-menu__item active" href="dashboard.php?halaman=customer"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Customer</span></a></li>
        <li>
          <a class="app-menu__item active" href="dashboard.php?halaman=musikal"><i class="app-menu__icon fa fa-imdb"></i><span class="app-menu__label">Musikal</span></a></li>
        <li>
          <a class="app-menu__item active" href="dashboard.php?halaman=slotwaktu"><i class="app-menu__icon fa fa-address-card-o"></i><span class="app-menu__label">Slot Waktu</span></a></li>
        <li>
          <a class="app-menu__item active" href="dashboard.php?halaman=jadwaltayang"><i class="app-menu__icon fa fa-calendar"></i><span class="app-menu__label">Jadwal Tayang</span></a></li>
        <li>
          <a class="app-menu__item active" href="dashboard.php?halaman=diskon"><i class="app-menu__icon fa fa-cc"></i><span class="app-menu__label">Diskon</span></a></li>
        <li>
          <a class="app-menu__item active" href="dashboard.php?halaman=faktur"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Faktur</span></a></li>
        <li>
          <li>
          <a class="app-menu__item active" href="dashboard.php?halaman=tiket"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Tiket</span></a></li>
        <li>
        <li>
          <a class="app-menu__item active" href="dashboard.php?halaman=kursi"><i class="app-menu__icon fa fa-grav"></i><span class="app-menu__label">Kursi</span></a></li>
        <li>
          <a class="app-menu__item active" href="dashboard.php?halaman=jenistiket"><i class="app-menu__icon fa fa-sticky-note"></i><span class="app-menu__label">Jenis Tiket</span></a></li>
        <li>
          <a class="app-menu__item active" href="dashboard.php?halaman=sistempembayaran"><i class="app-menu__icon fa fa-credit-card-alt"></i><span class="app-menu__label">Sistem Pembayaran</span></a></li>
      </ul>
    </aside>
    <main class="app-content">
      <?php 
      if (isset($_GET['halaman']))
      {
        if($_GET['halaman']=="dashboardd"){
            include 'dashboardd.php';
        }
        if($_GET['halaman']=="customer"){
            include 'customer.php';
        }
        elseif ($_GET['halaman']=="musikal"){
            include 'musikal.php';
        }
        elseif ($_GET['halaman']=="slotwaktu"){
            include 'slotwaktu.php';
        }
        elseif ($_GET['halaman']=="jadwaltayang"){
            include 'jadwaltayang.php';
        }
        elseif ($_GET['halaman']=="diskon"){
            include 'diskon.php';
        }
        elseif ($_GET['halaman']=="faktur"){
            include 'faktur.php';
        }
        elseif ($_GET['halaman']=="tiket"){
            include 'tiket.php';
        }
        elseif ($_GET['halaman']=="tambahtiket"){
            include 'tambahtiket.php';
        }
        elseif ($_GET['halaman']=="kursi"){
            include 'kursi.php';
        }
        elseif ($_GET['halaman']=="tambahkursi"){
            include 'tambahkursi.php';
        }
        elseif ($_GET['halaman']=="jenistiket"){
            include 'jenistiket.php';
        }
		   elseif ($_GET['halaman']=="ubahstatus"){
            include 'ubahstatus.php';
        }
        elseif ($_GET['halaman']=="sistempembayaran"){
            include 'sistempembayaran.php';
        }
        elseif ($_GET['halaman']=="statuspembayaran"){
            include 'statuspembayaran.php';
        }
        elseif ($_GET['halaman']=="logout"){
            include 'logout.php';
        }
        elseif ($_GET['halaman']=="detail"){
            include 'detail.php';
        }
        elseif ($_GET['halaman']=="tambahmusikal"){
            include 'tambahmusikal.php';
        }
		  elseif ($_GET['halaman']=="updatekursi"){
            include 'updatekursi.php';
        }
        elseif ($_GET['halaman']=="tambahcustomer"){
            include 'tambahcustomer.php';
        }
        elseif ($_GET['halaman']=="tambahslotwaktu"){
            include 'tambahslotwaktu.php';
        }
        elseif ($_GET['halaman']=="tambahjadwaltayang"){
            include 'tambahjadwaltayang.php';
        }
        elseif ($_GET['halaman']=="tambahdiskon"){
            include 'tambahdiskon.php';
        }
        elseif ($_GET['halaman']=="tambahjenistiket"){
            include 'tambahjenistiket.php';
        }
        elseif ($_GET['halaman']=="hapusmusikal"){
            include 'hapusmusikal.php';
        }
        elseif ($_GET['halaman']=="hapusjadwaltayang"){
            include 'hapusjadwaltayang.php';
        }
        elseif ($_GET['halaman']=="ubahmusikal"){
            include 'ubahmusikal.php';
        }
        elseif ($_GET['halaman']=="ubahcustomer"){
            include 'ubahcustomer.php';
        }
        elseif ($_GET['halaman']=="hapuscustomer"){
            include 'hapuscustomer.php';
        }
        elseif ($_GET['halaman']=="hapusslotwaktu"){
            include 'hapusslotwaktu.php';
        }
        elseif ($_GET['halaman']=="ubahslotwaktu"){
            include 'ubahslotwaktu.php';
        }
        elseif ($_GET['halaman']=="ubahjadwaltayang"){
            include 'ubahjadwaltayang.php';
        }
        elseif ($_GET['halaman']=="hapusdiskon"){
            include 'hapusdiskon.php';
        }
        elseif ($_GET['halaman']=="ubahdiskon"){
            include 'ubahdiskon.php';
        }
         elseif ($_GET['halaman']=="updateketerangan"){
            include 'updateketerangan.php';
        }
        elseif ($_GET['halaman']=="hapuskursi"){
            include 'hapuskursi.php';
        }
		 elseif ($_GET['halaman']=="hapusfaktur"){
            include 'hapusfaktur.php';
        }
        elseif ($_GET['halaman']=="hapusjenistiket"){
            include 'hapusjenistiket.php';
        }
        elseif ($_GET['halaman']=="ubahjenistiket"){
            include 'ubahjenistiket.php';
        }
		 elseif ($_GET['halaman']=="laporan"){
            include 'laporan1.php';
        }
		   elseif ($_GET['halaman']=="laporan2"){
            include 'laporan.php';
        }
		     elseif ($_GET['halaman']=="laporanmusikal"){
            include 'laporanmusikal.php';
        }
		   elseif ($_GET['halaman']=="laporankursi"){
            include 'laporankursi.php';
        }
		    elseif ($_GET['halaman']=="dashboardlaporan"){
            include 'dashboarlaporan.php';
        }
        elseif ($_GET['halaman']=="pendaftaran"){
            include 'pendaftaran.php';
        }
        elseif ($_GET['halaman']=="ubahkursi"){
            include 'ubahkursi.php';
        }
        elseif ($_GET['halaman']=="admin"){
            include 'admin.php';
        }
        elseif ($_GET['halaman']=="simpanadmin"){
            include 'simpanadmin.php';
        }
        elseif ($_GET['halaman']=="tambahadmin"){
            include 'tambahadmin.php';
        }
        elseif ($_GET['halaman']=="hapusadmin"){
            include 'hapusadmin.php';
        }
        elseif ($_GET['halaman']=="ubahadmin"){
            include 'ubahadmin.php';
        }
      else
      {
            include 'home.php';
      }
     }
      ?>

    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
	  	 <script src="assets/js/jquery.js"></script>
	  <script src="assets/js/jquery.dataTables.js"></script>
	  <script src="assets/js/jquery.dataTables.min.js"></script>
	  
	  <script>
	  $(document).ready(function() {
    $('#example').DataTable();
} );
	  </script>
  </body>
</html>