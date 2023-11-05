<!DOCTYPE html> 
<?php
include (CONTROLLERS_PATH . 'modules/Diario_de_Bordo/select_alimentos.php');
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
        <script>
            function mostrar(elemento) {
                var display = document.getElementById(elemento).style.display;
                if (display == "none") {
                    document.getElementById(elemento).style.display = 'block';
                } else {
                    document.getElementById(elemento).style.display = 'none';
                }
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
        <div class="geral">
            <div class="container-fluid">
                <div class="row">
                    <div class="container text-center p-5">
                        <div class="atualizar_diario">
                            <div class="page-header esquerda">
                                <h1 class="total_refeicao">Lista de Alimentos Favoritos</h1>
                                <hr>
                            </div>

                            <div class="form-group esquerda">
                                <table class="table table-condensed  table-striped table-bordered">
                                    <?php
                                    $contador_fav = 0;
                                    foreach ($alimentos_favoritos as $row) {
                                        $contador_fav++;
                                        if ($contador_fav <= 1) {
                                            ?>
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nome do Alimento</th>
                                                    <th scope="col">Favorito</th>
                                                    <th scope="col">Mais Informações </th>
                                                </tr>
                                            </thead>
                                        <?php } ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo $contador_fav; ?></th>
                                                <td> <a href="#"><span class="spanvermelho">X</span></a><?php echo $row["ALI_NOME"]; ?></td>
                                                <td>
                                                    <img src="<?= $_ROOT_PATH ?>/assets/images/estrela (mouse).png" alt=""/>
                                                </td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#myModal4">
                                                        <img src="<?= $_ROOT_PATH ?>/assets/images/icone mais novo.png" alt=""/>
                                                    </a>
                                                </td>
                                            </tr>

                                            <?php
                                        }

                                        if ($contador_fav < 1) {
                                            ?>
                                        <h5 class="spanvermelho">NÃO EXISTEM ALIMENTOS FAVORITOS! ADICONE UM AGORA CLICANDO NO BOTÃO ABAIXO:</h5>
                                    <?php } ?>


                                    </tbody>
                                </table>
                                <hr>

                            </div>
                            <button onclick="mostrar('tabela')" class="btn btn-primary centro">Adicionar Alimentos Favoritos</button>

                            <hr>
                            <div class="table-responsive">
                                <form  method="post" id="tabela" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="procurar_alimento" placeholder="Procurar Alimento Pré-Cadastrado." required>
                                        <input type="submit" class="btn btn-primary botao" name="buscar" value="Buscar">
                                    </div>
                                    <hr>
                                    <div class="page-header esquerda">
                                        <h1 class="total_refeicao"> Alimentos Pré Cadastrados</h1>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-condensed  table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nome do Alimento</th>
                                                    <th scope="col"> Adionar aos favoritos</th>
                                                    <th scope="col">Mais Informações </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <img src="" alt=""/>
                                            <?php
                                            $contador = 1;
                                            foreach ($alimentos as $row) {
                                                $alimento_codigo = $row["ALI_CODIGO"];
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $contador; ?></th>
                                                    <td><?php echo$row["ALI_NOME"]; ?></td>
                                                    <td> 
                                                        <a href="<?= $_ROOT_PATH ?>controllers/modules/Diario_de_Bordo/inserir_alimentos_favoritos.php?id='<?php echo $alimento_codigo; ?>'">
                                                            <img src="<?= $_ROOT_PATH ?>/assets/images/estrela.png" 
                                                                 onMouseOver="this.src = '<?= $_ROOT_PATH ?>/assets/images/estrela (mouse).png'"
                                                                 onMouseOut="this.src = '<?= $_ROOT_PATH ?>/assets/images/estrela.png'"
                                                                 >
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a id="detalhes" href="#" onclick="passarID('<?php echo $alimento_codigo; ?>')">
                                                            <img src="<?= $_ROOT_PATH ?>/assets/images/icone mais novo.png" alt=""/>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $contador++;
                                            }
                                            ?>
                                            <tr>
                                                <th scope="row" colspan="4"><a href="add_novo_alimento.php"> Novo Alimento Favorito </a></th>
                                            </tr>

                                            </tbody>
                                        </table>


                                        <button onclick="mostrar('tabela')" class="btn btn-primary">Recolher</button>

                                    </div>
                                </form>
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
        <!-- Modal 2-->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja que deseja excluir o alimento?</h4>
                    </div>
                    <div style="font-family: Verdana"class="modal-footer">
                        <a href="#"><button type="button" class="btn btn-danger" data-dismiss="modal">Sim, desejo excluir!</button>

                        </a> 
                        <button type="button" class="btn btn-success" data-dismiss="modal">Não, quero cancelar!</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 1-->
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja que deseja enviar a refeição?</h4>
                    </div>
                    <div style="font-family: Verdana"class="modal-footer">
                        <a href="gerir_diario_de_bordo.php"><button type="button" class="btn btn-success">Sim, desejo enviar!</button>

                        </a> 
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não, quero cancelar!</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 3 Alimento Favorito Adicionado com Sucesso-->
        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja que deseja acionar o alimento aos favoritos?</h4>
                    </div>
                    <div style="font-family: Verdana"class="modal-footer">
                        <input type="hidden" id="urlExclusao" /> 
                        <a href="#"><button type="button" class="btn btn-sucess" data-dismiss="modal" onclick="excluirAlimento()">Sim, desejo adicionar!</button>

                        </a> 
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não,quero cancelar!</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 4 Mais Informações Sobre o Alimento-->
        <div id="dialog" style="display: none">
            <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="container-fluid">
                            <br><h4>Informações do alimento: </h4>
                            <hr>
                            <br><input id="nome_alimento" name="nome_alimento" type="text"> 
                            <br><p>Calorias: 10 kcal</p>
                            <br><p>Gorduras: Nenhuma</p>
                        </div>
                        <div style="font-family: Verdana"class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 5 Busca Não Encontrou Resultados-->
        <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="container-fluid">
                        <br><h4>O alimento pesquisado não foi encontrado!</h4>
                    </div>
                    <div style="font-family: Verdana"class="modal-footer">
                        <button href="?mod=dbordo&sub=gerir_diario_de_bordo" type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 6 Busca Encontrou Resultados-->
        <?php
        if (isset($_POST["procurar_alimento"]) && ($_POST["procurar_alimento"] != "")) {
            foreach ($alimento_busca as $row) {
                $contador_busca = 1;
                $alimento_codigo_buscar = $row["ALI_CODIGO"];
                ?>
                <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="container-fluid">
                                <br><h4>O alimento pesquisado foi encontrado!</h4>
                                <table class="table table-condensed  table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome do Alimento</th>
                                            <th scope="col"> Adionar aos favoritos</th>
                                            <th scope="col">Mais Informações </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $contador_busca; ?></th>
                                            <td><?php echo$row["ALI_NOME"]; ?></td>
                                            <td> 
                                                <a href="<?= $_ROOT_PATH ?>controllers/modules/Diario_de_Bordo/inserir_alimentos_favoritos.php?id='<?php echo $alimento_codigo_buscar; ?>'">
                                                    <img src="<?= $_ROOT_PATH ?>/assets/images/estrela.png" 
                                                         onMouseOver="this.src = '<?= $_ROOT_PATH ?>/assets/images/estrela (mouse).png'"
                                                         onMouseOut="this.src = '<?= $_ROOT_PATH ?>/assets/images/estrela.png'"
                                                         >
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img src="<?= $_ROOT_PATH ?>/assets/images/icone mais novo.png" alt=""/>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div style="font-family: Verdana"class="modal-footer">
                                <button href="?mod=dbordo&sub=gerir_diario_de_bordo" type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $contador_busca++;
                break;
            }
        }
        ?>
        <script>
            function passarID(alimento_codigo) {
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "controllers/modules/Diario_de_Bordo/vizualizar_detalhes_alimento_favorito.php?idaddr=" + alimento_codigo,
                    success: function (data) {
                        for (var i in data) { //vai passar por todos os objetos dentro do array
                            nome_alimento = data[i]["nome_alimento"];
                            caloria_alimento = data[i]["caloria_alimento"];
                            carboidratos_alimento = data[i]["carboidratos_alimento"];
                            gordura_trans_alimento = data[i]["gordura_trans_alimento"];
                            gordura_saturada_alimento = data[i]["gordura_saturada_alimento"];
                            fibras_alimento = data[i]["fibras_alimento"];
                            sodio_alimento = data[i]["sodio_alimento"];
                            proteinas_alimento = data[i]["proteinas_alimento"];
                            porcao_alimento = data[i]["porcao_alimento"];
                            gordura_total_alimento = data[i]["gordura_total_alimento"];
                            //document.getElementById('nome_alimento').value = nome_alimento;
                            $("nome_alimento").val(nome_alimento);
                            
                            $("#dialog").dialog("open");
                        }

                    }
                });

            }

        </script>
    </body> 
</html>
