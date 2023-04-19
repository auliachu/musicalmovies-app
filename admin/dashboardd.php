<style type="text/css">
a:link {
    text-decoration: none;
}
a:visited {
    text-decoration: none;
}
a:hover {
    text-decoration: none;
}
a:active {
    text-decoration: none;
}
</style>
<h2>Halaman Dashboard</h2>
<div class="row">
        <div class="col-md-3"><a href="dashboard.php?halaman=customer">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
				<?php
				include "../pages/koneksi.php";
				$tampil=mysqli_query($konek,"SELECT * FROM customer");
					$jumlah=mysqli_num_rows($tampil)
				
									 ?>
				
              <h4>Jumlah Customer</h4>
              <p><b><?php echo $jumlah; ?></b></p>
            </div>
			 
          </div>
			   </a>
        </div>

<div class="col-md-3"><a href="dashboard.php?halaman=faktur">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
				<?php
				include "../pages/koneksi.php";
				$tampil2=mysqli_query($konek,"SELECT * FROM faktur");
					$jumlah2=mysqli_num_rows($tampil2)
				
									 ?>
              <h4>Jumlah Pesanan</h4>
              <p><b><?php echo $jumlah2; ?></b></p>
            </div>
	</div></a>
</div>
	
		<div class="col-md-3"><a href="dashboard.php?halaman=kursi">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-star-o fa-3x"></i>
            <div class="info">
				<?php
				include "../pages/koneksi.php";
				$tampil3=mysqli_query($konek,"SELECT * FROM kursi");
					$jumlah3=mysqli_num_rows($tampil3)
				
									 ?>
              <h4>Jumlah Kursi</h4>
              <p><b><?php echo $jumlah3; ?></b></p>
            </div>
	</div></a>
</div>

	
	
	<div class="col-md-3"><a href="dashboard.php?halaman=laporan">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
				<?php
				include "../pages/koneksi.php";
				$tampil2=mysqli_query($konek,"SELECT * FROM faktur");
					$jumlah2=mysqli_num_rows($tampil2)
				
									 ?>
              <h4>Laporan Pemesnan</h4>
              <p><b></b></p>
            </div>
	</div></a>
</div>



