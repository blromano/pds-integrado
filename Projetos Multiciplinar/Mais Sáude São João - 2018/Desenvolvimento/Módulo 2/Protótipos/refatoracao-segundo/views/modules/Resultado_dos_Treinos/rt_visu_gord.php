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
        <script>google.charts.load('current', {packages: ['corechart', 'line']});
            google.charts.setOnLoadCallback(drawBasic);

            function drawBasic() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Data');
                data.addColumn('number', 'Minutos');

                data.addRows([
                    ['03/04/2018', 10], ['05/04/2018', 9],
                    ['08/04/2018', 13], ['12/04/2018', 9],
                    ['18/04/2018', 14]
                ]);

                var options = {
                    curveType: 'function',
                    hAxis: {
                        title: 'Data'
                    },
                    vAxis: {
                        title: 'Tempo (em minutos)'
                    }
                };


                var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

                chart.draw(data, options);
            }
        </script>
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
                    <h1 style="color:#104999">Taxa de gordura
                    </h1>
                </div>
                <form class="form">
                    <div class="form-group">
                        <label for="dataini">Data de início:</label>
                        <input type="date" class="form-control" id="dataini" placeholder="dd/mm/aaaa" name="data">
                    </div>
                    <div class="form-group">
                        <label for="datafim">Data de término:</label>
                        <input type="date" class="form-control" id="datafim" placeholder="dd/mm/aaaa" name="data">
                    </div> 
                </form>
                <a href="ResultadoTreinamentoGorduraGrafico.php"><button>Visualizar Gráfico</button></a>
                <a href="ResultadoTreinamentoGorduraTabela.php"><button>Visualizar Tabela</button></a>
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