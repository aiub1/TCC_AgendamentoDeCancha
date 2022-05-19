<!DOCTYPE html>
<html>
<head>
<title>Apagar</title>
<link rel="stylesheet" href="../../css/estilo_triagem2.css"/>
</head>
<body>
	<?php
			$CodCancha= $_POST["CodCancha"];
			$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
			if ($conexao->connect_errno)
			{
				echo "Ocorreu um erro na conexão com o banco de dados.";
				exit;
			}
			$conexao->set_charset("utf8"); // Acertar acentuação

			$sql = "SELECT `CodCancha`, `DescCancha` FROM `cancha` WHERE CodCancha='$CodCancha';";
			$result = $conexao->query($sql);
			if ($result->num_rows > 0)
			{
				while ($linha = $result->fetch_assoc())
				{
					
					echo "<form class='cadastro' method='POST' action='elimina.php' onsubmit='return confirm('Confirma?');'>";
					echo "<h1> Apagando </h1>";
					echo "<label>Cod. Cancha.: ".$linha["CodCancha"]."</label><br/>";
					echo "<label>Desc. Cancha: ".$linha["DescCancha"]."</label><br/>";
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
		<input type="hidden" value="<?=$CodCancha ?>" name="CodCancha" />
		<a class="link" href="apagar.php">Voltar </a>
	</form>
</body>
</html>