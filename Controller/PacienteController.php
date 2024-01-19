<?php 
require_once path."/pw2/model/PacienteModel.php";
require_once path."/pw2/config/database.php";
class Pacientecontroller{
	
	function addPaciente(){
		$db = database::conectar();
		$paciente = new paciente($_POST["paciente"],$_POST["idadepaciente"],$_POST["sexopaciente"],$_POST["estadopaciente"]);
		try {
			$inserir = $db->prepare("INSERT INTO paciente VALUES (null,?,?,?,?)");
			$inserir->bind_param("siss",$paciente->nome,$paciente->idade,$paciente->sexo,$paciente->estado);
			if( $inserir->execute()) {
				echo '<script type="text/javascript">alert("Inserção feita com sucecesso!!") </script>';
			}
			else{
				echo '<script type="text/javascript">alert("Inserção feita com Errrro!") </script>';;
			}		
		} catch (Exception $e) {
 				print $e->getMessage();
		}
		$db = database::desconectar();
		$pageController = new PageController();
		$Relatoriocontroller = new Relatoriocontroller();
		$pageController->relatoriopage();
		$Relatoriocontroller->listar_paciente();
		$Relatoriocontroller->listar_cirurgiao();
		$Relatoriocontroller->listar_Ambulatoriais();
		$Relatoriocontroller->listar_Complexas();
	}
	function editPaciente(){
		$db = database::conectar();
		$paciente = new paciente($_GET["paciente"],$_GET["idadepaciente"],$_GET["sexopaciente"],$_GET["estadopaciente"]);
		try {
			//UPDATE `paciente` SET `nome` = 'Teresa Bela', `idade` = '25', `sexo` = 'Femenina', `estado` = 'Saudavell' WHERE `paciente`.`idPaciente` = 2;
			//$sql = "UPDATE paciente SET nome=$paciente->nome WHERE `paciente`.`idPaciente` =".$_GET['idPaciente'];
			//(`nome` = ".$_GET['paciente'].", `idade` = ".$_POST['idadepaciente'].", `sexo` = ".$_POST['sexopaciente'].", `estado` =".$_POST['estadopaciente'].")
			//$editar -> bind_param("siss",$paciente->nome,$paciente->idade,$paciente->sexo,$paciente->estado);
			$inserir = $db->prepare("UPDATE paciente SET `paciente`.nome = ".$_GET['paciente']." WHERE `paciente`.`idPaciente` =".$_GET['idPaciente']);
			if( $inserir->execute()) {
				echo '<script type="text/javascript">alert("Inserção feita com sucecesso!!") </script>';
			}
			else{
				echo '<script type="text/javascript">alert("Inserção feita com Errrro!") </script>';;
			}		
		} catch (Exception $e) {
 				print $e->getMessage();
		}
		$db = database::desconectar();
		$pageController = new PageController();
		$Relatoriocontroller = new Relatoriocontroller();
		$pageController->relatoriopage();
		$Relatoriocontroller->listar_paciente();
		$Relatoriocontroller->listar_cirurgiao();
		$Relatoriocontroller->listar_Ambulatoriais();
		$Relatoriocontroller->listar_Complexas();
	}
	function listar(){
		$db = database::conectar();
		try {
			$consult = $db->query("SELECT * FROM paciente");
			if( $consult->num_rows > 0) {
				 while($row = $consult->fetch_assoc()) {
        			echo '<tr><td>'.$row["nome"].'</td>';
        			echo '<td>'.$row["idade"].'</td>';
        			echo '<td>'.$row["sexo"].'</td>';
        			echo '<td>'.$row["estado"].'</td>';
        			echo "<td class='edit'contenteditable='false'>
						  <a href='PagEdit?idPaciente=".$row["idPaciente"]."'>
						  <i class='fa  fa-edit w3-text-teal'></i></a>
						| <a href='Pagelimina?idPaciente=".$row["idPaciente"]."&nomePaciente=".$row["nome"]."&Page=1'>
						   <i class='fa fa-trash w3-text-red'></i></a>
						  </td></tr>";
    			}
			}
			else echo "ERRO NA LISTAGEM";
			
		} catch (Exception $e) { print $e->getMessage(); }
		$db = database::desconectar();



		/*
		 if(isset($_SESSION["paciente"])):
           foreach ($_SESSION["paciente"] as $x) {
                echo '<tr><td>'.$x->nome.'</td>';
                echo '<td>'.$x->idade.'</td>';
                echo '<td>'.$x->sexo.'</td>';
                echo '<td>'.$x->estado.'</td></tr>';
            }
            endif;*/
	}
	function eliminar(){
		$db = database::conectar();
		try {
			if( $consult = $db->query("DELETE FROM paciente WHERE `paciente`.`idPaciente` = ".$_POST["idPaciente"])) {
				echo '<script type="text/javascript">alert("Eliminacao feita com sucecesso!!") </script>';
				$pageController = new PageController();
				$pageController->homepage();
			}
			else echo "ERRO NA ELIMINACAO";
			
		} catch (Exception $e) { print $e->getMessage(); }
		$db = database::desconectar();
		$pageController = new PageController();
		$Relatoriocontroller = new Relatoriocontroller();
		$pageController->relatoriopage();
		$Relatoriocontroller->listar_paciente();
		$Relatoriocontroller->listar_cirurgiao();
		$Relatoriocontroller->listar_Ambulatoriais();
		$Relatoriocontroller->listar_Complexas();
	}
}
?>