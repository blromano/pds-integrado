<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login - Mais Saude São João</title>
        <link href="CSS/estilo.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/logme.css" rel="stylesheet" type="text/css"/>
        <link href="CSS/temas.css" rel="stylesheet" type="text/css"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="barralog"> </div>
        <img src="images/logoinicio.png"id="fota" alt="+ Saude São João"/>

        <form id="formlog" class="navbar-form navbar-right" role="form" action="index.php">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="email" class="form-control" name="email" value="" placeholder="Login">                                        
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Senha">                                        
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
         </form>
        
        <div id="logoentrada"> <img src="Logo_Final v3.png" width="550" height="500"> </div>
        
        <form id = "formcad" action="cadastromodal.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
            </div>
                        <div class="form-group">
                <label for="exampleInputPassword1">Confirmar Senha</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirmar">
            </div>
                        <div class="form-group">
                <label for="exampleInputPassword1">Data de Nascimento</label>
                <input type="date" class="form-control" id="exampleInputPassword1" placeholder="">
            </div>
            <div>
                <label class="radio-inline"><input type="radio" name="optradio">Masculino  <p class="fa fa-mars"></p></label>
                <label class="radio-inline"><input type="radio" name="optradio">Feminino  <p class="fa fa-venus"></p</label>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar-se!</button>
            
        </form>
	


	<div id="rodape">
            © 2018 - Todos os Direitos Reservados - IFSP - São João da Boa Vista
        </div>
    </body>
</html>
