<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastrar Aluno</title>
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
                <form class="forms-sample" action="/cadastrarAluno/inserir" method="POST">
                <h1 class="text-uppercase text-sm cadastrar-se">Cadastrar Novo Aluno</h1><br>
                <div class="row">
                    <!-- Coluna para os campos -->
                    <div class="col-md-12 col-fields">
                        <center><p class="text-uppercase text-sm">Informações Pessoais</p></center>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ALN_NOME">Nome Completo <span class="required">*</span></label>
                                    <input id="ALN_NOME" name="ALN_NOME" class="form-control" type="text" value="Bruno Granate Candido">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ALN_NOME_SOCIAL">Nome Social <span class="required">*</span></label>
                                    <input id="ALN_NOME_SOCIAL" name="ALN_NOME_SOCIAL" class="form-control" type="text" value="Não tem">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ALN_CPF">CPF <span class="required">*</span></label>
                                    <input id="ALN_CPF" name="ALN_CPF" class="form-control" type="text" value="123.456.789-00">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ALN_RG">RG <span class="required">*</span></label>
                                    <input id="ALN_RG" name="ALN_RG" class="form-control" type="text" value="12.345.678-9">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ALN_DATA_NASCIMENTO">Data de Nascimento <span class="required">*</span></label>
                                    <input id="ALN_DATA_NASCIMENTO" name="ALN_DATA_NASCIMENTO" class="form-control" type="date" value="2004-10-08">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ALN_TELEFONE">Telefone <span class="required">*</span></label>
                                    <input id="ALN_TELEFONE" name="ALN_TELEFONE" class="form-control" type="text" value="(19) 97826-7447">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ALN_SEXO">Sexo <span class="required">*</span></label>
                                    <div id="ALN_SEXO" class="form-control radio-group">
                                        <input type="radio" name="ALN_SEXO" value="Masculino" id="masculino">
                                        <label for="masculino">Masculino</label>
                                        <input type="radio" name="ALN_SEXO" value="Feminino" id="feminino">
                                        <label for="feminino">Feminino</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ALN_ETNIA">Etnia <span class="required">*</span></label>
                                    <div id="ALN_ETNIA" class="form-control radio-group">
                                        <input type="radio" name="ALN_ETNIA" value="Branco" id="branco">
                                        <label for="branco">Branco</label>
                                        <input type="radio" name="ALN_ETNIA" value="Preto" id="preto">
                                        <label for="preto">Preto</label>
                                        <input type="radio" name="ALN_ETNIA" value="Pardo" id="pardo">
                                        <label for="pardo">Pardo</label>
                                        <input type="radio" name="ALN_ETNIA" value="Indígena" id="indigena">
                                        <label for="indigena">Indígena</label>
                                        <input type="radio" name="ALN_ETNIA" value="Amarelo" id="amarelo">
                                        <label for="amarelo">Amarelo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ALN_FOTO">Foto 3x4 <span class="required">*</span></label>
                                    <input id="ALN_FOTO" name="ALN_FOTO" class="form-control file-upload" type="file">
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
                            <label for="ALN_CEP">CEP <span class="required">*</span></label>
                            <input id="ALN_CEP" name="ALN_CEP" class="form-control" type="text" value="12345-678">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ALN_ESTADO">Estado <span class="required">*</span></label>
                            <select id="ALN_ESTADO" name="ALN_ESTADO" class="form-control">
                                <option>São Paulo</option>
                                <option>Minas Gerais</option>
                                <option>Rio de Janeiro</option>
                                <option>Espirito Santo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ALN_CIDADE">Cidade <span class="required">*</span></label>
                            <select id="ALN_CIDADE" name="ALN_CIDADE" class="form-control">
                                <option>São Paulo</option>
                                <option>São João Da Boa Vista</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ALN_BAIRRO">Bairro <span class="required">*</span></label>
                            <input id="ALN_BAIRRO" name="ALN_BAIRRO" class="form-control" type="text" value="Centro">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ALN_RUA">Rua <span class="required">*</span></label>
                            <input id="ALN_RUA" name="ALN_RUA" class="form-control" type="text" value="Rua AB">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ALN_COMPLEMENTO">Complemento <span class="required">*</span></label>
                            <input id="ALN_COMPLEMENTO" name="ALN_COMPLEMENTO" class="form-control" type="text" value="Apartamento 101">
                        </div>
                    </div>
                </div>
                <hr class="horizontal dark">
                <center><p class="text-uppercase text-sm">Dados Educacionais</p></center>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ALN_PRONTUARIO">Prontuário <span class="required">*</span></label>
                            <input id="ALN_PRONTUARIO" name="ALN_PRONTUARIO" class="form-control" type="text" value="BV3014088">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ALN_EMAIL">E-mail Institucional <span class="required">*</span></label>
                            <input id="ALN_EMAIL" name="ALN_EMAIL" class="form-control" type="text" value="bruno.granate@ifsp.edu.br">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ALN_CAMPUS">Campus <span class="required">*</span></label>
                            <select id="ALN_CAMPUS" name="ALN_CAMPUS" class="form-control">
                                <option>IFSP-SBV</option>
                                <option>IFSP-AVR</option>
                                <option>IFSP-BTV</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ALN_CURSO">Campus <span class="required">*</span></label>
                            <select id="ALN_CURSO" name="ALN_CURSO" class="form-control">
                                <option>INFORMÁTICA</option>
                                <option>ELETRÔNICA</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr class="horizontal dark">
                <center><p class="text-uppercase text-sm">Definição de Senha</p></center>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ALN_SENHA">Definição de Senha <span class="required">*</span></label>
                            <input id="ALN_SENHA" name="ALN_SENHA" class="form-control" type="password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ALN_VERIFICAR_SENHA">Confirmação da Senha <span class="required">*</span></label>
                            <input id="ALN_VERIFICAR_SENHA" name="ALN_VERIFICAR_SENHA" class="form-control" type="password">
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="button-group">
                        <button type="submit" class="btn btn-primary1">Cadastrar</button>
                        <button type="button" class="btn btn-cancel">Cancelar</button>
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
