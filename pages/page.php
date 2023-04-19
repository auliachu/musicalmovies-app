<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>isi file</title>
</head>

<body>
    <?php
    if(isset($_GET['page'])) {
        $page=$_GET['page'];
        if($page=='nota'){
            include "nota.php";
        }
		 elseif($page=='pembayaran'){
            include "pembayaran.php";
        }
		 elseif($page=='cetak'){
            include "cetak.php";
        }
       
		
		
        
        //penutup akhir
    }else {
       
		
include("riwayat_tampil.php");

    }
    ?>
</body>
</html>