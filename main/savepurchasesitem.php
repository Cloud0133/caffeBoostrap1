<?php
session_start();
include('../connect.php');
$a = $_POST['invoice'];

$a2 = $_POST['invoice'];

$a3 = $_POST['invoice'];


$b = $_POST['product'];
$c = $_POST['qty'];

$ambil_supplier = $_POST['supplier'];

$result = $db->prepare("SELECT * FROM products WHERE product_code= :userid");
$result->bindParam(':userid', $b);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$asasa=$row['price'];
}

//edit qty
$sql = "UPDATE products 
        SET qty=qty+?
		WHERE product_code=?";
$q = $db->prepare($sql);
$q->execute(array($c,$b));

$d=$asasa*$c;

$d2=$asasa*$c; //cost buat purchase

// query
$sql = "INSERT INTO purchases_item (invoice_number,name,qty,cost) VALUES (:a,:b,:c,:d)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d));

//=============================================================


$result2 = $db->prepare("SELECT * FROM purchases_item WHERE invoice_number= :ambil_invoice");
$result2->bindParam(':ambil_invoice', $a2);
$result2->execute();
for($i=0; $row2 = $result2->fetch(); $i++){
$ambil=$row2['invoice_number'];
}

//============================================================


$sql = "UPDATE purchases 
        SET cost= cost+?
		WHERE invoice_number=?";
$q2 = $db->prepare($sql);
$q2->execute(array($d2,$a3));

header("location:  purchasesportal.php?iv=$a&suppl=$ambil_supplier");


?>