<?php 
require_once path."/pw2/model/CirurgiaoModel.php";
require_once path."/pw2/config/database.php";
class CirurgiaoController{
		
	function addCirurgiao(){
		$db = database::conectar();
		$cirurgiao = new Cirurgiao($_GET["cirurgiao"],$_GET["idadecirurgiao"],$_GET["sexocirurgiao"],$_GET["especialidade"],$_GET["experiencia"]);
		try {
			$inserir = $db->prepare("INSERT INTO cirurgiao VALUES (null,?,?,?,?,?)");
			$inserir->bind_param("sissi",$cirurgiao->nome,$cirurgiao->idade,$cirurgiao->sexo,$cirurgiao->especialidade,$cirurgiao->experiencia);
			if( $inserir->execute()) {
				echo '<script type="text/javascript">alert("Inserção feita com sucecesso!!") </script>';
				$pageController = new PageController();
				$pageController->cirurgiaopage();
			}
			else{
				echo '<script type="text/javascript">alert("Inserção feita com Errrro!") </script>';;
			}		
		} catch (Exception $e) {print $e->getMessage();}

		/*session_start();
		$cirurgiao = new Cirurgiao($_GET["cirurgiao"],$_GET["idadecirurgiao"],$_GET["sexocirurgiao"],$_GET["especialidade"],$_GET["experiencia"]);
		if( !(isset($_SESSION["cirurgiao"])) ) {
			$_SESSION["cirurgiao"] = array($cirurgiao);		
		}
		else{
			array_push($_SESSION["cirurgiao"], $cirurgiao);
		}
		echo '<script type="text/javascript">alert("Inserção feita com sucecesso!!") </script>';*/
	}
	function listar(){
		$db = database::conectar();
		$db = new mysqli("localhost","root","","centromedico");
		try {
			$consult=$db->query("SELECT * FROM cirurgiao");
			if( $consult->num_rows > 0) {
				 while($row = $consult->fetch_assoc()) {
        			echo '<tr><td>'.$row["nome"].'</td>';
        			echo '<td>'.$row["idade"].'</td>';
        			echo '<td>'.$row["sexo"].'</td>';
        			echo '<td>'.$row["especialidae"].'</td>';
        			echo '<td>'.$row["anoexperiencia"].'</td>';
					echo "<td class='edit'>
					<a href='PagEdit?idcirurgiao=".$row["idcirurgiao"]."'><i class='fa fa-edit w3-text-teal'></i></a>
					| <a href='Pagelimina?idcirurgiao=".$row["idcirurgiao"]."&nomecirurgiao=".$row["nome"]."&Page=2'>
					<i class='fa fa-trash w3-text-red'></i></a>
				   </td></tr>";
    			}
			}
			else echo "ERRO NA LISTAGEM";
			
		} catch (Exception $e) { print $e->getMessage(); }/*
		
		if(isset($_SESSION["cirurgiao"])):
                        foreach ($_SESSION["cirurgiao"] as $x) {
                          echo '<tr><td>'.$x->nome.'</td>';
                          echo '<td>'.$x->idade.'</td>';
                          echo '<td>'.$x->sexo.'</td>';
                          echo '<td>'.$x->especialidade.'</td>';
                          echo '<td>'.$x->experiencia.'</td></tr>';
                        }
                      endif;*/
	}
	function listar_douctor(){
		$db = database::conectar();
		$db = new mysqli("localhost","root","","centromedico");
		try {
			$consult=$db->query("SELECT * FROM cirurgiao");
			if( $consult->num_rows > 0) {
				$i=0;
				 while($row = $consult->fetch_assoc()) {
					$i++; 
					$i = ($i==7) ? 1:$i; //Controlador da imagem user local
					echo "
						<div class='mySlides'>
							<div>
								<img  class='w3-round-xxlarge' src='/pw2/view/image/img_avatar".$i.".png' style='width:55%'>
							</div>
							<div class='w3-display-topright w3-container conteudo'>
							<h2>Nome: <strong>".$row["nome"]."</strong></h2>
								<h3>Agente Nº: <strong>".$row["idcirurgiao"]."</strong></h3>
			 					<h3>Idade: <strong>".$row["idade"]."</strong></h3>
			 					<h3>Genero: <strong>".$row["sexo"]."</strong></h3>
			 					<h3>Especialidade: <strong>".$row["especialidae"]."</strong></h3>
								<h3>Experiencia: <strong>".$row["anoexperiencia"]."</strong></h3>
								<a href='PagEdit?idcirurgiao=".$row["idcirurgiao"]."' class='w3-btn w3-round-large btn-info'>Editar <i class='fa fa-edit w3-text-teal'></i></a>
								<a class='w3-btn w3-round-large btn-danger'  href='Pagelimina?idcirurgiao=".$row["idcirurgiao"]."&nomecirurgiao=".$row["nome"]."&Page=2'>
								Eliminar <i class='fa fa-trash w3-text-red'></i></a>
							</div>
						</div>
						<span class='w3-badge demo w3-border w3-transparent w3-hover-white' onclick='currentDiv(".$i.")'></span>
					";
    			}
			}
			else echo "ERRO NA LISTAGEM";
			
		} catch (Exception $e) { print $e->getMessage(); }
	}
	function eliminar(){
		$db = database::conectar();
		try {
			if( $consult = $db->query("DELETE FROM cirurgiao WHERE `cirurgiao`.`idcirurgiao` = ".$_POST["idcirurgiao"])) {
				echo '<script type="text/javascript">alert("Eliminacao feita com sucecesso!!") </script>';
				$pageController = new PageController();
				$pageController->cirurgiaopage();
			}
			else echo "ERRO NA ELIMINACAO";
			
		} catch (Exception $e) { print $e->getMessage(); }
	}
}
?>