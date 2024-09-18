<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header text-center">
                <span><h3><?php echo $this->getView()->title; ?><h3></span>
            </div>
            <div class="card-body">
                <form action="/EspecialidadesMedicas/inserir" id="formadicionar" method="post"  >
                    <label for="username">Especialidade</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="ESP_NOME"  name="ESP_NOME"  autocomplete="off"  placeholder="Nome do plano" required="">
                        <span id="alert1"><span>
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
                var nome = document.getElementById("ESP_NOME").value.trim();
            
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