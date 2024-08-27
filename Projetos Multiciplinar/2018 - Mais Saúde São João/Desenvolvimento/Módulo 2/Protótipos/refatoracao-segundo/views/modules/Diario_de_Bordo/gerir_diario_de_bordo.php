<!DOCTYPE html> 
<?php
include (CONTROLLERS_PATH .'modules/Diario_de_Bordo/lista_diario_bordo_data.php');
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
    </head>
    <body>
        <?php
        $vertical_menu_links = [
            "Nome do link" => "link_de_redirecionamento.html"
        ];
        include(VIEWS_PATH . '/module_base.php');
        ?>  
        <div class="container-fluid geral">
            <div class="row">
                <div class="container text-center p-5">
                    <div>
                        <div style="width:100%">
                            <a href="?mod=dbordo&sub=calcular_peso_ideal_imc"><button class="btn btn-primary botao"> Calcular Peso Ideal e IMC</button></a>
                            <a href="?mod=dbordo&sub=atualizar_peso_altura"><button class="btn btn-primary botao"> Atualizar Peso e Altura</button></a>
                            <a href="?mod=dbordo&sub=gerir_alimentos_favoritos"><button class="btn btn-primary botao"> Visualizar Alimentos Favoritos</button></a>
                            <a href="#"><button class="btn btn-primary  botao"> Relatórios Diários</button></a>
                            <a href="?mod=dbordo&sub=exibir_relatorios_dados_historicos"><button class="btn btn-primary botao"> Relatórios de Dados Históricos</button></a>
                        </div>
                        <hr>
                        <div class="page-header esquerda">
                            <h1 class="total_refeicao">Atualizar Diário de Bordo</h1>
                        </div>
                        <div class="page-header">
                            <ul class="esquerda">
                                <li><a href="?mod=dbordo&sub=inserir_refeicao&txt=Café da Manhã">Café da Manhã</a></li>
                                <li><a href="?mod=dbordo&sub=inserir_refeicao&txt=Lance da Manhã">Lance da Manhã</a></li>
                                <li><a href="?mod=dbordo&sub=inserir_refeicao&txt=Almoço">Almoço</a></li>
                                <li><a href="?mod=dbordo&sub=inserir_refeicao&txt=Lanche da Tarde">Lanche da Tarde</a></li>
                                <li><a href="?mod=dbordo&sub=inserir_refeicao&txt=Café da Tarde">Café da Tarde</a></li>
                                <li><a href="?mod=dbordo&sub=inserir_refeicao&txt=Jantar">Jantar</a></li>
                                <li><a href="?mod=dbordo&sub=inserir_refeicao&txt=Lanche da Noite">Lanche da Noite</a></li>
                            </ul>
                        </div>
                        <hr>
                        <div class="page-header">
                            <form class="form" action="#" method="post">
                                <div class="form-group esquerda">
                                    <label for="email">Data do diário:</label>
                                    <?php
                                    date_default_timezone_set('America/Sao_Paulo');
                                    $data_dia_hoje = date('Y-m-d');

                                    echo "<input type='date' name='escolher_data' class='form-control' max='" . $data_dia_hoje . "' required>";
                                    ?>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Escolher data!</button>  
                                </div>  
                            </form>
                        </div>
                        <hr>
                        <br>
                        <?php
                        $contador = 0;
                        if (isset($_POST["escolher_data"]) && ($_POST["escolher_data"] != "")) {
                            foreach ($diarios_bordo as $row) {
                                ?>
                        <table class='table table-condensed  table-striped table-bordered'>
                            <thead>
                                <tr>
                                    <th scope='col'>#</th>
                                    <th scope='col'>Nome do Alimento</th>
                                    <th scope='col'>Porção</th>
                                    <th scope='col'>Total de Calorias </th>
                                </tr>
                            </thead>
                            <?php
                            foreach ($cafe_manha as $row){
                                $cont = 1;
                            ?>
                            <tr>
                                <th scope='row' colspan='4' class='nome_refeicao'>Café da Manhã</th>  
                            </tr>
                            <tbody>
                                <tr>
                                    <th scope='row'><?php echo $cont; ?></th>
                                    <td><a href='#' data-toggle='modal' data-target='#myModal2'></a><?php echo$row["ALI_NOME"];?></td>
                                    <td><?php echo$row["ALI_DIB_PORCAO_INTEIRA"]; echo"/"; echo$row["ALI_DIB_PORCAO_FRACIONADA"];?></td>
                                    <td><?php echo$row["ALI_CALORIAS"];?></td>
                                </tr>
                                <tr>
                                    <th scope='row' class='total_refeicao'>Total Café da Manhã</th>
                                    <td colspan='2'></td>
                                    <th class='total_refeicao'><?php echo$row["DIB_TOTAL_CAFE_MANHA"];?></th>
                                </tr>
                            </tbody>
                            <?php $cont++; } ?>
                            
                            <?php
                            foreach ($lanche_manha as $row){
                                $cont = 1;
                            ?>
                            <tr>
                                <th scope='row' colspan='4' class='nome_refeicao'>Lanche da Manhã</th>  
                            </tr>
                            <tbody>
                                <tr>
                                    <th scope='row'><?php echo $cont; ?></th>
                                    <td><a href='#' data-toggle='modal' data-target='#myModal2'></a><?php echo$row["ALI_NOME"];?></td>
                                    <td><?php echo$row["ALI_DIB_PORCAO_INTEIRA"]; echo"/"; echo$row["ALI_DIB_PORCAO_FRACIONADA"];?></td>
                                    <td><?php echo$row["ALI_CALORIAS"];?></td>
                                </tr>
                                <tr>
                                    <th scope='row' class='total_refeicao'>Total Lanche da Manhã</th>
                                    <td colspan='2'></td>
                                    <th class='total_refeicao'><?php echo$row["DIB_TOTAL_LANCHE_MANHA"];?></th>
                                </tr>
                            </tbody>
                            <?php $cont++; } ?>
                            
                            <?php
                            foreach ($almoco as $row){
                                $cont = 1;
                            ?>
                            <tr>
                                <th scope='row' colspan='4' class='nome_refeicao'>Almoço</th>  
                            </tr>
                            <tbody>
                                <tr>
                                    <th scope='row'><?php echo $cont; ?></th>
                                    <td><a href='#' data-toggle='modal' data-target='#myModal2'></a><?php echo$row["ALI_NOME"];?></td>
                                    <td><?php echo$row["ALI_DIB_PORCAO_INTEIRA"]; echo"/"; echo$row["ALI_DIB_PORCAO_FRACIONADA"];?></td>
                                    <td><?php echo$row["ALI_CALORIAS"];?></td>
                                </tr>
                                <tr>
                                    <th scope='row' class='total_refeicao'>Total Almoço</th>
                                    <td colspan='2'></td>
                                    <th class='total_refeicao'><?php echo$row["DIB_TOTAL_ALMOCO"];?></th>
                                </tr>
                            </tbody>
                            <?php $cont++; } ?>
                            
                            <?php
                            foreach ($lanche_tarde as $row){
                                $cont = 1;
                            ?>
                            <tr>
                                <th scope='row' colspan='4' class='nome_refeicao'>Lanche da Tarde</th>  
                            </tr>
                            <tbody>
                                <tr>
                                    <th scope='row'><?php echo $cont; ?></th>
                                    <td><a href='#' data-toggle='modal' data-target='#myModal2'></a><?php echo$row["ALI_NOME"];?></td>
                                    <td><?php echo$row["ALI_DIB_PORCAO_INTEIRA"]; echo"/"; echo$row["ALI_DIB_PORCAO_FRACIONADA"];?></td>
                                    <td><?php echo$row["ALI_CALORIAS"];?></td>
                                </tr>
                                <tr>
                                    <th scope='row' class='total_refeicao'>Total Lanche da Tarde</th>
                                    <td colspan='2'></td>
                                    <th class='total_refeicao'><?php echo$row["DIB_TOTAL_LANCHE_TARDE"];?></th>
                                </tr>
                            </tbody>
                            <?php $cont++; } ?>
                            
                            <?php
                            foreach ($cafe_tarde as $row){
                                $cont = 1;
                            ?>
                            <tr>
                                <th scope='row' colspan='4' class='nome_refeicao'>Café da Tarde</th>  
                            </tr>
                            <tbody>
                                <tr>
                                    <th scope='row'><?php echo $cont; ?></th>
                                    <td><a href='#' data-toggle='modal' data-target='#myModal2'></a><?php echo$row["ALI_NOME"];?></td>
                                    <td><?php echo$row["ALI_DIB_PORCAO_INTEIRA"]; echo"/"; echo$row["ALI_DIB_PORCAO_FRACIONADA"];?></td>
                                    <td><?php echo$row["ALI_CALORIAS"];?></td>
                                </tr>
                                <tr>
                                    <th scope='row' class='total_refeicao'>Total Café da Tarde</th>
                                    <td colspan='2'></td>
                                    <th class='total_refeicao'><?php echo$row["DIB_TOTAL_CAFE_TARDE"];?></th>
                                </tr>
                            </tbody>
                            <?php $cont++; } ?>
                            
                            <?php
                            foreach ($jantar as $row){
                                $cont = 1;
                            ?>
                            <tr>
                                <th scope='row' colspan='4' class='nome_refeicao'>Jantar</th>  
                            </tr>
                            <tbody>
                                <tr>
                                    <th scope='row'><?php echo $cont; ?></th>
                                    <td><a href='#' data-toggle='modal' data-target='#myModal2'></a><?php echo$row["ALI_NOME"];?></td>
                                    <td><?php echo$row["ALI_DIB_PORCAO_INTEIRA"]; echo"/"; echo$row["ALI_DIB_PORCAO_FRACIONADA"];?></td>
                                    <td><?php echo$row["ALI_CALORIAS"];?></td>
                                </tr>
                                <tr>
                                    <th scope='row' class='total_refeicao'>Total Jantar</th>
                                    <td colspan='2'></td>
                                    <th class='total_refeicao'><?php echo$row["DIB_TOTAL_JANTAR"];?></th>
                                </tr>
                            </tbody>
                            <?php $cont++; } ?>
                            
                            <?php
                            foreach ($lanche_noite as $row){
                                $cont = 1;
                            ?>
                            <tr>
                                <th scope='row' colspan='4' class='nome_refeicao'>Lanche da Noite</th>  
                            </tr>
                            <tbody>
                                <tr>
                                    <th scope='row'><?php echo $cont; ?></th>
                                    <td><a href='#' data-toggle='modal' data-target='#myModal2'></a><?php echo$row["ALI_NOME"];?></td>
                                    <td><?php echo$row["ALI_DIB_PORCAO_INTEIRA"]; echo"/"; echo$row["ALI_DIB_PORCAO_FRACIONADA"];?></td>
                                    <td><?php echo$row["ALI_CALORIAS"];?></td>
                                </tr>
                                <tr>
                                    <th scope='row' class='total_refeicao'>Total Lanche da Noite</th>
                                    <td colspan='2'></td>
                                    <th class='total_refeicao'><?php echo$row["DIB_TOTAL_LANCHE_NOITE"];?></th>
                                </tr>
                            </tbody>
                            <?php $cont++; } ?>
                            <tr>
                                <th scope='row' class='danger'>Total Diário</th>
                                <td colspan='2'></td>
                            <th class='danger'><?php echo$row["DIB_TOTAL_DIA"]; ?></th>
                            </tr>
                            </tbody>
                        </table>
                        <?php
                        $contador++;
                        break;
                        }
                        if ($contador < 1) {
                        echo "<h4 class='spanvermelho'>NÃO EXISTEM REGISTROS DE DIÁRIOS DE BORDO PARA A DATA SELECIONADA.</h4>";
                        }
                        }
                        ?>
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
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="views/modules/Diario_de_Bordo/bootstrap.min.js"></script>
        <script src="views/modules/Diario_de_Bordo/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="views/modules/Diario_de_Bordo/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $('#datai').datepicker({
                format: 'mm/dd/yyyy',
                language: "pt-BR",
            });
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
