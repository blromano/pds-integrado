<?php 

if(isset($this->getView()->tiporemedio) )
{

?>

<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header text-center">
                 <span><h3><?php echo $this->getView()->title; ?><h3></span>
            </div>
            <div class="card-body">
                <form action="/tiposRemedios/atualizar" id="formeditar" method="post">
                    <label for="username">Edição de tipo de Remédios id</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="TIP_ID" name="TIP_ID" placeholder="TIP_ID" disabled value="<?php echo $this->getView()->tiporemedio->__get('TIP_ID');?>">
                    </div>
                    <label for="username">Nome</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="TIP_NOME" name="TIP_NOME" placeholder="Nome do Tipo de Remédio" required="" value="<?php echo $this->getView()->tiporemedio->__get('TIP_NOME');?>">
                        <span id="alert1"><span>
                    </div>
                    <label for="username">Observações</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="TIP_OBSERVACOES" name="TIP_OBSERVACOES" placeholder="Observações do TIpo de Remédio" required="" value="<?php echo $this->getView()->tiporemedio->__get('TIP_OBSERVACOES');?>">
                        <span id="alert2"><span>
                    </div>
                    
                    <input type="hidden" class="form-control" name="id" value="<?php echo $this->getView()->tiporemedio->__get('TIP_ID');?>">
                    
                    <div class="posbotao"> 
                                            <br>
                                                <input class="btn btn-primary " onclick="confirmarCadastro();" type="button" value="Salvar">
                                                <button class="btn btn-secondary" onclick="window.location='/tiposRemedios';return false;">Cancelar</button>


                                            </div>
                                    </form>
                                    <div class="modal fade" id="Alterar_Dadosremedio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo alterar os dados?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn_redondo" data-toggle="modal" data-target="#Confirmar_Alterar_Dadosremedio" data-dismiss="modal">Sim</button>
                            <button type="button" class="btn btn-secondary btn_redondo" data-toggle="modal" data-target="#remedioeditar" data-dismiss="modal">Não</button>
                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- Modal-Alterar dados confirmado-->
                    <div class="modal fade" id="Confirmar_Alterar_Dadosremedio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Informações alteradas com sucesso!</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" onclick="$('#formeditar').submit();" class="btn btn-primary btn_redondo" data-dismiss="modal">OK</button>
                        </div>
                        </div>
                    </div>
                    </div>


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
            title: 'Deseja desativar?',
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
                document.getElementById("formeditar").submit();
            } else if (result.isDenied) {
                Swal.fire('O Tipo de Remédio não foi aualizado', '', 'info')
            }
            })
    }
</script>