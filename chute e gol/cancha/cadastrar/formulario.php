<?php
	require_once('../../biblioteca/biblio.php');
	acesso2();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro de Cancha</title>
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
			<label>Descricao Cancha:</label>
			<input type="text" name="DescCancha" required autofocus maxlength="60" />
			<br/>
			<button class="enviar" value="enviar" type="submit">Cadastrar</button>
			<br/>
			<br/>
		</form>
	</body>
</html>


	