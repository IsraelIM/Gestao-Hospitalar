<?php 
require_once path."/pw2/config/database.php";
class Relatoriocontroller{
	
	// Contagem dos Pacientes
	function listar_paciente(){
		$db = database::conectar();
		try {
			$consult = $db->query("SELECT COUNT(*) AS Total FROM paciente");
			if( $consult->num_rows > 0) {
				 while($row = $consult->fetch_assoc()) {
        			echo '<script> var totalPaciente = '.$row["Total"].'</script>';
    			}
			}
			else echo "ERRO NA LISTAGEM";
		} catch (Exception $e) { print $e->getMessage(); }
		$db = database::desconectar();
	}

	//Contagem dos Cirurgioa
	function listar_cirurgiao(){
		$db = database::conectar();
		try {
			$consult = $db->query("SELECT COUNT(*) AS Total FROM cirurgiao");
			if( $consult->num_rows > 0) {
				 while($row = $consult->fetch_assoc()) {

        			echo '<script> var totalCirurgiao = '.$row["Total"].'</script>';
    			}
			}
			else echo "ERRO NA LISTAGEM";
			
		} catch (Exception $e) { print $e->getMessage(); }
		$db = database::desconectar();

	}

	//Contagem dos Ambulatorias
	function listar_Ambulatoriais(){
		$db = database::conectar();
		try {
			$consult = $db->query("SELECT COUNT(*) AS Total FROM ambulatoriais");
			if( $consult->num_rows > 0) {
				 while($row = $consult->fetch_assoc()) {	
        			echo '<script> var totalAmbulatoriais = '.$row["Total"].'</script>';
    			}
			}
			else echo "ERRO NA LISTAGEM";
			
		} catch (Exception $e) { print $e->getMessage(); }
		$db = database::desconectar();

	}

	//Contagem dos Complexas
	function listar_Complexas(){
		$db = database::conectar();
		try {
			$consult = $db->query("SELECT COUNT(*) AS Total FROM complexas");
			if( $consult->num_rows > 0) {
				 while($row = $consult->fetch_assoc()) {	
        			echo '<script> var totalComplexas = '.$row["Total"].'</script>';
    			}
			}
			else echo "ERRO NA LISTAGEM";
			
		} catch (Exception $e) { print $e->getMessage(); }
		$db = database::desconectar();

	}

}
?>