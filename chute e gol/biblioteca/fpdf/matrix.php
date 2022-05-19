<!DOCTYPE html>
<html>

	<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<title>Untitled 1</title>
	</head>
	
	<body>
		<?php
			ob_start();
			require_once("../../fpdf/fpdf.php");

	   $matrix = array();
	    $position = '';
	    $pdf = new FPDF();
	    $pdf->AddPage();
	    $pdf->SetFont('Arial', 'B', 16);
	    $pdf->Cell(12, 10, ' ', 1, 0, 'C');
	    $pdf->Cell(12, 10, 'A', 1, 0, 'C');
	    $pdf->Cell(12, 10, 'B', 1, 0, 'C');
	    $pdf->Cell(12, 10, 'C', 1, 0, 'C');
	    $pdf->Cell(12, 10, 'D', 1, 0, 'C');
	    $pdf->Cell(12, 10, 'E', 1, 0, 'C');
	    $pdf->Cell(12, 10, 'F', 1, 0, 'C');
	    $pdf->Cell(12, 10, 'G', 1, 0, 'C');
	    $pdf->Cell(12, 10, 'H', 1, 0, 'C');
	    $pdf->Ln(10);
	    for ($i = 1; $i <= $this->rows; $i++) {
	        $letra = 'A';
	        $pdf->Cell(12, 10, $i, 1, 0, 'C');
	        for ($j = 0; $j < $this->cols; $j++) {
	            $matrix[$i][$j] = rand($this->min, $this->max);
	            $pdf->Cell(12, 10, $matrix[$i][$j], 1, 0, 'C');
	            $position .= $letra . $i . '-' . $matrix[$i][$j] . ';';
	            ++$letra;
	        }
	        $pdf->Ln(10);
	    }
	    $pdf->Output('accessMatrix.pdf', 'D');	
	    ?>
	</body>

</html>
