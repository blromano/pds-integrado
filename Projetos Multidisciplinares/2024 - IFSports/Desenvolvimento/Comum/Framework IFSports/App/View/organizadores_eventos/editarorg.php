<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Editar Organizador de Eventos</h4><br><br>
                <form action="/dashboard/organizadores_eventos/alterar" class="forms-sample" method="POST" onsubmit="return validarForm();">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nome do organizador</label>
                      <input type="text" class="form-control" id="ORE_NOME" name="ORE_NOME" placeholder="" value="<?php echo $this->getView()->organizador_eventoModel->__get('ORE_NOME'); ?>">
                    </div><br> 

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nome Social</label>
                      <input type="text" class="form-control" id="ORE_NOME_SOCIAL" name="ORE_NOME_SOCIAL" placeholder="" value="<?php echo $this->getView()->organizador_eventoModel->__get('ORE_NOME_SOCIAL'); ?>">
                    </div><br> 

                    <div class="form-group">
                      <label for="exampleInputEmail1">Prontuário</label>
                      <input type="text" class="form-control" id="ORE_PRONTUARIO" name="ORE_PRONTUARIO" placeholder="" value="<?php echo $this->getView()->organizador_eventoModel->__get('ORE_PRONTUARIO'); ?>">
                    </div><br> 

                    <div class="form-group">
                      <label for="exampleInputEmail1">CPF</label>
                      <input type="text" class="form-control" id="ORE_CPF" name="ORE_CPF" placeholder="" value="<?php echo $this->getView()->organizador_eventoModel->__get('ORE_CPF'); ?>">
                    </div><br> 

                    <div class="form-group">
                      <label for="exampleInputEmail1">RG</label>
                      <input type="text" class="form-control" id="ORE_RG" name="ORE_RG" placeholder="" value="<?php echo $this->getView()->organizador_eventoModel->__get('ORE_RG'); ?>">
                    </div><br> 

                    <div class="form-group">
                      <label for="exampleInputEmail1">Data de Nascimento</label>
                      <input type="text" class="form-control" id="ORE_DATA_NASCIMENTO" name="ORE_DATA_NASCIMENTO" placeholder="" value="<?php echo $this->getView()->organizador_eventoModel->__get('ORE_DATA_NASCIMENTO'); ?>">
                    </div><br> 

                    <div class="form-group">
                        <label for="exampleSelectGender">Sexo</label>
                          <select class="form-control" id="ORE_SEXO" name="ORE_SEXO" value="">
                            <option selected>Selecione o sexo</option> 
                            <option value="F" <?php  if($this->getView()->organizador_eventoModel->__get('ORE_SEXO')=="F"){echo "selected";} ?>  >Feminino</option>
                            <option value="M" <?php  if($this->getView()->organizador_eventoModel->__get('ORE_SEXO')=="M"){echo "selected";} ?> >Masculino</option>
                          </select>
                        </div><br> 

                    <div class="form-group">
                        <label for="exampleSelectGender2">Etnia</label>
                          <select class="form-control" id="ORE_ETNIA" name="ORE_ETNIA" value="">
                            <option selected>Selecione a etnia</option> 
                            <option value="BRANCO"   <?php  if($this->getView()->organizador_eventoModel->__get('ORE_ETNIA')=="BRANCO"){echo "selected";} ?>  >Branco</option>
                            <option value="PRETO"    <?php  if($this->getView()->organizador_eventoModel->__get('ORE_ETNIA')=="PRETO"){echo "selected";} ?> >Preto</option>
                            <option value="PARDO"    <?php  if($this->getView()->organizador_eventoModel->__get('ORE_ETNIA')=="PARDO"){echo "selected";} ?>  >Pardo</option>
                            <option value="INDIGENA" <?php  if($this->getView()->organizador_eventoModel->__get('ORE_ETNIA')=="INDIGENA"){echo "selected";} ?> >Indígena</option>
                            <option value="AMARELO"  <?php  if($this->getView()->organizador_eventoModel->__get('ORE_ETNIA')=="AMARELO"){echo "selected";} ?> >Amarelo</option>
                          </select>
                    </div><br> 

                    <div class="form-group">
                      <label for="exampleInputEmail1">Telefone</label>
                      <input type="text" class="form-control" id="ORE_TELEFONE" name="ORE_TELEFONE" placeholder="" value="<?php echo $this->getView()->organizador_eventoModel->__get('ORE_TELEFONE'); ?>">
                    </div><br> 

                    <div class="form-group">
                      <label for="exampleInputEmail1">CEP</label>
                      <input type="text" class="form-control" id="ORE_CEP" name="ORE_CEP" placeholder="" value="<?php echo $this->getView()->organizador_eventoModel->__get('ORE_CEP'); ?>">
                    </div><br> 
                    
                    <div class="form-group">
                        <label for="FK_CIDADES_CID_ID">Cidade</label>
                            <select class="form-control" id="FK_CIDADES_CID_ID" name="FK_CIDADES_CID_ID">
                                <?php                                 
                                /* print_r($this->getView()->organizador_eventoModel->__get('FK_CIDADES_CID_ID'));
                                exit(); */
                                foreach($this->getView()->cidades as $cid) { ?>
                                <option value="<?php echo $cid->__get('CID_ID'); ?>" <?php  if( $cid->__get('CID_ID')==$this->getView()->organizador_eventoModel->__get('FK_CIDADES_CID_ID')){echo "selected";} ?>>
                                    <?php echo $cid->__get('CID_NOME'); ?>
                                </option>
                                <?php } ?>
                            </select>
                    </div><br>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Bairro</label>
                      <input type="text" class="form-control" id="ORE_BAIRRO" name="ORE_BAIRRO" placeholder="" value="<?php echo $this->getView()->organizador_eventoModel->__get('ORE_BAIRRO'); ?>">
                    </div><br> 
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Rua</label>
                      <input type="text" class="form-control" id="ORE_RUA" name="ORE_RUA" placeholder="" value="<?php echo $this->getView()->organizador_eventoModel->__get('ORE_RUA'); ?>">
                    </div><br> 

                    <div class="form-group">
                      <label for="exampleInputEmail1">Complemento</label>
                      <input type="text" class="form-control" id="ORE_COMPLEMENTO" name="ORE_COMPLEMENTO" placeholder="" value="<?php echo $this->getView()->organizador_eventoModel->__get('ORE_COMPLEMENTO'); ?>">
                    </div><br> 

                    <div class="form-group">
                        <label for="exampleInputName2">Campus Sede</label>
                            <select class="form-control" id="FK_CAMPUS_CAM_ID" name="FK_CAMPUS_CAM_ID" value="">
                                <option selected>Selecione o Campus</option> 
                                <?php                                 

                                foreach($this->getView()->campus as $cam) { ?>
                                <option value="<?php echo $cam->__get('CAM_ID'); ?>" <?php  if( $cam->__get('CAM_ID')==$this->getView()->organizador_eventoModel->__get('FK_CAMPUS_CAM_ID')){echo "selected";} ?>>
                                    <?php echo $cam->__get('CAM_NOME'); ?>
                                </option>
                                <?php } ?>
                            </select>
                    </div><br>         
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email Institucional</label>
                      <input type="text" class="form-control" id="LGN_EMAIL" name="LGN_EMAIL" placeholder="" value="<?php echo $this->getView()->organizador_eventoModel->__get('LGN_EMAIL'); ?>">
                    </div><br> 

                    <div class="form-group">
                          <label for="ORE_FOTO">Selecione Foto 3x4 </label>
                          <input type="file" id="ORE_FOTO" name="ORE_FOTO" class="form-control file-upload" value="<?php echo $this->getView()->organizador_eventoModel->__get('ORE_FOTO'); ?>">
                        </div>                 
                       
                    <input type="hidden" name="ORE_ID" id="ORE_ID" value="<?php echo $this->getView()->organizador_eventoModel->__get('ORE_ID'); ?>">
                    <input type="hidden" name="FK_LOGIN_LGN_ID" id="FK_LOGIN_LGN_ID" value="<?php echo $this->getView()->organizador_eventoModel->__get('FK_LOGIN_LGN_ID'); ?>">


                    <input type="submit" class="btn btn-primary mr-2" value="Salvar">
                    <a href="/dashboard/organizadores_eventos/listar"><input type="cancel" class="btn btn-primary mr-2" value="Cancelar" onclick="confirm();"></a>

                </form>

        </div>
    </div>
</div>

<script>
    function validarForm() {
        var email = document.getElementById("ORE_EMAIL").value;
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailRegex.test(email)) {
            alert("Endereço de email invalido.");
            return false;
        }
            return true;
    }
</script>