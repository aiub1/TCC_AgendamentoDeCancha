<?php
		require_once('../../biblioteca/biblio.php');
		acesso2();
		echo $_POST["CodAgend"];
		if (isset($_POST["CodAgend"]))
		{
			$CodAgend= $_POST["CodAgend"];
			$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
			if ($conexao->connect_errno)
			{
				echo "Ocorreu um erro na conexão com o banco de dados.";
				exit;
			}
			$conexao->set_charset("utf8"); // Acertar acentuação

			$sql = "SELECT aluguel.*,cancha.DescCancha,cliente.Nome,funcionario.Nome AS nome_func FROM `aluguel`,`cancha`,`cliente`,`funcionario` WHERE aluguel.CodCancha = cancha.CodCancha AND aluguel.CodCliente = cliente.CodCliente AND aluguel.CodFunc = funcionario.CodFunc AND aluguel.CodAgend = '$CodAgend';";
			$result = $conexao->query($sql);
			if ($result->num_rows > 0)
			{
				while ($linha = $result->fetch_assoc())
				{
					$Data_Age  	= $linha["Data_Age"];	
					$Hora_Age  	= $linha["Hora_Age"];					
					$DescCancha   	= $linha["DescCancha"];		
				}
			} else
			{
				echo "<p>Sem resultados</p>";
			}
			$conexao->close();
		}
		$hoje = date('Y-m-d');	
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
			<label>CodAgend:</label>
			<input type="text" name="CodAgend"  value="<?=$CodAgend?>" required  maxlength="60" readonly="true"  />
			</br>
			<label>DescCancha:</label>
			<input type="text" name="DescCancha"  value="<?=$DescCancha?>" required  maxlength="60" readonly="true"  />
			</br>
			<label>Hora:</label>
			<input type="time" name="Hora_Age"  value="<?=$Hora_Age?>" required  min="07:00:00" max="00:00:00"   />
			</br>
			<label>Data:</label>
			<input type="date" name="Data_Age"  value="<?=$Data_Age?>" required min="<?=$hoje?>" maxlength="60"   />
			</br>
			<input name="enviar" value="Enviar" type="submit" class="enviar" >
		</form>
	</body>
</html>