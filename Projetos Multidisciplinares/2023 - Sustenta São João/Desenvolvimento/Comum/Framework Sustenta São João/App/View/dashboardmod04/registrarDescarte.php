<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="/inserirDescarteResiduo" id="my_form" onsubmit="validaCampo()" class="form_j" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tipo">Resíduo</label>
                    <select required name="FK_RESIDUOS_SOLIDOS_RES_ID" class="form-control text_j">
                        <option value="" selected disabled>Selecione o resíduo</option>
                        <?php foreach ($this->getView()->residuo_solido as $row) { ?>
                            <option value=<?php echo $row->__get('RES_ID'); ?>><?php echo $row->__get('RES_NOME_RESIDUO'); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" required name="DSR_QUANTIDADE" class="form-control text_j" placeholder="Quantidade descartada">
                </div>
                <div class="form-group col-md-3">
                    <label for="data">Data e Hora</label>
                    <input type="datetime-local" required name="DSR_DATA_HORA_DESCARTE" class="form-control text_j">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="ponto_coleta">Ponto de Coleta</label>
                    <select required name="FK_PONTOS_COLETA_PCO_ID" class="form-control text_j">
                        <option value="" disabled selected>Selecione o ponto de coleta</option>
                        <?php foreach ($this->getView()->pontoColeta as $row) { ?>
                            <option value=<?php echo $row->__get('PCO_ID'); ?>><?php echo $row->__get('PCO_NOME') . " - " . $row->__get('PCO_BAIRRO'); ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row justify-content-end alinhar">
                <div>
                    <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function validaCampo() {

        event.preventDefault(); // Impede o envio padrão do formulário

        Swal.fire(
            'Enviado!',
            'O descarte foi registrado com sucesso.',
            'success'
        ).then(() => {
            document.getElementById('my_form').submit();
        });
    }
</script>