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
							$cargo =$linha["Cargo"];
						}
					} else
					{
						echo "Sem resultados";
					}
	
	switch ($cargo) {
    case "Demitido":
        echo "Demitido";
		echo "<meta http-equiv='Refresh' content='0; url= niveis/principal_0.php' />";
        break;
    case "Dono":
		echo "<meta http-equiv='Refresh' content='0; url= niveis/principal_2.php' />";		
        break;
    case "Funcionário":
		echo "<meta http-equiv='Refresh' content='0; url= niveis/principal_1.php' />";
        break;
	case "Gerente":
		echo "<meta http-equiv='Refresh' content='0; url= niveis/principal_2.php' />";
        break;	
}
?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>TRIAGEM</title>
			<meta http-equiv="Content-Typ" content="text/html; charset=utf-8" />
			
		</head>
		<body>
		</body>
	</html>