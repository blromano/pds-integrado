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
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger">9+</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
          <span class="badge badge-danger">7</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav bg-dark">
      <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Painel Administrativo</span>
        </a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i>
          <span>Usuários</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="">Responsáveis</a>
          <a class="dropdown-item" href="">Perfis de Acesso</a>
          <a class="dropdown-item" href="">Efetuar Login</a>
          <a class="dropdown-item" href="">Recuperar Senha</a>
          <a class="dropdown-item" href="">Ajuda</a>
        </div>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-list-alt" aria-hidden="true"></i>
          <span>Prontuários</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="">Idosos</a>
        </div>
      </li>
       <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-bath" aria-hidden="true"></i>
          <span>Cuidados Diários</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="">Sinais Vitais</a>
          <a class="dropdown-item" href="">Diurese e Evacuação</a>
          <a class="dropdown-item" href="">Cuidados Diários</a>
        </div>
      </li>
       <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-plus-square" aria-hidden="true"></i>
          <span>Prescrições Médicas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="">Patologias</a>
          <a class="dropdown-item" href="">Medicamentos</a>
          <a class="dropdown-item" href="">Vacinas</a>
          <a class="dropdown-item" href="">Prescrições Médicas</a>
          <a class="dropdown-item" href="">Patologias por Idoso</a>
          <a class="dropdown-item" href="">Registro de Incidentes</a>
          <a class="dropdown-item" href="">Análise Clínica</a>
        </div>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-utensils"></i>
          <span>Nutrição</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="">Alimentos</a>
          <a class="dropdown-item" href="">Planos Alimentares</a>
          <a class="dropdown-item" href="">Amostras Alimentares</a>
          <a class="dropdown-item" href="">Consultas Nutricionais</a>
        </div>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-running"></i>
          <span>Atividades Físicas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="/md7/CadastrarAtividadeFisica">Cadastrar Atividade Física</a>
          <a class="dropdown-item" href="/md7/CadastrarAtividadeRecreativa">Cadastrar Atividade Recreativa</a>
          <a class="dropdown-item" href="/md7/CadastrarTreinamentoFisico">Cadastrar Treinamento Fisico</a>
          <a class="dropdown-item" href="/md7/CadastrarConsultaIdosos">Cadastrar Consulta do idoso</a>
          <a class="dropdown-item" href="/md7/CadastrarPlanejamentoMensal">Cadastrar planejamento das Atividades Recreativas</a>
          <a class="dropdown-item" href="/md7/ListarAtividadeFisica">Listar Atividade Física</a>
          <a class="dropdown-item" href="/md7/ListarAtividadeRecreativa">Listar Atividade Recreativa</a>
          <a class="dropdown-item" href="/md7/ListarTreinamentoFisico">Listar Treinamento Físico idoso</a>
          <a class="dropdown-item" href="/md7/ListarConsultas">Listar Consulta</a>
          <a class="dropdown-item" href="/md7/ListarPlanejamentoMensal">Listar Planejamento Mensal</a>     
          <a class="dropdown-item" href="/md7/ListarEducadoresFisicosFisioterapeuta">Listar Profissionais</a>     
       
        </div>
    
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-tie"></i>
          <span>Gestão</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="">Limpeza</a>
          <a class="dropdown-item" href="">Funcionários e Salários</a>
          <a class="dropdown-item" href="">Custos de Serviços</a>
          <a class="dropdown-item" href="">Custos de Estadia</a>
          <a class="dropdown-item" href="">Controle de Caixa</a>
        </div>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-chart-line"></i>
          <span>Relatórios</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="">Gráficos</a>
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
