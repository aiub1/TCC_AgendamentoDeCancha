<!DOCTYPE html>
<html>
<head>
<title>Listar</title>
<link rel="stylesheet" href="../../css/estilo_triagem2.css"/>
</head>
<body>
	<div class="barra">| Lista de Clientes |<a class="link" href="../triagem.php"> VOLTAR |</a> </div>
	</br>
	</br>
	</br>
	<table border class="customers">
	<tr>
		<th>Cod. Cancha</th>
		<th>DescCancha</th>
	</tr>
	<?php
		$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
		if ($conexao->connect_errno)
		{
			echo "Ocorreu um erro na conexão com o banco de dados.";
			exit;
		}
		$conexao->set_charset("utf8"); // Acertar acentuação

		$sql = "SELECT * FROM `cancha` WHERE 1";
		$result = $conexao->query($sql);
		if ($result->num_rows > 0)
		{
			while ($linha = $result->fetch_assoc())
			{
				echo "<tr>";
				echo "<td>".$linha["CodCancha"]."</td>";
				echo "<td>".$linha["DescCancha"]."</td>";
				echo "</tr>";
			}
		} else
		{
			echo "Sem resultados";
		}
		$conexao->close();

	?>
	</table>
</body>
</html>