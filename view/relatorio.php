<style>
	.article-1, .article-2{width:70vw;}
</style>
<body id="Relatorio">
	<aside class="aside">
		<?php 
			$pageController = new PageController();
			$pageController->menupage();
		?>
	</aside>
	<main class="main w3-theme-l4">
		<header class="header">
			<a href="http://localhost/pw2/"><h3>Relatorio do Hospital Geral</h3></a>
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
		</section>	
		<?php
			// Rodape Geral
            $pageController->footerpage();
		?>
	</main>
</body>
</html>