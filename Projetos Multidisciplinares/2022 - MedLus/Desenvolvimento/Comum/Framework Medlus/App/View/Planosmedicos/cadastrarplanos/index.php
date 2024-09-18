<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header text-center">
                <span><h3><?php echo $this->getView()->title; ?><h3></span>
            </div>
            <div class="card-body">
                <form action="/planosmedicos/inserir" id="formadicionar" method="post"  >
                    <label for="username">Nome</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="PLA_NOME"  name="PLA_NOME"  autocomplete="off"  placeholder="Nome do plano" required="">
                        <span id="alert1"><span>
                    </div>
                    <label for="username">Agência</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="PLA_AGENCIA"  name="PLA_AGENCIA"   autocomplete="off" placeholder="Agência do plano" required="">
                        <span id="alert2"><span>
                    </div>
                    <label for="username">Preço</label>
                    <div class="form-group">
                     <input type="text" class="form-control form-control-user" id="PLA_PRECO"  name="PLA_PRECO"    autocomplete="off" placeholder="Preço do plano" required="">
                     <span id="alert3"><span>
                    </div>
                    <label for="username">Quantidade de Consultas</label>
                    <div class="form-group">
                     <input type="text" class="form-control form-control-user" id="PLA_QUANTIDADECONSULTAS"  name="PLA_QUANTIDADECONSULTAS"  autocomplete="off" placeholder="Quantidade de Consultas do plano" required="">
                     <span id="alert4"><span>
                    </div>
                    <label for="username">Quantidade de exames</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="PLA_QUANTIDADEEXAMES"  name="PLA_QUANTIDADEEXAMES"  autocomplete="off"  placeholder="Quantidade de exames do plano" required="">
                        <span id="alert5"><span>
                    </div>
                    <label for="username">Contato</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="PLA_CONTATO"  name="PLA_CONTATO"  autocomplete="off"  placeholder="contato do plano" required="">
                        <span id="alert6"><span>
                    </div>

                    <?php if ($this->getView()->status == 203) { ?>
                        <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
                    <?php } ?>
                    <div class="posbotao"> 
                    <br>
                        <input  class="btn btn-primary " onclick="confirmarCadastro();" type="button" value="Salvar">
                        <button class="btn btn-secondary" onclick="window.location='/planosmedicos';return false;">Cancelar</button>
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
                var nome = document.getElementById("PLA_NOME").value.trim();
                var agencia = document.getElementById("PLA_AGENCIA").value.trim();
                var preco = document.getElementById("PLA_PRECO").value.trim();
                var qtdconsult = document.getElementById("PLA_QUANTIDADECONSULTAS").value.trim();
                var qtdexames = document.getElementById("PLA_QUANTIDADEEXAMES").value.trim();
                var contato = document.getElementById("PLA_CONTATO").value.trim();

                if(nome == ""){
                     document.getElementById("alert1").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert1").innerHTML=""; 
                }

                if(agencia == ""){
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
                if(qtdconsult == ""){
                     document.getElementById("alert4").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert4").innerHTML=""; 
                }
                if(qtdexames == ""){
                     document.getElementById("alert5").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert5").innerHTML=""; 
                }
                if(contato == ""){
                     document.getElementById("alert6").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert6").innerHTML=""; 
                }
                document.getElementById("formadicionar").submit();
            } else if (result.isDenied) {
                Swal.fire('O Plano Médico não foi cadastrado', '', 'info')
            }
            })
    }
</script>