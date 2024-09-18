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
        <link href="mod04.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="views/modules/Treinos/mod04.css"> 
    </head>
    <body>           
    <!--Dados do paciente ---> 
        <div class="container">
                    <br><br>
    <h3 class="text-center">Marcar consulta</h3>
    
    <div class="text-center">
    <h5> Selecione a data desejada </h5>
     <form action="testesemna.php" method="post">
            <input type="date" name="bday" min="2018-05-15"><br><br>
            <input type="button" value="Pesquisar" class="btn btn-primary btn-sm">
     </form>
    </div>     
    </div>
        </div>     
    </body>
</html>

