<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <span><?php echo $this->getView()->title; ?></span>
            </div>
            <div class="card-body">
                <form action="/pacientes/inserir" method="post" id="form1">
                    
                    <div id="parte1">
                        <div class="form-group">
                            <input type="text" class="form-control" id="PAC_PRONTUARIO" name="PAC_PRONTUARIO" placeholder="Prontuário" required="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="FK_USUARIOS_USU_ID" name="FK_USUARIOS_USU_ID" placeholder="Id do Usuário" autocomplete="off" required="">
                        </div>
                        <button onclick="ocultarExibir()">Próximo</button>
                    </div>
                    <div id="parte2" style="display:none">
                        <div class="form-group">
                            <input type="text" class="form-control" id="FK_PLANOS_PLA_ID" name="FK_PLANOS_PLA_ID" placeholder="Id do Plano" autocomplete="off" required="">
                        </div>
                        

                        <?php if ($this->getView()->status == 203) { ?>
                            <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
                        <?php } ?>
                        <div class="form-row">
                            <div class="col">
                                <button onclick="ocultarExibir()">Voltar</button><button type="submit" class="btn btn-outline-secondary">Salvar</button>
                            </div>
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div>

<script>
 var visibilidade = true; //Variável que vai manipular o botão Exibir/ocultar


function ocultarExibir() { // Quando clicar no botão.

    

    if (visibilidade) {//Se a variável visibilidade for igual a true, então...
        document.getElementById("parte1").style.display = "none";//Ocultamos a div
        document.getElementById("parte2").style.display = "block";//Ocultamos a div
        visibilidade = false;//alteramos o valor da variável para falso.
    } else {//ou se a variável estiver com o valor false..
        document.getElementById("parte1").style.display = "block";//Exibimos a div..
        document.getElementById("parte2").style.display = "none";//Exibimos a div..
        visibilidade = true;//Alteramos o valor da variável para true.
    }
}

</script>