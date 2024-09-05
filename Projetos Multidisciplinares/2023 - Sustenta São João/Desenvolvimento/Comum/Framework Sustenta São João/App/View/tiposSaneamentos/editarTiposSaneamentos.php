<div class="card">
    <div class="card-header">
        <h5 class="title"><?php echo $this->getView()->title; ?></h5>
    </div>
    <div class="card-body">
        <form action="/dashboard/alterarTiposSaneamentos" class="form_j" onsubmit="validaCampo()" id="my_form" method="POST">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="number" readonly name="TSS_ID" class="form-control text_j" value="<?php echo $this->getView()->tiposSaneamentos->__get('TSS_ID'); ?>">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="nome">Nome do Tipo de Saneamento</label>
                        <input type="text" required name="TSS_NOME" class="form-control text_j" value="<?php echo $this->getView()->tiposSaneamentos->__get('TSS_NOME'); ?>">
                    </div>
                </div>
            </div>
            <div class="row justify-content-end alinhar">
                <div>
                    <a class="a_j" href="/dashboard/listarTiposSaneamentos"><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Cancelar</button></a>
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