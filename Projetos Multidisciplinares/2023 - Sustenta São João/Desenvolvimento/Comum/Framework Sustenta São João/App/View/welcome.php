<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title><?php echo $this->getView()->texto; ?></title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../resources/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../resources/css/style.css" rel="stylesheet" />
  <link href="../resources/css/style_MOD01.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../resources/css/responsive.css" rel="stylesheet" />
</head>
<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="/">
            <span>
              <img class="logo" src="../resources/img/logo.png" alt="Logo Sustenta São João"><label for="logo" class="logoText" >Sustenta São João </label>
            </span>
          </a>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="s-1"> </span>
            <span class="s-2"> </span>
            <span class="s-3"> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item">
                  <a class="nav-link" href="/">Início<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#sobre_nos">Sobre</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#servicos">Serviços</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contactLink" >Entrar</a>
                </li>
              </ul>
            </div>
            <div class="quote_btn-container ">
              <a href="https://wa.me/5519984120022">
                <img src="../resources/img/call.png" alt="">
                <span>
                  Chame: + (19) 98412-0022
                </span>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->


    <!-- Begin Page Content -->
    
        <?php $this->content(); ?>
    
    <!-- /.container-fluid -->


    
  <br clear="all">
  <!-- end work section -->
  <div class="footer_bg">
    <!-- contact section -->
    <section class="contact_section layout_padding" id="contactLink">
      <div class="container">
        <div class="heading_container">
          <h2>
            Entrar
          </h2>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-8 mx-auto">
            <form action="/dashboard/home">
              <div class="form-row">
                <div class="form-group col">
                  <input type="text" class="form-control" id="inputSubject4" placeholder="Usuário">
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="inputMessage" placeholder="Senha">
              </div>
              <div class="d-flex justify-content-center">
                <button type="submit" class="">Entrar</button>
              </div><br>
              <p class="criar-conta">Não tem uma conta? <a href="/dashboard/cadastro">Criar uma conta</a></p>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- end contact section -->
    <!-- info section -->
    <section class="info_section layout_padding2">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="info_logo">
              <h3 class="sustenta_Footer">
                Sustenta São João
              </h3>
              <p>
                Promovendo a sustentabilidade, a transparência e a melhoria dos serviços básicos à população.
              </p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_links">
              <h4>
                LINKS
              </h4>
                <li class="">
                  <a class="" href="">Página Inicial<span class="sr-only">(current)</span></a>
                </li>
                <li class="">
                  <a class="" href="/sobre"> Sobre</a>
                </li>
                <li class="">
                  <a class="" href="/servicos"> Serviços </a>
                </li>
                <li class="">
                  <a class="" href="/login">Entrar</a>
                </li>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <h4>
                CONTATO
              </h4>
              <a href="https://wa.me/5519984120022">
                <div class="img-box">
                  <img src="../resources/img/telephone-white.png" width="12px" alt="">
                </div>
                <p>
                  + (19) 98412-0022
                </p>
              </a>
              <a href="mailto:cdi.sbv@ifsp.edu.br">
                <div class="img-box">
                  <img src="../resources/img/envelope-white.png" width="18px" alt="">
                </div>
                <p href="mailto:cdi.sbv@ifsp.edu.br">
                  cdi.sbv@ifsp.edu.br
                </p>
              </a>
            </div>
          </div>
          <div class="col-md-3">
              <div class="social_box">
                <a href="https://www.facebook.com/IFSaoPaulo">
                  <img src="../resources/img/info-fb.png" alt="">
                </a>
                <a href="https://twitter.com/spo_ifsp">
                  <img src="../resources/img/info-twitter.png" alt="">
                </a>
                <a href="https://www.youtube.com/user/ifspoficial">
                  <img src="../resources/img/info-youtube.png" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end info_section -->


    <!-- footer section -->
    <section class="container-fluid footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> Todos os direitos reservados por
          <a href="https://www.sbv.ifsp.edu.br/">IFSP-SBV</a>
        </p>
      </div>
    </section>
    <!-- footer section -->

  </div>

  <script type="text/javascript" src="../resources/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../resources/js/bootstrap.js"></script>
  <script type="text/javascript" src="../resources/js/custom.js"></script>

</body>
</html>