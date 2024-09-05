<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col">
                <h5 class="title">
                    <?php echo $this->getView()->title; ?>
                </h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="/inserirResiduo" id="my_form" onsubmit="validaCampo()" class="form_j" method="POST">
            <div class="form-group row">
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-12">
                    <input required type="text" name="RES_NOME_RESIDUO" id="RES_NOME_RESIDUO"
                        class="form-control text_j" placeholder="Nome do resíduo">
                </div>
            </div>
            <div class="form-group row">
                <label for="tipo" class="col-sm-2 col-form-label">Descrição</label>
                <div class="col-sm-12">
                    <select id="TRE_DESCRICAO" name="RES_DESCRICAO" class="form-control text_j">
                        <option value="" disabled selected>Selecione o tipo do resíduo</option>
                        <option value="Resíduos Industriais">Resíduos Industriais - lodos gerados por sistemas de tratamento de efluentes
                            líquidos,...</option>
                        <option value="Resíduos Hospitalares">Resíduos Hospitalares - Provenientes de atividades ligadas ao tratamento de
                            saúde,...</option>
                        <option value="Resíduos Sólidos Urbanos">Resíduos Sólidos Urbanos - metais, isopor, espumas,...</option>
                        <option value="Resíduos de Construção Civil">Resíduos de Construção Civil - tijolos, blocos, telhas, argamassa, concreto,
                            placas de revestimento,...</option>
                        <option value="Resíduos Nucleares">Resíduos Nucleares - rejeitos radioativos ou contaminados com radionuclídeos,...
                        </option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-end alinhar">
                <div>
                    <button type="submit" class="btn btn-success btn-sm" id="btn_enviar"><i
                            class="bi bi-plus-circle"></i> Enviar</button>
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