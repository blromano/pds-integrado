
    <!-- Page Heading -->

    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-50">
            <div class="col-xl-9">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body">

                        <form action="/solicitacoesOnline/inserirMed" method="post">

                            <div class="row align-items-center pt-4 pb-3">
                                <div class="col-md-3 ps-5">

                                    <?php foreach ($this->getView()->solicitacoes as $dado) { ?>
                                    <tr>
                                        <td><?php echo $dado->__get('SOL_ID'); ?></td>
                                    </tr>
                                <?php } ?>
                                   
                                </div>

                                <div class="col-md-9 pe-5">
                                    <!--Caixa de texto sobre a Especialidade médica-->
                                    <select class="form-control form-control-lg" id="FK_ESPECIALIDADES_ESP_ID" name="FK_ESPECIALIDADES_ESP_ID" placeholder="Especialidade" required="">
                                        <option value=""> selecione o médico </option>
                                            <?php foreach ($this->getView()->esp as $solicitacao) { ?>
                                                <option value="<?php echo $solicitacao->__get('USU_NOME'); ?>"> <?php echo $solicitacao->__get('USU_NOME'); ?></option>
                                            <?php } ?>
                                    </select>

                                </div>
                            </div>
                            <hr class="mx-n3"><!-- Divisor de caixa-->

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



