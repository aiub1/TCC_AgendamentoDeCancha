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
			$pdf = new FPDF("P","mm","A4");
			
			$pdf->SetAutoPageBreak(true, 10);
			$pdf->AddPage();
			
			$pdf->SetFont('Courier','B',18);
			$pdf->Image('image/IES_Logo.jpg',10,10,60,19);
			$pdf->SetTextColor(200,200,200);
			$pdf->Cell('',18, 'Model Summary', 0,0, "R");
			$pdf->Ln(30);
			$pdf->SetTextColor(0,0,0);
			
			//cabeçalho da tabela 
			$pdf->SetFont('Courier','B',14);
			$pdf->SetTextColor('255','255','255');
			$pdf->SetFillColor('70','150','150');
			$pdf->Cell(90,8,'Room Name',0,0,"L", true);
			$pdf->Cell(40,8,'Room ID',0,0,"L", true);
			$pdf->Cell(60,8,utf8_decode('Floor Area (m²)'),0,1,"L", true);
			 
			//linhas da tabela
			$pdf->SetTextColor('0','0','0');
			$pdf->SetFillColor('210','230','230');
			$pdf->SetFont('Courier','B',12);
			for($i= 1; $i <500;$i++){
			    if ($i % 2 == 0){
					$fill = true;
				}else{
					$fill = false;
				}
				$pdf->Cell(90,7,"Sala ".$i,0,0,"L", $fill);
			    $pdf->Cell(40,7,rand(10000000,99999999),0,0,"L", $fill);
			    $pdf->Cell(60,7,(rand(0,600))/10,0,1,"L", $fill);
			}
			
			$pdf->Ln( 12 );
			$pdf->Output("arquivo.pdf","I");
		?>
	</body>
</html>