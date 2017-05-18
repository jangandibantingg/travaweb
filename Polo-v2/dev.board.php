<?php
	$content=mysqli_fetch_array(mysqli_query($con, "select link from menu where link='$page'"));
	$category=mysqli_fetch_array(mysqli_query($con, "select kategori_seo,nama_kategori,id_kategori from kategori where kategori_seo='$page'"));
if ($page == $content['link']){
	$titlepage	="<h1>$page</h1>";
	$titleweb		=" | $page";
	$urlimg			="https://images4.alphacoders.com/267/thumb-1920-267284.jpg";
	$description="$web[deskripsi]";
	$keyword		="$web[keyword]";
	$subtitle		="I LEARNED, I SHARE";
}elseif($page == $category['kategori_seo']){
	$titlepage	="<h1>Category $category[nama_kategori]</h1>";
	$titleweb		=" | $category[nama_kategori]";
	$urlimg			="https://images4.alphacoders.com/267/thumb-1920-267284.jpg";
	$description="$web[deskripsi]";
	$keyword		="$web[keyword]";
	$subtitle		="I LEARNED, I SHARE";
	$id_category="$category[id_kategori]";
}else{
	$title=mysqli_fetch_array(mysqli_query($con, "select * from module,kategori where module.id_kategori=kategori.id_kategori and judul_seo='$page' "));
	$titlepage	="<h3>$title[judul]</h3>";
	$titleweb		=" | $title[judul]";
	$urlimg			="$title[gambar]";
	$keyword		="$title[keyword]";
	$description="$title[deskripsi]";
	$contentnews="$title[isi_module]";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="description" content="<?php echo $description;?>">
	<meta name="keyword" content="<?php echo $keyword;?>">


	<link rel="shortcut icon" href="<?php echo $link;?>/images/favicon.png">
	<title>Travaweb <?php echo $titleweb;?></title>

	<!-- Bootstrap Core CSS -->
	<link href="<?php echo $link;?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $link;?>/vendor/fontawesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
	<link href="<?php echo $link;?>/vendor/animateit/animate.min.css" rel="stylesheet">

	<!-- Vendor css -->
	<link href="<?php echo $link;?>/vendor/owlcarousel/owl.carousel.css" rel="stylesheet">
	<link href="<?php echo $link;?>/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

	<!-- Template base -->
	<link href="<?php echo $link;?>/css/theme-base.css" rel="stylesheet">

	<!-- Template elements -->
	<link href="<?php echo $link;?>/css/theme-elements.css" rel="stylesheet">


	<!-- Responsive classes -->
	<link href="<?php echo $link;?>/css/responsive.css" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- Template color -->
	<link href="<?php echo $link;?>/css/color-variations/blue.css" rel="stylesheet" type="text/css" media="screen" title="blue">

	<!-- LOAD GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,800,700,600%7CRaleway:100,300,600,700,800" rel="stylesheet" type="text/css" />

	<!-- CSS CUSTOM STYLE -->
    <link rel="stylesheet" type="text/css" href="<?php echo $link;?>/css/custom.css" media="screen" />

    <!--VENDOR SCRIPT-->
    <script src="<?php echo $link;?>/vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="<?php echo $link;?>/vendor/plugins-compressed.js"></script>




</head>

<body class="wide">


	<!-- WRAPPER -->
	<div class="wrapper">

		<!-- HEADER -->
		<header id="header" class="header-transparent header-dark">
			<div id="header-wrap">
				<div class="container">

					<!--LOGO-->
					<div id="logo">
						<a href="./" class="logo" data-dark-logo="<?php echo $link;?>/images/logo-dark.png">
							<img src="<?php echo $link;?>/images/logo.png" alt="Polo Logo">
						</a>
					</div>
					<!--END: LOGO-->

					<!--MOBILE MENU -->
					<div class="nav-main-menu-responsive">
						<button class="lines-button x">
							<span class="lines"></span>
						</button>
					</div>
					<!--END: MOBILE MENU -->

					<!--SHOPPING CART -->

					<!--END: SHOPPING CART -->

					<!--TOP SEARCH -->
					<!-- <div id="top-search"> <a id="top-search-trigger"><i class="fa fa-search"></i><i class="fa fa-close"></i></a>
						<form action="./" method="get">
							<input type="text" name="page=search&q" class="form-control" value="" placeholder="Start typing & press  &quot;Enter&quot;">
						</form>
					</div> -->
					<!--END: TOP SEARCH -->
<!--NAVIGATION-->
					<div class="navbar-collapse collapse main-menu-collapse navigation-wrap">
						<div class="container">
							<nav id="mainMenu" class="main-menu mega-menu">
								<ul class="main-menu nav nav-pills">
									<?php
									$m=mysqli_query($con, "select * from menu order by ascending asc");
									while ($r=mysqli_fetch_array($m)){
										echo "<li><a href='$r[link]'><i class='$r[icon]'></i> $r[nama_menu]</a></li>";
									}
									 ?>



										</ul>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<!--END: NAVIGATION-->
				</div>
			</div>
		</header>
		<!-- END: HEADER -->


<!-- PAGE TITLE -->
<section id="page-title" class="page-title-extended page-title-parallax text-light" data-stellar-background-ratio="0.3" style="background: url('<?php echo $urlimg;?>');">
    <div class="container">
        <div class="page-title col-md-8">

							<?php
							echo $titlepage;
						  ?>


            <span class="lead"><?php echo "$subtitle"; ?></span>
        </div>
        <!-- <div class="breadcrumb col-md-4">
            <ul>
                <li><a href="/#"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="/#">Home</a>
                </li>
                <li><a href="/#">Page title</a>
                </li>
                <li class="active"><a href="/#">Page title version</a>
                </li>
            </ul>
        </div> -->
    </div>
</section>
<!-- END: PAGE TITLE -->



<section>
	<div class="container">
		<?php

		if ($page == $content['link']){
			include "dev.$page.php";
		}elseif($page == $category['kategori_seo']){
			include "dev.category.php";
		}
		elseif($page != $title['judul_seo']){
			include "dev.sitemap.php";
		}elseif($_GET['q']){
			include "dev.search.php";
		}
		else{
			include "dev.article.php";
		}


		 ?>
	</div>
</section>

<!-- FOOTER -->
<footer class="background-dark text-grey" id="footer">

	<div class="copyright-content">
		<div class="container">
			<div class="row">
				<div class="copyright-text col-md-6"> &copy; 2016 Travaweb</a>
				</div>
				<div class="col-md-6"><div class="social-icons">
							<ul>
								<li class="social-facebook"><a href="https://fb.com/anjukadang.fc" target="_blank" ><i class="fa fa-facebook"></i></a></li>
								<li class="social-twitter"><a href="https://twitter.com/aang_naja" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<li class="social-youtube"><a href="https://www.youtube.com/channel/UCY-k0fS92iVTZrkZ7D0lpeA" target="_blank"><i class="fa fa-youtube-play"></i></a></li>

							</ul>
						</div></div>
			</div>
		</div>
	</div>
</footer>
<!-- END: FOOTER -->

</div>
<!-- END: WRAPPER -->

<!-- GO TOP BUTTON -->
<a class="gototop gototop-button" href="#"><i class="fa fa-chevron-up"></i></a>

	<!-- Theme Base, Components and Settings -->
	<script src="<?php echo $link;?>/js/theme-functions.js"></script>

<!-- Custom js file -->
<script src="<?php echo $link;?>/js/custom.js"></script>


</body>
</html>
