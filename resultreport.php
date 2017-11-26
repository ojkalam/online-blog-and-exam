<?php
include_once "header.php";
require_once('assets/fpdf/fpdf.php');
require_once ('assets/fpdf/rotation.php');


class PDF extends PDF_Rotate
{
	function Header()
	{
		//Put the watermark
		//$this->SetFont('Arial','B',50);
		//$this->SetTextColor(255,192,203);
		//$this->RotatedText(65,190,'A p p r o v e d',45);
	}
	function RotatedText($x, $y, $txt, $angle)
	{
		//Text rotated around its origin
		$this->Rotate($angle,$x,$y);
		$this->Text($x,$y,$txt);
		$this->Rotate(0);
	}
}

//$pdf = new FPDF();
$pdf=new PDF();
$pdf->AddPage();



$iubat='Western Laboratory School' ;				

		
		
$pdf->Image('assets/img/logo.png',10,9,17);
$pdf->Ln();
$pdf-> Cell(20);
$pdf->SetFont('Times','',16);
$pdf->Write(5, $iubat);
$pdf->Ln();
$pdf-> Cell(22);
$pdf->SetFont('Times','',12);
$pdf->Write(4,'Developed by Framwork Team');
$pdf->Ln();
$pdf-> Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Write(4, 'Sector 10, Uttara Model Town, Dhaka 1230, Bangladesh');
$pdf->Ln();
$pdf-> Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Write(4,'Phone: 0172321565, Email: westernls@gmail.com');
$pdf->Ln();
$pdf-> Cell(20);
$pdf->SetFont('Times','',12);
$pdf->Write(4,'Web: www.westernlsbd.com');
$pdf-> Cell(20);
$pdf->SetFont('Times','',8);
$pdf->Write(5, '__________________________________________________________________________________________________________________________________');
$pdf->Ln();
$pdf->Ln();

$pdf-> Cell(85);
$pdf->SetFont('Times','U',12);
$pdf->Write(5, 'Result Sheet');
$pdf->Ln();

$pdf->Ln(2);			


$pdf-> Cell(5);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(30,6,'Student Name',1);
		$pdf->Cell(80,6,'Exam Name',1);
		$pdf->Cell(40,6,'Score',1);
		$pdf->Ln();
					if (isset($_SESSION['score'])) {
					$username = Session::get("username");
					$lsex = Session::get("lastexam");
					$qry = $ex->getTestResult($_SESSION['score'],$lsex);

					$rec = $qry->fetch_assoc();
						$pdf-> Cell(5);
						$pdf->SetFont('Times','',14);
						$pdf->Cell(30,20,$username, 1);
						$pdf->Cell(80,20,$rec['exname'],1);
						$pdf->Cell(40,20,$rec['score'],1);
						$pdf->Ln();
    
                
				}
		
$pdf->Ln();
$pdf->Ln();		
ob_end_clean();
$pdf->Output();