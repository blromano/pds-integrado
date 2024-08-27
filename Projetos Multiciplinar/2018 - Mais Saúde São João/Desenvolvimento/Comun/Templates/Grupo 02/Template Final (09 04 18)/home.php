<!DOCTYPE html>
<!-- Criado por Eduardo Rodrigues -->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../CSS/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="../CSS/temas.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/../CSS/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3../CSS/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/../CSS/bootstrap.min.css">
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
    <body class="du-theme-body">
        <!-- Top Menu -->
        <div class="row icon-bar">
            <a class="active" style="margin-left:1%;" href="#"><i class="fa fa-home" title="Página Inicial"></i></a> 
            <a href="#"><i class="fa fa-user" title="Perfil"></i></a> 
            <a href="#"><i class="fa fa-commenting-o" title="Mensagens"></i></a> 
            <a href="#"><i class="fa fa-bell" title="Notificações"></i></a>
            <a href="#"><i class="fa fa-heartbeat" title="Educador Físico"></i></a> 
            <a href="#"><i class="fa fa-cutlery" title="Nutricionista"></i></a>
			<div class="col m2" style="margin-left:2%; margin-top:0.5%;">
				<div class="input-group" style="width:100%;">
					<input type="text" class="form-control" id="inputSearch" placeholder="Pesquisar">
					<span class="input-group-btn">
						<button class="w-button" style="margin-left:1px; type="button"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</div>
			<div class="col m3">
				<img src="../images/logoTOP.png" id="fotinha" alt="+ Saude São João"/>
			</div>
            <a href="#" class="w3-right" style="margin-right:1.5%;" title="Minha Conta">
				<img src="../images/avatoro.jpg" class="w3-circle" style="height:23px;width:23px" alt="Minha Conta">
            </a>
        </div>
        <!-- Page Container -->
        <div class="w3-container w3-content" style="margin-left:10%;max-width:80%;margin-top:1%">    
            <!-- The Grid -->
            <div class="w3-row">
                <!-- Left Column -->
                <div class="w3-col m3">
                    <!-- Profile -->
                    <div class="w3-card w3-round w3-white">
                        <div class="w3-container">
                            <h4 class="w3-center"><br>Eduardo Rodrigues</h4>
                            <p class="w3-center"><img src="../images/avatoro.jpg" class="w3-circle" style="height:106px;width:106px" alt="Avatar">
                            <hr>
                            <p><i class="fa fa-pencil fa-fw w3-margin-right du-text-theme"></i> Desenvolvedor</p>
                            <p><i class="fa fa-home fa-fw w3-margin-right du-text-theme"></i> São João da Boa Vista, SP</p>
                            <p><i class="fa fa-birthday-cake fa-fw w3-margin-right du-text-theme"></i> 31 de Agosto de 2000</p>
                        </div>
                    </div>
                    <br>
                    <!-- Menu Links -->
                    <div class="menu-links">
                        <div class="du-card w3-round">
                            <div class="w3-container">
                                <br>
                                <button onclick="myFunction('Demo1')" class="w-button w3-block w3-left-align"><i class="fa fa-plus-square fa-fw w3-margin-right"></i> Saúde</button>
                                <button onclick="myFunction('Demo2')" class="w-button w3-block w3-left-align"><i class="fa fa-book fa-fw w3-margin-right"></i> Dietas</button>
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
                        <img src="../images/ramon.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                        <span class="w3-right w3-opacity">1 min</span>
                        <h4>Nomar Itarut</h4>
                        <br>
                        <hr class="w3-clear">
                        <p>Salva rapa, tranquilo? Então, é o seguinte, preciso de patrocinio pro meu canal. To precisando de um PC novo, um carro, uma casa, comida e acessa meu canal. Abraço até mais, Amém tmj, Jesus maria josé tmj dnv <br><br> <a href="www.youtube.com/c/RamonPlaysGames</p>">Canal - Ramon Plays</a>
                        <div class="w3-row-padding" style="margin:0 -16px">
                            <img src="../images/logoRamon.jpg" style="width:500px" alt="Logo Ramon" class="w3-margin-bottom">
                        </div>
						<hr>
                        <button type="button" class="w-button w3-small w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Curtir</button> 
                        <button type="button" class="w-button w3-small w3-margin-bottom"><i class="fa fa-comment"></i>  Comentar</button> 
						<button type="button" class="w-button w3-small w3-margin-bottom w3-right"><i class="fa fa-ban"></i> Denunciar</button> 
                    </div>      
                    <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                        <img src="../images/brenologo.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                        <span class="w3-right w3-opacity">16 min</span>
                        <h4>Breno Grossi Grego</h4><br>
                        <hr class="w3-clear">
                        <p>Noite muito loka, pegaram a ideia?</p>
                        <br>
                        <video width="300px" controls="controls">
                            <source src="../videos/Breno.mp4" type="video/mp4">
                            <object data="" width="320" height="240">
                                <embed width="320" height="240" src="Breno Dançarino.mp4">
                            </object>
                        </video>
                        <hr>
                        <button type="button" class="w-button w3-small w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Curtir</button> 
                        <button type="button" class="w-button w3-small w3-margin-bottom"><i class="fa fa-comment"></i>  Comentar</button> 
						<button type="button" class="w-button w3-small w3-margin-bottom w3-right"><i class="fa fa-ban"></i> Denunciar</button> 						
                    </div>  
                    <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                        <img src="../images/maipe.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
                        <span class="w3-right w3-opacity">32 min</span>
                        <h4>Maipe Boladão</h4><br>
                        <hr class="w3-clear">
                        <p>Lu Souza!</p>
                        <br>
                        <p>Você foi a minha vida inteira, mas eu... Fui só um capítulo da sua... EU TE AMO!</p>
                        <img src="../images/maipelu.jpeg" style="width:500px" class="w3-margin-bottom">
                        <hr>
                        <button type="button" class="w-button w3-small w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Curtir</button> 
                        <button type="button" class="w-button w3-small w3-margin-bottom"><i class="fa fa-comment"></i>  Comentar</button> 
						<button type="button" class="w-button w3-small w3-margin-bottom w3-right"><i class="fa fa-ban"></i> Denunciar</button> 
                    </div>      
                    <!-- End Middle Column -->
                </div>    
                <!-- Right Column -->
                <div class="w3-col m2">
                     <div class="w3-card w3-ound w3-white w3-center">
                        <div class="w3-container">
                            <p><br>Calcule seu IMC</p>
                            <img src="../images/balance.jpeg" alt="Body Scales" style="width:50%"><br>
                            <p><button class="w-button">Clique Aqui!</button></p>
                        </div>
                    </div>
                    <br>
                    <div class="w3-card w3-round w3-white w3-center">
                        <div class="w3-container">
                            <p><br>Nova Consulta:</p>
                            <img src="../images/consulta_medica.jpg" alt="Consulta Médica" style="width:100%;">
                            <p>Sexta-Feira 18:00</p>
                            <p><button class="w-button">Informações</button></p>
                        </div>
                    </div>
                    <br>      
                    <br>            
                <!-- End Right Column -->
                </div>    
            <!-- End Grid -->
            </div>
        </div>
        <!-- Footer -->
        <div id="rodape">
            © 2018 - Todos os Direitos Reservados - IFSP - São João da Boa Vista
        </div>
    </body>
</html>
