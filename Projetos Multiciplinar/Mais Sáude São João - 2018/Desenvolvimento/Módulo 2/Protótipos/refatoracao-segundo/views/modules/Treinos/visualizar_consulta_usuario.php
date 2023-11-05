<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Marcar Consulta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
	<link rel="stylesheet" href="custom-css/build/mssj-style.css">    
    <link rel="stylesheet" type="text/css" href="views/modules/Treinos/mod04.css">  
    </head>
    <body>
        
        <section onclick="closeNav()">
        
            <!-- Modal -->
            <div id="consulta">
                <div  class="card border-dark mb-5 bordaaviso">
                   <div class="card-body">
                       <div class="card-text text-justify">
                           Você tem uma consulta dia <span>25/3 (segunda-feira)</span> às <span>13:00hs</span> com o educador físico <span>Rogerinho</span> no seguinte local: <span>Postinho do Duval<span>
                           
                       </div>    
                   </div>
                 </div>
                <div id="botao">
                    <button class="btn btn-success" value="Remarcar">Remarcar</button>

                    <button class="btn btn-danger" value="Cancelar">Cancelar </button>
                </div>      
            </div>
          
        </section>
    </body>
</html>




