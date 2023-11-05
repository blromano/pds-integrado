<!DOCTYPE html>
<!-- Criado por Alisson Dan e editado por Eduardo Rodrigues -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>+ Saude São João - Login</title>
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
    <body class="du-theme-body">
        <div>
            <div id="barralog"></div>
            <img src="images/logoTOP.png" id="fota" alt="+ Saude São João"/>
            <form id="formlog" method="post" class="navbar-form navbar-right" role="form" action="pages/home.php">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="email" type="email" class="form-control" name="email" value="" placeholder="Login">                                        
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password" value="" placeholder="Senha">                                        
                </div>
                <button type="submit" class="w-button">Login</button>
            </form>
            <div id="logoentrada"> <img src="images/logoFinal.png" width="550" height="500"> </div>
            <form id="formcad" method="post" action="functions/cadastro.php">
                 <div class="form-row">
                    <div class="w3-center form-group col-md-12">
                        <font size="5">Criar uma nova conta</font>
                        <br>
                        Sempre foi e sempre será gratuíto
                        <br>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="InputName" placeholder="Nome">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="InputLastName" placeholder="Sobrenome">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="email" class="form-control" id="InputEmail" placeholder="Email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="password" class="form-control" id="InputPassword" placeholder="Senha">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="password" class="form-control" id="InputAgainPassword" placeholder="Confirmar Senha">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="InputBornDate">Data de Nascimento</label>
                        <input type="date" class="w3-opacity form-control" id="InputBornDate" placeholder="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="w3-center form-group col-md-12">
                        <label class="radio-inline"><input type="radio" name="optradio">Masculino  <p class="fa fa-male"></p></label>
                        <label class="radio-inline"><input type="radio" name="optradio">Feminino  <p class="fa fa-female"></p</label>
                    </div>
                    <div class="w3-center">
                        <button type="submit" class="w3-center w-button">Cadastrar-se!</button>  
                    </div>
                </div>
            </form>
        </div>
        <div id="rodape" style="bottom:0;">
            © 2018 - Todos os Direitos Reservados - IFSP - São João da Boa Vista
        </div>
    </body>
</html>
