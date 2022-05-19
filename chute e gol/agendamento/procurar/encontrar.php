<?php
	$DescCancha = $_POST["DescCancha"];
	$DataAgend	= $_POST["DataAgend"];

?>
<!DOCTYPE html>
<html>
<head>
<title>Listar</title>
<link rel="stylesheet" href="../../css/estilo_triagem2.css"/>
</head>
<body>
	<div class="barra">| Lista de Agendamentos |<a class="link" href="../triagem.php"> VOLTAR |</a> </div>
	</br>
	</br>
	</br>
	<table border class="customers">
	<tr>
		<th>Cod. Cancha	</th>
		<th>Nome Cancha  </th>
		<th>Nome Func  	</th>
		<th>Cod. Cliente</th>
		<th>Nome Cliente</th>
		<th>Data Agend.	</th>
		<th>Hora_Age	</th>
		<th>CodAgend	</th>
		<th>Tempo		</th>
	</tr>
	<?php
		$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
		if ($conexao->connect_errno)
		{
			echo "Ocorreu um erro na conexão com o banco de dados.";
			exit;
		}
		$conexao->set_charset("utf8"); // Acertar acentuação

		$sql = "SELECT aluguel.*,cancha.DescCancha,cliente.Nome,funcionario.Nome AS nome_func FROM `aluguel`,`cancha`,`cliente`,`funcionario` WHERE aluguel.CodCancha = cancha.CodCancha AND aluguel.CodCliente = cliente.CodCliente AND aluguel.CodFunc = funcionario.CodFunc AND aluguel.Data_Age='$DataAgend' AND cancha.DescCancha = '$DescCancha'";
		$result = $conexao->query($sql);
		if ($result->num_rows > 0)
		{
			while ($linha = $result->fetch_assoc())
			{
				echo "<tr>";
				echo "<td>".$linha["CodCancha"]."</td>";
				echo "<td>".$linha["DescCancha"].	"</td>";
				echo "<td>".$linha["nome_func"].	"</td>";
				echo "<td>".$linha["CodCliente"]."</td>";
				echo "<td>".$linha["Nome"]."</td>";
				echo "<td>".$linha["Data_Age"]."</td>";
				echo "<td>".$linha["Hora_Age"]."</td>";
				echo "<td>".$linha["CodAgend"]."</td>";
				echo "<td>".$linha["Tempo"]."</td>";
				echo "</tr>";
			}
		} else
		{
			echo "<div>Sem resultados</div>";
		}
		$conexao->close();

	?>
	</table>
</body>
</html>