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
		<th>Cod. Cliente</th>
		<th>Cod. Endereço</th>
		<th>CPF</th>
		<th>Nome</th>
		<th>DDD</th>
		<th>TELEFONE</th>
		<th>Tipo</th>
		<th>Lougradouro</th>
		<th>Num</th>
		<th>Complemento</th>
		<th>Bairro</th>
		<th>Cidade</th>
		<th>UF</th>
		<th>CEP</th>
	</tr>
	<?php
		$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
		if ($conexao->connect_errno)
		{
			echo "Ocorreu um erro na conexão com o banco de dados.";
			exit;
		}
		$conexao->set_charset("utf8"); // Acertar acentuação

		$sql = "SELECT 
		cliente.CodCliente, cliente.Cpf, cliente.Nome,
		telefone.Ddd, telefone.Telefone,endereco.CodEnd,
		endereco.Tipo, endereco.Lougradouro, endereco.Num,
		endereco.Complemento, endereco.Cep, endereco.Bairro,
		endereco.Cidade, endereco.UF
		FROM `cliente`,`endereco`,`telefone`
		WHERE cliente.CodTel=telefone.CodTel AND endereco.CodEnd=cliente.CodEnd ORDER BY CodCliente";
		$result = $conexao->query($sql);
		if ($result->num_rows > 0)
		{
			while ($linha = $result->fetch_assoc())
			{
				echo "<tr>";
				echo "<td>".$linha["CodCliente"]."</td>";
				echo "<td>".$linha["CodEnd"]."</td>";
				echo "<td>".$linha["Cpf"]."</td>";
				echo "<td>".$linha["Nome"]."</td>";
				echo "<td>".$linha["Ddd"]."</td>";
				echo "<td>".$linha["Telefone"]."</td>";
				echo "<td>".$linha["Tipo"]."</td>";
				echo "<td>".$linha["Lougradouro"]."</td>";
				echo "<td>".$linha["Num"]."</td>";
				echo "<td>".$linha["Complemento"]."</td>";
				echo "<td>".$linha["Bairro"]."</td>";
				echo "<td>".$linha["Cidade"]."</td>";
				echo "<td>".$linha["UF"]."</td>";
				echo "<td>".$linha["Cep"]."</td>";
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