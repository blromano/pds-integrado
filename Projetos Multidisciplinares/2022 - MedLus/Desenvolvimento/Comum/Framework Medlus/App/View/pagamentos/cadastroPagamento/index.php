<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <span><?php echo $this->getView()->title; ?></span>
            </div>
            <div class="card-body">
                <form action="/pagamentos/inserir" id="formadicionar" method="post">
                    <label for="username">Data de Pagamento</label>
                    <div class="form-group">
                        <input type="date" class="form-control" id="PAG_DATAPAGAMENTO" name="PAG_DATAPAGAMENTO" placeholder="Data de Pagamento" autocomplete="off" required="">
                        <span id="alert1"><span>
                    </div>
                    <label for="username">Data de Vencimento</label>
                    <div class="form-group">
                        <input type="date" class="form-control" id="PAG_DATAVENCIMENTO" name="PAG_DATAVENCIMENTO" placeholder="Data de Vencimento" autocomplete="off" required="">
                        <span id="alert2"><span>
                    </div>
                    <label for="username">Valor do Pagamento</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="PAG_VALORPAGAMENTO" name="PAG_VALORPAGAMENTO" placeholder="Valor do Pagamento" autocomplete="off" required="">
                        <span id="alert3"><span>
                    </div>
                    <label for="username">ID do Plano</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="FK_PLANOS_PLA_ID" name="FK_PLANOS_PLA_ID" placeholder="ID do Plano" autocomplete="off" required="">
                        <span id="alert4"><span>
                    </div>
                    <label for="username">ID do Paciente</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="FK_PACIENTES_PAC_ID" name="FK_PACIENTES_PAC_ID" placeholder="ID do Paciente" autocomplete="off" required="">
                        <span id="alert5"><span>
                    </div>
                    
                    <?php if ($this->getView()->status == 203) { ?>
                        <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
                    <?php } ?>
                    <div class="posbotao"> 
                    <br>
                        <input  class="btn btn-primary " onclick="confirmarCadastro();" type="button" value="Salvar">
                        <button class="btn btn-secondary" onclick="window.location='/pagamentos';return false;">Cancelar</button>
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
            denyButtonText: `Não`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var datapag = document.getElementById("PAG_DATAPAGAMENTO").value.trim();
                var datavenc = document.getElementById("PAG_DATAVENCIMENTO").value.trim();
                var preco = document.getElementById("PAG_VALORPAGAMENTO").value.trim();
                var fkplaid = document.getElementById("FK_PLANOS_PLA_ID").value.trim();
                var fkpacids = document.getElementById("FK_PACIENTES_PAC_ID").value.trim();
                

                if(datapag == ""){
                     document.getElementById("alert1").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert1").innerHTML=""; 
                }

                if(datavenc == ""){
                     document.getElementById("alert2").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert2").innerHTML=""; 
                }

                if(preco == "" || preco == 0){
                     document.getElementById("alert3").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert3").innerHTML=""; 
                }
                if(fkplaid == ""){
                     document.getElementById("alert4").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert4").innerHTML=""; 
                }
                if(fkpacids == ""){
                     document.getElementById("alert5").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert5").innerHTML=""; 
                }
                document.getElementById("formadicionar").submit();
            } else if (result.isDenied) {
                Swal.fire('O Pagamento não foi cadastrado', '', 'info')
            }
            })
    }
</script>
