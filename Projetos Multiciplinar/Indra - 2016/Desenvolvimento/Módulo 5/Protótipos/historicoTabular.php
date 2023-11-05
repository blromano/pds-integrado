<?php 
$idUser = 1;
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Projeto Indra</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/freelancer.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>

</head>

<body id="page-top" class="index">

    <div id="background-modal" class="elemento-escondido"></div>

    <div id="modal-login" class="elemento-escondido">

        <form name="sentMessage" id="form-login" novalidate>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label> Email </label>
                    <input type="email" class="form-control entrada-texto" placeholder="Email" required data-validation-required-message="Por favor, digite seu email.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label> Senha </label>
                    <input type="password" class="form-control entrada-texto" placeholder="Senha" required data-validation-required-message="Por favor, digite uma senha válida.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="row">
                <div class="form-group col-xs-12" id="cadastrar">
                    <button type="submit" class="btn btn-primary"> Login </button>
                    <div  class="btn btn-danger" id="btn-cancelar"> Cancelar </div>
                </div>
            </div>
        </form>

    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" id="menu">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.html" class="page-scroll icone-menu-container">
                    <img  class="img-responsive" src="img/icone.png" id="icone-menu" alt="icone"/>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="page-scroll">
                        <a href="index.html">P&aacute;gina Principal</a>
                    </li>
                    <li id="btn-login">
                        <a> Login </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>PCD X</h2>
                </div>
            </div>
            <form>
                <div align="center" class="form-group">
                <select class="form-control select">
                        <option value="">PCD</option>
                        <option value="p1">PCD 1</option>
                        <option value="p2">PCD 2</option>
                        <option value="p3">PCD 3</option>
                        <option value="p4">PCD 4</option>
                        <option value="p5">PCD 5</option>
                    </select>
                    <select class="form-control select">
                        <option value="">Sensores</option>
                        <option value="s1">Sensor 1</option>
                        <option value="s2">Sensor 2</option>
                        <option value="s3">Sensor 3</option>
                        <option value="s4">Sensor 4</option>
                        <option value="s5">Sensor 5</option>
                    </select>
                    <select class="form-control text-center select">
                        <option value="">Valor mínimo</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label >Início:</label>
                    <input class="form-control select date" title="Início">
                    <label>Término:</label>
                    <input class="form-control select date" title="Término">
                    <input type="submit" role="button" value="Aplicar" class="btn btn-primary">    
                </div>
            </form>
            <div class="form-group">
                <table id="table-alerts" align="center" style="width: 80%" class="table table-condensed">
                    <thead>
                        <tr bgcolor="#3a4857">
                            <th></th>
                            <th>Data</th>
                            <th>Total de alertas</th>                    
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="teste">
                            <td><button id="item1" class="glyphicon glyphicon-plus botao-semfundo"></button></td>
                            <td>11/04/2016</td>
                            <td>3</td>
                        </tr> 
                        <tr>
                        <td style="display: none; padding-left: 3%" id="interTable" colspan="4" class="tabelaInterna">
                            <table width="90%">
                                <thead>
                                    <tr>
                                        <th style="width: 1%"></th>
                                        <th>Sensor</th>
                                        <th>Gráfico</th>
                                    </tr>
                                </thead>         
                                <tbody>
                                    <tr id="teste">
                                        <td><button id="sensor1" class="glyphicon glyphicon-plus botao-semfundo"></button></td>
                                        <td>Nível de água</td>
                                        <td style="padding-bottom: 1%"><button id="btngraf" class="btn btn-primary btn-table ">Ver Gráfico</button></td>
                                    </tr>
                                    
                                    <td style="display: none; padding-left: 3%;" class="tabelaInterna" id="interTable2" colspan="3">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Hora</th>
                                                    <th style="padding-left: 30%">Medição</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>12:35</td>
                                                    <td style="padding-left: 30%">40cm</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    
                                    <tr>
                                        <td><button class="glyphicon glyphicon-plus botao-semfundo"></button></td>
                                        <td>Temperatura</td>
                                        <td style="padding-bottom: 1%"><button class="btn btn-primary btn-table ">Ver Gráfico</button></td>
                                    </tr>
                                    <tr>
                                        <td><button class="glyphicon glyphicon-plus botao-semfundo"></button></td>
                                        <td>Direção do vento</td>
                                        <td style="padding-bottom: 1%"><button class="btn btn-primary btn-table ">Ver Gráfico</button></td>
                                    </tr>
                                </tbody>                   
                            </table>
                            </td>
                        </tr>
                        <tr>
                            <td><button class="glyphicon glyphicon-plus botao-semfundo"></button></td>
                            <td>12/04/2016</td>
                            <td>5</td>                            
                        </tr> 

                        <tr>
                            <td><button class="glyphicon glyphicon-plus botao-semfundo"></button></td>
                            <td>13/04/2016</td>
                            <td>2</td>
                            
                        </tr> 

                        <tr>
                            <td><button class="glyphicon glyphicon-plus botao-semfundo"></button></td>
                            <td>14/04/2016</td>
                            <td>1</td>
                        </tr> 

                    </tbody>
                </table>
            </div>
        </div>

        <div id="grafico" class="caixa-grafico">
            <canvas id="canvas"></canvas>
        </div>


    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container ">
                <div class="row">
                    <div class="footer-col col-md-6">
                        <h3>Local</h3>
                        <p>Instituto Federal de Educação, Ciência e Tecnologia de São Paulo<br>Campus São João da Boa Vista</p>
                    </div>
                    <div class="footer-col col-md-6">
                        <h3>Redes Sociais</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/ifspsaojoaodaboavista" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>


    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/freelancer.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="js/custom/historicoTabular.js"></script>

</body>

</html>