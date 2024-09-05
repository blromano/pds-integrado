<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $title; ?> </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Imagem logo -->
  <link href="<?php echo $url.$logo;?>" rel="icon">

  <!-- Fonte -->  
  <?php echo $font;?>
  
  <!-- Css -->
  <?php echo $css;?>

  <?php 
    if($pagina == "listagem") {
      echo $cssListagem; 
    }
      
  ?>


</head>

<body>
    <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo d-flex flex-row align-items-center">
        <a href="index.php"><img src="<?php echo $url.$logo;?>" alt="" class="img-fluid"></a>
        <h1><a href="index.php">MedLus</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <!-- 
            No futuro aqui terá ifs de modo que aparecerá menus diferentes para cada tipo de usuário
          -->
          <li><a class="nav-link scrollto active" href="#hero">Início</a></li>
          <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
          <li><a class="nav-link scrollto" href="#services">Serviços</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contato</a></li>
          <li><a class="nav-link" href="cadastroUsuario.php">Criar conta</a></li>
          <li><a class="getstarted" href="alterarPerfil.php"> Meu perfil &nbsp <img class="" width="30px" src="../assets/img/iconeUsuario.png" class="font-weight-bold"> </a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <div class="conteudo">