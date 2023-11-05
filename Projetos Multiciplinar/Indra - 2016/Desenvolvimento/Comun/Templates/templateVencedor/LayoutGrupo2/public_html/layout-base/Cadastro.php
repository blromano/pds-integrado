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
        <script src="jquery.js"></script>
        <script>
				function mostrar_formulario(valor_select){
			
			switch(valor_select){
				case '1':
					$("#form_instituicao").css("display", "block");
					$("#form_especialista").css("display", "none");
					break;
				case '2':
					$("#form_especialista").css("display", "block");
					$("#form_instituicao").css("display", "none");
					break;
				default:
					$("#form_especialista").css("display", "none");
					$("#form_instituicao").css("display", "none");
					break;
			}
		}
		</script>


        <div id="background-modal" class="elemento-escondido"></div>

        <div id="modal-login" class="elemento-escondido">

            <form name="sentMessage" id="form-login" novalidate>
                <div class="row control-group">
                    <label>LOGIN</label>
                    <br />
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
                        <div  class="btn btn-danger" id="btn-primary"> Cancelar </div>
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
            <div class="container" >
                <br>
                <h3>Cadastro</h3>
                <form data-toggle="validator">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" class="form-control" placeholder="Nome" required>
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
                        <label>CEP:</label>
                        <input type="text" class="form-control" placeholder="CEP" required>
                    </div>
   					<div class="form-group">
                        <label>Número da Residência:</label>
                        <input type="text" class="form-control" placeholder="N°" required>
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
					<div class="form-group">					
                        <label>Tipo de úsuario:</label>
                        <div>
                            <select style="float: left; width: 40%" class="form-control" required name="tipo_usuario" onchange="mostrar_formulario(this.value);">
                                <option value="0">Úsuario Comum</option>
								<option value="1">Instituição</option>
								<option value="2">Especialista</option>
								
                            </select>
                            
                        </div>
                    </div>
                    <br> 
                    <div id="form_instituicao" style="display:none">
						<div class="form-group">
							<br></br>
							<label style="float:left">Nome fantasia:</label>
							<input type="text" class="form-control" placeholder="Nome fantasia" required>
						</div>
						<div class="form-group">
							<label>Rasão Social:</label>
							<input type="text" class="form-control" placeholder="rasão social" required>
						</div>
						<div class="form-group">
							<label>CNPJ:</label>
							<input type="text" class="form-control" placeholder="cnpj" required>
						</div>
						
					</div>
					<div id="form_especialista" style="display:none">
						<div class="form-group">
							<br></br>
							<label>Instituíção:</label>
							<input type="text" class="form-control" placeholder="instituição" required>
						</div>
						<div class="form-group">
							<label>RG:</label>
							<input type="text" class="form-control" placeholder="RG" required>
						</div>
						<div class="form-group">
							<label>CPF:</label>
							<input type="text" class="form-control" placeholder="cpf" required>
						</div>
						<div class="form-group">
							<label>Especialização:</label>
							<input type="text" class="form-control" placeholder="currículo" required>
						</div>
						<div class="form-group">
							<label>Currículo Acadêmico:</label>
							<input type="text" class="form-control" placeholder="currículo" required>
						</div>
						
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
