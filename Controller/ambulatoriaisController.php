<?php
require_once path."/pw2/model/ambulatoriaisModel.php";
class ambulatoriaisController{
	
	function addAmbulatoriais(){
		$db = database::conectar();
		$ambulatoriais = new ambulatoriais($_GET["data"],$_GET["nomeP"],$_GET["condicao"],$_GET["duracao"],$_GET["estado"],$_GET["nomeC"],$_GET["dconsult"],$_GET["npoliclinica"]);
		try {
			$inserir = $db->prepare("INSERT INTO ambulatoriais VALUES (null,?,?,?,?,?,?,?,?)");
			$inserir->bind_param("sssissis",$ambulatoriais->paciente, $ambulatoriais->cirugiao,$ambulatoriais->data,$ambulatoriais->duracao,$ambulatoriais->condicao,$ambulatoriais->estado,$ambulatoriais->policlinica,$ambulatoriais->dconsult);
			if( $inserir->execute()) {
				echo '<script type="text/javascript">alert("Inserção feita com sucecesso!!") </script>';
			}
			else{
				echo '<script type="text/javascript">alert("Erro!!! Inserção feita com Errrro!") </script>';;
			}
			
			
		} catch (Exception $e) {
 				print $e->getMessage();
		}

		/*session_start();
		$opera = new ambulatoriais($_GET["data"],$_GET["nomeP"],$_GET["condicao"],$_GET["duracao"],$_GET["estado"],$_GET["nomeC"],$_GET["dconsult"],$_GET["npoliclinica"]);
		if( !(isset($_SESSION["ambulatoriais"])) ) {
			$_SESSION["ambulatoriais"] = array($opera);		
		}
		else{
			array_push($_SESSION["ambulatoriais"], $opera);
		}
		echo '<script type="text/javascript">alert("Inserção feita com sucecesso!!") </script>';*/
		$pageController = new PageController();
		$pageController->consultaspage();
	}
	function listar(){
		//$db = database::conectar();
		$db = new mysqli("localhost","root","","centromedico");
		try {
			$consult=$db->query("SELECT * FROM ambulatoriais");
			if( $consult->num_rows > 0) {
				 while($row = $consult->fetch_assoc()) {
        			echo '<tr><td>'.$row["nomepacinte"].'</td>';
        			echo '<td>'.$row["nomecirurgiao"].'</td>';
        			echo '<td>'.$row["condicapaciente"].'</td>';
        			echo '<td>'.$row["duracao"].'-horas </td>';
        			echo '<td>'.$row["recuperacao"].'</td>';
        			echo '<td>'.$row["dataoperacao"].'</td>';
        			echo '<td>'.$row["dataproxcnsulta"].'</td>';
        			echo '<td>'.$row["policlinica"].'</td>';
					echo "<td class='edit'>
					<a href='#'><i class='fa fa-edit w3-text-teal'></i></a>
					| <a href='Pagelimina?idambulatoriais=".$row["idambulatoriais"]."&nomepacinte=".$row["nomepacinte"]."&Page=3'>
					<i class='fa fa-trash w3-text-red'></i></a>
				   </td></tr>";
    			}
			}
			else echo "ERRO NA LISTAGEM";
			
		} catch (Exception $e) { print $e->getMessage(); }
		/*if(isset($_SESSION["ambulatoriais"])):
            foreach ($_SESSION["ambulatoriais"] as $x) {
            echo '<tr><td>'.$x->paciente.'</td>';
            echo '<td>'.$x->cirugiao.'</td>';
            echo '<td>'.$x->condicao.'</td>';
            echo '<td>'.$x->duracao.'-horas </td>';
            echo '<td>'.$x->estado.'</td>';
            echo '<td>'.$x->data.'</td>';
            echo '<td>'.$x->dconsult.'</td>';
            echo '<td>'.$x->policlinica.'</td></tr>';             
            }
        endif;*/
	}
	function eliminar(){
		$db = database::conectar();
		try {
			if( $consult = $db->query("DELETE FROM ambulatoriais WHERE `ambulatoriais`.`idambulatoriais` =".$_POST["idambulatoriais"])) {
				echo '<script type="text/javascript">alert("Eliminacao feita com sucecesso!!") </script>';
				$pageController = new PageController();
				$pageController->consultaspage();
			}
			else echo "ERRO NA ELIMINACAO";
			
		} catch (Exception $e) { print $e->getMessage(); }
	}
	function listarPaciente(){
		$db = database::conectar();
		try {
			if (isset($_GET['nomePaciente'])) {
		  		$consult=$db->query("SELECT * FROM ambulatoriais WHERE nomepacinte='{$_GET['nomePaciente']}'");
		 		if( $consult->num_rows > 0) {
					while($row = $consult->fetch_assoc()) {
        				echo '<tr><td>'.$row["nomepacinte"].'</td>';
      		  			echo '<td>'.$row["nomecirurgiao"].'</td>';
        				echo '<td>'.$row["condicapaciente"].'</td>';
        				echo '<td>'.$row["duracao"].'-horas </td>';
       		 			echo '<td>'.$row["recuperacao"].'</td>';
        				echo '<td>'.$row["dataoperacao"].'</td>';
        				echo '<td>'.$row["dataproxcnsulta"].'</td>';
        				echo '<td>'.$row["policlinica"].'</td></tr>';
    				}
    				echo '<script> document.getElementById("tb1").style.display="block";</script>';
				}
				else echo  '<div class="w3-container w3-red">O pacinte cujo o  Nome é : #'.$_GET['nomePaciente'].' nao foi encontrado</div>';
			}
		} catch (Exception $e) { print $e->getMessage(); }

                      /*if(isset($_SESSION["consultP"])):
                       	 foreach ($_SESSION["consultP"] as $x) {
                          echo '<tr><td>'.$x->paciente.'</td>';
                          echo '<td>'.$x->cirugiao.'</td>';
                          echo '<td>'.$x->condicao.'</td>';
                          echo '<td>'.$x->duracao.'-horas </td>';
                          echo '<td>'.$x->estado.'</td>';
                          echo '<td>'.$x->data.'</td>';
                          echo '<td>'.$x->dconsult.'</td>';
                          echo '<td>'.$x->policlinica.'</td></tr>';
                        }endif;*/
	}
	function consultaPaciente(){
		/*session_start();
		$n = $_GET["nomePaciente"];
		$sms = ""; $verifica=false;
		foreach ($_SESSION["ambulatoriais"] as $x) {
			if ($x->paciente==$n){
				$cp = new ambulatoriais($x->data,$x->paciente,$x->condicao,$x->duracao,$x->estado,$x->cirugiao,$x->dconsult,$x->policlinica);
				
					$_SESSION["consultP"] = array($cp);
					$verifica=true;
			}else{
				$sms = ($verifica==false) ? "Não Encontrado dados Correspondente ao nome: ".$n : "" ;
			}
		}
		$a = array();
		$_SESSION["consultP"] =$a;*/
		require_once path."/pw2/view/consultPaciente.php";
	}

}
?>