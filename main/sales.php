<!DOCTYPE html>
<html>
	<head>
		<!-- js -->			
		<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="lib/jquery.js" type="text/javascript"></script>
		<script src="src/facebox.js" type="text/javascript"></script>
		<script type="text/javascript">
		  jQuery(document).ready(function($) {
		    $('a[rel*=facebox]').facebox({
		      loadingImage : 'src/loading.gif',
		      closeImage   : 'src/closelabel1.png'
		    })
		  })
		</script>
		<title>INZOMNIA COFFESHOP</title>
		<?php
			require_once('auth.php');
		?> 
		<link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
 		<link rel="shortcut icon" href="images/pos.jpg">
  		<link href="css/bootstrapp1.css" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  		<link rel="stylesheet" href="css/font-awesome.min.css">
    	<style type="text/css">
      		body {
        		padding-top: 40px;
        		padding-bottom: 40px;

     		}
      		.sidebar-nav {
        		padding: 9px 0;
      		}
    	</style>
    	<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<script src="vendors/jquery-1.7.2.min.js"></script>
    	<script src="vendors/bootstrap.js"></script>	
		<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
 		<script language="javascript" type="text/javascript">
		/*  CSS and DHTML scripts! */
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
		<?php
			date_default_timezone_set("Asia/Jakarta");
			$ayam = date("dmY").'-'.date("His");
			$finalcode='JL-'.$ayam;
		?>
	<body>
		<?php include('navfixed.php');?>
		<?php
			$position=$_SESSION['SESS_LAST_NAME'];
		?>
		<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>">Cash</a>
		<a href="../index.php">Logout</a>
		<?php 
			if($position=='admin') {
		?>
		<div class="container-fluid">
      		<div class="row-fluid">
				<div class="span2">
          			<div class="well sidebar-nav">
              			<ul class="nav nav-list">
             				<li ><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
							<li class="active"><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Penjualan</a>  </li>
							<li><a href="purchases.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Pembelian</a>  </li>     
							<li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Menu</a></li>
							<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Laporan Penjualan</a></li>
							<li><a href="purchasesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Laporan Pembelian</a> </li>

							<br><br><br><br><br><br>
							<li>
			 					<div class="hero-unit-clock">
									<form name="clock">
										<font color="white">Time: <br></font>&nbsp;<input style="width:150px; height: 40px; text-align: center;" type="text" class="trans" name="face" value="" disabled>
									</form>
			  					</div>
							</li>
						</ul>
					</div>
        		</div>    
		<?php } elseif ($position=='kasir') {
		?>			
			<div class="container-fluid">
	      		<div class="row-fluid">
					<div class="span2">
	          			<div class="well sidebar-nav">
	              			<ul class="nav nav-list">
	             				<li ><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
								<li class="active"><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Penjualan</a>  </li>   
								<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Laporan Penjualan</a></li>
								<br><br><br><br><br><br>
								<li>
				 					<div class="hero-unit-clock">
										<form name="clock">
											<font color="white">Time: <br></font>&nbsp;<input style="width:150px; height: 40px; text-align: center;" type="text" class="trans" name="face" value="" disabled>
										</form>
				  					</div>
								</li>
							</ul>
						</div>
	        		</div>    
		<?php }
		?>		<div class="span10">
					<div class="contentheader">
						<i class="icon-shopping-cart"></i> Penjualan
					</div>
					<ul class="breadcrumb">
						<a href="index.php"><li>Dashboard</li></a> /
						<li class="active">Penjualan</li>
					</ul>							
					<form action="incoming.php" method="post" >						
						<input type="hidden" name="pt" value="<?php echo $_GET['id']; ?>" />
						<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
						<select name="product" style="width:850px; "class="chzn-select" required>
							<option></option>
							<?php
								include('../connect.php');
								$result = $db->prepare("SELECT * FROM products");
								$result->bindParam(':userid', $res);
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
							?>
							<option value="<?php echo $row['product_id'];?>"><?php echo $row['product_code']; ?> - <?php echo $row['price']; ?> </option>
							<?php }
							?>
						</select>
						<input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
						<input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
						<Button type="submit" class="btn btn-info" style="width: 143px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Tambah</button>
					</form>
					<table class="table table-bordered" id="resultTable" data-responsive="table">
						<thead>
							<tr>
								<th> Nama Menu</th>
								<th> Harga Satuan </th>
								<th> Kuantitas </th>
								<th> Harga </th>
							</tr>
						</thead>
						<tbody>
							<?php
								$id=$_GET['invoice'];
								include('../connect.php');
								$result = $db->prepare("SELECT * FROM sales_order WHERE invoice_number= :userid");
								$result->bindParam(':userid', $id);
								$result->execute();
								for($i=1; $row = $result->fetch(); $i++){
							?>
							<tr class="record">
								<td hidden><?php echo $row['product']; ?></td>
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
										$dfdf=$row['amount'];
										echo formatMoney($dfdf, true);
									?>
								</td>
							</tr>
								<?php
									}	
								?>
							<tr>
								<th> </th>
								<th> </th>
								<th> </th>
								<td> Total Harga: </td>
							</tr>
							<tr>
								<th colspan="3"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
								<td colspan="1"><strong style="font-size: 12px; color: #222222;">
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
						</tbody>
					</table><br>
					<a rel="facebox" href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?><?php echo $_SESSION['SESS_FIRST_NAME']?>">
						<button class="btn btn-success btn-large btn-block"><i class="icon icon-save icon-large"></i> Simpan</button>
					</a>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
			</div>
		</div>
	</body>
		<?php include('footer.php');?>
</html>