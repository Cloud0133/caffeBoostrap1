<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />

<form action="saveeditproduct.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Menu</h4></center>
<hr>
<div id="ac">

<input type="hidden" name="memi" value="<?php echo $id; ?>" />

<span>Nama Menu : </span><input type="text" style="width:265px; height:30px;"  name="code" value="<?php echo $row['product_code']; ?>" Required/><br>



<span>Harga Jual : </span><input type="number" style="width:265px; height:30px;" id="txt1" name="price" value="<?php echo $row['price']; ?>" onkeyup="sum();" Required/><br>




<div style="float:right; margin-right:10px;">


</div>
<br><br>
<center>
	<button class="btn btn-success btn-block btn-large" style="width:360px;"><i class="icon icon-save icon-large"></i> Simpan Perubahan</button>
	
</center>
</div>
</form>
<?php
}
?>