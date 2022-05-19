<?php
    require_once ('../biblioteca/biblio.php');

    $atendente = $_GET['q']; // Pega o valor do atendente

    // Auxíliar
    $datahoje = date("d.m.Y");
    //echo "<p> Data de Hoje: ".$datahoje."</p>";   
    // Dia da Semana
    $diasem = date("N");

    // Array para a Tabela
    $tabela = Array(
        array ("Horários","segunda","terça","quarta","quinta","sexta","sábado","domingo")
    );

    // completar a tabela horários e posições começando em 06:30 + 30 = 07:00
    $hora = '06:00';
    for ($i=1;$i<=18;$i++)
    {
        $hora = date('H:i',strToTime('+1 hour',strtotime($hora)));
        $tabela[$i] = Array ($hora,"","","","","","","");
    }

    // Mês
    $ames = array ("","Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
    $mes = date("n"); // o número do mês
    //echo "<p> Mês: $mes </p>";
    // Cabeçalho da tabela
    echo "<table class='tabela_horarios'>";
    echo "<tr> <th colspan=8 class='tab_mes'>".$ames[$mes]."</th></tr>";
    //echo "<tr> <th colspan='8'> Agenda </th> </tr>";
    echo "<tr>";
    // Titulos colunas

    $dia_mes = date ('d'); // dia do mês
    $dia_mes = $dia_mes - $diasem; // acertar a semana
    echo "<th>".$tabela[0][0]."</th>"; // Palavra horário
    for ($i=1;$i<8;$i++) // Adiciona dia ao dia da semana
    {
        echo "<th>";
        echo $tabela[0][$i]." \n \n \n";
        echo  ($dia_mes+$i)."</th>";
    }
    echo "</tr>";

    
    // Mostra turno
    $conexao=conectadb();
    $sql = "SELECT * FROM horario WHERE CodCancha = ? ";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $atendente);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($linha = $result->fetch_assoc())
    {
        for ($i=1;$i<8;$i++)
        {
            if ($linha['Dia']==$i)
            {
                if ($linha['Turno']==1) // Se for primeiro turno vai das 07:00 até 14:00
                {
                   for ($j=1;$j<16;$j++)
                    $tabela[$j][$i] ="X"; // Marca com X como disponível
                }
                if ($linha['Turno']==2) // Se for segundo turno vai das 14:30 até 21:00
                {
                    for ($j=16;$j<31;$j++)
                     $tabela[$j][$i] ="X"; // Marco com X como disponível
                 }            
            }
        }
    }

    // Verifica agenda
    // Data inicio => $dia_mes
    $ano = date ('Y');
    $data_inicio = $ano.'-'.$mes.'-'.($dia_mes+1);
    $data_fim = $ano.'-'.$mes.'-'.($dia_mes+7);
    //echo "<p> Data Inicio: $data_inicio </p>";
    //echo "<p> Data Fim: $data_fim </p>";
    //echo "<p> Código atendente: $atendente </p>";
    $conexao=conectadb();
	

	
    $sql = "SELECT a.*, c.*,t.* FROM aluguel AS a, cancha AS c, Tempo AS t WHERE a.CodCancha = ? AND a.Data_Age >= ? AND a.Data_Age <= ? AND a.CodCancha=c.CodCancha AND a.Tempo=t.Tempo";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iss", $atendente, $data_inicio, $data_fim);
    if (! $stmt -> execute()) {
        echo $stmt -> error;
    }
    $result = $stmt->get_result();
    while ($linha = $result->fetch_assoc())
    {
        $horario = $linha['Hora_Age'];
        $tempo = $linha['Tempo'];
        $dia = date('N',strtotime($linha['Data_Age']));
        //echo "<p> $dia </p>";
        for ($i=1;$i<=18;$i++)
        {
            if (substr($horario,0,5) == $tabela[$i][0])
            {
                // Encontrou o horário na tabela
                $linhas = $tempo / 60; // Tempos em múltiplos de 30 minutos
                for ($k=0;$k<$linhas;$k++) // Quantas linhas vamos ter que alocar
                {
                    $tabela[$i+$k][$dia] = "";
                }
            }
        }

        // Grifar linha e coluna na tabela
        //echo "<p> $horario -  $tempo </p>";
    }


    

    // Mostra a tabela completa
    for ($j=1;$j<=18;$j++)
    {
        echo "<tr>";
        for ($i=0;$i<8;$i++)
        {
            if ($tabela[$j][$i]=="X"){
                echo "<td class='trabalha'>&check;</td>";  
            } else if ($tabela[$j][$i]=="") 
            {
                echo "<td class='nao_trabalha'>&#9747;</td>";
            } else
            {
                echo "<td>".$tabela[$j][$i]."</td>";
            }
        }
        echo "</tr>"; 
    }
    echo "<table/>";
	
    $stmt->close();
?>