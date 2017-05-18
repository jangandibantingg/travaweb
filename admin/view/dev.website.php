<?php

if($_POST['title']){
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
  $link=$_POST['link'];
  $theme=$_POST['theme'];
  $query ="update web set nama_web    ='$title',
                          link        ='$link',
                          deskripsi   ='$desc',
                          theme       ='$theme',
                          keyword     ='$key'
                    where id_web      ='1'";
  mysqli_query($con, $query);

    }
    if($_FILES['fupload']){
      include "control/fungsi_thumb.php";
      $lokasi_file = $_FILES['fupload']['tmp_name'];
      $nama_file   = $_FILES['fupload']['name'];
      UploadHeader($nama_file);
      $query ="update web set logo='$nama_file' where id_web='1'";
      mysqli_query($con, $query);
      echo "logo has been change";
    }
$web=mysqli_fetch_array(mysqli_query($con, "select * from web where id_web='1'"));

 ?>

        <form method="post" action="">
        <div class="the-box">
              <div class="form-group">
                  <label>Website Name</label>
                  <input type="text" name='title' class="form-control" value="<?php echo $web['nama_web'];?>">
              </div>
              <div class="form-group">
                  <label>Description</label>
                <textarea name='desc' class="form-control rounded" ><?php echo $web['deskripsi'];?></textarea>

              </div>
              <div class="form-group">
                  <label>keyword</label>
                  <input type="text" name='key' class="form-control" placeholder="Placeholder here" value="<?php echo $web['keyword'];?>">
                  <p class="help-block">Pisahkan dengan tanda koma</p>

              </div>
              <div class="form-group">
                  <label>link Website</label>
                  <input type="text" name='link' class="form-control" placeholder="Placeholder here" value="<?php echo $web['link'];?>">


              </div>
              <div class="form-group">
                  <label>theme</label>
                  <input type="text" name='theme' class="form-control" placeholder="Placeholder here" value="<?php echo $web['theme'];?>">


              </div>


            <div class="form-group">

                <button type="submit" class="btn btn-info">Submit</button>


            </div>

					</div><!-- /.the-box -->
        </form>
        <form method="post" action="" enctype='multipart/form-data'>
        <div class="the-box">

              <div class="form-group">
                  <label>Logo Website</label>
                  <p><img src='library/file/<?php echo $web['logo'];?>'>
                  <input type="file" name='fupload' class="form-control">
              </div>


            <div class="form-group">

                <button type="submit" class="btn btn-info">Submit</button>


            </div>

          </div><!-- /.the-box -->
        </form>
