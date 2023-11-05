<?php
	session_start();
	$busca = $_SESSION["BUSCA"];
	$nome_fantasia = $_SESSION["nome"];
	$id_estabelecimento = $_SESSION["EST_ID"];  
	
	include ("controle/Conexao.php");
	include ("controle/EstabelecimentosDAO.php");
	include ("controle/AvaliacoesDAO.php");
	$estabelecimentosPdo = new EstabelecimentosDAO;
	$notasPdo = new AvaliacoesDAO;
  
	$resultado=$estabelecimentosPdo->todo_estabelecimento($id_estabelecimento);
	$media_avaliacao_consumidores=$estabelecimentosPdo->selecionarMediaAvaliacao($id_estabelecimento);
	$total_avaliacoes=$notasPdo->total_avaliacoes($id_estabelecimento);
?>

<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="refresh" content="5">
  		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/rec_main.css" />
		<title>Reclame São João</title>
		<link href="css/rodape2.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<link href="css/rec_estabelecimento.css" rel="stylesheet">
		<link href="css/rec_estrela.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/avaliations.js"></script>
		
		<script type="text/javascript">
		window.onload = function(){
		 parent.document.getElementById("divframe").height = document.getElementById("features-wrapper").scrollHeight + 0;
		}
		</script>
		
</head>
<body>

<!-- Features -->
			<div id="features-wrapper">
			<section id="" class="container">
			<header>
			<h2>Veja! Essa é a<strong> Reputação do Estabelecimento</strong>!</h2>
			</header>
			<div class="row" id="rec_atualiza">
			<div class="4u 12u(mobile)">
			</div>
			<div class="4u 12u(mobile)">

			<!-- Feature -->
			<section>
			
			<?php 
			
			if($media_avaliacao_consumidores >=0 && $media_avaliacao_consumidores < 1){
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

			foreach ($resultado as $artigo){
			$calculo = round(($artigo["EST_MEDIA_AVALIACAO_CONSUMIDORES"]), 2);
			
			?>

			<span class="ratingAverage" data-average="<?php echo $calculo;?>"></span>
			<span class="article" data-id="<?php echo $id_estabelecimento;?>"></span>

			<center><div class="barra">
			<span class="bg"></span>
			<span class="stars">
			
			<?php for($i=1; $i<=5; $i++):?>

			<span id="ava_estrela" class="star" data-vote="<?php echo $i;?>">
			<span class="starAbsolute"></span>
			</span>
			
			<?php 
			endfor;
			echo '</span></div></center><center><p id="ava_total_avaliacao">(<span ">'.$total_avaliacoes.'</span>) avaliações</p></center>';
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
			<li style="margin-left: 0em!important;"><a href="rec_duvidas.php" class="button icon fa-file" target="divframe">Ver Mais!!!</a></li>
			</ul>
			</section>
			</div>						

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
