<!-- Page Heading -->
<section>
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">

        <div class="card" style=" border-radius: 15px;">
          <div class="d-flex flex-column align-items-center w-90">
            <img class="rounded-circle mt-5" width="150px" src="../resources/img/logo.png" class="font-weight-bold">
            <h2>Triagem</h2></span>
          </div>

          <div class="d-flex flex-column align-items-center w-90">
            <h3 class="afirm">Marque todas as afirmativas abaixo que se aplicam a você</h3>
          </div>

          <div class="card-body">
            <form action="/triagemonline/inserir" method="POST" id="form1">

              <!-- FORM 1 - CHECKBOXES -->
              <div id="parte1">
                <div class="d-flex align-items-center flex-column al w-90">
                  <h5>Selecione uma resposta em cada linha</h5>
                </div>
                <div class="form-group">
                  <div class="teste align-items-center row pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0">Eu tenho diabetes</h6>
                    </div>

                    <div class="col-md-9 pe-5">

                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_DIABETES" id="TRO_DIABETES" value="1" />
                        <label class="form-group form-check-label">Sim</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_DIABETES" id="TRO_DIABETES" value="2" checked />
                        <label class="form-group form-check-label">Não</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_DIABETES" id="TRO_DIABETES" value="3" />
                        <label class="form-group form-check-label">Não sei</label>
                      </div>
                    </div>
                  </div>

                  <div class="teste justify-content-center align-items-center row pt-4 pb-3">
                    <div class="col-md-3 ps-5">
                      <h6 class="mb-0">Eu estou acima do peso ou obesa</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_PESO" id="TRO_PESO" value="1" />
                        <label class="form-group form-check-label">Sim</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_PESO" id="TRO_PESO" value="2" checked />
                        <label class="form-group form-check-label">Não</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_PESO" id="TRO_PESO" value="3" />
                        <label class="form-group form-check-label">Não sei</label>
                      </div>
                    </div>
                  </div>

                  <div class="teste row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">

                      <h6 class="mb-0">Eu tenho hipertensão</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_HIPERTENSAO" id="TRO_HIPERTENSAO" value="1" />
                        <label class="form-group form-check-label">Sim</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_HIPERTENSAO" id="TRO_HIPERTENSAO" value="2" checked />
                        <label class="form-group form-check-label">Não</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_HIPERTENSAO" id="TRO_HIPERTENSAO" value="3" />
                        <label class="form-group form-check-label">Não sei</label>
                      </div>
                    </div>
                  </div>

                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">

                      <h6 class="mb-0">Eu recentemente sofri uma lesão</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_LESAO" id="TRO_LESAO" value="1" />
                        <label class="form-group form-check-label">Sim</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_LESAO" id="TRO_LESAO" value="2" checked />
                        <label class="form-group form-check-label">Não</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_LESAO" id="TRO_LESAO" value="3" />
                        <label class="form-group form-check-label">Não sei</label>
                      </div>
                    </div>
                  </div>

                  <div class="row align-items-center pt-4 pb-3">
                    <div class="col-md-3 ps-5">

                      <h6 class="mb-0">Eu tenho colesterol alto</h6>
                    </div>

                    <div class="col-md-9 pe-5">
                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_COLESTEROL" id="TRO_COLESTEROL" value="1" />
                        <label class="form-group form-check-label">Sim</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_COLESTEROL" id="TRO_COLESTEROL" value="2" checked />
                        <label class="form-group form-check-label">Não</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-control-teste" type="radio" name="TRO_COLESTEROL" id="TRO_COLESTEROL" value="3" />
                        <label class="form-group form-check-label">Não sei</label>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="#" class="btn btn-med btn-lg" onclick="ocultarExibir()">Próximo</a>
              </div>
              <!-- FIM DO FORM 1 -->

              <!-- FORM 2 - RADIO BUTTONS -->

              <div id="parte2" style="display:none">
                <div class="col align-items-center pt-4 pb-3">

                  <div class="row-9 pe-5 d-flex justify-content-center">
                    <div class="form-check form-check-inline col-3">
                      <input class="form-control-teste" type="checkbox" name="SINTOMASC[]" id="SINTOMASC[]" value="TRO_CORIZA" />
                      <label class="form-group form-check-label">Coriza</label>
                    </div>
                    <div class="form-check form-check-inline col-3">
                      <input class="form-control-teste" type="checkbox" name="SINTOMASC[]" id="SINTOMASC[]" value="TRO_FEBRE" />
                      <label class="form-group form-check-label">Febre</label>
                    </div>
                    <div class="form-check form-check-inline col-3">
                      <input class="form-control-teste" type="checkbox" name="SINTOMASC[]" id="SINTOMASC[]" value="TRO_FALTA_DE_AR" />
                      <label class="form-group form-check-label">Falta de ar</label>
                    </div>
                  </div>

                  <div class="row-9 pe-5 d-flex justify-content-center">
                    <div class="form-check form-check-inline col-3">
                      <input class="form-control-teste" type="checkbox" name="SINTOMASC[]" id="SINTOMASC[]" value="TRO_DOR_DE_CABECA" />
                      <label class="form-group form-check-label">Dor de cabeça</label>
                    </div>
                    <div class="form-check form-check-inline col-3">
                      <input class="form-control-teste" type="checkbox" name="SINTOMASC[]" id="SINTOMASC[]" value="TRO_DOR_NO_CORPO" />
                      <label class="form-group form-check-label">Dor no corpo</label>
                    </div>

                    <div class="form-check form-check-inline col-3">
                      <input class="form-control-teste" type="checkbox" name="SINTOMASC[]" id="SINTOMASC[]" value="TRO_DOR_DE_GARGANTA" />
                      <label class="form-group form-check-label">Dor na garganta</label>
                    </div>

                  </div>
                  <div class="row-9 pe-5 d-flex justify-content-center">
                    <div class="form-check form-check-inline col-3">
                      <input class="form-control-teste" type="checkbox" name="SINTOMASC[]" id="SINTOMASC[]" value="TRO_TOSSE" />
                      <label class="form-group form-check-label">Tosse</label>
                    </div>
                    <div class="form-check form-check-inline col-3">
                      <input class="form-control-teste" type="checkbox" name="SINTOMASC[]" id="SINTOMASC[]" value="TRO_VOMITO" />
                      <label class="form-group form-check-label">Vômito</label>
                    </div>
                    <div class="form-check form-check-inline col-3">
                      <input class="form-control-teste" type="checkbox" name="SINTOMASC[]" id="SINTOMASC[]" value="TRO_DIARREIA" />
                      <label class="form-group form-check-label">Diarreia</label>
                    </div>
                  </div>
                </div>

                <input type="hidden" name="FK_CONSULTAS_ONLINE_CTO_ID" value="<?php echo $_GET['id']; ?>">

                <div class="d-flex flex-column align-items-center w-90">
                  <h5>Em caso de necessidade, espefique os sintomas no campo abaixo:</h5>
                  <div class="col-md-9 pe-5">
                    <textarea class="" rows="1" placeholder="Sintomas" name="TRO_SINTOMAS_ADICIONAIS" id="TRO_SINTOMAS_ADICIONAIS"></textarea>
                  </div>
                </div>

                <?php if ($this->getView()->status == 203) { ?>
                  <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
                <?php } ?>
                <!-- botões -->


                <div class="form-row px-5 py-4">
                  <div class="col">

                    <input type="submit" value="Gravar" class="btn btn-med btn-lg">
                    <input class="btn btn-primary btn-lg btn-danger" data-toggle="modal" type="button" value="Cancelar" id="botaodesativa" onclick="cancelarTriagem();">
                    <a href="#" class="btn btn-med btn-lg" onclick="ocultarExibir()">Voltar</a>

                  </div>
                </div>
                <!-- botões -->
              </div>
              <!--FIM DO FORM2 -->
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>


</section>

<script>
  var visibilidade = true; //Variável que vai manipular o botão Exibir/ocultar

  function ocultarExibir() { // Quando clicar no botão.



    if (visibilidade) { //Se a variável visibilidade for igual a true, então...
      document.getElementById("parte1").style.display = "none"; //Ocultamos a div
      document.getElementById("parte2").style.display = "block"; //Ocultamos a div
      visibilidade = false; //alteramos o valor da variável para falso.
    } else { //ou se a variável estiver com o valor false..
      document.getElementById("parte1").style.display = "block"; //Exibimos a div..
      document.getElementById("parte2").style.display = "none"; //Exibimos a div..
      visibilidade = true; //Alteramos o valor da variável para true.
    }
  }

  function cancelarTriagem() {
    let timerInterval
    Swal.fire({
      title: 'Cancelar o Registro de Triagem Online?',
      icon: 'warning',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Sim',
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire('Cancelamento realizado com sucesso!', '', '')
        window.location.reload();
      }
    })
  }
</script>