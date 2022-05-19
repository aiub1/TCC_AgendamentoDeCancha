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

			$sql = "SELECT funcionario.CodFunc,funcionario.Nome,
		funcionario.Cpf, funcionario.RG,funcionario.Pis,funcionario.Senha,
		telefone.Ddd, telefone.Telefone, cargo.Cargo,
		endereco.Tipo, endereco.Lougradouro,endereco.Num,
		endereco.Complemento,endereco.Bairro,endereco.Cidade,
		endereco.UF,endereco.Cep 
		FROM `funcionario`,`telefone`,`cargo`,`endereco`
		WHERE telefone.CodTel =funcionario.CodTel
		AND cargo.CodCargo = funcionario.CodCargo AND Funcionario.Nome = '$Nome';";		
			$result = $conexao->query($sql);
			if ($result->num_rows > 0)
			{
				while ($linha = $result->fetch_assoc())
				{
					$CodFunc   		= $linha["CodFunc"];
					$Nome   		= $linha["Nome"];
					$Cpf  			= $linha["Cpf"];
					$RG 			= $linha["RG"];
					$Pis   			= $linha["Pis"];
					$Senha  		= $linha["Senha"];
					$Ddd 			= $linha["Ddd"];
					$Telefone   	= $linha["Telefone"];
					$Cargo  		= $linha["Cargo"];
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


	