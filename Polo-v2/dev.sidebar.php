<div class="sidebar sidebar-modern col-md-3">
    <!--widget newsletter-->

    
    <!--end: widget newsletter-->


    <!--end: widget tweeter-->

    <!--widget tags -->
    <!-- <div class="widget clearfix widget-tags">
        <h4 class="widget-title"></h4>
        <div class="tags">

        </div>
    </div> -->
    <!--end: widget tags -->
    <!--widget archive-->
    <div class="widget clearfix widget-archive">
        <h4 class="widget-title">Category</h4>
        <ul class="list list-lines">
            <?php
            $side=mysqli_query($con, "select * from kategori");
            while ($rside=mysqli_fetch_array($side)){
              echo "<li><a href='./$rside[kategori_seo]'><i class='fa fa-database'></i> $rside[nama_kategori]</a></li>";
            }

             ?>
        </ul>
    </div>
    <div class="widget clearfix widget-archive">
        <h4 class="widget-title">Navigation</h4>
        <ul class="list list-lines">
            <?php
            $sidemenu=mysqli_query($con, "select * from menu");
            while ($rsidemenu=mysqli_fetch_array($sidemenu)){
              echo "<li><a href='./$rsidemenu[link]'><i class='$rsidemenu[icon]'></i> $rsidemenu[nama_menu]</a></li>";
            }

             ?>
        </ul>
    </div>
    <!--end: widget archive-->

    <!--widget flickr-->

    <!--end: widget flickr-->

    <!--widget blog articles-->

    <!--end: widget blog articles-->

    <!--widget categories-->

    <!--end: widget categories-->

    <!--widget contact us-->

    <!--end: widget contact us-->

    <!--widget blockquote -->

    <!--end: widget blockquote -->

</div>
