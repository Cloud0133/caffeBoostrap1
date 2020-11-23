<?php  
session_start();  
ob_start();  
?>  
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->  
<head>  
<title>Admin Area</title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />  
<link rel="icon" href="../img/pic1.bmp" type="image/x-icon" />
  
<style type="text/css">
table {background:url(img/header11.jpg);no-repeat center center fixed; background-size: cover;
 -webkit-background-size: cover; 
 -moz-background-size: cover; -o-background-size: cover;}
</style>
</head>  
<body> 
<?php
include('koneksi.php');
$invoice=$_GET['invoice'];

	$result = mysql_query("SELECT * FROM sales_order where invoice_number='$invoice'");
	while($data = mysql_fetch_array($result))

	  { ?>
<?php 
$pdf_nota_no = $data['invoice_number']; 

$pdf_tanggal = $data['date']; 



$pdf_nota_no1 = $data['invoice_number']; 
$pdf_tanggal1 = $data['date']; 
$pdf_menu1 = $data['product_code']; 


?><br>
      <?php 
      }


?>

<br/> <h2>
    

<table background="img/imagessdfsd.jpg" border="1" height="200" width="420" align="center">  
    <tr>  
        <td align="center"><b>NOTA PENJUALAN</b></td>
    </tr>

    <tr>
        <td align="center"><b>CAFE</b></td>
    </tr>
</table>
</h2>

<table background="img/imagessdfsd.jpg" border="0" height="200" width="420">

    <tr>
        <td style="color:white">p</td>
        <td align="left"><b>NOTA NO</b></td>
        <td align="left"><b>: <?php echo $pdf_nota_no1; ?></b></td>
    </tr>

    <tr>
        <td style="color:white">p</td>
        <td align="left"><b>TANGGAL</b></td>
        <td align="left"><b>: <?php echo $pdf_tanggal1; ?></b></td>
    </tr> 
    
</table>
<br><br>

<table background="img/imagessdfsd.jpg" border="1" height="200" width="420">

    <tr >
        
        <td align="center"><b>MENU</b></td>
    </tr>
    <tr>



<?php
include('koneksi.php');
$invoice_a=$_GET['invoice'];

    $result1 = mysql_query("SELECT * FROM sales_order where invoice_number='$invoice_a'");
    while($data = mysql_fetch_array($result1))

      { ?>
<?php 


$pdf_menu1 = $data['product_code']; 

?><br>


       
       <td><?php echo $data['product_code']; ?></td>
    </tr>
    
</table>






      <?php 
      }


?>




</body>  
</html>


<?php

$filename="Nota - ".$pdf_nota_no." - ".$pdf_tanggal.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya  
//==========================================================================================================  
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF  
//==========================================================================================================  
$content = ob_get_clean();  
$content = '<page style="font-family: freeserif">'.($content).'</page>';  
 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');  
 try  
 {  
  $html2pdf = new HTML2PDF('L','A5','en', false, 'ISO-8859-15',array(1,0));  
  $html2pdf->setDefaultFont('arial','12');  
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));  
  $html2pdf->Output($filename);  
 }  
 catch(HTML2PDF_exception $e) { echo $e; }  
?>  