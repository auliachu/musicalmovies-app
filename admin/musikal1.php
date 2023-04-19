  <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             TABEL FILM
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id_film</th>
                                            <th>Judul Film</th>
											<th>Keterangan</th>
										    <th>Foto</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php
									
										$sql=@$koneksi->query("select * from musikal");
										while ($data=$sql->fetch_assoc()){
											
										?>
									<tr>
										<td><?php echo $data['id_musikal'];?></td>
										<td><?php echo $data['nama_musikal'];?></td>
										<td><?php echo $data['Deskripsi'];?></td>
										<td><?php echo $data['Foto'];?></td>
										<td>
											<a href="?page=film&aksi=ubah&Id_film=<?php echo $data['Id_film']?>" class="btn btn-info" ><i class="fa fa-edit "></i>Edit</a>
											<a onclick="return confirm('Apakah anda yakin ingin menghapus data ini..??')"
											href="?page=film&aksi=hapus&Id_film=<?php echo $data['Id_film']?>" class="btn btn-danger" ><i class="fa fa-pencil"></i>Hapus</a>
										</td>
									</tr>
										<?php }?>
									</tbody>
								</table>
								<a href ="?page=film&aksi=tambah" class="btn btn-primary" >Tambah</a>
								</div>