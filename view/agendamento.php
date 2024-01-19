<body id="Agendamento">
    <!--Menu lateral -->   
    <aside class="aside">
        <?php 
            $pageController = new PageController();
            $pageController->menupage();
        ?>
	</aside>
    <!--Geral Corpo -->   
	<main class="main">
        <!--Cabeçalho -->   
		<header class="header">
            <a href="http://localhost/pw2/"><h3>Cirurgião Page</h3></a>
		</header>
        <!--Corpo principal de informação -->   
        <section class="section">
            <!--Tab de informação -->   
                <ul class="w3-navbar w3-blue-grey">
                    <li><a href="#" class="tab w3-dark-grey" onclick="openCity(event, 'listagem-agendamento');"><i class="fa fa-list"></i> Consultas Agendadas</a></li>
                    <li><a href="#" class="tab" onclick="openCity(event, 'consultar-agendamento');"><i class="fa fa-search"></i> Preocurar</a></li>
                </ul> 
            <!--TAB Listagem -->    
                <div id="listagem-agendamento" class="w3-animate-bottom insert">
                    <table class="w3-table w3-bordered w3-striped w3-card-4">
                        <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Sexo</th>
                        <th>Especialidade</th>
                        <th>Experiencia</th>
                        <th>Extra</th>
                        </tr>

                        <tbody>
                        <?php 
                            $cirurgiaocontroller = new cirurgiaocontroller();
                            $cirurgiaocontroller->listar();
                        ?>
                        </tbody>

                    </table>
                </div>
            <!--TAB Consulta-->  
                <div id="consultar-cirurgiao" class="w3-animate-right insert">
                    <form action="realizarAcao0" method="GET" class="w3-container">
                    <!--Campos para selecionar operação -->   
                      <br>
                      <!--Campos para operação Geral -->   
                      <label> Preocura pelo nome do Cirurgião</label>
                      <input class="w3-input" type="text" name="nomeCirurgiao" required>
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
                      <th>Next Consulta</th>
                      <th>Sala</th>
                      <th>Cama</th>
                    </tr>                   
                    <?php 
                      $complexas = new complexascontroller();
                      $complexas->consultarCirurgiao();
                    ?>
                  </table>
                </div>
		</section>
		<?php
            // Rodape Geral
            $pageController->footerpage();
		?>
    </main>
    <script type="text/javascript" src="/pw2/view/animation/event.js"></script>
</body>
</html>