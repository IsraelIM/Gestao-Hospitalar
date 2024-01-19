<?php
class Pagecontroller{
	
	function indexpage(){
		//Routa Index
		require path."/pw2/index.php";
	}
	function douctorpage(){
		//Routa Douctor
		require "view/douctor.php";
	}
	function cirurgiaopage(){
		//Routa Cirurgiao
		require path."/pw2/view/cirurgiao.php";
	}
	function pacientepage(){
		//Routa Paciente
		require path."/pw2/view/paciente.php";
	}
	function consultaspage(){
		//Routa Consultas
		require "view/consultas.php";
	}
	function agendamentopage(){
		//Routa Agendamento
		require "view/agendamento.php";
	}
	function relatoriopage(){
		//Routa Relatorio
		require "view/relatorio.php";
	}
	function eliminapage(){
		//Routa Agendamento
		require "view/AuxPage/elimina.php";
	}
	function listapage(){
		//Routa listar
		require "view/lista.php";
	}
	function realizarpage() {
		//Routa Acçao consultar Paciente
		require path."/pw2/view/consultPaciente.php";
	}
	function realizarpage0() {
		//Routa Acçao consultar Cirurgiao
		require path."/pw2/view/consultCirurgiao.php"; 
	}
	function menuimg(){
		//Routa Acçao e Funcao Imagem
        $uri = parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
        if (("/pw2/" == $uri || "/pw2/index.php" == $uri))
            echo '<img src="view/image/img_avatar2.png" alt="icon">';
        else
            echo '<img src="/pw2/view/image/img_avatar2.png" alt="icon">';
	}
	#Chamada das Auxiliar Paginas
	function homepage(){
		//Routa Home
		require path."/pw2/view/AuxPage/home.php";
	}
	function menupage(){
		//Routa Menu
		require path."/pw2/view/AuxPage/menu.php";
	}
	function footerpage(){
		//Routa Footer
		require path."/pw2/view/AuxPage/footer.php";
	}
	function error(){
		# error page no endereço
		require path."/pw2/view/AuxPage/error.php";
	}
}
?>