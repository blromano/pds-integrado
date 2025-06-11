<link rel="stylesheet" href="../../resources/css/modalidades.css">
<div class="formcentralize">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo $this->getView()->title ?></h4><br><br>
                <form action="/dashboard/secretarios_eventos/atualizar" class="forms-sample" method="POST" onsubmit="return validarForm();">

                    <div class="form-group">
                      <label for="SCE_NOME">Nome do Secretario</label>
                      <input type="text" class="form-control" id="SCE_NOME" name="SCE_NOME" placeholder="" value="<?php echo $this->getView()->secretarios_eventosModel->__get('SCE_NOME'); ?>">
                    </div><br>

                    <div class="form-group">
                      <label for="SCE_NOME_SOCIAL">Nome Social</label>
                      <input type="text" class="form-control" id="SCE_NOME_SOCIAL" name="SCE_NOME_SOCIAL" placeholder="" value="<?php echo $this->getView()->secretarios_eventosModel->__get('SCE_NOME_SOCIAL'); ?>">
                    </div><br>

                    <div class="form-group">
                      <label for="SCE_PRONTUARIO">Prontuário</label>
                      <input type="text" class="form-control" id="SCE_PRONTUARIO" name="SCE_PRONTUARIO" placeholder="" value="<?php echo $this->getView()->secretarios_eventosModel->__get('SCE_PRONTUARIO'); ?>">
                    </div><br>

                    <div class="form-group">
                      <label for="SCE_CPF">CPF</label>
                      <input type="text" class="form-control" id="SCE_CPF" name="SCE_CPF" placeholder="" value="<?php echo $this->getView()->secretarios_eventosModel->__get('SCE_CPF'); ?>">
                    </div><br>

                    <div class="form-group">
                      <label for="SCE_RG">RG</label>
                      <input type="text" class="form-control" id="SCE_RG" name="SCE_RG" placeholder="" value="<?php echo $this->getView()->secretarios_eventosModel->__get('SCE_RG'); ?>">
                    </div><br>

                    <div class="form-group">
                      <label for="SCE_DATA_NASCIMENTO">Data de Nascimento</label>
                      <input type="date" class="form-control" id="SCE_DATA_NASCIMENTO" name="SCE_DATA_NASCIMENTO" placeholder="" value="<?php echo $this->getView()->secretarios_eventosModel->__get('SCE_DATA_NASCIMENTO'); ?>">
                    </div><br>

                    <div class="form-group">
                          <label for="SCE_SEXO">Sexo</label>
                                <select id="SCE_SEXO" name="SCE_SEXO" class="form-control" value="" required>
                                  <option selected>Selecione o Sexo</option> 
                                  <option value="F" <?php  if($this->getView()->secretarios_eventosModel->__get('SCE_SEXO')== 'F'){echo "selected";} ?> >Feminino</option>
                                  <option value="M"  <?php  if($this->getView()->secretarios_eventosModel->__get('SCE_SEXO')== 'M'){echo "selected";} ?>  >Masculino</option>
                                </select>
                    </div><br>

                    <div class="form-group">
                          <label for="SCE_ETNIA">Etnia</label>
                                <select id="SCE_ETNIA" name="SCE_ETNIA" class="form-control" value="" required>
                                  <option selected>Selecione o Sexo</option> 
                                  <option value="BRANCO" <?php  if($this->getView()->secretarios_eventosModel->__get('SCE_ETNIA')== 'BRANCO'){echo "selected";} ?> >Branco</option>
                                  <option value="PRETO"  <?php  if($this->getView()->secretarios_eventosModel->__get('SCE_ETNIA')== 'PRETO'){echo "selected";} ?>  >Preto</option>
                                  <option value="PARDO" <?php  if($this->getView()->secretarios_eventosModel->__get('SCE_ETNIA')== 'PARDO'){echo "selected";} ?> >Pardo</option>
                                  <option value="INDIGENA"  <?php  if($this->getView()->secretarios_eventosModel->__get('SCE_ETNIA')== 'INDIGENA'){echo "selected";} ?>  >Indígena</option>
                                  <option value="AMARELO"  <?php  if($this->getView()->secretarios_eventosModel->__get('SCE_ETNIA')== 'AMARELO'){echo "selected";} ?>  >Amarelo</option>
                                </select>
                    </div><br>

                    <div class="form-group">
                      <label for="SCE_CEP">CEP</label>
                      <input type="text" class="form-control" id="SCE_CEP" name="SCE_CEP" placeholder="" value="<?php echo $this->getView()->secretarios_eventosModel->__get('SCE_CEP'); ?>">
                    </div><br>
                    
                    <div class="form-group">
                        <label for="exampleInputName2">Cidade</label>
                            <select class="form-control" id="FK_CIDADES_CID_ID" name="FK_CIDADES_CID_ID" value="">
                            <?php                                 
                                /* print_r($this->getView()->organizador_eventoModel->__get('FK_CIDADES_CID_ID'));
                                exit(); */
                                foreach($this->getView()->cidades as $cid) { ?>
                                <option value="<?php echo $cid->__get('CID_ID'); ?>" <?php  if( $cid->__get('CID_ID')==$this->getView()->secretarios_eventosModel->__get('FK_CIDADES_CID_ID')){echo "selected";} ?>>
                                    <?php echo $cid->__get('CID_NOME'); ?>
                                </option>
                                <?php } ?>
                            </select>
                    </div><br>

                    <div class="form-group">
                      <label for="SCE_BAIRRO">Bairro</label>
                      <input type="text" class="form-control" id="SCE_BAIRRO" name="SCE_BAIRRO" placeholder="" value="<?php echo $this->getView()->secretarios_eventosModel->__get('SCE_BAIRRO'); ?>">
                    </div><br>

                    <div class="form-group">
                      <label for="SCE_RUA">Rua</label>
                      <input type="text" class="form-control" id="SCE_RUA" name="SCE_RUA" placeholder="" value="<?php echo $this->getView()->secretarios_eventosModel->__get('SCE_RUA'); ?>">
                    </div><br>

                    <div class="form-group">
                      <label for="SCE_COMPLEMENTO">Complemento</label>
                      <input type="text" class="form-control" id="SCE_COMPLEMENTO" name="SCE_COMPLEMENTO" placeholder="" value="<?php echo $this->getView()->secretarios_eventosModel->__get('SCE_COMPLEMENTO'); ?>">
                    </div><br>

                    <div class="form-group">
                      <label for="SCE_TELEFONE">Telefone</label>
                      <input type="text" class="form-control" id="SCE_TELEFONE" name="SCE_TELEFONE" placeholder="" value="<?php echo $this->getView()->secretarios_eventosModel->__get('SCE_TELEFONE'); ?>">
                    </div><br>


                    <div class="form-group">
                        <label for="FK_CAMPUS_CAM_ID">Campus</label>
                        <select class="form-control" id="FK_CAMPUS_CAM_ID" name="FK_CAMPUS_CAM_ID" required>
                            <option>Selecione o Campus</option>
                            <?php foreach ($this->getView()->campus as $cam) { ?>
                                <option value="<?php echo $cam->__get('CAM_ID'); ?>" <?php if($cam->__get('CAM_ID')==$this->getView()->secretarios_eventosModel->__get('FK_CAMPUS_CAM_ID')){ echo 'selected';} ?>>
                                    <?php echo $cam->__get('CAM_NOME'); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div><br>
                    

                    <div class="form-group">
                      <label for="LGN_EMAIL">Email Institucional</label>
                      <input type="text" class="form-control" id="LGN_EMAIL" name="LGN_EMAIL" placeholder="" value="<?php echo $this->getView()->secretarios_eventosModel->__get('LGN_EMAIL'); ?>">
                    </div><br>

                    <div class="form-group">
                          <label for="SCE_FOTO">Selecione Foto 3x4 </label>
                          <input type="file" id="SCE_FOTO" name="SCE_FOTO" class="form-control file-upload" value="<?php echo $this->getView()->secretarios_eventosModel->__get('SCE_FOTO'); ?>">
                        </div><br>


                    <input type="hidden" name="LGN_TIPO" id="LGN_TIPO" value="SE">

                    <input type="hidden" name="SCE_ID" id="SCE_ID" value="<?php echo $this->getView()->secretarios_eventosModel->__get('SCE_ID'); ?>">
                    <input type="hidden" name="LGN_ID" id="LGN_ID" value="<?php echo $this->getView()->secretarios_eventosModel->__get('FK_LOGIN_LGN_ID'); ?>">
                    <input type="hidden" name="FK_LOGIN_LGN_ID" id="FK_LOGIN_LGN_ID" value="<?php echo $this->getView()->secretarios_eventosModel->__get('FK_LOGIN_LGN_ID'); ?>">
                    
                    <!-- <input type="submit" class="btn btn-primary mr-2" value="Salvar">
                    <a href="/dashboard/secretarios_eventos/listar" class="btn btn-danger">Cancelar</a> -->

                    <input type="submit" class="btn btn-primary mr-2" value="Salvar">
                    <a href="/dashboard/secretarios_eventos/listar"><input type="cancel" class="btn btn-primary mr-2" value="Cancelar" onclick="confirm();"></a>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function validarForm() {

        var cpf = document.getElementById("SCE_CPF").value.replace(/[^\d]+/g,'');
        if (!validarCPF(cpf)) {
            alert("CPF inválido.");
            return false;
        }

        var dataNascimento = new Date(document.getElementById("SCE_DATA_NASCIMENTO").value);
        var idade = new Date().getFullYear() - dataNascimento.getFullYear();
        if (idade <= 14 || dataNascimento > new Date()) {
            alert("O secretário deve ser maior de 14 anos e a data de nascimento deve ser válida.");
            return false;
        }

        var telefone = document.getElementById("SCE_TELEFONE").value.replace(/[^\d]+/g, '');
        if (!validarTelefone(telefone)) {
            alert("Telefone inválido.");
            return false;
        }

        var rg = document.getElementById("SCE_RG").value.replace(/[^\d]+/g, '');
        if (!validarRG(rg)) {
            alert("RG inválido.");
            return false;
        }

        var cep = document.getElementById("SCE_CEP").value.replace(/[^\d]+/g, '');
        if (!validarCEP(cep)) {
            alert("CEP inválido.");
            return false;
        }

        var email = document.getElementById("LGN_EMAIL").value;
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(email)) {
            alert("Endereço de email inválido.");
            return false;
        }

        return true;
    }

    function validarCPF(cpf) {
        if (cpf.length !== 11) return false;
        var soma = 0, resto;
        for (var i = 0; i < 9; i++) {
            soma += parseInt(cpf.charAt(i)) * (10 - i);
        }
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf.charAt(9))) return false;

        soma = 0;
        for (var i = 0; i < 10; i++) {
            soma += parseInt(cpf.charAt(i)) * (11 - i);
        }
        resto = (soma * 10) % 11;
        if (resto === 10 || resto === 11) resto = 0;
        if (resto !== parseInt(cpf.charAt(10))) return false;
        return true;
    }

    function validarTelefone(telefone) {
        return telefone.length === 11;
    }

    function validarRG(rg) {
        return rg.length >= 7;
    }

    function validarCEP(cep) {
        return cep.length === 8;
    }
</script>