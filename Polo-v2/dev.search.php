<div class="isotope" data-isotope-item-space="3" data-isotope-col="4" data-isotope-item=".post-item">


			<!-- Blog image post-->
      <?php
      $a=mysqli_query($con, "select * from module,kategori where module.id_kategori=kategori.id_kategori order by id_module desc");
      while ($r=mysqli_fetch_array($a)){
        $num_char = 200;
        $text =substr($r['isi_module'], 0, $num_char);


       ?>
            <div class="post-item">
                <div class="post-image">
                    <a href="<?php echo $r['judul_seo']; ?>">
                        <img alt="" src="<?php echo $r['gambar']; ?>">
                    </a>
                </div>
                <div class="post-content-details">
                    <div class="post-title">
                        <h3><a href="<?php echo $r['judul_seo']; ?>"><?php echo $r['judul']; ?></a></h3>
                    </div>
                    <div class="post-info">
                        <span class="post-autor">Post by: <a href="https://fb.com/anjukladang.fc" target="_blank">@aang-naja</a></span>
                        <!-- <span class="post-category">in <a href="#">Productivity</a></span> -->
                    </div>
                    <div class="post-meta">

                        <div class="post-info">
                            <!-- <a class="read-more" href="blog-post.html">read more <i class="fa fa-long-arrow-right"></i></a> -->
                            <button class="btn btn-info" ><i class="fa fa-long-arrow-right"></i> <?php echo $r['nama_kategori'];?> </button>
                            <button class="btn btn-danger" ><i class="fa fa-eye"></i> <?php echo $r['dilihat'];?> </button>

                        </div>
                    </div>
                </div>
                <!-- <div class="post-meta">
                    <div class="post-date">
                        <span class="post-date-day">16</span>
                        <span class="post-date-month">January</span>
                        <span class="post-date-year">2015</span>
                    </div>

                    <div class="post-comments">
                        <a href="#">
                            <i class="fa fa-eye"></i>
                            <span class="post-comments-number"></span>
                        </a>
                    </div>

                </div> -->
            </div>
            <?php
          }
             ?>
             <!-- Blog image post-->


            <!-- Blog image post-->

                  <!-- Blog image post-->


			        <!-- Blog image post-->


			        <!-- Blog image post-->


			        <!-- Blog image post-->


			 <!-- Blog image post-->



			<!-- Blog image post-->



        </div>
        <!-- pagination nav -->
        <div class="text-center">
					<div class="pagination-wrap">
						<ul class="pagination">
							<li>
								<a aria-label="Previous" href="#">
									<span aria-hidden="true"><i class="fa fa-angle-left"></i></span>

								</a>
							</li>
							<li><a href="#">1</a>
							</li>
							<li><a href="#">2</a>
							</li>
							<li class="active"><a href="#">3</a>
							</li>
							<li><a href="#">4</a>
							</li>
							<li><a href="#">5</a>
							</li>
							<li>
								<a aria-label="Next" href="#">
									<span aria-hidden="true"><i class="fa fa-angle-right"></i></span>
								</a>
							</li>
						</ul>
					</div>
				</div>
