<?php
mysqli_query($con, "update module set dilihat=dilihat+1 where judul_seo='$page'")
?>
<div class="row">
    <!-- Blog post-->
    <div class="post-content post-modern post-content-single col-md-9">
        <!-- Post item-->
        <div class="post-item">

            <div class="post-content-details">

                <div class="post-info">
                    <span class="post-autor">Post by: <a href="https://fb.com/anjukladang.fc" target="_blank" >@aang-naja</a></span>
                    <span class="post-category">in <a class="label label-info" href="<?php echo $title['judul_seo'];?>"><?php echo $title['nama_kategori'];?> | <?php echo $title['judul'];?> </a></span>

                </div>
                <div class="post-description">
                    <p><?php echo $contentnews;?></p>
                </div>
            </div>
            <div class="post-meta">
                <div class="post-date">
                    <span class="post-date-day"><?php echo date('d');?></span>
                    <span class="post-date-month"><?php echo date('M');?></span>
                    <span class="post-date-year"><?php echo date('Y');?></span>
                </div>
                <div class="post-comments">
                    <a href="#">
                        <i class="fa fa-eye"></i>
                        <span class="post-comments-number"><?php echo $title['dilihat'];?></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Comments-->
        <div id="comments" class="comments">



<div class="comment">
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = '//travaweb-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div>



        </div>
        <div class="comment-form">

            <script id="dsq-count-scr" src="//travaweb-1.disqus.com/count.js" async></script>
        </div>
        <!-- END: Comments-->
    </div>
    <!-- END: Blog post-->

    <!-- Sidebar-->
    <?php require_once "dev.sidebar.php"; ?>
    <!-- END: Sidebar-->
</div>
