<style>
  <?php
  // Menu Lateral estilo
  require_once path."/pw2/view/design/menuLateral.css";
  ?>
</style>
<body id="menu-lateral">
    <section class="user-admin">
        <?php 
            $pageController = new PageController();
            $pageController->menuimg();
        ?>
        <span class="txt-user">
            Israel Morais, Admin
        </span>
    </section> 
    <hr>
    <ul>
        <!-- items de seleçao no menu -->
            <a class="active" href="http://localhost/pw2/"><li><i class="fa fa-dashboard"></i> Dashboard</li></a>
            <a href="PageDouctor"><li><i class="fa fa-user"></i> Douctor</li></a>
            <a href="PageCirurgiao"><li><i class="fa fa-stethoscope"></i> Cirurgião</li></a>
            <a href="PagePaciente"><li><i class="fa fa-group"></i> Paciente</li></a>
            <a href="PageConsultas"><li><i class="fa fa-file"></i> Consulta</li></a>
            <a href="PageAgendamento"><li><i class="fa fa-calendar"></i> Agendamento</li></a>
            <a href="PageRelatorio"><li><i class="fa fa-sitemap"></i> Relatorio</li></a>
    </ul>
    <a href="#" class="sair"><i class="fa fa-sign-out"></i> Log Out</a>
    
    <script type="text/javascript" src="/pw2/view/animation/event.js"></script>
</body>
</html>