<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Lista_Usuarios</title>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="bower_components/jquery/dist/jquery.js" charset="utf-8"></script>
	<script src="bower_components/popper.js/dist/popper.js" charset="utf-8"></script>
	<script src="bower_components/bootstrap/dist/js/bootstrap.js" charset="utf-8"></script>
	<script src="scripts/animations.js" charset="utf-8"></script>
	<link rel="stylesheet" href="custom-css/build/mssj-style.css">    
         
    </head>
    <body>
        <br><br>
        <div class="container">
            <h2 class="text-center">Lista de Usuários</h2>
            <br>
            <form>
                <div class="form-group text-right">
                    <input type="text" class="form">
                    <input type="button" value="Pesquisar" class="btn btn-primary ">
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
    </body>
</html>
