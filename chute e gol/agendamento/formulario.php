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
    
    <label> Tempo </label> <br/>
    <select name="tempo" required>
      <option value="">Selecione um tempo...</option>
        <?php select('chute_e_gol','tempo','Tempo') ?>
    </select>
    <br/>
    <br/>
    <label> Agendar </label> <br/> <br/>
    <label> Data </label> <br/>
    <input type="date" name="Data_Age" value="<?= date ('Y-m-d') ?>" required />
    <br/>
    <br/>
    <label> Hora <label> <br/>
    <select name="Hora_Age" required>
      <option value="">Selecione um horário...</option>
      <?php
          $hora = '07:00';
          for ($i=1;$i<=18;$i++)
          {
              $hora = date('H:i',strToTime('+1 hour',strtotime($hora)));
              echo "<option value='{$hora}'>{$hora}</option>";
          }
      ?>
    </select>
    <br/><br/>
    <input type="submit" name="enviado" value="Enviar" />
</form>