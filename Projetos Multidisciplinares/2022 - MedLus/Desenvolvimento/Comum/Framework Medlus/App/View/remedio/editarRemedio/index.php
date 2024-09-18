<?php 

if(isset($this->getView()->remedio) )
{

?>

<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header text-center">
                <span><h3><?php echo $this->getView()->title; ?><h3></span>
            </div>
            <div class="card-body">
                <form action="/remedios/atualizar" id="formeditar" method="post" >
                
                    <label for="username">Nome</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="REM_NOME"  name="REM_NOME"  autocomplete="off"  placeholder="Nome do rémedio" required="" value="<?php echo $this->getView()->remedio->__get('REM_NOME');?>">
                        <span id="alert1"><span>
                    </div>
                    <label for="username">Dosagem</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="REM_DOSAGEM"  name="REM_DOSAGEM"   autocomplete="off" placeholder="Dosagem do rémedio" required="" value="<?php echo $this->getView()->remedio->__get('REM_DOSAGEM');?>">
                        <span id="alert2"><span>
                    </div>
                    <label for="username">Contra Indicação</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="REM_CONTRAINDICACAO"  name="REM_CONTRAINDICACAO"    autocomplete="off" placeholder="Contra Indicação do rémedio" required="" value="<?php echo $this->getView()->remedio->__get('REM_CONTRAINDICACAO');?>">
                        <span id="alert3"><span>
                    </div>
                    <label for="username">Indicação</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="REM_INDICACAO"  name="REM_INDICACAO"  autocomplete="off" placeholder="Indicação do rémedio" required="" value="<?php echo $this->getView()->remedio->__get('REM_INDICACAO');?>">
                        <span id="alert4"><span>
                    </div>
                    <label for="username">Observações</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="REM_OBSERVACOES"  name="REM_OBSERVACOES"  autocomplete="off"  placeholder="Observações do rémedio"  required="" value="<?php echo $this->getView()->remedio->__get('REM_OBSERVACOES');?>">
                        <span id="alert5"><span>
                    </div>
                    <label for="username">Tipo de remédio</label>
                    <div class="form-group">
                        <select class="form-control form-control-user" id="FK_TIPOS_REMEDIOS_TIP_ID"  name="FK_TIPOS_REMEDIOS_TIP_ID"  autocomplete="off"  placeholder="ID do tipo de Remédio" required="">
                        <?php foreach ($this->getView()->tipos_remedios as $dado) { ?>
                            <option value="<?php echo $dado->__get('TIP_ID'); ?>"<?php if($this->getView()->remedio->__get('FK_TIPOS_REMEDIOS_TIP_ID') ==  $dado->__get('TIP_ID') ){ echo"selected";} ?>> <?php echo $dado->__get('TIP_NOME'); ?> </option> 
                            <?php } ?>
                        </select>
                    </div>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $this->getView()->remedio->__get('REM_ID');?>">
                    <div class="posbotao"> 
                    <br>
                        <input class="btn btn-primary " onclick="confirmarCadastro();" type="button" value="Salvar">
                    <button class="btn btn-secondary" onclick="window.location='/remedios';return false;">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
}
else{
    echo "Paciente não selecionado!";
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
                var nome = document.getElementById("REM_NOME").value.trim();
                var dosagem = document.getElementById("REM_DOSAGEM").value.trim();
                var contraindicao = document.getElementById("REM_CONTRAINDICACAO").value.trim();
                var indicacao = document.getElementById("REM_INDICACAO").value.trim();
                var observacoes = document.getElementById("REM_OBSERVACOES").value.trim();

                if(nome == ""){
                     document.getElementById("alert1").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert1").innerHTML=""; 
                }

                if(dosagem == ""){
                     document.getElementById("alert2").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert2").innerHTML=""; 
                }

                if(contraindicao == ""){
                     document.getElementById("alert3").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert3").innerHTML=""; 
                }
                if(indicacao == ""){
                     document.getElementById("alert4").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert4").innerHTML=""; 
                }
                if(observacoes == ""){
                     document.getElementById("alert5").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert5").innerHTML=""; 
                }
                document.getElementById("formeditar").submit();
            } else if (result.isDenied) {
                Swal.fire('O Remédio não foi aualizado', '', 'info')
            }
            })
    }
</script>