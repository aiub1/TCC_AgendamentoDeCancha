<?php
	require_once('../biblioteca/biblio.php');
	acesso();
	
	$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
				if ($conexao->connect_errno)
				{
					echo "Ocorreu um erro na conexão com o banco de dados.";
					exit;
				}
				$id= $_SESSION ['moreninho'];
				$sql = "SELECT funcionario.Nome,
				cargo.Cargo
				FROM `funcionario`,
				`cargo`
				WHERE 
				cargo.CodCargo = funcionario.CodCargo and funcionario.Cpf =$id;";
				$result = $conexao->query($sql);
				if ($result->num_rows > 0)
					{
						while ($linha = $result->fetch_assoc())
						{
							$nome = $linha["Nome"];
							$cargo =$linha["Cargo"];
						}
					} else
					{
						echo "Sem resultados";
					}
		
?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>MENU</title>
			<meta http-equiv="Content-Typ" content="text/html; charset=utf-8" />
			<link rel="stylesheet" href="../css/estilo_separador.css"/>
			<div class="barra">
				<a class="link" href="../funcionario/triagem.php">| Funcionarios |</a>
				<a class="link" href="../cancha/triagem.php">Canchas |</a>
				<a class="link" href="../agendamento/triagem.php">Agendamentos |</a>
				<a class="link" href="../cliente/triagem.php">Clientes |</a>
				<a class="link" href="../relatorio/triagem.php">Relatorio |</a>
				<a class="link" href="../logout.php">Logout |</a>
			</div>
			<form class="caixa" method="POST"  style="left: 50%; top: 50%">
			<h1>Nome Usuário:<h1>
			
			<input type='text' name='usuario' value="<?=$nome ?>"  disabled />
		
			<h1>Cargo Usuário:<h1>
			<input type='text' name="Cargo" value=" <?=$cargo ?>" disabled />
			<h1>Cod. Func:<h1>
			<input type='text' name="Cargo" value=" <?=$_SESSION['CodFunc'] ?>" disabled />
			</form>
		</head>
		<body>
		</body>
	</html>