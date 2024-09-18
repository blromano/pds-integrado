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
        <link href="mod08.css" rel="stylesheet" type="text/css"/>
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
        date_default_timezone_set('America/Sao_Paulo');
        $con = new PDO("mysql:host=localhost;dbname=BANCO_MSSJ", "root", "");
        $rs = $con->query("SELECT PEA_ALTURA, PEA_PESO FROM PESOS_ALTURAS WHERE FK_USUARIOS_USU_CODIGO='1'");
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            $altura = $row->PEA_ALTURA;
            $peso = $row->PEA_PESO;
            $imc = $peso / ($altura * $altura);
        }
        ?>
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
                                <h1 class="total_refeicao">Peso Ideal e IMC</h1>
                            </div>
                            <hr>
                            <?php                                
                                
                                $con = new PDO("mysql:host=localhost;dbname=BANCO_MSSJ","root", "");
                                $rs = $con->query("SELECT DATE_FORMAT(USU_DATA_NASCIMENTO, '%d/%m/%Y') as USU_DATA_NASCIMENTO, USU.USU_GENERO, PA.PEA_ALTURA FROM USUARIOS usu INNER JOIN pesos_alturas AS PA ON (PA.FK_USUARIOS_USU_CODIGO = usu.USU_CODIGO) WHERE USU.USU_CODIGO='1'");
                                $row = $rs->fetch(PDO::FETCH_OBJ);
                                
                                
                                $data = $row->USU_DATA_NASCIMENTO;
   
                                list($dia, $mes, $ano) = explode('/', $data);
                                $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                                $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
                                $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

                                $altura = $row->PEA_ALTURA;
                                $genero = $row->USU_GENERO;
                                if(($genero == 1) && $idade<=20 && $altura>1.70){
                                    $ideal = (72.7 * $altura) - 58;

                                    echo "<h4> Seu Peso Ideal é de $ideal </h4>";
                                }
                                else if(($genero == 1) && $idade>20 && $idade<39 && $altura>1.70){
                                    $ideal = (72.7 * $altura ) - 53;

                                    echo "<h4> Seu Peso Ideal é de $ideal </h4>";
                                }
                                else if(($genero == 1) && $idade>=40 && $altura>1.70){
                                    $ideal = (72.7 * $altura ) - 45;

                                    echo "<h4> Seu Peso Ideal é de $ideal </h4>";
                                }
                                else if(($genero == 1) && $idade<=40 && $altura<=1.70){
                                    $ideal = (72.7 * $altura ) - 50;

                                    echo "<h4> Seu Peso Ideal é de $ideal  </h4>";
                                }
                                else if(($genero == 1) && $idade>40 && $altura<=1.70){
                                    $ideal = (72.7 * $altura ) - 58;

                                    echo "<h4> Seu Peso Ideal é de $ideal </h4>";
                                }
                                else if( ($genero == 2) && $idade<=20 && $altura>1.50){
                                    $ideal = (62.1 * $altura ) - 44.7;

                                    echo "<h4> Seu Peso Ideal é de $ideal  </h4>";
                                }
                                else if(($genero == 2) && $idade>=35 && $altura<=1.50){
                                    $ideal = (62.1 * $altura ) - 45;

                                    echo "<h4> Seu Peso Ideal é de $ideal  </h4>";
                                }
                                else if(($genero == 2) && $idade<35 && $altura<=1.50){
                                    $ideal = (62.1 * $altura ) - 49 ;

                                    echo "<h4> Seu Peso Ideal é de $ideal  </h4>";
                                }
                                else{
                                    echo 'Dados não cadastrado <a href="?mod=dbordo&sub=atualizar_peso_altura">Clique aqui para Cadastrar</a>';
                                }
                                
                                

                            ?> 
                            <br>
                            <div class="table-responsive">
                                <form method="post"  id="tabela" style="display: none;">
                                    <h4 class="esquerda"> Seu IMC é <?php echo $imc;?> </h4>
                                    <table class="table table-condensed  esquerda">
                                        <thead>
                                            <tr>
                                                <th scope="col">Categoria</th>
                                                <th scope="col">IMC</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($imc<18.4){ $catimc = "Abaixo do Peso";?><tr bgcolor="greenyellow"> <?php } ?>                                            
                                                <td> Abaixo do Peso</td>
                                                <td> Abaixo de 18.4</td>
                                            </tr>
                                            <?php if (($imc>=18.5) AND ($imc<25)){ $catimc = "Peso Normal";?><tr bgcolor="greenyellow"><?php } ?> 
                                                <td> Peso Normal</td>
                                                <td> De 18.5 - 24.9</td>
                                            </tr>
                                            <?php if (($imc>=25) AND ($imc<30)){ $catimc = "Sobrepeso";?><tr bgcolor="greenyellow"><?php } ?> 
                                                <td> Sobrepeso </td>
                                                <td> De 25.0 - 29.9</td>
                                            </tr>
                                            <?php if (($imc>=30) AND ($imc<35)){ $catimc = "Obesidade Grau I";?><tr bgcolor="greenyellow"><?php } ?> 
                                                <td> Obesidade Grau I</td>
                                                <td> De 30.0 - 34.9 </td>
                                            </tr>
                                            <?php if (($imc>=35) AND ($imc<40)){ $catimc = "Obesidade Grau II";?><tr bgcolor="greenyellow"><?php } ?> 
                                                <td> Obesidade Grau II</td>
                                                <td> De 35.0 - 39.9 </td>
                                            </tr>
                                            <?php if ($imc>=40){ $catimc = "Obesidade Grau III";?><tr bgcolor="greenyellow"><?php } ?> 
                                                <td> Obesidade Grau III</td>
                                                <td> Acima de 40 </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Sua Categoria:</th>
                                                <td><?php echo $catimc;?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </form>

                                <button onclick="mostrar('tabela')" class="btn btn-primary botao">Mostrar IMC e tabela de pesos ideais</button>

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
    </body>
</html>
