<?php
    require_once ('../biblioteca/biblio.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo_agenda.css"/>
    <title>Consulta</title>
</head>
<body>
    <div class="barra">| Consulta de Horario <a class="link" href="../">| VOLTAR |</a><a class="link" href='https://api.whatsapp.com/send?phone=5541998193658&text=Ol%C3%A1%2C%20gostaria%20de%20agendar%20um%20hor%C3%A1rio.' target="_blank" > ENTRE EM CONTATO |</a></div>
	
	</br>
	</br>
	</br>
	</br>
  <br/><br/>
<div value="agenda">
<script >
function showCustomer(str) {
    console.log(str);
  var xhttp;  
  if (str == "") {
    document.getElementById("horarios").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("horarios").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "horarios.php?q="+str, true);
  xhttp.send();
}
</script>
</div>
<form class="agenda"action="grava.php" method="POST">

    <label> Cancha  </label> <br/>
    <select name='cancha' required onchange="showCustomer(this.value)">
        <option value="">Selecione uma Cancha...</option>
        <?php SelectCancha('chute_e_gol','cancha','CodCancha') ?>
    </select>
    <br/>

    <div id="horarios"></div>
    <br/>
    
    
</form>

</body>
</html>