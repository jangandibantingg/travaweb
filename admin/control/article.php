<?php
date_default_timezone_set('Europe/Luxembourg');
error_reporting(0);
include "../../control/koneksi.php";

$tgl=date('Y-m-d');
$tgltime=date('Y-m-d H:i:s');
?>

										  <!-- Begin primary color table -->
					<div class="page-content no-left-sidebar">
				<div class="container-fluid">
				
				<!-- Begin page heading -->
				<h1 class="page-heading">Article <small> </small></h1>
				<a href="view/create.article.php" target='_blank'> ++add article </a>
				<!-- End page heading -->
				
					<!-- BEGIN EXAMPLE ALERT -->
					
					<!-- END EXAMPLE ALERT -->
				
					
					<!-- BEGIN SiTE INFORMATIONS -->
					<div class="row">
					
						<div class="col-sm-12">
					<div class="the-box full no-border">
						<div class="table-responsive">
							<table class="table table-th-block table-primary">

													  <thead>
														<tr>
														  
														  <th>judul</th>
														  <th>action</th>
														  
														  
														  
														</tr>
													  </thead>
													  <tbody>
													  <?php
													  
													  $dep=mysql_query("select * from berita  order  by id asc");
												
													  $num=1;
													  while($t=mysql_fetch_array($dep))
													  {
														
														
														
														  echo "<tr>
														  
														  <td><a href='view/edit.article.php?id=$t[id]' target='_blank'>$t[judul]</a> </td>
														  <td>delete </td>";
														 

														 
														
													  }
													 echo "</tbody></table>"; 
												
													 if (mysql_num_rows($dep) == 0)
													 {
														 echo "<center>You have never done payment</center>";
													 }
													?>
												  
						</div><!-- /.table-responsive -->
					</div><!-- /.the-box -->
					</div><!-- /.the-box -->
					</div><!-- /.the-box -->
					</div><!-- /.the-box -->
					</div><!-- /.the-box -->
					
					<!-- End primary color table -->

					