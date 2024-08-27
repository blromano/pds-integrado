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
            <div class="border col-md-10 offset-md-1 align-self-center mt-5">
                <h1 class="text-center mt-3"> Batimentos por Minuto </h1>
                
            </div>
        </div>
        <div class="row">
            <div class="border col-md-10 offset-md-1 align-self-center mt-2">
                <form class="form" method="POST" action="">
                    <div class="form-group">
                        <label class="p-1"for="imc">DATA INICIAL</label>
                        <input type="date" class="form-control form-control-lg" name="date-ini">
                    </div>
                    <div class="form-group">
                        <label class="p-1"for="imc">DATA FINAL</label>
                        <input type="date" class="form-control form-control-lg" name="date-end">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </div>
                </form>
            </div>
            <?php include(VIEWS_PATH."modules/CheckUps/relatorios/tabela_bpm.php"); ?>
          

            
        </div>
        <div class="row">
          <div class="border col-md-10 offset-md-1 align-self-center mt-2 bg-primary text-center">
                <a class="text-left text-light link" href="#">Realizar Teste</a>
            </div>
        </div>
    </section>
</body>