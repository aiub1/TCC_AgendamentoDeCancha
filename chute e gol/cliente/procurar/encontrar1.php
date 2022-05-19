<?php
		require_once('../../biblioteca/biblio.php');
		acesso2();
		if (isset($_POST["Nome"]))
		{
			$Nome= $_POST["Nome"];
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
		WHERE cliente.CodTel=telefone.CodTel AND endereco.CodEnd=cliente.CodEnd AND cliente.Nome = '$Nome' ORDER BY CodCliente";		
			$result = $conexao->query($sql);
			if ($result->num_rows > 0)
			{
				while ($linha = $result->fetch_assoc())
				{
					$CodEnd   		= $linha["CodEnd"];					
					$CodCliente   	= $linha["CodCliente"];
					$CPF   			= $linha["Cpf"];
					$Nome   		= $linha["Nome"];
					$Ddd 			= $linha["Ddd"];
					$Telefone   	= $linha["Telefone"];
					$Tipo 			= $linha["Tipo"];
					$Lougradouro   	= $linha["Lougradouro"];
					$Num  			= $linha["Num"];
					$Complemento 	= $linha["Complemento"];
					$Bairro   		= $linha["Bairro"];
					$Cidade  		= $linha["Cidade"];
					$UF 			= $linha["UF"];
					$Cep 			= $linha["Cep"];					
				}
			} else
			{
				echo "<p>Sem resultados</p>";
			}
			$conexao->close();
		}
		echo "<a href='procura.php'>Voltar</a>";
			
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Procura de Funcionario</title>
		<link rel="stylesheet" href="../../css/estilo_triagem2.css"/>
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
	<div class="barra"><a class="link" href="procura.php">| VOLTAR |</a></div>
	<body>
		<form  method="POST"  class = "cadastro">
			<h3>PROCURAR</h3>
			<label>Nome:</label>
			<input type="text" name="Nome" class="link" value="<?=$Nome?>" required  maxlength="60" disabled />
			<br/>
		
			<label>DDD:</label>
			<input type="text" name="Ddd" class="link" value="<?=$Ddd ?>" required  maxlength="60" disabled />
			<br/>
			<label>Telefone:</label>
			<input type="text" name="Telefone" class="link" value="<?=$Telefone?>" maxlength="60" disabled />
			<br/>
			<br/>
			<br/>
		</form>
	</body>
</html>


	