<?php

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
  $query ="insert into module (judul,keyword,isi_module,gambar,tanggal,judul_seo,id_kategori,deskripsi)
           values ('$title','$key','$content','$img','$tanggal','$judul_seo','$category','$desc')";
  mysqli_query($con, $query);

    }


 ?>

        <form method="post" action="">
        <div class="the-box">
              <div class="form-group">
                  <label>Title</label>
                  <input type="text" name='title' class="form-control">
              </div>
              <div class="form-group">
                  <label>Description</label>
                <textarea name='desc' class="form-control rounded"></textarea>

              </div>
              <div class="form-group">
                  <label>keyword</label>
                  <input type="text" name='key' class="form-control" placeholder="Placeholder here">
                  <p class="help-block">Pisahkan dengan tanda koma</p>

              </div>
              <div class="form-group">
                  <label>Category</label>
                  <select name='category' data-placeholder="chose category" class="form-control chosen-select" tabindex="2">
										<option value="">Chose Category</option>
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
                  <input type="text" name='img' class="form-control" placeholder="Link image">
                  <p class="help-block">ambil ling gambar dari google / sumber lainya</p>
              </div>

						<h4 class="small-title">Content</h4>
						<form role="form">
							<textarea class="summernote-lg" name='content'></textarea>
						</form>
            <div class="form-group">

                <button type="submit" class="btn btn-info">Post Now</button>


            </div>

					</div><!-- /.the-box -->
        </form>
