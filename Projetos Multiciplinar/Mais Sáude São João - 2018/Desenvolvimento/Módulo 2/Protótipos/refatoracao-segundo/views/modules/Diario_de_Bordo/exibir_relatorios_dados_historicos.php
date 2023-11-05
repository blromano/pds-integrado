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
        <link href="views/modules/Diario_de_Bordo/mod08.css" rel="stylesheet" type="text/css"/>
        <style>
            html, body {height:100%;}

            .geral {

                min-height:100%;
                position:relative;
                width:100%;
            }

            .footer {
                bottom:0;
                width:100%;
            }
        </style>
    </head>
    <body>
        <?php
        $vertical_menu_links = [
            "Nome do link" => "link_de_redirecionamento.html"
        ];
        include(VIEWS_PATH . '/module_base.php');
        ?>  
        <div class="container-fluid">
            <div class="row">
                <div class="container text-center p-5">
                    <div class="atualizar_diario">
                        <div class="page-header esquerda">
                            <h1 class="total_refeicao">Relatório de dados históricos</h1>
                            <hr>
                        </div>
                        <a href="?mod=dbordo&sub=exibir_historico_consumo_calorias_nutrientes"><button class="btn btn-primary" resposive>Exibir Histórico de Consumo de Calorias e Nutrientes</button></a><br>
                        <br> <a href="?mod=dbordo&sub=exibir_historico_peso"><button class="btn btn-primary" responsive>Exibir Histórico de Peso</button></a> <br>
                        <hr>
                        
                        
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
        <script>
            var nav1aberta = true;
            var nav2aberta = true;
            function openNav() {
                if (nav2aberta === false) {
                    closeNav2();

                }
                document.getElementById("mySidenav").style.width = "250px";
                // document.getElementById("main").style.marginLeft = "250px";
                nav1aberta = false;
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }
            function openNav2() {
                if (nav1aberta === false) {
                    closeNav();
                }
                document.getElementById("mySidenav2").style.width = "250px";
                //document.getElementById("main").style.marginLeft = "250px";
                document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
                nav2aberta = false;

            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                //document.getElementById("main").style.marginLeft= "0";
                document.body.style.backgroundColor = "white";
                nav1aberta = true;
            }
            function closeNav2() {
                document.getElementById("mySidenav2").style.width = "0";
                // document.getElementById("main").style.marginLeft= "0";
                document.body.style.backgroundColor = "white";
                nav2aberta = true;
            }
            function closeNavs() {
                if (nav1aberta == false) {
                    closeNav();
                }
                if (nav2aberta == false) {
                    closeNav2();
                }
            }
        </script>
        <!-- Modal 2-->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja que deseja excluir o alimento?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="#"><button type="button" class="btn btn-danger" data-dismiss="modal">Sim, desejo excluir!</button>

                        </a> 
                        <button type="button" class="btn btn-success" data-dismiss="modal">Não,quero cancelar!</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
