<?php


if (isset($_GET['status']) && $_GET['status']=='203'){
    echo "Cadastro de Secretário, todos os campos devem ser preenchidos!";
}
?>

<!-- DataTales Example -->
<div class="col-12 d-flex flex-column align-items-center w-100" id="cadastroSecretario">
    <h1 class="h3 mb-2 text-gray-800 my-4">Cadastro Secretário(a)</h1>
    <form class="user" class="col-12 col-md-6 col-lg-4" action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control rounded-pill" id="SEC_SETOR" name="SEC_SETOR" placeholder="Setor">
        </div>

        <div class="form-group">
            <input type="email" class="form-control rounded-pill"  id="SEC_EMAIL_PROFISSIONAL" name="SEC_EMAIL_PROFISSIONAL" placeholder="E-mail Profissional"> 
        </div>

        <div class="form-group">
            <input type="tel" class="form-control rounded-pill"  id="SEC_TELEFONE_PROFISSIONAL" name="SEC_TELEFONE_PROFISSIONAL" placeholder="Telefone Profissional"> 
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control rounded-pill"
                id="USU_SENHA" name="USU_SENHA" placeholder="Senha">
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control rounded-pill"
                id="USU_SENHA" name="USU_SENHA" placeholder="Confirme a senha">
            </div>
        </div>

        <?php if ($this->getView()->status == 203) { ?>
            <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
        <?php } ?>
        <div class="form-row">
            <div class="col">
                <button type="submit" class="btn btn-outline-secondary">Cadastrar</button>
            </div>
        </div>
    </form>
</div>