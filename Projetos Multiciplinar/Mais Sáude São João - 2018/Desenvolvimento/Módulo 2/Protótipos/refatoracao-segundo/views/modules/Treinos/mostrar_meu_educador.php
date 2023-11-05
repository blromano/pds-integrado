<!DOCTYPE html>
<html>
<head>
    <title>solicitar</title>
    <link href="modais.css" rel="stylesheet" type="text/css"/>
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
        <!-- Button trigger modal -->
        <div class=" abremodal imagemcard card border-dark mb-3 text-center" class="col-md-1">
                    <a data-toggle="modal" data-target="#exampleModal"><img class="card-img-top" src="http://blogpilates.com.br/wp-content/uploads/2016/03/PILATES-EDUCADORES-FISICOS.jpg" alt="Card image cap"></a>
                    <div class="card-body">
                    <h5 class="card-title" data-toggle="modal" data-target="#exampleModal">Rogerinho</h5>
                    </div>
        </div>
        <div class=" abremodal imagemcard card border-dark mb-3 text-center" class="col-md-1">
                    <a data-toggle="modal" data-target="#exampleModal"><img class="card-img-top" src="http://blogpilates.com.br/wp-content/uploads/2016/03/PILATES-EDUCADORES-FISICOS.jpg" alt="Card image cap"></a>
                    <div class="card-body">
                    <h5 class="card-title" data-toggle="modal" data-target="#exampleModal">Sergitos</h5>
                    </div>
        </div>
        
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="text-center">Educador Físico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <img class="imagemmodal" src="http://blogpilates.com.br/wp-content/uploads/2016/03/PILATES-EDUCADORES-FISICOS.jpg"><br><br><h7>Nome: Nome completo</h7><br><h7>Idade: 30</h7><br><h7>Genero: Masculino</h7><br><h7>formação academica: universidade <a href="lates">link do lates</a></h7><br><h7>Foco:</h7><br><h7>descrição:</h7><br> 
                    <div class="form-group">
                          <label for="comment">Descrição:</label>
                          <textarea class="form-control" rows="5" id="comment" readonly></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">solicitar</button>
                  </div>
                </div>
              </div>
            </div>
       </section>
</body>
</html>