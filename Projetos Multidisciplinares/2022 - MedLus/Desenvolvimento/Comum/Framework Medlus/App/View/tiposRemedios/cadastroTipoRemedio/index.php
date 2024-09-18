<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header text-center">
                 <span><h3><?php echo $this->getView()->title; ?><h3></span>
            </div>
            <div class="card-body">
                <form action="/tiposRemedios/inserir" id="formadicionar" method="post">
                    <label for="username">Nome</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="TIP_NOME" name="TIP_NOME" placeholder="Nome do Tipo de Remédio" autocomplete="off" required="">
                        <span id="alert1"><span>
                    </div>
                    <label for="username">Observações</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="TIP_OBSERVACOES" name="TIP_OBSERVACOES" placeholder="Observações do Tipo de Remédio" autocomplete="off" required="">
                        <span id="alert2"><span>
                    </div>
                    

                    <?php if ($this->getView()->status == 203) { ?>
                                                <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
                                            <?php } ?>
                                            <div class="posbotao"> 
                                            <br>
                                                <input  class="btn btn-primary " onclick="confirmarCadastro();" type="button" value="Salvar">
                                                <button class="btn btn-secondary" onclick="window.location='/tiposRemedios';return false;">Cancelar</button>
                                            </div>
                                    </form>
                                    </div>
        </div>
    </div>
</div>
<script>
    function confirmarCadastro(){
        Swal.fire({
            title: 'Deseja cadastrar?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Sim',
            denyButtonText: `não`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var nome = document.getElementById("TIP_NOME").value.trim();
                var observacoes = document.getElementById("TIP_OBSERVACOES").value.trim();

                if(nome == ""){
                     document.getElementById("alert1").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert1").innerHTML=""; 
                }

                if(observacoes == ""){
                     document.getElementById("alert2").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert2").innerHTML=""; 
                }

                document.getElementById("formadicionar").submit();
            } else if (result.isDenied) {
                Swal.fire('O Tipo de Remédio não foi cadastrado', '', 'info')
            }
            })
    }
</script>