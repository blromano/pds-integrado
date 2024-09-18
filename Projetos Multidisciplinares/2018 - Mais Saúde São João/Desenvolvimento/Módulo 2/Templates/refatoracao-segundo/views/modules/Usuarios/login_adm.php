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
      
        <!-- Login -->
        <div id="Login" class="tabcontent multi-collapse p-md-4">
            <h1 class="text-center">Área Administrativa</h1>
            <div class="text-center">
                <?php
                if (isset($_SESSION['login_incorreto_adm'])) {
                    echo $_SESSION['login_incorreto_adm'];
                    unset($_SESSION['login_incorreto_adm']);
                }
                ?>
            </div>
            <div id="login" class="container ">
                <form method="post" action="<?= $_ROOT_PATH ?>/controllers/modules/Usuarios/validar_login_adm.php" id="login" class="container my-4">
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

       
    </body>
</html> 
