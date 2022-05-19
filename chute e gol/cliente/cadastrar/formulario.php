<?php
	require_once('../../biblioteca/biblio.php');
	acesso2();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro de Clientes</title>
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
	<div class="barra">| CADASTRO |<a class="link" href="../triagem.php"> VOLTAR|</a></div>
	<body>
		<form action="inserir.php" method="POST"  class = "cadastro">
			<h3>Cadastro</h3>
			<label>Nome:</label>
			<input type="text" name="Nome" required autofocus maxlength="60" />
			<br/>
			<label>CPF:</label>
			<input type="number" name="Cpf" required  min="11111111111" max="99999999999" />
			<br/>
			<label>DDD:</label>
			<input type="number" name="Ddd" required  min="11" max="99" />
			<br/>
			<label>Telefone:</label>
			<input type="number" name="Telefone" required min="11111111" max="999999999" />
			<br/>
			<label>Tipo:</label>
			<input type="text" name="Tipo" required maxlength="60" />
			<br/>
			<label>Lougradouro:</label>
			<input type="text" name="Lougradouro" required maxlength="60" />
			<br/>
			<label>Numero Casa:</label>
			<input type="number" name="Num" required min="1" max="9999999999" />
			<br/>
			<label>Complemento:</label>
			<input type="text" name="Complemento" required maxlength="60" />
			<br/>
			<label>Bairro:</label>
			<input type="text" name="Bairro" required maxlength="60" />
			<br/>
			<label>Cidade:</label>
			<input type="text" name="Cidade" required maxlength="60"/>
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
			<input type="text" name="Cep" required min="1111111" max="99999999"/>
			<br/>
			<button class="enviar" value="enviar" type="submit">Cadastrar</button>
			<br/>
			<br/>
		</form>
	</body>
</html>


	