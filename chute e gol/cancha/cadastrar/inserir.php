<?php
	session_start();
	require_once('../../biblioteca/biblio.php');
	conectadb();


// Teste de variaveis
if (isset($_POST["DescCancha"]))
{
		$DescCancha = $_POST["DescCancha"];

    $conexao=conectadb();
	
	//insert de Cancha
	
    $sql = "INSERT INTO cancha (DescCancha) VALUES (?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $DescCancha);
    $stmt->execute();
	
	//SELECT do CodCancha
	$sql = "SELECT `CodCancha` FROM `cancha` WHERE `DescCancha` = '$DescCancha';";
				echo $sql."<br/>";
				$result = $conexao->query($sql);
				if ($result->num_rows > 0)
					{
						while ($linha = $result->fetch_assoc())
						{
							$CodCancha = $linha["CodCancha"];
							echo "$CodCancha</br>"; 
						}
					} else
					{
						echo "Sem resultados";
					}
	
	$sql = "INSERT INTO `horario` (`Turno`, `Dia`, `CodCancha`) VALUES 
			('1', '2', '$CodCancha'), ('2', '2', '$CodCancha'),
			('1', '3', '$CodCancha'), ('2', '3', '$CodCancha'),
			('1', '4', '$CodCancha'), ('2', '4', '$CodCancha'),
			('1', '5', '$CodCancha'), ('2', '5', '$CodCancha'),
			('1', '6', '$CodCancha'), ('2', '6', '$CodCancha'),
			('1', '7', '$CodCancha'), ('2', '7', '$CodCancha');";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
	echo "<meta http-equiv='Refresh' content='0; url= formulario.php' />";
} else
{
    echo "<p> Acesso inválido !</p>";


}



?>