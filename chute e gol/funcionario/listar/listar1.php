<!DOCTYPE html>
<html>
<head>
<title>Listar</title>
<link rel="stylesheet" href="../../css/estilo_triagem2.css"/>
</head>
<body>
	<div class="barra">| Lista de Funcionarios |<a class="link" href="../triagem.php"> VOLTAR |</a> </div>
	</br>
	</br>
	</br>
	<table border class="customers">
	<tr>
		<th>Nome</th>
		<th>DDD</th>
		<th>TELEFONE</th>
	</tr>
	<?php
		$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
		if ($conexao->connect_errno)
		{
			echo "Ocorreu um erro na conexão com o banco de dados.";
			exit;
		}
		$conexao->set_charset("utf8"); // Acertar acentuação

		$sql = "SELECT funcionario.CodFunc,funcionario.Nome,
		funcionario.Cpf, funcionario.RG,funcionario.Pis,
		telefone.Ddd, telefone.Telefone, cargo.Cargo,
		endereco.Tipo, endereco.Lougradouro,endereco.Num,
		endereco.Complemento,endereco.Bairro,endereco.Cidade,
		endereco.UF,endereco.Cep 
		FROM `funcionario`,`telefone`,`cargo`,`endereco`
		WHERE endereco.CodEnd=funcionario.CodEnd and telefone.CodTel =funcionario.CodTel
		AND cargo.CodCargo = funcionario.CodCargo ORDER BY funcionario.CodFunc";
		$result = $conexao->query($sql);
		if ($result->num_rows > 0)
		{
			while ($linha = $result->fetch_assoc())
			{
				echo "<tr>";
				echo "<td>".$linha["Nome"]."</td>";
				echo "<td>".$linha["Ddd"]."</td>";
				echo "<td>".$linha["Telefone"]."</td>";
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