<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type">
		<title>Untitled 1</title>
	</head>
	<body>
		<?php			
			ob_start();
			require_once("../fpdf/fpdf.php");
			$pdf = new FPDF("P","pt","A4");
			 
			$pdf->AddPage();
			
			$pdf->SetFont('arial','B',18);
			$pdf->Cell(0,5,"RELATÓRIO",0,1,'C');
			$pdf->Cell(0,5,"","B",1,'C');
			$pdf->Ln(50);
			 
			//cabeçalho da tabela 
			$pdf->SetFont('arial','B',14);
			$pdf->Cell(130,20,'Coluna 1',1,0,"L");
			$pdf->Cell(140,20,'Coluna 2',1,0,"L");
			$pdf->Cell(130,20,'Coluna 3',1,0,"L");
			$pdf->Cell(160,20,'Coluna 4',1,1,"L");
			 
			//linhas da tabela
			$pdf->SetFont('arial','',12);
			for($i= 1; $i <10;$i++){
			    $pdf->Cell(130,20,"Linha ".$i,1,0,"L");
			    $pdf->Cell(140,20,rand(),1,0,"L");
			    $pdf->Cell(130,20,rand(),1,0,"L");
			    $pdf->Cell(160,20,rand(),1,1,"L");
			}			
			$pdf->Output("arquivo.pdf","I");
		?>
	</body>
</html>
