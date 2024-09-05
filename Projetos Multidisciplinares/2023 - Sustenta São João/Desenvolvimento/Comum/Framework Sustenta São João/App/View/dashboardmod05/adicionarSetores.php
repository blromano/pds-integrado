<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="/dashboard/inserirSetor" id="my_form" onsubmit="validaCampo()" class="form_j" method="POST">
            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Nome do Setor</label>
                <div class="col-sm-12">
                    <input required type="text" name="SET_NOME" id="SET_NOME" class="form-control text_j" placeholder="Nome do Setor">
                </div>
            </div>            
            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Data de Criação</label>
                <div class="col-sm-12">
                    <input required type="date" name="SET_DATA_CRIACAO" id="SET_DATA_CRIACAO" class="form-control text_j" placeholder="Data de criação do Setor">
                </div>
            </div>    
            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Descrição dos Serviços</label>
                <div class="col-sm-12">
                    <input required type="text" name="SET_DESCRICAO_SERVICOS" id="SET_DESCRICAO_SERVICOS" class="form-control text_j" placeholder="Descrição dos Serviços">
                </div>
            </div>            
            <div class="row justify-content-end alinhar">
                <div>
                    <button type="submit" class="btn btn-success btn-sm" id="btn_enviar"><i class="bi bi-plus-circle"></i> Enviar</button>
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
            'O setor foi cadastrado com sucesso.',
            'success'
        ).then(() => {
            document.getElementById('my_form').submit();
        });
    }
</script>
  
    





    