<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?= JQUERY_PATH ?>" charset="utf-8"></script>
        <script src="<?= POPPER_PATH ?>" charset="utf-8"></script>
        <script src="<?= THEME_JS_PATH ?>" charset="utf-8"></script>
        <script src="<?= ANIMATIONS_PATH ?>" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="hover.css">
        <link rel="stylesheet" href="<?= THEME_CSS_PATH ?>">
    </head>
    <body>
        <?php
        $vertical_menu_links = [
            "Nome do link" => "link_de_redirecionamento.html"
        ];
        include(VIEWS_PATH . '/module_base.php');
        ?>
        <section onclick="closeNav()">
            <div class="container" role="main" style="height: 100%;width: 100%; padding:5%">

                <div class="page-header">
                    <h1 style="color:#104999">Programa de Treinamentos Prontos
                    </h1>
                </div>
                <?php 
                    include "./controllers/controle_verificar_existencia.php";  
                ?>
                <?php include "./controllers/controle_mostrar_dados_programa_pronto.php"; ?>
                <br><b>Data de criação:</b> <?php echo $resultado[0]["PTP_DATA_CRIACAO"]; ?>
                <br><b>Dificuldade:</b><?php echo $resultado[0]['PTP_DIFICULDADE']; ?></span>
                <br><b>Duração:</b><?php echo $resultado[0]['PTP_DURACAO']; ?></span>         
                <br><b>Descrição:</b> <?php echo $resultado[0]['PTP_DESCRICAO']; ?>
                <br>           
                <form method="POST" action="controle_vincular_desvincular_programa.php">
                    <input type="hidden" value="<?php echo $resultado[0]["PTP_CODIGO"]; ?>" name="PTP_CODIGO">
                    <input type="submit" id="button" value=<?php
                    //$verificar = new controle_verificar_existencia();
                    //$verificar->selecionar();
                    if (selecionar($resultado[0]["PTP_CODIGO"], $resultado[0]["FK_USUARIOS_USU_CODIGO"]) > 0) {
                        echo "Desvincular";
                    } else {
                        echo "Vincular";
                    }
                    ?>>       

                </form> <a href='?mod=rtreinos&sub=visualizar_programa_pronto'> <button type='submit' name="voltar"> Voltar </button> </a>
                    
                    <?php 
                    session_start(); 
                    if(isset($_SESSION["VINCULO"])){
                        if($_SESSION["VINCULO"]==FALSE){
                            ?>
                            
                            <button onclick="myFunction()">Show Snackbar</button>

                            <div id="snackbar">O programa foi desvinculado com sucesso!</div>
                                    
                            <script>
                            function myFunction() {
                                var x = document.getElementById("snackbar");
                                x.className = "show";
                                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                            }
                            </script>
                            <?php
                        }
                        else{

                        } 
                    } ?>            
            </div>
        </section>  
        <footer class="footer bg-dark text-white">
            <div class="container center ">
                <div class="row justify-content-center ">
                    <span>© 2018 - Todos os Direitos Reservados - Mais Saúde São João</span>
                    <br>
                    <span>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo - Campus São João da Boa Vista</a></span>
                </div>
            </div>
        </footer>
    </body>
</html>