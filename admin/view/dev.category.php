<?php
if (empty($_GET['act'])){
 ?>
      <div class="the-box">
        <a href="./?page=category&act=add" class="btn btn-info">Add Category</a>
        <hr>
        <div class="table-responsive">
          <table class="table table-striped table-hover" id="datatable-example">
          <thead class="the-box dark full">
              <tr><th style="width: 30px;">No</th><th>Category Name</th><th>Seo Category</th><th>Action</th></tr>
            </thead>
            <tbody>
              <?php
                  $no=1;
                  $a=mysqli_query($con, "select * from kategori ");
                  while($r=mysqli_fetch_array($a)){
                     ?>
              <tr>
                <td><?php echo "$no"; ?></td>
                <td><?php echo "$r[nama_kategori]"; ?></td>
                <td><?php echo "$r[kategori_seo]"; ?></td>
                <td>
                  <a href="./?page=category&act=edit&id=<?php echo "$r[id_kategori]";?>" class="btn btn-info"><i class='fa fa-edit'></i> Edit </a>
                  <a href="./?page=category&act=delete&id=<?php echo "$r[id_kategori]";?>" class="btn btn-danger"><i class='fa fa-codepen'></i> Delete </a>

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

      $query ="delete from kategori where id_kategori='$_GET[id]'";
      mysqli_query($con, $query);
      echo "<center><h4>category sudah terdelete <a href='./?page=category'>Kembali</a></h4>";
      echo "</center>";


    }elseif ($_GET['act'] == 'edit'){
      // action post edit
      if($_POST){
        include "control/fungsi_seo.php";

        $title=$_POST['title'];
        $judul_seo=seo_title($_POST['title']);

        $query ="update kategori set nama_kategori='$title', kategori_seo='$judul_seo' where id_kategori='$_GET[id]' ";
                                    mysqli_query($con, $query);
                                    echo "<center><h4>category berhasil di update <a href='./?page=category'>Kembali</a></h4></center>";

        // =====================================================
          }
          $module=mysqli_fetch_array(mysqli_query($con,"select * from kategori where id_kategori=$_GET[id]"));
       ?>

       <form method="post" action="">
       <div class="the-box">
             <div class="form-group">
                 <label>Title</label>
                 <input type="text" name='title' class="form-control" value="<?php echo $module['nama_kategori'];?>">
             </div>

           <div class="form-group">

               <button type="submit" class="btn btn-info">Update Now</button>


           </div>

        </div><!-- /.the-box -->
       </form>

       <?php
        }elseif ($_GET['act'] == 'add'){
          if($_POST){
            include "control/fungsi_seo.php";
            $title=$_POST['title'];
            $judul_seo=seo_title($_POST['title']);
            $query ="insert into kategori (nama_kategori,kategori_seo) values ('$title','$judul_seo') ";
            mysqli_query($con, $query);
            echo "<center><h4>category berhasil di update <a href='./?page=category'>Kembali</a></h4></center>";

            // =====================================================
              }
        ?>
        <form method="post" action="">
        <div class="the-box">
              <div class="form-group">
                  <label>Title</label>
                  <input type="text" name='title' class="form-control" value="">
              </div>

            <div class="form-group">

                <button type="submit" class="btn btn-info">Add category</button>


            </div>

         </div><!-- /.the-box -->
        </form>
        <?php
        }
         ?>
