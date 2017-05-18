<?php
if (empty($_GET['act'])){
 ?>
      <div class="the-box">
        <a href="./?page=youtube&act=add" class="btn btn-info">Add youtube</a>
        <hr>
        <div class="table-responsive">
          <table class="table table-striped table-hover" id="datatable-example">
          <thead class="the-box dark full">
              <tr><th style="width: 30px;">No</th><th>Title</th><th>Link Youtube</th><th>Action</th></tr>
            </thead>
            <tbody>
              <?php
                  $no=1;
                  $a=mysqli_query($con, "select * from link where category='youtube'");
                  while($r=mysqli_fetch_array($a)){
                     ?>
              <tr>
                <td><?php echo "$no"; ?></td>
                <td><i class="fa fa-youtube"></i> <?php echo "$r[name]"; ?></td>
                <td><a href='<?php echo "$r[link]"; ?>' target="_blank"><?php echo "$r[link]"; ?></td>
                <td>
                  <a href="./?page=youtube&act=edit&id=<?php echo "$r[id_link]";?>" class="btn btn-info"><i class='fa fa-edit'></i> Edit </a>
                  <a href="./?page=youtube&act=delete&id=<?php echo "$r[id_link]";?>" class="btn btn-danger"><i class='fa fa-codepen'></i> Delete </a>

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

      $query ="delete from link where id_link='$_GET[id]'";
      mysqli_query($con, $query);
      echo "<center><h4>youtube sudah terdelete <a href='./?page=youtube'>Kembali</a></h4>";
      echo "</center>";


    }elseif ($_GET['act'] == 'edit'){
      // action post edit
      if($_POST){
        include "control/fungsi_seo.php";

        $title=$_POST['title'];
        $judul_seo=seo_title($_POST['title']);
        $link=$_POST['link'];
        $query ="update link set name='$title', link='$link' where id_link='$_GET[id]' ";
                                    mysqli_query($con, $query);
                                    echo "<center><h4>youtube berhasil di update <a href='./?page=youtube'>Kembali</a></h4></center>";

        // =====================================================
          }
          $module=mysqli_fetch_array(mysqli_query($con,"select * from link where id_link=$_GET[id]"));
       ?>

       <form method="post" action="">
       <div class="the-box">
             <div class="form-group">
                 <label>Title</label>
                 <input type="text" name='title' class="form-control" value="<?php echo $module['name'];?>">
             </div>
             <div class="form-group">
                 <label>Link youtube</label>
                 <input type="text" name='link' class="form-control" value="<?php echo $module['link'];?>">
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
            $link=$_POST['link'];
            $judul_seo=seo_title($_POST['title']);
            $query ="insert into link (name,link,category) values ('$title','$link','youtube') ";
            mysqli_query($con, $query);
            echo "<center><h4>youtube berhasil di tambah <a href='./?page=youtube'>Kembali</a></h4></center>";

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
                  <label>link Youtube</label>
                  <input type="text" name='link' class="form-control" value="">
              </div>

            <div class="form-group">

                <button type="submit" class="btn btn-info">Add youtube</button>


            </div>

         </div><!-- /.the-box -->
        </form>
        <?php
        }
         ?>
