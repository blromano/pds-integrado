<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Lista_Usuarios</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <meta charset="utf-8">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        
         
    </head>
    <body>

        <div class="container row">
            <h2 style="text-align:center; padding-bottom: 50px;">Lista de Suplementos alimentares</h2>
            

                <div  class="row" >
                    <form style=" margin-left: 23px;">
                        <div class="form-group">
                            <input type="text" class="form" >
                            <input type="button" value="Pesquisar" class="btn btn-primary ">
                       
                            <a href="#.php">
                                <button type="button" class="btn btn-success btn-sm" style="float:right; margin-right: 23px;">
                                    Adicionar suplemento
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
                
            <div class="table-responsive">
                <table class="table-condensed table-hover  table-striped table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="col-md-1">1</th>
                            <td class="col-md-6">(HOT) Termogênico - 60 comprimidos</td>
                            <td class="col-md-4">Termogênico</td>     
                            <td>
                                <a href="perfilusuario.php">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Visualizar dados
                                    </button>
                                </a>
                            </td>  
                            <td>
                                <a href="perfilusuario.php">
                                    <button type="button" class="btn btn-danger btn-sm">
                                        Excluir
                                    </button>
                                </a>
                            </td> 
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Creatina (250g) (Creapure®) - Growth Supplements</td>
                            <td>Aminoácidos</td> 
                            <td>
                                <a href="perfilusuario.php">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Visualizar dados
                                    </button>
                                </a>
                            </td> 
                            <td>
                                <a href="perfilusuario.php">
                                    <button type="button" class="btn btn-danger btn-sm">
                                        Excluir
                                    </button>
                                </a>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">4</th>
                            <td>BCAA (120 caps) - Growth Supplements</td>
                            <td>Aminoacidos</td>
                            <td>
                                <a href="perfilusuario.php">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Visualizar dados
                                    </button>
                                </a>
                            </td> 
                            <td>
                                <a href="perfilusuario.php">
                                    <button type="button" class="btn btn-danger btn-sm">
                                        Excluir
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
