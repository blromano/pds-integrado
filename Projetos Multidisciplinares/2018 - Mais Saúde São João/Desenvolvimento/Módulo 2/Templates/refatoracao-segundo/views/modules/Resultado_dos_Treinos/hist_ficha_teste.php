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
        <link rel="stylesheet" type="text/css" href="<?=$_ROOT_PATH?>views/modules/Resultado_dos_Treinos/hover.css">
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
                    <h1 style="color:#104999">Histórico de fichas de treinamento
                    </h1>
                </div>
                <div class="container">
                       <table class='table table-responsive table-striped'>
                            <tr>
                                <th>Exercícios</th>
                                <th>Data de início</th>
                                <th>Data de término</th>
                                <th>Última Atualização</th>
                                <th></th>
                            </tr>
                    <?php
                     include "./controllers/controle_historico_ficha.php";
                    // include "./controllers/controle_exercicios_ficha.php"

                            for($i=0;$i<count($resultado);$i++){
                                echo "<tr>";
                                ?>
                                    <td>
                                        <div class="col col-lg-2">
                                            <a class="btn btn-dark" data-toggle="collapse" href="javascript:void(0)" data-target="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><h5><?php echo $resultado[$i]["FTR_NOME"];?></h5></a>
                                        </div>  
                                    </td>
                                    <?php
                                    echo "<td>".$resultado[$i]["FTR_DATA_INICIO"]."</td>";
                                    echo "<td>".$resultado[$i]["FTR_DATA_TERMINO"]."</td>";
                                    echo "<td>".$resultado[$i]["FTR_DATA_ATUALIZACAO"]."</td>";
                                echo "</tr>";
                                ?>
                                    <div class="collapse" id="multiCollapseExample1">
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <th> Exercício </th>
                                                <th> Tempo/Repetição </th>
                                                <th> Peso </th>
                                                <th> Data de atualização </th>
                                            </thead>
                                            <tbody>
                                                <td > Exercício legal </td>
                                                <td> 2 </td>
                                                <td> 10Kg </td>
                                                <td> 2018-09-11 </td>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php
                            }
                        ?>
                        </table>
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