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
                    <h1 style="color:#104999">Editar gasto calórico
                    </h1>
                </div>

                <div class="container">
                    <form class="form">
                        <div class="form-group">
                            <label for="data">Data:</label>
                            <input type="date" class="form-control" id="data" placeholder="19/03/2018" name="data">
                        </div>
                        <div class="form-group">
                            <label for="sel1">Exercício:</label>
                            <select class="form-control" id="sel1">
                                <option>Corrida</option>
                                <option>Supino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tempo">Gasto calórico:</label>
                            <input type="number" class="form-control" id="tempo" name="tempo">
                        </div>
                        <button>Salvar gasto calórico</button> <a href='?mod=rtreinos&sub=historico_gasto'><button>Cancelar</button> </a>
                    </form>
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