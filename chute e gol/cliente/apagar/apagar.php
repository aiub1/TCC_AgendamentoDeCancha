<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Apagar</title>
		<style type="text/css">
		body
		{
			font-family: Arial;
		}
		label
		{
			display: inline-block;
			width: 120px;
		}
		</style>
		<link rel="stylesheet" href="../../css/estilo_triagem2.css"/>
	</head>
	<body>
		<form class="cadastro" action="apaga.php" method="POST">
			<label>Cod de Cliente:</label>
			<input type="text" name="CodCliente" required />
			<br/>
			<br/>
			<button class="enviar" type="submit">Procurar</button>
			<a class="link"href='../triagem.php'>Voltar</a>
		</form>
	</body>
</html>