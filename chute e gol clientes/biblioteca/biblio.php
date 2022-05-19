<?php

session_start();
// Conecta no banco
function conectadb() 
{
    $endereco = "localhost";    $usuario  = "root";
    $senha    = "";             $banco    = "chute_e_gol";
    try
    {
        $con = new mysqli($endereco, $usuario, $senha, $banco);
        return $con;
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
        die();
    }
}

function select($banco, $tabela, $indice)
{
	$conexao=conectadb($banco);
	$sql = "SELECT * from $tabela;";
	$result = $conexao->query($sql);
	if ($result->num_rows > 0)
	{
		while ($linha = $result->fetch_assoc())
		{
			echo '<option value="'.$linha["$indice"].'">'.$linha['nome'].'</option>';
		}
	} else
	{
		echo '<option value="">Sem resultados</option>';
	}
	$conexao->close();				
}

	function SelectCancha($banco, $tabela, $indice)
	{
		$conexao=conectadb($banco);
		$sql = "SELECT * from $tabela;";
		$result = $conexao->query($sql);
		if ($result->num_rows > 0)
		{
			while ($linha = $result->fetch_assoc())
			{
				echo '<option value="'.$linha["$indice"].'">'.$linha['DescCancha'].'</option>';
			}
		} else
		{
			echo '<option value="">Sem resultados</option>';
		}
		$conexao->close();				
	}


?>