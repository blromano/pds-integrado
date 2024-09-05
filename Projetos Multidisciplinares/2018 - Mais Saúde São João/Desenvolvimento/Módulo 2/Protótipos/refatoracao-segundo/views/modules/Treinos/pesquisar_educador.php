<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Pesquisar Educador Físico</title>
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Pesquisar Educador </title>
    <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
    <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
    <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
    <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="hover.css">
    <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
    <link href="views\modules\Treinos\mod04.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>      
        
        <section onclick="closeNav()">
<div class="container-fluid">
<br/>
<br/>

    <h3>Pesquisar Educador Físico</h3> 
    <br>
    
    <form action="solicitareducador.php" method="post" class="form-group">

      <h4>Nome:</h4> 
        <input class="form-control col-md-4" type="text">
      <br>
      <h4>Faixa Etária: </h4>
        <select id="options" onchange="optionCheck()" name="filto_dois" class="form-control col-md-4">
            <option value="1">Indiferente</option>
            <option value="2">20-30</option>
            <option value="3">30-40</option>
            <option value="4">40-50</option>
            <option value="5">Acima de 50 Anos</option>
        </select>
      <br>
       <h4>Foco:</h4>
        <select id="options" onchange="optionCheck()" class="form-control col-md-4">
                    <option value="0">Indiferente</option>
					<option value="1">Geral</option>
                    <option value="2">Ganho de massa muscular</option>
                    <option value="3">Condicionamento Físico</option>
                    <option value="4">Bem Estar</option>
                    <option value="5">Emagrecimento</option>
					
        </select>
       <br>
        <h4>Gênero:</h4>
        <select id="options" class="form-control col-md-4">
            <option value="1">Indiferente</option>
            <option value="2">Feminino</option>
            <option value="3">Masculino</option>
            <option value="4">Não Especificado</option>
        </select>
        <br><br>
        <button type="button" class="btn btn-primary btn-sm"> Pesquisar </button>
    </form>
</div> 
        </section>
    </body>
</html>



