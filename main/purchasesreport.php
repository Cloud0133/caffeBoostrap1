<html>
<?php
	require_once('auth.php');
?>
	<head>
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
		<script src="lib/jquery.js" type="text/javascript"></script>
		<script src="src/facebox.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="tcal.css" />
		<script type="text/javascript" src="tcal.js"></script>
		<script language="javascript">
			function Clickheretoprint(){ 
			  	var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
			      	disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
			  	var content_vlue = document.getElementById("content").innerHTML; 			  
			  	var docprint=window.open("","",disp_setting); 
			   		docprint.document.open(); 
			   		docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
			   		docprint.document.write(content_vlue); 
			   		docprint.document.close(); 
			   		docprint.focus(); 
			}
		</script>
	 	<script language="javascript" type="text/javascript">
			/* scripts! */
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
		<?php $position=$_SESSION['SESS_LAST_NAME'];
		if($position=='cashier') {
		?>
			<a href="../index.php">Logout</a>
		<?php
		} ?>

		<?php if ($position=='admin') {
		?>
			<div class="container-fluid">
		      	<div class="row-fluid">
					<div class="span2">
		        		<div class="well sidebar-nav">
		              		<ul class="nav nav-list">
		             			<li ><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
								<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Penjualan</a>  </li>
								<li><a href="purchases.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Pembelian</a>  </li>     
								<li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Menu</a></li>
								<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Laporan Penjualan</a></li>
								<li class="active"><a href="purchasesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Laporan Pembelian</a> </li>
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
        <?php } ?>    	
					<div class="span10">
						<div class="contentheader">
							<i class="icon-bar-chart"></i> Laporan Pembelian
						</div>
						<ul class="breadcrumb">
							<li><a href="index.php">Dashboard</a></li> /
							<li class="active">Laporan Pembelian</li>
						</ul>
							<div style="margin-top: -19px; margin-bottom: 21px;">
								<a  href="index.php">
									<button class="btn btn-default btn-large" style="float: none;">
										<i class="icon icon-circle-arrow-left icon-large"></i> Kembali
									</button>
								</a>
								<button  style="float:right; width: 100px;height: 30px;top: 135px;position: relative;" class="btn btn-success btn-mini">
									<a href="javascript:Clickheretoprint()"> Print</a>
								</button>
							</div>
						<form action="purchasesreport.php" method="get" style="color:black">
							<center>
								<strong>Dari Tanggal : 
									<input type="text" style="width: 223px; padding:14px;" name="d1" class="tcal" value="" /> Sampai Tanggal: 
									<input type="text" style="width: 223px; padding:14px;" name="d2" class="tcal" value="" />
 									<button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit">
 										<i class="icon icon-search icon-large"></i> Search
 									</button>
								</strong>
							</center>
						</form>
						<div class="content" id="content">
							<div style="font-weight:bold; text-align:center;font-size:20px;margin-bottom: 15px; color:black;">
								<center>&nbsp;</center>
								Laporan Pembelian dari&nbsp;<?php echo $_GET['d1'] ?>&nbsp;sampai&nbsp;<?php echo $_GET['d2'] ?>
								<center>&nbsp;</center>
							</div>
							<table class="table table-bordered" border="1" id="resultTable" data-responsive="table" style="text-align: left;">
								<thead>
									<tr>
										<tr>
											<th width="16%"> No Faktur </th>
											<th width="13%"> Tanggal Transaksi </th>
											<th width="20%"> Nama Supplier </th>
											<th width="13%"> Kasir </th>
											<th width="18%"> Jumlah </th>
										</tr>
									</tr>
								</thead>
								<tbody>
									<?php
										include('../connect.php');
										$d1=$_GET['d1'];
										$d2=$_GET['d2'];
										$result = $db->prepare("SELECT * FROM purchases WHERE date BETWEEN :a AND :b ORDER by invoice_number DESC ");
										$result->bindParam(':a', $d1);
										$result->bindParam(':b', $d2);
										$result->execute();
										for($i=0; $row = $result->fetch(); $i++){
									?>
									<tr class="record">
										<td><?php echo $row['invoice_number']; ?></td>
										<td><?php echo $row['date']; ?></td>
										<td><?php echo $row['suplier']; ?></td>
										<td><?php $ambil_id = $row['user_id']; 
											$result2 = $db->prepare("SELECT * FROM user WHERE user_id= :userid");
											$result2->bindParam(':userid', $ambil_id);
											$result2->execute();
											for($i=0; $row2 = $result2->fetch(); $i++){
												$ambil_nama=$row2['name'];
											}
											echo $ambil_nama;
											?>
										</td>
										<td><?php echo $row['cost']; ?></td>
									</tr>
									<?php
										}
									?>	
								</tbody>
							<thead>
								<tr>
									<th colspan="4" style="border-top:1px solid #999999"> Total: </th>
									<th colspan="1" style="border-top:1px solid #999999"> 
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
											$d1=$_GET['d1'];
											$d2=$_GET['d2'];
											$results = $db->prepare("SELECT sum(cost) FROM purchases WHERE date BETWEEN :a AND :b");
											$results->bindParam(':a', $d1);
											$results->bindParam(':b', $d2);
											$results->execute();
											for($i=0; $rows = $results->fetch(); $i++){
												$dsdsd=$rows['sum(cost)'];
												echo formatMoney($dsdsd, true);
											}
										?>
									</th>		
								</tr>
							</thead>
						</table>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</body>
		<script src="js/jquery.js"></script>
  		<script type="text/javascript">
			$(function() {
				$(".delbutton").click(function(){
					var element = $(this);
					var del_id = element.attr("id");
					var info = 'id=' + del_id;
					if(confirm("Sure you want to delete this update? There is NO undo!")){
	 					$.ajax({
	   						type: "GET",
	   						url: "deletesales.php",
	   						data: info,
	   						success: function(){
	   						}
	 					});
	         			$(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
						.animate({ opacity: "hide" }, "slow");
	 				}
					return false;
				});
			});
		</script>
		<?php include('footer.php');?>
</html>
