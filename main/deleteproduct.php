<?php

	// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];


// query
$sql = "DELETE FROM products WHERE product_id=?";
$q = $db->prepare($sql);
$q->execute(array($id));
header("location: products.php");
?>