
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Criar conta</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body style="background-image: url('images/intro-bg.jpg');" >




        <script type="text/javascript">
            function optionCheck() {
                var option = document.getElementById("options").value;
                if (option == '0') {
                    alert("Selecione uma opção!");
                    document.getElementById("hiddenDiv").style.visibility = "hidden";
                    document.getElementById("hiddenDiv2").style.visibility = "hidden";
                    document.getElementById("hiddenDiv3").style.visibility = "hidden";
                    document.getElementById("hiddenDiv").style.height = "100px";
                    document.getElementById("hiddenDiv2").style.height = "0px";
                    document.getElementById("hiddenDiv3").style.height = "0px";
                }
                if (option == '1') {
                    document.getElementById("hiddenDiv").style.visibility = "visible";
                    document.getElementById("hiddenDiv2").style.visibility = "hidden";
                    document.getElementById("hiddenDiv3").style.visibility = "hidden";
                    document.getElementById("hiddenDiv").style.visibility = "visible";
                    document.getElementById("hiddenDiv").style.height = "100px";
                    document.getElementById("hiddenDiv2").style.height = "0px";
                    document.getElementById("hiddenDiv3").style.height = "0px";
                }
                if (option == '2') {
                    document.getElementById("hiddenDiv").style.visibility = "visible";
                    document.getElementById("hiddenDiv2").style.visibility = "visible";
                    document.getElementById("hiddenDiv3").style.visibility = "hidden";
                    document.getElementById("hiddenDiv").style.height = "0px";
                    document.getElementById("hiddenDiv2").style.height = "100px";
                    document.getElementById("hiddenDiv3").style.height = "0px";
                }
                if (option == '3') {
                    document.getElementById("hiddenDiv").style.visibility = "visible";
                    document.getElementById("hiddenDiv2").style.visibility = "hidden";
                    document.getElementById("hiddenDiv3").style.visibility = "visible";
                    document.getElementById("hiddenDiv").style.height = "0px";
                    document.getElementById("hiddenDiv2").style.height = "0px";
                    document.getElementById("hiddenDiv3").style.height = "100px";
                }
            }
        </script>

        <div class="container theme-showcase" role="main">
            <div class="page-header">
                <h1>Cadastrar Usuário</h1>
            </div>		

            <form action="sla.php" method="post">
                <select id="options" onchange="optionCheck()" name="cadastro_usuario" class="form-control" autofocus>
                    <option value="0">Tipo de usuário</option>
                    <option value="1">Usuário</option>
                    <option value='2'>Nutricionista</option>
                    <option value='3'>Educador Físico</option>
                </select>

                <div class="form-row" id="hiddenDiv" style="height:0px;width:100%;border:1px;visibility:hidden;">
                    <div class="form-group col-md-6">
                        <label style="padding:0.5%"> Nome: </label> 
                        <input  type="text" class="form-control" id="nome" placeholder="Escreva seu nome" required> 
                    </div>
                    <div class="form-group col-md-6">
                        <label style="padding:0.5%">Sobrenome:</label>
                        <input  type="text" class="form-control" id="sobrenome" placeholder="Escreva seu sobrenome" name="sobrenome">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="text" style="padding:0.5%">CPF:</label>
                        <input size="9" maxlength="11"  type="text" class="form-control" id="cpf" placeholder="Escreva seu CPF" name="cpf">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="text" style="padding:0.5%">Data de nascimento:</label>
                        <input type="Date" class="form-control" id="nascimento" placeholder="Escreva seu CPF" name="nascimento">
                    </div>
                     <div class="form-group col-md-6">
                    <label style="padding:0.5%">Endereço:</label>
                    <input  type="text" class="form-control" id="end" placeholder="Escreva seu endereço" name="end">
                     </div>
                    <div class="form-group col-md-6">
                    <label style="padding:0.5%">Telefone:</label>
                    <input  type="tel" class="form-control" id="tel" placeholder="Telefone" name="tel">
                   </div>
                    
                    <div class="form-group col-md-6">
                    <label  style="padding:0.5%;">Email:</label>
                    <input  type="email" class="form-control" id="email" placeholder="Escreva seu email" name="email">
                    </div>
                    <div class="form-group col-md-6">
                    <label  style="padding:0.5%;">Senha:</label>
                    <input  type="password" class="form-control" id="senha1" placeholder="Escreva sua senha" name="senha1">
                     </div>
                     <div class="form-group col-md-6">
                    <label style="padding:0.5%;"> Repita sua Senha:</label>
                    <input  type="password" class="form-control" id="senha2" placeholder="Repita sua senha" name="senha2">
                    </div>
                    
                    <div class="form-group col-md-6" id="hiddenDiv2" style="height:0px;visibility:hidden;">
                        <label for="CRN" > Digite seu CRN:</label>
                        <input  type="text" class="form-control" id="crn" placeholder="Escreva sua CRN" name="crn">
                    </div>
                    <div class="form-group col-md-6" id="hiddenDiv3" style="height:0px;visibility:hidden;">
                        <label for="CRN" > Digite seu CREF:</label>
                        <input  type="text" class="form-control" id="cref" placeholder="Escreva seu CREF" name="cref">
                    </div>
                   
                   <div style="width: 100%;height: 50%;text-align:center;clear:both">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
                 

            </form>

        </div>



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>