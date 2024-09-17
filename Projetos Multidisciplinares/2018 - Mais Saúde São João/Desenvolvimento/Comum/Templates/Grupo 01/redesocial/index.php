<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
  <script src="js/bootstrap.js"></script>
  <style>    
    /* Set black background color, white text and some padding */
    body{
          background-image: url(imagem/intro-bg.jpg);
    }
  </style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>    
      </button>
        <ul class="nav navbar-nav navbar-left">
          <li><a href="#"><img src="imagem/favicon (1).ico" alt=""/></a></li> 
        </ul>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-comment"></span></a></li>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-menu-hamburger"></span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><img src="imagem/gord.png" alt="" class="img-circle" width="22px" height="22px"/> Ramon</a></li> 
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group input-group">
            <input type="text" style="width:400px" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>
    </div>
  </div>
</nav>
  
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">
        <p><a href="#">Ramon Play</a></p>
        <img src="imagem/gord.png" class="img-circle" height="65" width="65" alt="Avatar">
      </div>
      <div class="well">
        <p><a href="#">Interesses</a></p>
        <p>
          <span class="label label-default">Novidades</span>
          <span class="label label-primary">Comida</span>
          <span class="label label-success">Saude</span>
          <span class="label label-info">Lazer</span>
          <span class="label label-warning">Jogos</span>
          <span class="label label-danger">Esportes</span>
        </p>
      </div>
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Hey!</strong></p>
        As pessoas estão olhando para o seu perfil. Descubra quem são.
      </div>
      <p><a href="#">Pessoa 1</a></p>
      <p><a href="#">Pessoa 2</a></p>
      <p><a href="#">Pessoa 3</a></p>
    </div>
    <div class="col-sm-7">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
              <p contenteditable="true">O que você está pensando...</p>
              <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-edit"></span> Postar
              </button>     
            </div>
          </div>
        </div>
      </div>
      
        
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p> Ramon </p>
           <img src="imagem/gord.png" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
        <div class="well">
            <div class="caption">                   
                <p>Descobri o Brasil bro.</p>
            </div>
            <img src="imagem/gord.png" alt="Imagem como Thumbnail">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Pedrão</p>
           <img src="imagem/Emperor_Dom_Pedro_I_1822.png" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Descobri o Brasil Bro.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Pedrão</p>
           <img src="imagem/Emperor_Dom_Pedro_I_1822.png" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p> a </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Breno</p>
           <img src="imagem/7c93966d8359c2cde6b3b523dd35fb5a.png" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Sou o melhor professor bro</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-2 well">
      <div class="thumbnail">
        <p>Proximos eventos:</p>
        <img src="imagem/2013.03_blog_nutricao_e_saude.jpg" alt="Paris" width="400" height="300">
        <p><strong>São Paulo</strong></p>
        <p>Sábado, 7 de abril, 2018</p>
        <button class="btn btn-primary">Informações</button>
      </div>      
      <div class="well">
        <p>Novidades</p>
      </div>
      <div class="well">
        <p>Outros</p>
      </div>
    </div>
  </div>
</div>


</body>
</html>
