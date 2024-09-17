<!DOCTYPE html>
<!--Bootstrap: Serviço de utilidade pública-->
<html>
    <head>
        <meta name="charset" content="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="viewport" content="width=device-width, initial-scale = 1, shrink-to-fit=no">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="Template.css" media="all" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <style type="text/css">
            .geracoes{
                color: white;
                font-size: 26px;
                height:26px;
            }
            .fontcor{
                font-style: italic;
                color: #00cc00;
            }
            *{
                margin: 0;
                padding: 0;
            }
            #check{
                display: none;
            }
            #icone{
                cursor: pointer;
                padding: 15px;
                position: absolute;
                z-index: 1;
            }
            .barra{
                background-color: #333;;
                height: 100%;
                width: 300px;
                position: absolute;
                transition: all .2s linear;
                left: -300px;
            }
            nav{
                width: 100%;
                position: absolute;
                top: 60px;
            }
            nav a{
                text-decoration: none;
            }
            .link{
                background-color: #494950;
                padding: 20px;
                font-family: 'Arial';
                font-size: 12pt;
                transition: all .2s linear;
                color: #f4f4f9;
                border-bottom: 2px solid #222;
                opacity: 0;
                margin-top: 200px;
            }
            .link:hover{
                background-color: #050542;
            }
            #check:checked ~ .barra{
                transform: translatex(300px);
            }
            #check:checked ~ .barra nav a .link{
                opacity: 1;
                margin-top: 0;
                transition-delay: .2s;
            }
            .tit{
                font-style: italic;
                color: #bd2130;
            }
        </style>
        <script>
            function mostrarSenha(){
                var tipo = document.getElementById("senha");
                if(tipo.type == "password"){
                    tipo.type = "text";
                }
                else{
                    tipo.type = "password";
                }
            }
        </script>
        <title>Template</title>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <input type="checkbox" id="check">
        <label id="icone" for="check"><img src="imagens/icone.png"></label>
        <div class="barra">
            <nav>
                <a href=""><div class="link">Mensagem</div></a>
                <a href=""><div class="link">Contato</div></a>
                <a href=""><div class="link">Recursos</div></a>
                <a href=""><div class="link">Patologias</div></a>
                <a href=""><div class="link">Documentação</div></a>
                <a href=""><div class="link">Eventos</div></a>
                <a href=""><div class="link">Horários</div></a>
                <a href=""><div class="link">Ajuda</div></a>
                <a href=""><div class="link">Quem Somos?</div></a>
            </nav>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p class="geracoes">Gerações</p>&nbsp;
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                      <a class="nav-link" href="template.php">Perfil <span class="sr-only">(current)</span></a>
                  </li>

                  <li class="nav-item">
                  <li class="nav-item active">
                      <a class="nav-link" href="documentacao.php">Configurações <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Usuarios</a>
                            <a class="dropdown-item" href="#">Prontuario do Idosos</a>
                            <a class="dropdown-item" href="#">Acompanhamento pelo Familiares</a>
                            <a class="dropdown-item" href="#">Cuidados Diários dos Idosos</a>
                            <a class="dropdown-item" href="#">Prescrições Médicas/Controle e Incidentes</a>
                            <a class="dropdown-item" href="#">Nutrição</a>
                            <a class="dropdown-item" href="#">Atividades Físicas/Recreativas</a>
                            <a class="dropdown-item" href="#">Controle Administrativo</a>
                            <a class="dropdown-item" href="#">Relatórios Especializados</a>
                        </div>
                  </li>
                </ul>
                <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                    <li class="nav-item p-2"> 
                        <a href="https://www.google.com/search?q=do+a+barrel+roll&rlz=1C1CHWL_pt-BRBR692BR692&oq=do+a+&aqs=chrome.0.0j69i60l3j69i65j69i57.1543j0j9&sourceid=chrome&ie=UTF-8" target="_blank"> <i class="fa fa-google" style="color: white"> </i> </a> 
                    </li>
                
                    <li class="nav-item p-2"> 
                        <a href="https://twitter.com/cukids1" target="_blank"> <i class="fa fa-twitter" style="color: white"> </i> </a> 
                    </li>
                
                    <li class="nav-item p-2"> 
                        <a href="https://ogimg.infoglobo.com.br/in/19558812-265-11f/FT1086A/652/zuckerberg.jpg" target="_blank"> <i class="fa fa-facebook-official" style="color: white"> </i> </a> 
                    </li>
                
                    <li class="nav-item p-2"> 
                        <a href="https://discord.gg/Xqx9WR" target="_blank"> <i class="fab fa-discord" style="color: white"> </i> </a> 
                    </li>
                
                    <li class="nav-item p-2"> 
                        <a href="https://steamcommunity.com/groups/cukids" target="_blank"> <i class="fa fa-steam-square" style="color: white"> </i> </a> 
                    </li>&nbsp;&nbsp;&nbsp;
                    
                    
                    
                    <form class="form-inline mt-2 mt-md-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                    </form>
                </ul>
            </div>
        </nav>
    </head></br></br>
    <body>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            </ol>
                        
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-caption text-left">
                        <div class="col-md-6 d-flex">
                            <div class="align-self-center">
                                <h1 class="display-4 fontcor">Fazer Login</h1></br>
                            <form class="mt-4 mb-4">
                                <div class="input-group input-group-lg">
                                    <input type="text" placeholder="Prontuario" class="form-control">
                                </div></br>
                                
                                <div class="input-group input-group-lg">
                                    <input type="password" placeholder="Senha" name="senha" id="senha" class="form-control">
                                    <button type="button" onclick="mostrarSenha()" width="50">Ver</button></br>
                                </div></br>
                                
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                        <label class="form-check-label fontcor" for="dropdownCheck">Lembre-se de mim</label>
                                    </div>
                                </div>
                                
                                <div class="input-group-append">
                                        <button type="button" class="btn btn-primary">Cadastre-se</button>
                                    </div>
                            </form></br></br></br></br>
                            <p class="fontcor">
                                Disponivel para
                                <a href="" class="btn btn-outline-dark">
                                    <span class="fab fa-android"></span>
                                </a>
                                <a href="" class="btn btn-outline-dark">
                                    <span class="fab fa-apple"></span>
                                </a>
                            </p>
                            </div>
                        </div>
                    </div>
                    <img src="imagens/TelaInicial.png" class="d-block w-100" alt="..." height="605">
                </div>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
    </body>
</html>
