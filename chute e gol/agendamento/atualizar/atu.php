<head>
<link rel="stylesheet" href="../../css/estilo_triagem2.css"/>
</head>
<?php

//Validando a existência dos dados

		$conexao = new mysqli("127.0.0.1", "root", "", "chute_e_gol");
		if ($conexao->connect_errno)
		{
			echo "Ocorreu um erro na conexão com o banco de dados.";
			exit;
		}
		//Vamos realizar o cadastro ou alteração dos dados enviados.
		$CodAgend		   		= $_POST["CodAgend"];
		$DescCancha  			= $_POST["DescCancha"];
		$Hora_Age		   		= $_POST["Hora_Age"];
		$Data_Age	  			= $_POST["Data_Age"];
	
		
		// UPDATE agendamento
		
		$sql = "UPDATE `aluguel` SET `Hora_Age`='$Hora_Age	',`Data_Age`='$Data_Age' WHERE CodAgend='$CodAgend'";
		echo $sql."<br/>";
		if ($conexao->query($sql) === TRUE) {
			$sucesso = "Alterado com sucesso";
		} else {
			$erro = "Erro: " . $sql . "<br>" . $conexao->error;
		}
	

if(isset($sucesso))
	echo '<form class="caixa" >';
	echo '<div style="color:#00f">'.$sucesso.'</div><br/><br/>';
	echo '<a class="link" href="atualizar.php">Voltar</a>';
	echo '</form>';



?>