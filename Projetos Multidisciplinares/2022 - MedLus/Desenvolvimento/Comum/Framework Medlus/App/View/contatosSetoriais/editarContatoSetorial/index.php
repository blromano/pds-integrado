<?php 

if(isset($this->getView()->contatosetorial) )
{

?>

<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header text-center">
                 <span><h3><?php echo $this->getView()->title; ?><h3></span>
            </div>
            <div class="card-body">
                <form action="/contatosSetoriais/atualizar" id="formeditar" method="post">
                    <label for="username">Id</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="CTT_ID" name="CTT_ID" placeholder="CTT_ID" disabled value="<?php echo $this->getView()->contatosetorial->__get('CTT_ID');?>">
                    </div>
                    <label for="username">Responsável</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="CTT_RESPONSAVEL" name="CTT_RESPONSAVEL" placeholder="Responsável" required="" value="<?php echo $this->getView()->contatosetorial->__get('CTT_RESPONSAVEL');?>">
                        <span id="alert1"><span>
                    </div>
                    <label for="username">Email</label>
                    <div class="form-group">
                        <input type="email" class="form-control" id="CTT_EMAIL" name="CTT_EMAIL" placeholder="Email" required="" value="<?php echo $this->getView()->contatosetorial->__get('CTT_EMAIL');?>">
                        <span id="alert2"><span>
                    </div>
                    <label for="username">Telefone</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="CTT_TELEFONE" name="CTT_TELEFONE" placeholder="Telefone" required="" value="<?php echo $this->getView()->contatosetorial->__get('CTT_TELEFONE');?>">
                        <span id="alert3"><span>
                    </div>
                    <label for="username">Whatsapp</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="CTT_WHATSAAP" name="CTT_WHATSAAP" placeholder="Whatsapp" required="" value="<?php echo $this->getView()->contatosetorial->__get('CTT_WHATSAAP');?>">
                        <span id="alert4"><span>
                    </div>
                    <label for="username">Setor</label>
                    <div class="form-group">
                    <select class="form-control form-control-user" id="CTT_SETOR"  name="CTT_SETOR"  autocomplete="off"  placeholder="Setor" required="" value="<?php echo $this->getView()->contatosetorial->__get('CTT_SETOR');?>">
                            <option value="<?php echo $this->getView()->contatosetorial->__get('CTT_SETOR');?>">--<?php echo $this->getView()->contatosetorial->__get('CTT_SETOR');?>--</option>
                            <option value="Administrativo">Administrativo</option>
                            <option value="Financeiro">Financeiro</option>
                            <option value="RH">Recursos Humanos</option>
                        </select>
                    </div>

                    <label for="username">Id da Secretaria</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="FK_SECRETARIAS_SEC_ID" name="FK_SECRETARIAS_SEC_ID" placeholder="Id da Secretaria" required="" value="<?php echo $this->getView()->contatosetorial->__get('FK_SECRETARIAS_SEC_ID');?>">
                        <span id="alert5"><span>
                    </div>
                    
                    <input type="hidden" class="form-control" name="id" value="<?php echo $this->getView()->contatosetorial->__get('CTT_ID');?>">
                    
                    <div class="posbotao"> 
                    <br>
                        <input class="btn btn-primary " onclick="confirmarCadastro();" type="button" value="Salvar">
                        <button class="btn btn-secondary" onclick="window.location='/contatosSetoriais';return false;">Cancelar</button>


                    </div>
                                    </form>
                </div>
            </div>
        </div>
</div>
                               
<?php 
}
else{
    echo "Contato não selecionado!";
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
                var reponsavel = document.getElementById("CTT_RESPONSAVEL").value.trim();
                var email = document.getElementById("CTT_EMAIL").value.trim();
                var telefone = document.getElementById("CTT_TELEFONE").value.trim();
                var whats = document.getElementById("CTT_WHATSAAP").value.trim();
                var fksecret = document.getElementById("FK_SECRETARIAS_SEC_ID").value.trim();
                

                if(reponsavel == ""){
                     document.getElementById("alert1").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert1").innerHTML=""; 
                }

                if(email == ""){
                     document.getElementById("alert2").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert2").innerHTML=""; 
                }

                if(telefone == "" || telefone == 0){
                     document.getElementById("alert3").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert3").innerHTML=""; 
                }
                if(whats == ""){
                     document.getElementById("alert4").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert4").innerHTML=""; 
                }
                if(fksecret == ""){
                     document.getElementById("alert5").innerHTML = "<p style='color:red; font-size: 15px; font-weight: bold;'>Preencha o campo</p>";
                     return; 
                }else{
                    document.getElementById("alert5").innerHTML=""; 
                }
                document.getElementById("formeditar").submit();
            } else if (result.isDenied) {
                Swal.fire('O Contato não foi aualizado', '', 'info')
            }
            })
    }
</script>