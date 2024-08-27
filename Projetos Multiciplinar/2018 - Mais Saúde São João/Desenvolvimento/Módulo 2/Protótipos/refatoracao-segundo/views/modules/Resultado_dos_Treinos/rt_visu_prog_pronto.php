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
                    <h1 style="color:#104999">Programas Prontos
                    </h1>
                </div>

                <div class="container">
                    <form>
                        <div class="form-group">
                            <label for="sel1">Pesquisar por:</label>
                            <select class="form-control" id="sel1">
                                <option>Criador</option>
                                <option>Data de criação</option>
                                <option>Exercícios</option>
                                <option>Dificuldade</option>
                                <option>Duração</option>
                            </select>

                            <div class="topnav">
                                <input type="text" placeholder="Insira sua pesquisa"> 
                                <button type='submit' name="pesquisa"> Pesquisar </button>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Criador</th>
                                        <th>Data de criação</th>
                                        <th>Exercícios</th>
                                        <th>Dificuldade</th>
                                        <th>Opção</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include "./controllers/modules/Resultado_dos_treinos/controle_treinamentos_prontos.php";

                                    for ($i = 0; $i < count($resultado); $i++) {
                                        echo "<tr>";
                                        echo "<td>" . $resultado[$i]["PTP_DATA_CRIACAO"] . "</td>";
                                        echo "<td>" . $resultado[$i]["PTP_DESCRICAO"] . "</td>";
                                        echo "<td>" . $resultado[$i]["PTP_DIFICULDADE"] . "</td>";
                                        echo "<td>" . $resultado[$i]["PTP_DURACAO"] . "</td>";
                                        ?>
                                    <td>
                                        <form  action="./controllers/modules/Resultado_dos_treinos/controle_vincular_desvincular_programa.php?ignore_router">
                                            <input type="hidden" value=<?php
                                            $resultado[$i]["PTP_CODIGO"]
                                            ?>>
                                            <input class="btn btn-info" type="submit" value=
                                            <?php
                                            include "./controllers/modules/Resultado_dos_treinos/controle_verificar_existencia.php";
                                            ?>> 
                                        </form>
                                        <!--Janela de pop up muito linda-->
                                        <?php
                                        if (isset($_SESSION["VINCULO"])) {
                                            if ($_SESSION["VINCULO"] == FALSE) {
                                                ?>

                                                <button onclick="myFunction()">Show Snackbar</button>

                                                <div id="snackbar">O programa foi desvinculado com sucesso!</div>

                                                <script>
                                                    function myFunction() {
                                                        var x = document.getElementById("snackbar");
                                                        x.className = "show";
                                                        setTimeout(function () {
                                                            x.className = x.className.replace("show", "");
                                                        }, 3000);
                                                    }
                                                </script>
                                                <?php
                                            } else {
                                                
                                            }
                                        }
                                        ?>
                                        <!--  Fim janela de pop up muito linda-->            
                                    </td>
                                    <?php
                                    echo "</tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
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