<?php
$pagina = "triagem2";
$local = "../";

?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"></h1>
<section>
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">
        <h1 class="text-white mb-4"></h1>
        <div class="card" style="border-radius: 15px;">
          <div class="d-flex flex-column align-items-center w-90">
            <img class="rounded-circle mt-5" width="150px" src="../resources/img/logo.png" class="font-weight-bold">
            <h2>Triagem</h2></span>
          </div>
          <div class="d-flex flex-column align-items-center w-90">
            <h3>Marque todas as afirmativas abaixo que se aplicam a você</h3>
          </div>
          <div class="card-body">
            <div class="col align-items-center pt-4 pb-3">


              <div class="row-9 pe-5 d-flex justify-content-center">
                <div class="form-check form-check-inline col-3">
                  <input class="form-check-input" type="checkbox" name="diabetes" id="option" value="option1" />
                  <label class="form-check-label" for="sim">Coriza</label>
                </div>
                <div class="form-check form-check-inline col-3">
                  <input class="form-check-input" type="checkbox" name="diabetes" id="option" value="option2" />
                  <label class="form-check-label" for="nao">Febre</label>
                </div>
                <div class="form-check form-check-inline col-3">
                  <input class="form-check-input" type="checkbox" name="diabetes" id="option" value="option3" />
                  <label class="form-check-label" for="nao sei">Falta de ar</label>
                </div>
              </div>

              <div class="row-9 pe-5 d-flex justify-content-center">
                <div class="form-check form-check-inline col-3">
                  <input class="form-check-input" type="checkbox" name="diabetes" id="option" value="option1" />
                  <label class="form-check-label" for="sim">Dor de cabeça</label>
                </div>
                <div class="form-check form-check-inline col-3">
                  <input class="form-check-input" type="checkbox" name="diabetes" id="option" value="option2" />
                  <label class="form-check-label" for="nao">Dor no corpo</label>
                </div>

                <div class="form-check form-check-inline col-3">
                  <input class="form-check-input" type="checkbox" name="diabetes" id="option" value="option3" />
                  <label class="form-check-label" for="nao sei">Dor na garganta</label>
                </div>

              </div>
              <div class="row-9 pe-5 d-flex justify-content-center">
                <div class="form-check form-check-inline col-3">
                  <input class="form-check-input" type="checkbox" name="diabetes" id="option" value="option1" />
                  <label class="form-check-label" for="sim">Tosse</label>
                </div>
                <div class="form-check form-check-inline col-3">
                  <input class="form-check-input" type="checkbox" name="diabetes" id="option" value="option2" />
                  <label class="form-check-label" for="nao">Vômito</label>
                </div>
                <div class="form-check form-check-inline col-3">
                  <input class="form-check-input" type="checkbox" name="diabetes" id="option" value="option3" />
                  <label class="form-check-label" for="nao sei">Diarreia</label>
                </div>
              </div>
            </div>

            <div class="d-flex flex-column align-items-center w-90">
              <h5>Em caso de necessidade, espefique os sintomas no campo abaixo:</h5>
              <div class="col-md-9 pe-5">
                <textarea class="form-control" rows="1" placeholder="Sintomas"></textarea>
              </div>
            </div>
            <div class="px-5 py-4">
              <a href="#cancelar" class="btn btn-primary btn-lg btn-danger" data-toggle="modal" data-target="#cancelar" onclick="confirm('Tem certeza que sejesa cancelar o Registro de Triagem Online?');">Cancelar</a>
              <a href="cadastrar " class="btn btn-med btn-lg" data-toggle="modal" data-target="#voltar">Voltar</a>
              <a href="#enviar" class="btn btn-med btn-lg " data-toggle="modal" data-target="#enviar">Enviar</a>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

          <div class="modal fade" id="cancelar" tabindex="-1" role="dialog" aria-labelledby="cancelarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="cancelarLabel">Cancelar </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Tem certeza que deseja cancelar a Solicitação de Consulta Online ?
                </div>
                <div class="modal-footer">
                  <a href="listagem.php" class="btn btn-sm btn-med" >Sim</a>
                  <a href="" class="btn btn-sm btn-primary btn-danger" data-dismiss="modal">Não</a>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="enviar" tabindex="-1" role="dialog" aria-labelledby="enviarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="enviarLabel">Soicitação enviada </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Sua triagem online foi registrada com sucesso!!
                </div>
                <div class="modal-footer">
                  <a href="listagem.php" class="btn btn-sm btn-med" >Finalizar</a>
                </div>
              </div>
            </div>
          </div>
</section>

<?php
?>