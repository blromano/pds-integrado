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
            Editar
        </button>

        <!-- MODAL -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <label class="font-weight-bold" aria-hidden="true">&times;</label>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-group">
                            <label class="font-weight-bold">Nome:</label> 
                            <input class="form-control" type="text" value="Creatina (250g) (Creapure®) - Growth Supplements">
                            <img class="imgsuplemento" src="http://d38srl572sbiks.cloudfront.net/Custom/Content/Products/98/59/985927_creatina-100g-creapure-growth-supplements_m2_636247412072642000.jpg">
                            <br><br><input type="file" >
                            <br><br><br><label class="font-weight-bold">Utilização:</label> 
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="comment" readonly >A creatina é um derivado de aminoácidos obtida através da dieta de síntese por nosso próprio organismo. Ela está presente essencialmente no músculo e auxilia na manutenção dos níveis de energia durante períodos breves de exercício intenso. Ou seja, sua função é crucial nos treinos com muito peso na busca pelo ganho de massa</textarea>
                                <label class="font-weight-bold">Composição:</label>
                                <div class="form-group">
                                    <textarea class="form-control" rows="2" id="comment" readonly>Creatina</textarea>
                                </div>
                                <!-- ENVIA DADOS -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success">
                                         Confirmar dados
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>     
    </body>
</html>

