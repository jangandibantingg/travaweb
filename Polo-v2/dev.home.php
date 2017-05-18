<?php
mysqli_query($con, "update module set dilihat=dilihat+1 where judul_seo='$page'")
?>
<div class="row">
    <!-- Blog post-->
    <div class="post-content post-modern post-content-single col-md-9">
        <!-- Post item-->
        <!--Basic Table-->

   <div class="table-responsive">
     <?php
     $icat=mysqli_query($con, "select * from kategori");
     while($cat=mysqli_fetch_array($icat)){
       echo "<h2>$cat[nama_kategori]</h2>";
      ?>
     <table class="table">

       <tbody>
         <?php
         $no=1;
          $categorylist=mysqli_query($con, "select * from module where id_kategori='$cat[id_kategori]' order by id_module asc");

          while ($viewcategory=mysqli_fetch_array($categorylist)){

            echo "<tr>
                  <td>$no</td>
                  <td><a href='$viewcategory[judul_seo]'><i class='fa fa-list-alt'></i> $viewcategory[judul]</a></td>

                  </tr>";
                  $no++;
                }
          ?>


       </tbody>
     </table>
     <?php
      }
      ?>

   </div>
</div>


    <!-- END: Blog post-->

    <!-- Sidebar-->
    <?php require_once "dev.sidebar.php"; ?>
    <!-- END: Sidebar-->
</div>
