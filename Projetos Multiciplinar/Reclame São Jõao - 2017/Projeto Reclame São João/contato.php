
<!DOCTYPE html>
<?PHP
  session_start();  
  session_destroy()

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- INÍCIO DO META DO SLIDESHOW -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FIM DO META DO SLIDESHOW -->
    
    <!-- TÍTULO DO SITE -->
      <title>Reclame São João</title>
    
    <!-- OUTROS -->
    
      <link href="css/animate.min.css" rel="stylesheet"> 
      <link href="css/font-awesome.min.css" rel="stylesheet">
      
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/main.css" rel="stylesheet">
      <link href="css/responsive.css" rel="stylesheet">
      
      <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
      <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
      <link rel="shortcut icon" href="images/favicon.ico">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
      <script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       <link href="css/estilo.css" rel="stylesheet">
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/rodape.css">
      <link href="css/menu_do_site.css" rel="stylesheet">
      <script>
        function contatoNovo() 
        {  swal({
                          title: "Contato realizado com sucesso!",
                          text: "Em breve entraremos em contato com você!",
                          icon: "success",
                          button: "Confirmar"

                        }).then
                          (
                             function()
                             {
                                window.location.href = "index.php";
                              }
                          );
        }
                </script>

        
                 <?php function escrevaContato(){
                      echo "<script>contatoNovo();</script>"; 
                 }              
        ?>
  </head>

<body>
  <!-- MENU DO SITE -->
  <div class="main-nav" >
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
          <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
        </a>                    
      </div>
      
      <!-- MENU DO SITE - OPÇÕES-->
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">   
          <li class="scroll active"><a href="#contact">Contato</a></li>
          <li class="scroll"><a href="index.php">Home</a></li>
          <li class="scroll"  ><a href="sobrenos.php">Sobre Nós</a></li>  
        </ul>
      </div>
    </div>
  </div>
  <!-- FIM DO MENU DO SITE -->
  
  
  <!-- INICIO - CORPO DA PAGINA DE CADASTRO ESTABELECIMENTO -->
  <section id="contact">
    <div id="contact-us" class="parallax">
      <div class="container">
        <br/><br/><br/>
  <div class="container">   
    <br/>
    <br/>
    <div class="row">
      <!-- INÍCIO -  Gerencimento do Perfil do Estabelecimento -->
      <div class="col-md-14">

        <div class="col-md-14" id="selecionar-todas-reclamacoes">
          <div class="panel panel-default" style="border-left: thick double  #64594f; border-right: thick double  #64594f;">
            <div class="panel-body">
              <div style="text-align:center;"><h4><span class="fa fa-address-card-o" aria-hidden="true"></span> Entre em Contato </h4> </div>
              <div class="pull-right"></div>
            </div>
          </div>
        </div>

      </div>
      <!-- FIM - Gerencimento do Perfil do Estabelecimento -->
    </div>
    
        <?php

        if (isset($_SESSION["contato"]))
        {
          ?>

          <div class="form_status">
            <p class="text-success">Obrigado <?echo $_SESSION["contato"];?> pelo contato!</p>
          </div>
          <?php
          $_SESSION["contato"] = null;
        }
        ?>  
        
        <!-- INÍCIO DO FORMULÁRIO -->
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-md-14">
              <p style="text-align:center;color:green;">
                <?php if(isset($_SESSION['contatoMsg'])){
                  echo escrevaContato();
                }?>
              <form method="post" action="php/mod01/contatoEnvioEmail.php">
                
                <!--     NOME DA EMPRESA     -->
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" name="CNT_NOME" id="CNT_NOME" class="form-control" placeholder="Digite seu Nome" required="required" maxlength="50" oninvalid="setCustomValidity('Por favor, digite seu nome corretamente')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                  </div>

                <!--     NOME FANTASIA      -->
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="email" name="CNT_EMAIL" id="CNT_EMAIL" class="form-control" placeholder="Digite seu Email" pattern="[A-Za-z0-9._%+-]+@gmail.com" required="required" maxlength="100" oninvalid="setCustomValidity('Por favor, digite seu email válido.')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                  </div>
                
                <!--     CNPJ      -->
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="text" name="CNT_TITULO" id="CNT_TITULO" class="form-control" placeholder="Digite o Assunto" required="required" oninvalid="setCustomValidity('Por favor, digite um assunto válido')" onchange="try{setCustomValidity('')}catch(e){}"> 
                    </div>
                  </div>
                
                  
                <!--     PÚBLICO ALVO      -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <textarea class="form-control" id="CNT_DESCRICAO" name="CNT_DESCRICAO" placeholder="Insira sua mensagem" maxlength="500" oninvalid="setCustomValidity('Por favor, digite sua mensagem corretamente.')" onchange="try{setCustomValidity('')}catch(e){}" required></textarea>
                    </div>
                  </div>
                
                
                <div class="panel-group"> 
                        
                          <div class="panel-heading">
                            <ul class="nav nav-tabs nav-justified">
                              <li>
                                <button type="submit" id="submitBtn" style="display:none;" data-validate="contact-form">Hidden Button</button>
                                <a href="javascript:;" class="myClass" onclick="$('#submitBtn').click();" id="enviarcadastro"><span class="fa fa-tachometer" aria-hidden="true"></span> Confirmar</a>
                                
                              </li>
                            </ul> 
                          </div>
                        
                </div>
                
              </form>
            </div>
            
          </div>
          <div class="col-md-14" style="text-align: center;">
              <div class="contact-info wow fadeInUp" style="padding-left: 0px;" data-wow-duration="1000ms" data-wow-delay="300ms">
              <p>Para mais informações entre em contato conosco, responderemos o quanto antes possível.</p>
              <ul class="address">
                <li><i class="fa fa-map-marker"></i> <span> Endereço:</span> Dr. João Batista Merlin, s/nº - Jardim Itália</li>
                <li><i class="fa fa-phone"></i> <span> Telefone:</span>  (19) 3634-1100  </li>
                <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:someone@yoursite.com"> suporte@reclamesaojoao.com</a></li>
                <li><i class="fa fa-globe"></i> <span> Website:</span> <a href="#">www.reclamesaojoao.com</a></li>
              </ul>
              </div>                            
            </div>
        </div>
        <!-- FIM DO FORMULÁRIO -->  
      </div>
    </div>
  </div>      
</section>
<!-- FIM - CORPO DA PAGINA DE CADASTRO ESTABELECIMENTO -->


  <!--RODAPÉ-->
  <footer id="myFooter">
        <div class="container">
            <div class="row" style="text-align: center;">
                <div class="col-md-3">
                    <h2><img src="images/logo_branco_pequeno.png"></h2>
                </div>
                <div class="col-md-2">
                    <h5>Principal</h5>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="mapa.php">Mapa das empresas</a></li>
                        <li><a href="duvidasFrequentes.php">Perguntas Frequentes</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Sobre nós</h5>
                    <ul>
                        <li><a href="sobrenos.php">Sobre a Equipe</a></li>
                        <li><a href="sobreProjeto.php">Sobre o Projeto</a></li>
                        <li><a href="https://sbv.ifsp.edu.br/">O IFSP</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Termos</h5>
                    <ul>
                        <li><a href="#">Política de Privacidade</a></li>
                        <li><a href="#">Termos de Uso</a></li>
                        <li><a href="#">Manual do Usuário</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="social-networks">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <a  href="#"><button type="submit" class="btn btn-default" >Contate-nos</button></a>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>©2017 Copyright - Direitos autorais reservados aos alunos do Curso Técnico em Informática Integrado ao Ensino Médio - Turma 2017  </p>
        </div>
    </footer>
  <!--FIM DO RODAPÉ--> 
  
  <!-- SCRIPT EM GERAL -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.inview.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/jquery.countTo.js"></script>
    <script type="text/javascript" src="js/main.js"></script> 
    <script type="text/javascript" src="js/mod03/verificarEmail.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--FIM DO SCRIPT EM GERAL -->  
</body>
</html>