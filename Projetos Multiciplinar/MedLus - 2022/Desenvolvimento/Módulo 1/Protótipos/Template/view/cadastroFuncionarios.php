<?php
    $pagina = "Cadastro_Funcionarios";
    $footerColado = False;
    include "config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <title> <?php echo $title;?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset = "UTF-8">
    <link href="<?php echo $url.$logo;?>" rel="icon">
   
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Stylesheet-->
    <?php echo $css;  echo $cssCadastroFuncionario; ?>

</head>

<body>
    <div class="d-flex flex-column align-items-center conteudo">

        <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-5 mb-5">
            <h3>Cadastro Funcionários</h3>
    
            <label for="username">Nome</label>
            <input type="text" placeholder="Nome" id="nome">
    
            <label for="username">Sobrenome</label>
            <input type="text" placeholder="Sobrenome" id="sobrenome">
    
            <label for="password">CPF</label>
            <input type="text" placeholder="CPF" id="cpf">

            <label for="password">RG</label>
            <input type="text" placeholder="RG" id="cpf">
    
            <label for="password">Data de Nascimento</label>
            <input type="date" placeholder="DD/MM/AA" id="data">
    
            <label for="password">Número de Celular</label>
            <input type="tel" placeholder="+000 (DDD) 0000-0000" id="celular">
    
            <label for="password">Número de Telefone</label>
            <input type="tel" placeholder="+000 (DDD) 0000-0000" id="telefone">

            <label for="password">Foto de Perfil</label>
            <input type="file" name="arquivos" class="fotoPerfil" accept="image/png, image/jpeg"/> 

            <label for="password">Endereço</label>
            <input type="text" placeholder="Estado" id="estado"></br>
            <input type="text" placeholder="Cidade" id="cidade"> </br>
            <input type="text" placeholder="Rua" id="rua"> </br>           
            <input type="text" placeholder="Número Residencial" id="numResidencia"> </br>
            <input type="text" placeholder="Bairro" id="bairro"> </br>
            <input type="text" placeholder="CEP" id="cep"> </br>

            <label for="password">Será cadastrado:</label>
            <div class="d-flex flex-row" class="size">
                <input type="radio" name="sexo" value="medico" checked class="tamanhoradio1"> Médico(a)
                <input type="radio" name="sexo" value="enfermeiro" class="tamanhoradio1"> Enfermeiro(a)
                <input type="radio" name="sexo" value="secretario" class="tamanhoradio1"> Secretário(a)
            </div>

            <label for="password">Sexo:</label>
            <div class="d-flex flex-row" class="size">
                <input type="radio" name="sexo" value="feminino" checked class="tamanhoradio"> Feminino
                <input type="radio" name="sexo" value="masculino" class="tamanhoradio"> Masculino
                <input type="radio" name="sexo" value="pnmi" class="tamanhoradio"> Prefiro Não me Identificar
            </div>
    
            <label for="username">Email Pessoal</label>
            <input type="text" placeholder="Email Pessoal" id="email">

            <label for="username">Email Profissional</label>
            <input type="text" placeholder="Email Profissional" id="email">
    
            <label for="password">Senha</label>
            <input type="password" placeholder="Senha" id="password">
            
            <label for="password">Confirmar Senha</label>
            <input type="password" placeholder="Senha" id="password">
    
            <a href="cadMedicos.php" id="cadastrar" class="sign-up">Continuar</a>
            <a href="funcionarios.php" id="cancel" class="sign-up">Cancelar</a>
        </form>

    <?php include "footer.php";?>