<!DOCTYPE html>
<html>
<head>
<title>Apagar</title>
<link rel="stylesheet" href="../../css/estilo_triagem2.css"/>
</head>
<body>
	<h1> Elimina </h1>
	<?php
	echo"<form class='cadastro'>";
		$CodCancha = $_POST["CodCancha"];
		if (isset($_POST["CodCancha"]))
		{
			$CodCancha= $_POST["CodCancha"];
			$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
			if ($conexao->connect_errno)
			{
				echo "Ocorreu um erro na conexão com o banco de dados.";
				exit;
			}
			//DELETE Horario
			
			$sql = "DELETE FROM horario WHERE CodCancha='$CodCancha';";
			echo $sql."<br/>";
			if ($conexao->query($sql) === TRUE) {
				echo "<label class='link'>Horarios removido com sucesso</label></br>";
			} else {
				echo "Erro: " . $sql . "<br>" . $conexao->error;
			}
			
			
			//DELETE Cancha
			
			$sql = "DELETE FROM cancha WHERE CodCancha='$CodCancha';";
			echo $sql."<br/>";
			if ($conexao->query($sql) === TRUE) {
				echo "<label class='link'>Cancha removida com sucesso</label></br>";
			} else {
				echo "Erro: " . $sql . "<br>" . $conexao->error;
			}
			
			
			
			$conexao->close();
		}
	echo"</form>";	
	?>
	<div class="barra"><a class="link" href="apagar.php">Voltar </a></div>
</body>
</html>