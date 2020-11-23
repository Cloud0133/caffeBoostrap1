<?php
session_start();
include('../connect.php');
$a = $_POST['iv'];
$b = $_POST['date'];
$c = $_POST['supplier'];
$c1 = $_POST['supplier'];

$e = $_POST['user_id'];

$ambil_cost = 0;

// query
$sql = "INSERT INTO purchases (invoice_number,date,suplier,cost,user_id) VALUES (:a,:b,:c,:d,:e)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$ambil_cost,':e'=>$e));




header("location: purchasesportal.php?iv=$a&suppl=$c1");


?>