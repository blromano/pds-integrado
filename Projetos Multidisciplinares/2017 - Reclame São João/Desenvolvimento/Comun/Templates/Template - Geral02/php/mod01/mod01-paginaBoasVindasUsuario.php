<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<!--meta do slishow-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--fim do meta do slishow-->
	<title>Reclame São João</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/testes.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/sidebar.css" rel="stylesheet">
	<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/depoimentos.css" rel="stylesheet">

	<link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" rel="stylesheet">

	<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="images/favicon.ico">
	<link href="css/mod04/tabelas.css" rel="stylesheet">
</head>
<!--/head-->

<body>

	<!--.preloader-->
	<div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
	<!--/.preloader-->

	<header id="home">
		<div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
				<div id="itema" class="item active" style="background-image: url(images/slider/1.jpg); background-size:cover; back:no repeat; background-attachment:fixed;height:100vh;background-position:center center;">

					<div class="row" style="padding-top: 10px">
						<div class="container">
							<div class="col-md-6">
								<img src="images/slider/logo.png" class="pull-left" style="width:30%;">
							</div>
							<div class="col-md-6">
								<span class="pull-right">
									<div class="dropdown">
									  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> matheussardeli@gmail.com
									  <span class="caret"></span></button>
									  <ul class="dropdown-menu">
										<li><a href="mod01-editarInformacoesUsuario.html"><span class="glyphicon glyphicon-pencil"></span> Editar Informações</a></li>
										<li><a href="#"><span class="glyphicon glyphicon-comment"></span> Reclamações</a></li>
										<li><a href="mod01-sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
									  </ul>
									  <i><a href="mod01-chatUsuario.html" style="font-size:28px; margin-left:45px" class="fa fa-comments" aria-hidden="true"></a></i>
									  <p class="chat" style="font-size:12px; margin-left:280px"><b>CHAT</b></p>
									</div>
								  </span>
							</div>
						</div>
					</div>
					<div class="caption">
						<!-- <div class="container">-->

						<h1 class="animated fadeInLeftBig">Seja <span>Bem-Vindo </span></h1>
						<span class="destinations-form animated fadeInLeftBig">
                     <div class="input-line">
                        <input type="text" name="destination" value="" class="form-input check-value" placeholder="Buscar" />
                        <button type="submit" name="destination-submit" class="form-submit btn btn-special" onclick="location.href='reclamar.html'".click()><i class="fa fa-search fa-2x "></i> </button>
                     </div>
                  </span>
						<!--<a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Veja mais</a>-->
						<p id="textobloco1" class="animated fadeInRightBig"><br>FAÇA SUAS RECLAMAÇÕES E VEJA A REPUTAÇÃO DOS ESTABELECIMENTOS</p>
					</div>
				</div>
			</div>
		</div>

		</div>
		<!--/#home-slider-->
		<div class="main-nav">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
					<a class="navbar-brand" href="../../index.html">
						<h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="scroll active"><a href="#home">Home</a></li>
						<li class="scroll"><a href="#serviços">Serviços</a></li>
						<li class="scroll"><a href="#mapa">Mapa</a></li>
						<li class="scroll"><a href="#portfolio">Rankings</a></li>
						<li class="scroll"><a href="#about-us2">Comentários</a></li>
						<li class="scroll"><a href="#semana">da Semana</a></li>

						<li><a href="contato.html">Contato</a></li>
						<li><a href="php/mod01/mod01-duvidasFrequentes.html">Dúvidas</a></li>
						<li><a href="sobrenos.html">Sobre Nós</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!--/#main-nav-->
	</header>
  <!--nav sidebar -->
 <aside>
    <nav class="navbar navbar-inverse sidebar navbar-fixed-top" role="navigation">

        <div class="nav-side-menu" style="top: 0px;">
            <div class="brand">Rankings e Relatórios</div>
            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

            <div class="menu-list">

                <ul id="menu-content" class="menu-content collapse out">


                    <!-- <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a href="#"><i class="fa fa-file-text-o fa-lg"></i> Relatórios <i class="fa fa-file-text fa-lg btn pull-right" style="margin-top:5px"></i></a>
                </li> -->
                    <!-- <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="#">CSS3 Animation</a></li>
                    <li><a href="#">General</a></li>
                    <li><a href="#">Buttons</a></li>
                    <li><a href="#">Tabs e Accordions</a></li>
                    <li><a href="#">Typography</a></li>
                    <li><a href="#">FontAwesome</a></li>
                    <li><a href="#">Slider</a></li>
                    <li><a href="#">Panels</a></li>
                    <li><a href="#">Widgets</a></li>
                    <li><a href="#">Bootstrap Model</a></li>
                </ul> -->


                    <li data-toggle="collapse" data-target="#service" class="collapsed">
                        <a href="#"><i class="fa fa-caret-down fa-lg"></i> Rankings <i class="fa fa-bar-chart-o fa-lg btn pull-right" style="margin-top:5px; margin-right:4px;"></i></a>
                    </li>
                    <ul class="sub-menu collapse" id="service">
                        <li>Ranking completo dos estabelecimentos</li>
                        <li>Problemas solucionados</li>
                        <li>Número de reclamações nos últimos tempos</li>
                        <li>Estabelecimentos tendenciosos</li>
                    </ul>



                    <li data-toggle="collapse" data-target="#new" class="collapsed">
                        <a href="#"><i class="fa fa-caret-down fa-lg"></i> Relatórios <i class="fa fa-file-text fa-lg btn pull-right" style="margin-top:5px; margin-right:2px;"></i></a>
                    </li>
                    <ul class="sub-menu collapse" id="new">
                        <li>Feedback das reuniões</li>
                        <li>Relatório tabular das avaliações</li>
                        <li>Reclamação das últimas semanas</li>
                    </ul>


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
<!-- Modal escolher forma de login (usuário / estabelecimento) -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content modal-sm">
      <div class="modal-header modal-sm">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Qual das opções abaixo você deseja logar?</h4>
      </div>
<!--
      <div class="modal-body">
        ...
      </div>
-->
      <div class="modal-footer">
					<button class="btn btn-default" type="submit" onclick="location.href='mod01_usuarios/mod01-loginUsuario.html'".click();>Consumidor</button>
					<button class="btn btn-primary" type="submit" onclick="location.href='mod01-loginEstabelecimento.html'".click();>Estabelecimento</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal escolher forma de cadastro (usuário / estabelecimento) -->
<div class="modal fade" id="modal-mensagem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content modal-sm">
      <div class="modal-header modal-sm">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Qual das opções abaixo você deseja cadastrar-se?</h4>
      </div>
<!--
      <div class="modal-body">
        ...
      </div>
-->
      <div class="modal-footer" align="center">
					<button class="btn btn-default" type="submit" onclick="location.href='mod01-cadastroUsuario.html'".click();>Usuário</button>
					<button class="btn btn-primary" type="submit" onclick="location.href='mod01-cadastroEstabelecimento.html'".click();>Estabelecimento</button>
      </div>
    </div>
  </div>
</div>

	<!--/#home-->

	<section id="serviços" style="margin-bottom: 5%;">
		<div class="container">
			<div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
				<div class="row">
					<div class="text-center col-sm-8 col-sm-offset-2">
						<h2>Nosso Serviços</h2>
						<p>Buscamos oferecer suporte para problemas que possam ocorrer no relacionamento Cliente x Estabelecimento em São João da Boa Vista.</p>
					</div>
				</div>
			</div>
			<div class="text-center our-services">
				<div class="row">
					<div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
						<div class="service-icon">
							<a style="color: white;" href="encontreaempresa-reclamacao.html"><i  class="fa fa-comments"></i></a>
						</div>
						<div class="service-info">
							<h3>Reclamar</h3>
							<p>Criar reclamações contra determinado estabelecimento</p>
						</div>
					</div>
					<div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
						<div class="service-icon">
							<a style="color: white;" href="encontreaempresa-avaliacao.html"><i class="fa fa-star-half-o"></i></a>
						</div>
						<div class="service-info">
							<h3>Avaliar</h3>
							<p>Faça uma avaliação de determinado estabelecimento</p>
						</div>
					</div>
					<div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
						<div class="service-icon">
							<i class="fa fa-handshake-o"></i>
						</div>
						<div class="service-info">
							<h3>Buscar um acordo</h3>
							<p>Fazer o possível para que o estabelecimento entre em um acordo com o cliente</p>
						</div>
					</div>
					<div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="650ms">
						<div class="service-icon">
							<a style="color: white;"href="Google Maps/mapa.html"><i><span class="glyphicon glyphicon-map-marker"></span></i></a>
						</div>
						<div class="service-info">
						  <h3>Localização das empresas</h3>
						  <p>Visualizar os pontos em que cada empresa está localizada.</p>
						</div>
					</div>
					<script type="text/javascript">
						function myhref(web){
						  window.location.href = web;}
					</script>
					<div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="750ms" href="rankings.html" onclick="myhref('rankings.html');">
						<div class="service-icon">
							<i style="cursor:pointer;" class="fa fa-bar-chart"></i>
						</div>
						<div class="service-info">
							<h3>Exibir rankings</h3>
							<p>Exibir rankings com diversos critérios sobre os estabelecimentos.</p>
						</div>
					</div>
					<div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="850ms" style="margin-top: 60px">
						<div class="service-icon">
							<i class="fa fa-check-square"></i>
						</div>
						<div class="service-info">
							<h3>Verificar satisfação</h3>
							<p>Concluir reclamação e verificar satisfação com a resolução do problema</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--FIM DO SECTION SERVIÇOS-->

	<!--mapa-->
	<section id="mapa">
		</br>
		</br>
		</br>
		</br>
		</br>
		<!-- Hiring -->
		<div id="hiring" class="parallax2-bg3 text-light" style="background-position: 50% 0%; margin-top: -13%; height: 430px;" data-stellar-background-ratio="0.5">
			<br/><br/>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 class="mapaletra wow fadeIn" style="text-align: center; margin-top: 6%;">Mapa das Empresas</h2>
						<div class="row">
							<div class="col-md-4 col-md-offset-4">
								<hr class="mapaletra">
							</div>
						</div>
						<p class="mapaletra wow fadeIn" style="text-align: center;">Possibilidade de ver as empresas cadastradas no mapa da cidade </p>
						<p class="mapaletra wow fadeInUp" style="text-align: center;">
							<button class="buttonmap" type="submit" onclick="location.href='file:Google Maps/mapa.html'" .click();>Ver Empresas</button>
						</p>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<br/><br/>

		</div>
	</section>
	<!-- End Hiring -->



	<!-- Portfolio Grid Section -->
	<section id="portfolio" class="bg-light-gray">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 id="txtma" class="selectionma">Melhores Avaliados</h2>
					<h3 class="section-subheading text-muted" style="margin-bottom: 5%;">Estabelecimentos com as melhores avaliações</h3>
				</div>
			</div>

			<!--
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#imagem" class="portfolio-link" data-toggle="modal" >

						<div class="hoverempresa">
                            <div class="portfolio-hover-content">
                        </div>
						</div>

                        <img  src="images/melhores avaliados/portfolio-1.jpg" class="img-responsive" alt="">

                    </a>
                    <div class="portfolio-caption">
                        <h4>#1</h4>
                        <p id="s" class="text-muted">Hills</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">

					   <div class="hoverempresa2">
                            <div class="portfolio-hover-content">
                            </div>
                        </div>

                        <img src="images/melhores avaliados/portfolio-2.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>#2</h4>
                        <p id="s" class="text-muted">San Genaro</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">

                        <div class="hoverempresa3">
                            <div class="portfolio-hover-content">
							</div>
                        </div>

                        <img src="images/melhores avaliados/portfolio-3.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>#3</h4>
						<p id="s" class="text-muted">Burger King</p>
                    </div>
                </div>
-->
			<div class="container">




				<table class="table tableJS table-striped table-hover responsive" style="width: 100%">
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
						<tr>
							<td>2</td>
							<td>Chiquinho Sorvetes</td>
							<td>Sorveteria</td>
							<td>90.3</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Espaço Girl</td>
							<td>Vestuário</td>
							<td>89.9</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Açaí Mania</td>
							<td>Sorveteria</td>
							<td>89.3</td>
						</tr>
						<tr>
							<td>5</td>
							<td>Actual</td>
							<td>Vestuário</td>
							<td>89.4</td>
						</tr>
						<tr>
							<td>6</td>
							<td>Cacau Brasil</td>
							<td>Chocolateria</td>
							<td>87.1</td>
						</tr>
						<tr>
							<td>7</td>
							<td>Óticas Carol</td>
							<td>Acessórios</td>
							<td>86.2</td>
						</tr>
						<tr>
							<td>8</td>
							<td>Pernambucanas</td>
							<td>Vestuário</td>
							<td>80.9</td>
						</tr>
						<tr>
							<td>9</td>
							<td>Açougue Sinhá</td>
							<td>Alimentos</td>
							<td>77.8</td>
						</tr>
						<tr>
							<td>10</td>
							<td>Sandrini</td>
							<td>Vestuário</td>
							<td>75.3</td>
						</tr>
					</tbody>
				</table>


				<h3 class="section-subheading text-muted" style="margin-bottom: 5%; text-align: center;">Estabelecimentos com as piores avaliações</h3>



				<table class="table tableJS table-striped table-hover responsive" style="width: 100%">
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
							<td>Lojão Pague 10</td>
							<td>Vestuário</td>
							<td>7.8</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Malu Presentes</td>
							<td>Acessórios</td>
							<td>9.3</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Big Jhonny</td>
							<td>Restaurante</td>
							<td>10.1</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Mamuska</td>
							<td>Vestuário</td>
							<td>12.9</td>
						</tr>
						<tr>
							<td>5</td>
							<td>Toque Final</td>
							<td>Vestuário</td>
							<td>15.7</td>
						</tr>
						<tr>
							<td>6</td>
							<td>Casas Bahia</td>
							<td>Loja</td>
							<td>17.3</td>
						</tr>
						<tr>
							<td>7</td>
							<td>BVCI</td>
							<td>Internet</td>
							<td>21.6</td>
						</tr>
						<tr>
							<td>8</td>
							<td>CVC</td>
							<td>Viagens</td>
							<td>23.9</td>
						</tr>
						<tr>
							<td>9</td>
							<td>Cacau Show</td>
							<td>Chocolateria</td>
							<td>27.8</td>
						</tr>
						<tr>
							<td>10</td>
							<td>Droga Raia</td>
							<td>Drogaria</td>
							<td>30.3</td>
						</tr>
					</tbody>
				</table>


				<a href="#veja" style="margin-left: 2%;color: #008cba; text-decoration: underline;"> Veja o ranking completo </a>

			</div>
		</div>
		<section id="about-us2" />
	</section>

	<section id="about-us" class="parallax" style="padding: 50px;">
		<div class="row">
			<div class='col-md-offset-2 col-md-8 text-center'>
				<br>
				<h2>Comentários</h2>
			</div>
		</div>
		<div class='row'>
			<div class='col-md-offset-2 col-md-8'>
				<div class="carousel slide" data-ride="carousel" id="quote-carousel">
					<!-- Bottom Carousel Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#quote-carousel" data-slide-to="1"></li>
						<li data-target="#quote-carousel" data-slide-to="2"></li>
					</ol>

					<!-- Carousel Slides / Quotes -->
					<div class="carousel-inner">

						<!-- Quote 1 -->
						<div class="item active">
							<blockquote>
								<div class="row">
									<div class="col-sm-3 text-center">
										<img class="img-circle" src="http://www.reactiongifs.com/r/overbite.gif" style="width: 100px;height:100px; margin-left: 15%;">
										<!--<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;">-->
									</div>
									<div class="col-sm-9">
										<p style="margin-top: 3%;"> Jantei ontem no San Genaro e concorri a um sorteio que acabei sendo campeao!! Estou muito grato.</p>
										<small>Tiuzinho do Juju</small>
									</div>
								</div>
							</blockquote>
						</div>
						<!-- Quote 2 -->
						<div class="item">
							<blockquote>
								<div class="row">
									<div class="col-sm-3 text-center">
										<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/mijustin/128.jpg" style="width: 100px;height:100px;margin-left: 15%;">
									</div>
									<div class="col-sm-9">
										<p style="margin-top: 4%;">Adorei comer no Hills e a sobremesa estava sensacional!!!</p>
										<small>Mc Livinha do Paraguai</small>
									</div>
								</div>
							</blockquote>
						</div>
						<!-- Quote 3 -->
						<div class="item">
							<blockquote>
								<div class="row">
									<div class="col-sm-3 text-center">
										<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/keizgoesboom/128.jpg" style="width: 100px;height:100px;margin-left: 15%;">
									</div>
									<div class="col-sm-9">
										<p style="margin-top: 4%;">Fui almoçar na churrascaria Dilino e realmente achei a comida divinaaaa!!! </p>
										<small>Mina Tumblr</small>
									</div>
								</div>
							</blockquote>
						</div>
					</div>

					<!-- Carousel Buttons Next/Prev -->
					<a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
					<a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
				</div>
			</div>
		</div>
	</section>
	<!--/#about-us-->

	<!-- Portfolio Grid Section -->
	<section id="semana">
		<section id="portfolio" class="bg-light-gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2 id="txtma" class="selectionma">Estabelecimentos com tendências de problemas</h2><br>
					</div>
				</div>
				<!--
                    <h3 class="section-subheading text-muted" style="margin-bottom: 5%;">Categoria : Pizzaria</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                </div>

                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">

					   <div class="hoverempresa2">
                            <div class="portfolio-hover-content">
                            </div>
                        </div>

                        <img src="images/melhores avaliados/portfolio-2.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>* Avaliações na semana *</h4>
                        <p id="s" class="text-muted">San Genaro</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                </div>

-->

				<table class="table tableJS table-striped table-hover responsive" style="width: 100%">
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
						<tr>
							<td>2</td>
							<td>Chiquinho Sorvetes</td>
							<td>Sorveteria</td>
							<td>90.3</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Espaço Girl</td>
							<td>Vestuário</td>
							<td>89.9</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Açaí Mania</td>
							<td>Sorveteria</td>
							<td>89.3</td>
						</tr>
						<tr>
							<td>5</td>
							<td>Actual</td>
							<td>Vestuário</td>
							<td>89.4</td>
						</tr>
					</tbody>
				</table>

			</div>

		</section>
	</section>

	<section id="features" class="parallax" style="color: white;">
		<div class="container">
			<div class="row count">
				<div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
					<i class="fa fa-user"></i>
					<h3 class="timer">700</h3>
					<p>Reclamações Atendidas</p>
				</div>
				<div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
					<i class="fa fa-desktop"></i>
					<h3 class="timer">1000</h3>
					<p>Estabelecimentos Cadastrados</p>
				</div>
				<div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="700ms">
					<i class="fa fa-trophy"></i>
					<h3 class="timer">500</h3>
					<p>Clientes Satisfeitos</p>
				</div>
				<div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="900ms">
					<i class="fa fa-comment-o"></i>
					<h3>24/7</h3>
					<p>Rápido Atendimento</p>
				</div>
			</div>
		</div>
	</section>


	<!--/#about-us-->

	<!--RODAPÉ-->
	<footer id="footer" style="background-color: #232323; margin-bottom: -10%;">
		<div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
			<div class="container text-center">
				<div class="tudo">

					<div class="logo">
						<a href="../../index.html"><img style="margin-left: 30%; margin-top: 4%;" class="img-responsive" src="images/logo.png" alt=""></a>
						<div id="icons" class="social-icons" style="margin-top: 5%;">
							<ul>
								<li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
								<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
							</ul>
						</div>
					</div>

					<div class="texto">
						<h3>Sobre o IFSP e o projeto</h3>
						<p id="paragrafinho">Somos uma equipe de alunos do Instituto Federal de São Paulo - Campus São João da Boa Vista, que buscam finalizar o projeto proposto em uma das disciplinas com o maior sucesso possível. <br/></p>
						<p id="paragrafo">Ao alcançar esse sucesso, estaremos proporcionando para a cidade um novo sistema que pode impulsionar o comércio justo e maior comprometimento por parte dos estabelecimentos presentes na cidade.  <a href="mod01-SobreProjeto.html">Saiba mais...</a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom" style="background-color: #191919;">
			<div class="container">
				<div class="row">
					<div class="col-sm-6" style=" color: white">
						<p>&copy; 2017 IFSP-SBV</p>
					</div>
					<div class="col-sm-6">
						<p class="pull-right" style="color: white;">Construído por <a style="color: white;" href="http://sbv.ifsp.edu.br/">Equipe IFSP</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--FIM DO RODAPÉ-->

	<!--script em geral-->


	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="js/mod04/datatable.js"></script>
	<script type="text/javascript" src="js/mod04/redirectRankingsRelatorios.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript" src="js/jquery.inview.min.js"></script>
	<script type="text/javascript" src="js/wow.min.js"></script>
	<script type="text/javascript" src="js/mousescroll.js"></script>
	<script type="text/javascript" src="js/smoothscroll.js"></script>
	<script type="text/javascript" src="js/jquery.countTo.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<!--fim do script em geral-->

	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<!-- smooth scrolling-bottom-to-top -->
	<script type="text/javascript">
		$(document).ready(function() {

			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
			};
			$().UItoTop({
				easingType: 'easeOutQuart'
			});
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling-bottom-to-top -->

</body>

</html>
