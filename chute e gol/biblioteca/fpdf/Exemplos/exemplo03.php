<?php
	require('../fpdf/fpdf.php');
	class NOVOPDF extends FPDF
	{
		// Page header
		function Header()
		{
			$this->Image('logo.png',10,10,190); // Logo
			$this->Ln(30);
			$this->SetFont('Arial','B',15); // Arial bold 15
			$this->Cell(80); // Move para direita 80
			$this->Cell(30,10,utf8_decode('Título'),1,0,'C');
			$this->Ln(20); // Line break
		}
		// Rodapé por página
		function Footer()
		{
			$this->SetY(-15); // Position at 1.5 cm from bottom
			$this->SetFont('Arial','I',8); // Arial italic 8
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C'); 
			// Page number
		}
	}
	// Instância de herança da classe FPDF
	$pdf = new NOVOPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	for($i=1;$i<=80;$i++)
		$pdf->Cell(0,10,'Teste de linha '.$i,0,1);
	$pdf->Output();
?>
