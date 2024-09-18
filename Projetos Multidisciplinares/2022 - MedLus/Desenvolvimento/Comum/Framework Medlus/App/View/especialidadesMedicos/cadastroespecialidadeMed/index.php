
<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header text-center">
                <span><h3><?php echo $this->getView()->title; ?><h3></span>
            </div>
            <div class="card-body">
                <form action="/EspecialidadesMedicos/inserir" id="formadicionar" method="post"  >
                <label for="username">ID do Médico</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="FK_MEDICOS_MED_ID"  name="FK_MEDICOS_MED_ID"  autocomplete="off"  placeholder="ID do Médico" required="">
                        <span id="alert1"><span>
                    </div>
                    <label for="username"> Especialidade do Médico</label>
                    <div class="form-group">
                        <select class="form-control form-control-user" id="FK_ESPECIALIDADES_ESP_ID"  name="FK_ESPECIALIDADES_ESP_ID"  autocomplete="off"  required="">
                        <?php foreach ($this->getView()->EspecialidadesMedica as $dado) { ?>
                            <option value="<?php echo $dado->__get('ESP_ID'); ?>"> <?php echo $dado->__get('ESP_NOME'); ?> </option> 
                            <?php } ?>
                        </select>
                    </div>

                    <?php if ($this->getView()->status == 203) { ?>
                        <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
                    <?php } ?>
                    <div class="posbotao"> 
                    <br>
                        <input  class="btn btn-primary " onclick="confirmarCadastro();" type="button" value="Salvar">
                        <button class="btn btn-secondary" onclick="window.location='/EspecialidadesMedicas';return false;">Cancelar</button>
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
            var nome = document.getElementById("FK_MEDICOS_MED_ID").value.trim();
            
            if(nome == ""){
                 document.getElementById("alert1").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                 return; 
            }else{
                document.getElementById("alert1").innerHTML=""; 
            }
                document.getElementById("formadicionar").submit();
            } else if (result.isDenied) {
                Swal.fire('A Especialidade Médica  não foi cadastrada', '', 'info')
            }
            })
    }
</script>