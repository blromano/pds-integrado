
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">Esqueceu a Senha?</h1>
                                <p class="mb-4">Nós resolvemos isso para você, fique tranquilo!</p>
                            </div>
                            <form class="user" action="" method="post"> <!-- COLOCAR A ROTA AQUI -->
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user"
                                        id="USU_EMAIL" name="USU_EMAIL" aria-describedby="emailHelp" 
                                        placeholder="Digite seu email de Cadastro">
                                </div>
                                
                                <?php if ($this->getView()->status == 203) { ?>
                                <small class="form-text text-danger">*Erro ao tentar encontar o email, verifique se o mesmo já foi cadastrado anteriormente.</small>
                                <?php } ?>
                                <div class="form-row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Enviar Solicitação</button>
                                    </div>
                                </div>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="registrar">Não tem uma Conta? Crie Agora!</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login">Já tem uma conta? Entre agora!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
