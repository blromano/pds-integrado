<?php 
    $pagina = "cadastroDependente";
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
    <?php echo $css;  echo $cssCadastro; ?>

</head>

<body>
    <div class="d-flex flex-column align-items-center conteudo">

        <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-5 mb-5">
            <h3>Cadastro de Dependente</h3>
    
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
    
            <div class="d-flex flex-row" class="size">
                <input type="radio" name="sexo" value="feminino" checked class="tamanhoradio"> Feminino
                <input type="radio" name="sexo" value="masculino" class="tamanhoradio"> Masculino
                <input type="radio" name="sexo" value="pnmi" class="tamanhoradio"> Prefiro Não me Identificar
            </div>
    
            <label for="username">Email</label>
            <input type="text" placeholder="Email" id="email">
    
            <label for="password">Senha</label>
            <input type="password" placeholder="Senha" id="password">
            
            <label for="password">Confirmar Senha</label>
            <input type="password" placeholder="Senha" id="password">

           <!--Collapse não está funcionando (sla o pq caralhos nao funciona-->
           <label for="editar"> Deseja editar as informações de endereço/contato vinculados a conta? </label> </br>
            
            <a class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapseExample"> Editar Informações </a>
               
            <a class="col-sm-12 col-md-6 col-lg-5 mb-5" id="collapseExample">
                <div class="card card-body">
                <label for="password">Endereço</label>
                <input type="text" placeholder="Estado" id="estado">
                <input type="text" placeholder="Cidade" id="cidade"> </br>
                <input type="text" placeholder="Rua" id="rua"> </br>           
                <input type="text" placeholder="Número Residencial" id="numResidencia"> </br>
                <input type="text" placeholder="Bairro" id="bairro"> </br>
                <input type="text" placeholder="CEP" id="cep"> </br>
                </div>

                <label for="password">Número de Celular</label>
                <input type="tel" placeholder="+000 (DDD) 0000-0000" id="celular">
    
                <label for="password">Número de Telefone</label>
                <input type="tel" placeholder="+000 (DDD) 0000-0000" id="telefone">
                

                </a>
    
            <a id="cadastrar" class="sign-up">Cadastrar Dependente</a>
            <a href="../index.php" id="cancel" class="sign-up">Cancelar</a>
                 

</form>

<?php include "footer.php";?>