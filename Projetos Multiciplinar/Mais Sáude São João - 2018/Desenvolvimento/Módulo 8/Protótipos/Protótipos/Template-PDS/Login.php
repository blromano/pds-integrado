<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="favicon.png">
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/login.css">
        <link rel="icon" type="image.png" href="favicon.png">


    </head>

    <body style="background-image: url('images/intro-bg.jpg');" >
        
        <script>
            function optionCheck() {
                var option = document.getElementById("option1").value;
                if (option == '0') {
                    alert("Selecione uma opção");
                    document.getElementById("usuario").style.visibility = "hidden";
                    document.getElementById("senha").style.visibility = "hidden";
                    document.getElementById("buscar").style.visibility = "hidden";


                }
                if (option == '1') {
                    document.getElementById("usuario").style.visibility = "visible";
                    document.getElementById("senha").style.visibility = "visible";
                    document.getElementById("buscar").style.visibility = "visible";


                }
                if (option == '2') {
                    document.getElementById("usuario").style.visibility = "visible";
                    document.getElementById("senha").style.visibility = "visible";
                    document.getElementById("buscar").style.visibility = "visible";

                }
                if (option == '3') {
                    document.getElementById("usuario").style.visibility = "visible";
                    document.getElementById("senha").style.visibility = "visible";
                    document.getElementById("buscar").style.visibility = "visible";

                }
            }
        </script>


        <div class="container"  >
            <div class="info">
                <br>
                <br>
                <h1>Login Mais Saúde São João!</h1>
            </div>
        </div>

        <div class="form">
            <div class="thumbnail">
                <img  class="img-rounded" src="images/logo.png"/>
            </div>

            <form method="post" action="test.php">
                <select id="option1" onchange="optionCheck()" name="login_usuario" class="form-control" autofocus>
                    <option value="0">Tipo de usuário</option>
                    <option value="1">Usuário</option>
                    <option value='2'>Nutricionista</option>
                    <option value='3'>Educador Físico</option>
                </select>
                <br>
                <input id="usuario" style="visibility:hidden;" type="text" placeholder="Usuário:" class="form-control" required=""/>
                <input id="senha" style="visibility:hidden;" type="password" placeholder="Senha:" class="form-control" required=""/>

                <button id="buscar" style="visibility:hidden;" type="submit" class="btn btn-primary">Logar</button>
                <p class="message"><span style='color:#104999'>Não registrado?</span> <a style="text-decoration:underline"href="criar_conta.php">Crie uma conta</a></p>

            </form>

        </div>






        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



        <script  src="js/index.js"></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>


        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>


    </body>

</html>
