<?php
date_default_timezone_set('Europe/Luxembourg');
error_reporting(0);
include "../../control/koneksi.php";
mysql_query("update payment set lihat='Y'");
$tgl=date('Y-m-d');
$tgltime=date('Y-m-d H:i:s');
?>

										  <!-- Begin primary color table -->
					<div class="page-content no-left-sidebar">
				<div class="container-fluid">
				
				<!-- Begin page heading -->
				<h1 class="page-heading">Under _paid <small> </small></h1>
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
														  <th>tgl Deposit</th>
														  <th>Location</th>
														  <th>username</th>
														  <th>via</th>
														  <th>Amount payment</th>
														  <th>Status</th>
														  
														  
														</tr>
													  </thead>
													  <tbody>
													  <?php
													  
													  $dep=mysql_query("select * from payment where status ='under_paid' order  by tanggal desc");
												
													  $num=1;
													  while($t=mysql_fetch_array($dep))
													  {
														$hourdiff  = round((strtotime($tgltime) - strtotime($t[tanggal]))/3600,1);
														$kkk=mysql_fetch_array(mysql_query("select * from member where username='$t[sender]'"));
														$negara=mysql_fetch_array(mysql_query("select * from negara where username='$t[sender]'"));
														$c10=$t[amount] * 0.1;
														  echo "<tr>
														  <td>$t[tanggal]</td>
														  <td>$kkk[ip] -
														  ";
														  if (empty($negara[country])){
															  echo "<img src='library/flag/null.png' />";
														  }
														  else{
															  echo "<img src='library/flag/$negara[country].png' />";
														  }

														  echo "
														  $negara[country]</td>
														  <td>$kkk[username]  </td>
														  <td><img src='../library/assets/common/img/$t[metode].png' /></td>
														  <td>$t[status] USD</td>
														  <td>$t[dollar] USD</td>
														  
														  ";
														 
														
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
