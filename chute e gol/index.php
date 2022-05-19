<?php
	session_start();
	require_once('biblioteca/biblio.php');
		 if (isset($_SESSION['moreninho']))
    {
        header ('Location:menu/separador.php');
        exit();
    }
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Funcionarios</title>
		<meta http-equiv="Content-Typ" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="css/estilo_login.css" />
		<style type="text/css">
		.erro {
			background-color: #303a43;
			color: #FF0000;
			text-align: center;
			font-size: xx-large;
			font-family: "American Captain";
			}
		.login {
			background-color: #303a43;
			color: #2BB91E;
			text-align: center;
			font-size: xx-large;
			font-family: "American Captain";
			}
		</style>

	</head>
	<body>
		<form class="caixa" method="POST" action='index.php' style="left: 50%; top: 50%">
			<h1>Login</h1>
			<input type='text' name="usuario" placeholder="Usuário" required />
			<input type='password' name="senha" placeholder="Senha" required />
			<input type="submit" name="enviar" value="Login">
		</form>
	</body>
</html>
<?php
if(isset($_POST['enviar'])){
	login();
}
?>
