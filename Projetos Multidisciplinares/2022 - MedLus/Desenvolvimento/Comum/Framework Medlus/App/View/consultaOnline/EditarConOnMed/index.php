   
    <!-- Page Heading -->
    
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-50">
            <div class="col-xl-9">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">

                        <form id="formeditar" action="/consultasOnline/atualizarMed" method="post" class = "card-body">
                            <input type="hidden" id="CTO_ID" name="CTO_ID" value="<?php echo ($_GET['id']); ?>" />
                            <h5 class="mb-0"><?php echo $this->getView()->title; ?></h5>
                            <hr class="mx-n3"><!-- Divisor de caixa-->
                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">
                                    <!--Caixa de texto sobre a Data-->
                                    <h6 class="mb-0">Nova Data</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="date" class="form-control form-control-lg" id="CTO_DATA" name="CTO_DATA" placeholder="Data" required="" value="">
                                </div>
                            </div>
                            <hr class="mx-n3"><!-- Divisor de caixa-->

                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">
                                    <!--Caixa de texto sobre o Horário-->
                                    <h6 class="mb-0">Novo Horário de Início</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="time" class="form-control form-control-lg" id="CTO_HORA_INICIO" name="CTO_HORA_INICIO" placeholder="Horário" required=""  value="">
                                </div>
                            </div>
                            <hr class="mx-n3"><!-- Divisor de caixa-->

                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">
                                    <!--Caixa de texto sobre o Horário-->
                                    <h6 class="mb-0">Novo Horário de Término</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="time" class="form-control form-control-lg" id="CTO_HORA_TERMINO" name="CTO_HORA_TERMINO" placeholder="Horário" required=""  value="">
                                </div>
                            </div>
                            <hr class="mx-n3"><!-- Divisor de caixa-->

                            <div class="row align-items-center pt-4 pb-3">
                              <div class="col-md-3 ps-5">
                                  <h6 class="mb-0">Sintomas</h6>
                              </div>
                              <div class="col-md-9 pe-5">
                                  <textarea class="form-control form-control-lg" id="CTO_JUSTIFICATIVA" name="CTO_JUSTIFICATIVA" placeholder="justificativa" required="" value=""> </textarea>
                              </div>
                            </div>
                            <hr class="mx-n3"><!-- Divisor de caixa-->

                            <div class="row align-items-center pt-4 pb-3">
                              <div class="col-md-3 ps-5">
                                  <h6 class="mb-0">Diagnóstico</h6>
                              </div>
                              <div class="col-md-9 pe-5">
                            <textarea class="form-control form-control-lg" id="CTO_DIAGNOSTICO" name="CTO_DIAGNOSTICO" placeholder="" autocomplete="off" required=""></textarea>
                              </div>
                            </div>
                            <hr class="mx-n3"><!-- Divisor de caixa-->

                            <div class="row align-items-center pt-4 pb-3">
                              <div class="col-md-3 ps-5">
                                  <h6 class="mb-0">Medicamento</h6>
                              </div>
                              <div class="col-md-9 pe-5">
                            <textarea class="form-control form-control-lg" id="CTO_PRESCRICAO" name="CTO_PRESCRICAO" placeholder="" autocomplete="off" required=""></textarea>
                              </div>
                            </div>
                            <hr class="mx-n3"><!-- Divisor de caixa-->

                            <div class="row align-items-center pt-4 pb-3">
                              <div class="col-md-3 ps-5">
                                  <h6 class="mb-0">Observações</h6>
                              </div>
                              <div class="col-md-9 pe-5">
                            <textarea class="form-control form-control-lg" id="CTO_OBSERVACOES" name="CTO_OBSERVACOES" placeholder="" autocomplete="off" required=""></textarea>
                              </div>
                            </div>
                            <hr class="mx-n3"><!-- Divisor de caixa-->
                            

                            
                            <div class="form-row">
                                <div class="col">
                                    <input class="btn btn-med btn-lg" onclick="confirmarCadastro();" type="button" value="Salvar">
                                    <a href="listagemMed" class="btn btn-primary btn-lg btn-danger">Voltar</a>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function confirmarCadastro(){
        Swal.fire({
            title: 'Deseja continuar?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Sim',
            denyButtonText: `não`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Consulta Online editada com sucesso!', '', 'success')
                document.getElementById("formeditar").submit();
                
            } else if (result.isDenied) {
                Swal.fire('A Consulta Online não foi editada!', '', 'info')
            }
            })
    }
</script>
