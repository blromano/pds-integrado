  <div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="/dashboard/inserirTiposSaneamentos" id="my_form" onsubmit="validaCampo()" class="form_j" method="POST">
            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Nome do Tipo de Saneamento</label>
                <div class="col-sm-12">
                    <input required type="text" name="TSS_NOME" id="TSS_NOME" class="form-control text_j" placeholder="Nome do Tipo de Saneamento">
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
            'O saneamento foi cadastrado com sucesso.',
            'success'
        ).then(() => {
            document.getElementById('my_form').submit();
        });
    }
</script>
  
    

