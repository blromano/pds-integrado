<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Responsável </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendor/feather/feather.css">
    <link rel="stylesheet" href="../../vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendor/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../resources/vendor/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../resources/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../resources/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="../../resources/css/editarinfo.css">
    <link rel="stylesheet" href="../../resources/css/cadastraraluno.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../resources/images/favicon.png" />
</head>
<body>
    <div class="container-fluid py-4">
        <div class="cartao d-flex align-items-center auth px-0">
            <div class="card-body1">
                <form class="forms-sample" action="/dashboard/responsaveis_equipe/alterar" method="POST">
                <h1 class="text-uppercase text-sm cadastrar-se">Editar Responsável </h1><br>
                <div class="row">
                    <!-- Coluna para os campos -->
                    <div class="col-md-12 col-fields">
                    <center><p class="text-sm">Informações Pessoais</p></center>
                        <!-- <?php //if(isset($_GET['erro'])==1){ ?>
                            <center><p class="text-uppercase text-sm">erro asfjiashf</p></center>
                        <?php //} ?> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="RES_NOME">Nome Completo <span class="required">*</span></label>
                                    <input id="RES_NOME" name="RES_NOME" class="form-control" type="text" value="<?php echo $this->getView()->responsavelModel->__get('RES_NOME'); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="RES_NOME_SOCIAL">Nome Social <span class="required">*</span></label>
                                    <input id="RES_NOME_SOCIAL" name="RES_NOME_SOCIAL" class="form-control" type="text" value="<?php echo $this->getView()->responsavelModel->__get('RES_NOME_SOCIAL'); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="RES_CPF">CPF <span class="required">*</span></label>
                                    <input id="RES_CPF" name="RES_CPF" class="form-control" type="text" value="<?php echo $this->getView()->responsavelModel->__get('RES_CPF'); ?>" required>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="RES_RG">RG <span class="required">*</span></label>
                                    <input id="RES_RG" name="RES_RG" class="form-control" type="text" value="<?php echo $this->getView()->responsavelModel->__get('RES_RG'); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="RES_DATA_NASCIMENTO">Data de Nascimento <span class="required">*</span></label>
                                    <input id="RES_DATA_NASCIMENTO" name="RES_DATA_NASCIMENTO" class="form-control" type="date" value="<?php echo $this->getView()->responsavelModel->__get('RES_DATA_NASCIMENTO'); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="RES_TELEFONE">Telefone <span class="required">*</span></label>
                                    <input id="RES_TELEFONE" name="RES_TELEFONE" class="form-control" type="text" value="<?php echo $this->getView()->responsavelModel->__get('RES_TELEFONE'); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="RES_SEXO">Sexo <span class="required">*</span></label>
                                    <div id="RES_SEXO" class="form-control radio-group">
                                        <!-- Radio Masculino -->
                                        <input type="radio" name="RES_SEXO" value="M" id="masculino" 
                                        <?php if ($this->getView()->responsavelModel->__get('RES_SEXO') == 'M') echo "checked"; ?> 
                                        required>
                                        <label for="masculino">Masculino</label>

                                        <!-- Radio Feminino -->
                                        <input type="radio" name="RES_SEXO" value="F" id="feminino"
                                        <?php if ($this->getView()->responsavelModel->__get('RES_SEXO') == 'F') echo "checked"; ?>
                                        required>
                                        <label for="feminino">Feminino</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                    <label for="RES_ETNIA">Etnia <span class="required">*</span></label>
                                    <div id="RES_ETNIA" class="form-control radio-group">
                                        <!-- Radio Branco -->
                                        <input type="radio" name="RES_ETNIA" value="BRANCO" id="branco" 
                                        <?php if ($this->getView()->responsavelModel->__get('RES_ETNIA') == 'BRANCO') echo 'checked'; ?> 
                                        required>
                                        <label for="branco">Branco</label> 

                                        <!-- Radio Preto -->
                                        <input type="radio" name="RES_ETNIA" value="PRETO" id="preto"
                                        <?php if ($this->getView()->responsavelModel->__get('RES_ETNIA') == 'PRETO') echo 'checked'; ?>>
                                        <label for="preto">Preto</label>

                                        <!-- Radio Pardo -->
                                        <input type="radio" name="RES_ETNIA" value="PARDO" id="pardo"
                                        <?php if ($this->getView()->responsavelModel->__get('RES_ETNIA') == 'PRDO') echo 'checked'; ?>>
                                        <label for="pardo">Pardo</label>

                                        <!-- Radio Indígena -->
                                        <input type="radio" name="RES_ETNIA" value="ÍNDIGENA" id="indigena"
                                        <?php if ($this->getView()->responsavelModel->__get('RES_ETNIA') == 'ÍNDIGENA') echo 'checked'; ?>>
                                        <label for="indigena">Indígena</label>

                                        <!-- Radio Amarelo -->
                                        <input type="radio" name="RES_ETNIA" value="AMARELO" id="amarelo"
                                        <?php if ($this->getView()->responsavelModel->__get('RES_ETNIA') == 'AMARELO') echo 'checked'; ?>>
                                        <label for="amarelo">Amarelo</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="RES_FOTO">Foto 3x4 <span class="required">*</span></label>

                                <!-- Exibe o nome do arquivo, se já houver um nome salvo no banco -->
                                <?php if (!empty($this->getView()->responsavelModel->__get('RES_FOTO'))) : ?>
                                    <div class="previa-foto">
                                        <!-- Mostra apenas o nome do arquivo -->
                                        <p><strong>Arquivo atual: </strong><?php echo basename($this->getView()->responsavelModel->__get('RES_FOTO')); ?></p>
                                    </div>
                                <?php endif; ?>

                                <!-- Campo de upload de arquivo -->
                                <input id="RES_FOTO" name="RES_FOTO" class="form-control file-upload" type="file" required <?php echo empty($this->getView()->responsavelModel->__get('RES_FOTO')) ? 'required' : ''; ?>>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
                <hr class="horizontal dark">
                <center><p class="text-uppercase text-sm">Endereço</p></center>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RES_CEP">CEP <span class="required">*</span></label>
                            <input id="RES_CEP" name="RES_CEP" class="form-control" type="text" value="<?php echo $this->getView()->responsavelModel->__get('RES_CEP'); ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Cidade <span class="required">*</span></label>
                            <select id="FK_CIDADES_CID_ID" name="FK_CIDADES_CID_ID" class="form-control" required>
                            <?php                                 

                                foreach($this->getView()->cidades as $cid) { ?>
                                  <option value="<?php echo $cid->__get('CID_ID'); ?>" <?php  if( $cid->__get('CID_ID')==$this->getView()->responsavelModel->__get('FK_CIDADES_CID_ID')){echo "selected";} ?>>
                                      <?php echo $cid->__get('CID_NOME'); ?>
                                  </option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RES_BAIRRO">Bairro <span class="required">*</span></label>
                            <input id="RES_BAIRRO" name="RES_BAIRRO" class="form-control" type="text" value="<?php echo $this->getView()->responsavelModel->__get('RES_BAIRRO'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RES_RUA">Rua <span class="required">*</span></label>
                            <input id="RES_RUA" name="RES_RUA" class="form-control" type="text" value="<?php echo $this->getView()->responsavelModel->__get('RES_RUA'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RES_COMPLEMENTO">Complemento <span class="required">*</span></label>
                            <input id="RES_COMPLEMENTO" name="RES_COMPLEMENTO" class="form-control" type="text" value="<?php echo $this->getView()->responsavelModel->__get('RES_COMPLEMENTO'); ?>" required>
                        </div>
                    </div>
                </div>
                <hr class="horizontal dark">
                <center><p class="text-uppercase text-sm">Dados Educacionais</p></center>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RES_PRONTUARIO">Prontuário <span class="required">*</span></label>
                            <input id="RES_PRONTUARIO" name="RES_PRONTUARIO" class="form-control" type="text" value="<?php echo $this->getView()->responsavelModel->__get('RES_PRONTUARIO'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RES_EMAIL">E-mail Institucional <span class="required">*</span></label>
                            <input id="RES_EMAIL" name="RES_EMAIL" class="form-control" type="text" value="<?php echo $this->getView()->responsavelModel->__get('LGN_EMAIL'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Campus <span class="required">*</span></label>
                            <select id="FK_CAMPUS_CAM_ID" name="FK_CAMPUS_CAM_ID" class="form-control" required>
                            <?php                                 

                                foreach($this->getView()->campus as $cam) { ?>
                                  <option value="<?php echo $cam->__get('CAM_ID'); ?>" <?php  if( $cam->__get('CAM_ID')==$this->getView()->responsavelModel->__get('FK_CAMPUS_CAM_ID')){echo "selected";} ?>>
                                      <?php echo $cam->__get('CAM_NOME'); ?>
                                  </option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
               
                <div class="form-group text-center">
                    <div class="button-group">
                        <input type="hidden" name="RES_ID" id="RES_ID" value="<?php echo $this->getView()->responsavelModel->__get('RES_ID'); ?>">
                        <input type="hidden" name="FK_LOGIN_LGN_ID" id="FK_LOGIN_LGN_ID" value="<?php echo $this->getView()->responsavelModel->__get('FK_LOGIN_LGN_ID'); ?>">
                        <button type="submit" class="btn btn-primary1">Editar</button>
                        <a href="/dashboard/responsaveis_equipe/listar" onclick="cancelar();"> <button type="button" class="btn btn-cancel" > Cancelar </button></a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- plugins:js -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/datatables.net/js/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../../resources/js/dataTables.select.min.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../../resources/js/vertical-layout-light/off-canvas.js"></script>
    <script src="../../resources/js/vertical-layout-light/hoverable-collapse.js"></script>
    <script src="../../resources/js/vertical-layout-light/misc.js"></script>
    <script src="../../resources/js/vertical-layout-light/settings.js"></script>
    <script src="../../resources/js/vertical-layout-light/todolist.js"></script>
    <!-- endinject -->
</body>
</html>
