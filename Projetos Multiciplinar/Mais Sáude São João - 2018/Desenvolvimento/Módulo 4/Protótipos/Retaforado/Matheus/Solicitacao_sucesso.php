<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title>Atualizar Dados</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="bower_components/jquery/dist/jquery.js" charset="utf-8"></script>
	<script src="bower_components/popper.js/dist/popper.js" charset="utf-8"></script>
	<script src="bower_components/bootstrap/dist/js/bootstrap.js" charset="utf-8"></script>
	<script src="scripts/animations.js" charset="utf-8"></script>
	<link rel="stylesheet" href="custom-css/build/mssj-style.css">    
 	



    </head>

    <body>
  

        <div class="container">
            <div class="info">
                <br>
                <br>
                <h1>Atualizar Dados!</h1>
            </div>
        </div>


            <button id="buscar"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Confirmar</button>
      
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Solicitação enviada com sucesso</h4>
                    </div>
                    <div class="modal-footer">
                        <!--<a href="index.php"><button type="button" class="btn btn-success" >Não</button></a>-->
                        <a href="index.php"><button type="button" class="btn btn-success">Continuar</button></a>
                    </div>
                </div>
            </div>
        </div>
        

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



        <script  src="js/index.js"></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>


    </body>

</html>