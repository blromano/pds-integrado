<?php 

if(isset($this->getView()->pagamento) )
{

?>
<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header text-center">
                 <span><h3><?php echo $this->getView()->title; ?><h3></span>
            </div>
            <div class="card-body">
                <form action="/pagamentos/atualizar" id="formeditar" method="post">
                    <label for="username">Id</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="PAG_ID" name="PAG_ID" placeholder="PAG_ID" disabled value="<?php echo $this->getView()->pagamento->__get('PAG_ID');?>">
                    </div>
                    <label for="username">Data de Pagamento</label>
                    <div class="form-group">
                        <input type="date" class="form-control" id="PAG_DATAPAGAMENTO" name="PAG_DATAPAGAMENTO" placeholder="Data de Pagamento" required="" value="<?php echo $this->getView()->pagamento->__get('PAG_DATAPAGAMENTO');?>">
                        <span id="alert1"><span>
                    </div>
                    <label for="username">Data de Vencimento</label>
                    <div class="form-group">
                        <input type="date" class="form-control" id="PAG_DATAVENCIMENTO" name="PAG_DATAVENCIMENTO" placeholder="Data de Vencimento" required="" value="<?php echo $this->getView()->pagamento->__get('PAG_DATAVENCIMENTO');?>">
                        <span id="alert2"><span>
                    </div>
                    <label for="username">Valor do Pagamento</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="PAG_VALORPAGAMENTO" name="PAG_VALORPAGAMENTO" placeholder="Valor do Pagamento" required="" value="<?php echo $this->getView()->pagamento->__get('PAG_VALORPAGAMENTO');?>">
                        <span id="alert3"><span>
                    </div>
                    <label for="username">Id do Plano</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="FK_PLANOS_PLA_ID" name="FK_PLANOS_PLA_ID" placeholder="Id do Plano" required="" value="<?php echo $this->getView()->pagamento->__get('FK_PLANOS_PLA_ID');?>">
                        <span id="alert4"><span>
                    </div>
                    <label for="username">Id do Paciente</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="FK_PACIENTES_PAC_ID" name="FK_PACIENTES_PAC_ID" placeholder="Id do Paciente" required="" value="<?php echo $this->getView()->pagamento->__get('FK_PACIENTES_PAC_ID');?>">
                        <span id="alert5"><span>
                    </div>
                    
                    <input type="hidden" class="form-control" name="id" value="<?php echo $this->getView()->pagamento->__get('PAG_ID');?>">
                    
                    <div class="posbotao"> 
                        <br>
                            <input class="btn btn-primary " onclick="confirmarCadastro();" type="button" value="Salvar">
                            <button class="btn btn-secondary" onclick="window.location='/pagamentos';return false;">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
}
else{
    echo "Pagamento não selecionado!";
}
?>

<script>
    function confirmarCadastro(){
        Swal.fire({
            title: 'Deseja atualizar?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Sim',
            denyButtonText: `não`,
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
                document.getElementById("formeditar").submit();
            } else if (result.isDenied) {
                Swal.fire('O Pagamento não foi aualizado', '', 'info')
            }
            })
    }
</script>