<?php
require_once path."/pw2/model/complexasModel.php";
class complexasController{
	
	function addComplexas(){
		$db = database::conectar();
		$complexas = new complexas($_GET["data"],$_GET["nomeP"],$_GET["condicao"],$_GET["duracao"],$_GET["estado"],$_GET["nomeC"],$_GET["datapc"],$_GET["sala"],$_GET["cama"]);
		try {
			$inserir = $db->prepare("INSERT INTO complexas VALUES (null,?,?,?,?,?,?,?,?,?)");
			$inserir->bind_param("sssissiis",$complexas->paciente, $complexas->cirugiao,$complexas->data,$complexas->duracao,$complexas->condicao,$complexas->estado,$complexas->cama,$complexas->sala,$complexas->tempo);
			if( $inserir->execute()) {
				echo '<script type="text/javascript">alert("Inserção feita com sucecesso!!") </script>';
			}
			else{
				echo '<script type="text/javascript">alert("Erro!!! Inserção feita com Errrro!") </script>';;
			}
			
			
		} catch (Exception $e) {
 				print $e->getMessage();
		}
		/*
		session_start();
		$complexas = new complexas($_GET["data"],$_GET["nomeP"],$_GET["condicao"],$_GET["duracao"],$_GET["estado"],$_GET["nomeC"],$_GET["datapc"],$_GET["sala"],$_GET["cama"]);
		if( !(isset($_SESSION["complexas"])) ) {
			 $_SESSION["complexas"] = array($complexas);		
		}
		else{
			array_push($_SESSION["complexas"], $complexas);
		}
		echo '<script type="text/javascript">alert("Inserção feita com sucecesso!!") </script>';*/
		$pageController = new PageController();
		$pageController->consultaspage();
	}
	function listar(){
		$db = new mysqli("localhost","root","","centromedico");
		try {
			$consult=$db->query("SELECT * FROM complexas");
			if( $consult->num_rows > 0) {
				 while($row = $consult->fetch_assoc()) {
        			echo '<tr><td>'.$row["nomepacinte"].'</td>';
        			echo '<td>'.$row["nomecirurgiao"].'</td>';
        			echo '<td>'.$row["condicapaciente"].'</td>';
        			echo '<td>'.$row["duracao"].'</td>';
        			echo '<td>'.$row["estadorecuperacao"].'</td>';
        			echo '<td>'.$row["dataoperacao"].'</td>';
        			echo '<td>'.$row["temporecuperacao"].'</td>';
        			echo '<td>'.$row["numsala"].'</td>';
        			echo '<td>'.$row["numcama"].'</td>';
					echo "<td class='edit'>
					<a href='#'><i class='fa fa-edit w3-text-teal'></i></a>
					| <a href='Pagelimina?idcomplexas=".$row["idcomplexas"]."&nomepacinte=".$row["nomepacinte"]."&Page=4'>
					<i class='fa fa-trash w3-text-red'></i></a>
				   </td></tr>";
    			}
			}
			else echo "ERRO NA LISTAGEM";
			
		} catch (Exception $e) { print $e->getMessage(); }
		/*if(isset($_SESSION["complexas"])):
                        foreach ($_SESSION["complexas"] as $x) {
                          echo '<tr><td>'.$x->paciente.'</td>';
                          echo '<td>'.$x->cirugiao.'</td>';
                          echo '<td>'.$x->condicao.'</td>';
                          echo '<td>'.$x->duracao.'</td>';
                          echo '<td>'.$x->estado.'</td>';
                          echo '<td>'.$x->data.'</td>';
                          echo '<td>'.$x->tempo.'</td>';
                          echo '<td>'.$x->sala.'</td>';
                          echo '<td>'.$x->cama.'</td></tr>';
                        }
                      endif;*/
	}
	function eliminar(){
		$db = database::conectar();
		try {
			if( $consult = $db->query("DELETE FROM complexas WHERE `complexas`.`idcomplexas` =".$_POST["idcomplexas"])) {
				echo '<script type="text/javascript">alert("Eliminacao feita com sucecesso!!") </script>';
				$pageController = new PageController();
				$pageController->consultaspage();
			}
			else echo "ERRO NA ELIMINACAO";
			
		} catch (Exception $e) { print $e->getMessage(); }
	}
	function consultarCirurgiao(){
		$db = database::conectar();
		try {
			if (isset($_GET['nomeCirurgiao'])) {
				$a=0;
		  		$consult=$db->query("SELECT * FROM complexas WHERE nomecirurgiao='{$_GET['nomeCirurgiao']}' AND estadorecuperacao='Ruim'");
		 		if( $consult->num_rows > 0) {
					while($row = $consult->fetch_assoc()) {
						$a++;
						echo $a;
						echo '<tr><td>'.$row["nomepacinte"].'</td>';
        				echo '<td>'.$row["nomecirurgiao"].'</td>';
        				echo '<td>'.$row["condicapaciente"].'</td>';
        				echo '<td>'.$row["duracao"].'</td>';
        				echo '<td>'.$row["estadorecuperacao"].'</td>';
        				echo '<td>'.$row["dataoperacao"].'</td>';
        				echo '<td>'.$row["temporecuperacao"].'</td>';
        				echo '<td>'.$row["numsala"].'</td>';
        				echo '<td>'.$row["numcama"].'</td></tr>';
    				}
    				echo '<script> document.getElementById("tb1").style.display="block";</script>';
				}
				else echo  '<div class="w3-container w3-red">O Cirurgiao cujo o  Nome é : #'.$_GET['nomeCirurgiao'].' nao foi encontrado</div>';
			}
		} catch (Exception $e) { print $e->getMessage(); }
	}
}
?>