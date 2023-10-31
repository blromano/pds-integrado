<?php
    $pagina = "CadastroMedico";
    $footerColado = True;
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
            <h3>Cadastro Médico(a)</h3>
    
            <label for="username">CRM</label>
            <input type="text" placeholder="XXXXXX/SS" id="nome">
    
            <label for="username">Incrição</label>
            <input type="text" placeholder="Incrição" id="sobrenome">

            <label for="username">Especialização/Área de atuação</label>
            <input type="text" placeholder="RQE 	Nº:XXXXX" id="social">

            <a id="cadastrar" class="sign-up">Cadastrar</a>
            <a href="../index.php" id="cancel" class="sign-up">Cancelar</a>
        </form>

    <?php include "footer.php";?>