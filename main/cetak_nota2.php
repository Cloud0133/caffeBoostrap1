<?php
include "koneksi2.php";
include "fungsi.php";
        $invoice1  = $_POST['invoicee'];

 
$query = "SELECT * FROM sales_order WHERE invoice_number like '%$invoice1%'";


$sql = $mysqli->query($query) or die ("query gagal");
 $i=0;
 while($data = $sql->fetch_row()) {
    $cell[$i][0] = $data[0]; //invoice_number
    $cell[$i][1] = $data[4]; //product_code
    $cell[$i][2] = $data[5]; //price
    $cell[$i][3] = $data[2]; //qt
    $cell[$i][4] = $data[3]; //amount
    $i++;
 }
    
 require('fpdf17/fpdf.php');
 ob_end_clean();    
 header("Content-Encoding: None", true);
 
  class PDF extends FPDF
  {
 Function Header() {

  
  
  
    $this -> SetFont('times','B',12);
    $this -> Cell(25);
    $this -> Cell(0,0,'Title',0,0,'L');
    //$this-> Image('ppm.png',3,2,-500);

    $this -> SetFont('times','B',16);
    $this-> Cell(20.5,1,'POLITEKNIK PERDANA MANDIRI','',1,'C');


    
    $this-> SetFont('times','B',16);
    $this-> Cell(20.5,0.5,'POLITEKNIK PERDANA MANDIRI','',1,'C');
    $this-> SetFont('times','B',10);
    $this-> Cell(21.5,0.5,'Alamat : Jl. Veteran Oesman Singawinata Blok A1 9-10 Purwakarta 41115','',1,'C');

    $this-> SetFont('times','B',10);
    $this-> Cell(20.5,0.5,'Telp: (0264)207430, fax (0264)209585','',1,'C');
    //$this-> Image('ppm.png',3,2,-500);
    $this -> Ln();
    $this -> SetFont('times','B',12);
    //$this -> Cell(19,1,'Laporan Pendaftar Tahun Angkatan '.$cell[$j][1],'',0,'C');
    $this -> Ln();

    $this -> SetFont('times','B',10);
    $this -> Cell(1,0.7,"No",'LBTR',0,'C');
    $this -> Cell(8,0.7,"Menu",'LBTR',0,'C');
    $this -> Cell(3,0.7,"Harga Satuan",'LBTR',0,'C');
    $this -> Cell(2,0.7,"Kuantitas",'LBTR',0,'C');
    $this -> Cell(3,0.7,"Total Harga",'LBTR',0,'C');
    $this -> Ln();

     
  }


 
  Function footer() {
    
    
    $tahun_laporan = indonesian_date();
    //$this -> SetY(-9);
    $this -> SetFont('Times','',9);
    $this -> Cell(18,6,'Purwakarta, '.$tahun_laporan,10,10,'R');
    $this -> Cell(18,1,'(...................................)',10,10,'R');
    $this -> Ln();
    
  }
 }

/*  Function footer() {
 
  
    $this -> SetY(-9);
    $this -> SetFont('Times','',9);
    //$this -> Cell(18,9,'Purwakarta, '.indonesian_date().'a',10,10,'R');
    $this -> Cell(18,10,'(.........................)',10,10,'R');
  
 }
  */ 
  
  $pdf = new PDF('P','cm','A4');
  $pdf -> open ();
  

  $pdf->AddPage();

/*
  $pdf->SetFont('times','B',16);
  $pdf->Cell(20.5,1,'POLITEKNIK PERDANA MANDIRI','',1,'C');
  $pdf->SetFont('times','B',10);
  $pdf->Cell(21.5,0.5,'Alamat : Jl. Veteran Oesman Singawinata Blok A1 9-10 Purwakarta 41115','',1,'C');
  $pdf->SetFont('times','B',10);
  $pdf->Cell(20.5,0.5,'Telp: (0264)207430, fax (0264)209585','',1,'C');
  $pdf->Ln();
  $pdf->SetFont('times','B',12);
  $pdf->Cell(19,1,'Daftar Mahasiswa Tahun Angkatan '.$tahun_angkatan,'',0,'C');
*/

    $pdf -> SetFillColor(200,200,200);

  For($j=0;$j<$i;$j++) {
    $no = 1;
    $no = $no + $j;
    $pdf->SetFont ('Times','',10);
    if ($j % 2 ==0) {
    $latar=0;
    }
    else
    { $latar=1;
    }
    
    $pdf->Cell(1,0.5,$no,'LBTR',0,'C',$latar);
    $pdf->Cell(8,0.5,$cell[$j][1],'LBTR',0,'L',$latar);
    $pdf->Cell(3,0.5,$cell[$j][2],'LBTR',0,'C',$latar);
    $pdf->Cell(2,0.5,$cell[$j][3],'LBTR',0,'C',$latar);
    $pdf->Cell(3,0.5,$cell[$j][4],'LBTR',0,'C',$latar);

    
    $pdf->Ln();
    
   }


  
 
 
  $pdf->Ln();
  
  $pdf->output();
   
?>
  