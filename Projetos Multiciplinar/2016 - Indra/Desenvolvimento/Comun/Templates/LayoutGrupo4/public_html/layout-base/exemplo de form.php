<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Projeto Indra</title>

        <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/freelancer.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>

    <body id="page-top" class="index">
	
	<script type = "text/javascript">
            function altera() {

                document.getElementById("dropdownMenu1").innerHTML = "Ativado <span  class= 'caret' ></span>";
                
            }

            function altera2() {

                document.getElementById("dropdownMenu1").innerHTML = "Desativados <span  class= 'caret' ></span>";
            }


        </script>

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
                    <a href="#page-top" class="page-scroll icone-menu-container">
                        <img  class="img-responsive" src="img/icone.png" id="icone-menu" alt="icone"/>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="#about"> Sobre N&oacute;s </a>
                        </li>
                        <li class="page-scroll">
                            <a href="#ferramentas"> Ferramentas </a>
                        </li>
                        <li class="page-scroll">
                            <a href="#contact"> Cadastro </a>
                        </li>
                        <li id="btn-login" class="page-scroll">
                            <a> Login </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>


        <!-- Contact Section -->
        <section id="contact">
            <div class="container elemento-expandido"><br>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Cadastrar 1</a></li>
                    <li><a data-toggle="tab" href="#menu1">Cadastrar 2</a></li>
                    <li><a data-toggle="tab" href="#menu2">Cadastrar 3</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <h3>Exemplo de formulário de cadastro 1</h3>
                        <form data-toggle="validator">
                            <div class="form-group">
                                <label>Nome:</label>
                                <input type="text" class="form-control"placeholder="Nome" required>
                            </div>
                            <div class="form-group">
                                <label>Senha:</label>
                                <input style=""type="password" class="form-control" placeholder="Senha" required>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Data de Nascimento:</label>
                                <div>

                                    <select style="float: left; width: 8%" class="form-control" required>
                                        <option value="">Dia</option>
                                        <?php
                                        for ($i = 1; $i <= 30; $i++) {
                                            if ($i < 10)
                                                echo "<option value='0" . $i . "'>0" . $i . "</option>";
                                            else
                                                echo "<option value='" . $i . "'>" . $i . "</option>";
                                        }
                                        ?>
                                    </select>

                                    <select style="float: left; width: 8%" class="form-control" required>
                                        <option value="">Mês</option>
                                        <?php
                                        for ($i = 1; $i <= 12; $i++) {
                                            if ($i < 10)
                                                echo "<option value='0" . $i . "'>0" . $i . "</option>";
                                            else
                                                echo "<option value='" . $i . "'>" . $i . "</option>";
                                        }
                                        ?>
                                    </select>

                                    <select style="float: left; width: 8%" class="form-control" required>
                                        <option value="">Ano</option>
                                        <?php
                                        for ($i = 1900; $i <= 2016; $i++) {
                                            echo "<option value='" . $i . "'>" . $i . "</option>";
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="checkbox">
                                <label style="margin-left: 2%"><input  type="checkbox" name="termos" required>Aceito os Termos de Uso</label>
                                <a style="font-size: 11px; margin-left: 0.3%; color: #4682B4" data-toggle="modal" data-target="#modalTermos">
                                    Saiba mais
                                </a>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="modalTermos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Termos de Uso</h4>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <br>
                                <input  type="submit" role="button" value="Cadastrar" class="btn btn-primary"></input>
                            </div>
                        </form>  
                        <!-- Button trigger modal -->

                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <h3>Exemplo de formulário de cadastro 2</h3>
                        <form>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">@</span>
                                <input type="text" class="form-control" placeholder="Nome" aria-describedby="basic-addon1">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">#</span>
                                <input type="password" class="form-control" placeholder="Senha" aria-describedby="basic-addon1">
                            </div><br>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">@exemplo.com</span>
                            </div><br>
                            <input type="submit" role="button" value="Cadastrar" class="btn btn-primary"></input>
                        </form>  
                    </div>
                    
                     <div id="menu2" class="tab-pane fade ">
                        <h3>Exemplo de formulário de cadastro 3</h3>


                        <form>

                            <div class="form-group">
                                <label>Nome da PCD (Portal de Coleta de Dados):</label>
                                <input type="text" class="form-control" placeholder="Nome">
                            </div>
                            <div class="form-group">
                                <label>Cidade:</label>
                                <input type="password" class="form-control" placeholder="Cidade">
                            </div>
                            <div class="form-group">
                                <label>Estado:</label>
                                <input type="text" class="form-control" placeholder="Estado">
                            </div>
                            <div class="form-group">
                                <label>Sensores:</label>
                                <input type="text" class="form-control" placeholder="Sensores">
                            </div>

                            <div class="form-group">
                                <label style = "margin-top: 10px">Status dos sensores:</label>
                                <div  class = "dropdown"  > 

                                    <button  class = "btn btn-default dropdown-toggle"  type= "button"  id= "dropdownMenu1"  data-toggle= "dropdown"  aria-haspopup= "true" >
                                        Ativados
                                        <span  class= "caret" ></span> 
                                    </button>

                                    <ul   class= "dropdown-menu"  aria-labelledby= "dropdownMenu1" > 

                                        <li><a onclick="altera();" id = "ativar"   href= "#" > Ativados </a></li> 
                                        <li><a onclick="altera2();" id = "desativar" href= "#" > Desativados </a> </li> 

                                    </ul> 

                                </div> 
                            </div>

                            <div class="form-group">
                                <input style = "float: left" type="submit" role="button" value="Cadastrar"  class="btn btn-primary">
                            </div>

                        </form>  
                    </div>

                    

                   
                </div>
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

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/cbpAnimatedHeader.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/freelancer.js"></script>

    </body>

</html>