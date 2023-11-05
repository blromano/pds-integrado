<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Fichas de Treinamento</title>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="bower_components/jquery/dist/jquery.js" charset="utf-8"></script>
	<script src="bower_components/popper.js/dist/popper.js" charset="utf-8"></script>
	<script src="bower_components/bootstrap/dist/js/bootstrap.js" charset="utf-8"></script>
	<script src="scripts/animations.js" charset="utf-8"></script>
	<link rel="stylesheet" href="custom-css/build/mssj-style.css">     
    </head>
    <body>

        <div class="container">
		<br><br>
            <h3 class="text-center">Fichas de Treinamentos da Vitoria</h3>
           <br>
                <div  class="">
                    <form class="text-right ">
                        <div class="form-group">
                            <input type="text" class="form" >
                            <input type="button" value="Pesquisar" class="btn btn-primary btn-sm">
                       
                            <a href="#.php">
                                <button type="button" class="btn btn-success btn-sm">
                                    Adicionar ficha de treinamento
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
				<br><br>
            <div class=" text-center container-fluid">
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr class="row">
                            <th class="col-sm-2"></th>
                            <th class="col-sm-2">Data</th>
                            <th class="col-sm-2">Nome da Atividade</th>
                            <th class="col-sm-2">Período de duração </th>
                            <th class="col-sm-2"></th>
                            <th class="col-sm-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr  class="row">
                            <th class="col-sm-2">1</th>
                            <td  class="col-sm-2">26/04/2018</td>
                            <td  class="col-sm-2">Agachamento morcego</td>  
                            <td  class="col-sm-2">26/05/2018</td> 
                            <td  class="col-sm-2">
                                <a href="perfilusuario.php">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Exibir dados
                                    </button>
                                </a>
                            </td>
                            <td class="col-sm-2">
                                <a href="perfilusuario.php">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Enviar por e-mail
                                    </button>
                                </a>
                            </td> 
                            
                        </tr> 
                    </tbody>                    
                </table>               
            </div>               
        </div>
    </body>
</html>
