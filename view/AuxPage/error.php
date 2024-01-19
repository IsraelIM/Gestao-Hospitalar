<body id="Error">
<style>
    h1{
        font-variant:small-caps;
    }
    .uri{
        background:yellow;
        color:#666;
    }
</style>
    <center>
        <h1>Erro no endereço desejado</h1>
        <img src="/pw2/view/image/error.png" alt="error" srcset="">
        <br>
        <?php echo "<p class='uri w3-animate-zoom'>".path.$_SERVER["REQUEST_URI"]."</p";?>
    </center>
</body>
</html>