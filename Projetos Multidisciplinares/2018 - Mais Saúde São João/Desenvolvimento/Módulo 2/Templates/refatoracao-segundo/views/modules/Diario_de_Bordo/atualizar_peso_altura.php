<!DOCTYPE html>
<?php
?>
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
        <link rel="stylesheet" type="text/css" href="<?= $_ROOT_PATH ?>views/modules/Diario_de_Bordo/mod08.css">
    </head>
    <body>
        <?php
        $vertical_menu_links = [
            "Nome do link" => "link_de_redirecionamento.html"
        ];
        include(VIEWS_PATH . '/module_base.php');
        ?>  
        <div class="geral">
            <div class="container-fluid">
                <div class="row">
                    <div class="container text-center p-5">
                        <div class="atualizar_diario">
                            <div style="width:100%">
                                <div class="page-header">
                                    <h1 class="total_refeicao  esquerda">Atualizações</h1>
                                    <hr>
                                    <form action="<?= $_ROOT_PATH ?>controllers/modules/Diario_de_Bordo/atualizar_inserir_peso_altura.php" method="post">
                                        <label for="peso">Informe o Peso Atual (em Kg):</label>
                                        <input  type="number" name="peso" step="00.001" min="0"  class="form-control-static" placeholder="Digite seu Peso" required>
                                        <br>
                                        <hr>
                                        <label for="altura">Informe a Altura Atual (em metros):</label>
                                        <input  type="number" name="altura" step="0.010" min="0" max="3" class="form-control-static" placeholder="Digite sua Altura" required>
                                        <br>
                                        <hr>
                                        <button type="Submit" class="btn btn-primary">Atualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
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
<?php
?>
