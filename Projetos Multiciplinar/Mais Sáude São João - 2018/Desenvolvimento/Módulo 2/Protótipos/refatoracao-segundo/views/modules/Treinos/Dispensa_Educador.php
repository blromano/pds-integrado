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
                   <button id="buscar"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Dispensar</button>          
        <!-- MODAL -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja dispensá-lo?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        
                    </div>
                    <div class="modal-footer">
                        <!-- BOTÕES DO MODAL -->
                        <a href="index.php"><button type="button" class="btn btn-success" >Sim</button></a>
                        <a href="index.php"><button type="button" class="btn btn-danger" >Não</button></a>
                    </div>
                </div>
            </div>
        </div>
        </div>     
    </body>
</html>

