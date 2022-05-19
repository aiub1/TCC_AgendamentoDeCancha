<?php
		require_once('../../biblioteca/biblio.php');
		acesso2();
		echo $_POST["DescCancha"];
		if (isset($_POST["DescCancha"]))
		{
			$DescCancha= $_POST["DescCancha"];
			$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
			if ($conexao->connect_errno)
			{
				echo "Ocorreu um erro na conexão com o banco de dados.";
				exit;
			}
			$conexao->set_charset("utf8"); // Acertar acentuação

			$sql = "SELECT `CodCancha`, `DescCancha` FROM `cancha` WHERE DescCancha='$DescCancha';";
			$result = $conexao->query($sql);
			if ($result->num_rows > 0)
			{
				while ($linha = $result->fetch_assoc())
				{
					$CodCancha  	= $linha["CodCancha"];					
					$DescCancha   	= $linha["DescCancha"];		
				}
			} else
			{
				echo "<p>Sem resultados</p>";
			}
			$conexao->close();
		}
			
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro de Funcionario</title>
		<link rel="stylesheet" href="../../css/estilo_triagem2.css">
		<style type="text/css">
		label
		{
			display: inline-block;
			width: 120px;
		}
		.erro {
			background-color: #303a43;
			color: #FF0000;
			text-align: center;
			font-size: xx-large;
			font-family: "American Captain";
			}
		.sucesso {
			background-color: #303a43;
			color: #2BB91E;
			text-align: center;
			font-size: xx-large;
			font-family: "American Captain";
			}
		</style>
	</head>
	<div class="barra">| Atualizar |<a class="link" href="atualizar.php"> VOLTAR|</a></div>
	<body>
		<form action="atu.php" class = "cadastro"  method="POST">
			<label>CodCancha:</label>
			<input type="text" name="CodCancha"  value="<?=$CodCancha?>" required  maxlength="60" readonly="true" />
			<br/>
			<label>DescCancha:</label>
			<input type="text" name="DescCancha"  value="<?=$DescCancha?>" required  maxlength="60"  />
			</br>
			<input name="enviar" value="Enviar" type="submit" class="enviar" >
		</form>
	</body>
</html>