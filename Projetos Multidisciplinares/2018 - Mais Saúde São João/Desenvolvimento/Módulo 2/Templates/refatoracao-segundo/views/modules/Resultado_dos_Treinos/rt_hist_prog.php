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
    		session_start();
    	?>
        <?php
        $vertical_menu_links = [
            "Nome do link" => "link_de_redirecionamento.html"
        ];
        include(VIEWS_PATH . '/module_base.php');
        ?>
        <section onclick="closeNav()">
            <div class="container" role="main" style="height: 100%;width: 100%; padding:5%">

                <div class="page-header">
                    <h1 style="color:#104999">Histórico de programas de treinamento
                    </h1>
                </div>
                <div class="container">
                    <table class="table"><tr><th>Data criação</th>
                    <th>Descrição</th>
                    <th>Dificuldade</th>
                    <th>Duração</th>
                    <th></th></tr>
                    <?php
                     include "./controllers/controle_usuarios_treinamentos_prontos.php";

                            for($i=0;$i<count($resultado);$i++){
                                echo "<tr>";
                                    echo "<td>".$resultado[$i]["PTP_DATA_CRIACAO"]."</td>";
                                    echo "<td>".$resultado[$i]["PTP_DESCRICAO"]."</td>";
                                    echo "<td>".$resultado[$i]["PTP_DIFICULDADE"]."</td>";
                                    echo "<td>".$resultado[$i]["PTP_DURACAO"]."</td>";
                                    ?>
                                    <td>
                                        <form action="visualizar_programa.php" method="post">
                                            <input type="hidden" value=<?php 
                                                $resultado[$i]["PTP_CODIGO"]
                                            ?>>
                                            <input class="btn btn-info" type="submit" value="Visualizar">
                                        </form>
                                    </td>
                                    <?php
                                echo "</tr>";
                            }
                        ?>
                </div>
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