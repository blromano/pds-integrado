<?php
if (count($this->getView()->esp) < 1) { ?>
    <p>Não existem especialidades cadastradas para realizar a solicitação</p>
<?php } else { ?>

   
    <!-- Page Heading -->

    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-50">
            <div class="col-xl-9">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">

                        <form action="/solicitacoesOnline/inserir" method="post">

                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">
                                    <h6 class="mb-0">Especialidade médica</h6>
                                </div>

                                <div class="col-md-9 pe-5">
                                    <!--Caixa de texto sobre a Especialidade médica-->
                                    <select class="form-control form-control-lg" id="FK_ESPECIALIDADES_ESP_ID" name="FK_ESPECIALIDADES_ESP_ID" placeholder="Especialidade" required="">
                                        <option value=""> selecione a especialidade </option>
                                            <?php foreach ($this->getView()->esp as $solicitacao) { ?>
                                                <option value="<?php echo $solicitacao->__get('ESP_ID'); ?>"> <?php echo $solicitacao->__get('ESP_NOME'); ?></option>
                                            <?php } ?>
                                    </select>

                                </div>
                            </div>
                            <hr class="mx-n3"><!-- Divisor de caixa-->
                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">
                                    <!--Caixa de texto sobre a Data-->
                                    <h6 class="mb-0">Data</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="date" class="form-control form-control-lg" id="SOL_DATA" name="SOL_DATA" placeholder="Data" required="">
                                </div>
                            </div>
                            <hr class="mx-n3"><!-- Divisor de caixa-->
                            <div class="row align-items-center pt-4 pb-3">
                                
                                <div class="col-md-3 ps-5">
                                    <!--Caixa de texto sobre o Horário-->
                                    <h6 class="mb-0">Horário</h6>
                                </div>
                                <div class="col-md-9 pe-5">
                                    <input type="time" class="form-control form-control-lg" id="SOL_HORARIO" name="SOL_HORARIO" placeholder="Horário" required="">
                                </div>
                            </div>
                            <hr class="mx-n3"><!-- Divisor de caixa-->

                            <?php if ($this->getView()->status == 203) { ?>
                                <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
                            <?php } ?>
                            <div class="form-row">
                                <div class="col">
                                    <input  type="submit" value="Enviar" class="btn btn-med btn-lg">
                                    <a href="/dashboard" class="btn btn-primary btn-lg btn-danger">Voltar</a><!--  vai voltar para a página do usuário (ainda não existe) -->

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

