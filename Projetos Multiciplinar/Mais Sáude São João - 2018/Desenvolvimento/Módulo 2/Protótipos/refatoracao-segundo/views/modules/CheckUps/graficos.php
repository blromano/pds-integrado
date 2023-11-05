<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> +Saúde São João </title>
    <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
    <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
    <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
    <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="<?=$_ROOT_PATH?>views/modules/CheckUps/hover.css">
    <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
</head>
<body>
    <?php 
    $vertical_menu_links = [
        "Nome do link"=>"link_de_redirecionamento.html"
    ]; 
    include(VIEWS_PATH.'/module_base.php'); 
    ?>
    <section onclick="closeNav()">
        <div class="row">
            <div class="border col-md-6 offset-md-3 align-self-center mt-5">
                <h1 class="text-center mt-3"> Índice de Massa Corpórea </h1>
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="sexo">Informe seu sexo</label>
                            <div class="form-group" id="sexo">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Masculino
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Feminino
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <labe for="peso">Insira seu peso</labe>
                                <input type="number" class="form-control" name="peso" id="peso">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <labe for="peso">Insira sua altura</labe>
                                <input type="number" class="form-control" name="peso" id="peso">
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-danger">
                </form>
            </div>
        </div>    
    </section>
</body>