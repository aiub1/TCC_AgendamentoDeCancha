<?php
	require_once('../../biblioteca/biblio.php');
	acesso2();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Procura</title>
		<link rel="stylesheet" href="../../css/estilo_triagem2.css"/>
		<style type="text/css">
		label
		{
			display: inline-block;
			width: 120px;
		}
		</style>
	</head>
	<body>
	<div class="barra"><a class="link" href='../triagem.php'>| Voltar |</a></div>
		<form class="cadastro"  action="encontrar.php" method="POST">
			<h1 class="h1">Procurar</h1>
			<label>Desc    Cancha:</label>
			<input type="text"   name="DescCancha" required />
			<br/>
			<br/>
			<button class="enviar" type="submit">Procurar</button>
			<br/>
			<br/>
		</form>
	</body>
</html>
	