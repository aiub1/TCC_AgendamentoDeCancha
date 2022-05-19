<!DOCTYPE html>
<html>
<head>
<title>Apagar</title>
<link rel="stylesheet" href="../../css/estilo_triagem2.css"/>
</head>
<body>
	<?php
			$CodCliente= $_POST["CodCliente"];
			$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
			if ($conexao->connect_errno)
			{
				echo "Ocorreu um erro na conexão com o banco de dados.";
				exit;
			}
			$conexao->set_charset("utf8"); // Acertar acentuação

			$sql = "SELECT 
			cliente.CodEnd,cliente.CodTel,cliente.CodCliente, cliente.Cpf, cliente.Nome,
			telefone.Ddd, telefone.Telefone,
			endereco.Tipo, endereco.Lougradouro, endereco.Num, endereco.Complemento, endereco.Cep, endereco.Bairro, endereco.Cidade, endereco.UF
			FROM `cliente`,`endereco`,`telefone`
			WHERE cliente.CodTel=telefone.CodTel AND endereco.CodEnd=cliente.CodEnd AND cliente.CodCliente = '$CodCliente';";
			$result = $conexao->query($sql);
			if ($result->num_rows > 0)
			{
				while ($linha = $result->fetch_assoc())
				{
					
					echo "<form class='cadastro' method='POST' action='elimina.php' onsubmit='return confirm('Confirma?');'>";
					echo "<h1> Apagando </h1>";
					echo "<label>Cod. Cliente.: ".$linha["CodCliente"]."</label><br/>";
					echo "<label>Nome: ".$linha["Nome"]."</label><br/>";
					echo "<label>CPF: ".$linha["Cpf"]."</label><br/>";
					echo "<label>Cod. End.: ".$linha["CodEnd"]."</label><br/>";
					echo "<label>Cod. Tel.: ".$linha["CodTel"]."</label><br/>";
					
					$CodEnd = $linha["CodEnd"];
					$CodTel = $linha["CodTel"];
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
		<input type="hidden" value="<?=$CodCliente ?>" name="CodCliente" />
		<input type="hidden" value="<?=$CodEnd ?>" name="CodEnd" />
		<input type="hidden" value="<?=$CodTel ?>" name="CodTel" />
		<a class="link" href="apagar.php">Voltar </a>
	</form>
</body>
</html>