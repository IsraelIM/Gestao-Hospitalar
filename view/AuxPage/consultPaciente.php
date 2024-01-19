<style>
<?php
// Home estilo para padronisaçao
require_once path."/pw2/view/design/Home.css";
// Insercao estilo
require_once path."/pw2/view/design/insercao.css";
// Bibloteca W3, Boostrap e Font-awesome
require_once path."/pw2/view/design/lib/w3.css";
require_once path."/pw2/view/design/lib/css/font-awesome.css";
require_once path."/pw2/view/design/lib/css/bootstrap.css";
?>
</style>
<body id="Paciente">
    <!--Menu lateral -->   
    <aside class="aside">
        <?php include "menu.php" ?>
  </aside>
    <!--Geral Corpo -->   
  <main class="main">
        <!--Cabeçalho -->   
    <header class="header">
      <h3>Hospital Geral</h3>
    </header>

        <!--Corpo principal de informação -->   
        <section class="section">
            <!--Tab de informação -->   
            <ul class="w3-navbar w3-blue-grey">
                  <li><a href="#" class="tab"  onclick="openCity(event, 'opracao');">Consultar</a></li>
                  <li><a href="#" class="tab" onclick="openCity(event, 'paciente');">Outras operações</a></li>
                  <li><a href="#" class="tab" onclick="openCity(event, 'cirurgiao');">Extra</a></li>
            </ul>
            <div id="aviso"></div>  
            <!--Corpo principal de informação -->   
                <div id="opracao" class="w3-animate-zoom insert" style="display: block;">
                  
                    <form action="realizarAcao1" method="GET" class="w3-container">
                    <!--Campos para selecionar operação -->   
                      <br>
                      <!--Campos para operação Geral -->   
                      <label> Preocura pelo nome do Paciente</label>
                      <input class="w3-input" type="text" name="nomePaciente" required>
                      <br><input type="submit" class="w3-btn w3-padding w3-blue-grey" style="float:right; width:120px;" value="Enviar &nbsp; ❯">
                      <br><br><br><br>
                  </form>
                  <table id="tb1" style="display: none;" class="w3-table w3-bordered w3-striped w3-card-4">
                   <tr>
                      <th>Paciente</th>
                      <th>Cirurgião</th>
                      <th>Condição</th>
                      <th>Duração</th>
                      <th>Recuperação</th>
                      <th>Data</th>
                      <th>Data-de-Consulta</th>
                    </tr>                    
                    <?php 
                      $ambulatoriaisController = new ambulatoriaisController();
                      $ambulatoriaisController->listarPaciente();
                    ?>
                  </table>
                </div>
                
                <div id="paciente" class="w3-animate-bottom insert">
                  <form action="" method="GET" class="w3-container">
                    <!--Campos para selecionar operação -->   
                    <select name="tipo" id="tOpera" class="w3-select" required>
                      <option value="" disabled selected>
                        Seleciona o tipo de Operação</option>
                        <option value="ambulatoriais">Ambulatoriais</option>
                        <option value="complexas">complexas</option>
                    </select><br><br>
                    <!--Campos para operação ambulatoriais -->   
                    <div id="ambulatoriais">
                        <label>Duração média das operações de emergência</label>
                        <input class="w3-input"  value="10 - horas" name="npoliclinica" type="text" disabled="disabled">
                    </div>

                    <!--Campos para operação complexas -->   
                    <div id="complexas"> 
                    <label>Duração média das operações de emergência </label>
                        <input class="w3-input"  value="07 - horas" name="npoliclinica" type="text" disabled="disabled">
                    </div> 
                    </form>
                      <div id="idoso">
                        <label>Paciente mais idoso</label>
                        <input class="w3-input" name="idosoPaciente" value="Israel" disabled="disabled" type="text">
                        <label>Anos de Idade</label>
                        <input class="w3-input" disabled="disabled" name="idosoIdade" value="109" type="number">
                    </div>
                    <form>
                      
                    </form>
                </div>
                
                <div id="cirurgiao" class="w3-animate-right insert">
                  Zona 3
                </div>
    </section>
    <?php
    // Rodape Geral
    include_once path."/pw2/view/footer.php";
    ?>
    </main>
        <script type="text/javascript" src="/pw2/view/animation/event.js"></script>
</body>
</html>