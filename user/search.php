<?php
require 'includes/functions.php';
require 'includes/fpdf.php';

$data['date1'] = $_POST['date1'];
$data['date1'] = strtotime($data['date1']);

$data['date2'] = $_POST['date2'];
$data['date2'] = strtotime($data['date2']);

$search =   search_order($data);
 


class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    // $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(50);
    // Title
    $this->Cell(80,10,'Resturat management System',1,1,'C');
    $this->Ln(5);
    
    $this->Cell(80,10,'Order Summary');
    // Line break
    $this->Ln(20);

}

function summary(){
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(50);
    // $this->Cell(80,10,'');
    
}
 

function BasicTable($header, $data)
{
    // Header
      

    foreach($header as $col)
        $this->Cell(30,7,$col,1);
    	$this->Ln();
    // Data
     

    foreach($data as $row)
    {
        

        foreach($row as $col){
            $this->Cell(30,6,$col,1);
        }
       
       
        $this->Ln();
         

    }
}

 
// Page footer
function Footer()
{
    
    $this->Ln();

    $this->summary();
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$header = array('id', 'order_key', 'items','qty','price','date');
   
       $total =  $search[0]['qty']*$search[0]['price'];
   
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->BasicTable($header,$search);
$pdf->Write(10,'Total Price '.$total.'/-');
$pdf->Output();
?>