<!DOCTYPE html>
<html>
<head>
<title>Apagar</title>
<link rel="stylesheet" href="../../css/estilo_triagem2.css"/>
</head>
<body>
	<h1> Elimina </h1>
	<?php
	echo"<form class='cadastro'>";
		$CodFunc = $_POST["CodFunc"];
		$CodTel = $_POST["CodTel"];
		$CodEnd = $_POST["CodEnd"];
		if (isset($_POST["CodFunc"]))
		{
			$CodFunc= $_POST["CodFunc"];
			$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
			if ($conexao->connect_errno)
			{
				echo "Ocorreu um erro na conexão com o banco de dados.";
				exit;
			}
			
			//DELETE Funcionario
			
			$sql = "DELETE FROM funcionario WHERE CodFunc=$CodFunc;";
			echo $sql."<br/>";
			if ($conexao->query($sql) === TRUE) {
				echo "<label class='link'>Funcionario removido com sucesso</label></br>";
			} else {
				echo "Erro: " . $sql . "<br>" . $conexao->error;
			}
			
			//DELETE Telefone
			
			$sql = "DELETE FROM telefone WHERE CodTel=$CodTel;";
			echo $sql."<br/>";
			if ($conexao->query($sql) === TRUE) {
				echo "<label class='link'>Telefone removido com sucesso</label></br>";
			} else {
				echo "Erro: " . $sql . "<br>" . $conexao->error;
			}
			
			//DELETE Endereco
			
			$sql = "DELETE FROM endereco WHERE CodEnd =$CodFunc;";
			echo $sql."<br/>";
			if ($conexao->query($sql) === TRUE) {
				echo "<label class='link'>Endereco removido com sucesso</label></br>";
			} else {
				echo "Erro: " . $sql . "<br>" . $conexao->error;
			}
			$conexao->close();
		}
	echo"</form>";	
	?>
	<div class="barra"><a class="link" href="apagar.php">Voltar </a></div>
</body>
</html>