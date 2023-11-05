<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Mais Saúde São João</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      a{
          color: #F78181;
      }
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #A9D0F5;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #F78181;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }
  #logo1{
      width: 15%;
      margin-bottom: 0px;
  }
  .jumbotron {
      background-color: #A9D0F5;
      color: #fff;
      padding: 100px 20px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #A9D0F5;
      font-size: 50px;
  }
  .logo {
      color: #A9D0F5;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #A9D0F5;
  }
  .carousel-indicators li {
      border-color: #A9D0F5;
  }
  .carousel-indicators li.active {
      background-color: #A9D0F5;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #A9D0F5; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #A9D0F5;
      background-color: #fff !important;
      color: #A9D0F5;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #A9D0F5 !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #A9D0F5;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #A9D0F5;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #A9D0F5 !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #A9D0F5;
  }
  .slideanim {
      visibility:hidden;
  }
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<!-- #A9D0F5 cor bunitinha-->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li><a href="#services">Treinamentos</a></li>
        <li><a href="#portfolio">Rede Social</a></li>
        <li><a href="#contact">Contato</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <img id="logo1" src="Logo_Final.png"/>
</div>

<!-- Container (TREINOS Section) -->
<div id="services" class="container-fluid text-center">
    <span class="glyphicon glyphicon-leaf logo-small"></span>
    <h2>FERRAMENTAS NUTRICIONAIS</h2>
    
</div>

<!-- Container (REDE SOCIAL Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>REDE SOCIAL</h2><br>
  <h4>O que acontece no aplicativo</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="Logo_Final.png" alt="Paris" width="400" height="300">
        <p><strong>Mais Saúde</strong></p>
        <p>São João</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
          <img src="Logo_Final.png" alt="New York" width="400" height="300">
        <p><strong>Alimente-se</strong></p>
        <p>Movimente-se</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="Logo_Final.png" alt="San Francisco" width="400" height="300">
        <p><strong>Corra</strong></p>
        <p>Coma</p>
      </div>
    </div>
  </div><br>
  
  <h2>O que os usuários comentam</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Rede Social -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"Eu consegui emagrecer 5kg! UHULLLLL"<br><span>Maria Carolina, Usuário</span></h4>
      </div>
      <div class="item">
        <h4>"Caminhei mais de 4km hoje! Estou super cansado mas satisfeito"<br><span>Luis, Treinador</span></h4>
      </div>
      <div class="item">
        <h4>"Criei uma receita nova! Deem uma olhadinha lá ;-)"<br><span> Carla, Nutricionista</span></h4>
      </div>
    </div>

    <!-- Controle direita e esquerda -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Próximo</span>
    </a>
  </div>
</div>

<!-- Container (CONTATO Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTATO</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contatos preferenciais.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> São João, BR</p>
      <p><span class="glyphicon glyphicon-phone"></span> +55 19 989695213</p>
      <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Nome" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Conteúdo" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Enviar</button>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p><a href="https://www.sbv.ifsp.edu.br" title="Visit w3schools">www.sbv.ifsp.edu.br</a></p>
  <p>São João da Boa Vista - SP</p>
  <p>Instituto Federal</p>
  <p>+55 19 36333829</p>
  <p>13800-550</p>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>