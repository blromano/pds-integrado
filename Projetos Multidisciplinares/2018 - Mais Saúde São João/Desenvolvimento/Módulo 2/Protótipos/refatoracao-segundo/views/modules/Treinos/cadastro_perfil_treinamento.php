<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="hover.css">
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
        <link href="views\modules\Treinos\mod04.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="views/modules/Treinos/mod04.css"> 
    </head>
    <body>           
    <!--Dados do paciente ---> 
        <div class="container">
            <br><br>
            <h1 class="text-center center " >Cadastro do perfil de treinamento</h1>
            <br><br>
            <div class="text-center">
                <img id="imgperfilcadastro" class="rounded img-circle" src="images/logo.png"/>                     
            </div>           
            <br><br>
            <form class="text-center form" method="post"  action="test.php">
                <div id="conteudocadastro">
                    <!-- NIVEL DE EXPERIÊNCIA-->
                    <div class="row form-group col-md-5">
                        <div class="col">
                            <label for="comment">Nível de experiência:</label>
                            <select id="option1" name="select_experiencia" class="form-control" >
                                <option value="0">Selecione uma opção</option>
                                <option value="1">Iniciante</option>
                                <option value='2'>Intermediário</option>
                                <option value='3'>Avançado</option>
                            </select>
                        </div>          
                    </div>
                    <!-- OBJETIVO INICIAL-->
                    <div class="row form-group col-md-5">
                        <div class="col">
                            <label for="comment">Objetivo inicial:</label>
                            <select id="option1" name="select_experiencia" class="form-control" >
                                <option value="0">Selecione uma opção</option>
                                <option value="1">Emagrecer</option>
                                <option value='2'>Outro</option>
                            </select>
                        </div>
                    </div>                   
                    <!-- ENVIAR-->
                    </div>
                    <div >    
                        <br>
                        <input class=" btn-primary " type="submit" name="botao" value="Cadastrar"></br>
                    </div>
                    <br><br>
                
            </form>           
        </div>     
    </body>
</html>

