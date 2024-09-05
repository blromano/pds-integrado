<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="/dashboard/inserirResponsavelPrefeitura" id="my_form" onsubmit="validaCampo()" class="form_j" method="POST">
            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-12">
                    <input required type="text" name="USU_NOME" id="USU_NOME" class="form-control text_j" placeholder="Nome">
                </div>
            </div>            
            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Setor que é Responsável</label>
                <div class="col-sm-12">
                    <input required type="text" name="FK_SETORES_SET_ID" id="FK_SETORES_SET_ID" class="form-control text_j" placeholder="Setor que é responsável">
                </div>
            </div>    
            <select id="" name="">
                        <?php foreach ($this->getView()->setor as $dado) { ?>                        
                            <option value=""> <?php echo $dado->__get('SET_ID'); ?> - <?php echo $dado->__get('SET_NOME'); ?></option>                                                                    
                        <?php } ?>                
                    </select>
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
            'O resíduo foi cadastrado com sucesso.',
            'success'
        ).then(() => {
            document.getElementById('my_form').submit();
        });
    }
</script>
  
    

