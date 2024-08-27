<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title>Atualizar Dados</title>
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


        <div class="container">
            <div class="info">
                <br>
                <br>
                <h1>Atualizar Dados!</h1>
            </div>
        </div>

        <div class="form">


            <form method="post" action="#">
                <select id="option1" onchange="optionCheck()" name="login_usuario" class="form-control">
                    <option value="0">Tipo de usuário</option>
                    <option value="1">Usuário</option>
                    <option value='2'>Nutricionista</option>
                    <option value='3'>Educador Físico</option>
                </select>
                <br>
                <input id="usuario" style="visibility:hidden;" type="text" placeholder="Usuário:" class="form-control" required=""/>
                <input id="senha" style="visibility:hidden;" type="password" placeholder="Senha:" class="form-control" required=""/>
                <button id="buscar" style="visibility:hidden;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Atualizar</button>
                <p class="message"> <span style='color:#104999;'> Esqueceu senha?</span> <a style="text-decoration:underline" href="#" data-toggle="modal" data-target="#myModal2">Entre aqui para recuperar!</a></p>


            </form>


        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Dados Atualizados com Sucesso</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="index.php"><button type="button" class="btn btn-primary" >Ir para o index</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 2-->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Foi lhe mandado um email! Entre na sua caixa de entrada para atualizar a senha!</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="index.php"><button type="button" class="btn btn-primary" >Ir para o index</button></a>
                    </div>
                </div>
            </div>
        </div>






        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



        <script  src="js/index.js"></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>


    </body>

</html>