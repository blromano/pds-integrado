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
                    <h1 style="color:#104999">Desempenho por exercício
                    </h1>
                </div>
                <form class="form">
                    <div class="form-group">
                        <label for="sel1">Exercício:</label>
                        <select class="form-control" id="sel1">
                            <option>Supino</option>
                        </select>
                    </div>
                </form>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Data de atualização</th>
                                <th>Desempenho (Peso/Tempo)</th>
                                <th></th>
                                <!--                            Desempenho-->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>03/04/2018</td>
                                <td>40kg</td>
                                <td><a href="#" data-toggle="modal" data-target="#myModal2"><button type="button" class="btn btn-danger">Excluir</button></a></td>
                            </tr>
                            <tr>
                                <td>05/04/2018</td>
                                <td>50Kg</td>
                                <td><a href="#" data-toggle="modal" data-target="#myModal2"><button type="button" class="btn btn-danger">Excluir</button></a></td>
                            </tr>
                            <tr>
                                <td>07/04/2018</td>
                                <td>80Kg</td>
                                <td><a href="#" data-toggle="modal" data-target="#myModal2"><button type="button" class="btn btn-danger">Excluir</button></a></td>
                            </tr>
                            <tr>
                                <td>08/04/2018</td>
                                <td>90Kg</td>
                                <td><a href="#" data-toggle="modal" data-target="#myModal2"><button type="button" class="btn btn-danger">Excluir</button></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href='rt_visu_ficha.php'> <button type='submit' name="voltar"> Voltar </button> </a>
            </div>
            <!--modal de exclusão-->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja que deseja excluir o seguinte desempenho?<br>
                                <table>
                                    <tr>
                                        <th>Data de atualização</th>
                                        <th>Desempenho (Peso/Tempo)</th>
                                    </tr>
                                    <tr>
                                        <td>03/04/2018</td>
                                        <td>40kg</td>
                                    </tr>
                                </table>
                            </h4>
                        </div>
                        <div style="font-family: Verdana" class="modal-footer">
                            <a href="index.php"><button type="button" class="btn btn-danger">Sim, desejo excluir!</button>

                            </a> 
                            <button type="button" class="btn btn-success" data-dismiss="modal">Não,quero cancelar!</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--fim do modal de exclusão-->
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