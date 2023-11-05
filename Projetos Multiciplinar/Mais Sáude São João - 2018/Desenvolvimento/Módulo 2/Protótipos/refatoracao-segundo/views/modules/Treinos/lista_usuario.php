<!DOCTYPE html>
<html lang="pt-br">
    <head>
	 <title>Lista de Usuários</title>
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
	   <link rel="stylesheet" href="custom-css/build/mssj-style.css">     
        <link href="views\modules\Treinos\mod04.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>           

	<section onclick="closeNav()">
        <div class="container">
		<br><br>
            <h3 class="text-center">Lista de Usuários</h3>
           <br>
            <form>
                <form action="pesquisar_ficha.php" mathod="POST" class="text-right ">
                        <div class="form-group">
                            <input type="text" class="form" name="pesquisar" >
                            <input type="button" value="Pesquisar"  class="btn btn-primary btn-sm">
                        </div>
                    </form>
            <br><br>
            <div class="text-center container-fluid">
                <table class="table table-hover table-striped table-condensed">
                    <thead>
                        <tr class="row">
                            <th class="col-sm-2"></th>
                            <th class="col-sm-2">Nome</th>
                            <th class="col-sm-2">Sobrenome</th>
                            <th class="col-sm-2">CPF</th>  
                            <th class="col-sm-2"> </th>
                            <th class="col-sm-2"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="row">
                            <th class="col-sm-2">1</th>
                            <td class="col-sm-2">Iago</td>
                            <td class="col-sm-2">José Silva</td>      
                            <td class="col-sm-2">12332145607</td>
                            <td class="col-sm-2">
                                <a href="perfilusuario.php">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Editar dados
                                    </button>
                                </a>
                            </td> 
                            <td class="col-sm-2">
                                <a href="perfilusuario.php">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Ficha de treinamento
                                    </button>
                                </a>
                            </td>
                        </tr>
              </tbody>
                </table>               
            </div>               
        </div>

</section>		
    </body>
</html>

