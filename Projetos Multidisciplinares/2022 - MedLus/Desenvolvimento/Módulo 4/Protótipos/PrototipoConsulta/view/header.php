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
    if($pagina=="consultas"){
      echo $cssConsultas;
      // echo $cssConsultas;
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
          <?php
          if ($pagina == "index" || $pagina=="exemplo") {
          echo "<li><a class='nav-link scrollto active' href='#hero'>Início</a></li>
          <li><a class='nav-link scrollto' href='#about'>Sobre</a></li>
          <li><a class='nav-link scrollto' href='#services'>Serviços</a></li>
          <li><a class='nav-link scrollto' href='#contact'>Contato</a></li>
          <li><a class='nav-link' href='#'>Criar conta</a></li>
          <li><a class='getstarted' href='view/login.php'>Entrar</a></li>
        </ul>";
        }
        else if ($pagina == "listagem") {
          echo "<li><a class='nav-link scrollto active' href='#'>Perfil</a></li>
          <li><a class='nav-link scrollto' href='#'>Triagem</a></li>
          <li><a class='nav-link scrollto' href='#'>Consulta Presencial</a></li>
          <li><a class='nav-link scrollto' href='#'>Histórico de Consulta</a></li>
          </ul>";
        }
        else if ($pagina == "tabela-triagem"){
          echo "<li><a class='nav-link scrollto active' href='#'>Listar Consultas</a></li>
          <li><a class='nav-link scrollto' href='#'>Início</a></li>
          <li><a class='nav-link scrollto' href='#'>Internações Médicas</a></li>
          <li><a class='nav-link scrollto' href='#'>Perfil</a></li>
          </ul>";
        }
        else if ($pagina == "internacoes"){
          echo "<li><a class='nav-link scrollto active' href='#'>Internações</a></li>
          <li><a class='nav-link scrollto' href='#'>Início</a></li>
          <li><a class='nav-link scrollto' href='#'>Consultas</a></li>
          <li><a class='nav-link scrollto' href='#'>Perfil</a></li>
          </ul>";
        }
        else if ($pagina == "consultas"){
          echo "<li><a class='nav-link scrollto active' href='#'>Consulta</a></li>
          <li><a class='nav-link scrollto' href='#'>Início</a></li>
          <li><a class='nav-link scrollto' href='#'>Internações</a></li>
          <li><a class='nav-link scrollto' href='#'>Perfil</a></li>
          </ul>";
        }
        ?>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <div class="conteudo">