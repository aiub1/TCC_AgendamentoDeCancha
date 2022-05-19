<?php
		session_start();
        require_once ('../biblioteca/biblio.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Gravado</title>
</head>
<body>
    <?php
        //print_r($_POST);
        if (isset($_POST["enviado"]))
        {
            // Pega os dados
			$CodFunc = $_SESSION['CodFunc'];
            $CodCliente = $_SESSION['cliente'];
            $CodCancha  = $_POST["cancha"];
            $Data_Age = $_POST["Data_Age"];
            $Hora_Age = $_POST["Hora_Age"];
			$Tempo = $_POST["tempo"];
            $status_age = 1;

            // Verificar horário incompatível
            // SELECT * FROM agendamento...

            // INSERIR NO BANCO
            $conexao=conectadb();
            $sql = "INSERT INTO aluguel (CodCliente,CodFunc, CodCancha,Data_Age,Hora_Age,Status,Tempo) VALUES (?,?,?,?,?,?,?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("iiissii", $CodCliente,$CodFunc,$CodCancha, $Data_Age, $Hora_Age,$status_age,$Tempo);
            if (! $stmt -> execute()) {
                echo $stmt -> error;
            } else
            {
                echo "<p> gravado com sucesso <p>";
            }
            echo "<a href='agendar.php' class='abutton'> Voltar </a>";
        }
    ?>  
</body>
</html>
