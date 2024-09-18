<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <span><?php echo $this->getView()->title; ?></span>
            </div>
            <div class="card-body">
                <form action="/consultasOnline/inserir" method="post">
                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
                            <h6 class="mb-0">Nome completo</h6>
                        </div>
                        <div class="col-md-9 pe-5">
                            <input type="text" class="form-control form-control-lg" id="PAC_NOME" name="PAC_NOME"> 
                        </div>
                    </div>
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
                            <h6 class="mb-0">Nome do Médico</h6>
                        </div>
                        <div class="col-md-9 pe-5">
                            <input type="text" class="form-control form-control-lg" id="MED_NOME" name="MED_NOME" >
                        </div>
                    </div>
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
                            <h6 class="mb-0">Data</h6>

                        </div>
                        <div class="col-md-9 pe-5">
                            <input type="date" class="form-control" id="CTO_DATA" name="CTO_DATA" placeholder="" autocomplete="off" required="">
                        </div>
                    </div>
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">
                            <h6 class="mb-0">Horário de inicio e término</h6>

                        </div>
                        <div class="col-md-9 pe-5">
                            <input type="time" class="form-control" id="CTO_HORA_INICIO" name="CTO_HORA_INICIO" placeholder="" autocomplete="off" required=""> <br>
                            <input type="time" class="form-control" id="CTO_HORA_TERMINO" name="CTO_HORA_TERMINO" placeholder="" required="">
                        </div>
                    </div>
                    <hr class="mx-n3">

        

                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">

                            <h6 class="mb-0">Sintomas</h6>

                        </div>
                        <div class="col-md-9 pe-5">
                            <textarea class="form-control form-control-lg" id="CTO_JUSTIFICATIVA" name="CTO_JUSTIFICATIVA" placeholder="" autocomplete="off" required=""> </textarea>
                        </div>
                    </div>
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">

                            <h6 class="mb-0">Diagnóstico</h6>

                        </div>
                        <div class="col-md-9 pe-5">
                            <textarea class="form-control form-control-lg" id="CTO_DIAGNOSTICO" name="CTO_DIAGNOSTICO" placeholder="" autocomplete="off" required=""> </textarea>
                        </div>
                    </div>
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">

                            <h6 class="mb-0">Medicamento</h6>

                        </div>
                        <div class="col-md-9 pe-5">
                            <textarea class="form-control form-control-lg" id="CTO_PRESCRICAO" name="CTO_PRESCRICAO" placeholder="" autocomplete="off" required=""> </textarea>
                        </div>
                    </div>
                    <hr class="mx-n3">

                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">

                            <h6 class="mb-0">Observações</h6>

                        </div>
                        <div class="col-md-9 pe-5">
                            <textarea class="form-control form-control-lg" id="CTO_OBSERVACOES" name="CTO_OBSERVACOES" placeholder="" autocomplete="off" required=""> </textarea>
                        </div>
                    </div>
                    <hr class="mx-n3"> 

                    <div class="row align-items-center pt-4 pb-3">
                        <div class="col-md-3 ps-5">

                            <h6 class="mb-0">Link do Meet</h6>

                        </div>
                        <div class="col-md-9 pe-5">
                            <textarea class="form-control form-control-lg" id="CTO_LINK_MEET" name="CTO_LINK_MEET" placeholder=" " autocomplete="off" required=""> </textarea>
                        </div>
                    </div>
                    <hr class="mx-n3"> 

                    

                    <?php if ($this->getView()->status == 203) { ?>
                        <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
                    <?php } ?>
                    <div class="form-row text-center">
                        <div class="col">
                        <button  type="submit" class="btn btn-med btn-lg">Registrar dados</button>
                        </div>
                    </div>

                   
                </form>
            </div>
        </div>
    </div>
</div>