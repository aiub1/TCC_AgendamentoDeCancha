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
		endereco.UF,endereco.Cep, endereco.CodEnd 
		FROM `funcionario`,`telefone`,`cargo`,`endereco`
		WHERE endereco.CodEnd=funcionario.CodEnd and telefone.CodTel =funcionario.CodTel
		AND cargo.CodCargo = funcionario.CodCargo AND Funcionario.Nome = '$Nome';";		
			$result = $conexao->query($sql);
			if ($result->num_rows > 0)
			{
				while ($linha = $result->fetch_assoc())
				{
					$CodFunc   		= $linha["CodFunc"];
					$CodEnd   		= $linha["CodEnd"];
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
			<label>CodFunc:</label>
			<input type="text" name="CodFunc" class="link" value="<?=$CodFunc?>" required  maxlength="60" disabled />
			<br/>
			<label>CodEnd:</label>
			<input type="text" name="CodFunc" class="link" value="<?=$CodEnd?>" required  maxlength="60" disabled />
			<br/>
			<label>Nome:</label>
			<input type="text" name="Nome" class="link" value="<?=$Nome?>" required  maxlength="60" disabled />
			<br/>
			<label>CPF:</label>
			<input type="text" name="Cpf" class="link" value="<?=$Cpf ?>" required  maxlength="60" disabled />
			<br/>
			<label>RG:</label>
			<input type="text" name="RG" class="link" value="<?=$RG ?>" required  maxlength="60" disabled />
			<br/>
			<label>PIS:</label>
			<input type="text" name="Pis" class="link" value="<?=$Pis ?>" required  maxlength="60" disabled />
			<br/>
			<label>Senha:</label>
			<input type="text" name="Senha" class="link" value="<?=$Senha ?>" required maxlength="60" disabled />
			<br/>
			<label>DDD:</label>
			<input type="text" name="Ddd" class="link" value="<?=$Ddd ?>" required  maxlength="60" disabled />
			<br/>
			<label>Telefone:</label>
			<input type="text" name="Telefone" class="link" value="<?=$Telefone?>" maxlength="60" disabled />
			<br/>
			<label>Cargo:</label>
			<input type="text" name="Cargo" class="link" value="<?=$Cargo ?>" required maxlength="60" disabled />
			<br/>
			<label>Tipo:</label>
			<input type="text" name="Tipo" class="link" value="<?=$Tipo ?>" required maxlength="60" disabled />
			<br/>
			<label>Lougradouro:</label>
			<input type="text" name="Lougradouro" class="link" value="<?=$Lougradouro ?>" required maxlength="60" disabled />
			<br/>
			<label>Numero Casa:</label>
			<input type="text" name="Num" class="link" value="<?=$Num ?>" required maxlength="60" disabled />
			<br/>
			<label>Complemento:</label>
			<input type="text" name="Complemento" class="link" value="<?=$Complemento ?>" required maxlength="60" disabled />
			<br/>
			<label>Bairro:</label>
			<input type="text" name="Bairro" class="link" value="<?=$Bairro ?>" required maxlength="60" disabled />
			<br/>
			<label>Cidade:</label>
			<input type="text" name="Cidade" class="link" value="<?=$Cidade ?>" required maxlength="60" disabled />
			<br/>
			<label>UF:</label>
			<input type="text" name="UF" class="link" value="<?=$UF ?>" required maxlength="60" disabled />
			<br/>
			<label>Cep:</label>
			<input type="text" name="Cep" class="link" value="<?=$Cep ?>" required maxlength="60" disabled />
			<br/>
			<br/>
			<br/>
		</form>
	</body>
</html>


	