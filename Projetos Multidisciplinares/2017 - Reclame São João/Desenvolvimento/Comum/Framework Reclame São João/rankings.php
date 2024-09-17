<?php
// echo $_SERVER['DOCUMENT_ROOT'];
session_start();
// echo $_SESSION['USU_EMAIL'];
include_once 'controle/Conexao.php';
include_once 'controle/UsuarioDAO.php';
include_once 'modelo/Usuario.php';
include_once "controle/ReclamacoesDAO.php";


$conn = new Conexao();
$dao = new UsuarioDAO();
$usuarioLogado = "";

if (isset($_SESSION['USU_EMAIL'])) {
  $usr = new Usuario();
  $usr=$dao->pesquisarPorEmailObj($_SESSION['USU_EMAIL']);
  $IDUSR = $usr->getUSU_ID();
    # code...
    // $dao->redirecionar($_SESSION['USU_EMAIL']);
  $tipo = $dao->verificarUsuario($_SESSION['USU_EMAIL']);

// echo $tipo;
  if ($tipo == 'est') {
        # code...
        // header('Location: est_boas-vindas.php');
    $ID = $dao->buscarIDEstabelecimento($IDUSR);
    $usuarioLogado = "ESTABELECIMENTO";
  }
  if ($tipo == 'adm') {
        # code...
        // header('Location: admin.php');
    $usuarioLogado = "ADMINISTRADOR";
    $ID = 0;
  }
  if ($tipo==="usr") {
        # code...
        // header('Location: usu_paginaBoasVindasUsuario.php');
   $usuarioLogado = "CONSUMIDOR";
   $ID = $dao->buscarIDConsumidor($IDUSR);
 }

}else{
    // header('Location: usu_loginUsuario.php');
  $usuarioLogado = "VISITANTE";
  $ID = 0;
}

    // select * from usuarios;





  //INSERT DO FEEDBACK


if (isset($_POST['assunto'])) {
  if (isset($_POST['id'])) {
    if (isset($_POST['solucoes'])) {
        // header('Location: www.google.com');
      $assunto = $_POST['assunto'];
      $id = $_POST['id'];
      $solucoes = $_POST['solucoes'];

      $recDAO = new ReclamacoesDAO();

      $recDAO->atualizarFeed($id, $assunto, 1, $solucoes);

        # code...
    }
      # code...
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="iso-8859-1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reclame São João</title>
  <script src="js/jquery.min.js"></script>
  <script type="text/javascript">
    $( document ).ready(function() {
      $(".preloader").hide();
    });

  </script>
  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->
  <script type="text/javascript"></script>
  <!-- Custom styling plus plugins -->
  <!--sidebar-->
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <!-- select * from usuarios; -->
 <!--  select * from administradores;
  select * from usuarios;
  select * from consumidores; -->
  <!--sidebar-->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/testes.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <!--link do slidshow testemunho-->
  <!-- <link rel="stylesheet" href="css/w3.css"> -->
  <!--fim do link do slidshow testemunho-->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="images/favicon.ico">

  <!-- TESTE DE CSS -->
  <link  rel="stylesheet" href="css/mod04/sidebar.css">

  <link href="css/mod03/paginacao_reclamacoes/dataTables.bootstrap.min.css" rel="stylesheet">
  
  <!-- RODAPÉ -->
			<link rel="stylesheet" href="css/rodape.css">
			<link rel="stylesheet" href="css/estilo.css">

  

  <!-- <script src="/js/mod04/highcharts.js"></script> -->
  <link rel="stylesheet" href="css/highcharts.css" />
  <script src="js/mod04/highstock.js"></script>
  <!-- <script src="/js/mod04/exporting.js"></script> -->
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
  
  <link  rel="stylesheet" href="css/mod04/chartSize.css">


</head>
<!--/head-->

<body class="nav-md">
  <?php 
  //include_once '/MVC/controle/Conexao.php';
  //include_once '/MVC/controle/EstabelecimentosDAO.php';
  //include_once '/MVC/modelo/Estabelecimentos.php';
  //$conexao = new Conexao();
  //$estDAO = new EstabelecimentosDAO();
  //$est = new Estabelecimentos();


  ?>

  <!--.preloader-->
  <!-- <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div> -->
  <!--/.preloader-->

  <header id="home">

    <!--/#home-slider-->
    <div class="main-nav navbar-fixed-top" style="z-index: 10">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="index.php">
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a> </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="scroll active"><a href="#contact">Contato</a></li>
              <li class="scroll"><a href="index.php">Home</a></li>
              <li class="scroll"><a href="sobrenos.php">Sobre Nós</a></li>
              <li class="scrool"><a href=""><?php echo $usuarioLogado;?> </a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--/#main-nav-->
    </header>
    <!--/#home-->

    <!-- CONTEUDO PRINCIPAL DA PAGINA -->


    <!--nav sidebar -->
    <aside>
      <nav class="navbar navbar-inverse sidebar navbar-fixed-top" role="navigation">

        <div class="nav-side-menu">
          <div class="brand">Rankings e Relatórios</div>
          <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

          <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">


              <li data-toggle="collapse" data-target="#service" class="collapsed">
                <a href="#"><i class="fa fa-caret-down fa-lg"></i> Rankings <i class="fa fa-bar-chart-o fa-lg btn pull-right" style="margin-top:5px; margin-right:4px;"></i></a>
              </li>
              <ul class="sub-menu collapse in" id="service">
                <li id="r1">Ranking completo dos estabelecimentos</li>
                <li id="r2">Problemas solucionados</li>
                <li id="r3">Reclamações nos últimos tempos</li>
                <li id="r5">Histórico de Posição</li>
                <li id="r6">Histórico de Pontuação</li>
              </ul>



              <li data-toggle="collapse" data-target="#new" class="collapsed">
                <a href="#"><i class="fa fa-caret-down fa-lg"></i> Relatórios <i class="fa fa-file-text fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
              </li>
              <ul class="sub-menu collapse in" id="new">
                <li id="t1">Feedback das reuniões</li>
                <li id="t2">Relatório tabular das avaliações</li>

                <li id="r4">Estabelecimentos Tendenciosos</li>
                <!-- <li id="t3">Reclamação das últimas semanas</li> -->
              </ul>
              <li  data-target="#new" class="collapsed in">
                <a href="#" id="c1"><i class="fa fa-caret-right fa-lg"></i> Comparação entre duas empresas <i class="fa fa-line-chart fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
              </li>

              <?php if ($usuarioLogado=="ESTABELECIMENTO"): ?>

                <li  data-target="#new" id="empresaLogada">
                  <a href="#" id="f1"><i class="fa fa-caret-right fa-lg"></i> Registrar feedback<i class="fa fa-comment fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
                </li>
              <?php endif ?>
              <!--<li  data-target="#new" class="collapsed">
                <a href="#" id="l1"><i class="fa fa-caret-right fa-lg"></i> Logar como empresa <i class="fa fa-user fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
              </li>-->

                    <!-- <li>
                  <a href="#">
                  <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="#">
                  <i class="fa fa-users fa-lg"></i> Users
                  </a>
                </li> -->
              </ul>
            </div>
          </div>
        </nav>

      </aside>


      <!-- INSERIR CONTEUDO AQUI -->
      <!-- INSERIR CONTEUDO AQUI -->
      <!-- INSERIR CONTEUDO AQUI -->
      <!-- INSERIR CONTEUDO AQUI -->
      <!-- INSERIR CONTEUDO AQUI -->
      <!-- INSERIR CONTEUDO AQUI -->
      <!-- INSERIR CONTEUDO AQUI -->
      <section class="Rankings">

       <div class='container' style="min-height: 80vh;">

        <div class='row'>

          <div class="graficoResponsivo">

            <div id="formulario" style="display:none"> 
              <h2>Registrar Feedback</h2>
              <form id="main-contact-form" name="contact-form" method="post" action="#" style="border: 1px solid white; padding: 30px; 30px 0px;">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6" style="padding-left: 20px; width: 99%">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Estabelecimento" required="required">
                    </div>
                  </div>

                </div>
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6" style="padding-left: 20px; width: 99%;">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Feedback" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group" style="margin-bottom: 0px; margin-left: -2%; margin-right: -2%;">
                  <button style="margin-top: 0px; "type="submit" class="btn-submit">Enviar</button>
                </div>
              </form>
            </div>

            <!-- <button class="hideAll">hideAll</button> -->


            <!-- PROBLEMAS SOLUCIONADOS -->
            <!-- <canvas id="ranking2" width = 400 height = 400></canvas> -->
            <!-- <div class="row"> -->
              <style type="text/css">
              #respGraph {


              }

            </style>


            <!-- Falha no carregamento do <script> com a fonte “https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js”.  rankings.php:7561 -->
              <!-- Falha no carregamento do <script> com a fonte “https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js”.  rankings.php:7565 -->
                <!-- Falha no carregamento do <script> com a fonte “https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js”.  rankings.php:7566 -->
                  <!-- Falha no carregamento do <script> com a fonte “https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js”. -->
                    <div id="campo">

                      <h3 style="text-align: center">Pesquisa por estabelecimento:</h3>

                      <div class="form-group col-md-6 col-md-offset-3">
                        <input type="text" class="form-control" id="busca" placeholder="Insira o nome do estabelecimento">
                        <br>
                        <input type="text" class="form-control" id="comp" placeholder="Insira o nome do estabelecimento">
                      </br>


                    </div>

                  </div>
                  <!-- </div> -->


                  <div class="graficoResponsivo" id="ranking2" style="min-width: 260px; max-width: 1000px; padding-left: 0"></div>

                  <!-- FIM PROBLEMAS SOLUCIONADOS-->


                  <!-- NÚMERO DE RECLAMAÇÕES NOS ÚLTIMOS TEMPOS -->


                  <div class="graficoResponsivo" id="ranking3" style="min-width: 260px; max-width: 1000px; padding-left: 0"></div>
                  
                  <div class="graficoResponsivo" id="ra5" style="min-width: 260px; max-width: 1000px; padding-left: 0"></div>
                  <div class="graficoResponsivo" id="ra6" style="min-width: 260px; max-width: 1000px; padding-left: 0"></div>
                  <div class="graficoResponsivo" id="comp1" style="min-width: 260px; max-width: 1000px; padding-left: 0"></div>



                  <!-- FIM RECLAMAÇÕES ULTIMOS TEMPOS -->

                  <!-- RANKING COMPLETO DOS ESTABELECIMENTOS -->
                  <div id="ranking1">
                    <?php 
                    include_once "controle/Conexao.php";
                    $con = new Conexao(); 
                    
                    include_once "controle/EstabelecimentosDAO.php";
                    include_once "modelo/Estabelecimentos.php";
                    include_once "modelo/Reclamacoes.php";
                    include_once "modelo/Tipo_Estabelecimentos.php";
                    include_once "controle/Tipo_EstabelecimentosDAO.php";
                    $est = new Estabelecimentos(); 
                    $estDAO = new EstabelecimentosDAO();
                    $tesDAO = new Tipo_EstabelecimentosDAO();
                    $tes = new Tipo_Estabelecimentos();
                    $varEst = $estDAO->listarTodos();
                    $tendenciosos = $estDAO->tendenciosos();
                    $tamanhoEst = count($varEst);
                    $feed = $estDAO->listarFeedbacks($ID, $usuarioLogado);


                    ?>


                    <h2 class="textoH2">Ranking completo dos estabelecimentos</h2>
                    <table class="table relatorioTabular table-striped table-hover responsive" style="width: 100%">
                      <thead> 
                        <tr>
                          <th> ID </th>
                          <th> Estabelecimentos </th>
                          <th> Categoria </th>
                          <th> Pontuação</th>           
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($varEst as $linha) { ?>
                        <tr>
                          <td><?php echo $linha['EST_ID'];?></td>                     
                          <td><?php echo $linha['EST_NOME_FANTASIA'];?></td>
                          <?php $numero=$linha['TES_ID']; ?> 
                          <?php $tes=$tesDAO->pesquisarPorId($numero);?>                    
                          <td><?php foreach($tes as $lia) {
                            echo $lia['TES_CATEGORIA'];
                          } ?></td>   
                          <td><?php echo $linha['EST_MEDIA_RECLAMACAO'];?></td>                
                        </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- FIM RANKING ESTABELECIMENTOS-->


                  <div id="ft1">
                    <center>
                      <h1>Registrar Feedback</h1>
                      <br />
                      <br />
                      <form action="#" method="post" style="width: 100%">
                        <?php
                        $dao = new  ReclamacoesDAO();
                        // select * from reclamacoes where EST_ID=2;
                        $registro = $dao->pesquisarReunioes($ID);
                        // echo $ID;
                        // var_dump($registro);
                        if (count($registro)<1)
                        {
                          echo "Não foram encontradas reuniões realizadas com feedback pendente!"; 
                        }
                        else 
                        {

                          ?>

                          <p style="float:left">Reclamação:</p>
                          <select style="width: 100%" name = "id">
                            <?php foreach($registro as $linha) { ?>     
                            <option value="<?php echo $linha['REU_ID'];?>"><?php echo ucfirst($linha['REU_NOME_EVENTO']);?></option>          
                            <?php }?> 
                          </select>
                          <br />
                          <br />
                          <p style="float:left">Assunto Pautado:</p>
                          <br /><input style="width: 100%" type="text" name="assunto" /> </input> 
                          <br />
                          <br />
                          <p style="float:left">Soluções definidas:</p>
                          <br /><input style="width: 100%" type="text" name="solucoes" /> 
                          <!-- <br />
                          <br />
                          <br />
                          <br />
                          <p style="float:left">Representantes:</p>
                          <br /> <textarea style="width: 100%" type="text" name="representantes"> </textarea>  -->
                          <br />
                          <input style="float:left;width: 100%;height: 40px;margin-top: 2%;margin-bottom: 5%" type="submit" name="" />
                          <?php } ?>
                        </center>
                      </form>
                    </div>
                    <!-- ESTABELECIMENTOS TENDENCIOSOS -->
                    <div id="ranking4">
                      <h2>Estabelecimentos Tendenciosos</h2>
                      <table id="tendencia" class="table table-striped table-hover responsive" style="width: 100%">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Estabelecimento</th>
                            <th>Categoria</th>
                            <th>Reclamações</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($tendenciosos as $linha) { ?>
                        <tr>
                          <td><?php echo $linha['EST_ID'];?></td>                     
                          <td><?php echo $linha['EST_NOME_FANTASIA'];?></td>
                          <?php $numero=$linha['TES_ID']; ?> 
                          <?php $tes=$tesDAO->pesquisarPorId($numero);?>                    
                          <td><?php foreach($tes as $lia) {
                            echo $lia['TES_CATEGORIA'];
                          } ?></td>   
                          <td><?php echo $linha['EST_TOTAL_RECLAMACAO'];?></td>                
                        </tr>

                        <?php } ?>
                      </tbody>
                      </table>
                    </div>
                    <!-- FIM ESTABELECIMENTOS TENDENCIOSOS -->


                    <!-- FEEDBACK DAS REUNIÕES -->
                    <div id="tabela1">
                      <h2 class="textoH2">Feedback das Reuniões</h2>
                      <?php if ($feed!=0) {
                        # code...
                       ?>
                       <table class="table relatorioTabular table-striped table-hover responsive" style="width: 100%">
                        <thead> 
                          <tr>
                            <th> ID </th>
                            <th> Problema </th>
                            <th> Descrição </th>
                            <th> Status</th>           
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($feed as $linha) { ?>
                          <tr>
                            <td><?php echo $linha['REU_ID'];?></td>                     
                            <td><?php echo ucfirst(mb_strtolower($linha['FEE_PROBLEMA'], 'UTF-8'));?></td>                     
                            <td><?php 
                            $descricao = $linha['REU_DESCRICAO'];
                            echo ucfirst(mb_strtolower($descricao, 'UTF-8'));?></td>
                            <td><strong><?php 
                            if ($linha['FEE_STATUS_RESOLVIDO'] == 1) {
                                # code...
                              echo "Resolvido";
                            }else{
                              echo "Pendente";
                            }


                            ?></strong></td>                
                          </tr>

                          <?php } ?>
                        </tbody>
                      </table>
                      <?php 
                    }else{

                     ?>
                     <h4>Não existem feedbacks registrados!</h4>
                     <?php } ?>
                   </div>




                   <!-- FIM FEEDBACK -->


                   <!-- AVALIAÇÕES -->
                   <div id="tabela2">
                    <?php 
                    include_once "controle/AvaliacoesDAO.php";
                    include_once "modelo/Avaliacoes.php";
                    $ava = new Avaliacoes();
                    $avaDAO = new AvaliacoesDAO();
                    $est = new Estabelecimentos();
                    $estDAO = new EstabelecimentosDAO();
                    $tesDAO = new Tipo_EstabelecimentosDAO();
                    $tes = new Tipo_Estabelecimentos();
                    $varAva = $avaDAO->listarTodos();
                    $tamanhoEst = count($varEst);
                    ?>




                    <h2 style="text-align: center">Avaliações dos estabelecimentos</h2>
                    <table class="table relatorioTabular table-striped table-hover responsive" style="width: 100%">
                      <thead> 
                        <tr>
                          <th> ID </th>
                          <th> Estabelecimentos </th>
                          <th> Data </th>
                          <th> Pontuação</th>           
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($varAva as $linha) { ?>
                        <tr>
                          <td><?php echo $linha['AVA_ID'];?></td>
                          <?php $numero=$linha['EST_ID']; ?> 
                          <?php $varEstabelecimento=$estDAO->pesquisarPorId($numero);?>  
                          <td><?php foreach($varEstabelecimento as $lia) {
                            echo $lia['EST_NOME_FANTASIA'];
                          } ?></td>  
                          <td><?php echo $linha['AVA_DATA_HORA'];?></td>                    
                          <td><?php echo $linha['AVA_NOTA'];?></td>

                        </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
          <!-- FIM RANKING ESTABELECIMENTOS
            <!-- FIM AVALIAÇÕES -->

            <!-- RECLAMAÇÕES ULTIMAS SEMANAS -->
            <div id="tabela3">
              <h2>Reclamações das Últimas Semanas</h2>
              <table class="table relatorioTabular table-striped table-hover responsive" style="width: 100%">
                <thead>
                  <tr>
                    <th></th>
                    <th>Estabelecimento</th>
                    <th>Categoria</th>
                    <th>Pontuação</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Tuca Semi Joias</td>
                    <td>Acessórios</td>
                    <td>97.8</td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
            <!-- FIM RECLAMAÇÕES ULTIMAS SEMANAS -->

            <!-- FIM DIV DE CONTEUDOS -->
          </div>
        </div>
      </div>
    </section>

    <!-- INSERIR CONTEUDO AQUI -->
    <!-- INSERIR CONTEUDO AQUI -->
    <!-- INSERIR CONTEUDO AQUI -->
    <!-- INSERIR CONTEUDO AQUI -->
    <!-- INSERIR CONTEUDO AQUI -->
    <!-- INSERIR CONTEUDO AQUI -->
    <!-- INSERIR CONTEUDO AQUI -->




    <!--RODAPÉ-->
    <!--RODAPÉ-->
		<br/><br/><br/>
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
						<a  href="contato.php"><button type="submit" class="btn btn-default" >Contate-nos</button></a>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<p>©2017 Copyright - Direitos autorais reservados aos alunos do Curso Técnico em Informática Integrado ao Ensino Médio - Turma 2017  </p>
			</div>
		</footer>
	<!--FIM DO RODAPÉ--> 
      <!--FIM DO RODAPÉ-->

      <!--/#about-us-->


      <!-- SCRIPTS CHART JS -->

      <!-- SCRIPTS PARA DATATABLES -->

      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
      <script src="js/mod04/datatables/jquery.dataTables.min.js"></script>
      <script src="js/mod04/datatables/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" src="js/mod04/datatable.js"></script>
      <script src="js/mod04/datatables/dataTables.responsive.min.js"></script>


      <!--script em geral-->
      <script src="js/mod04/rankings.js"></script>
      <!-- <script type="text/javascript" src="js/jquery.js"></script> -->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script> -->
      <script type="text/javascript" src="js/jquery.inview.min.js"></script>
      <script type="text/javascript" src="js/wow.min.js"></script>
      <script type="text/javascript" src="js/mousescroll.js"></script>
      <script type="text/javascript" src="js/smoothscroll.js"></script>
      <script type="text/javascript" src="js/jquery.countTo.js"></script>
      <!-- <script type="text/javascript" src="js/main.js"></script> -->
      <!-- <script type="text/javascript" src="js/disableOnTop.js"></script> -->

      <!--fim do script em geral-->

    </body>
    </html>