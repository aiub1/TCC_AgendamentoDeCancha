<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type">
		<title>Untitled 1</title>
	</head>
	<body>
		<?php			
			ob_start();

			require_once('diag.php');
			$pdf = new PDF_Diag();
			$pdf->SetAutoPageBreak(true, 1);  //RETIRA A MARGEM DE BAIXO. Se chegar à 1mm do final, quebra a pagina;
			$pdf->AddPage();
			$data = array(	'MenA' => 3,
							'WomenA' => 2,
							
							'MenB' => 7,
							'WomenB' => 8,
							
							'MenC' => 19,
							'WomenC' => 22,
							
							'MenD' => 34,
							'WomenD' => 38,
							
							'MenE' => 19,
							'WomenE' => 16,
							
							'MenF' => 17,
							'WomenF' => 14);
							
			
			
			$pdf->SetFont('Arial','BI',24);
			$pdf->SetTextColor(255,255,255);
			$pdf->SetFillColor(152, 83, 155);
			$pdf->Rect(0,0,70,298, 'F');
			
			$pdf->SetXY(6,37);
			$pdf->MultiCell(60,10,"Market \nSegmentation",0,"L");
			
			$pdf->SetFont('Arial','BI',15);
			$pdf->SetXY(6,62);
			$pdf->MultiCell(40,7,"Consumer \nProfile Report",0,"L");
			
			$pdf->Image("image/Livro.png",15, 100, 43, 43);
			$pdf->Image("image/Velho.png",15, 160, 43, 43);
			$pdf->Image("image/Bolsa.png",15, 220, 43, 43);
			
			$pdf->SetTextColor(0,0,0);
			$pdf->SetXY(87,15);
			$pdf->Cell(87, 5, 'Consumer Age Groups', 0, 1);
			
			//Retangulo amarelo atrás do bagulhets
			$pdf->SetFillColor(255, 243, 235);
			$pdf->Rect(87, 48, 14, 16, "F");
			
			//Bar diagram
			$pdf->SetFont('Arial', 'BI', 12);
			$pdf->SetXY(100,28);
			$valX = $pdf->GetX();
			$valY = $pdf->GetY();
			$pdf->SetTextColor(0,0,0);
			$pdf->BarDiagram(100, 60, $data, '%l : %v (%p)', array(255,175,100));
			$pdf->SetXY($valX, $valY + 80);
			
			//LEGENDAS DAS BARRAS
			
			$pdf->SetFont('Arial','I',12);
			$pdf->SetXY(87,31.5);
			$pdf->MultiCell(60,8.1,"12-17\n18-22\n23-27\n28-32\n33-37\n38-42",0,"L");
			
			//LEGENDAS DE CORES
			
			$pdf->SetFont('Arial', 'I', 9);
			
			$pdf->SetFillColor(152, 83, 155);
			$pdf->Rect(120, 93, 5, 5, "F");
			$pdf->SetXY(126,93);
			$pdf->Cell(10,5,"Males",0,1);
			
			$pdf->SetFillColor(244, 85, 159);
			$pdf->Rect(145, 93, 5, 5, "F");
			$pdf->SetXY(151,93);
			$pdf->Cell(10,5,"Females",0,1);
			
			//Linha do GRÁFICO
			$pdf->SetDrawColor(20,20,20);
			$pdf->Line(85, 56.5, 79, 56.5);
			$pdf->Line(79, 110, 79, 56.5);
			
			//Texto abaixo da legenda das cores
			$pdf->SetFont('Arial', 'I', 11);
			$pdf->SetXY(83,108);
			$pdf->Cell(120,5, "Primary consumers are males and females between ages 23-32",0,0);
			
			$pdf->SetFont('Arial', 'I', 18);
			$pdf->SetXY(77,122);
			$pdf->Cell(120,5, "Primary consumer lifestyle and behaviour:",0,0);
			
			//Dados abaixo
			$pdf->SetDrawColor(235, 227, 220);
			$pdf->SetFillColor(255, 243, 240);
			$pdf->Rect(70.3, 136, 140, 20, "DF");
			$pdf->Rect(70.3, 156, 140, 60, "DF");
			$pdf->Rect(70.3, 216, 140, 20, "DF");
			$pdf->Rect(70.3, 236, 140, 61, "DF");
			
			//TITULOS DA PARTE BEGE
				//IMAGENZINHAS
				$pdf->Image("image/Pessoinha.png",80, 139, 14, 14);
				$pdf->Image("image/Pessoinha.png",80, 219, 14, 14);
				
				//TITULOS
				$pdf->SetFont('Arial','BI',14.5);
				$pdf->SetXY(100,138);
				$pdf->MultiCell(0,8,"Consumers ages 23-27 have an\naverage annual income of $49,000.",0,"L");
			
				$pdf->SetXY(100,218);
				$pdf->MultiCell(0,8,"Consumers ages 28-32 have an\naverage annual income of $62,000.",0,"L");
			
				//PORCENTAGENS
				$pdf->SetFont('Arial','B',11);
				$pdf->SetXY(85,156);
				$pdf->MultiCell(0,10,"53%\n24%\n42%\n36%\n12%\n15%",0,"L");
				
				$pdf->SetXY(85,236);
				$pdf->MultiCell(0,10,"34%\n32%\n34%\n26%\n8%\n12%",0,"L");

				//TEXTOS
				$pdf->SetFont('Arial','',11);
				$pdf->SetXY(94,156);
				$pdf->MultiCell(0,10,"live with parents\nlive alone without a partner or dependents\nrent living space instead of owning property\nclaim to care about social issues\nclaim to be very socially or politically active/concerned\nare pursuing a postgraduate degree",0,"L");
				
				$pdf->SetXY(94,236);
				$pdf->MultiCell(0,10,"live with parents\nlive alone without a partner or dependents\nrent living space instead of owning property\nclaim to care about social issues\nclaim to be very socially or politically active/concerned\nare pursuing a postgraduate degree",0,"L");

			

			$pdf->Output("arquivo.pdf","I");
		?>
	</body>
</html>