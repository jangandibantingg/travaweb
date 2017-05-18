<?php
if (empty($_GET['act'])){
 ?>
      <div class="the-box">
        <a href="./?page=nav&act=add" class="btn btn-info">Add nav</a>
        <hr>
        <div class="table-responsive">
          <table class="table table-striped table-hover" id="datatable-example">
          <thead class="the-box dark full">
              <tr><th style="width: 30px;">No</th><th>Title</th><th>Link nav</th><th>Action</th></tr>
            </thead>
            <tbody>
              <?php
                  $no=1;
                  $a=mysqli_query($con, "select * from menu order by ascending asc");
                  while($r=mysqli_fetch_array($a)){
                     ?>
              <tr>
                <td><?php echo "$no"; ?></td>
                <td><i class="<?php echo "$r[icon]"; ?>"></i> <?php echo "$r[nama_menu]"; ?></td>
                <td><a href='<?php echo "$web[link]/$r[link]"; ?>' target="_blank"><?php echo "$r[link]"; ?></td>
                <td>
                  <a href="./?page=nav&act=edit&id=<?php echo "$r[id_menu]";?>" class="btn btn-info"><i class='fa fa-edit'></i> Edit </a>
                  <a href="./?page=nav&act=delete&id=<?php echo "$r[id_menu]";?>" class="btn btn-danger"><i class='fa fa-navpen'></i> Delete </a>

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

      $query ="delete from menu where id_menu='$_GET[id]'";
      mysqli_query($con, $query);
      echo "<center><h4>nav sudah terdelete <a href='./?page=nav'>Kembali</a></h4>";
      echo "</center>";


    }elseif ($_GET['act'] == 'edit'){
      // action post edit
      if($_POST){
        include "control/fungsi_seo.php";

        $title=$_POST['title'];
        $judul_seo=seo_title($_POST['title']);
        $link=$_POST['link'];
        $icon=$_POST['icon'];
        $ascending=$_POST['ascending'];
        $query ="update menu set nama_menu='$title', menu_seo='$judul_seo', link='$link', icon='$icon', ascending='$ascending' where id_menu='$_GET[id]' ";
                                    mysqli_query($con, $query);
                                    echo "<center><h4>nav berhasil di update <a href='./?page=nav'>Kembali</a></h4></center>";

        // =====================================================
          }
          $module=mysqli_fetch_array(mysqli_query($con,"select * from menu where id_menu=$_GET[id]"));
       ?>

       <form method="post" action="">
         <div class="the-box">
             <div class="form-group">
                 <label>Title</label>
                 <input type="text" name='title' class="form-control" value="<?php echo $module['nama_menu'];?>">
             </div>
             <div class="form-group">
                 <label>Link nav</label>
                 <input type="text" name='link' class="form-control" value="<?php echo $module['link'];?>">
             </div>
             <div class="form-group">
                 <label>icon nav</label>
                 <textarea name="icon" class="form-control rounded"><?php echo $module['icon'];?></textarea>
             </div>
             <div class="form-group">
                 <label>ascending</label>
                 <input type="text" name='ascending' class="form-control" value="<?php echo $module['ascending'];?>">
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
            $icon=$_POST['icon'];
            $query ="insert into menu (nama_menu,menu_seo,link,icon) values ('$title','$link','$judul_seo','$icon') ";
            mysqli_query($con, $query);
            echo "<center><h4>nav berhasil di tambah <a href='./?page=nav'>Kembali</a></h4></center>";

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
                  <label>link nav</label>
                  <input type="text" name='link' class="form-control" value="">
              </div>
              <div class="form-group">
                  <label>icon nav</label>
                  <textarea name="icon" class="form-control rounded">fa fa-code</textarea>
              </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info">Add nav</button>
            </div>

         </div><!-- /.the-box -->
        </form>


        <?php
        }
        if($_GET['act'] == 'add' || $_GET['act'] == 'edit'){
         ?>
         <h4 class="small-title">Chose icon nav</h4>
                 <div class="icon-showcase">
                   <h4>Version 4.3</h4>
                   <div class="row">
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-automobile"></i> fa-automobile <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bank"></i> fa-bank <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-behance"></i> fa-behance</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-behance-square"></i> fa-behance-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bomb"></i> fa-bomb</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-building"></i> fa-building</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cab"></i> fa-cab <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-car"></i> fa-car</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-child"></i> fa-child</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-circle-o-notch"></i> fa-circle-o-notch</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-circle-thin"></i> fa-circle-thin</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-codepen"></i> fa-codepen</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cube"></i> fa-cube</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cubes"></i> fa-cubes</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-database"></i> fa-database</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-delicious"></i> fa-delicious</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-deviantart"></i> fa-deviantart</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-digg"></i> fa-digg</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-drupal"></i> fa-drupal</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-empire"></i> fa-empire</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-envelope-square"></i> fa-envelope-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-fax"></i> fa-fax</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-archive-o"></i> fa-file-archive-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-audio-o"></i> fa-file-audio-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-code-o"></i> fa-file-code-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-excel-o"></i> fa-file-excel-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-image-o"></i> fa-file-image-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-movie-o"></i> fa-file-movie-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-pdf-o"></i> fa-file-pdf-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-photo-o"></i> fa-file-photo-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-picture-o"></i> fa-file-picture-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-powerpoint-o"></i> fa-file-powerpoint-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-sound-o"></i> fa-file-sound-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-video-o"></i> fa-file-video-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-word-o"></i> fa-file-word-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-zip-o"></i> fa-file-zip-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-ge"></i> fa-ge <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-git"></i> fa-git</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-git-square"></i> fa-git-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-google"></i> fa-google</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-graduation-cap"></i> fa-graduation-cap</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-hacker-news"></i> fa-hacker-news</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-header"></i> fa-header</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-history"></i> fa-history</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-institution"></i> fa-institution <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-joomla"></i> fa-joomla</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-jsfiddle"></i> fa-jsfiddle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-language"></i> fa-language</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-life-bouy"></i> fa-life-bouy <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-life-ring"></i> fa-life-ring</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-life-saver"></i> fa-life-saver <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-mortar-board"></i> fa-mortar-board <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-openid"></i> fa-openid</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-paper-plane"></i> fa-paper-plane</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-paper-plane-o"></i> fa-paper-plane-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-paragraph"></i> fa-paragraph</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-paw"></i> fa-paw</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-pied-piper"></i> fa-pied-piper</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-pied-piper-alt"></i> fa-pied-piper-alt</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-pied-piper-square"></i> fa-pied-piper-square <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-qq"></i> fa-qq</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-ra"></i> fa-ra <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-rebel"></i> fa-rebel</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-recycle"></i> fa-recycle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-reddit"></i> fa-reddit</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-reddit-square"></i> fa-reddit-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-send"></i> fa-send <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-send-o"></i> fa-send-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-share-alt"></i> fa-share-alt</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-share-alt-square"></i> fa-share-alt-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-slack"></i> fa-slack</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sliders"></i> fa-sliders</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-soundcloud"></i> fa-soundcloud</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-space-shuttle"></i> fa-space-shuttle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-spoon"></i> fa-spoon</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-spotify"></i> fa-spotify</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-steam"></i> fa-steam</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-steam-square"></i> fa-steam-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-stumbleupon"></i> fa-stumbleupon</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-stumbleupon-circle"></i> fa-stumbleupon-circle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-support"></i> fa-support <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-taxi"></i> fa-taxi</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-tencent-weibo"></i> fa-tencent-weibo</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-tree"></i> fa-tree</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-university"></i> fa-university</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-vine"></i> fa-vine</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-wechat"></i> fa-wechat <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-weixin"></i> fa-weixin</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-wordpress"></i> fa-wordpress</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-yahoo"></i> fa-yahoo</p></div>
                   </div>

                   <hr />

                   <h4>Web Application Icons</h4>

                   <div class="row">
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-adjust"></i> fa-adjust</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-anchor"></i> fa-anchor</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-archive"></i> fa-archive</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrows"></i> fa-arrows</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrows-h"></i> fa-arrows-h</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrows-v"></i> fa-arrows-v</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-asterisk"></i> fa-asterisk</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-automobile"></i> fa-automobile <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-ban"></i> fa-ban</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bank"></i> fa-bank <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bar-chart-o"></i> fa-bar-chart-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-barcode"></i> fa-barcode</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bars"></i> fa-bars</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-beer"></i> fa-beer</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bell"></i> fa-bell</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bell-o"></i> fa-bell-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bolt"></i> fa-bolt</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bomb"></i> fa-bomb</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-book"></i> fa-book</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bookmark"></i> fa-bookmark</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bookmark-o"></i> fa-bookmark-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-briefcase"></i> fa-briefcase</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bug"></i> fa-bug</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-building"></i> fa-building</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-building-o"></i> fa-building-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bullhorn"></i> fa-bullhorn</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bullseye"></i> fa-bullseye</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cab"></i> fa-cab <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-calendar"></i> fa-calendar</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-calendar-o"></i> fa-calendar-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-camera"></i> fa-camera</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-camera-retro"></i> fa-camera-retro</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-car"></i> fa-car</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-caret-square-o-down"></i> fa-caret-square-o-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-caret-square-o-left"></i> fa-caret-square-o-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-caret-square-o-right"></i> fa-caret-square-o-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-caret-square-o-up"></i> fa-caret-square-o-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-certificate"></i> fa-certificate</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-check"></i> fa-check</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-check-circle"></i> fa-check-circle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-check-circle-o"></i> fa-check-circle-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-check-square"></i> fa-check-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-check-square-o"></i> fa-check-square-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-child"></i> fa-child</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-circle"></i> fa-circle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-circle-o"></i> fa-circle-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-circle-o-notch"></i> fa-circle-o-notch</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-circle-thin"></i> fa-circle-thin</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-clock-o"></i> fa-clock-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cloud"></i> fa-cloud</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cloud-download"></i> fa-cloud-download</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cloud-upload"></i> fa-cloud-upload</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-code"></i> fa-code</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-code-fork"></i> fa-code-fork</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-coffee"></i> fa-coffee</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cog"></i> fa-cog</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cogs"></i> fa-cogs</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-comment"></i> fa-comment</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-comment-o"></i> fa-comment-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-comments"></i> fa-comments</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-comments-o"></i> fa-comments-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-compass"></i> fa-compass</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-credit-card"></i> fa-credit-card</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-crop"></i> fa-crop</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-crosshairs"></i> fa-crosshairs</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cube"></i> fa-cube</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cubes"></i> fa-cubes</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cutlery"></i> fa-cutlery</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-dashboard"></i> fa-dashboard <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-database"></i> fa-database</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-desktop"></i> fa-desktop</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-dot-circle-o"></i> fa-dot-circle-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-download"></i> fa-download</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-edit"></i> fa-edit <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-ellipsis-h"></i> fa-ellipsis-h</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-ellipsis-v"></i> fa-ellipsis-v</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-envelope"></i> fa-envelope</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-envelope-o"></i> fa-envelope-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-envelope-square"></i> fa-envelope-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-eraser"></i> fa-eraser</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-exchange"></i> fa-exchange</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-exclamation"></i> fa-exclamation</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-exclamation-circle"></i> fa-exclamation-circle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-exclamation-triangle"></i> fa-exclamation-triangle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-external-link"></i> fa-external-link</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-external-link-square"></i> fa-external-link-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-eye"></i> fa-eye</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-eye-slash"></i> fa-eye-slash</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-fax"></i> fa-fax</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-female"></i> fa-female</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-fighter-jet"></i> fa-fighter-jet</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-archive-o"></i> fa-file-archive-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-audio-o"></i> fa-file-audio-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-code-o"></i> fa-file-code-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-excel-o"></i> fa-file-excel-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-image-o"></i> fa-file-image-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-movie-o"></i> fa-file-movie-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-pdf-o"></i> fa-file-pdf-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-photo-o"></i> fa-file-photo-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-picture-o"></i> fa-file-picture-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-powerpoint-o"></i> fa-file-powerpoint-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-sound-o"></i> fa-file-sound-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-video-o"></i> fa-file-video-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-word-o"></i> fa-file-word-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-zip-o"></i> fa-file-zip-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-film"></i> fa-film</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-filter"></i> fa-filter</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-fire"></i> fa-fire</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-fire-extinguisher"></i> fa-fire-extinguisher</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-flag"></i> fa-flag</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-flag-checkered"></i> fa-flag-checkered</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-flag-o"></i> fa-flag-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-flash"></i> fa-flash <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-flask"></i> fa-flask</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-folder"></i> fa-folder</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-folder-o"></i> fa-folder-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-folder-open"></i> fa-folder-open</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-folder-open-o"></i> fa-folder-open-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-frown-o"></i> fa-frown-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-gamepad"></i> fa-gamepad</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-gavel"></i> fa-gavel</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-gear"></i> fa-gear <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-gears"></i> fa-gears <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-gift"></i> fa-gift</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-glass"></i> fa-glass</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-globe"></i> fa-globe</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-graduation-cap"></i> fa-graduation-cap</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-group"></i> fa-group <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-hdd-o"></i> fa-hdd-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-headphones"></i> fa-headphones</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-heart"></i> fa-heart</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-heart-o"></i> fa-heart-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-history"></i> fa-history</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-home"></i> fa-home</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-image"></i> fa-image <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-inbox"></i> fa-inbox</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-info"></i> fa-info</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-info-circle"></i> fa-info-circle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-institution"></i> fa-institution <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-key"></i> fa-key</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-keyboard-o"></i> fa-keyboard-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-language"></i> fa-language</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-laptop"></i> fa-laptop</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-leaf"></i> fa-leaf</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-legal"></i> fa-legal <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-lemon-o"></i> fa-lemon-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-level-down"></i> fa-level-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-level-up"></i> fa-level-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-life-bouy"></i> fa-life-bouy <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-life-ring"></i> fa-life-ring</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-life-saver"></i> fa-life-saver <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-lightbulb-o"></i> fa-lightbulb-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-location-arrow"></i> fa-location-arrow</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-lock"></i> fa-lock</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-magic"></i> fa-magic</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-magnet"></i> fa-magnet</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-mail-forward"></i> fa-mail-forward <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-mail-reply"></i> fa-mail-reply <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-mail-reply-all"></i> fa-mail-reply-all <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-male"></i> fa-male</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-map-marker"></i> fa-map-marker</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-meh-o"></i> fa-meh-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-microphone"></i> fa-microphone</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-microphone-slash"></i> fa-microphone-slash</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-minus"></i> fa-minus</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-minus-circle"></i> fa-minus-circle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-minus-square"></i> fa-minus-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-minus-square-o"></i> fa-minus-square-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-mobile"></i> fa-mobile</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-mobile-phone"></i> fa-mobile-phone <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-money"></i> fa-money</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-moon-o"></i> fa-moon-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-mortar-board"></i> fa-mortar-board <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-music"></i> fa-music</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-navicon"></i> fa-navicon <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-paper-plane"></i> fa-paper-plane</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-paper-plane-o"></i> fa-paper-plane-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-paw"></i> fa-paw</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-pencil"></i> fa-pencil</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-pencil-square"></i> fa-pencil-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-pencil-square-o"></i> fa-pencil-square-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-phone"></i> fa-phone</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-phone-square"></i> fa-phone-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-photo"></i> fa-photo <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-picture-o"></i> fa-picture-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-plane"></i> fa-plane</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-plus"></i> fa-plus</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-plus-circle"></i> fa-plus-circle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-plus-square"></i> fa-plus-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-plus-square-o"></i> fa-plus-square-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-power-off"></i> fa-power-off</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-print"></i> fa-print</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-puzzle-piece"></i> fa-puzzle-piece</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-qrcode"></i> fa-qrcode</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-question"></i> fa-question</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-question-circle"></i> fa-question-circle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-quote-left"></i> fa-quote-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-quote-right"></i> fa-quote-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-random"></i> fa-random</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-recycle"></i> fa-recycle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-refresh"></i> fa-refresh</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-reorder"></i> fa-reorder <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-reply"></i> fa-reply</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-reply-all"></i> fa-reply-all</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-retweet"></i> fa-retweet</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-road"></i> fa-road</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-rocket"></i> fa-rocket</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-rss"></i> fa-rss</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-rss-square"></i> fa-rss-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-search"></i> fa-search</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-search-minus"></i> fa-search-minus</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-search-plus"></i> fa-search-plus</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-send"></i> fa-send <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-send-o"></i> fa-send-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-share"></i> fa-share</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-share-alt"></i> fa-share-alt</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-share-alt-square"></i> fa-share-alt-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-share-square"></i> fa-share-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-share-square-o"></i> fa-share-square-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-shield"></i> fa-shield</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-shopping-cart"></i> fa-shopping-cart</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sign-in"></i> fa-sign-in</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sign-out"></i> fa-sign-out</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-signal"></i> fa-signal</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sitemap"></i> fa-sitemap</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sliders"></i> fa-sliders</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-smile-o"></i> fa-smile-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sort"></i> fa-sort</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sort-alpha-asc"></i> fa-sort-alpha-asc</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sort-alpha-desc"></i> fa-sort-alpha-desc</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sort-amount-asc"></i> fa-sort-amount-asc</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sort-amount-desc"></i> fa-sort-amount-desc</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sort-asc"></i> fa-sort-asc</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sort-desc"></i> fa-sort-desc</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sort-down"></i> fa-sort-down <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sort-numeric-asc"></i> fa-sort-numeric-asc</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sort-numeric-desc"></i> fa-sort-numeric-desc</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sort-up"></i> fa-sort-up <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-space-shuttle"></i> fa-space-shuttle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-spinner"></i> fa-spinner</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-spoon"></i> fa-spoon</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-square"></i> fa-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-square-o"></i> fa-square-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-star"></i> fa-star</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-star-half"></i> fa-star-half</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-star-half-empty"></i> fa-star-half-empty <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-star-half-full"></i> fa-star-half-full <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-star-half-o"></i> fa-star-half-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-star-o"></i> fa-star-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-suitcase"></i> fa-suitcase</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-sun-o"></i> fa-sun-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-support"></i> fa-support <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-tablet"></i> fa-tablet</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-tachometer"></i> fa-tachometer</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-tag"></i> fa-tag</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-tags"></i> fa-tags</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-tasks"></i> fa-tasks</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-taxi"></i> fa-taxi</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-terminal"></i> fa-terminal</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-thumb-tack"></i> fa-thumb-tack</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-thumbs-down"></i> fa-thumbs-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-thumbs-o-down"></i> fa-thumbs-o-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-thumbs-o-up"></i> fa-thumbs-o-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-thumbs-up"></i> fa-thumbs-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-ticket"></i> fa-ticket</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-times"></i> fa-times</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-times-circle"></i> fa-times-circle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-times-circle-o"></i> fa-times-circle-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-tint"></i> fa-tint</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-toggle-down"></i> fa-toggle-down <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-toggle-left"></i> fa-toggle-left <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-toggle-right"></i> fa-toggle-right <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-toggle-up"></i> fa-toggle-up <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-trash-o"></i> fa-trash-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-tree"></i> fa-tree</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-trophy"></i> fa-trophy</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-truck"></i> fa-truck</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-umbrella"></i> fa-umbrella</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-university"></i> fa-university</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-unlock"></i> fa-unlock</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-unlock-alt"></i> fa-unlock-alt</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-unsorted"></i> fa-unsorted <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-upload"></i> fa-upload</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-user"></i> fa-user</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-users"></i> fa-users</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-video-camera"></i> fa-video-camera</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-volume-down"></i> fa-volume-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-volume-off"></i> fa-volume-off</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-volume-up"></i> fa-volume-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-warning"></i> fa-warning <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-wheelchair"></i> fa-wheelchair</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-wrench"></i> fa-wrench</p></div>
                   </div>

                   <hr />

                   <h4>File Type Icons</h4>
                   <div class="row">
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file"></i> fa-file</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-archive-o"></i> fa-file-archive-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-audio-o"></i> fa-file-audio-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-code-o"></i> fa-file-code-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-excel-o"></i> fa-file-excel-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-image-o"></i> fa-file-image-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-movie-o"></i> fa-file-movie-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-o"></i> fa-file-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-pdf-o"></i> fa-file-pdf-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-photo-o"></i> fa-file-photo-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-picture-o"></i> fa-file-picture-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-powerpoint-o"></i> fa-file-powerpoint-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-sound-o"></i> fa-file-sound-o <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-text"></i> fa-file-text</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-text-o"></i> fa-file-text-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-video-o"></i> fa-file-video-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-word-o"></i> fa-file-word-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-zip-o"></i> fa-file-zip-o <span class="text-muted">(alias)</span></p></div>
                   </div>

                   <hr />

                   <h4>Spinner Icons</h4>
                   <div class="alert alert-success">
                     <i class="fa fa-info-circle"></i>
                     These icons work great with the <code>fa-spin</code> class. Check out the
                     <a href="" class="alert-link">spinning icons example</a>.
                   </div>

                   <div class="row">
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-circle-o-notch"></i> fa-circle-o-notch</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cog"></i> fa-cog</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-gear"></i> fa-gear <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-refresh"></i> fa-refresh</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-spinner"></i> fa-spinner</p></div>
                   </div>

                   <hr />

                   <h4>Form Control Icons</h4>
                   <div class="row">
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-check-square"></i> fa-check-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-check-square-o"></i> fa-check-square-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-circle"></i> fa-circle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-circle-o"></i> fa-circle-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-dot-circle-o"></i> fa-dot-circle-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-minus-square"></i> fa-minus-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-minus-square-o"></i> fa-minus-square-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-plus-square"></i> fa-plus-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-plus-square-o"></i> fa-plus-square-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-square"></i> fa-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-square-o"></i> fa-square-o</p></div>
                   </div>

                   <hr />

                   <h4>Currency Icons</h4>
                   <div class="row">

                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bitcoin"></i> fa-bitcoin <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-btc"></i> fa-btc</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cny"></i> fa-cny <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-dollar"></i> fa-dollar <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-eur"></i> fa-eur</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-euro"></i> fa-euro <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-gbp"></i> fa-gbp</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-inr"></i> fa-inr</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-jpy"></i> fa-jpy</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-krw"></i> fa-krw</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-money"></i> fa-money</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-rmb"></i> fa-rmb <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-rouble"></i> fa-rouble <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-rub"></i> fa-rub</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-ruble"></i> fa-ruble <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-rupee"></i> fa-rupee <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-try"></i> fa-try</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-turkish-lira"></i> fa-turkish-lira <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-usd"></i> fa-usd</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-won"></i> fa-won <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-yen"></i> fa-yen <span class="text-muted">(alias)</span></p></div>
                   </div>

                   <hr />

                   <h4>Text Editor Icons</h4>

                   <div class="row">
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-align-center"></i> fa-align-center</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-align-justify"></i> fa-align-justify</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-align-left"></i> fa-align-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-align-right"></i> fa-align-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bold"></i> fa-bold</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-chain"></i> fa-chain <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-chain-broken"></i> fa-chain-broken</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-clipboard"></i> fa-clipboard</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-columns"></i> fa-columns</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-copy"></i> fa-copy <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-cut"></i> fa-cut <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-dedent"></i> fa-dedent <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-eraser"></i> fa-eraser</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file"></i> fa-file</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-o"></i> fa-file-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-text"></i> fa-file-text</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-file-text-o"></i> fa-file-text-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-files-o"></i> fa-files-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-floppy-o"></i> fa-floppy-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-font"></i> fa-font</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-header"></i> fa-header</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-indent"></i> fa-indent</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-italic"></i> fa-italic</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-link"></i> fa-link</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-list"></i> fa-list</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-list-alt"></i> fa-list-alt</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-list-ol"></i> fa-list-ol</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-list-ul"></i> fa-list-ul</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-outdent"></i> fa-outdent</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-paperclip"></i> fa-paperclip</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-paragraph"></i> fa-paragraph</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-paste"></i> fa-paste <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-repeat"></i> fa-repeat</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-rotate-left"></i> fa-rotate-left <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-rotate-right"></i> fa-rotate-right <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-save"></i> fa-save <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-scissors"></i> fa-scissors</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-strikethrough"></i> fa-strikethrough</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-subscript"></i> fa-subscript</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-superscript"></i> fa-superscript</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-table"></i> fa-table</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-text-height"></i> fa-text-height</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-text-width"></i> fa-text-width</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-th"></i> fa-th</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-th-large"></i> fa-th-large</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-th-list"></i> fa-th-list</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-underline"></i> fa-underline</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-undo"></i> fa-undo</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-unlink"></i> fa-unlink <span class="text-muted">(alias)</span></p></div>
                   </div>


                   <hr />

                   <h4>Directional Icons</h4>

                   <div class="row">
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-angle-double-down"></i> fa-angle-double-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-angle-double-left"></i> fa-angle-double-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-angle-double-right"></i> fa-angle-double-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-angle-double-up"></i> fa-angle-double-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-angle-down"></i> fa-angle-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-angle-left"></i> fa-angle-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-angle-right"></i> fa-angle-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-angle-up"></i> fa-angle-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrow-circle-down"></i> fa-arrow-circle-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrow-circle-left"></i> fa-arrow-circle-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrow-circle-o-down"></i> fa-arrow-circle-o-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrow-circle-o-left"></i> fa-arrow-circle-o-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrow-circle-o-right"></i> fa-arrow-circle-o-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrow-circle-o-up"></i> fa-arrow-circle-o-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrow-circle-right"></i> fa-arrow-circle-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrow-circle-up"></i> fa-arrow-circle-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrow-down"></i> fa-arrow-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrow-left"></i> fa-arrow-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrow-right"></i> fa-arrow-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrow-up"></i> fa-arrow-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrows"></i> fa-arrows</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrows-alt"></i> fa-arrows-alt</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrows-h"></i> fa-arrows-h</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrows-v"></i> fa-arrows-v</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-caret-down"></i> fa-caret-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-caret-left"></i> fa-caret-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-caret-right"></i> fa-caret-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-caret-square-o-down"></i> fa-caret-square-o-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-caret-square-o-left"></i> fa-caret-square-o-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-caret-square-o-right"></i> fa-caret-square-o-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-caret-square-o-up"></i> fa-caret-square-o-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-caret-up"></i> fa-caret-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-chevron-circle-down"></i> fa-chevron-circle-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-chevron-circle-left"></i> fa-chevron-circle-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-chevron-circle-right"></i> fa-chevron-circle-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-chevron-circle-up"></i> fa-chevron-circle-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-chevron-down"></i> fa-chevron-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-chevron-left"></i> fa-chevron-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-chevron-right"></i> fa-chevron-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-chevron-up"></i> fa-chevron-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-hand-o-down"></i> fa-hand-o-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-hand-o-left"></i> fa-hand-o-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-hand-o-right"></i> fa-hand-o-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-hand-o-up"></i> fa-hand-o-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-long-arrow-down"></i> fa-long-arrow-down</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-long-arrow-left"></i> fa-long-arrow-left</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-long-arrow-right"></i> fa-long-arrow-right</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-long-arrow-up"></i> fa-long-arrow-up</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-toggle-down"></i> fa-toggle-down <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-toggle-left"></i> fa-toggle-left <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-toggle-right"></i> fa-toggle-right <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-toggle-up"></i> fa-toggle-up <span class="text-muted">(alias)</span></p></div>
                   </div>

                   <hr />

                   <h4>Video Player Icons</h4>

                   <div class="row">
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-arrows-alt"></i> fa-arrows-alt</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-backward"></i> fa-backward</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-compress"></i> fa-compress</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-eject"></i> fa-eject</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-expand"></i> fa-expand</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-fast-backward"></i> fa-fast-backward</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-fast-forward"></i> fa-fast-forward</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-forward"></i> fa-forward</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-pause"></i> fa-pause</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-play"></i> fa-play</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-play-circle"></i> fa-play-circle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-play-circle-o"></i> fa-play-circle-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-step-backward"></i> fa-step-backward</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-step-forward"></i> fa-step-forward</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-stop"></i> fa-stop</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-youtube-play"></i> fa-youtube-play</p></div>
                   </div>

                   <hr />

                   <h4>Brand Icons</h4>

                   <div class="alert alert-success">
                     <ul>
                     <li>All brand icons are trademarks of their respective owners.</li>
                     <li>The use of these trademarks does not indicate endorsement of the trademark holder by Font Awesome, nor vice versa.</li>
                     </ul>
                   </div>

                   <div class="alert alert-warning">
                   <h4><i class="fa fa-warning"></i> Warning!</h4>
                     Apparently, Adblock Plus can remove Font Awesome brand icons with their "Remove Social
                     Media Buttons" setting. We will not use hacks to force them to display. Please
                     <a href="https://adblockplus.org/en/bugs" class="alert-link">report an issue with Adblock Plus</a> if you believe this to be
                     an error. To work around this, you'll need to modify the social icon class names.
                   </div>

                   <div class="row">
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-adn"></i> fa-adn</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-android"></i> fa-android</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-apple"></i> fa-apple</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-behance"></i> fa-behance</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-behance-square"></i> fa-behance-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bitbucket"></i> fa-bitbucket</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bitbucket-square"></i> fa-bitbucket-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-bitcoin"></i> fa-bitcoin <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-btc"></i> fa-btc</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-codepen"></i> fa-codepen</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-css3"></i> fa-css3</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-delicious"></i> fa-delicious</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-deviantart"></i> fa-deviantart</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-digg"></i> fa-digg</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-dribbble"></i> fa-dribbble</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-dropbox"></i> fa-dropbox</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-drupal"></i> fa-drupal</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-empire"></i> fa-empire</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-facebook"></i> fa-facebook</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-facebook-square"></i> fa-facebook-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-flickr"></i> fa-flickr</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-foursquare"></i> fa-foursquare</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-ge"></i> fa-ge <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-git"></i> fa-git</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-git-square"></i> fa-git-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-github"></i> fa-github</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-github-alt"></i> fa-github-alt</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-github-square"></i> fa-github-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-gittip"></i> fa-gittip</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-google"></i> fa-google</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-google-plus"></i> fa-google-plus</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-google-plus-square"></i> fa-google-plus-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-hacker-news"></i> fa-hacker-news</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-html5"></i> fa-html5</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-instagram"></i> fa-instagram</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-joomla"></i> fa-joomla</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-jsfiddle"></i> fa-jsfiddle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-linkedin"></i> fa-linkedin</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-linkedin-square"></i> fa-linkedin-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-linux"></i> fa-linux</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-maxcdn"></i> fa-maxcdn</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-openid"></i> fa-openid</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-pagelines"></i> fa-pagelines</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-pied-piper"></i> fa-pied-piper</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-pied-piper-alt"></i> fa-pied-piper-alt</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-pied-piper-square"></i> fa-pied-piper-square <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-pinterest"></i> fa-pinterest</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-pinterest-square"></i> fa-pinterest-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-qq"></i> fa-qq</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-ra"></i> fa-ra <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-rebel"></i> fa-rebel</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-reddit"></i> fa-reddit</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-reddit-square"></i> fa-reddit-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-renren"></i> fa-renren</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-share-alt"></i> fa-share-alt</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-share-alt-square"></i> fa-share-alt-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-skype"></i> fa-skype</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-slack"></i> fa-slack</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-soundcloud"></i> fa-soundcloud</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-spotify"></i> fa-spotify</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-stack-exchange"></i> fa-stack-exchange</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-stack-overflow"></i> fa-stack-overflow</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-steam"></i> fa-steam</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-steam-square"></i> fa-steam-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-stumbleupon"></i> fa-stumbleupon</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-stumbleupon-circle"></i> fa-stumbleupon-circle</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-tencent-weibo"></i> fa-tencent-weibo</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-trello"></i> fa-trello</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-tumblr"></i> fa-tumblr</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-tumblr-square"></i> fa-tumblr-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-twitter"></i> fa-twitter</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-twitter-square"></i> fa-twitter-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-vimeo-square"></i> fa-vimeo-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-vine"></i> fa-vine</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-vk"></i> fa-vk</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-wechat"></i> fa-wechat <span class="text-muted">(alias)</span></p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-weibo"></i> fa-weibo</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-weixin"></i> fa-weixin</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-windows"></i> fa-windows</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-wordpress"></i> fa-wordpress</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-xing"></i> fa-xing</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-xing-square"></i> fa-xing-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-yahoo"></i> fa-yahoo</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-youtube"></i> fa-youtube</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-youtube-play"></i> fa-youtube-play</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-youtube-square"></i> fa-youtube-square</p></div>
                   </div>

                   <hr />

                   <h4>Medical Icons</h4>

                   <div class="row">
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-ambulance"></i> fa-ambulance</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-h-square"></i> fa-h-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-hospital-o"></i> fa-hospital-o</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-medkit"></i> fa-medkit</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-plus-square"></i> fa-plus-square</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-stethoscope"></i> fa-stethoscope</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-user-md"></i> fa-user-md</p></div>
                     <div class="col-md-3 col-sm-4"><p><i class="fa fa-wheelchair"></i> fa-wheelchair</p></div>
                   </div>

                 </div>
               </div><!-- /.tab-pane #icon-font-awesome -->
         <?php
       } ?>
