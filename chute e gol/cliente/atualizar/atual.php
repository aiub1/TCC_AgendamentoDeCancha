<?php
		require_once('../../biblioteca/biblio.php');
		acesso2();
		echo $_POST["CodCliente"];
		if (isset($_POST["CodCliente"]))
		{
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
					$CodEnd			= $linha["CodEnd"];
					$CodCliente   	= $linha["CodCliente"];
					$Nome   		= $linha["Nome"];
					$Cpf  			= $linha["Cpf"];
					$Ddd 			= $linha["Ddd"];
					$Telefone   	= $linha["Telefone"];
					$Tipo 			= $linha["Tipo"];
					$Lougradouro   	= $linha["Lougradouro"];
					$Num  			= $linha["Num"];
					$Complemento 	= $linha["Complemento"];
					$Bairro   		= $linha["Bairro"];
					$Cidade  		= $linha["Cidade"];
					$UF 			= $linha["UF"];
					$Cep			= $linha["Cep"];	
					$CodTel			= $linha["CodTel"];					
				}
			} else
			{
				echo "<p>Sem resultados</p>";
			}
			$conexao->close();
		}
			
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro de Funcionario</title>
		<link rel="stylesheet" href="../../css/estilo_triagem2.css">
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
	<div class="barra">| Atualizar |<a class="link" href="atualizar.php"> VOLTAR|</a></div>
	<body>
		<form action="atu.php" class = "cadastro"  method="POST">
			<label>CodCliente:</label>
			<input type="text" name="CodCliente"  value="<?=$CodCliente?>" required  maxlength="60" readonly="true" />
			<br/>
			<label>CodEnd:</label>
			<input type="text" name="CodEnd"  value="<?=$CodEnd?>" required  maxlength="60" readonly="true" />
			<br/>
			<label>CodTel:</label>
			<input type="text" name="CodTel"  value="<?=$CodTel?>" required  maxlength="60" readonly="true" />
			<br/>
			<label>Nome:</label>
			<input type="text" name="Nome"  value="<?=$Nome?>" required  maxlength="60"  />
			<br/>
			<label>CPF:</label>
			<input type="text" name="Cpf"  value="<?=$Cpf ?>" required  maxlength="60"  />
			<br/>
			<label>DDD:</label>
			<input type="text" name="Ddd"  value="<?=$Ddd ?>" required  maxlength="60"  />
			<br/>
			<label>Telefone:</label>
			<input type="text" name="Telefone"  value="<?=$Telefone?>" maxlength="60"  />
			<br/>
			<label>Tipo:</label>
			<input type="text" name="Tipo"  value="<?=$Tipo ?>"   />
			<br/>
			<label>Lougradouro:</label>
			<input type="text" name="Lougradouro"  value="<?=$Lougradouro ?>"   />
			<br/>
			<label>Numero Casa:</label>
			<input type="text" name="Num"  value="<?=$Num ?>"   />
			<br/>
			<label>Complemento:</label>
			<input type="text" name="Complemento"  value="<?=$Complemento ?>"   />
			<br/>
			<label>Bairro:</label>
			<input type="text" name="Bairro"  value="<?=$Bairro ?>"   />
			<br/>
			<label>Cidade:</label>
			<input type="text" name="Cidade"  value="<?=$Cidade ?>"   />
			<br/>
			<label>UF:</label>
			<select id="UF" name="UF">
				<option value="PR">Paraná</option>
				<option value="AC">Acre</option>
				<option value="AL">Alagoas</option>
				<option value="AP">Amapá</option>
				<option value="AM">Amazonas</option>
				<option value="BA">Bahia</option>
				<option value="CE">Ceará</option>
				<option value="DF">Distrito Federal</option>
				<option value="ES">Espírito Santo</option>
				<option value="GO">Goiás</option>
				<option value="MA">Maranhão</option>
				<option value="MT">Mato Grosso</option>
				<option value="MS">Mato Grosso do Sul</option>
				<option value="MG">Minas Gerais</option>
				<option value="PA">Pará</option>
				<option value="PB">Paraíba</option>
				<option value="PE">Pernambuco</option>
				<option value="PI">Piauí</option>
				<option value="RJ">Rio de Janeiro</option>
				<option value="RN">Rio Grande do Norte</option>
				<option value="RS">Rio Grande do Sul</option>
				<option value="RO">Rondônia</option>
				<option value="RR">Roraima</option>
				<option value="SC">Santa Catarina</option>
				<option value="SP">São Paulo</option>
				<option value="SE">Sergipe</option>
				<option value="TO">Tocantins</option>
			</select>
			<label>Cep:</label>
			<input type="text" name="Cep"  value="<?=$Cep ?>"   />
			<br/>
			<input name="enviar" value="Enviar" type="submit" class="enviar" >
		</form>
	</body>
</html>