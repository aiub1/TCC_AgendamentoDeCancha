<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type">
		<title>RELATÓRIO DIARIO</title>
	</head>
	<body>
		<?php			
			ob_start();
			require_once("../../biblioteca/fpdf/fpdf.php");
			require_once("../../biblioteca/biblio.php");
			$hoje = date('Y-m-d');
			
			$pdf = new FPDF("P","pt","A4");
			 
			$pdf->AddPage();
			$pdf->SetFont('arial','B',18);
			$pdf->Cell(0,5,"RELATÓRIO DIARIO DE $hoje",0,1,'C');
			$pdf->Cell(0,5,"","B",1,'C');
			$pdf->Ln(50);
			
			
			
			$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
			if ($conexao->connect_errno)
			{
				echo "Ocorreu um erro na conexão com o banco de dados.";
				exit;
			}
			$conexao->set_charset("utf8"); // Acertar acentuação

			$sql = "SELECT 
				aluguel.CodAgend,
				cliente.CodCliente,
				cancha.DescCancha,
				aluguel.Hora_Age,
				aluguel.Tempo,
				cliente.Nome,
				funcionario.CodFunc,
				funcionario.nome as NomeFunc
				FROM aluguel, cliente, cancha, funcionario 
				WHERE aluguel.CodCancha=cancha.CodCancha AND aluguel.CodCliente=cliente.CodCliente AND aluguel.CodFunc=funcionario.CodFunc AND aluguel.Data_Age='$hoje'";
			$result = $conexao->query($sql);
			if ($result->num_rows > 0)
		{
			while ($linha = $result->fetch_assoc())
			{
			 
			 //cabeçalho da primeira tabela 
			$pdf->SetFont('arial','B',14);
			$pdf->Cell(80,20,'CodAgend',1,0,"L");
			$pdf->Cell(80,20,'CodCliente',1,0,"L");
			$pdf->Cell(95,20,'NomeCancha',1,0,"L");
			$pdf->Cell(70,20,'HoraAge',1,0,"L");
			$pdf->Cell(60,20,'Tempo',1,0,"L");
			$pdf->Cell(173,20,'Nome Cliente',1,1,"L");
			
			//linhas da tabela
			$pdf->SetFont('arial','',12);
		
			    $pdf->Cell(80,20,$linha["CodAgend"],1,0,"L");
			    $pdf->Cell(80,20,$linha["CodCliente"],1,0,"L");
			    $pdf->Cell(95,20,$linha["DescCancha"],1,0,"L");
			    $pdf->Cell(70,20,$linha["Hora_Age"],1,0,"L");
				$pdf->Cell(60,20,$linha["Tempo"],1,0,"L");
			    $pdf->Cell(173,20,$linha["Nome"],1,1,"L");
				
				// cabeçalho segunda tabela
				$pdf->SetFont('arial','B',14);
				$pdf->Cell(255,20,'Cod Funcionario',1,0,"L");
				$pdf->Cell(303,20,'Nome Funcionario',1,1,"L");
				
						
			//linhas da segunda tabela
			$pdf->SetFont('arial','',12);
			    $pdf->Cell(255,20,$linha["CodCliente"],1,0,"L");
			    $pdf->Cell(303,20,$linha["NomeFunc"],1,1,"L");
				$pdf->Ln(50);
				
			}
		} else
		{
			echo "Sem resultados";
		}
			
			$pdf->Output("relatorio_diario.pdf","I");
			
		?>
	</body>
</html>
