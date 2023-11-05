<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="CSS/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/temas.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <title>+ Saúde São João - Página Inicial</title>
        <style>
            html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
        </style>
    </head>
    <body>
        <!-- Add icon library -->
        <div class="icon-bar">
            <a class="active" href="#"><i class="fa fa-home"></i></a> 
            <a href="#"><i class="fa fa-user" title="My Account"></i></a> 
            <a href="#"><i class="fa fa-commenting-o" title="Putaria"></i></a> 
            <a href="#"><i class="fa fa-bell"title="My Account"></i></a>
            <a href="#"><i class="fa fa-heartbeat"title="My Account"></i></a> 
            <a href="#"><i class="fa fa-cutlery"title="My Account"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large" title="My Account">
                <img src="images/avatoro.jpg" class="w3-circle" style="height:20px;width:20px" alt="Avatar">
            </a>
        </div>
		<!-- Page Container -->
		<div class="w3-container w3-content" style="margin-left:10%;max-width:70%;margin-top:1%">    
			<!-- The Grid -->
			<div class="w3-row">
				<!-- Left Column -->
				<div class="w3-col m3">
					<!-- Profile -->
					<div class="w3-card w3-round w3-white">
						<div class="w3-container">
							<h4 class="w-center"><br>Eduardo Rodrigues</h4>
							<p class="w-center"><img src="images/avatoro.jpg" class="w-circle" style="height:106px;width:106px" alt="Avatar">
							<hr>
							<p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Desenvolvedor</p>
							<p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> São João da Boa Vista, SP</p>
							<p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> 31 de Agosto de 2018</p>
						</div>
					</div>
					<br>
					<!-- Menu Links -->
					<div class="menu-links">
						<div class="w-card w-round w-white">
							<div class="w-container">
								<br>
								<button onclick="myFunction('Demo1')" class="w-button w3-block w-theme-l1 w3-left-align"><i class="fa fa-plus-square fa-fw w3-margin-right"></i> Saúde</button>
								<button onclick="myFunction('Demo2')" class="w-button w3-block w-theme-l1 w3-left-align"><i class="fa fa-book fa-fw w3-margin-right"></i> Dietas</button>
								<br>       
							</div>
						</div>
					</div>
				</div>		
				<!-- Middle Column -->
				<div class="w3-col m7">
					<div class="w3-row-padding">
						<div class="w3-col m12">
							<div class="w3-card w3-round w3-white">
								<div class="w3-container w3-padding">
									<h6 class="w3-opacity w3-center">O que você está pensando?</h6>
									<p contenteditable="true" class="w3-border w3-padding"></p>
									<button type="button" class="w-button"><i class="fa fa-pencil"></i>  Publicar</button> 
								</div>
							</div>
						</div>
					</div>      
					<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
						<img src="images/ramon.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
						<span class="w3-right w3-opacity">1 min</span>
						<h4>Ramon Plays</h4>
						<br>
						<hr class="w3-clear">
						<p>Fala galera do canal, beleza? Mais um vídeo novo no canal... Podem deixar o like? Valeu! <br><br> Pra quem não for inscrito pode se inscrever acessando o link abaixo, tamo junto! <br><br> <a href="www.youtube.com/c/RamonPlaysGames</p>">Canal - Ramon Plays</a>
						<div class="w3-row-padding" style="margin:0 -16px">
							<img src="images/logoRamon.jpg" style="width:50%" alt="Logo Ramon" class="w3-margin-bottom">
						</div>
						<button type="button" class="w-button w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Curtir</button> 
						<button type="button" class="w-button w3-margin-bottom"><i class="fa fa-comment"></i>  Comentar</button> 
					</div>      
					<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
						<img src="images/brenologo.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
						<span class="w3-right w3-opacity">16 min</span>
						<h4>Breno Lisi Romano</h4><br>
						<hr class="w3-clear">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						<button type="button" class="w-button w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Curtir</button> 
						<button type="button" class="w-button w3-margin-bottom"><i class="fa fa-comment"></i>  Comentar</button> 
					</div>  
					<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
						<img src="/w3images/avatar6.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
						<span class="w3-right w3-opacity">32 min</span>
						<h4>Angie Jane</h4><br>
						<hr class="w3-clear">
						<p>Have you seen this?</p>
						<img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						<button type="button" class="w-button w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Curtir</button> 
						<button type="button" class="w-button w3-margin-bottom"><i class="fa fa-comment"></i>  Comentar</button> 
					</div>      
				</div>		
			</div>
		</div>
		<!-- Rodape -->
        <div id="rodape">
            © 2018 - Todos os Direitos Reservados - IFSP - São João da Boa Vista
        </div>
    </body>
</html>
