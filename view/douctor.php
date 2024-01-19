<style>
    .mySlides {display:none}
    .w3-left, .w3-right, .w3-badge {cursor:pointer}
    .w3-badge {height:13px;width:13px;padding:0}
</style>
<body id="Douctor">
    <aside class="aside">
        <?php
            $pageController = new PageController();
            $pageController->menupage();
        ?>
	</aside>
	<main class="main">
		<header class="header">
            <a href="http://localhost/pw2/"><h3>Douctores do Hospital Geral</h3></a>
        </header>
        
			<section class="section">
                <div class="w3-content w3-display-container" style="max-width:800px">
                    <?php 
                        $cirurgiaocontroller = new cirurgiaocontroller();
                        $cirurgiaocontroller->listar_douctor();
                    ?>
                    <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                        <div class="w3-left w3-hover-text-khaki w3-text-black" onclick="plusDivs(-1)"><i class="fa fa-arrow-left"></i></div>
                        <div class="w3-right w3-hover-text-khaki w3-text-black" onclick="plusDivs(1)"><i class="fa fa-arrow-right"></i></div>                      
                    </div>
                </div>
            </section>
        <?php
			// Rodape Geral
			$pageController->footerpage();
		?>
    </main>
    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
        showDivs(slideIndex += n);
        }

        function currentDiv(n) {
        showDivs(slideIndex = n);
        }

        function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-white", "");
        }
        x[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " w3-white";
        }
</script>
</body>
</html>