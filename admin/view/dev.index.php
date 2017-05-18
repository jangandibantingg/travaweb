
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sentir, Responsive admin and dashboard UI kits template">
		<meta name="keywords" content="admin,bootstrap,template,responsive admin,dashboard template,web apps template">
		<meta name="author" content="Ari Rusmanto, Isoh Design Studio, Warung Themes">
		<title>admin</title>


		<!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
		<link href="library/assets/css/bootstrap.min.css" rel="stylesheet">

		<!-- PLUGINS CSS -->
		<link href="library/assets/plugins/weather-icon/css/weather-icons.min.css" rel="stylesheet">
		<link href="library/assets/plugins/prettify/prettify.min.css" rel="stylesheet">
		<link href="library/assets/plugins/magnific-popup/magnific-popup.min.css" rel="stylesheet">
		<link href="library/assets/plugins/owl-carousel/owl.carousel.min.css" rel="stylesheet">
		<link href="library/assets/plugins/owl-carousel/owl.theme.min.css" rel="stylesheet">
		<link href="library/assets/plugins/owl-carousel/owl.transitions.min.css" rel="stylesheet">
		<link href="library/assets/plugins/chosen/chosen.min.css" rel="stylesheet">
		<link href="library/assets/plugins/icheck/skins/all.css" rel="stylesheet">
		<link href="library/assets/plugins/datepicker/datepicker.min.css" rel="stylesheet">
		<link href="library/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
		<link href="library/assets/plugins/validator/bootstrapValidator.min.css" rel="stylesheet">
		<link href="library/assets/plugins/summernote/summernote.min.css" rel="stylesheet">
		<link href="library/assets/plugins/markdown/bootstrap-markdown.min.css" rel="stylesheet">
		<link href="library/assets/plugins/datatable/css/bootstrap.datatable.min.css" rel="stylesheet">
		<link href="library/assets/plugins/morris-chart/morris.min.css" rel="stylesheet">
		<link href="library/assets/plugins/c3-chart/c3.min.css" rel="stylesheet">
		<link href="library/assets/plugins/slider/slider.min.css" rel="stylesheet">
		<link href="library/assets/plugins/salvattore/salvattore.css" rel="stylesheet">
		<link href="library/assets/plugins/toastr/toastr.css" rel="stylesheet">
		<link href="library/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet">
		<link href="library/assets/plugins/fullcalendar/fullcalendar/fullcalendar.print.css" rel="stylesheet" media="print">

		<!-- MAIN CSS (REQUIRED ALL PAGE)-->
		<link href="library/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="library/assets/css/style.css" rel="stylesheet">
		<link href="library/assets/css/style-responsive.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="library/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="library/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="tooltips top-navigation">




		<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
		<div class="wrapper">
			<!-- BEGIN TOP NAV -->
			<div class="top-navbar dark-color">
				<div class="top-navbar-inner">

					<!-- Begin Logo brand -->
					<div class="logo-brand">
						<!-- <a href="./"><img src="library/file/<?php echo $web['logo'];?>" alt="Sentir logo"></a> -->
					</div><!-- /.logo-brand -->

					<!-- End Logo brand -->

					<div class="top-nav-content main-top-nav-layout">

						<!-- Begin button sidebar left toggle -->
						<div class="btn-collapse-main-navigation" data-toggle="collapse" data-target="#top-main-navigation">
							<i class="fa fa-bars"></i>
						</div><!-- /.btn-collapse-sidebar-left -->
						<!-- End button sidebar left toggle -->

						<!-- Begin button sidebar right toggle -->

						<!-- End button nav toggle -->


						<!-- Begin user session nav -->

						<!-- End user session nav -->

						<!-- Begin Collapse menu nav -->

						<!-- End Collapse menu nav -->
					</div><!-- /.top-nav-content -->
				</div><!-- /.top-navbar-inner -->
			</div><!-- /.top-navbar -->
			<!-- END TOP NAV -->



			<!-- BEGIN TOP MAIN NAVIGATION -->
			<?php include "dev.menu.php";?>
			<!-- END TOP MAIN NAVIGATION -->









			<!-- BEGIN SIDEBAR RIGHT -->

			<!-- END SIDEBAR RIGHT -->



			<!-- BEGIN PAGE CONTENT -->





			<div class="page-content no-left-sidebar">
				<div class="container-fluid">

				<?php
				if (empty($page)){
					include "view/dev.home.php";
				}else{
					include "view/dev.$page.php";
				}
				 ?>
			 </div><!-- /.container-fluid -->
			</div><!-- /.container-fluid -->



				<!-- BEGIN FOOTER -->
				<footer>
				Make with <i class="fa fa-heart"></i> in Semarang, Central Java - Indonesia
				</footer>
				<!-- END FOOTER -->


			</div><!-- /.page-content -->
		</div><!-- /.wrapper -->
		<!-- END PAGE CONTENT -->



		<!-- BEGIN BACK TO TOP BUTTON -->
		<div id="back-top">
			<a href="library/#top"><i class="fa fa-chevron-up"></i></a>
		</div>
		<!-- END BACK TO TOP -->


		<!--
		===========================================================
		END PAGE
		===========================================================
		-->

		<!--
		===========================================================
		Placed at the end of the document so the pages load faster
		===========================================================
		-->
		<!-- MAIN JAVASRCIPT (REQUIRED ALL PAGE)-->
		<script src="library/assets/js/jquery.min.js"></script>
		<script src="library/assets/js/bootstrap.min.js"></script>
		<script src="library/assets/plugins/retina/retina.min.js"></script>
		<script src="library/assets/plugins/nicescroll/jquery.nicescroll.js"></script>
		<script src="library/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		<script src="library/assets/plugins/backstretch/jquery.backstretch.min.js"></script>

		<!-- PLUGINS -->
		<script src="library/assets/plugins/skycons/skycons.js"></script>
		<script src="library/assets/plugins/prettify/prettify.js"></script>
		<script src="library/assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="library/assets/plugins/owl-carousel/owl.carousel.min.js"></script>
		<script src="library/assets/plugins/chosen/chosen.jquery.min.js"></script>
		<script src="library/assets/plugins/icheck/icheck.min.js"></script>
		<script src="library/assets/plugins/datepicker/bootstrap-datepicker.js"></script>
		<script src="library/assets/plugins/timepicker/bootstrap-timepicker.js"></script>
		<script src="library/assets/plugins/mask/jquery.mask.min.js"></script>
		<script src="library/assets/plugins/validator/bootstrapValidator.min.js"></script>
		<script src="library/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="library/assets/plugins/datatable/js/bootstrap.datatable.js"></script>
		<script src="library/assets/plugins/summernote/summernote.min.js"></script>
		<script src="library/assets/plugins/markdown/markdown.js"></script>
		<script src="library/assets/plugins/markdown/to-markdown.js"></script>
		<script src="library/assets/plugins/markdown/bootstrap-markdown.js"></script>
		<script src="library/assets/plugins/slider/bootstrap-slider.js"></script>

		<script src="library/assets/plugins/toastr/toastr.js"></script>

		<!-- FULL CALENDAR JS -->
		<script src="library/assets/plugins/fullcalendar/lib/jquery-ui.custom.min.js"></script>
		<script src="library/assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
		<script src="library/assets/js/full-calendar.js"></script>

		<!-- EASY PIE CHART JS -->
		<script src="library/assets/plugins/easypie-chart/easypiechart.min.js"></script>
		<script src="library/assets/plugins/easypie-chart/jquery.easypiechart.min.js"></script>

		<!-- KNOB JS -->
		<!--[if IE]>
		<script type="text/javascript" src="library/assets/plugins/jquery-knob/excanvas.js"></script>
		<![endif]-->
		<script src="library/assets/plugins/jquery-knob/jquery.knob.js"></script>
		<script src="library/assets/plugins/jquery-knob/knob.js"></script>

		<!-- FLOT CHART JS -->
		<script src="library/assets/plugins/flot-chart/jquery.flot.js"></script>
		<script src="library/assets/plugins/flot-chart/jquery.flot.tooltip.js"></script>
		<script src="library/assets/plugins/flot-chart/jquery.flot.resize.js"></script>
		<script src="library/assets/plugins/flot-chart/jquery.flot.selection.js"></script>
		<script src="library/assets/plugins/flot-chart/jquery.flot.stack.js"></script>
		<script src="library/assets/plugins/flot-chart/jquery.flot.time.js"></script>

		<!-- MORRIS JS -->
		<script src="library/assets/plugins/morris-chart/raphael.min.js"></script>
		<script src="library/assets/plugins/morris-chart/morris.min.js"></script>

		<!-- C3 JS -->
		<script src="library/assets/plugins/c3-chart/d3.v3.min.js" charset="utf-8"></script>
		<script src="library/assets/plugins/c3-chart/c3.min.js"></script>

		<!-- MAIN APPS JS -->
		<script src="library/assets/js/apps.js"></script>

		<!-- SHRINK NAVBAR JS -->
		<script src="library/assets/js/shrink-main-navigation.js"></script>

	</body>
</html>
