<?php 
if(isset($this->getView()->EspecialidadesMedico) )
{

?>

<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header text-center">
                <span><h3><?php echo $this->getView()->title; ?><h3></span>
            </div>
            <div class="card-body">
                <form action="/EspecialidadesMedicos/atualizar" id="formeditar" method="post" >
                    <label for="username"> atualizar a especialidade</label>
                    <div class="form-group">
                        <select class="form-control form-control-user" id="FK_ESPECIALIDADES_ESP_ID"  name="FK_ESPECIALIDADES_ESP_ID"  autocomplete="off" required="">
                        <?php foreach ($this->getView()->EspecialidadesMedica as $dado) { ?>
                            <option value="<?php echo $dado->__get('ESP_ID'); ?>"<?php if($this->getView()->EspecialidadesMedico->__get('FK_ESPECIALIDADES_ESP_ID') ==  $dado->__get('ESP_ID') ){ echo"selected";} ?>> <?php echo $dado->__get('ESP_NOME'); ?> </option> 
                            <?php } ?>
                        </select>
                    </div>
                      
                    <input type="hidden" class="form-control" name="id" value="<?php echo $this->getView()->EspecialidadesMedico->__get('EPM_ID');?>">
                    <div class="posbotao"> 
                    <br>
                        <input class="btn btn-primary " onclick="confirmarCadastro();" type="button" value="Salvar">
                    <button class="btn btn-secondary" onclick="window.location='/EspecialidadesMedicos';return false;">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
}else{
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
                document.getElementById("formeditar").submit();
            } else if (result.isDenied) {
                Swal.fire('A Especialidades Medicas não foi aualizada', '', 'info')
            }
            })
    }
</script>