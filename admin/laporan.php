<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active"> Laporan </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"> Laporan </h1>
			</div>
		</div><!--/.row-->

<?php 
	$koneksi = new mysqli("localhost","root","","tiket_musikal");

	$semuadata=array();
	$tgl_mulai = "-";
	$tgl_selesai = "-";
	$status = "";

	if (isset($_POST["kirim"])) 
	{
		$semuadata=array();
		$tgl_mulai = $_POST["tglm"];
		$tgl_selesai = $_POST["tgls"];
		$status = $_POST["status"];

		$ambil = $koneksi->query("SELECT * FROM faktur LEFT JOIN customer ON faktur.id_customer = customer.id_customer WHERE status_pembayaran='$status' AND tanggal_pesan BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
		while($pecah = $ambil->fetch_assoc())
		{
			$semuadata[]=$pecah;
		}
		// echo "<pre>";
		// print_r($semuadata);
		// echo "</pre>";
	}
?>
<h2>
	Laporan Penjualan
		<?php echo $tgl_mulai ?> 
	Hingga 
		<?php echo $tgl_selesai ?>
</h2>
<form method="post">
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" name="tglm" class="form-control" value="<?php echo $tgl_mulai ?>">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" name="tgls" class="form-control" value="<?php echo $tgl_selesai ?>">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Status</label>
				<select class="form-control" name="status">
					<option value="">Pilih status</option>
					<option value="Lunas"   <?php echo $status=="Lunas"?"selected":""; ?>    >Lunas</option>
					<option value="Menunggu"   <?php echo $status=="Menunggu"?"selected":""; ?>    >Menunggu</option>
					<option value="Sudah Dibayar"   <?php echo $status=="Sudah Dibayar"?"selected":""; ?>    >Sudah Dibayar</option>
					<option value="Gagal"   <?php echo $status=="Gagal"?"selected":""; ?>    >Gagal</option>
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<label>&nbsp; </label><br>
			<button class="btn btn-primary" name="kirim"><i class="fa fa-play-circle-o"></i> Lihat</button>
			<div style="float: right;">
					<a href="index.php?halaman=laporan" class="btn btn-success square-btn-adjust"><i class="fa fa-refresh"></i> Refresh
				</a> 
			</div>
		</div>
	</div>
</form>

<table class="table table-bordered">
	<thead>
		<tr>
			<th><cente>No</th>
			<th>No Faktur</th>
			<th>Customer</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value['total'] ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["id_faktur"]; ?></td>
			<td><?php echo $value["nama"]; ?></td>
			<td><?php echo date("d F Y",strtotime($value["tanggal_pesan"])); ?></td>
			<td>Rp. <?php echo number_format($value["total"]); ?></td>
			<td><?php echo $value["status_pembayaran"]; ?></td>
		</tr>
		<?php endforeach  ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="4"><center>Total</th>
			<th>Rp. <?php echo number_format($total); ?></th>
			<th></th>
		</tr>
	</tfoot>
</table>
















<?php 
	$muadata=array();
	$l_mulai = "-";
	$l_selesai = "-";

	if (isset($_POST["rim"])) 
	{
		$l_mulai = $_POST["lm"];
		$l_selesai = $_POST["ls"];

		$bil = $koneksi->query("SELECT * FROM faktur LEFT JOIN customer ON faktur.id_customer = customer.id_customer WHERE tanggal_pesan BETWEEN '$l_mulai' AND '$l_selesai'");
		while($cah = $bil->fetch_assoc())
		{
			$muadata[]=$cah;
		}

		// echo "<pre>";
		// print_r($semuadata);
		// echo "</pre>";
	}
?>
<h2>
	Laporan Banyak Kursi Dipesan
		<?php echo $l_mulai ?> 
	Hingga 
		<?php echo $l_selesai ?>
</h2>
<form method="post">
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" name="lm" class="form-control" value="<?php echo $l_mulai ?>">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" name="ls" class="form-control" value="<?php echo $l_selesai ?>">
			</div>
		</div>
		<div class="col-md-6">
			<label>&nbsp; </label><br>
			<button class="btn btn-primary" name="rim"><i class="fa fa-play-circle-o"></i> Lihat</button>
			<div style="float: right;">
					<a href="index.php?halaman=laporan" class="btn btn-success square-btn-adjust"><i class="fa fa-refresh"></i> Refresh
				</a> 
			</div>
		</div>
	</div>
</form>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No Faktur</th>
			<th>Customer</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Stok</th>
		</tr>
	</thead>
	<tbody>
		<?php $tal=0; ?>
		<?php $t=0; ?>
		<?php foreach ($muadata as $y => $lue): ?>
		<?php $tal+=$lue['Total_Harga'] ?>
		<?php $t+=$lue['Jumlah']; ?>
		<tr>
			<td><?php echo $lue["id_faktur"]; ?></td>
			<td><?php echo $lue["nama"]; ?></td>
			<td><?php echo date("d F Y",strtotime($lue["tanggal_pesan"])); ?></td>
			<td>Rp. <?php echo number_format($lue["total"]); ?></td>
			<td><?php echo $lue["Jumlah"]; ?></td>
		</tr>
		<?php endforeach  ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3"><center>Total</th>
			<th>Rp. <?php echo number_format($tal); ?></th>
			<th><?php echo $t; ?></th>
		</tr>
	</tfoot>
</table>
















<h2>Laporan Musikal Terlaris</h2>
	<form method="POST">
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Tanggal Mulai</label>
					<input type="date" class="form-control" name="tgl1">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>  Tanggal Selesai  </label>
					<input type="date" class="form-control" name="tgl2">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label>&nbsp; </label><br>
					<button  name="proses" class="btn btn-primary"><i class="fa fa-play-circle-o"></i> Lihat</button>
				<div style="float: right;">
						<a href="index.php?halaman=laporan" class="btn btn-success square-btn-adjust"><i class="fa fa-refresh"></i> Refresh
					</a> 
				</div>
				</div>
			</div>
		</div>
	</form>
<?php
    //proses jika sudah klik tombol pencarian data
    if(isset($_POST['proses']))
    {
	    //menangkap nilai form
	    $dt1=$_POST['tgl1'];
	    $dt2=$_POST['tgl2'];
	if(empty($dt1) || empty($dt2))
	{
    //jika data tanggal kosong
?>
	<script language="JavaScript">
        alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
        document.location='index.php?halaman=cetak';
    </script>
			
<?php
    }
    else
    {
?>
	<br>
		<i>
			<b>Informasi : </b> 
				Hasil pencarian data berdasarkan periode Tanggal 
				<b>
					<?php echo $_POST['tgl1']?>
				</b> 
					s/d 
					<b>
						<?php echo $_POST['tgl2']?>
					</b>
		</i>
<?php
    $ambil= mysqli_query ($koneksi, "SELECT *,SUM(jumlah) AS total FROM faktur, jadwal_tayang, musikal WHERE faktur.id_jadwaltayang=jadwal_tayang.id_jadwaltayang AND jadwal_tayang.id_jenisshow=musikal.id_jenisshow AND faktur.tanggal_pesan BETWEEN '$tgl_mulai' AND '$tgl_selesai' 
				GROUP BY jadwal_tayang.id_jenisshow ORDER BY total DESC");
	}
?>
</p> 

	<table class="table table-bordered" >
		<thead>
			<tr>
			<th>No.</th>
			<th>Nama Musikal</th>
			<th>Jumlah Terjual</th>
			<th>Total Harga Terjual</th>
		</tr>
		</thead>
		<tbody>
			<?php $total=0; ?>
			<?php $nomor=1; ?>
			<?php while($pecah=mysqli_fetch_array($ambil)){?>
				
			<tr>
				<td><?php echo $nomor; ?> </td>
				<td><?php echo $pecah['nama_show']; ?> </td>
				<td><?php echo $pecah['jumlah']; ?></td>
				<td>Rp. <?php echo number_format($pecah['total']*$pecah['jumlah']); ?> </td>
			</tr>
			<?php $total+=($pecah['total']*$pecah['total']);?>
			<?php $nomor++ ?>
			<?php } ?>
		</tbody>
	<tfoot>
		<tr>
			<th colspan="4"><center> Jumlah </th>
			<th>Rp.<?php echo number_format( $total)?>
		</tr>
		</tfoot>
	</table>
	
<tr>
                <td colspan="4" align="center"> 
                <?php
	                //jika pencarian data tidak ditemukan
	                if(mysqli_num_rows($ambil)==0)
	                {
	                	echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
	                }
	            ?>
                </td>
            </tr> 
        </table>
<?php
    }
    else
    {
        unset($_POST['proses']);
    }
?>