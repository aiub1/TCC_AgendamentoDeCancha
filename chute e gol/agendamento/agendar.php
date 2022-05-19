<?php
    require_once ('../biblioteca/biblio.php');
	acesso();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_agenda.css"/>
    <title>Agendamento</title>
</head>
<body>
    <div class="barra">| Agendamento <a class="link" href="triagem.php">| VOLTAR |</a></div>
	</br>
	</br>
	</br>
	</br>
    <form class="agenda" action="#" method="POST">
        <label> Cliente </label>
        <input type="text" name="nome" required />
        <input type="submit" name="anome" value="Procurar" />
    </form>
    </br>

    <?php
        if (isset($_POST['anome']))
        {
            $nome=$_POST["nome"];
            $sql = "SELECT * FROM cliente WHERE nome LIKE '$nome'";
            $conexao=conectadb();
            $result = $conexao->query($sql);
            if ($result->num_rows > 0)
            {
                $linha = $result->fetch_assoc();
                echo "<div class='agenda'>".$linha['Nome']."</div>";
                $_SESSION['cliente'] = $linha["CodCliente"];
                include ('formulario.php');
            } else
            {
                echo "Não encontrado";
            }
        }
    ?>

</body>
</html>