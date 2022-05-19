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
		$CodCancha		   		= $_POST["CodCancha"];
		$DescCancha  			= $_POST["DescCancha"];
		
		// UPDATE Cancha
		
		$sql = "UPDATE `cancha` SET `CodCancha`='$CodCancha	',`DescCancha`='$DescCancha' WHERE CodCancha='$CodCancha'";
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