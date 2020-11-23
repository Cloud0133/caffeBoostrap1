<?php
session_start();
include('../connect.php');
$a = $_POST['code']; //

$b = $_POST['price']; //

$c = $_POST['user_id']; //
// query
$sql = "INSERT INTO products (product_code,price,user_id) VALUES (:a,:b,:c)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c));
header("location: products.php");


?>