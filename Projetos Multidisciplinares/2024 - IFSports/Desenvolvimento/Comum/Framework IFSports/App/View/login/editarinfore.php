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
    <link rel="stylesheet" href="../../vendor/ti-icons/css/themify-icons.css">
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
                            <img src="<?php echo $this->getView()->responsavel->__get('RES_FOTO'); ?>" alt="Imagem" class="profile-image">
                            <div class="upload-container">
                                    <label for="RES_FOTO" class="btn btn-primary2 btn-sm">Alterar Foto</label>
                                        <input type="file" id="RES_FOTO" name="RES_FOTO" accept="image/*" style="display: none;">
                                </div>
                        </div>
                        <!-- Coluna para os campos -->
                        <div class="col-md-10 col-fields">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="RES_NOME_SOCIAL">Nome Social</label>
                                            <input id="RES_NOME_SOCIAL" name="RES_NOME_SOCIAL" class="form-control" type="text" value="<?php echo $this->getView()->responsavel->__get('RES_NOME_SOCIAL'); ?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="RES_TELEFONE">Telefone</label>
                                        <input id="RES_TELEFONE" name="RES_TELEFONE" placeholder="" class="form-control" type="text" value="<?php echo $this->getView()->responsavel->__get('RES_TELEFONE'); ?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="RES_DATA_NASCIMENTO">Data de Nascimento</label>
                                        <input id="RES_DATA_NASCIMENTO" name="RES_DATA_NASCIMENTO" placeholder="" class="form-control" type="text" value="<?php echo $this->getView()->responsavel->__get('RES_DATA_NASCIMENTO'); ?>">
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
                                <label for="RES_CEP">CEP</label>
                                    <input id="RES_CEP" name="RES_CEP" class="form-control" type="text" value="<?php echo $this->getView()->responsavel->__get('RES_CEP'); ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="FK_CIDADES_CID_ID">Cidade</label>
                                <select id="FK_CIDADES_CID_ID" name="FK_CIDADES_CID_ID" class="form-control">
                                <option selected="<?php echo $this->getView()->responsavel->__get('FK_CIDADES_CID_ID'); ?>"><?php echo $this->getView()->responsavel->__get('CID_NOME'); ?></option>
                                    <?php  

                                  foreach($this->getView()->cidades as $cid) { ?>
                                    <option value=" <?php echo $cid->__get('CID_ID'); ?>" <?php  if( $cid->__get('CID_ID')==$this->getView()->responsavel->__get('FK_CIDADES_CID_ID')){echo "selected";} ?>>
                                        <?php echo $cid->__get('CID_NOME'); ?>
                                    </option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="RES_BAIRRO">Bairro</label>
                                <input id="RES_BAIRRO" name="RES_BAIRRO" class="form-control" type="text" value="<?php echo $this->getView()->responsavel->__get('RES_BAIRRO'); ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RES_RUA">Rua</label>
                                <input id="RES_RUA" name="RES_RUA" class="form-control" type="text" value="<?php echo $this->getView()->responsavel->__get('RES_RUA'); ?>">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="RES_COMPLEMENTO">Complemento</label>
                                <input id="RES_COMPLEMENTO" name="RES_COMPLEMENTO"  placeholder="" class="form-control" type="text" value="<?php echo $this->getView()->responsavel->__get('RES_COMPLEMENTO'); ?>">
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <input type="hidden" name="FK_LOGIN_LGN_ID" id="FK_LOGIN_LGN_ID" value="<?php echo $this->getView()->responsavel->__get('FK_LOGIN_LGN_ID'); ?>">
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