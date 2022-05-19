<!DOCTYPE html>
<html>
<head>
<title>Apagar</title>
<link rel="stylesheet" href="../../css/estilo_triagem2.css"/>
</head>
<body>
	<?php
			$CodAgend= $_POST["CodAgend"];
			$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
			if ($conexao->connect_errno)
			{
				echo "Ocorreu um erro na conexão com o banco de dados.";
				exit;
			}
			$conexao->set_charset("utf8"); // Acertar acentuação

			$sql = "SELECT aluguel.*,cancha.DescCancha,cliente.Nome,funcionario.Nome AS nome_func FROM `aluguel`,`cancha`,`cliente`,`funcionario` WHERE aluguel.CodCancha = cancha.CodCancha AND aluguel.CodCliente = cliente.CodCliente AND aluguel.CodFunc = funcionario.CodFunc AND aluguel.CodAgend = '$CodAgend';";
			$result = $conexao->query($sql);
			if ($result->num_rows > 0)
			{
				while ($linha = $result->fetch_assoc())
				{
					
					echo "<form class='cadastro' method='POST' action='elimina.php' onsubmit='return confirm('Confirma?');'>";
					echo "<h1> Apagando </h1>";
					echo "<label>Cod. Cancha.: ".$linha["CodCancha"]."</label><br/>";
					echo "<label>Desc. Cancha: ".$linha["DescCancha"]."</label><br/>";
					echo "<label>Nome Func.: ".$linha["nome_func"]."</label><br/>";
					echo "<label>Cod. Cliente: ".$linha["CodCliente"]."</label><br/>";
					echo "<label>Nome. Func.: ".$linha["Nome"]."</label><br/>";
					echo "<label>Data	: ".$linha["Data_Age"]."</label><br/>";
					echo "<label>Hora: ".$linha["Hora_Age"]."</label><br/>";
					echo "<label>Cod. Agend.: ".$linha["CodAgend"]."</label><br/>";
					echo "<label>Tempo: ".$linha["Tempo"]."</label><br/>";
				}
			} else
			{
				echo "Sem resultados";
			}
			$conexao->close();
	?>
		</br>
		</br>
		<input class="apagar" type="submit" value="Apagar" />
		<input type="hidden" value="<?=$CodAgend ?>" name="CodAgend" />
		<a class="link" href="apagar.php">Voltar </a>
	</form>
</body>
</html>