<?php
    $pagina = "Cadastro";
    $footerColado = False;
    include "config.php";

    include "../controle/UsuarioDAO.php";
    $dao = new UsuarioDAO();
    $dados = $dao->listarTodos();

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
            <h3>Cadastro</h3>
    
            <label>Nome Completo</label>
            <input type="text" placeholder="Nome Sobrenome" id="nome">

            <label>Nome Social</label>
            <input type="text" placeholder="Nome Social" id="social">
    
            <label>CPF</label>
            <input type="text" placeholder="CPF" id="cpf">

            <label>RG</label>
            <input type="text" placeholder="RG" id="cpf">
    
            <label>Data de Nascimento</label>
            <input type="date" placeholder="DD/MM/AA" id="data">
    
            <label>Número de Celular</label>
            <input type="tel" onkeypress="return somenteNumeros(event)" placeholder="(00) 0000-0000" id="celular">
    
            <label>Número de Telefone</label>
            <input type="text" placeholder="(00) 0000-0000" id="telefone"  maxlength="15"/>

            <label>Foto de Perfil</label>
            <input type="file" name="arquivos" class="fotoPerfil" accept="image/png, image/jpeg"/> 
    
            <label>Endereço</label>
            <input type="text" placeholder="CEP" id="cep"> </br>
            <input type="text" placeholder="Estado" id="estado">
            <input type="text" placeholder="Cidade" id="cidade"> </br>
            <input type="text" placeholder="Rua" id="rua"> </br>           
            <input type="text" placeholder="Número Residencial" id="numResidencia"> </br>
            <input type="text" placeholder="Bairro" id="bairro"> </br>
    
            <div class="d-flex flex-row" class="size">
                <input type="radio" name="sexo" value="feminino" checked class="tamanhoradio"> Feminino
                <input type="radio" name="sexo" value="masculino" class="tamanhoradio"> Masculino
                <input type="radio" name="sexo" value="pnmi" class="tamanhoradio"> Prefiro Não me Identificar
            </div>
    
            <label>Email</label>
            <input type="text" placeholder="Email" id="email">
    
            <label>Senha</label>
            <input type="password" placeholder="Senha" id="password">
            
            <label>Confirmar Senha</label>
            <input type="password" placeholder="Senha" id="password">
    
            <div class="forgot-password">
                <a href="../view/login.php">Já é cadastrado? Entrar agora</a>
            </div>
            <a id="cadastrar" class="sign-up">Cadastrar</a>
            <a href="../index.php" id="cancel" class="sign-up">Cancelar</a>
        </form>

        <script type="text/javascript">
                function mascara(o,f){
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }
        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }
        function mtel(v){
            v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
            v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
            v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
            return v;
        }
        function id( el ){
            return document.getElementById( el );
        }
        window.onload = function(){
            id('telefone').onkeyup = function(){
                mascara( this, mtel );
            }
        }
            }
        </script>
}

    <?php include "footer.php";?>