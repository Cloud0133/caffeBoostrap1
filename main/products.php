<html>
	<head>
		<title>INZOMNIA COFFESHOP</title>		
	
		<?php require_once('auth.php'); ?>
		<link rel="shortcut icon" href="images/pos.jpg">
		<link href="css/bootstrapp1.css" rel="stylesheet">
   		<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
   		<style type="text/css">
     		body {
		        padding-top: 60px;
		        padding-bottom: 40px;
   			}
    		.sidebar-nav {
       			padding: 9px 0;
      		}
   		</style>
    	<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
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
	</head>
		<?php
			date_default_timezone_set("Asia/Jakarta");
			$ayam = date("dmY").'-'.date("His");
			$finalcode='JL-'.$ayam;
		?>

		<script>
			function sum() {
	            var txtFirstNumberValue = document.getElementById('txt1').value;
	            var txtSecondNumberValue = document.getElementById('txt2').value;
	            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
	            if (!isNaN(result)) {
	                document.getElementById('txt3').value = result;
					
	            }
			 	var txtFirstNumberValue = document.getElementById('txt11').value;
            	var result = parseInt(txtFirstNumberValue);
            	if (!isNaN(result)) {
                	document.getElementById('txt22').value = result;				
            	}
			 	var txtFirstNumberValue = document.getElementById('txt11').value;
            	var txtSecondNumberValue = document.getElementById('txt33').value;
            	var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            	if (!isNaN(result)) {
                	document.getElementById('txt55').value = result;	
            	}
			 	var txtFirstNumberValue = document.getElementById('txt4').value;
			 	var result = parseInt(txtFirstNumberValue);
            	if (!isNaN(result)) {
                	document.getElementById('txt5').value = result;
				}
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
	<body>
		<?php include('navfixed.php');?>
		<?php
			$position=$_SESSION['SESS_LAST_NAME'];
		if ($position=='admin') {
		?>
			<div class="container-fluid">
      		<div class="row-fluid">
				<div class="span2">
          			<div class="well sidebar-nav">
              			<ul class="nav nav-list">
             				<li ><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
							<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Penjualan</a>  </li>
							<li><a href="purchases.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Pembelian</a>  </li>     
							<li class="active"><a href="products.php"><i class="icon-list-alt icon-2x"></i> Menu</a></li>
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
        <?php } ?>    
			<div class="span10">
				<div class="contentheader">
					<i class="icon-table"></i> Menu
				</div>
				<ul class="breadcrumb">
					<li><a href="index.php">Dashboard</a></li> /
					<li class="active">Menu</li>
				</ul>
				<input type="text" style="padding:15px; width:880px;" name="filter" value="" id="filter" placeholder="Cari Menu..." autocomplete="off" />
				<a rel="facebox" href="addproduct.php">
					<Button type="submit" class="btn btn-info" style="float:right; width:200px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Tambah Menu</button>
				</a>
					<br><br>
				<table class="hoverTable" id="resultTable" data-responsive="table" style="text-align: left;">
					<thead>
						<tr>
							<th width="52%"> NAMA MENU</th>
							<th width="14%"> HARGA </th>
							<?php 
								$position=$_SESSION['SESS_LAST_NAME'];
								if($position=='admin'){
								?>
							<th width="8%"> Aksi </th>
							<?php } else {}?>
						</tr>
					</thead>
					<tbody>
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
							include('../connect.php');
							$result = $db->prepare("SELECT * FROM products ORDER BY product_id DESC");
							$result->execute();
							for($i=0; $row = $result->fetch(); $i++){
							?>
							<td><?php echo $row['product_code']; ?></td>
							<td><?php
									$pprice=$row['price'];
									echo formatMoney($pprice, true);
								?>		
							</td>
							<?php $position=$_SESSION['SESS_LAST_NAME'];

							if($position=='admin' ){
							?>	
								<td>
									<a rel="facebox" title="Click to edit the menu" href="editproduct.php?id=<?php echo $row['product_id']; ?>">
										<button class="btn btn-warning"><i class="icon-edit"></i> </button> 
									</a>
									<a rel="facebox" title="Click to delete the menu" href="hapusproduct.php?id=<?php echo $row['product_id']; ?>">
										<button class="btn btn-danger"><i class="icon-trash"></i> </button> 
									</a>
								</td>
							<?php }
							?>
						</tr>
					<?php
					}
					?>	
				</tbody>
			</table>
			<div class="clearfix"></div>
		</div>
		</div>
		</div>
		<script src="js/jquery.js"></script>
  		<script type="text/javascript">
			$(function() {
				$(".delbutton").click(function(){
					var element = $(this);
					var del_id = element.attr("id");
					var info = 'id=' + del_id;
	 				if(confirm("Yakin akan menghapus data?")){
						$.ajax({
						   type: "GET",
						   url: "deleteproduct.php",
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
	</body>
	<?php include('footer.php');?>
</html>