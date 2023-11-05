<!DOCTYPE html>
<html>
<head>
    <title>solicitar</title>
    <meta charset="utf-8">
	 <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="bower_components/jquery/dist/jquery.js" charset="utf-8"></script>
	<script src="bower_components/popper.js/dist/popper.js" charset="utf-8"></script>
	<script src="bower_components/bootstrap/dist/js/bootstrap.js" charset="utf-8"></script>
	<script src="scripts/animations.js" charset="utf-8"></script>
	<link rel="stylesheet" href="custom-css/build/mssj-style.css">     
        <link href="Cssmatheus.css" rel="stylesheet" type="text/css"/>
</head>
<body>
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                solicitar
            </button>
        
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>Solicitação de acompanhamento</h5><br><img class="imgmodal" src="http://blogpilates.com.br/wp-content/uploads/2016/03/PILATES-EDUCADORES-FISICOS.jpg">
                            <br><h7>Nome: Rogerinho do povo</h7><br><br>
                            <h7>Data de nascimento: 10/04/1900</h7><br><br>
                            <h7>Gênero: Não especificado</h7><br><br>
                            <h7>Endereço: 123 de oliveira 4</h7><br><br>
                            <h7>E-mail: fulano@bol.com</h7><br><br>
                            <h7>Telefone:(19) 93612-4565</h7><br><br>
                            <h7>Nível de experiência:Iniciante</h7><br><br>
                            <h7>Objetivo inicial: Emagrecer</h7><br><br>
                        
                    <div class="form-group">
                          <label for="comment">Descrição:</label>
                          <textarea class="form-control" rows="5" id="comment" readonly></textarea>
                    </div>
                  </div>
                   <div class="modal-footer">
                        <a href="index.php"><button type="button" class="btn btn-danger" >Não</button></a>
                        <a href="index.php"><button type="button" class="btn btn-success" >Sim</button></a>
                    </div>
                </div>
              </div>
            
</body>
</html>