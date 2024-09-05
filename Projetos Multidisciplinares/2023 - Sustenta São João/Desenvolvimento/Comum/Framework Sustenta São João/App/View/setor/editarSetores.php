<div class="card">
    <div class="card-header">
        <h5 class="title"><?php echo $this->getView()->title; ?></h5>
    </div>
    <div class="card-body">
        <form action="/dashboard/alterarSetores" class="form_j" onsubmit="validaCampo()" id="my_form" method="POST">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="number" readonly name="SET_ID" class="form-control text_j" value="<?php echo $this->getView()->setor->__get('SET_ID'); ?>">
                    </div>
                </div>    
            </div>          
              <div class="col-md-10">
                    <div class="form-group">
                        <label for="nome">Nome do Setor</label>
                        <input type="text" required name="SET_NOME" class="form-control text_j" value="<?php echo $this->getView()->setor->__get('SET_NOME'); ?>">
                    </div>
              </div>
              <div class="col-md-10">
                    <div class="form-group">
                        <label for="nome">Descrição dos Serviços</label>
                        <input type="text" required name="SET_DESCRICAO_SERVICOS" class="form-control text_j" value="<?php echo $this->getView()->setor->__get('SET_DESCRICAO_SERVICOS'); ?>">
                    </div>
              </div>
              <div class="col-md-10">
                    <div class="form-group">
                        <label for="nome">Data de Criação</label>
                        <input type="date" required name="SET_DATA_CRIACAO" class="form-control text_j" value="<?php echo $this->getView()->setor->__get('SET_DATA_CRIACAO'); ?>">
                    </div>
              </div>
            <div class="row justify-content-end alinhar">
                <div>
                    <a class="a_j" href="/dashboard/listarSetores"><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Cancelar</button></a>
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