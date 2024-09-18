<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"></h1>
                    </div>
                    <form class="user" action="/registrar/inserir" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="USU_NOME" name="USU_NOME" autocomplete="off" required="" placeholder="Nome Completo">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="USU_CPF" name="USU_CPF" placeholder="CPF">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="USU_RG" name="USU_RG" placeholder="RG">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="tel" class="form-control form-control-user" id="USU_NUMERO_CELULAR" name="USU_NUMERO_CELULAR" placeholder="Celular">
                            </div>
                            <div class="col-sm-6">
                                <input type="tel" class="form-control form-control-user" id="USU_TELEFONE" name="USU_TELEFONE" placeholder="Telefone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="date" class="form-control form-control-user" id="USU_DATA_DE_NASCIMENTO" name="USU_DATA_DE_NASCIMENTO" placeholder="Data de Nascimento">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="USU_CEP" name="USU_CEP" placeholder="CEP">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="" name="" placeholder="Estado">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="" name="" placeholder="Cidade">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="" name="" placeholder="Rua">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="" name="" placeholder="Bairro">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="USU_NUMERO_RESIDENCIA" name="USU_NUMERO_RESIDENCIA" placeholder="Número Residencial">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="USU_COMPLEMENTO" name="USU_COMPLEMENTO" placeholder="Complemento">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control form-control-user" id="USU_FOTO" name="USU_FOTO" accept="image/png, image/jpeg" />
                        </div>
                        <div class="form-group">
                            <input type="radio" name="USU_SEXO" value="F" id="USU_SEXO" checked class="tamanhoradio"> Feminino
                            <input type="radio" name="USU_SEXO" value="M" id="USU_SEXO" class="tamanhoradio"> Masculino
                            <input type="radio" name="USU_SEXO" value="O" id="USU_SEXO" class="tamanhoradio"> Prefiro Não me Identificar
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="USU_EMAIL" name="USU_EMAIL" placeholder="E-mail">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="USU_SENHA" name="USU_SENHA" placeholder="Senha">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="USU_SENHA" name="USU_SENHA" placeholder="Confirme a senha">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="FK_PLANOS_PLA_ID" name="FK_PLANOS_PLA_ID" placeholder="Plano">
                        </div>

                        <input type="hidden" id="USU_TIPO" name="USU_TIPO" value="paciente">

                        <?php if ($this->getView()->status == 203) { ?>
                            <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
                        <?php } ?>
                        <div class="form-row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-user btn-block">Criar minha conta</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="">Já tem uma conta? Entre agora!</a> <!-- VER A ROTA DE LOGIN PRA COLOCAR CERTO AQ -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>