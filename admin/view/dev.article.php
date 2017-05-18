		<?php
		if (empty($_GET['act'])){
		 ?>
					<div class="the-box">
  <a href="./?page=post" class="btn btn-info">Add article</a>
	<hr>
						<div class="table-responsive">
							<table class="table table-striped table-hover" id="datatable-example">
							<thead class="the-box dark full">
									<tr><th style="width: 30px;">No</th><th>Judul</th><th>Category</th><th>Action</th></tr>
								</thead>
								<tbody>
									<?php
											$no=1;
											$a=mysqli_query($con, "select * from module,kategori where module.id_kategori=kategori.id_kategori order by id_module desc");
											while($r=mysqli_fetch_array($a)){
												 ?>
									<tr>
										<td><?php echo "$no"; ?></td>
										<td><?php echo "$r[judul]"; ?></td>
										<td><?php echo "$r[nama_kategori]"; ?></td>
										<td>
											<a href="./?page=article&act=edit&id=<?php echo "$r[id_module]";?>" class="btn btn-info"><i class='fa fa-edit'></i> Edit </a>
											<a href="./?page=article&act=delete&id=<?php echo "$r[id_module]";?>" class="btn btn-danger"><i class='fa fa-codepen'></i> Delete </a>

										</td>
									</tr>
										<?php
										$no++;
										}
										 ?>
								</tbody>
							</table>
						</div><!-- /.table-responsive -->
					</div><!-- /.the-box -->
					<?php
				}
				elseif ($_GET['act'] == 'delete'){

					$query ="delete from module where id_module='$_GET[id]'";
				  mysqli_query($con, $query);
					echo "<center><h4>article sudah terdelete <a href='./?page=article'>Kembali</a></h4>";
					echo "<p>Query: $query </center>";


				}elseif ($_GET['act'] == 'edit'){
					// action post edit
					if($_POST){
					  include "control/fungsi_seo.php";
					  $desc=$_POST['desc'];
					  $key=$_POST['key'];
					  $category=$_POST['category'];
					  $title=$_POST['title'];
					  $img=$_POST['img'];
					  $desc=$_POST['desc'];
					  $content=$_POST['content'];
					  $judul_seo=seo_title($_POST['title']);
					  $tanggal=date('Y-m-d');
					  $query ="update module set deskripsi	='$desc',
																				keyword		='$key',
																				id_kategori	='$category',
																				judul			='$title',
																				gambar				='$img',
																				deskripsi	='$desc',
																				isi_module='$content',
																				judul_seo	='$judul_seo',
																				tanggal		='$tanggal'
																	where id_module	='$_GET[id]'";
					  														mysqli_query($con, $query);
																				echo "<center><h4>article berhasil di update <a href='./?page=article'>Kembali</a></h4></center>";

						// =====================================================
					    }
							$module=mysqli_fetch_array(mysqli_query($con,"select * from module,kategori where module.id_kategori=kategori.id_kategori and id_module=$_GET[id]"));
					 ?>

					 <form method="post" action="">
	         <div class="the-box">
	               <div class="form-group">
	                   <label>Title</label>
	                   <input type="text" name='title' class="form-control" value="<?php echo $module['judul'];?>">
	               </div>
	               <div class="form-group">
	                   <label>Description</label>
	                 <textarea name='desc' class="form-control rounded" ><?php echo $module['deskripsi'];?></textarea>

	               </div>
	               <div class="form-group">
	                   <label>keyword</label>
	                   <input type="text" name='key' class="form-control" placeholder="Placeholder here" value='<?php echo $module['keyword'];?>'>
	                   <p class="help-block">Pisahkan dengan tanda koma</p>

	               </div>
	               <div class="form-group">
	                   <label>Category</label>
	                   <select name='category' data-placeholder="chose category" class="form-control chosen-select" tabindex="2" >
	 										<option value="<?php echo $module['id_kategori'];?>"><?php echo $module['nama_kategori'];?></option>
	                     <?php
	                     $c=mysqli_query($con, "select * from kategori");
	                     while($r=mysqli_fetch_array($c)){
	                       echo "<option value='$r[id_kategori]'> $r[nama_kategori] </option>";
	                     }

	                     ?>

	 									</select>

	               </div>
	               <div class="form-group">
	                   <label>Image header</label>
										 <p><img src='<?php echo $module['gambar'];?>' />
	                   <input type="text" name='img' class="form-control" placeholder="Link image" value='<?php echo $module['gambar'];?>'>
	                   <p class="help-block">ambil link gambar dari google / sumber lainya</p>
	               </div>

	 						<h4 class="small-title">Content</h4>
	 						<form role="form">
	 							<textarea class="summernote-lg" name='content' ><?php echo $module['isi_module'];?></textarea>
	 						</form>
	             <div class="form-group">

	                 <button type="submit" class="btn btn-info">Post Now</button>


	             </div>

	 					</div><!-- /.the-box -->
	         </form>

					 <?php
				 			}
					  ?>
