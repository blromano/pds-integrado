<!DOCTYPE html>
<html>
<head>
    <title>solicitar</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
                            <h5 style="text-align: center;">Solicitação de acompanhamento</h5><br><img src="http://blogpilates.com.br/wp-content/uploads/2016/03/PILATES-EDUCADORES-FISICOS.jpg" style="width:130px;height:130px;">
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