<?php
	/*********************************************************
		Primeiro Exemplo
	**********************************************************/
	require('../fpdf/fpdf.php');       // Carrega o FPDF
	$pdf = new FPDF();                 // Cria um novo PDF
	$pdf->AddPage();	               // Adiciona uma página
	$pdf->SetFont('Arial','B',16);     // Muda a fonte para Arial,Bold,16
	$pdf->Cell(40,10,'Hello World!');  // Cria uma célula de 40mm por 10mm
	$pdf->Output();                    // Gera o arquivo PDF
?>
