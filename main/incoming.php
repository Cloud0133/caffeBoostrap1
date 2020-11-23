<?php
session_start();
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['product'];
$c = $_POST['qty'];
$c1 = $_POST['qty'];


$w = $_POST['pt'];
$date = $_POST['date'];


$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$harga_product=$row['price'];
$harga_product1=$row['price'];


$code=$row['product_code'];

}

$d = $c1 * $harga_product;


$sql = "INSERT INTO sales_order (invoice_number,product,qty,amount,product_code,price,date) VALUES (:a,:b,:c,:d,:e,:f,:g)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$code,':f'=>$harga_product1,':g'=>$date));
header("location: sales.php?id=$w&invoice=$a");


?>