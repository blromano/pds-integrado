<div class="card">
    <div class="card-header">
        <h5 class="title"><?php echo $this->getView()->title; ?></h5>
    </div>
    <div class="card-body">
        <form action="/dashboard/alterarResiduo" class="form_j" onsubmit="validaCampo()" id="my_form" method="POST">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="number" readonly name="RES_ID" class="form-control text_j" value="<?php echo $this->getView()->residuo_solido->__get('RES_ID'); ?>">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" required name="RES_NOME_RESIDUO" class="form-control text_j" value="<?php echo $this->getView()->residuo_solido->__get('RES_NOME_RESIDUO'); ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="tipo" class="col-form-label">Descrição</label>
                        <input list="tipo-residuo" required name="RES_DESCRICAO" id="RES_DESCRICAO" class="form-control text_j" value="<?php echo $this->getView()->residuo_solido->__get('RES_DESCRICAO'); ?>">
                        <datalist id="tipo-residuo">
                            <option value="Resíduos Industriais">Lodos gerados por sistemas de tratamento de efluentes líquidos,...</option>
                            <option value="Resíduos Hospitalares">Provenientes de atividades ligadas ao tratamento de saúde,...</option>
                            <option value="Resíduos Sólidos Urbanos">Metais, isopor, espumas,...</option>
                            <option value="Resíduos de Construção Civil">Tijolos, blocos, telhas, argamassa, concreto, placas de revestimento,...</option>
                            <option value="Resíduos Nucleares">Rejeitos radioativos ou contaminados com radionuclídeos,...</option>
                        </datalist>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end alinhar">
                <div>
                    <a class="a_j" href="/dashboard/listarResiduos"><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Cancelar</button></a>
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
            'O resíduo foi alterado com sucesso.',
            'success'
        ).then(() => {
            document.getElementById('my_form').submit();
        });
    }
</script>