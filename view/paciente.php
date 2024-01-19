<?php
# Reconhecimento do Modo de ediçao de dados idcirurgiao 
    if (isset($_GET["idPaciente"])) {
        # code...
        $editar = true;
        echo "<script> var edit = true;  </script>";
    }
    else{
        echo "<script> var edit = false;</script>";
    }
?>
<body id="Paciente">
    <!--Menu lateral -->   
        <aside class="aside">
            <?php 
                $pageController = new PageController();
                $pageController->menupage();
             ?>
        </aside>
    <!--Geral Corpo -->   
	<main class="main">
    <!-- button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Open Modal</button-->
        <!--Cabeçalho -->   
            <header class="header">
                <a href="http://localhost/pw2/"><h3>Paciente Page</h3></a>
            </header>
        <!--Corpo principal de informação -->   
            <section class="section">
                <!--Tab de informação -->   
                    <ul class="w3-navbar w3-blue-grey">
                        <li><a href="#" class="tab w3-dark-grey" onclick="openCity(event, 'listagem-paciente');"><i class="fa fa-list"></i> Listagem</a></li>
                        <li><a href="#" class="tab"  onclick="openCity(event, 'adicionar-paciente');"><i class="fa fa-plus"></i> Adicionar</a></li>
                        <li><a href="#" class="tab"><i class="fa fa-edit"></i> Editar</a></li>
                        <li><a href="#" class="tab" onclick="openCity(event, 'consultar-paciente');"><i class="fa fa-search"></i> Consultar</a></li>
                    </ul> 
                <!--TAB Listagem -->    
                    <div id="listagem-paciente" class="w3-animate-bottom insert">
                        <table class="w3-table w3-bordered w3-striped w3-card-4">
                        <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Sexo</th>
                        <th>Estado</th>
                        <th>Extra</th>
                        </tr>
                        <tbody contenteditable>
                            <?php 
                                $pacientecontroller = new PacienteController();
                                $pacientecontroller->listar();
                            ?>
                        </tbody>
                        </table>
                    </div> 
                <!--TAB Formulario de Adição de Paciente-->  
                    <div id="adicionar-paciente" class="w3-animate-bottom insert">
                        <form action="paciente" method="POST" class="w3-container">
                            <div class="form-group">
                                <label class="label">Nome Paciente</label>    
                                <input class="form-control" name="paciente" type="text" required>   
                            </div>   
                            <div class="form-group">
                                <label class="label">Idade</label>
                                <input class="form-control" type="number" name="idadepaciente">
                            </div>
                            <div class="form-group">
                                <label class="label">Sexo: </label>
                                <div>
                                    <input class="w3-radio" type="radio" name="sexopaciente" value="masculino" checked>
                                    <label class="w3-validate label">Masculino</label>
                                </div>
                                <div>
                                    <input class="w3-radio" type="radio" name="sexopaciente" value="Femenino">
                                    <label class="w3-validate label">Femenino</label>
                                </div>
                            </div>
                            <label>Estado do Paciente: </label><br>
                            <input class="w3-radio" type="radio" name="estadopaciente" value="Grave" checked>
                            <label class="w3-validate">Grave</label>
                            <input class="w3-radio" type="radio" name="estadopaciente" value="Controlado">
                            <label class="w3-validate">Controlado</label>
                            <input class="w3-radio" type="radio" name="estadopaciente" value="Saudavel">
                            <label class="w3-validate">Saudavel</label><br>
                            <input type="submit" class="btn w3-padding w3-blue-grey" style="float:right; width:120px;" value="Enviar &nbsp; ❯">
                        </form>
                    </div>    
                <!--TAB Formulario de Editar de Paciente-->  
                    <div id="editar-paciente" class="w3-animate-bottom insert">
                        <form action="editpaciente" method="GET" class="w3-container">
                            <div class="form-group">
                                <label class="label">Id Paciente</label>    
                                <input class="form-control" name="idPaciente" value="<?php if(isset($_GET["idPaciente"])) echo $_GET["idPaciente"]; ?>" type="text" required> 
                            </div>
                            <div class="form-group">
                                <label class="label">Nome Paciente</label>    
                                <input class="form-control" name="paciente" type="text" required>   
                            </div>   
                            <div class="form-group">
                                <label class="label">Idade</label>
                                <input class="form-control" type="number" name="idadepaciente">
                            </div>
                            <div class="form-group">
                                <label class="label">Sexo: </label>
                                <div>
                                    <input class="w3-radio" type="radio" name="sexopaciente" value="masculino" checked>
                                    <label class="w3-validate label">Masculino</label>
                                </div>
                                <div>
                                    <input class="w3-radio" type="radio" name="sexopaciente" value="Femenino">
                                    <label class="w3-validate label">Femenino</label>
                                </div>
                            </div>
                            <label>Estado do Paciente: </label><br>
                            <input class="w3-radio" type="radio" name="estadopaciente" value="Grave" checked>
                            <label class="w3-validate">Grave</label>
                            <input class="w3-radio" type="radio" name="estadopaciente" value="Controlado">
                            <label class="w3-validate">Controlado</label>
                            <input class="w3-radio" type="radio" name="estadopaciente" value="Saudavel">
                            <label class="w3-validate">Saudavel</label><br>
                            <input type="submit" class="btn w3-padding w3-blue-grey" style="float:right; width:120px;" value="Enviar &nbsp; ❯">
                        </form>
                    </div>
                    <!--TAB Consulta-->  
                    <div id="consultar-paciente" class="w3-animate-right insert">
                        <form  method="POST" class="w3-container">
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
            </section>
            <?php
                // Rodape Geral
                $pageController->footerpage();
            ?>
        </main>
        <!-- Modal Mensagem -->
        <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4">
            <header class="w3-container w3-teal"> 
            <span onclick="document.getElementById('id01').style.display='none'" 
            class="w3-button w3-display-topright">&times;</span>
            <h2>Sucecesso!</h2>
            </header>
            <div class="w3-container">
            <p>...</p>
            <p>Um novo paciente adicionado com sucesso!</p>
            <p>...</p>
            </div>
        </div>
        </div>
        <script type="text/javascript" src="/pw2/view/animation/event.js"></script>
</body>
</html>