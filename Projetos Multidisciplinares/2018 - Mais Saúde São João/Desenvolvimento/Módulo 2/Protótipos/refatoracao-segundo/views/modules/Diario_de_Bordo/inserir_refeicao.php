<!DOCTYPE html>
<?php

$txt = $_GET["txt"];

include_once 'controllers/modules/Diario_de_Bordo/vizualizar_refeicao_input.php';
include_once 'controllers/modules/Diario_de_Bordo/vizualizar_refeicao_tabela.php';
?>
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
        <link rel="stylesheet" type="text/css" href="<?= $_ROOT_PATH ?>views/modules/Diario_de_Bordo/mod08.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="navbar-collapse w-100 ">

            </div>
            <div class="mx-auto order-0 navbar-collapse w-100 col-md-4">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <span><a class="nav-link nav-item active border-bottom border-danger">Nutrição - Inserir Refeição</a></span>
                    </li>

                </ul>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://openclipart.org/image/2400px/svg_to_png/211821/matt-icons_preferences-desktop-personal.png" style="width: 40px">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item" href="#">perfil</a>
                            <div class="dropdown-divider"></div>
                            <a   class="dropdown-item btn-danger"  href="#">Sair</a>

                        </div>
                    </li>

                </ul>

            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="container text-center p-5">
                    <div class="atualizar_diario">
                        <div class="page-header esquerda">
                            <h1 class="total_refeicao">Atualizar <?php echo $txt; ?>
                                <?php
                                date_default_timezone_set('America/Sao_Paulo');
                                $data = date('Y-m-d');
                                $hora = date('H:i');
                                echo "<br>  Hora: " . $hora . '<br />';
                                ?>
                            </h1>
                            <hr>
                        </div>
                        <div class="form-group esquerda">
                            <form action="?mod=dbordo&sub=inserir_alimento_cardapio" method="post">

                                <input type="hidden" value="" id="tcalorias" name="tcalorias">
                                <input type="hidden" value="" id="idAlimento" name="idAlimento">
                                <input type="hidden" value="<?= $txt ?>" id="txt" name="txt">
                                <input type="hidden" value="<?= $hora ?>" id="hora" name="horaCardapio">
                                <input type="hidden" value="<?= $data ?>" id="dataCardapio" name="dataCardapio">
                                <select name="alimentos" id="alimentos" class="form-control botao" required>
                                    <option value="" selected>-- Selecione Alimento --</option>
                                    <?php
                                    foreach ($alimentos as $row) {
                                        ?>
                                        <option value="<?php echo $row['ALI_NOME'] ?>" idAlimento="<?php echo $row['ALI_CODIGO'] ?>" idCaloria="<?php echo $row['ALI_CALORIAS'] ?>"><?php echo $row['ALI_NOME'] . " (" . $row['ALI_CALORIAS'] . " kcal)" ?></option> 
                                    <?php } ?>
                                    <option value="outro">Adicionar Novo Alimento</option>
                                </select>

                                <select name="porcao" id="porcao"  class="form-control botao">
                                    <option value="0" selected>-- Selecione Porção Inteira --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <select name="porcao2" id="porcao2" class="form-control botao">
                                    <option value="" selected>-- Selecione Porção Fracionada --</option>
                                    <option value=".25">1/4</option>
                                    <option value=".5">1/2</option>
                                    <option value=".75">3/4</option>
                                </select>

                                <button type="submit" class="btn btn-primary botao" onclick="inserirDadosTabela()">Enviar</button>
                            </form>
                            <hr>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-condensed  table-striped table-bordered" id="tabelaRefeicoes">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome do Alimento</th>
                                        <th scope="col">Total de Porções</th>
                                        <th scope="col">Total de Calorias </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $TotalRefeicao = 0;
                                    $op = $txt;
                                    $c = new Controller();
                                    $c->interpreta($op);

                                    foreach ($alimentos_diarios_bordo as $row) {
                                        if ($row['CRIACAO_DATA'] == $data) {
                                            $TotalRefeicao += $row['ALI_DIB_TOTAL_CALORICO'];
                                            ?>
                                            <tr>
                                                <th><?php echo $row['CODIGO_ALIMENTO'];?></th>
                                                <td><a href='' onclick="passarLinkExclusao('<?php echo $row['CODIGO_DBA'];?>','<?php echo $txt;?>')" data-toggle='modal' data-target='#myModal2 ' ><span>X </span></a><?php echo $row['NOME_ALIMENTO'];?></td>
                                                <td><?php echo ($row['ALI_DIB_PORCAO_INTEIRA'] + $row['ALI_DIB_PORCAO_FRACIONADA']);?></td>
                                                <td><?php echo $row['ALI_DIB_TOTAL_CALORICO'];?></td>
                                            </tr>
                                          <?php    
                                        }
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr class="total_refeicao">
                                        <th scope="row">Total por Refeição</th>
                                        <td  colspan="2"> </td>
                                        <th><?php echo $TotalRefeicao;?></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div>
                                <a href="#" data-toggle="modal" data-target="#myModal1"><button type="submit" class="btn btn-primary">Confirmar</button></a>
                            </div>
                        </div>  

                    </div>
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
    <!-- Modal 2-->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja que deseja excluir o alimento?</h4>
                </div>
                <div style="font-family: Verdana"class="modal-footer">
                    <input type="hidden" id="urlExclusao" /> 
                    <a href="#"><button type="button" class="btn btn-danger" data-dismiss="modal" onclick="excluirAlimento()">Sim, desejo excluir!</button>

                    </a> 
                    <button type="button" class="btn btn-success" data-dismiss="modal">Não,quero cancelar!</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 1-->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja confirmar e voltar para a pagina inicial?</h4>
                </div>
                <div style="font-family: Verdana"class="modal-footer">
                    <a href="?mod=dbordo"><button type="button" class="btn btn-success">Sim!</button>

                    </a> 
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Não!</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var idAlimento = 0;
        var idCaloria = 0;
        function inserirDadosTabela()
        {
            var alimentos = $("#alimentos").val();
            var porcao = ($("#porcao").val() + $("#porcao2").val());
            var tcalorias = (porcao * idCaloria);
            document.getElementById("tcalorias").value = tcalorias;
        }
        $('#alimentos').change(function () {
            var valor = this.value;
            idAlimento = $(this).find(':selected').attr('idAlimento');
            console.log(valor, idAlimento);
            document.getElementById("idAlimento").value = idAlimento;
        });
        $('#alimentos').change(function () {
            var valor = this.value;
            idCaloria = $(this).find(':selected').attr('idCaloria');
            console.log(valor, idCaloria);
        });
        
        function passarLinkExclusao(link, txt)
        {
            var linkExc = '?mod=dbordo&sub=deletar_alimento_refeicao&id='+link+'&id2='+txt;
            document.getElementById("urlExclusao").value = linkExc;
        }
        function excluirAlimento()
        {
            var link = document.getElementById("urlExclusao").value;
            window.location = link;    
        
        }
    </script>  
</body>
</html>
