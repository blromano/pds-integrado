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
                <form action="/aluno/editar" method="POST"> 
                    <div class="row">
                        <!-- Coluna para a imagem -->
                        <div class="col-md-2 col-image">
                            <img src="/resources/images/fotos-alunos/bruno.png" alt="Imagem" class="profile-image">
                        </div>
                        <!-- Coluna para os campos -->
                        <div class="col-md-10 col-fields">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nome">Nome Social</label>
                                        <div class="input-group">
                                            <input id="ALU_NOME_SOCIAL" name="ALU_NOME_SOCIAL" class="form-control" type="text" value="<?php echo $this->getView()->aluno->__get('ALU_NOME_SOCIAL'); ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="data-nascimento">Telefone</label>
                                        <div class="input-group">
                                            <input id="ALU_TELEFONE" name="ALU_TELEFONE" placeholder="" class="form-control" type="text" value="<?php echo $this->getView()->aluno->__get('ALU_TELEFONE'); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                
                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="data-nascimento">Data de Nascimento</label>
                                        <div class="input-group">
                                            <input id="ALU_DATA_NASCIMENTO" name="ALU_DATA_NASCIMENTO" placeholder="" class="form-control" type="text" value="<?php echo $this->getView()->aluno->__get('ALU_DATA_NASCIMENTO'); ?>" readonly>
                                        </div>
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
                                <label for="cep">CEP</label>
                                <div class="input-group">
                                    <input id="ALU_CEP" name="ALU_CEP" placeholder="" class="form-control" type="text" value="<?php echo $this->getView()->aluno->__get('ALU_CEP'); ?>">
                                    <button class="edit-button">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <div class="input-group">
                                    <select id="FK_CIDADES_CID_ID" name="FK_CIDADES_CID_ID" placeholder="" class="form-control">
                                        <option>São Paulo</option>
                                        <option>São João Da Boa Vista</option>
                                    </select>
                                    <button class="edit-button">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <div class="input-group">
                                    <input id="ALU_BAIRRO" name="ALU_BAIRRO" placeholder="" class="form-control" type="text" value="<?php echo $this->getView()->aluno->__get('ALU_BAIRRO'); ?>">
                                    <button class="edit-button">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="rua">Rua</label>
                                <div class="input-group">
                                    <input id="$ALU_RUA" name="ALU_RUA" placeholder="" class="form-control" type="text" value="<?php echo $this->getView()->aluno->__get('ALU_RUA'); ?>">
                                    <button class="edit-button">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="complemento">Complemento</label>
                                <div class="input-group">
                                 
                                    <input id="ALU_COMPLEMENTO" name="ALU_COMPLEMENTO"  placeholder="" class="form-control" type="text" value="<?php echo $this->getView()->aluno->__get('ALU_COMPLEMENTO'); ?>">
                                    <button class="edit-button">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    
                    <div class="col-md-4"></div>
                    <center>
                        <div class="d-flex align-items-center">
                            &emsp;<button type="submit" class="btn btn-primary1 btn-sm ms-auto">SALVAR</button>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </div>
</body>


</html>