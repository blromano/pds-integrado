<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <span>Cadastro de Usuários</span>
            </div>
            <div class="card-body">
                <form action="/usuario/inserir" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome Completo" required="">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="E-mail" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="inputPassword" name="senha" autocomplete="off" placeholder="Senha entre 8 a 16 caracteres" required="">
                    </div>
                    <div class="form-group">
                        <label for="nivel" class="">Nível De Acesso:</label name="nivel" id="nivel">
                        <br />
                            <select name="nivel" id="nivel" placeholder="Selecione o nível" type="text" class="form-control">
                                <option value="adm">
                                    Administrador         
                                </option>
                                <option value="usr">
                                    Usuário         
                                </option>
                            </select>
                    </div>

                    <?php if ($this->getView()->status == 203) { ?>
                        <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
                    <?php } ?>
                    <div class="form-row">
                        <div class="col">
                            <button type="submit" class="btn btn-outline-secondary">Salvar</button>
                        </div>
                    </div>

                   
                </form>
            </div>
        </div>
    </div>
</div>