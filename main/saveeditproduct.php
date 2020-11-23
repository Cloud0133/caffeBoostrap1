<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$a = $_POST['code'];


$d = $_POST['price'];

// query
$sql = "UPDATE products 
        SET product_code=?, price=?
		WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($a,$d,$id));
header("location: products.php");

?>