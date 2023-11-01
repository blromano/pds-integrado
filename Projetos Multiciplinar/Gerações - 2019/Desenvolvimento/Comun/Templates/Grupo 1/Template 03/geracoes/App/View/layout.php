<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Projeto Gerações</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="img/favico.ico" />
                <link href="../../CSS/estilo.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-light border">
                <div class="container-fluid">
                    <a href="/" class="navbar-brand"> 
                        <img src="img/logo.png" alt="logo"/>
                    </a>

                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div id="nav-principal" class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/" class="nav-link font-weight-bold">Página Inicial</a>
                            </li>
                            <li class="nav-item">
                                <a href="/sobre" class="nav-link font-weight-bold">O Projeto</a>
                            </li>
                            <li class="nav-item">
                                <a href="/nos" class="nav-link font-weight-bold">Sobre nós</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link font-weight-bold">Doações</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
                            <li class="nav-item p-2"> 
                                <a href="" target="_blank" style="color:black;"> <i class="fa fa-google"> </i> </a> 
                            </li>
                            <li class="nav-item p-2"> 
				<a href="" target="_blank" style="color:black;"> <i class="fa fa-twitter"> </i> </a> 
                            </li>
                            <li class="nav-item p-2"> 
				<a href="" target="_blank" style="color:black;"> <i class="fa fa-facebook-official"> </i> </a> 
                            </li>
                            <li class="nav-item">
                                <a href="/login" class="nav-link font-weight-bold"> <i class="fas fa-sign-in-alt"></i> Login </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <?php $this->content() ?>
        
    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase">Projeto Gerações - PDS 2019</h5>
          <p>Desenvolvido pelas turmas dos 4º's Anos 419 e 420. </p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!">Link 1</a>
              </li>
              <li>
                <a href="#!">Link 2</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!">Link 1</a>
              </li>
              <li>
                <a href="#!">Link 2</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">©2019 Todos os Direitos Reservados:
      <a href="https://www.sites.google.com/site/blromano/pds2014"> PDS 2019 </a>
    </div>
    <!-- Copyright -->

    </footer>
    <!-- Footer -->
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
    </body>
</html>

