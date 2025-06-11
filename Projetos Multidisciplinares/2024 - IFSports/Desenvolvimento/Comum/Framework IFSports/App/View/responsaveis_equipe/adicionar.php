<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastrar Responsável</title>
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
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">   
    </script>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="cartao d-flex align-items-center auth px-0">
            <div class="card-body1">
                <form class="forms-sample" action="/dashboard/responsaveis_equipe/inserir" method="POST">
                <h1 class="text-uppercase text-sm cadastrar-se">Cadastrar Responsável </h1><br>
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
                                    <input id="RES_NOME" name="RES_NOME" class="form-control" type="text" value="Matheus Antonio Paina de Sousa" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="RES_NOME_SOCIAL">Nome Social <span class="required">*</span></label>
                                    <input id="RES_NOME_SOCIAL" name="RES_NOME_SOCIAL" class="form-control" type="text" value="Não tem" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="RES_CPF">CPF <span class="required">*</span></label>
                                    <input id="RES_CPF" name="RES_CPF" class="form-control" type="text" value="12345678900" required>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label for="RES_RG">RG <span class="required">*</span></label>
                                    <input id="RES_RG" name="RES_RG" class="form-control" type="text" value="123456789" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="RES_DATA_NASCIMENTO">Data de Nascimento <span class="required">*</span></label>
                                    <input id="RES_DATA_NASCIMENTO" name="RES_DATA_NASCIMENTO" class="form-control" type="date" value="2004-10-08" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="RES_TELEFONE">Telefone <span class="required">*</span></label>
                                    <input id="RES_TELEFONE" name="RES_TELEFONE" class="form-control" type="text" value="19 978267447" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="RES_FOTO">Foto 3x4 <span class="required">*</span></label>
                                    <input id="RES_FOTO" name="RES_FOTO" class="form-control file-upload" type="file" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="RES_SEXO">Sexo <span class="required">*</span></label>
                                    <div id="RES_SEXO" class="form-control radio-group">
                                        <input type="radio" name="RES_SEXO" value="M" id="masculino" required>
                                        <label for="masculino">Masculino</label>
                                        <input type="radio" name="RES_SEXO" value="F" id="feminino">
                                        <label for="feminino">Feminino</label>
                                    </div>
                                </div>
                            </div> &nbsp 
                            <div class="col-md-6"> 
                                <div class="form-group"> 
                                 <label for="RES_ETNIA">Etnia <span class="required">*</span></label>
                                    <div id="RES_ETNIA" class="form-control radio-group">
                                        <input type="radio" name="RES_ETNIA" value="Branco" id="branco" required>
                                        <label for="branco">Branco</label> 
                                        <input type="radio" name="RES_ETNIA" value="Preto" id="preto">
                                        <label for="preto">Preto</label>
                                        <input type="radio" name="RES_ETNIA" value="Pardo" id="pardo">
                                        <label for="pardo">Pardo</label>
                                        <input type="radio" name="RES_ETNIA" value="Indígena" id="indigena">
                                        <label for="indigena">Indígena</label>
                                        <input type="radio" name="RES_ETNIA" value="Amarelo" id="amarelo">
                                        <label for="amarelo">Amarelo</label>
                                    </div>
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
                            <input id="RES_CEP" name="RES_CEP" class="form-control" type="text" value="12345678" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Cidade <span class="required">*</span></label>
                            <select class="form-control" id="FK_CIDADES_CID_ID" name="FK_CIDADES_CID_ID" required>
                                  <option>Selecione a Cidade</option> 
                                    <?php                                 

                                    foreach($this->getView()->cidades as $cid) { ?>
                                      <option value="<?php echo $cid->__get('CID_ID'); ?>">
                                          <?php echo $cid->__get('CID_NOME'); ?>
                                      </option>
                                  <?php } ?>
                              </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RES_BAIRRO">Bairro <span class="required">*</span></label>
                            <input id="RES_BAIRRO" name="RES_BAIRRO" class="form-control" type="text" value="Centro" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RES_RUA">Rua <span class="required">*</span></label>
                            <input id="RES_RUA" name="RES_RUA" class="form-control" type="text" value="Rua AB" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RES_COMPLEMENTO">Complemento <span class="required">*</span></label>
                            <input id="RES_COMPLEMENTO" name="RES_COMPLEMENTO" class="form-control" type="text" value="Apartamento 101" required>
                        </div>
                    </div>
                </div>
                <hr class="horizontal dark">
                <center><p class="text-uppercase text-sm">Dados Educacionais</p></center>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RES_PRONTUARIO">Prontuário <span class="required">*</span></label>
                            <input id="RES_PRONTUARIO" name="RES_PRONTUARIO" class="form-control" type="text" value="BV301410X" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RES_EMAIL">E-mail Institucional <span class="required">*</span></label>
                            <input id="RES_EMAIL" name="RES_EMAIL" class="form-control" type="text" value="matheus.sousa@ifsp.edu.br" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Campus <span class="required">*</span></label>
                            <select class="form-control" id="FK_CAMPUS_CAM_ID" name="FK_CAMPUS_CAM_ID" required>
                                  <option>Selecione o Campus</option> 
                                    <?php                                 

                                    foreach($this->getView()->campus as $cam) { ?>
                                      <option value="<?php echo $cam->__get('CAM_ID'); ?>">
                                          <?php echo $cam->__get('CAM_NOME'); ?>
                                      </option>
                                  <?php } ?>
                              </select>
                        </div>
                    </div>
                    <!--<div class="col-md-6">
                        <div class="form-group">
                            <label for="">Evento - Modalidade<span class="required">*</span></label>
                            <select class="form-control" id="EVM_ID" name="EVM_ID" required>
                                  <option>Selecione o Evento / Modalidade</option>                                   
                            </select>
                        </div>
                    </div> -->
                </div>
                <hr class="horizontal dark">
                <center><p class="text-uppercase text-sm">Definição de Senha</p></center>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RES_SENHA">Definição de Senha <span class="required">*</span></label>
                            <input id="RES_SENHA" name="RES_SENHA" class="form-control" type="password" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="RES_VERIFICAR_SENHA">Confirmação da Senha <span class="required">*</span></label>
                            <input id="RES_VERIFICAR_SENHA" name="RES_VERIFICAR_SENHA" class="form-control" type="password" required>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="button-group">
                        <button type="submit" class="btn btn-primary1">Cadastrar</button>
                        <a href="/dashboard/responsaveis_equipe/listar" onclick="cancelar();"> <button type="button" class="btn btn-cancel" > Cancelar </button></a> 
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script> 
            document.getElementById("formCadastro").addEventListener("submit", function(event) {
            const email = document.getElementById("RES_EMAIL").value;
            const senha = document.getElementById("RES_SENHA").value;
            const confirmarSenha = document.getElementById("RES_VERIFICAR_SENHA").value;
            const mensagemErro = document.getElementById("mensagemErro");
    
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
            // Validação de senha com mínimo de 8 caracteres
            if (senha.length < 8) {
                event.preventDefault();
                mensagemErro.textContent = "A senha deve conter pelo menos 8 caracteres.";
                return;
            }
    
            // Validação de senha
            if (senha !== confirmarSenha) {
                event.preventDefault();
                mensagemErro.textContent = "As senhas não coincidem. Por favor, tente novamente.";
                return;
            }
    
            // Validação de e-mail
            if (!emailRegex.test(email)) {
                event.preventDefault();
                mensagemErro.textContent = "Por favor, insira um e-mail válido.";
                return;
            }
    
            mensagemErro.textContent = ""; // Limpa a mensagem de erro se tudo estiver ok
        });   
        function cancelar() {
            alert("Tem certeza que deseja voltar?"); 
        }
        
    </script>
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
