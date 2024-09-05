<div class="card">
    <div class="card-header">
        <h5 class="title"><?php echo $this->getView()->title; ?></h5>
    </div>
    <div class="card-body">
        <form action="/dashboard/alterarDescarteResiduo" class="form_j" onsubmit="validaCampo()" id="my_form" method="POST">
            <div class="form-row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="number" readonly name="DSR_ID" class="form-control text_j" value="<?php echo $this->getView()->descarte_residuo->__get('DSR_ID'); ?>">
                    </div>
                </div>
                <div class="form-group col-md-10">
                    <label for="ponto_coleta">Ponto de Coleta</label>
                    <select required name="FK_PONTOS_COLETA_PCO_ID" class="form-control text_j">
                        <option selected value="<?php echo $this->getView()->descarte_residuo->__get('FK_PONTOS_COLETA_PCO_ID'); ?>"><?php echo $this->getView()->pontoColeta[$this->getView()->descarte_residuo->__get('FK_PONTOS_COLETA_PCO_ID') - 1]->__get('PCO_NOME') . " - " . $this->getView()->pontoColeta[$this->getView()->descarte_residuo->__get('FK_PONTOS_COLETA_PCO_ID') - 1]->__get('PCO_BAIRRO'); ?></option>
                        <?php foreach ($this->getView()->pontoColeta as $row) {
                            if ($row->__get('PCO_ID') == $this->getView()->descarte_residuo->__get('FK_PONTOS_COLETA_PCO_ID')) {
                                continue;
                            } ?>
                            <option value=<?php echo $row->__get('PCO_ID'); ?>><?php echo $row->__get('PCO_NOME') . " - " . $row->__get('PCO_BAIRRO'); ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tipo">Resíduo</label>
                    <select required name="FK_RESIDUOS_SOLIDOS_RES_ID" class="form-control text_j">
                        <option selected value="<?php echo $this->getView()->descarte_residuo->__get('FK_RESIDUOS_SOLIDOS_RES_ID'); ?>"><?php echo $this->getView()->residuo_solido[$this->getView()->descarte_residuo->__get('FK_RESIDUOS_SOLIDOS_RES_ID') - 1]->__get('RES_NOME_RESIDUO'); ?></option>
                        <?php foreach ($this->getView()->residuo_solido as $row) {
                            if ($row->__get('RES_ID') == $this->getView()->descarte_residuo->__get('FK_RESIDUOS_SOLIDOS_RES_ID')) {
                                continue;
                            } ?>
                            <option value=<?php echo $row->__get('RES_ID'); ?>><?php echo $row->__get('RES_NOME_RESIDUO'); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" required name="DSR_QUANTIDADE" class="form-control text_j" value="<?php echo $this->getView()->descarte_residuo->__get('DSR_QUANTIDADE'); ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="data">Data e Hora</label>
                    <input type="datetime-local" required name="DSR_DATA_HORA_DESCARTE" class="form-control text_j" value="<?php echo $this->getView()->descarte_residuo->__get('DSR_DATA_HORA_DESCARTE'); ?>">
                </div>
            </div>
            <div class="row justify-content-end alinhar">
                <div>
                    <a class="a_j" href="/dashboard/listarDescarteResiduos"><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Cancelar</button></a>
                    <button type="submit" class="btn btn-success btn-sm" id="btn_salvar"><i class="bi bi-save"></i> Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function validaCampo() {

        event.preventDefault(); // Impede o envio padrão do formulário

        Swal.fire(
            'Alterado!',
            'O descarte foi alterado com sucesso.',
            'success'
        ).then(() => {
            document.getElementById('my_form').submit();
        });
    }
</script>