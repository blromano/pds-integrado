<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"><?php echo $this->getView()->boas_vindas; ?></h1>
                    </div>
                    <form class="user" action="/login/entrar" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                id="USU_CPF" name="USU_CPF" required="" aria-describedby="cpfHelp"
                                placeholder="Digite seu CPF">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user"
                                id="USU_SENHA" name="USU_SENHA" placeholder="Digite sua Senha">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Lembrar meus dados</label>
                            </div>
                        </div>
                        <?php if(isset($this->getView()->status)) if ($this->getView()->status == 203) { ?>
                            <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
                        <?php } ?>
                        <div class="form-row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-user btn-block">Entrar</button> <!-- VER COMO FAZER A VERIFICAÇÃO DE QUAL USUÁRIO TA LOGANDO-->
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="esqueciSenha">Esqueceu a Senha?</a> <!-- MUDAR ROTA DPS -->
                    </div>
                    <div class="text-center">
                        <a class="small" href="/registrar/cadastrar">Criar uma conta!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>