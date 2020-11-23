<?php 
$servername = "localhost";
$user		= "root";
$pasword	= "";
$db			= "cafe";

$koneksi = mysql_connect ($servername,$user, $pasword)
			or die ('gagal terkoneksi'.mysql_error());
			
$database = mysql_select_db ($db)
			or die ('gagal terhubung ke database'.mysql_error());
?>

<?php
	$HostName = "localhost";
	$UserName = "root";
	$Password = "";
	$DbName = "cafe";
	$koneksi2 = mysqli_connect($HostName,$UserName,$Password, $DbName);
?>