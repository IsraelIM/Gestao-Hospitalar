<body id="Consultas">
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
                <a href="http://localhost/pw2/"><h3>Consultas Page</h3></a>
            </header>
        <!--Corpo principal de informação -->   
            <section class="section">
                <!--Tab de informação -->   
                    <ul class="w3-navbar w3-blue-grey">
                        <li><a href="#" class="tab w3-dark-grey" onclick="openCity(event, 'listagem-consultasA');"><i class="fa fa-list"></i> Consulta Ambulatoriais</a></li>
                        <li><a href="#" class="tab" onclick="openCity(event, 'listagem-consultasP');"><i class="fa fa-list"></i> Consulta Comolexas</a></li>
                        <li><a href="#" class="tab"  onclick="openCity(event,'adicionar-consultas');"><i class="fa fa-plus"></i> Adicionar</a></li>
                        <li><a href="#" class="tab" onclick="openCity(event, 'consultar-consultas');"><i class="fa fa-search"></i> Consultar</a></li>
                    </ul> 
                <!--Listar operação ambulante-->
                    <div id="listagem-consultasA" class="w3-animate-zoom insert">
                    <table class="w3-table w3-bordered w3-striped w3-card-4">
                        <tr>
                        <th>Paciente</th>
                        <th>Cirurgião</th>
                        <th>Condição</th>
                        <th>Duração</th>
                        <th>Recuperação</th>
                        <th>Data</th>
                        <th>Data-de-Consulta</th>
                        <th>policlinica</th>
                        <th>Extra</th>
                        </tr>
                        <tbody>
                        <?php
                            $ambulatoriaisController = new ambulatoriaisController();
                            $ambulatoriaisController->listar();
                        ?>
                        </tbody>
                        </table>
                    </div>
                <!--Listar operação Complexas-->
                    <div id="listagem-consultasP" class="w3-animate-zoom insert">
                    <table class="w3-table w3-bordered w3-striped w3-card-4">
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
                        <th>Extra</th>
                        </tr>
                        <?php
                        $complexasController = new complexasController();
                        $complexasController->listar();
                        ?>
                    </table>
                    </div>
                <!--TAB Formulario de Adição de consultas-->  
                    <div id="adicionar-consultas" class="w3-animate-bottom insert">
                        <form action="insertA" method="GET" class="w3-container">
                            <!--Campos para selecionar operação -->   
                            <select name="tipo" id="tOpera" class="custom-select" required>
                            <option value="" disabled selected>Seleciona o tipo de Operação</option>
                                <option value="ambulatoriais">Ambulatoriais</option>
                                <option value="complexas">complexas</option>
                            </select>
                            <!--Campos para operação Geral --> 
                            <div class="form-group"></div>  
                            <div class="form-group"></div>  
                            <div class="form-group"></div>  
                            <label>Nome Paciente</label>
                            <input class="w3-input" type="text" name="nomeP" required>
                            <label>Nome Cirurgiao</label>           
                            <input class="w3-input" name="nomeC" type="text">
                            <label>Data da operacao</label>
                            <input class="w3-input" name="data" type="date">
                            <label>Duração da operacao</label>
                            <input class="w3-input" name="duracao" type="number">
                            <label>Condição do Paciente: </label><br>
                            <input class="w3-radio" type="radio" name="condicao" value="Urgente" checked>
                            <label class="w3-validate">Urgente</label>
                            <br><input class="w3-radio" type="radio" name="condicao" value="Nao Urgente">
                            <label class="w3-validate">Não Urgente</label><br>
                            <br><label>Estado de Recuperação  Paciente: </label><br>
                            <input class="w3-radio" type="radio" name="estado" value="Boa" checked>
                            <label class="w3-validate">Bom</label>
                            <input class="w3-radio" type="radio" name="estado" value="Regular">
                            <label class="w3-validate">Regular</label>
                            <input class="w3-radio" type="radio" name="estado" value="Ruim">
                            <label class="w3-validate">Ruim</label><br><br>
                                    
                            <!--Campos para operação ambulatoriais -->   
                            <div id="ambulatoriais">
                                <label>Numero de policlínica</label>
                                <input class="w3-input" name="npoliclinica" type="number">
                                <label>Data da Proxima Consulta</label>
                                <input class="w3-input" name="dconsult" type="date">
                            </div>

                            <!--Campos para operação complexas -->   
                            <div id="complexas">
                                <label>Numero da Cama</label>
                                <input class="w3-input" name="cama" type="number">
                                <label>Numero da Sala</label>
                                <input class="w3-input" name="sala" type="number">
                                <label>Rempo de Recuperação</label>
                                <input class="w3-input" name="datapc" type="date">
                            </div> 
                            <br><input class="btn w3-blue-grey" type="submit" value="Enviar &nbsp; ❯">
                        </form>     
                    </div>  
                <!--TAB Consulta-->  
                    <div id="consultar-consultas" class="w3-animate-right insert">

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