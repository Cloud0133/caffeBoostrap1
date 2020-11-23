<?php
session_start();
include('../connect.php');
$a = $_POST['invoice'];

$c = $_POST['date'];

$e = $_POST['amount'];

$aa = $_POST['user_id'];

$f = $_POST['cash'];

$cn = $_POST['Customer_name'];

$ct = $_POST['Customer_Telp'];

if ($e >= $f) {
	die("<script>alert('Uang yang dibayarkan kurang!'); window.location = 'index.php'</script>");
} else {

$sql = "INSERT INTO sales (invoice_number,date,amount,cash,user_id,Customer_name,Customer_Telp) VALUES (:a,:c,:e,:f,:aa,:cn,:ct)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':c'=>$c,':e'=>$e,':f'=>$f,':aa'=>$aa, ':cn'=>$cn, ':ct'=>$ct));
header("location: preview.php?invoice=$a");
exit();
}
// query



?>