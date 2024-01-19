<?php
	//Pagina de Roteamento Geral
	define("path", $_SERVER["DOCUMENT_ROOT"]);
    require_once path."/pw2/controller/pacientecontroller.php";
    require_once path."/pw2/controller/RelatorioController.php";
    require_once path."/pw2/controller/cirurgiaocontroller.php";
    require_once path."/pw2/controller/ambulatoriaisController.php";
    require_once path."/pw2/controller/complexasController.php";
    require_once path."/pw2/controller/pageController.php";
    require_once path."/pw2/controller/RotasCssJS.php";
	$Relatoriocontroller = new Relatoriocontroller();
	$pageController = new PageController();
	$uri = parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
	//echo path;
	
	if("/pw2/" == $uri || "/pw2/index.php" == $uri || "/pw2/index.php/" == $uri){
		//Chamar pagina Inicial
		// Sempre sera chamda
		$pageController->homepage();
	}
	else if ("/pw2/PageDouctor"==$uri) {
		//Chamar pagina de PageDouctor
		$pageController->douctorpage();
	}
	else if ("/pw2/PageCirurgiao"==$uri) {
		//Chamar pagina de Cirurgiao
		$pageController->cirurgiaopage();
	}
	else if ("/pw2/PagePaciente"==$uri) {
		//Chamar pagina de Paciente
		$pageController-> pacientepage();
	}
	else if ("/pw2/PageConsultas"==$uri) {
		//Chamar pagina de Consultas
		$pageController-> consultaspage();
	}
	else if ("/pw2/PageAgendamento"==$uri) {
		//Chamar pagina de Agendamento
		$pageController-> agendamentopage();
	}
	else if ("/pw2/PageRelatorio"==$uri) {
		//Chamar pagina de Relatorio
		$pageController-> relatoriopage();
		$Relatoriocontroller->listar_paciente();
		$Relatoriocontroller->listar_cirurgiao();
		$Relatoriocontroller->listar_Ambulatoriais();
		$Relatoriocontroller->listar_Complexas();
	}
	elseif ("/pw2/index.php/lista"==$uri ) {
		//Chamar pagina de Listar
		//session_start();
		$pageController->listapage();	
	}
	elseif ("/pw2/index.php/Pagelimina"==$uri || "/pw2/Pagelimina"==$uri) {
		# Chamar pagina elimina
		$pageController->eliminapage();
	}
	########## Açoes BACKEND a serem realizadas  #######################
	### Paciente Backend
	elseif ("/pw2/editpaciente"==$uri) {
		# Inserir um novo Paciente
		$pacientecontroller = new PacienteController();
		$pacientecontroller->editPaciente();
	}
	elseif ("/pw2/index.php/paciente"==$uri || "/pw2/paciente"==$uri) {
		# Inserir um novo Paciente
		$pacientecontroller = new PacienteController();
		$pacientecontroller->addPaciente();
	}
	elseif ("/pw2/index.php/e_Paceinte"==$uri || "/pw2/e_Paceinte"==$uri) {
		# Eliminar um novo Paciente
		$pacientecontroller = new PacienteController();
		$pacientecontroller->eliminar();
	}
	else if ("/pw2/PagEdit"==$uri) {
		//Chamar pagina de 
		if(isset($_GET["idcirurgiao"])){
			$pageController-> cirurgiaopage();
		}else{
			$pageController-> pacientepage();
		}
	}
	### Cirurgiao Backend
	elseif ("/pw2/index.php/cirurgiao"==$uri || "/pw2/cirurgiao"==$uri) {
		# Inserir um novo Cirurgiao
		$cirurgiaocontroller = new cirurgiaocontroller();
		$cirurgiaocontroller->addCirurgiao();
	}
	elseif ("/pw2/index.php/e_Cirurgiao"==$uri || "/pw2/e_Cirurgiao"==$uri) {
		# Eliminar um Cirurgiao
		$cirurgiaocontroller = new cirurgiaocontroller();
		$cirurgiaocontroller->eliminar();
	}
	### Ambulatoria BACKEND
	elseif ("/pw2/index.php/realizarAcao1"==$uri || "/pw2/realizarAcao1"==$uri) {
		//Inserir uma nova operação Ambulatoria
		$ambulatoriaisController = new ambulatoriaisController();
		$ambulatoriaisController->consultaPaciente();	
	}
	elseif ("/pw2/index.php/e_Ambulatoriais"==$uri || "/pw2/e_Ambulatoriais"==$uri) {
		# Eliminar um Ambulatoriais
		$ambulatoriaisController = new ambulatoriaisController();
		$ambulatoriaisController->eliminar();
	}
	elseif ("/pw2/index.php/realizarAcao0"==$uri || "/pw2/realizarAcao0"==$uri) {
		# Chamara pagina de realizar acões adicional
		$pageController->realizarpage0();	   
	}
	### Complexas BACKEND
	elseif ("/pw2/index.php/e_Complexas"==$uri || "/pw2/e_Complexas"==$uri) {
		# Eliminar umComplexas
		$complexasController = new complexasController();
		$complexasController->eliminar();
	}
	elseif ("/pw2/index.php/realizar"==$uri) {
		# Chamara pagina de realizar acões adicional
		$pageController->realizarpage();
	}
	elseif ("/pw2/index.php/realizar0"==$uri) {
		# Chamara pagina de realizar acões adicional
		$pageController->realizarpage0();
	}
	elseif ("/pw2/index.php/insertA"==$uri || "/pw2/insertA"==$uri) {
		//Inserir uma nova operação Ambulatoria e Complexas
		if ($_GET["tipo"]!="ambulatoriais"){
			$complexasController = new complexasController();
			$complexasController->addComplexas();
		}
		else{
			$ambulatoriaisController = new ambulatoriaisController();
			$ambulatoriaisController->addAmbulatoriais();
		}
	}
	else{
		# Chamara pagina Error
		$pageController->error();
	}

		//echo $uri;
?>