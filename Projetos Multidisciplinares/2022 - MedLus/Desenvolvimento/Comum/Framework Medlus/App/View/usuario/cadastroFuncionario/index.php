<?php


if (isset($_GET['status']) && $_GET['status']=='203'){
    echo "todos os campos devem ser preenchidos!";
}
?>

<!-- DataTales Example -->
<div class="col-12 d-flex flex-column align-items-center w-100" id="cadastroFuncionario">
    <h1 class="h3 mb-2 text-gray-800 my-4">Cadastrar novo Funcionário</h1>
    <form class="user" class="col-12 col-md-6 col-lg-4" action="/funcionario/inserir" method="post">
        <div class="form-group">
                <input type="text" class="form-control rounded-pill" 
                id="USU_NOME" name="USU_NOME" placeholder="Nome Completo">
        </div>

        <div class="form-group">
                <input type="text" class="form-control rounded-pill" 
                id="USU_NOME_SOCIAL" name="USU_NOME_SOCIAL" placeholder="Nome Social">
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control rounded-pill"
                id="USU_CPF" name="USU_CPF" placeholder="CPF">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control rounded-pill"
                id="USU_RG" name="USU_RG" placeholder="RG">
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="tel" class="form-control rounded-pill"
                id="USU_NUMERO_CELULAR"  name="USU_NUMERO_CELULAR" placeholder="Celular Pessoal">
            </div>
            <div class="col-sm-6">
                <input type="tel" class="form-control rounded-pill"
                id="USU_TELEFONE" name="USU_TELEFONE" placeholder="Telefone Pessoal">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="tel" class="form-control rounded-pill"
                id="USU_NUMERO_RESIDENCIA"  name="USU_NUMERO_RESIDENCIA" placeholder="Número Residencia">
            </div>
            <div class="col-sm-6">
                <input type="tel" class="form-control rounded-pill"
                id="USU_COMPLEMENTO" name="USU_COMPLEMENTO" placeholder="Complemento">
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="date" class="form-control rounded-pill"
                id="USU_DATA_DE_NASCIMENTO" name="USU_DATA_DE_NASCIMENTO" placeholder="Data de Nascimento">
            </div>
            <div class="col-sm-6">
                <input type="file" class="form-control rounded-pill" 
                id="USU_FOTO" name="USU_FOTO" placeholder="Foto de Perfil" accept="image/png, image/jpeg"/>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="radio" name="USU_SEXO" value="F" id="USU_SEXO" checked class="tamanhoradio"> Feminino
                <input type="radio" name="USU_SEXO" value="M" id="USU_SEXO" class="tamanhoradio"> Masculino
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control rounded-pill"
                id="USU_CEP" name="USU_CEP" placeholder="CEP">
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control rounded-pill"
                id="" name="" placeholder="Estado"> <!-- FALTA COISA NO BANCO AQUI, CADE O ESTADO? -->
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control rounded-pill"
                id="" name="" placeholder="Cidade"> <!-- FALTA COISA NO BANCO AQUI, CADE A CIDADE? -->
            </div>
        </div>
        
        <div class="form-group">
            <input type="text" class="form-control rounded-pill"
             id="" name="" placeholder="Rua"> <!-- FALTA COISA NO BANCO AQUI, CADE A RUA? -->
        </div>
        
        <div class="form-group">
            <input type="text" class="form-control rounded-pill" 
            id="" name="" placeholder="Bairro"> <!-- FALTA COISA NO BANCO AQUI, CADE O BAIRRO? -->
        </div>

        <div class="form-group">
            <input type="email" class="form-control rounded-pill" 
            id="USU_EMAIL" name="USU_EMAIL" placeholder="E-mail Pessoal">  
        </div>
        
        <div class="form-group"> 
            Selecione o tipo de funcionário: 
            <input type="radio" id="USU_TIPO" name="USU_TIPO" value="medico" class="tamanhoradio1"> Médico(a) 
            <input type="radio" id="USU_TIPO" name="USU_TIPO" value="enfermeiro" class="tamanhoradio1"> Enfermeiro(a) 
            <input type="radio" id="USU_TIPO" name="USU_TIPO" value="secretario" class="tamanhoradio1"> Secretário(a) 
        </div>

        <div id="cadastro-enfermeiro" style="display:none">
            <div class="form-group">
                <input type="text" class="form-control rounded-pill" id="ENF_COREN" name="ENF_COREN" placeholder="Inscrição COREN">
            </div>

            <div class="form-group">
                <input type="email" class="form-control rounded-pill"  id="ENF_EMAIL_PROFISSIONAL" name="ENF_EMAIL_PROFISSIONAL" placeholder="E-mail Profissional"> 
            </div>

            <div class="form-group">
                <input type="tel" class="form-control rounded-pill"  id="ENF_TELEFONE_PROFISSIONAL" name="ENF_TELEFONE_PROFISSIONAL" placeholder="Telefone Profissional"> 
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
        </div>   
        
        <div id="cadastro-medico" style="display:none">
            <div class="form-group">
                <input type="text" class="form-control rounded-pill" id="MED_CRM" name="MED_CRM" placeholder="CRM">
            </div>

            <div class="form-group">
                <input type="number" class="form-control rounded-pill" id="MED_VALOR_CONSULTA" name="MED_VALOR_CONSULTA" placeholder="Valor da Consulta">
            </div>

            <div class="form-group">
                <input type="email" class="form-control rounded-pill"  id="MED_EMAIL_PROFISSIONAL" name="MED_EMAIL_PROFISSIONAL" placeholder="E-mail Profissional"> 
            </div>

            <div class="form-group">
                <input type="tel" class="form-control rounded-pill"  id="MED_TELEFONE_PROFISSIONAL" name="MED_TELEFONE_PROFISSIONAL" placeholder="Telefone Profissional"> 
            </div>

            <div class="form-group">
                <input type="text" class="form-control rounded-pill" id="MED_FORMACAO" name="MED_FORMACAO" placeholder="Especialização">
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
        </div>

        <div id="cadastro-secretario" style="display:none">
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
        </div>
        
        <?php if ($this->getView()->status == 203) { ?>
            <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.</small>
        <?php } ?>
        <div class="form-row">
            <div class="col">
                <button type="submit" class="btn btn-med">Cadastrar</button> <!-- VER COMO VERIRIFICAR O BOTÃO PRA CONTINUAR -->
            </div>
        </div>
    </form>
</div>
