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
<h2>Laporan</h2>
<div class="row">
        <div class="col-md-3"><a href="dashboard.php?halaman=laporanmusikal">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
				<?php
				include "../pages/koneksi.php";
				$tampil=mysqli_query($konek,"SELECT * FROM customer");
					$jumlah=mysqli_num_rows($tampil)
				?>
				
              <h4>Musikal Terlaris</h4>
              <p><b></b></p>
            </div>
			 
          </div>
			   </a>
        </div>


	
		<div class="col-md-3"><a href="dashboard.php?halaman=laporankursi">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-star-o fa-3x"></i>
            <div class="info">
				<?php
				include "../pages/koneksi.php";
				$tampil3=mysqli_query($konek,"SELECT * FROM kursi");
					$jumlah3=mysqli_num_rows($tampil3)
				?>
              <h4>Jenis Tiket Terlaris</h4>
              <p><b></b></p>
            </div>
	</div></a>
</div>

	<div class="col-md-3"><a href="dashboard.php?halaman=laporan">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-file-o fa-3x"></i>
            <div class="info">
				
              <h4>Laporan Penjualan</h4>
              <p><b></b></p>
            </div>
	</div></a>
</div>	
	

