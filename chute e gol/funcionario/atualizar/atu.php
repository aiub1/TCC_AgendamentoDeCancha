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
		$RG 			= $_POST["RG"];
		$Pis   			= $_POST["Pis"];
		$Senha  		= $_POST["Senha"];
		$Ddd 			= $_POST["Ddd"];
		$Telefone   	= $_POST["Telefone"];
		$Cargo  		= $_POST["Cargo"];
		$Tipo 			= $_POST["Tipo"];
		$Lougradouro   	= $_POST["Lougradouro"];
		$Num  			= $_POST["Num"];
		$Complemento 	= $_POST["Complemento"];
		$Bairro   		= $_POST["Bairro"];
		$Cidade  		= $_POST["Cidade"];
		$UF 			= $_POST["UF"];
		$Cep 			= $_POST["Cep"];
		$CodTel 		= $_POST["CodTel"];
		$CodFunc 		= $_POST["CodFunc"];
		$CodEnd 		= $_POST["CodEnd"];
		$DataNasc 		= $_POST["DataNasc"];
		
		// UPDATE Telefone
		
		$sql = "UPDATE `telefone` SET `Telefone`='$Telefone',`Ddd`='$Ddd' WHERE `CodTel`='$CodTel'";
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
				if ($conexao->query($sql) === TRUE) {
					$sucesso = "Alterado com sucesso";
				} else {
					$erro = "Erro: " . $sql . "<br>" . $conexao->error;
				}
		//MD5
		
		$Senha = md5($Senha);
		
		// UPDATE Funcionario
				
		$sql = "UPDATE `funcionario` 
		SET `Senha`='$Senha',`CodEnd`='$CodEnd',`CodTel`='$CodTel',
		`Cpf`='$CPF',`Pis`='$Pis',`RG`='$RG',`CodCargo`='$Cargo',`Nome`='$Nome',`DataNasc`='$DataNasc'
		WHERE `CodFunc`='$CodFunc'";
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