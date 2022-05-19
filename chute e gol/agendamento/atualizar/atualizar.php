<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Atualizar</title>
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
		<link rel="stylesheet" href="../../css/estilo_triagem2.css">
	</head>
	<div class="barra"><a class="link" href='../triagem.php'>Voltar</a></div>
	<body>
		<form class="cadastro" action="atual.php" method="POST">
			<label>Cod. Agend.:</label>
			<input type="text" name="CodAgend" required />
			</br>
			</br>
			<button class="enviar" type="submit">Procurar</button>
		</form>
	</body>
</html>