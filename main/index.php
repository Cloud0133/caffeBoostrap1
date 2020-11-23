<!DOCTYPE html>
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<html>
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
		<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="lib/jquery.js" type="text/javascript"></script>
		<script src="src/facebox.js" type="text/javascript"></script>
		<script type="text/javascript">
		  jQuery(document).ready(function($) {
		    $('a[rel*=facebox]').facebox({
		      loadingImage : 'src/loading.gif',
		      closeImage   : 'src/closelabel.png'
		    })
		  })
		</script>
		<?php
		require_once('auth.php');
		?>
		<?php
			date_default_timezone_set("Asia/Jakarta");
			$ayam = date("dmY").'-'.date("His");
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
		</script>	
	</head>
	<body>
		<?php include('navfixed.php');?>
		<?php $position=$_SESSION['SESS_LAST_NAME'];

		if ($position=='admin') {
		?>
			<div class="container-fluid">
	      		<div class="row-fluid">
					<div class="span2">
	          			<div class="well sidebar-nav">
	              			<ul class="nav nav-list">
	             				<li class="active"><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
								<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Penjualan</a>  </li>
								<li><a href="purchases.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Pembelian</a>  </li>     
								<li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Menu</a></li>
								<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Laporan Penjualan</a></li>
								<li><a href="purchasesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Laporan Pembelian</a> </li>
								<br><br><br><br><br><br>
								<li>
				 					<div class="hero-unit-clock">
										<form name="clock">
											<font color="white">Time: <br></font>&nbsp;<input style="width:150px;height: 40px; text-align: center;" type="text" class="trans" name="face" value="" disabled>
										</form>
				  					</div>
								</li>
							</ul>
						</div>
	        		</div>   
					<div class="span10">
						<div class="contentheader">
							<i class="icon-shopping-cart icon"></i> Pembelian
						</div>
							<ul class="breadcrumb">
								<a href="index.php"><li>Dashboard</li></a> /
								<li class="active">Dashboard</li>
							</ul>
								<font style=" font:bold 30px 'Aleo'; text-shadow:1px 1px 25px #000; color:#000;"><center>INZOMNIA COFFESHOP</center></font>
						<div id="mainmain">
							<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i><br> Penjualan</a> 
							<a href="purchases.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i><br> Pembelian</a>               
							<a href="products.php"><i class="icon-list-alt icon-2x"></i><br> Menu</a>     
							<a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i><br> Laporan Penjualan</a>
							<a href="purchasesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i><br> Laporan Pembelian</a>
							<a href="../index.php"><font color="red"><i class="icon-off icon-2x"></i></font><br> Logout</a> 
		<?php 
		} elseif ($position=='kasir') {
		?>
				<div class="container-fluid">
		      		<div class="row-fluid">
						<div class="span2">
		          			<div class="well sidebar-nav">
		              			<ul class="nav nav-list">
		             				<li class="active"><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
									<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Penjualan</a>  </li>   
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
				<div class="span10">
					<div class="contentheader">
						<i class="icon-shopping-cart"></i> Penjualan
					</div>
					<ul class="breadcrumb">
						<a href="index.php"><li>Dashboard</li></a> /
						<li class="active">Dashboard</li>
					</ul>
					<div id="mainmain">
					<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i><br> Penjualan</a>               
					<a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i><br> Laporan Penjualan</a>
					<a href="../index.php"><font color="red"><i class="icon-off icon-2x"></i></font><br> Logout</a> 
		<?php 
		}
		?>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		</div>
	</body>
	<?php include('footer.php'); ?>
</html>
