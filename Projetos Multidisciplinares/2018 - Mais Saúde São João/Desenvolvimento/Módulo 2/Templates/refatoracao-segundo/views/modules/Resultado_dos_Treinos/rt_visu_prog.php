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
                    <h1 style="color:#104999">Programas de treinamentos
                    </h1>
                </div>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Exercício</th>
                                <th>Tempo/Repetição</th>
                                <th>Peso</th>
                                <th>Data de atualização</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Supino</td>
                                <td>3</td>
                                <td>90Kg</td>
                                <td>08/04/2018</td>
                                <td><a href="rt_hist_ex_prog.php"><button type="button" class="btn btn-danger">Visualizar</button></a></td>
                                <td><a href="rt.php"><button type="button" class="btn btn-primary">Atualizar</button></a></td>
                            </tr>
                            <tr>
                                <td>Rosca direta</td>
                                <td>3</td>
                                <td>92Kg</td>
                                <td>22/04/2018</td>
                                <td><a href="ResultadoTreinamentoDesempenhoPrograma.php"> <button type="button" class="btn btn-danger">Visualizar</button></a></td>
                                <td><a href="ResultadoTreinamentoEditar.php"><button type="button" class="btn btn-primary">Atualizar</button></a></td>
                            </tr>
                            <tr>
                                <td>Remada alta</td>
                                <td>12</td>
                                <td>90Kg</td>
                                <td>23/04/2018</td>
                                <td><a href="ResultadoTreinamentoDesempenhoPrograma.php"><button type="button" class="btn btn-danger">Visualizar</button></a></td>
                                <td><a href="ResultadoTreinamentoEditar.php"><button type="button" class="btn btn-primary">Atualizar</button></a></td>
                            </tr>
                            </a>
                            <tr>
                                <td>Natação - 200m</td>
                                <td>13 minutos e 32 segundos</td>
                                <td>89Kg</td>
                                <td>08/04/2018</td>
                                <td><a href="ResultadoTreinamentoDesempenhoPrograma.php"><button type="button" class="btn btn-danger">Visualizar</button></a></td>
                                <td><a href="ResultadoTreinamentoEditar.php"><button type="button" class="btn btn-primary">Atualizar</button></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href='ResultadoTreinamentoHistoricoProgramas.php'> <button type='submit' name="voltar"> Voltar </button> </a>
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