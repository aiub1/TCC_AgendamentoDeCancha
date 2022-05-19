<?php
	ob_start(); 
	require_once('../fpdf/fpdf.php');  // Carrega o FPDF apenas uma vez
	$pdf = new FPDF('P','mm','A4');    // Cria um novo PDF
	$pdf->AddPage();	               // Adiciona uma página
	// Seleciona a fonte
	$pdf->SetFont('arial','B',18);
	// Envia o cursor para a primeira posição 10,10
	$pdf->SetXY (10,10);
	// Fundo r,g,b
	$pdf->SetFillColor(0,176,240);
	// Escreve o título da página
	$pdf->Cell (80,10,utf8_decode('Relatório de Compras'),0,0,'C',True);
	// Fazer a tabela => Célula por célula
	// mover para o início da tabela
	$pdf->SetXY (10,30);
	// Cabeçalho da tabela
	// Fundo r,g,b
	$pdf->SetFillColor(172,212,51);
	// Cor do texto
	$pdf->SetTextColor(255,255,255); // Branco
	$pdf->Cell (40,10,'Produto',0,0,'L',True); // Mesma linha
	$pdf->Cell (40,10,'Valor',0,1,'L',True); // Linha abaixo
	// Linhas
	$pdf->SetTextColor(0,0,0); // texto preto
	
	$pdf->SetFillColor(227,239,205); // fundo
	$pdf->Cell (40,10,'Banana',0,0,'L',True); // Mesma linha
	$pdf->Cell (40,10,'1,50',0,1,'R',True); // Linha abaixo
	
	$pdf->SetFillColor(241,247,232); // fundo
	$pdf->Cell (40,10,'Pera',0,0,'L',True); // Mesma linha
	$pdf->Cell (40,10,'4,80',0,1,'R',True); // Linha abaixo		
	
	$pdf->SetFillColor(227,239,205); // fundo
	$pdf->Cell (40,10,utf8_decode('Maça'),0,0,'L',True); // Mesma linha
	$pdf->Cell (40,10,'3,90',0,1,'R',True); // Linha abaixo
	
	$pdf->SetFillColor(241,247,232); // fundo
	$pdf->Cell (40,10,utf8_decode('Melância'),0,0,'L',True); // Mesma linha
	$pdf->Cell (40,10,'13,40',0,1,'R',True); // Linha abaixo	
	
	$pdf->Output("exemplo01.pdf","I");
?>
