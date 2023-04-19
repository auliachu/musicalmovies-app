<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active"> Ubah Musikal </li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"> Ubah Musikal </h1>
			</div>
		</div><!--/.row-->

<?php
$ambil=$koneksi->query("SELECT * FROM musikal WHERE id_jenisshow='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> ID Musikal </label>
		<input type="text" class="form-control" name="id_jenisshow" value="<?php echo $pecah['id_jenisshow'];?>">
	</div>
	<div class="form-group">
		<label> Nama Musikal </label>
		<input type="text" class="form-control" name="nama_show" value="<?php echo $pecah['nama_show'];?>">
	</div>
	<div class="form-group">
		<label> Keterangan Musikal </label>
		<input type="text" class="form-control" name="keterangan_show" value="<?php echo $pecah['keterangan_show'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE musikal SET id_jenisshow='$_POST[id_jenisshow]',nama_show='$_POST[nama_show]',keterangan_show='$_POST[keterangan_show]' WHERE id_jenisshow='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=musikal';</script>";
}

?>