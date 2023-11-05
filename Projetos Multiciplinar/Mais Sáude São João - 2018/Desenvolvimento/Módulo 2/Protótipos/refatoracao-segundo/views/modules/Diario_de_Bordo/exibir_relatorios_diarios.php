<!DOCTYPE html>
<html lang="pt-Br">
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
        <link rel="stylesheet" href="<?= mod08 ?>">
    </head>
    <body>
        <?php
        $vertical_menu_links = [
            "Nome do link" => "link_de_redirecionamento.html"
        ];
        include(VIEWS_PATH . '/module_base.php');
        ?>
        <br>
        
        <div class="container-fluid">
            <div class="row">
                <div class="container text-center p-5">
                    <div class="atualizar_diario">
                        <div class="page-header esquerda">
                            <h1 class="total_refeicao">Relatórios Diarios</h1>
                            <hr>
                        </div>
                        <li><a href="?mod=dbordo&sub=exibir_relatorio_nutrientes">Relatório Diario de Nutrientes</a></li><br>
                        <li><a href="?mod=dbordo&sub=exibir_relatorio_calorias_consumidas_restantes">Relatorio de Calorias Consumidas e Calorias Restantes</a></li><br>
                        <li><a href="?mod=dbordo&sub=exibir_relatorio_calorias_consumidas_por_tipo_refeicao">Relatório de Calorias por Refeição</a></li><br>
                        <hr>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        

        <div class='bg-darker py-2 text-center text-light container-fluid text-sm'>
            <div class="row">
                <div class="container mx-auto">
                    <small>© 2018 - Todos os Direitos Reservados - Mais Saúde São João</small>
                    <br>
                    <small>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo - Campus São João da Boa Vista</a></small>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </body>
</html>
