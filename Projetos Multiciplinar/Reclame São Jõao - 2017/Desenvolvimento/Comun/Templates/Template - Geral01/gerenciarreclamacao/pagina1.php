<!DOCTYPE html>
<html>
	<head>
		<?php
		$pagina = 1;
		if ($_GET){
			if (!empty($_GET["pagina"])) {
				if (($_GET["pagina"]) == "dashboard") {
					echo "<title>Gerenciamento - Dashboard</title>";
				}elseif (($_GET["pagina"]) == "pendencias") {
					echo "<title>Gerenciamento - Pendências</title>";
					$pagina = 1;
				}elseif (($_GET["pagina"]) == "denuncias") {
					echo "<title>Gerenciamento - Denúncias</title>";
					$pagina = 2;
				}elseif (($_GET["pagina"]) == "clientes") {
					echo "<title>Gerenciamento - Usuários/Clientes</title>";
					$pagina = 3;
				}elseif (($_GET["pagina"]) == "estabelecimentos") {
					echo "<title>Gerenciamento - Usuários/Estabelecimentos</title>";
					$pagina = 4;
				}elseif (($_GET["pagina"]) == "catReclamacoes") {
					echo "<title>Gerenciamento - Categoria/Reclamações</title>";
					$pagina = 5;
				}elseif (($_GET["pagina"]) == "catEstabelecimentos") {
					echo "<title>Gerenciamento - Categoria/Estabelecimentos</title>";
					$pagina = 6;
				}else{
					//header("Location: index.php");
				}
			}
		//}elseif (($_GET) && (@$_GET["perfil"])) {
			//$pagina = 7;
		}else{
			echo "<title>Gerenciamento - Dashboard</title>";
			//header("Location: index.php");
		}
		?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://bootswatch.com/paper/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="estilo.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		
		<!-- Data  tables plugin -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
					<a class="navbar-brand" href="#">Reclame São João</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<!--
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Page 1</a></li>
						<li><a href="#">Page 2</a></li> 
						<li><a href="#">Page 3</a></li> 
					</ul>-->
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="badge"><span class="glyphicon glyphicon-bell"></span> 2</span></a>
							<ul class="dropdown-menu">
								<li class="dropdown-header">Você possui 2 notificações!</li>
								<li><a href="#">Nova resposta de Marcelo</a></li>
								<li><a href="#">Denuncia de Carol</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Admin <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#"><span class="glyphicon glyphicon glyphicon-cog"></span> Meu Perfil</a></li>
								<li class="divider"></li>
								<li><a href="sair.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<ul class="nav nav-tabs nav-justified">
				<li <?php if ($pagina == 1) echo 'class="active"'; ?>>
					<a href="?pagina=pendencias"></a>
				</li>
			</ul>
		</div>
		<!--<hr>-->
		<div class="container">

		<?php
			if ($pagina == 0) include("paginas/dashboard.php");
			elseif ($pagina == 1) include("paginas/pendencias.php");
			elseif ($pagina == 2) include("paginas/denuncias.php");
			elseif ($pagina == 3) include("paginas/clientes.php");
			elseif ($pagina == 4) include("paginas/clientes.php");
			elseif ($pagina == 5) include("paginas/catEstabelecimentos.php");
			elseif ($pagina == 6) include("paginas/catEstabelecimentos.php");
		?>

		</div>

		</div>
	</body>

</html>