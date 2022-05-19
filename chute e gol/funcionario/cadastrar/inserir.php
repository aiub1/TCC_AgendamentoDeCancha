<?php
	session_start();
	require_once('../../biblioteca/biblio.php');
	conectadb();


// Teste de variaveis
if (isset($_POST["Nome"]) && isset($_POST["Cpf"]) && isset($_POST["RG"])&&
		($_POST["Pis"]) && isset($_POST["Senha"]) && isset($_POST["Ddd"])&&
		($_POST["Telefone"]) && isset($_POST["Cargo"]) && isset($_POST["Tipo"])&&
		($_POST["Lougradouro"]) && isset($_POST["Num"]) && isset($_POST["Complemento"])&&
		($_POST["Bairro"]) && isset($_POST["Cidade"]) && isset($_POST["UF"])&& isset($_POST["Cep"]))
{
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
		$DataNasc 		= $_POST["DataNasc"];

    $conexao=conectadb();
	
	//insert de Endereço
	
    $sql = "INSERT INTO endereco (Tipo, Lougradouro, Num, Complemento, Bairro, Cidade, UF, Cep) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssissssi", $Tipo, $Lougradouro, $Num, $Complemento, $Bairro, $Cidade, $UF, $Cep);
    $stmt->execute();
	
	//insert de Telefone
	
	$sql = "INSERT INTO telefone (Ddd, Telefone) VALUES (?,?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ii",$Ddd,$Telefone);
    $stmt->execute();
	
	//SELECT do CodTel
	
	$sql = "SELECT `CodTel` FROM `telefone` WHERE `Telefone` = $Telefone;";
				$result = $conexao->query($sql);
				if ($result->num_rows > 0)
					{
						while ($linha = $result->fetch_assoc())
						{
							$CodTel = $linha["CodTel"];
						}
					} else
					{
						echo "Sem resultados";
					}
	//SELECT do CodEnd
	$sql = "SELECT `CodEnd` FROM `endereco` WHERE `Lougradouro` = '$Lougradouro' AND `Cidade` = '$Cidade' AND Num = '$Num';";
				$result = $conexao->query($sql);
				if ($result->num_rows > 0)
					{
						while ($linha = $result->fetch_assoc())
						{
							$CodEnd = $linha["CodEnd"];
							echo "$CodEnd</br>"; 
						}
					} else
					{
						echo "Sem resultados";
					}
					
	//insert do Funcionario
	$Senha = md5($Senha);
	$sql = "INSERT INTO `funcionario`(`Senha`, `CodEnd`, `CodTel`, `Cpf`, `Pis`, `RG`, `CodCargo`, `Nome`, `DataNasc`) VALUES (?,?,?,?,?,?,?,?,?);";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("siiiiisss",$Senha,$CodEnd,$CodTel,$CPF,$Pis,$RG,$Cargo,$Nome,$DataNasc);
    $stmt->execute();
    echo "<p> Incluido com Sucesso !</p>";
	echo "<meta http-equiv='Refresh' content='0; url= formulario.php' />";
} else
{
    echo "<p> Acesso inválido !</p>";


}



?>