<?php
### Controlo de Formulario a ser eleiminado
 if ($_GET["Page"]==1) {
	# Ocultar form Cirurgiao
	echo "<style>.section-Cirurgiao{display:none;}</style>" ;
	# Ocultar form Ambulatoriais
	echo "<style>.section-Ambulatoriais{display:none;}</style>" ;
	# Ocultar form Complexas
	echo "<style>.section-Complexas{display:none;}</style>" ;
 }
 else if ($_GET["Page"]==2) {
	# Ocultar Form Paciente
	echo "<style>.section-Paciente{display:none;}</style>" ;
	# Ocultar form Ambulatoriais
	echo "<style>.section-Ambulatoriais{display:none;}</style>" ;
	# Ocultar form Complexas
	echo "<style>.section-Complexas{display:none;}</style>" ;
 }
 else if ($_GET["Page"]==3) {
	# Ocultar Form Paciente
	echo "<style>.section-Paciente{display:none;}</style>" ;
	# Ocultar form Cirurgiao
	echo "<style>.section-Cirurgiao{display:none;}</style>" ;
	# Ocultar form Complexas
	echo "<style>.section-Complexas{display:none;}</style>" ;
 }
 else if ($_GET["Page"]==4) {
	# Ocultar Form Paciente
	echo "<style>.section-Paciente{display:none;}</style>" ;
	# Ocultar form Cirurgiao
	echo "<style>.section-Cirurgiao{display:none;}</style>" ;
	# Ocultar form Ambulatoriais
	echo "<style>.section-Ambulatoriais{display:none;}</style>" ;
 }
?>
<body id="Elimina">
	<aside class="aside">
	<?php
		$pageController = new PageController();
		$pageController->menupage();
	?>
	</aside>
	<main class="main">
		<header class="header">
			<h3>Pagina de Eliminaçao</h3>
		</header>
		<section class="section section-Paciente">
			<form action="e_Paceinte" method="post">
				<h4>Deseja realmente eleminar o(a) Pacinte
					<span class="text-danger"><?php echo $_GET["nomePaciente"];?></span>
					da BD com o ID = <?php echo $_GET["idPaciente"] ; ?></h4>
				<h6 class="alert-danger alert">Esta acçao sera inreversivel!</h6>
				<input type="hidden" name="idPaciente" value=<?php echo $_GET["idPaciente"];?>>
				<a href="PagePaciente" class="btn btn-danger">Nao</a>
				<input type="submit" class="btn btn-success" value="Sim">
			</form>
		</section>
		<section class="section section-Cirurgiao">
			<form action="e_Cirurgiao" method="post">
				<h4>Deseja realmente eleminar o(a) Cirurgiao
					<span class="text-danger"><?php echo $_GET["nomecirurgiao"];?></span>
					da BD com o ID = <?php echo $_GET["idcirurgiao"] ; ?></h4>
				<h6 class="alert-danger alert">Esta acçao sera inreversivel!</h6>
				<input type="hidden" name="idcirurgiao" value=<?php echo $_GET["idcirurgiao"];?>>
				<a href="PageCirurgiao" class="btn btn-danger">Nao</a>
				<input type="submit" class="btn btn-success" value="Sim">
			</form>
		</section>	
		<section class="section section-Ambulatoriais">
			<form action="e_Ambulatoriais" method="post">
				<h4>Deseja realmente eleminar a Consulta Ambulatoria do(a) Paciente
					<span class="text-danger"><?php echo $_GET["nomepacinte"];?></span>
					da BD com o ID = <?php echo $_GET["idambulatoriais"] ; ?></h4>
				<h6 class="alert-danger alert">Esta acçao sera inreversivel!</h6>
				<input type="hidden" name="idambulatoriais" value=<?php echo $_GET["idambulatoriais"];?>>
				<a href="PageConsultas" class="btn btn-danger">Nao</a>
				<input type="submit" class="btn btn-success" value="Sim">
			</form>
		</section>
		<section class="section section-Complexas">
			<form action="e_Complexas" method="post">
				<h4>Deseja realmente eleminar a Consulta Complexas do(a) Paciente
					<span class="text-danger"><?php echo $_GET["nomepacinte"];?></span>
					da BD com o ID = <?php echo $_GET["idcomplexas"] ; ?></h4>
				<h6 class="alert-danger alert">Esta acçao sera inreversivel!</h6>
				<input type="hidden" name="idcomplexas" value=<?php echo $_GET["idcomplexas"];?>>
				<a href="PageConsultas" class="btn btn-danger">Nao</a>
				<input type="submit" class="btn btn-success" value="Sim">
			</form>
		</section>
		<?php
			// Rodape Geral
			$pageController->footerpage();
		?>
	</main>
</body>
</html>