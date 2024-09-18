<?php
session_start();

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <?php    
        $chave = "";
        if ($_GET["chave"]) { // se tiver a chave ( Se receber algum parâmetro) 
            $chave = $_GET["chave"];
            ?>
        
        <h1 class="text-center mt-5" > Alteração de Senha </h1>
         <div id="login" class="container ">
             <form action="<?= $_ROOT_PATH ?>/controllers/modules/Usuarios/gestao_mudar_senha.php" method="post" id="alterar_senha" class="container my-4" onsubmit="return Validar_Recu_Senha();">
                    <input type="hidden"  name="chave" id="chave" value="<?php echo $chave; ?>"/> 
                    <div class="row form-group">
                        <div class="col">
                            E-mail
                            <input class="form-control" type="email" name="email_recu_senha" id="email_recu_senha" required placeholder="Confirme seu email:" maxlength="100">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            Nova senha
                            <input class="form-control" type="password" name="nova_senha" id="nova_senha" required placeholder="Digite sua nova senha:" maxlength="8">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            Confirmar nova senha
                            <input class="form-control" type="password" name="cofirmar_senha" id="cofirmar_senha" required placeholder="Confirme sua nova senha:" maxlength="8">
                        </div>
                    </div>

                    <div class="text-center">
                        <input class="btn btn-primary col-md-2" type="submit" value="Recuperar"></br>
                    </div>  
                </form>
            </div>


            <?php
        } else { // se não tiver a chave 
            $_SESSION['msg'] = "pagina_nao_encontrada";
            header("location:index.php?mod=usuarios&sub=login");
        }
        ?>
        
        
        
        
           <!-- ERRO Senha e confirmar senha-->
        <div class="modal fade" id="senha_modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Error</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        Os campos Senha e Confirmação de senha devem ser iguais !! 

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
