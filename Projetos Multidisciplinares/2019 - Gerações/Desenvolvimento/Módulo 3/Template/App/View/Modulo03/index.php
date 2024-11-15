<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="<?php echo $this->view->include ?>resources/img/favico.ico" />
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Projeto Gerações</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo $this->view->include ?>resources/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?php echo $this->view->include ?>resources/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo $this->view->include ?>resources/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/dashboard"><img src="<?php echo $this->view->include ?>resources/img/logo_2.png" alt=""></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav bg-dark">
      <li class="nav-item active">
          <a class="nav-link" href="/md3/financas">
         <i class="fas fa-dollar-sign"></i>
          <span>Finanças</span>
        </a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-list-alt"></i>
          <span>Categorias</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="/md3/SinaisVitais">Sinais Vitais</a>
          <a class="dropdown-item" href="/md3/Eliminacao">Eliminação</a>
          <a class="dropdown-item" href="/md3/CuidadosDiarios">Cuidados Diários</a>
          <a class="dropdown-item" href="/md3/Higiene">Higiene</a>
          <a class="dropdown-item" href="/md3/EvolucaoDiaria">Evolução Diária</a>
          <a class="dropdown-item" href="/md3/PatologiasPrescricoes">Patologias e Prescrições Médicas</a>
          <a class="dropdown-item" href="/md3/PadraoAlimentar">Padrão Alimentar</a>
          <a class="dropdown-item" href="/md3/AtividadesRecreativas">Atividades Recreativas</a>
        </div>
      </li>
    </ul>
    
    <?php $this->content() ?>
    
    <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="footer-copyright text-center py-3">©2019 Todos os Direitos Reservados:
                <a href="https://www.sites.google.com/site/blromano/pds2014"> PDS 2019 </a>
            </div>
        </div>
      </footer>


  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tem certeza de que deseja sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione a opção "Logout" abaixo para encerrar sua sessão.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="/">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo $this->view->include ?>resources/jquery/jquery.min.js"></script>
  <script src="<?php echo $this->view->include ?>resources/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo $this->view->include ?>resources/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?php echo $this->view->include ?>resources/chart.js/Chart.min.js"></script>
  <script src="<?php echo $this->view->include ?>resources/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo $this->view->include ?>resources/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo $this->view->include ?>resources/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="<?php echo $this->view->include ?>resources/js/demo/datatables-demo.js"></script>
  <script src="<?php echo $this->view->include ?>resources/js/demo/chart-area-demo.js"></script>

</body>

</html>

