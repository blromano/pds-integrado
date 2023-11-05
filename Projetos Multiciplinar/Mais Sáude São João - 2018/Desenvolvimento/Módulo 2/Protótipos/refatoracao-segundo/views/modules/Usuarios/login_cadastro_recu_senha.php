<!DOCTYPE html>
<?php
session_start();
include 'modais_mod01.php'; // incluir os modais do mod 01 
?>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?= JQUERY_PATH ?>" charset="utf-8"></script>
        <script src="<?= POPPER_PATH ?>" charset="utf-8"></script>
        <script src="<?= THEME_JS_PATH ?>" charset="utf-8"></script>
        <script src="<?= ANIMATIONS_PATH ?>" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="<?= $_ROOT_PATH ?>views/modules/Usuarios/mod01.css">
        <link rel="stylesheet" href="<?= THEME_CSS_PATH ?>">
        <script src="<?= $_ROOT_PATH ?>/scripts/mod01.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="tab bg-dark">
            <button class="tablinks text-white p-3" onclick="openCity(event, 'Login'); ocultarLinksCadastro();" id="defaultOpen">Login</button>
            <button  class="tablinks text-white p-3" data-toggle="collapse" data-target="#cadastro" onclick="openCity(event, 'Cadastro'); abrirUsuario()">Cadastro</button>
            <button class="tablinks text-white p-3" onclick="openCity(event, 'esqueci_senha'); ocultarLinksCadastro();" id="defaultOpen3">Recuperar Senha</button>
        </div>
        <!-- Login -->
        <div id="Login" class="tabcontent multi-collapse p-md-4">
            <h1 class="text-center">Login</h1>
            <div class="text-center">
                <?php
                if (isset($_SESSION['login_incorreto'])) {
                    echo $_SESSION['login_incorreto'];
                    unset($_SESSION['login_incorreto']);
                }
                ?>
            </div>
            <div id="login" class="container ">
                <form method="post" action="<?= $_ROOT_PATH ?>/controllers/modules/Usuarios/validar_login.php" id="login" class="container my-4">
                    <div class="row form-group">
                        <div class="col">
                            E-mail
                            <input class="form-control" type="email" name="email_login" id="email_login" required maxlength="255">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            Senha
                            <input class="form-control" type="password" name="senha_login" id="senha_login" required maxlength="8">
                        </div>
                    </div>

                    <div class="text-center">
                        <input class="btn btn-primary col-md-2" type="submit" name="btLogar"  id="btLogar" value="Entrar"></br>
                    </div>  
                </form>
            </div>
        </div>

        <!--Esqueci minha senha -->
        <div id="esqueci_senha" class="tabcontent text-center p-5" >
            <h1> Recuperação de Senha </h1>
            <form id="esqueci_minha_senha" class="container my-4 " action="<?= $_ROOT_PATH ?>/controllers/modules/Usuarios/gestao_esqueci_senha.php" method="post">
                <div class="row form-group">
                    <div class="col">

                        <input class="form-control" type="email" name="email_esqueci_senha" id="email_esqueci_senha" placeholder="Digite seu email:" required maxlength="255"></br>
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col">
                        <input class="btn btn-primary col-md-4" type="submit" name="enviar_esquecisenha" value="Enviar recuperação de senha"></br>
                    </div>
                </div>
            </form>
        </div>
        <div  id="Cadastro" class="collapse multi-collapse text-center p-md-4">
            <button class="btn tablinks col-md-2 btn-info" onclick="openCity(event, 'Usuario')" id="defaultOpen2">População</button>
            <button class="btn tablinks col-md-2 btn-danger" onclick="openCity(event, 'EDF')">Educador Físico</button>
            <button class="btn tablinks col-md-2 btn-success text-white" onclick="openCity(event, 'NUTRI')">Nutricionista</button>
        </div>


        <!-- Usuario -->
        <div id="Usuario" class="tabcontent p-md-4 p-5">
            <h1 class="text-center">Cadastro Usuário</h1>
            <?php
            if (isset($_SESSION['msg'])) {   // Se existir essa variavel global deverá acessar esse if.
                if ($_SESSION['msg'] == "sucesso") {
                    ?>
                    <script>
                        $(function () {
                            $('#sucesso').modal('show');
                        });
                    </script>
              <?php      
                    } 
                    if ($_SESSION['msg'] == "sucesso_senha") {
                    ?>
                    <script>
                        $(function () {
                            $('#sucesso_senha').modal('show');
                        });
                    </script>
              <?php      
                    }
                    if ($_SESSION['msg'] == "senha_alterada") {
                    ?>
                    <script>
                        $(function () {
                            $('#sucesso_alteracao_senha').modal('show');
                        });
                    </script>
              <?php      
                    }
                    if ($_SESSION['msg'] == "email_erro_senha") {
                    ?>
                    <script>
                        $(function () {
                            $('#email_erro_senha').modal('show');
                        });
                    </script>
              <?php      
                    }
                    if ($_SESSION['msg'] == "pagina_nao_encontrada") {
                    ?>
                    <script>
                        $(function () {
                            $('#pagina_nao_encontrada').modal('show');
                        });
                    </script>
              <?php      
                    }
                    unset($_SESSION['msg']);
                    }
                    ?>

                    <form id="formUsuario" class="container my-4 " method="post" action="<?= $_ROOT_PATH ?>/controllers/modules/Usuarios/gestao_cadastro_usu.php" enctype="multipart/form-data">
                        <div class="row form-group">
                            <div class="col">

                                <input class="form-control" type="text" name="nomeusucadastro" placeholder="Nome" required maxlength="100"></br>
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" name="sobrenomeusucadastro" placeholder="Sobrenome" required maxlength="100"></br>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <input class="form-control" type="email" name="emailusucadastro" id="emailusucadastro" placeholder="meuemail@mail.com" required maxlength="100"></br>
                            </div>
                            <div class="col">

                                <input class="form-control" type="text" id="cpf_usu" name="cpf_usu" placeholder="CPF sem pontuação" size="11" maxlength="11"  required></br>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <input class="form-control" type="text" name="endusucadastro" placeholder="Endereço" maxlength="100"></br>
                            </div>
                            <div class="col">
                                <input class="form-control" type="date" name="datausucadastro" placeholder="dd/mm/aaaa" required></br>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <input class="form-control" type="tel" name="telusucadastro" placeholder="Telefone" maxlength="10"></br>
                            </div>



                            <div class="col">
                                <select class="form-control" name="generoeducadastro" required>
                                    <option value="">Selecione o seu sexo:</option>
                                    <option value="1">Feminino</option>
                                    <option value="2">Masculino</option>
                                    <option value="3">Não Especificado</option>

                                </select>




                            </div>

                        </div>

                        <div class="row form-group">


                            <div class="col">
                                <input class="form-control" type="password" name="senhausucadastro" placeholder="Senha de até 8 caracteres" required maxlength="8"></br>
                            </div>
                            <div class="col">
                                <input class="form-control" type="password" name="confirsenhausucadastro" placeholder="Confirmação de senha" required maxlength="8"></br>
                            </div>
                        </div>
                        <!--Avisos-->
                        <div class="row form-group"> 
                            <div class="col-md-4">
                                <select class="form-control" name="avisos_usu" required>
                                    <option value="">Deseja receber avisos?</option>
                                    <option value="1">Sim</option>
                                    <option value="2">Nao</option>


                                </select>
                            </div>

                        </div>


                        <div class="form-group">


                            <div class="form-group">

                                <div>

                                    <label class="bg-primary rounded text-white p-2" for="foto_usu">Foto para cadastro</label><br>
                                    <input type="file" id="foto_usu" name="foto_usu" value='camino_foto'>
                                    <span id='file-name'></span>

                                </div>
                            </div>

                        </div>
                        <div class="text-center">

                            <input name="btCadastrar" id="btnusuario" class="button btn btn-primary" type="submit" value="Cadastrar">

                        </div>        
                    </form>
                </div>

                <!-- EDUCADOR FISICO -->
                <div id="EDF" class="tabcontent p-md-4" >
                    <h1 class="text-center">Cadastro Educador Físico</h1>

                    <?php
                    if (isset($_SESSION['msg_edf'])) {   // Se existir essa variavel global deverá acessar esse if.
                        echo $_SESSION['msg_edf'];
                        unset($_SESSION['msg_edf']);
                    }
                    ?>
                    <form id="formEdf" class="container my-4 " method="post" action="<?= $_ROOT_PATH ?>/controllers/modules/Usuarios/gestao_cadastro_edf.php" enctype="multipart/form-data">
                        <!-- Nome Sobrenome-->
                        <div class="row form-group">
                            <div class="col">
                                <input class="form-control" type="text" name="nome_edf" placeholder="Nome" required maxlength="100"></br>
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" name="sobrenome_edf" placeholder="Sobrenome" required maxlength="100"></br>
                            </div>
                        </div>
                        <!-- Email CPF-->
                        <div class="row form-group">
                            <div class="col">
                                <input class="form-control" type="email" name="email_edf" id="email_edf" placeholder="meuemail@mail.com" required maxlength="100"></br>
                            </div>
                            <div class="col">
                                <input class="form-control" type="text" id="cpf_edf" name="cpf_edf" placeholder="CPF sem pontuação" size="11" maxlength="11"  required></br>
                            </div>
                        </div>
                        <!---END CRF -->
                        <div class="row form-group">
                            <div class="col">
                                <input class="form-control" type="text" name="end_edf" placeholder="Endereço" maxlength="1000"></br>
                            </div>
                            <div class="col">
                                <input class="form-control" type="date" name="data_edf" required>
                            </div>
                        </div>
                        <!--- TEL DATA-->
                        <div class="row form-group"> 
                            <div class="col">
                                <input class="form-control" type="tel" name="tel_edf" placeholder="Telefone" maxlength="10">

                            </div>
                            <div class="col">

                                <input class="form-control" type="text" name="cref_edf" id="cref_edf" placeholder="CREF" required maxlength="12"></br>
                            </div>
                        </div>
                        <!--GENERO e FOCO-->
                        <div class="row form-group">

                            <div class="col">

                                <select class="form-control" name="foco_edf" required>
                                    <option value="">Selecione o seu foco de trabalho:</option>
                                    <option value="1">Emagrecer</option>
                                    <option value="2">Massa Muscular</option>


                                </select>

                            </div>
                            <div class="col">
                                <select class="form-control" name="genero_edf" required>
                                    <option value="">Selecione o seu sexo:</option>
                                    <option value="1">Feminino</option>
                                    <option value="2">Masculino</option>
                                    <option value="3">Não Especificado</option>

                                </select>

                            </div>

                            <div class="col">
                                <select class="form-control" name="status_edf" required>
                                    <option value="">Selecione o seu status:</option>
                                    <option value="1">Disponível</option>
                                    <option value="2">Indisponível</option>


                                </select>

                            </div>
                        </div>


                        <!-- DESCRICAO-->
                        <div class="form-group">

                            <textarea style="height:100px" type="text-area" class="form-control"  name="desc_edf" id="desc_edf" placeholder="Breve descrição sobre você!" maxlength="1000"></textarea>
                        </div>


                        <!--Senha CONFIRM-->
                        <div class="row form-group"> 
                            <div class="col">
                                <input class="form-control" type="password" name="senha_edf" placeholder="Senha  de até 8 caracteres!" required maxlength="8">
                            </div>
                            <div class="col">
                                <input class="form-control" type="password" name="confirma_edf" placeholder="Confirmação de senha" required maxlength="8">
                            </div>
                        </div>


                        <!--FOTO -->
                        <div>

                            <label class="bg-primary rounded text-white p-2" for="foto_edf">Foto para cadastro</label><br>
                            <input type="file" id="foto_edf" name="foto_edf" value='camino_foto'>
                            <span id='file-name-2'></span>

                        </div>
                        <!-- ENVIAR-->
                        <div class="text-center">



                            <input name="btn_edf" id="btn_edf" class="button btn btn-primary" type="submit" value="Cadastrar">

                        </div>
                    </form> 
                </div>

                <!-- NUTRI -->
                <div id="NUTRI" class="tabcontent p-md-4">

                    <h1 class="text-center">Cadastro Nutricionista</h1>
                    <?php
                    if (isset($_SESSION['msg_edf'])) {   // Se existir essa variavel global deverá acessar esse if.
                        echo $_SESSION['msg_edf'];
                        unset($_SESSION['msg_edf']);
                    }
                    ?>
                    <form id="formNutri" class="container my-4 " method="post" action="<?= $_ROOT_PATH ?>/controllers/modules/Usuarios/gestao_cadastro_nutri.php" enctype="multipart/form-data">

                <!-- Nome Sobrenome-->
                <div class="row form-group">
                    <div class="col">
                        <input class="form-control" type="text" name="nome_nutri" placeholder="Nome" required maxlength="100"></br>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="sobrenome_nutri" placeholder="Sobrenome" required maxlength="100"></br>
                    </div>
                </div>
                <!-- Email CPF-->
                <div class="row form-group">
                    <div class="col">
                        <input class="form-control" type="email" name="email_nutri" id="email_nutri" placeholder="meuemail@mail.com" required maxlength="100"></br>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" id="cpf_nutri" name="cpf_nutri" placeholder="CPF sem pontuação" size="11" maxlength="11"  required></br>
                    </div>
                </div>
                <!---END DATA -->
                <div class="row form-group">
                    <div class="col">
                        <input class="form-control" type="text" name="end_nutri" placeholder="Endereço" maxlength="1000"></br>
                    </div>
                    <div class="col">
                        <input class="form-control" type="date" name="data_nutri" required>
                    </div>
                </div>
                <!--- TEL CRN-->
                <div class="row form-group"> 
                    <div class="col">

                        <input class="form-control" type="tel" name="tel_nutri" placeholder="Telefone" maxlength="10">
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" name="crn_nutri" id="crn_nutri" placeholder="CRN" required maxlength="10"></br>

                    </div>
                </div>

                <!--GENERO FOCO e STATUS-->
                <div class="row form-group">
                    <div class="col">

                        <select class="form-control" name="foco_nutri" required>
                            <option value="">Selecione o seu foco de trabalho:</option>
                            <option value="1">Emagrecer</option>
                            <option value="2">Massa Muscular</option>


                        </select>

                    </div>

                    <div class="col">
                        <select class="form-control" name="genero_nutri" required>
                            <option value="">Selecione o seu sexo:</option>
                            <option value="1">Feminino</option>
                            <option value="2">Masculino</option>
                            <option value="3">Não Especificado</option>

                        </select>

                    </div>

                    <div class="col">
                        <select class="form-control" name="status_nutri" required>
                            <option value="">Selecione o seu status:</option>
                            <option value="1">Disponível</option>
                            <option value="2">Indisponível</option>


                        </select>

                    </div>




                </div>

                <!-- DESCRICAO-->
                <div class="form-group">

                    <textarea style="height:100px" type="text" class="form-control" name="desc_nutri" id="desc_nutri" placeholder="Breve descrição sobre você!" maxlength="1000"></textarea>
                </div>

                <!--Senha CONFIRM-->
                <div class="row form-group"> 
                    <div class="col">
                        <input class="form-control" type="password" name="senha_nutri" placeholder="Senha de até 8 caracteres" required maxlength="8">
                    </div>
                    <div class="col">
                        <input class="form-control" type="password" name="confirma_nutri" placeholder="Confirmação de senha" required maxlength="8">
                    </div>
                </div>
                <!--FOTO -->
                <div>

                    <label class="bg-primary rounded text-white p-2" for="foto_nutri">Foto para cadastro</label><br>
                    <input type="file" id="foto_nutri" name="foto_nutri" value='camino_foto'>
                    <span id='file-name-3'></span>

                </div>
                <!-- ENVIAR-->
                <div class="text-center">



                    <input name="btn_nutri" id="btn_nutri" class="button btn btn-primary" type="submit" value="Cadastrar">

                </div>       
            </form>
        </div>
    </body>
</html> 
