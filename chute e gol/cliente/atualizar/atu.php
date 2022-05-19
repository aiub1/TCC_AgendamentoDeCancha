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
		$Nome   		= $_POST["Nome"];
		$CPF  			= $_POST["Cpf"];
		$Ddd 			= $_POST["Ddd"];
		$Telefone   	= $_POST["Telefone"];
		$Tipo 			= $_POST["Tipo"];
		$Lougradouro   	= $_POST["Lougradouro"];
		$Num  			= $_POST["Num"];
		$Complemento 	= $_POST["Complemento"];
		$Bairro   		= $_POST["Bairro"];
		$Cidade  		= $_POST["Cidade"];
		$UF 			= $_POST["UF"];
		$Cep 			= $_POST["Cep"];
		$CodTel 		= $_POST["CodTel"];
		$CodCliente 	= $_POST["CodCliente"];
		$CodEnd 		= $_POST["CodEnd"];
		
		// UPDATE Telefone
		
		$sql = "UPDATE `telefone` SET `Telefone`='$Telefone',`Ddd`='$Ddd' WHERE `CodTel`='$CodTel'";
		echo $sql."<br/>";
		if ($conexao->query($sql) === TRUE) {
			$sucesso = "Alterado com sucesso";
		} else {
			$erro = "Erro: " . $sql . "<br>" . $conexao->error;
		}
		
		// UPDATE Endereco

		$sql = "UPDATE `endereco`
		SET
		`Tipo`='$Tipo',`Lougradouro`='$Lougradouro ',`Num`='$Num',`Complemento`='$Complemento',`Bairro`='$Bairro',`Cidade`='$Cidade',
		`UF`='$UF',`Cep`='$Cep' WHERE `CodEnd`='$CodEnd'";
				echo $sql."<br/>";
				if ($conexao->query($sql) === TRUE) {
					$sucesso = "Alterado com sucesso";
				} else {
					$erro = "Erro: " . $sql . "<br>" . $conexao->error;
				}
		
		// UPDATE Cliente
				
		$sql = "UPDATE `cliente`
		SET `CodCliente`='$CodCliente',`Cpf`='$CPF',`Nome`='$Nome',`CodTel`='$CodTel',`CodEnd`='$CodEnd' WHERE CodCliente ='$CodCliente' ";
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