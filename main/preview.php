<!DOCTYPE html>
<html>
	<head>
		<?php require_once ('auth.php');?>
		<title>INZOMNIA COFFESHOP</title>
		<link rel="shortcut icon" href="images/pos.jpg">
 		<link href="css/bootstrapp1.css" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  		<link rel="stylesheet" href="css/font-awesome.min.css">
    	<style type="text/css">
      		.sidebar-nav {
        		padding: 9px 0;
      		}
    	</style>
    	<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="lib/jquery.js" type="text/javascript"></script>
		<script src="src/facebox.js" type="text/javascript"></script>
		<script language="javascript">
			function Clickheretoprint(){ 
		  		var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      				disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  				var content_vlue = document.getElementById("content").innerHTML; 
  				var docprint=window.open("","",disp_setting); 
   					docprint.document.open(); 
   					docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   					docprint.document.write(content_vlue); 
				   docprint.document.close(); 
				   docprint.focus(); 
			}
		</script>
		<?php
			$invoice=$_GET['invoice'];
			include('../connect.php');
			$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
			$result->bindParam(':userid', $invoice);
			$result->execute();
			for($i=0; $row = $result->fetch(); $i++){
				$invoice=$row['invoice_number'];
				$invoicee=$row['invoice_number'];
				$date=$row['date'];
				$cash=$row['cash'];
				$cashier=$row['user_id'];
				$pt='cash';
				$am=$row['amount'];
				if($pt=='cash'){
					$cash=$row['cash'];
					$amount=$cash-$am;
					$totbay = $cash - $am;
				}
			}
		?>
		<?php
			date_default_timezone_set("Asia/Jakarta");
			$ayam = date("dmY").'-'.date("His");;
			$finalcode='JL-'.$ayam;
		?>
 		<script language="javascript" type="text/javascript">
			/*scripts! */
			<!-- Begin
			var timerID = null;
			var timerRunning = false;
			function stopclock (){
				if(timerRunning)
					clearTimeout(timerID);
					timerRunning = false;
			}
			function showtime () {
				var now = new Date();
				var hours = now.getHours();
				var minutes = now.getMinutes();
				var seconds = now.getSeconds()
				var timeValue = "" + ((hours >12) ? hours -12 :hours)
				if (timeValue == "0") timeValue = 12;
					timeValue += ((minutes < 10) ? ":0" : ":") + minutes
					timeValue += ((seconds < 10) ? ":0" : ":") + seconds
					timeValue += (hours >= 12) ? " P.M." : " A.M."
					document.clock.face.value = timeValue;
					timerID = setTimeout("showtime()",1000);
					timerRunning = true;
			}
			function startclock() {
				stopclock();
				showtime();
			}
			window.onload=startclock;
			// End -->
		</script>
	</head>
	<body>
		<?php include('navfixed.php'); ?>
		<?php $position=$_SESSION['SESS_LAST_NAME']; ?>	
		<?php if($position=='admin') {
		?>
			<div class="container-fluid">
      			<div class="row-fluid">
					<div class="span2">
             			<div class="well sidebar-nav">
                 			<ul class="nav nav-list">
            					<li >
            						<a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a>
            					</li> 
								<li class="active">
									<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Penjualan</a>
								</li>     
								<li>
									<a href="purchases.php"><i class="icon-shopping-cart icon-2x"></i> Pembelian</a>
								</li>        
								<li>
									<a href="products.php"><i class="icon-list-alt icon-2x"></i> Menu</a>
								</li>
								<li>
									<a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Laporan Penjualan</a>                
								</li>
								<li>
									<a href="purchasesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Laporan Pembelian</a>                
								</li>
								<br><br><br><br><br><br>		
								<li>
			 						<div class="hero-unit-clock">
										<form name="clock">
											<font color="white">Time: <br></font>&nbsp;
											<input style="width:150px;" type="submit" class="trans" name="face" value="">
										</form>
			  						</div>
								</li>
							</ul>           
          				</div>
        			</div>
		<?php } elseif ($position == 'kasir') {
		?>
			<div class="container-fluid">
      			<div class="row-fluid">
					<div class="span2">
             			<div class="well sidebar-nav">
                 			<ul class="nav nav-list">
            					<li >
            						<a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a>
            					</li> 
								<li class="active">
									<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Penjualan</a>
								</li>             
								<li>
									<a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Laporan Penjualan</a>                
								</li>
								<br><br><br><br><br><br>		
								<li>
			 						<div class="hero-unit-clock">
										<form name="clock">
											<font color="white">Time: <br></font>&nbsp;
											<input style="width:150px;" type="submit" class="trans" name="face" value="">
										</form>
			  						</div>
								</li>
							</ul>           
          				</div>
        			</div>
			<?php } ?>	
					<div class="span10">
						<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">
							<button class="btn btn-default"><i class="icon-arrow-left"></i> Kembali</button>
						</a>
						<div class="content" id="content">
							<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal; color:black;">
								<div style="width: 100%; height: 190px;" >
									<div style="width: 900px; float: left;">
										<center>
											<div style="font:bold 25px 'Aleo';">Nota Penjualan</div>
												<br>
											<div style="font:bold 25px 'Aleo';">INZOMNIA COFFESHOP</div><br><br>
										</center>
										<div></div>
									</div>
									<div style="width: 200px; float: left; height: 70px;">
										<table border="0" cellpadding="3" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">
											<tr>
												<td>Nota No. </td>
												<td><?php echo ": ".$invoice ?></td>
											</tr>
											<tr>
												<td>Tanggal </td>
												<td><?php echo ": ".$date ?></td>
											</tr>
										</table>
									</div>
									<div class="clearfix"></div>
								</div>
								<div style="width: 100%; margin-top:-70px;">
									<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;	text-align:left;" width="100%">
										<thead>
											<tr align="center">
												<th > Menu </th>
												<th> Harga Satuan</th>
												<th> Kuantitas </th>
												<th> Total Harga </th>
											</tr>
										</thead>
										<tbody>
											<?php
												$id=$_GET['invoice'];
												$result = $db->prepare("SELECT * FROM sales_order WHERE invoice_number= :userid");
												$result->bindParam(':userid', $id);
												$result->execute();
												for($i=0; $row = $result->fetch(); $i++){
											?>
											<tr class="record">
												<td><?php echo $row['product_code']; ?></td>
												<td>
													<?php
														$ppp=$row['price'];
														echo formatMoney($ppp, true);
													?>
												</td>
												<td><?php echo $row['qty']; ?></td>
												<td>
													<?php
														$ha=$row['price'];
														$ti=$row['qty'];
														$hati=$ha*$ti;
														echo formatMoney($hati, true);
													?>
												</td>
											</tr>
												<?php
													}
												?>
											<tr>
												<td colspan="3" style=" text-align:right;"><strong style="font-size: 12px;">Sub Total: &nbsp;</strong></td>
												<td colspan="2">
													<strong style="font-size: 12px;">
														<?php
															$sdsd=$_GET['invoice'];
															$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice_number= :a");
															$resultas->bindParam(':a', $sdsd);
															$resultas->execute();
															for($i=0; $rowas = $resultas->fetch(); $i++){
																$fgfg=$rowas['sum(amount)'];
																echo formatMoney($fgfg, true);
															}
														?>
													</strong>
												</td>
											</tr>
											<?php if($pt=='cash'){
											?>
											<tr>
												<td colspan="3"style=" text-align:right;">
													<strong style="font-size: 12px; color: black;">Bayar:&nbsp;</strong>
												</td>
												<td colspan="2">
													<strong style="font-size: 12px; color: black;">
														<?php
															echo formatMoney($cash, true);
														?>
													</strong>
												</td>
											</tr>
											<?php
												}
											?>
											<tr>
												<td colspan="3" style=" text-align:right;">
													<strong style="font-size: 12px; color: black;">
														<font style="font-size:20px;">
														<?php
															if($pt=='cash'){
																echo 'Kembali:';
															}
															if($pt=='credit'){
																echo 'Due Date:';
															}
														?>&nbsp;
													</strong>
												</td>
												<td colspan="3">
													<strong style="font-size: 15px; color: black;">
														<?php
															function formatMoney($number, $fractional=false) {
																if ($fractional) {
																	$number = sprintf('%.2f', $number);
																}
																while (true) {
																	$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
																	if ($replaced != $number) {
																		$number = $replaced;
																	} else {
																		break;
																	}
																}
																return $number;
															}
															echo formatMoney($totbay, true);
														?>
													</strong>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="pull-right" style="margin-right:100px;">
						<a href="javascript:Clickheretoprint()" style="font-size:20px;">
							<button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button>
						</a>
					</div>	
				</div>
			</div>
		</div>
	</body>
</html>

