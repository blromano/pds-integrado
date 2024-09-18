<!-- Page Heading -->
<?php
if (count($this->getView()->triagensonline) < 1) { ?>
    <p>Não existem registros de triagens online</p> <a href="/triagemonline/cadastrar" type= "submit"class="btn btn-sm btn-success btn_redondo">Adicionar</a>
<?php } else { ?>
    <?php foreach ($this->getView()->triagensonline as $dado) { ?>

        <section>
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9">

                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body">

                                <div class="d-flex flex-column align-items-center w-90">
                                    <img class="rounded-circle mt-5" width="150px" src="../Assets/img/perfil.jpg" class="font-weight-bold">Renata</span>
                                    <span class="text-black-50">ingrata@gmail.com</span>
                                </div>

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">


                                        <h6 class="mb-0">Nome completo</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <h6 class="form-control form-control-lg"> Renata Cristina Mussulino Peixoto</h6>
                                    </div>
                                </div>
                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Nome do médico</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <h6 class="form-control form-control-lg">Estevan Bittencourt de Almeida</h6>
                                    </div>
                                </div>
                                <hr class="mx-n3">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Horário de inicio e término</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input id="hora-cons" type="date" name="hora-cons" value="<?php echo $dado->__get('TRO_ID'); ?>" disabled>
                                        <input id="hora-cons" type="time" name="hora-cons" value="<?php echo $dado->__get('TRO_FEBRE'); ?>" disabled> - <input id="hora-cons" type="time" name="hora-cons" value="<?php echo $dado->__get('CTO_HORA_TERMINO'); ?>" disabled>
                                    </div>
                                </div>
                                <hr class="mx-n3">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Sintomas</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <textarea class="form-control form-control-lg" disabled><?php echo $dado->__get('TRO_ID'); ?></textarea>
                                    </div>
                                </div>
                                <hr class="mx-n3">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Diágnostico</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <textarea class="form-control form-control-lg" disabled><?php echo $dado->__get('TRO_FEBRE'); ?></textarea>
                                    </div>
                                </div>

                                <hr class="mx-n3">

                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Medicamento</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <textarea class="form-control form-control-lg" disabled><?php echo $dado->__get('TRO_CORIZA'); ?></textarea>
                                    </div>
                                </div>
                                <hr class="mx-n3">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">

                                        <h6 class="mb-0">Observações</h6>

                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <textarea class="form-control form-control-lg" disabled><?php echo $dado->__get('CTO_OBSERVACOES'); ?></textarea>
                                    </div>
                                </div>


                                <div class="px-5 py-4">
                                    <a href="" type="submit" class="btn btn-med btn-lg">Voltar ao Histórico</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </br>
        </section>

    <?php } ?>
<?php } ?>