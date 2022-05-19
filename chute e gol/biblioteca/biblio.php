
<?php
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

function criptografa($senha)
{
    $options = [
        'cost'=>10  // custo em recursos
    ];
    $senhaSegura = password_hash ($Senha, PASSWORD_DEFAULT,$options);
    return $senhaSegura;
}


//criar login
	function login() {
		
// Conexão
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "chute_e_gol";

// cria conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $banco);
// verifica se conectou
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
{

}

// Variáveis Globais
global $nivel;
global $usuario;


// POST
$user = $_POST['usuario'];
$pass = $_POST ['senha'];

// QUERY
$sql = "SELECT funcionario.Nome,funcionario.CodFunc,funcionario.Cpf, funcionario.RG,
		funcionario.Pis,funcionario.Senha, telefone.Ddd,
		telefone.Telefone, cargo.Cargo, endereco.Tipo,
		endereco.Lougradouro,endereco.Num,endereco.Bairro,
		endereco.Cidade,endereco.UF
		FROM `funcionario`,`telefone`,`cargo`,`endereco` 
		WHERE endereco.CodEnd=funcionario.CodEnd 
		and telefone.CodTel =funcionario.CodTel
		AND cargo.CodCargo = funcionario.CodCargo AND funcionario.Cpf = '$user'
		AND funcionario.Senha = MD5('$pass')";


$result = mysqli_query ($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($linha = mysqli_fetch_assoc($result)) 
	{
       echo "<div class='login'>Acesso garantido </div>";
	   echo "<meta http-equiv='Refresh' content='1; url= menu/separador.php' />";
		$CodFunc = $linha["CodFunc"];
		$_SESSION ['CodFunc'] = "$CodFunc"; 
		$_SESSION ['moreninho'] = "$user";
		echo"$CodFunc";
    }
} else {
	   echo '<div class="erro">Usuario ou senha invalidos</div>';
		
}

mysqli_close($conn);
	}
	
	
	
	
	//testa session 
	function acesso(){
		 session_start();
		 if (!isset($_SESSION['moreninho']))
    {
        header ('Location:../');
        exit();
    }
	}


//testa session para pastas mais distantes 
	
	function acesso2(){
		 session_start();
		 if (!isset($_SESSION['moreninho']))
    {
        header ('Location:../triagem.php');
        exit();
    }
	}



	//destruir session
	function asession (){
		session_start();
		session_destroy();
	}
	//select para agendamento
	function select($banco, $tabela, $indice)
	{
		$conexao=conectadb($banco);
		$sql = "SELECT * from $tabela;";
		$result = $conexao->query($sql);
		if ($result->num_rows > 0)
		{
			while ($linha = $result->fetch_assoc())
			{
				echo '<option value="'.$linha["$indice"].'">'.$linha['Tempo'].'</option>';
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

