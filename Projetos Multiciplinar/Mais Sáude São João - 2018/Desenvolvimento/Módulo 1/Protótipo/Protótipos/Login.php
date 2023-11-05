<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <title> Login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {font-family: Arial;}

            /* Style the tab */
            .tab {
                overflow: hidden;
                border: 1px solid white;
                background-color: #f1f1f1;
            }

            /* Style the buttons inside the tab */
            .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
                font-size: 17px;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
                background-color: #05bca9;
            }

            /* Create an active/current tablink class */
            .tab button.active {
                background-color: #05bca9;
            }

            /* Style the tab content */
            .tabcontent {
                animation: fadeEffect 1s; /* Fading effect takes 1 second */
                display: none;
                padding: 6px 12px;
                border: 1px solid #ccc;
                border-top: none;
            }
            @keyframes fadeEffect {
                from {opacity: 0;}
                to {opacity: 1;}
            }
            h1{

                text-align: center;
            }
            input[type='file'] {
                display: none
            }

            .input-wrapper label {

                background-color:#044C86 ;
                border-radius: 5px;
                color: #fff;
                margin: 10px;
                padding: 6px 20px
            }

            .input-wrapper label:hover {
                background-color: #3498db;
            }



        </style>
    </head>
    <body>

        <div class="tab" style="background-color:#14171c">
            <button style = "color:white"class="tablinks" onclick="openCity(event, 'Login'); ocultarLinksCadastro();" id="defaultOpen">Login</button>
            <button style = "color:white" class="tablinks" data-toggle="collapse" data-target="#cadastro" onclick="openCity(event, 'Cadastro'); abrirUsuario()">Cadastro</button>
            <button style = "color:white" class="tablinks" onclick="openCity(event, 'esqueci_senha'); ocultarLinksCadastro();" id="defaultOpen3">Recuperar Senha</button>
        </div>
        <!-- Login -->
        <div id="Login" class="tabcontent multi-collapse p-md-4">
            <h1>Login</h1>
            <div id="login" class="container ">
                <form method="post" action="test.php"id="login" class="container my-4">
                    <div class="row form-group">
                        <div class="col">
                            E-mail
                            <input class="form-control" type="email" name="EMAIL">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            Senha
                            <input class="form-control" type="password" name="SENHA">
                        </div>
                    </div>

                    <div class="text-center">
                        <input class="btn btn-primary col-md-2" style="background-color:#044C86" type="submit" name="Entrar" value="Entrar"></br>
                    </div>  
                </form>
            </div>
        </div>

        <!--Esqueci minha senha -->
        <div id="esqueci_senha" class="tabcontent" style="text-align:center; padding:7%">

            <h1> Recuperação de Senha </h1>
            <form id="esqueci_minha_senha" class="container my-4 ">
                <div class="row form-group">
                    <div class="col">

                        <input class="form-control" type="email" name="email_esqueci_senha" placeholder="Digite seu email:"></br>
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col">
                        <input class="btn btn-primary col-md-4" style="background-color:#044C86" type="submit" name="enviar_esquecisenha" value="Enviar recuperação de senha"></br>
                    </div>
                </div>
            </form>
        </div>


        <div  id="Cadastro" class="collapse multi-collapse text-center p-md-4">
            <button class="btn tablinks col-md-2 btn-info" onclick="openCity(event, 'Usuario')" id="defaultOpen2">Usuário</button>
            <button class="btn tablinks col-md-2 btn-danger" onclick="openCity(event, 'EDF')">Educador Físico</button>
            <button class="btn tablinks col-md-2 btn-success" onclick="openCity(event, 'NUTRI')">Nutricionista</button>
        </div>
        <!-- Usuario -->
        <div id="Usuario" class="tabcontent p-md-4">
            <h1>Cadastro Usuário</h1>
            <form id="formUsuario" class="container my-4 " method="post" action="index.php">
                <div class="row form-group">
                    <div class="col">

                        <input class="form-control" type="text" name="nomeusucadastro" placeholder="Nome"></br>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="sobrenomeusucadastro" placeholder="Sobrenome"></br>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input class="form-control" type="email" name="emailusucadastro" placeholder="meuemail@mail.com"></br>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="cpfusucadastro" placeholder="CPF sem pontuação"></br>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input class="form-control" type="text" name="endusucadastro" placeholder="Endereço"></br>
                    </div>
                    <div class="col">
                        <input class="form-control" type="date" name="datausucadastro" placeholder="dd/mm/aaaa"></br>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <input class="form-control" type="tel" name="telusucadastro" placeholder="Telefone"></br>
                    </div>



                    <div class="col">


                        <select class="form-control" name="generoeducadastro">
                            <option value="null">Selecione o seu sexo:</option>
                            <option value="feminino">Feminino</option>
                            <option value="masculino">Masculino</option>
                            <option value="outro">Não Especificado</option>
                        </select>


                    </div>

                </div>

                <div class="row form-group">


                    <div class="col">
                        <input class="form-control" type="password" name="senhausucadastro" placeholder="Senha"></br>
                    </div>
                    <div class="col">
                        <input class="form-control" type="password" name="confirsenhausucadastro" placeholder="Confirmação de senha"></br>
                    </div>
                </div>
                <!--Avisos-->
                <div class="row form-group"> 
                    <div class="col-md-4">
                        <select class="form-control" name="avisos">
                            <option value="selecionar">Deseja receber avisos?</option>
                            <option value="Sim">Sim</option>
                            <option value="nao">Nao</option>

                        </select>
                    </div>

                </div>


                <div class="form-group">

                    <div  class="input-wrapper" >

                        <label for="foto_usuario">Foto para cadastro</label><br>
                        <input type="file" id="foto_usuario" value='' >
                        <span id='file-name'></span>

                    </div>
                </div>
                <div class="text-center">
                    <input class="btn btn-primary col-md-2" style="background-color:#044C86" type="submit" name="Cadastrouser" value="Cadastrar"></br>
                </div>        
            </form>
        </div>

        <!-- EDUCADOR FISICO -->
        <div id="EDF" class="tabcontent p-md-4" >
            <h1>Cadastro Educador Físico</h1>
            <form action="foda-se.php" method="post"id="formEDF" class="container my-4 ">
                <!-- Nome Sobrenome-->
                <div class="row form-group">
                    <div class="col">
                        <input class="form-control" type="text" name="nomeedfcadastro" placeholder="Nome"></br>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="sobrenomeedfcadastro" placeholder="Sobrenome"></br>
                    </div>
                </div>
                <!-- Email CPF-->
                <div class="row form-group">
                    <div class="col">
                        <input class="form-control" type="email" name="emailedfcadastro" placeholder="meuemail@mail.com"></br>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="cpfeducadastro" placeholder="CPF sem pontuação"></br>
                    </div>
                </div>
                <!---END CRF -->
                <div class="row form-group">
                    <div class="col">
                        <input class="form-control" type="text" name="endedfcadastro" placeholder="Endereço"></br>
                    </div>
                    <div class="col">
                        <input class="form-control" type="date" name="dataedf">
                    </div>
                </div>
                <!--- TEL DATA-->
                <div class="row form-group"> 
                    <div class="col">
                        <input class="form-control" type="tel" name="teledf" placeholder="Telefone">

                    </div>
                    <div class="col">

                        <input class="form-control" type="text" name="crfeedf" placeholder="CREF"></br>
                    </div>
                </div>
                <!--GENERO e FOCO-->
                <div class="row form-group">

                    <div class="col">
                        <select class="form-control" name="foco">
                            <option value="selecionar">Selecione o seu foco de trabalho:</option>
                            <option value="emagrecer">Emagrecer</option>
                            <option value="massa">Massa Muscular</option>

                        </select>

                    </div>
                    <div class="col">
                        <select class="form-control" name="generoeducadastro">
                            <option value="selecionar">Selecione o seu sexo:</option>
                            <option value="feminino">Feminino</option>
                            <option value="masculino">Masculino</option>
                            <option value="outro">Não Especificado</option>
                        </select>
                    </div>
                </div>


                <!-- DESCRICAO-->
                <div class="form-group" style="">

                    <input style="height:100px" type="text" class="form-control"  id="descedf" placeholder="Breve descrição sobre você!"></textarea>
                </div>


                <!--Senha CONFIRM-->
                <div class="row form-group"> 
                    <div class="col">
                        <input class="form-control" type="password" name="senhaedf" placeholder="Senha">
                    </div>
                    <div class="col">
                        <input class="form-control" type="password" name="confirmedf" placeholder="Confirmação de senha">
                    </div>
                </div>
                

                <!--FOTO -->
                <div  class="input-wrapper" >

                    <label for="foto_edf">Foto para cadastro</label><br>
                    <input type="file" id="foto_edf" value='' >
                    <span id='file-name-2'></span>

                </div>
                <!-- ENVIAR-->
                <div class="text-center">
                    <input class="btn btn-primary col-md-2" style="background-color:#044C86" type="submit" name="botaoedf" value="Cadastrar"></br>
                </div> 
            </form> 
        </div>

        <!-- NUTRI -->
        <div id="NUTRI" class="tabcontent p-md-4">
            <form id="formnutri" class="container my-4 " method="post" action="asd.php">
                <h1>Cadastro Nutricionista</h1>
                <!-- Nome Sobrenome-->
                <div class="row form-group">
                    <div class="col">
                        <input class="form-control" type="text" name="nomenutricadastro" placeholder="Nome"></br>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="sobrenomenutricadastro" placeholder="Sobrenome"></br>
                    </div>
                </div>
                <!-- Email CPF-->
                <div class="row form-group">
                    <div class="col">
                        <input class="form-control" type="email" name="emailnutricadastro" placeholder="meuemail@mail.com"></br>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="cpfnutricadastro" placeholder="CPF sem pontuação"></br>
                    </div>
                </div>
                <!---END DATA -->
                <div class="row form-group">
                    <div class="col">
                        <input class="form-control" type="text" name="endnutricadastro" placeholder="Endereço"></br>
                    </div>
                    <div class="col">
                        <input class="form-control" type="date" name="datanutri">
                    </div>
                </div>
                <!--- TEL CRN-->
                <div class="row form-group"> 
                    <div class="col">

                        <input class="form-control" type="tel" name="telnutri" placeholder="Telefone">
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="crnnutri" placeholder="CRN"></br>

                    </div>
                </div>

                <!--GENERO FOCO-->
                <div class="row form-group">
                    <div class="col">
                        <select class="form-control" name="foco">
                            <option value="selecionar">Selecione o seu foco de trabalho:</option>
                            <option value="emagrecer">Emagrecer</option>
                            <option value="massa">Massa Muscular</option>

                        </select>

                    </div>
                    <div class="col">
                        <select class="form-control" name="generoeducadastro">
                            <option value="selecionar">Selecione o seu sexo:</option>
                            <option value="feminino">Feminino</option>
                            <option value="masculino">Masculino</option>
                            <option value="outro">Não Especificado</option>
                        </select>
                    </div>



                </div>

                <!-- DESCRICAO-->
                <div class="form-group" style="">

                    <input style="height:100px" type="text" class="form-control"  id="descedf" placeholder="Breve descrição sobre você!"></textarea>
                </div>

                <!--Senha CONFIRM-->
                <div class="row form-group"> 
                    <div class="col">
                        <input class="form-control" type="password" name="senhanutri" placeholder="Senha">
                    </div>
                    <div class="col">
                        <input class="form-control" type="password" name="confirmnutri" placeholder="Confirmação de senha">
                    </div>
                </div>
                <!--FOTO -->
                <div  class="input-wrapper" >

                    <label for="foto_nutri">Foto para cadastro</label><br>
                    <input type="file" id="foto_nutri" value='' >
                    <span id='file-name-3'></span>

                </div>
                <!-- ENVIAR-->
                <div class="text-center">
                    <input class="btn btn-primary col-md-2" style="background-color:#044C86" type="submit" name="botao" value="Cadastrar"></br>
                </div>        
            </form>
        </div>


        <script>
            var x = 0
            document.getElementById("defaultOpen").click();
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            function reload() {
                x++;
                if (x > 1) {
                    location.reload();
                }
            }
            function abrirUsuario() {
                document.getElementById("defaultOpen2").click();
            }
            function ocultarLinksCadastro() {
                document.getElementById("Cadastro").style.display = 'none';
            }

        </script>

        <script>
            //Usuário Botão Foto
            var $input = document.getElementById('foto_usuario'),
                    $fileName = document.getElementById('file-name');

            $input.addEventListener('change', function () {
                $fileName.textContent = this.value;
            });
            //EDF Botão Foto
            var $inputE = document.getElementById('foto_edf'),
                    $fileNameE = document.getElementById('file-name-2');

            $inputE.addEventListener('change', function () {
                $fileNameE.textContent = this.value;
            });
            //NUTRI Botão Foto
            var $inputN = document.getElementById('foto_nutri'),
                    $fileNameN = document.getElementById('file-name-3');

            $inputN.addEventListener('change', function () {
                $fileNameN.textContent = this.value;
            });



        </script>




    </body>
</html> 
