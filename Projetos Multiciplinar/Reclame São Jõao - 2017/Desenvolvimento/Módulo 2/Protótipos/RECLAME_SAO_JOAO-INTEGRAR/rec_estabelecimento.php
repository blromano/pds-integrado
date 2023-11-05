<?php
   include_once("rec_conexao.php");
   
   $telefone = null;
   $link     = $_GET["link"];
   $busca    = $_GET["EST_NOME"];
   $idatual = 0;
   $total_notas     = 0;
   $sql    = "SELECT * FROM estabelecimentos WHERE EST_NOME_FANTASIA = '$busca'";
   $result = $conn->query($sql);
   if ($result->num_rows == 0) {
       echo "<script>alert('Estabelecimento nao encontrado')</script><script>window.location='$link';</script>";
   } else if ($result != null) {
       if ($result->num_rows > 0) {
           
           
           while ($row = $result->fetch_assoc()) {
               $nome_responsavel             = $row["EST_NOME_RESPONSAVEL"];
               $total_reclamacao             = $row["EST_TOTAL_RECLAMACAO"];
               $nome_fantasia                = $row["EST_NOME_FANTASIA"];
               $id_estabelecimento           = $row["EST_ID"];
               $numero_endereco              = $row["EST_NUMERO_ENDERECO"];
               $publico_alvo                 = $row["EST_PUBLICO_ALVO"];
               $facebook_empresa             = $row["EST_FACEBOOK_EMPRESA"];
               $longitude                    = $row["EST_LONGITUDE"];
               $latitude                     = $row["EST_LATITUDE"];
               $bloqueio                     = $row["EST_STATUS_BLOQUEIO"];
               $media_avaliacao_consumidores = $row["EST_MEDIA_AVALIACAO_CONSUMIDORES"];
               $media_reclamacao             = $row["EST_MEDIA_RECLAMACAO"];
               $complemento                  = $row["EST_COMPLEMENTO"];
               $site                         = $row["EST_SITE_EMPRESA"];     
           }
      
             
           session_start();
           $_SESSION["nome"]   = $nome_fantasia;
           $_SESSION["EST_ID"] = $id_estabelecimento;     
		   $_SESSION["facebook"] = $facebook_empresa;  
		      		 
       }
   }  
   
   //AVALIAÇÕES
   
   $sql    = "SELECT AVA_NOTA FROM AVALIACOES_ESTABELECIMENTOS WHERE EST_ID =" . $id_estabelecimento;
   $result = $conn->query($sql);
   if ($result != null) {
       if ($result->num_rows > 0) {
           $positivas = null;
           $neutras   = null;
           $negativas = null;
           $total     = 0;
           $media_ava = null;
           while ($row = $result->fetch_assoc()) {
               $total = $total + $row["AVA_NOTA"];
               if ($row["AVA_NOTA"] <= 2) {
                   
                   $negativas = $negativas + 1;
               } else if ($row["AVA_NOTA"] == 3) {
                   $neutras = $neutras + 1;
               } else if ($row["AVA_NOTA"] >= 4) {
                   $positivas = $positivas + 1;
               }
           }     
       }
   }
   
   $sql    = "SELECT REC_NOTA FROM RECLAMACOES WHERE EST_ID =" . $id_estabelecimento;
   $result = $conn->query($sql);
   if ($result != null) {
       if ($result->num_rows > 0) {
           $total_notas     = 0;
           while ($row = $result->fetch_assoc()) {
               $total_notas = $total_notas + $row["REC_NOTA"];
           }     
       }
   }
   
   $sql    = "SELECT COUNT(AVA_ID) AS qtde FROM AVALIACOES_ESTABELECIMENTOS WHERE EST_ID =" . $id_estabelecimento;
   $result = $conn->query($sql);
   if ($result != null) {
       $row = $result->fetch_assoc();
       
       if ($row["qtde"] == 0) {
           $media_ava        = 0;
           $total_avaliacoes = 0;
           $total            = 0;
           $positivas        = 0;
           $neutras          = 0;
           $negativas        = 0;
          
       } else if ($row["qtde"] > 0) {
           $total_avaliacoes = $row["qtde"];
           
           
           $media_ava = $total / $total_avaliacoes;
		   $media_avaliacao_round = ROUND($media_ava, 0);
       }
   }
   
    $sql = "UPDATE estabelecimentos SET EST_MEDIA_AVALIACAO_CONSUMIDORES = $media_ava WHERE EST_ID='$id_estabelecimento'";
    $result = $conn->query($sql);
	
	$sql = "SELECT EST_ID FROM estabelecimentos WHERE EST_NOME_FANTASIA = '$busca'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	$idatual = $row["EST_ID"];
	}
	} else {
	echo "0 results";
	}

	$totalreclamacao = 0;

	  
	$sql = "SELECT AVA_NOTA FROM avaliacoes_estabelecimentos WHERE EST_ID='$id_estabelecimento' ORDER BY AVA_ID DESC LIMIT 3";
	$result = $conn->query($sql);
	$cont=0;
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	$media_ava_estabelecimento[$cont]= $row["AVA_NOTA"];
	$cont++;
	}
	} else {

	}	
	
	$sql = "SELECT AVA_DESCRICAO FROM avaliacoes_estabelecimentos WHERE EST_ID='$id_estabelecimento' ORDER BY AVA_ID DESC LIMIT 3";
	$result = $conn->query($sql);
	$contdescricao=0;
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	$descricao[$contdescricao] = $row["AVA_DESCRICAO"];
	$contdescricao++;
	}
	} else {

	}	
	
	$sql = "SELECT CON_ID FROM avaliacoes_estabelecimentos WHERE EST_ID =".$id_estabelecimento;
	$result = $conn->query($sql);
	$contusuario = 0;
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
	$usuario[$contusuario] = $row["CON_ID"];
	$contusuario++;
	}
	} else {

	}	
	
   $sql    = "SELECT COUNT(REC_ID) AS contrec FROM reclamacoes WHERE EST_ID =" . $id_estabelecimento;
   $result = $conn->query($sql);
   if ($result != null) {
       $row = $result->fetch_assoc();
       
       if ($row["contrec"] == 0) {
           $totalreclamacao = 0;
       } else if ($row["contrec"] > 0) {
           $totalreclamacao = $row["contrec"];
           
       }
   }
   
   if($total_notas != 0 && $totalreclamacao != 0){
		$media_reclamacao = $total_notas / $totalreclamacao;
		$media_reclamacao = round($media_reclamacao, 1);
   }else{
	   echo "";
   }
    $sql = "UPDATE estabelecimentos SET EST_MEDIA_RECLAMACAO = $media_reclamacao WHERE EST_ID='$id_estabelecimento'";
    $result = $conn->query($sql);

?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Reclame São João</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css/rec_main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/css/rec_ie8.css" /><![endif]-->
		<title>Reclame São João</title>
		<link href="css/menu.min.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/testes.css" rel="stylesheet">
		<link href="css/rodape2.css" rel="stylesheet">
		<link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="css/depoimentos.css" rel="stylesheet">
		<link href="css/rec_estabelecimento.css" rel="stylesheet">
		<link rel="shortcut icon" href="images/favicon.ico">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
		<link href="css/rec_estrela.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/avaliations.js"></script>
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
		
	</head>
	
	<body class="homepage" id="conteudocentral">
	
     <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" style="border: 1px solid transparent;" >
            <h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>
          </a>   
		  
        </div>

	<form action="rec_estabelecimento.php" method=get name="formulario3"> 
<input type="hidden" name="EST_NOME" value="<?php echo $_SESSION["nome"]; ?>">
<input type="hidden" name="link" value="index.php">
</form> 	
	
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right" style="height: 80px;">   
			<li class="scroll active" style="cursor: pointer;"><a onclick="redirect()">Estabelecimento</a></li>
			<li class="scroll"><a href="index.php">Home</a></li>
			<li class="scroll"><a href="contato.php">User</a></li>
			
			<li id="extras" class="scroll"><a onclick="reclamar()"  style="cursor: pointer;"><span>Reclamar</span></a></li>
			<li id="extras" class="scroll"><a onclick="avaliar()" style="cursor: pointer;"><span>Avaliar</span></a></li>
			<li id="extras" class="scroll"><a onclick="location.href='rec_info.php'" style="cursor: pointer;"><span>Mais Informações</span></a></li>
			<li id="extras" class="scroll"><a onclick="location.href='rec_duvidas.php'" style="cursor: pointer;"><span>Dúvidas</span></a></li>
		  </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
	
		<div id="page-wrapper">
<form action='rec_estabelecimento.php' method='get'>
  
  <center>
  <div class="pesquisa" id="barradepesquisa">  
    <input type='text'  name='EST_NOME' class="form-input check-value auto" id="inputpesquisa" placeholder="Buscar">
    <button type="submit" class="buttonpesquisa" name="destination-submit" onclick="location.href='rec_estabelecimento.php'".click()><span class="glyphicon glyphicon-search"></span></button>
  </div>
  <input type="hidden" name="link" value="index.php">
  </center>

</form>
			<!-- Header -->
				<div id="header-wrapper" >
				<div id="header" style="border-bottom: solid 0px #e5e5e5;box-shadow: inset 0px 0px 0px 0px #fff, inset 0px 0px 0px 0px #e5e5e5;" class="container">

						<!-- Logo -->
						
						
							<h1 id="logo"><a href="#footer"><?php echo wordwrap($nome_fantasia, 20,  "<br/><br/>"); ?></a></h1>
							<h1 id="logo2"><a href="#footer"><?php echo ($nome_fantasia); ?></a></h1>
							<p>Bem Vindo a página do estabelecimento. Aqui voce ve todas as informações do estabelecimento.</p>


						<form action="rec_formulario.php" method=post name="formulario1"> 
						<input type="hidden" name="reclamar" value="<?php echo ($nome_fantasia);?>">
						</form> 
								
						<form action="ava_formulario.php" method=post name="formulario2"> 
						<input type="hidden" name="avaliar" value="<?php echo ($nome_fantasia);?>">
						</form> 
				
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a class="fa fa-comments" onclick="reclamar()"  style="cursor: pointer;"><span>Reclamar</span></a></li>
									<li><a class="fa fa-star-half-o" onclick="avaliar()" style="cursor: pointer;"><span>Avaliar</span></a></li>
									<li><a class="fa fa-list-alt" onclick="redirect()" style="cursor: pointer;"><span>Estabelecimento</span></a></li>
									<li><a class="fa fa-list-alt" onclick="location.href='rec_info.php'" style="cursor: pointer;"><span>Mais Informações</span></a></li>
									<li><a class="fa fa-info-circle" onclick="location.href='rec_duvidas.php'" style="cursor: pointer;"><span>Dúvidas</span></a></li>
								</ul>
							</nav>

					</div>
				</div>

	<!-- Banner -->
				<div id="banner-wrapper">
					<div class="inner">
						<section id="banner" class="container">
						
							<p>Clique no botão <strong>para encontrar</strong>,<br />
							Estabelecimentos cadastrados no mapa da cidade.</p>
							
                            
                        <ul class="vermapa">
							<li><a href="mapa.html" class="button icon fa-map-marker">Ver mapa</a></li>
						</ul>
						
						</section>
						
					</div>
				</div>
</div>

			<!-- Features -->
						<div id="features-wrapper">
					<section id="" class="container">
						<header>
							<h2>Veja! Essa é a<strong> Reputação do Estabelecimento</strong>!</h2>
						</header>
						<div class="row">
							<div class="4u 12u(mobile)">
							</div>
							<div class="4u 12u(mobile)">

								<!-- Feature -->
									<section>
									<?php 
									if($media_avaliacao_consumidores == 0){
									echo '<a class="image featured"><img src="images/nada.jpg" /></a>';
									}
									else if($media_avaliacao_consumidores >= 1 && $media_avaliacao_consumidores < 3) {
									echo '<a class="image featured"><img src="images/triste.jpeg" /></a>';
									}
									else if($media_avaliacao_consumidores == 3) {
									echo '<a class="image featured"><img src="images/neutro.jpg" /></a>';
									}
									else if($media_avaliacao_consumidores > 3 && $media_avaliacao_consumidores <= 5) {
									echo '<a class="image featured"><img src="images/feliz.jpeg" /></a>';
									}
									?>
	
										<?php
										$id = $idatual;
										$pegaArtigo = $pdo->prepare("SELECT * FROM `estabelecimentos` WHERE EST_ID = ?");
										$pegaArtigo->execute(array($id));
										while($artigo = $pegaArtigo->fetchObject()){
										$calculo = round(($artigo->EST_MEDIA_AVALIACAO_CONSUMIDORES), 2);
										?>
											
										<span class="ratingAverage" data-average="<?php echo $calculo;?>"></span>
										<span class="article" data-id="<?php echo $id;?>"></span>

										<center><div class="barra">
										<span class="bg"></span>
										<span class="stars">
										<?php for($i=1; $i<=5; $i++):?>


										<span style="cursor: default;" class="star" data-vote="<?php echo $i;?>">
										<span class="starAbsolute"></span>
										</span>
										<?php 
										endfor;
										echo '</span></div></center><center><p class="votos" style="margin-top: 2%;">(<span ">'.$total_avaliacoes.'</span>) avaliações</p></center>';
										}
										?>
										
										<header>
											<h3>Bem! O que significa?</h3>
										</header>
										<p>Essas são as avaliações do consumidores para o estabelecimento <?php echo ($nome_fantasia);?> baseado nas avaliações e reclamações feitas pelos usuários</p>
									
								
								</section>
							</div>
							<div class="4u 12u(mobile)">

							

							</div>
						</div>
						
						<ul class="actions">
							<li><a href="rec_duvidas.php" class="button icon fa-file">Ver Mais!!!</a></li>
						</ul>
					</section>
				</div>	
				
				<div style="padding: 3em 0 3em 0; border-top: solid 2px #e5e5e5;border-bottom: solid 2px #e5e5e5;box-shadow: inset 0px -8px 0px 0px #fff, inset 0px -10px 0px 0px #e5e5e5, inset 0px 8px 0px 0px #fff, inset 0px 10px 0px 0px #e5e5e5;">

				<div style="position: relative;overflow: hidden;background: #fff;color: #fff;background: url('images/banner.jpg');background-size: cover; " >

				<div class=''>
				<br>
				<header>
				<h2><strong style="color: white; margin-left: 2%;">Avaliações</strong></h2>
				</header>
				</div>

				<div class='row'>

				<div class="carousel slide" data-ride="carousel" id="quote-carousel"  style=" width: 100%;">
				<!-- Bottom Carousel Indicators -->
				<center><ol class="carousel-indicators">
				<li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
				<li data-target="#quote-carousel" data-slide-to="1"></li>
				<li data-target="#quote-carousel" data-slide-to="2"></li>
				</ol></center>

				<!-- Carousel Slides / Quotes -->
				<div class="carousel-inner">

				<!-- Quote 1 -->

				<blockquote class="item active">

				<?php 			
				if ($cont >= 1): ?>

				

				<div class="estrelas" style="margin-bottom: 0%;">
				<label for="cm_star-1"><i class="fa"></i></label>
				<input type="radio" id="cm_star-1" name="fb" value="1" <?php
				if ($media_ava_estabelecimento[0] >= 0 && $media_ava_estabelecimento[0] < 2) {
				$ranking = "cm_star-1";
				}
				?>/>
				<label for="cm_star-2"><i class="fa"></i></label>
				<input type="radio" id="cm_star-2" name="fb" value="2" <?php
				if ($media_ava_estabelecimento[0] >= 2 && $media_ava_estabelecimento[0] < 3) {
				$ranking = "cm_star-2";
				}
				?>/>
				<label for="cm_star-3"><i class="fa"></i></label>
				<input type="radio" id="cm_star-3" name="fb" value="3"<?php
				if ($media_ava_estabelecimento[0] >= 3 && $media_ava_estabelecimento[0] < 4) {
				$ranking = "cm_star-3";
				}
				?>/>
				<label for="cm_star-4"><i class="fa"></i></label>
				<input type="radio" id="cm_star-4" name="fb" value="4"<?php
				if ($media_ava_estabelecimento[0] >= 4 && $media_ava_estabelecimento[0] < 5) {
				$ranking = "cm_star-4";
				}
				?>/>
				<label for="cm_star-5"><i class="fa"></i></label>
				<input type="radio" id="cm_star-5" name="fb" value="5"<?php
				if ($media_ava_estabelecimento[0] >= 5 && $media_ava_estabelecimento[0] < 6) {
				$ranking = "cm_star-5";
				}
				?>/>
				</div>
				
				<span style="margin-top: 3%; margin-bottom: 5px;"><?php echo $descricao[0]; ?></span><br><br>
				<span style="margin-top: 3%; margin-bottom: 5px;">Alexandre de Filho</span>

				<?php else: ?>
				<br>
				<center><span style="font-family: calibri;">Não possui ainda uma primeira avaliação. <a id="ava_comentario" href="ava_formulario.php">Faça agora a sua :)</a></span></center>
				<br><br>
				<?php endif; ?>

				</blockquote>

				<!-- Quote 2 -->

				<blockquote class="item">

				<?php 			
				if ($cont >= 2): ?>

				<div class="estrelas">
				<label for="cm_star-11"><i class="fa"></i></label>
				<input type="radio" id="cm_star-11" name="fa" value="1" <?php
				if ($media_ava_estabelecimento[1] >= 0 && $media_ava_estabelecimento[1] < 2) {
				$ranking2 = "cm_star-11";
				}
				?>/>
				<label for="cm_star-22"><i class="fa"></i></label>
				<input type="radio" id="cm_star-22" name="fa" value="2" <?php
				if ($media_ava_estabelecimento[1] >= 2 && $media_ava_estabelecimento[1] < 3) {
				$ranking2 = "cm_star-22";
				}
				?>/>
				<label for="cm_star-33"><i class="fa"></i></label>
				<input type="radio" id="cm_star-33" name="fa" value="3"<?php
				if ($media_ava_estabelecimento[1] >= 3 && $media_ava_estabelecimento[1] < 4) {
				$ranking2 = "cm_star-33";
				}
				?>/>
				<label for="cm_star-44"><i class="fa"></i></label>
				<input type="radio" id="cm_star-44" name="fa" value="4"<?php
				if ($media_ava_estabelecimento[1] >= 4 && $media_ava_estabelecimento[1] < 5) {
				$ranking2 = "cm_star-44";
				}
				?>/>
				<label for="cm_star-55"><i class="fa"></i></label>
				<input type="radio" id="cm_star-55" name="fa" value="5"<?php
				if ($media_ava_estabelecimento[1] >= 5 && $media_ava_estabelecimento[1] < 6) {
				$ranking2 = "cm_star-55";
				}
				?>/>
				</div>
				
				<span style="margin-top: 3%; margin-bottom: 5px;"><?php echo $descricao[1]; ?></span><br><br>
				<span style="margin-top: 3%; margin-bottom: 5px;">Rodrigo Faria</span>
				
				
				<?php else: ?>
				<br>
				<center><span style="font-family: calibri;">Não possui ainda uma segunda avaliação. <a id="ava_comentario" href="ava_formulario.php">Faça agora a sua :)</a></span></center>
				<br><br>
				<?php endif; ?>

				</blockquote>
				
				<!-- Quote 3 -->
				
				<blockquote class="item">

				<?php 			
				if ($cont >= 3): ?>

				<div class="estrelas">
				<label for="cm_star-111"><i class="fa"></i></label>
				<input type="radio" id="cm_star-111" name="fc" value="1" <?php
				if ($media_ava_estabelecimento[2] >= 0 && $media_ava_estabelecimento[2] < 2) {
				$ranking3 = "cm_star-111";
				}
				?>/>
				<label for="cm_star-222"><i class="fa"></i></label>
				<input type="radio" id="cm_star-222" name="fc" value="2" <?php
				if ($media_ava_estabelecimento[2] >= 2 && $media_ava_estabelecimento[2] < 3) {
				$ranking3 = "cm_star-222";
				}
				?>/>
				<label for="cm_star-333"><i class="fa"></i></label>
				<input type="radio" id="cm_star-333" name="fc" value="3"<?php
				if ($media_ava_estabelecimento[2] >= 3 && $media_ava_estabelecimento[2] < 4) {
				$ranking3 = "cm_star-333";
				}
				?>/>
				<label for="cm_star-444"><i class="fa"></i></label>
				<input type="radio" id="cm_star-444" name="fc" value="4"<?php
				if ($media_ava_estabelecimento[2] >= 4 && $media_ava_estabelecimento[2] < 5) {
				$ranking3 = "cm_star-444";
				}
				?>/>
				<label for="cm_star-555"><i class="fa"></i></label>
				<input type="radio" id="cm_star-555" name="fc" value="5"<?php
				if ($media_ava_estabelecimento[2] >= 5 && $media_ava_estabelecimento[2] < 6) {
				$ranking3 = "cm_star-555";
				}
				?>/>
				</div>

				<span style="margin-top: 3%; margin-bottom: 5px;"><?php echo $descricao[2]; ?></span><br><br>
				<span style="margin-top: 3%; margin-bottom: 5px;">Rodrigo Jafez</span>
				
				<?php else: ?>
				<br>
				<center><span style="font-family: calibri;">Não possui ainda uma terceira avaliação. <a id="ava_comentario" href="ava_formulario.php">Faça agora a sua :)</a></span></center>
				<br><br>
				<?php endif; ?>

				</blockquote>
				
				</div>

				<!-- Carousel Buttons Next/Prev -->

				</div>                          

				</div>
				<center>
				<br>
				<a href="rec_reclamacaoeavaliacao.php" class="button icon fa-file" id="ola">Ver Todas!!!</a>
				
				</center>
				


			
					
				</div>
</div>
		

							<div id="features-wrapper">
					<section id="info" class="container">
						<header>
							<h2>Veja Tudo! Essas são <strong>Informações Importantes</strong>!</h2>
						</header>
						<div class="row">
							<div class="4u 12u(mobile)">

								<!-- Feature -->
									<section>
										<a href="#info" class="image featured" style=" border-radius: 50%;display: inline-block;height: 100px;width: 100px;background-color: white;">
										<p style="position: relative;top: 50%;transform: translateY(-50%); ">
										<?php
										if ($positivas != null) {?>
										<span style="color: green; font-size: 25px; font-family: arial black;"><?php echo $positivas; ?></span>
										<?php
										} else {?>
										<span style="color: green; font-size: 25px; font-family: arial black;">0</span>
										<?php
										}
										?>
										</p></a>
										<header>
											<h3>Positivas</h3>
										</header>
										<p>
										Essas são as avaliações positivas feitas pelos usuarios cadastrados no sistema.</p>
									</section>

							</div>
							<div class="4u 12u(mobile)">

								<!-- Feature -->
									<section>
									<a href="#info" class="image featured" style=" border-radius: 50%;display: inline-block;height: 100px;width: 100px;background-color: white;">
									<p style="position: relative;top: 50%;transform: translateY(-50%); ">
									<?php
									if ($negativas != null) {?>
									<span style="color: green; font-size: 25px; font-family: arial black;"><?php echo $negativas; ?></span>
									<?php
									} else {?>
									<span style="color: green; font-size: 25px; font-family: arial black;">0</span>
									<?php
									}
									?>
									</p></a>
										<header>
											<h3>Negativas</h3>
										</header>
										<p>
										Essas são as avaliações negativas feitas pelos usuarios cadastrados no sistema.</p>
									</section>

							</div>
							<div class="4u 12u(mobile)">

								<!-- Feature -->
									<section>
										<a href="#info" class="image featured" style=" border-radius: 50%;display: inline-block;height: 100px;width: 100px;background-color: white;">
										<p style="position: relative;top: 50%;transform: translateY(-50%); ">
										<?php
										if ($neutras != null) {?>
										<span style="color: green; font-size: 25px; font-family: arial black;"><?php echo $neutras; ?></span>
										<?php
										} else {?>
										<span style="color: green; font-size: 25px; font-family: arial black;">0</span>
										<?php
										}
										?>
										</p></a>
										<header>
											<h3>Neutras</h3>
										</header>
										<p>
										Essas são as avaliações neutras feitas pelos usuarios cadastrados no sistema.</p>
									</section>

							</div>
						</div>
						<div class="row" >
						
							<div class="4u 12u(mobile)" id="divinfo">

								<!-- Feature -->
									<section >
										<a href="#info" class="image featured" style=" border-radius: 50%;display: inline-block;height: 100px;width: 100px;background-color: white;">
										<p style="position: relative;top: 50%;transform: translateY(-50%); ">
										<?php
										if ($total_avaliacoes != null) {?>
										<span style="color: green; font-size: 25px; font-family: arial black;"><?php echo $total_avaliacoes; ?></span>
										<?php
										} else {?>
										<span style="color: green; font-size: 25px; font-family: arial black;">0</span>
										<?php
										}
										?>
										</p></a>
										<header>
											<h3>Total de avaliações</h3>
										</header>
										<p>
										Essas são todas as avaliações feitas pelos usuarios cadastrados no sistema.</p>
									</section>

							</div>
							<div class="4u 12u(mobile)" >

								<!-- Feature -->
									<section>
								<a href="#info" class="image featured" style=" border-radius: 50%;display: inline-block;height: 100px;width: 100px;background-color: white;">
								<p style="position: relative;top: 50%;transform: translateY(-50%); ">
									<?php
									if ($totalreclamacao != null) {?>
									<span style="color: green; font-size: 25px; font-family: arial black;"><?php echo $totalreclamacao; ?></span>
									<?php
									} else {?>
									<span style="color: green; font-size: 25px; font-family: arial black;">0</span>
									<?php
									}
									?>
								</p></a>
										<header>
											<h3>Total de reclamações</h3>
										</header>
										<p>
										Essas são todas as reclamações feitas pelos usuarios cadastrados no sistema.</p>
									</section>

							</div>
						</div>
						<ul class="actions">
							<li><a href="rec_reclamacaoeavaliacao.php" class="button icon fa-file">Ver Mais!!!</a></li>
						</ul>
					</section>
				</div>
				
		</div>
		

		<!--RODAPÉ-->
	<footer id="footer" style="background-color: #232323; margin-top: 2.5%;" >
		<div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
		<div class="container text-center">
		<div class="tudo">

			<div class="logo" id="ajusteslogo">
			<a href="index.php"><img style="margin-left: 30%; margin-top: 4%;"  class="img-responsive" src="images/logo.png" alt=""></a> 
				<div id="icons" class="social-icons" style="margin-top: 5%;" >
				<ul id="rodapeul">
				<li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
				<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
				<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
				<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
				<li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
				</ul>
				</div>
			</div>

			<div class="texto" id="ajustestexto">
				<h3>Sobre nós</h3>
				<p id="paragrafinho">Somos uma equipe de alunos do Instituto Federal de São Paulo - Campus São João da Boa Vista, que buscam finalizar o projeto proposto em uma das disciplinas 
				com o maior sucesso possível. <br/></p>
				<p id="paragrafo">Ao alcançar esse sucesso, estaremos proporcionando para a cidade um novo sistema que pode impulsionar o comércio justo e maior comprometimento 
				por parte dos estabelecimentos presentes na cidade.  <a href="sobreProjeto.php">Saiba mais...</a></p>
			</div>	
			</div>
			</div>
			</div>
			
				<div class="footer-bottom" style="background-color: #191919;">
				<div class="container">
				<div class="row" id="ajustesrow">
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
		
	<!-- Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.dropotron.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-viewport.min.js"></script>
	<script src="js/util.js"></script>
	<!--[if lte IE 8]><script src="js/ie/respond.min.js"></script><![endif]-->
	<script src="js/main.js"></script>
   <!--script em geral-->
   <!--script essenciais -->
  <script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


<script type="text/javascript" src="js/mousescroll.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
   <script type="text/javascript" src="js/jquery.js"></script>
   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
   <script type="text/javascript" src="js/main.js"></script>
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <!--script essenciais -->
   <!--script do -->
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
   <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>	
   <script type="text/javascript">
      $(function() {
      
      //autocomplete
      $(".auto").autocomplete({
      	source: "rec_procurar.php",
      	minLength: 1
      });				
      
      });
   </script>
   <!-- fim script do ->
      <!-- fim script em geral-->
	  
	<script>
	function reclamar() {
	document.formulario1.submit() 
	}
	function avaliar() {
	document.formulario2.submit() 
	}
	function redirect() {
	document.formulario3.submit() 
	}
	
	</script>
	
	<script language="javascript" type="text/javascript">
	document.getElementById('<?php
	echo $ranking;
	?>').click(); 
	document.getElementById("cm_star-1").disabled = true;
	document.getElementById("cm_star-2").disabled = true;
	document.getElementById("cm_star-3").disabled = true;
	document.getElementById("cm_star-4").disabled = true;
	document.getElementById("cm_star-5").disabled = true;
						 
	</script>
	
<script language="javascript" type="text/javascript">
	document.getElementById('<?php
	echo $ranking2;
	?>').click(); 
	document.getElementById("cm_star-11").disabled = true;
	document.getElementById("cm_star-22").disabled = true;
	document.getElementById("cm_star-33").disabled = true;
	document.getElementById("cm_star-44").disabled = true;
	document.getElementById("cm_star-55").disabled = true;
						 
	</script>

	<script language="javascript" type="text/javascript">
	document.getElementById('<?php
	echo $ranking3;
	?>').click(); 
	document.getElementById("cm_star-111").disabled = true;
	document.getElementById("cm_star-222").disabled = true;
	document.getElementById("cm_star-333").disabled = true;
	document.getElementById("cm_star-444").disabled = true;
	document.getElementById("cm_star-555").disabled = true;
						 
	</script>
	</body>
</html>