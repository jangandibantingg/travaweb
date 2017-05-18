<?php
mysqli_query($con, "update module set dilihat=dilihat+1 where judul_seo='$page'")
?>
<div class="row">
    <!-- Blog post-->
    <div class="post-content post-modern post-content-single col-md-9">
        <!-- Post item-->
        <!--Basic Table-->

   <div class="table-responsive">
     <table class="table">

       <tbody>
         <?php
         $no=1;
          $categorylist=mysqli_query($con, "select * from link where category='git' ");

          while ($viewcategory=mysqli_fetch_array($categorylist)){
            echo "<tr>
                  <td>$no</td>
                  <td><a href='$viewcategory[link]' target='_blank'><i class='fa fa-git'></i> $viewcategory[name]</a></td>

                  </tr>";
                  $no++;
                }
          ?>


       </tbody>
     </table>
   </div>
</div>


    <!-- END: Blog post-->

    <!-- Sidebar-->
    <?php require_once "dev.sidebar.php"; ?>
    <!-- END: Sidebar-->
</div>
