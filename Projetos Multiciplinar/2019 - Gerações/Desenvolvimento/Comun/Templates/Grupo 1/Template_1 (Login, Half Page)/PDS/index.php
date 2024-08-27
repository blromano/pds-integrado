<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
        <link rel="shortcut icon" type="image/x-icon" href="joystick.png" />
        <link rel="stylesheet" type="text/css" href="source.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Corben" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nobile" rel="stylesheet">
        <link href="styles.css" rel="stylesheet">
        <title> Gerações </title>
    </head>
    <body>
    
    <!-- Menu principal -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #2196F3">
        <div class="container">
            <a class="navbar-brand" href="index.php"> <p class="logotext"> GERAÇÕES </p> </a>
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"> <p class="menuitem"> Login </p>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link" href="jogos.php"> <p class="menuitem"> Sobre Nós </p> </a>
                    </li>
          
                    <li class="nav-item">
                        <a class="nav-link" href="filmes.php"> <p class="menuitem">Contate-nos </p> </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Conteúdo da página -->
    <div class="container"> 
        <img src="logo_02.png" alt="logo" class="rounded mx-auto d-block imgcentral"/>
        <div class="col-md-4 login-form-1 mx-auto d-block downlogo">
                    
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Usuário" value="" />
            </div>
                        
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Senha" value="" />
            </div>
             
            <div class="form-group float-right">
                <a href="login.php"> <input type="submit" class="btnSubmit" value="Login" /> </a>
            </div>
                        
            <div class="form-group ">
                <a href="#" class="btnForgetPwd">Esqueceu sua senha?</a>
            </div>            
            
                    
        </div>
    </div>
    
    <!-- Rodapé -->
    
      
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
    </body>
</html>
