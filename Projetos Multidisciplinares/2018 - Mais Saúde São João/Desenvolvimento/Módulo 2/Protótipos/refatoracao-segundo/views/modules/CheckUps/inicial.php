<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> +Saúde São João </title>
	<script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
	<script src="<?=POPPER_PATH?>" charset="utf-8"></script>
	<script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
	<script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="views/modules/CheckUps/hover.css">
	<link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
</head>
<body>
	<?php 
	$vertical_menu_links = [
		"Nome do link"=>"link_de_redirecionamento.html"
	]; 
	include(VIEWS_PATH.'/module_base.php'); 
	?>
	<section onclick="closeNav()">
		<header>

		</header> 

		<div class="container-fluid">
			<div class="row">
				<div class="col border" id="imc">
					<h2 class="text-center text-dark pt-5 pb-5">IMC</h2>
					<div class="overlay">
						<div class="text"><a target="_blank" rel="noopener noreferrer"target="_blank" rel="noopener noreferrer" href="?mod=checkups&sub=imc" class="link">25</a></div>
					</div>
				</div>

				<div class="col border" id="psanguinea">
					<h2 class="text-center text-dark pt-5 pb-5">PRESSÃO SANGUÍNEA</h2>
					<div class="overlay">
						<div class="text"><a target="_blank" rel="noopener noreferrer"target="_blank" rel="noopener noreferrer" href="?mod=checkups&sub=psanguinea" class="link">120/80</a></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col border" id="oximetria">
					<h2 class="text-center text-dark pt-5 pb-5">OXIMETRIA</h2>
					<div class="overlay">
						<div class="text"><a target="_blank" rel="noopener noreferrer"target="_blank" rel="noopener noreferrer" href="?mod=checkups&sub=oximetria" class="link">82 , 75</a></div>
					</div>
				</div>

				<div class="col border" id="cpulmonar">
					<h2 class="text-center text-dark pt-5 pb-5">CAPACIDADE PULMONAR</h2>
					<div class="overlay">
						<div class="text"><a target="_blank" rel="noopener noreferrer"target="_blank" rel="noopener noreferrer" href="?mod=checkups&sub=cpulmonar" class="link">2</a></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col border" id="tgordura">
					<h2 class="text-center text-dark pt-5 pb-5">TAXA DE GORDURA</h2>
					<div class="overlay">
						<div class="text"><a target="_blank" rel="noopener noreferrer"target="_blank" rel="noopener noreferrer" href="?mod=checkups&sub=tgordura" class="link">40%</a></div>
					</div>
				</div>

				<div class="col border" id="bpm">
					<h2 class="text-center text-dark pt-5 pb-5">BPM</h2>
					<div class="overlay">
						<div class="text"><a target="_blank" rel="noopener noreferrer"target="_blank" rel="noopener noreferrer" href="?mod=checkups&sub=bpm" class="link">83</a></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col border" id="visao">
					<h2 class="text-center text-dark pt-5 pb-5">VISÃO</h2>
					<div class="overlay">
						<div class="text"><a target="_blank" rel="noopener noreferrer"target="_blank" rel="noopener noreferrer" href="?mod=checkups&sub=visao" class="link">MIOPIA/ASTIGMATISMO</a></div>
					</div>
				</div>

				<div class="col border" id="relatorios">
					<h2 class="text-center text-dark pt-5 pb-5">RELATÓRIOS</h2>
					<div class="overlay">
						<div class="text"><a target="_blank" rel="noopener noreferrer"target="_blank" rel="noopener noreferrer" href="?mod=checkups&sub=relatorios" class="link">LISTA DOS ÚLTIMOS RELATÓRIOS</a></div>
					</div>
				</div>
			</div>
		</div>
	</section>  
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