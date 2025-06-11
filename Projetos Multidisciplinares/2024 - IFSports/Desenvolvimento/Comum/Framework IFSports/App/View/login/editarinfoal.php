<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../vendor/feather/feather.css">
    <link rel="stylesheet" href="../../vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendor/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../resources/vendor/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../../resources/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../resources/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="../../resources/css/editarinfo.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../resources/images/favicon.png" />
</head>

<body>
    <div class="container-fluid py-4">
        <div class="cartao d-flex align-items-center auth px-0">
            <div class="card-body1">
                <h1 class="text-uppercase text-sm">Editar Informações Pessoais</h1><br>
                <form action="/dashboard/info/alterar" method="POST"> 
                    <div class="row">
                        <!-- Coluna para a imagem -->
                        <div class="col-md-2 col-image">
                            <img src="<?php echo $this->getView()->aluno->__get('ALU_FOTO'); ?>" alt="Imagem" class="profile-image">
                                <div class="upload-container">
                                    <label for="ALU_FOTO" class="btn btn-primary2 btn-sm">Alterar Foto</label>
                                        <input type="file" id="ALU_FOTO" name="ALU_FOTO" accept="image/*" style="display: none;">
                                </div>
                        </div>

                        <!-- Coluna para os campos -->
                        <div class="col-md-10 col-fields">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ALU_NOME_SOCIAL">Nome Social</label>
                                        <input id="ALU_NOME_SOCIAL" name="ALU_NOME_SOCIAL" class="form-control" type="text" value="<?php echo $this->getView()->aluno->__get('ALU_NOME_SOCIAL'); ?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ALU_TELEFONE">Telefone</label>
                                        <input id="ALU_TELEFONE" name="ALU_TELEFONE" class="form-control" type="text" value="<?php echo $this->getView()->aluno->__get('ALU_TELEFONE'); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ALU_DATA_NASCIMENTO">Data de Nascimento</label>
                                        <input id="ALU_DATA_NASCIMENTO" name="ALU_DATA_NASCIMENTO" class="form-control" type="date" value="<?php echo $this->getView()->aluno->__get('ALU_DATA_NASCIMENTO'); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">

                    <center><p class="text-uppercase text-sm">Endereço</p></center>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ALU_CEP">CEP</label>
                                <input id="ALU_CEP" name="ALU_CEP" class="form-control" type="text" value="<?php echo $this->getView()->aluno->__get('ALU_CEP'); ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="FK_CIDADES_CID_ID">Cidade</label>
                                <select id="FK_CIDADES_CID_ID" name="FK_CIDADES_CID_ID" class="form-control">
                                <option selected="<?php echo $this->getView()->aluno->__get('FK_CIDADES_CID_ID'); ?>"><?php echo $this->getView()->aluno->__get('CID_NOME'); ?></option>
                                    <?php  

                                  foreach($this->getView()->cidades as $cid) { ?>
                                    <option value=" <?php echo $cid->__get('CID_ID'); ?>" <?php  if( $cid->__get('CID_ID')==$this->getView()->aluno->__get('FK_CIDADES_CID_ID')){echo "selected";} ?>>
                                        <?php echo $cid->__get('CID_NOME'); ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ALU_BAIRRO">Bairro</label>
                                <input id="ALU_BAIRRO" name="ALU_BAIRRO" class="form-control" type="text" value="<?php echo $this->getView()->aluno->__get('ALU_BAIRRO'); ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALU_RUA">Rua</label>
                                <input id="ALU_RUA" name="ALU_RUA" class="form-control" type="text" value="<?php echo $this->getView()->aluno->__get('ALU_RUA'); ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ALU_COMPLEMENTO">Complemento</label>
                                <input id="ALU_COMPLEMENTO" name="ALU_COMPLEMENTO" class="form-control" type="text" value="<?php echo $this->getView()->aluno->__get('ALU_COMPLEMENTO'); ?>">
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <input type="hidden" name="FK_LOGIN_LGN_ID" id="FK_LOGIN_LGN_ID" value="<?php echo $this->getView()->aluno->__get('FK_LOGIN_LGN_ID'); ?>">
                    <div class="col-md-4"></div>
                    <center>
                        <button type="submit" class="btn btn-primary1 btn-sm">SALVAR</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
