<?php
# Reconhecimento do Modo de ediçao de dados 
    if (isset($_GET["idcirurgiao"])) {
        # code...
        $editar = true;
        echo "<script> var edit = true;  </script>";
    }
    else{
        echo "<script> var edit = false;</script>";
    }
?>
<body id="Cirurgiao">
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
                    <li><a href="#" class="tab w3-dark-grey" onclick="openCity(event, 'listagem-cirurgiao');"><i class="fa fa-list"></i> Listagem</a></li>
                    <li><a href="#" class="tab"  onclick="openCity(event, 'adicionar-cirurgiao');"><i class="fa fa-plus"></i> Adicionar</a></li>
                    <li><a href="#" class="tab" id="tab-editar ><i class="fa fa-edit"></i> Editar</a></li>
                    <li><a href="#" class="tab" onclick="openCity(event, 'consultar-cirurgiao');"><i class="fa fa-search"></i> Consultar</a></li>
                </ul>
            <!--TAB Listagem -->    
                <div id="listagem-cirurgiao"  class="w3-animate-bottom insert">
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
            <!--TAB Formulario de Adição de Cirurgiã-->  
                <div id="adicionar-cirurgiao" class="w3-animate-zoom insert">
                    <form action="cirurgiao" method="GET" class="w3-container">
                        <div class="form-group">
                            <label>Nome Cirurgiao</label>
                            <input class="form-control" name="cirurgiao" type="text" required>
                        </div>
                        <div class="form-group">
                            <label>Idade</label>
                            <input class="form-control" name="idadecirurgiao" type="number">
                        </div>
                        <div class="form-group">
                            <label>Sexo: </label>
                            <input class="w3-radio" type="radio" name="sexocirurgiao" value="Masculino" checked>
                            <label class="w3-validate">Masculino</label>
                            <input class="w3-radio" type="radio" name="sexocirurgiao" value="Femenino">
                            <label class="w3-validate">Femenino</label>
                        </div>
                        <div class="form-group">
                            <label>Anos de Experiencia</label>
                            <input class="form-control" name="experiencia" type="number">
                        </div>
                        <div class="form-group">
                            <label>Especialidade</label>
                            <input class="form-control" name="especialidade" type="text" required>
                        </div>
                        <input type="submit" class="btn w3-padding w3-blue-grey" style="float:right; width:120px;" value="Enviar &nbsp; ❯">
                    </form>
                </div>
            <!--TAB Formulario de Editar de Cirurgiã-->  
                <div id="adicionar-cirurgiao" class="w3-animate-zoom insert">
                    <form action="cirurgiao" method="GET" class="w3-container">
                        <div class="form-group">
                            <label>Id Cirurgiao</label>
                            <input class="form-control" name="idcirurgiao"  value="<?php if(isset($_GET["idcirurgiao"])) echo $_GET["idcirurgiao"]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nome Cirurgiao</label>
                            <input class="form-control" name="cirurgiao" type="text" required>
                        </div>
                        <div class="form-group">
                            <label>Idade</label>
                            <input class="form-control" name="idadecirurgiao" type="number">
                        </div>
                        <div class="form-group">
                            <label>Sexo: </label>
                            <input class="w3-radio" type="radio" name="sexocirurgiao" value="Masculino" checked>
                            <label class="w3-validate">Masculino</label>
                            <input class="w3-radio" type="radio" name="sexocirurgiao" value="Femenino">
                            <label class="w3-validate">Femenino</label>
                        </div>
                        <div class="form-group">
                            <label>Anos de Experiencia</label>
                            <input class="form-control" name="experiencia" type="number">
                        </div>
                        <div class="form-group">
                            <label>Especialidade</label>
                            <input class="form-control" name="especialidade" type="text" required>
                        </div>
                        <input type="submit" class="btn w3-padding w3-blue-grey" style="float:right; width:120px;" value="Enviar &nbsp; ❯">
                    </form>
                </div>  
            <!--TAB Consulta-->  
                <div id="consultar-cirurgiao" class="w3-animate-right insert">
                    <form  method="POST" class="w3-container">
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
</body>
</html>