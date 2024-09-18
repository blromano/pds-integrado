<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <span><?php echo $this->getView()->title; ?></span>
            </div>
            <div class="card-body">
                <form action="/consultaPresencial/inserir" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="COP_RETORNO" name="COP_RETORNO" placeholder="COP_RETORNO" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="COP_DESCRICAO" name="COP_DESCRICAO" placeholder="COP_DESCRICAO" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="COP_LOCAL_CONSULTA_DIRECIONADA" name="COP_LOCAL_CONSULTA_DIRECIONADA" placeholder="COP_LOCAL_CONSULTA_DIRECIONADA" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="COP_NIVEL_PRIORIDADE" name="COP_NIVEL_PRIORIDADE" placeholder="COP_NIVEL_PRIORIDADE" autocomplete="off" required="">
                    </div>
                   

                    <?php if ($this->getView()->status == 203) { ?>
                        <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
                    <?php } ?>
                    <div class="form-row">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-secondary">Salvar</button>
                        </div>
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>