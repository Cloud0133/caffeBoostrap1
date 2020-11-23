<?php 
session_start();
?>

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveproduct.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Tambah Menu</h4></center>
<hr>
<div id="ac">
<span>Nama Menu : </span><input type="text" style="width:265px; height:30px;" name="code" ><br>

<span>Harga Jual : </span><input type="number" id="txt1" style="width:265px; height:30px;" name="price" onkeyup="sum();" Required><br>




<input type="hidden" style="width:265px; height:30px;" name="user_id" value="<?php echo $_SESSION['SESS_MEMBER_ID']?>" />
<br><br>
<center>
	<button class="btn btn-success btn-block btn-large" style="width:360px;"><i class="icon icon-save icon-large"></i> Simpan</button>
</center>

</div>
</div>
</form>
