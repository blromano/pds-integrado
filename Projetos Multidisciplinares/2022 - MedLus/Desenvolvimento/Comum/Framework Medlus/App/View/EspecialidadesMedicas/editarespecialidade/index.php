<?php 

if(isset($this->getView()->EspecialidadesMedica) )
{

?>

<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header text-center">
                <span><h3><?php echo $this->getView()->title; ?><h3></span>
            </div>
            <div class="card-body">
                <form action="/EspecialidadesMedicas/atualizar" id="formeditar" method="post" >
                    <label for="username">Especialidade</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="ESP_NOME"  name="ESP_NOME"   autocomplete="off"  required="" value="<?php echo $this->getView()->EspecialidadesMedica->__get('ESP_NOME');?>">
                        <span id="alert1"><span>                    </div>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $this->getView()->EspecialidadesMedica->__get('ESP_ID');?>">
                    <div class="posbotao"> 
                    <br>
                        <input class="btn btn-primary " onclick="confirmarCadastro();" type="button" value="Salvar">
                    <button class="btn btn-secondary" onclick="window.location='/EspecialidadesMedicas';return false;">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
}
else{
    echo "Especialidades Medicas não selecionada!";
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
                var nome = document.getElementById("ESP_NOME").value.trim();
            
            if(nome == ""){
                 document.getElementById("alert1").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                 return; 
            }else{
                document.getElementById("alert1").innerHTML=""; 
            }
                document.getElementById("formeditar").submit();
            } else if (result.isDenied) {
                Swal.fire('A Especialidades Medicas não foi aualizada', '', 'info')
            }
            })
    }
</script>