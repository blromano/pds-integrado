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
                <div class="row">
                    <!-- Coluna para a imagem -->
                    <div class="col-md-2 col-image">
                        <img src="resources/images/fotos-alunos/anabiazoto.png" alt="Imagem" class="profile-image">
                    </div>
                    <!-- Coluna para os campos -->
                    <div class="col-md-10 col-fields">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <div class="input-group">
                                        <input id="nome" class="form-control" type="text" value="<?php echo $this->getView()->cadastraraluno->__get('ALN_NOME'); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sobrenome">Sobrenome</label>
                                    <div class="input-group">
                                        <input id="sobrenome" class="form-control" type="text" value="<?php echo $this->getView()->cadastraraluno->__get('ALN_NOME'); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome-social">Nome Social</label>
                                    <div class="input-group">
                                        <input id="nome-social" class="form-control" type="text" value="<?php echo $this->getView()->cadastraraluno->__get('ALN_NOME_SOCIAL'); ?>">
                                        <button class="edit-button">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data-nascimento">Data de Nascimento</label>
                                    <div class="input-group">
                                        <input id="data-nascimento" class="form-control" type="text" value="<?php echo $this->getView()->cadastraraluno->__get('ALN_DATA_NASCIMENTO'); ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="horizontal dark">

                <center><p class="text-uppercase text-sm">Endereço</p> </center>
                <div class="row">
                    <!-- Ordem de Endereço: CEP, Estado, Cidade, Endereço, Bairro, Rua -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <div class="input-group">
                                <input id="cep" class="form-control" type="text" value="<?php echo $this->getView()->cadastraraluno->__get('ALN_CPF'); ?>">
                                <button class="edit-button">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <div class="input-group">
                                <select id="estado" class="form-control">
                                    <option>São Paulo</option>
                                    <option>Minas Gerais</option>
                                </select>
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
                                <select id="cidade" class="form-control">
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
                                <input id="bairro" class="form-control" type="text" value="São João da Boa Vista">
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
                                <input id="rua" class="form-control" type="text" value="São João da Boa Vista">
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
                                <input id="complemento" class="form-control" type="text" value="São João da Boa Vista">
                                <button class="edit-button">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="horizontal dark">
                <div class="row">
                    <!-- Outros campos na ordem solicitada -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="campus">Campus</label>
                            <div class="input-group">
                                <select id="campus" class="form-control" readonly>
                                    <option>São Paulo</option>
                                    <option>São João Da Boa Vista</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="curso">Curso</label>
                            <div class="input-group">
                                <input id="curso" class="form-control" type="text" value="Informática" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="prontuario">Prontuário</label>
                            <div class="input-group">
                                <input id="prontuario" class="form-control" type="text" value="YYXXXXXXX" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="rg">RG</label>
                            <div class="input-group">
                                <input id="rg" class="form-control" type="text" value="IFSP-SJBV" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <div class="input-group">
                                <input id="cpf" class="form-control" type="text" value="436.876.098/90" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="etnia">Etnia</label>
                            <div class="input-group">
                                <input id="etnia" class="form-control" type="text" value="IFSP-SJBV" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <div class="input-group">
                                <input id="sexo" class="form-control" type="text" value="Feminino" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <input id="email" class="form-control" type="text" value="ana.biazoto@aluno.ifsp.edu.br">
                                <button class="edit-button">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <div class="input-group">
                                <input id="telefone" class="form-control" type="text" value="(XX) XXXXX-XXXX">
                                <button class="edit-button">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <div class="input-group">
                                <input id="senha" class="form-control" type="text" value="437300">
                                <button class="edit-button">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-md-4">
                    </div>
                    <center>
                        <div class="d-flex align-items-center">
                            &emsp;<button class="btn btn-primary1 btn-sm ms-auto">SALVAR</button>
                        </div>
                    </center>
                
            </div>
        </div>
    </div>
</body>

</html>