<link rel="stylesheet" href="../../resources/css/modalidades.css">
  <div class= "formcentralize">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Adicionar Novo Organizador</h4><br><br>
                    <form action="/dashboard/organizadores_eventos/inserir" class="forms-sample" method="POST" onsubmit="return validarForm();" >

                        <div class="form-group">
                          <label for="nomeEvento">Nome do Organizador</label>
                          <input type="text" class="form-control" id="ORE_NOME" name="ORE_NOME" placeholder="" required>
                        </div><br>
                        <div class="form-group">
                          <label for="nomeEvento">Nome Social</label>
                          <input type="text" class="form-control" id="ORE_NOME_SOCIAL" name="ORE_NOME_SOCIAL" placeholder="" >
                        </div><br>
                        <div class="form-group">
                          <label for="nomeEvento">Prontuário</label>
                          <input type="text" class="form-control" id="ORE_PRONTUARIO" name="ORE_PRONTUARIO" placeholder="" required>
                        </div><br>
                        <div class="form-group">
                          <label for="nomeEvento">CPF</label>
                          <input type="text" class="form-control" id="ORE_CPF" name="ORE_CPF" placeholder="" required>
                        </div><br>
                        <div class="form-group">
                          <label for="nomeEvento">RG</label>
                          <input type="text" class="form-control" id="ORE_RG" name="ORE_RG" placeholder="" required>
                        </div><br>
                        <div class="form-group" >
                          <label for="exampleInputData1">Data de Nascimento</label>
                          <input  type="date" id="ORE_DATA_NASCIMENTO" name="ORE_DATA_NASCIMENTO" class="form-control" placeholder="ano-mes-dia" required>
                        </div><br>

                        <div class="form-group">
                          <label for="ResponsavelEvento">Sexo</label>
                              <select class="form-control" id="ORE_SEXO" name="ORE_SEXO" required>                      
                                <option value="" >Selecione o sexo</option>
                                <option value="F">Feminino</option>
                                <option value="M">Masculino</option>    
                              </select>
                        </div><br>

                        <div class="form-group">
                          <label for="ResponsavelEvento">Etnia</label>
                              <select class="form-control" id="ORE_ETNIA" name="ORE_ETNIA" required>                      
                              <option value="" >Selecione a etnia</option>
                              <option value="BRANCO">Branco</option>
                              <option value="PRETO">Preto</option>
                              <option value="PARDO">Pardo</option>
                              <option value="INDIGENA">Indígena</option>
                              <option value="AMARELO">Amarelo</option>
                              </select>
                        </div><br>

                        <div class="form-group">
                          <label for="nomeEvento">Telefone</label>
                          <input type="text" class="form-control" id="ORE_TELEFONE" name="ORE_TELEFONE" placeholder="" required>
                        </div><br>

                        <div class="form-group">
                          <label for="nomeEvento">CEP</label>
                          <input type="text" class="form-control" id="ORE_CEP" name="ORE_CEP" placeholder="" required>
                        </div><br>

                        <div class="form-group">
                          <label for="exampleInputName2">Cidade</label>
                              <select class="form-control" id="FK_CIDADES_CID_ID" name="FK_CIDADES_CID_ID" required>
                                  <option>Selecione a Cidade</option> 
                                    <?php                                 

                                    foreach($this->getView()->cidades as $cid) { ?>
                                      <option value="<?php echo $cid->__get('CID_ID'); ?>">
                                          <?php echo $cid->__get('CID_NOME'); ?>
                                      </option>
                                  <?php } ?>
                              </select>
                        </div><br><br>

                        <div class="form-group">
                          <label for="nomeEvento">Bairro</label>
                          <input type="text" class="form-control" id="ORE_BAIRRO" name="ORE_BAIRRO" placeholder="" required>
                        </div><br>

                        <div class="form-group">
                          <label for="nomeEvento">Rua</label>
                          <input type="text" class="form-control" id="ORE_RUA" name="ORE_RUA" placeholder="" required>
                        </div><br>

                        <div class="form-group">
                          <label for="nomeEvento">Complemento</label>
                          <input type="text" class="form-control" id="ORE_COMPLEMENTO" name="ORE_COMPLEMENTO" placeholder="" >
                        </div><br>

                        <div class="form-group">
                          <label for="exampleInputName2">Campus Sede</label>
                              <select class="form-control" id="FK_CAMPUS_CAM_ID" name="FK_CAMPUS_CAM_ID" required>
                                  <option>Selecione o Campus</option> 
                                    <?php                                 

                                    foreach($this->getView()->campus as $cam) { ?>
                                      <option value="<?php echo $cam->__get('CAM_ID'); ?>">
                                          <?php echo $cam->__get('CAM_NOME'); ?>
                                      </option>
                                  <?php } ?>
                              </select>
                        </div><br><br>

                        <div class="form-group">
                          <label for="nomeEvento">Email Institucional</label>
                          <input type="text" class="form-control" id="ORE_EMAIL" name="ORE_EMAIL" placeholder="" required>
                        </div><br>
                        <div class="form-group">
                          <label for="nomeEvento">Definir Senha</label>
                          <input type="password" class="form-control" id="ORE_SENHA" name="ORE_SENHA" placeholder="" required>
                        </div><br>
                        <div class="form-group" >
                          <label for="nomeEvento">Confirmar Senha</label>
                          <input type="password" class="form-control" id="ORE_VERIFICAR_SENHA" name="ORE_VERIFICAR_SENHA" placeholder="" required>             
                        </div><br>
                                                      
                        <div class="form-group">
                          <label for="ORE_FOTO">Selecione Foto 3x4 </label>
                          <input type="file" id="ORE_FOTO" name="ORE_FOTO" class="form-control file-upload"  required>
                        </div><br>  

                        <input type="submit" class="btn btn-primary mr-2" value="Salvar">
                        <a href="/dashboard/organizadores_eventos/listar"><input type="cancel" class="btn btn-primary mr-2" value="Cancelar" onclick="confirm();"></a>

                    </form>
            </div>
        </div>
    </div>
</div>

<script>

    function validarForm() {
        var senha = document.getElementById("ORE_SENHA").value;
        var confirmarSenha = document.getElementById("ORE_VERIFICAR_SENHA").value;
        var email = document.getElementById("ORE_EMAIL").value;

        if (senha !== confirmarSenha) {
            alert("A senha para o cadastro não coincide com a confirmação de senha!.");
            return false;
        }

        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(email)) {
            alert("Endereço de email invalido.");
            return false;
        }

            return true;
    }

</script>