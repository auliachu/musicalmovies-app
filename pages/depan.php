<?php
include "koneksi.php";
?>
<!doctype html>
<html>
<head>
<title>Aulia's Musical Reservation</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
    <div class="wrapper row3">
      <main class="hoc container clear">
        <section id="introblocks">
          <ul class= "nospace group">
			  <?php
			  @$cari = $_GET ["cari"];
			  if(empty($cari)){ 
				  $ambil= mysqli_query($konek,"SELECT * FROM musikal ");
			  }
else {
	
	 $ambil= mysqli_query($konek,"SELECT * FROM musikal WHERE nama_musikal like '%$cari%' " );
	
}
?>
			  <?php
          $sql = ($ambil); // 
                    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                        while($permusikal = mysqli_fetch_array($sql)){ // Ambil 
							?>
            <li class="one_third">
              <figure><a class="imgover" href=""><img src="foto_produk/<?php echo $permusikal['Foto']; ?>" alt="" ></a>
                <figurecaption>
                  <h6 class="heading"><?php echo $permusikal['nama_musikal']; ?></h6>
                  <p><?php echo $permusikal['Deskripsi']; ?></p>
                  <a href="pages/detail.php?id=<?php echo $permusikal['id_musikal']; ?>" class="btn btn-primary">Detail</a>
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
</body>
</html>