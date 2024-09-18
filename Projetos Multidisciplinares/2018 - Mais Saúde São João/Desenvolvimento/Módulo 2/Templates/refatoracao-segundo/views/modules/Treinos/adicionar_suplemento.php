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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            solicitar
        </button>

        <!-- MODAL -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- FORMULÁRIO -->
                    <form> 
                        <div class="modal-body">                                                  
                            <label class="font-weight-bold" >Nome:</label> 
                            <div class="form-group">
                                <input class="form-control" type="text">
                            </div>
                            <br>                                   
                                <div class="form-group">
                                    <input type="file" id="file" >
                                </div>
                            <br><label class="font-weight-bold">Utilização:</label> 
                                <div class="form-group">
                                    <input class="form-control" type="text">
                                </div>
                            <h7><label class="font-weight-bold">Composição:</label>
                            <div class="form-group">
                                    <input class="form-control" type="text">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success">
                                     Confirmar dados
                                </button>
                            </div>                        
                        </div>
                    </form>
        </div>     
    </body>
</html>

