<body id="Home">
	<aside class="aside">
	<?php
		$pageController = new PageController();
		$pageController->menupage();
	?>
	</aside>
	<main class="main">
		<header class="header">
			<h3><a  href="#" onclick="menuview()" id="bars"><i class="fa fa-bars"></i></a>Hospital Geral</h3>
			<section class="section">
					<div class="">
						<a href="PageDouctor">
							<span class="texto">Doutores</span>
							<span class="dados">03</span>
							<i class="fa fa-user"></i>
						</a>
					</div>
					<div>
						<a href="PageCirurgiao">
							<span class="texto">Cirurgião</span>
							<span class="dados">05</span>
							<i class="fa fa-stethoscope"></i>
						</a>
					</div>
					<div>
						<a href="PagePaciente">
							<span class="texto">Paciente</span>
							<span class="dados">12</span>
							<i class="fa fa-users"></i>
					    </a>
				    </div>
					<div>
						<a href="PageConsultas">
							<span class="texto">Consultas</span>
							<span class="dados">19</span>
							<i class="fa fa-file"></i>
					    </a>
				    </div>
			</section>
		</header>
		<section class="section-2">
			<article class="article-1">
				<!-- Elemento canvas para renderizar o gráfico de Barra-->
				<canvas id="myChart" width="400" height="400"></canvas>
			</article>
			<article class="article-2">
				<!-- Elemento canvas para renderizar o gráfico de Pizza-->
				<canvas id="myChartPie" width="400" height="400"></canvas>
			</article>
			<div style="display:none;">
				<?php
					$Relatoriocontroller = new Relatoriocontroller();
					$Relatoriocontroller->listar_paciente();
					$Relatoriocontroller->listar_cirurgiao();
					$Relatoriocontroller->listar_Ambulatoriais();
					$Relatoriocontroller->listar_Complexas();
				?>
			</div>
		</section>	
		<?php
			// Rodape Geral
			$pageController->footerpage();
		?>
	</main>
</body>