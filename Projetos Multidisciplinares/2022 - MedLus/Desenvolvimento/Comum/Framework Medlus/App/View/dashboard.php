<?php

//session_start();

if (!isset($_SESSION['tipo'])) {
    $_SESSION['tipo'] = $_GET['tipo'];
} else {
    session_unset();
}

?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MedLus - <?php echo $this->getView()->title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="../resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <!-- Custom styles for this template-->
    <link href="../resources/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../resources/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="../resources/css/Style.css" rel="stylesheet">

    <!-- Inclui JQuery -->
    <script src="../resources/vendor/jquery/jquery.min.js"></script>

     <!-- Sweet alert CDN -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Error CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TimelineMax.min.js"></script> 
    <script src="https://assets.codepen.io/16327/SplitText3.min.js"></script>


    
</head>

<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-med sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo "$local" ?>home.php">
                <div class="sidebar-brand-icon p-2">
                    <img src="../resources/img/logo.png" alt="Logotipo" class="img-responsive w-100">
                </div>
                <div class="sidebar-brand-text mx-1">MedLus</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo "$local" ?>home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="text-white">Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Cadastros
            </div>

            <!-- Nav Item - Cadastros e Listagens -->

            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span class="text-white">Cadastros</span>
                </a>
                <div id="collapseTwo" class="collapse <?php if ($pagina == "paciente" || $pagina = "cadastroPaciente") echo 'show'; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <?php if ($_SESSION['tipo'] == "secretario") { ?>
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pacientes</h6>
                            <a class="collapse-item" href="./pacientes">Pacientes</a> <!--  Lista os pacientes e o proprio paciente n pode ver -->
                            <a class="collapse-item" href="./pacientes/cadastrar">Cadastrar Paciente</a>
                        </div>
                    <?php } ?>
                    <?php if ($_SESSION['tipo'] == "paciente") { ?>
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Dependente</h6>
                            <a class="collapse-item" href="">Dependentes</a> <!-- mudar aqui depois que criar as index -->
                            <a class="collapse-item" href="">Cadastrar Dependente</a> <!-- mudar aqui depois que criar as index -->
                        </div>
                    <?php } ?>
                    <?php if ($_SESSION['tipo'] == "secretario") { ?>
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Funcionário</h6>
                            <a class="collapse-item" href="./funcionario/ListarFuncionario">Funcionários</a> <!-- lista os funcionários cadastrados -->
                            <a class="collapse-item" href="/funcionario/cadastrar">Cadastrar Funcionário</a>
                        </div>
                    <?php } ?>
                    <?php if ($_SESSION['tipo'] == "secretario") { ?>
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Planos</h6>
                            <a class="collapse-item" href="/planosmedicos">Planos</a> <!-- Listagem dos Planosa -->
                            <a class="collapse-item" href="/planosmedicos/cadastrar">Cadastrar Planos</a> <!-- Cadastro dos Planos -->
                        </div>
                    <?php } ?>
                    <?php if ($_SESSION['tipo'] == "enfermeiro") { ?>
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Remédios</h6>
                            <a class="collapse-item" href="../remedios">Remédios</a> <!-- Listagem dos remédios -->
                            <a class="collapse-item" href="../remedios/cadastrar">Cadastrar Remédios</a>
                            <a class="collapse-item" href="../tiposRemedios">Tipo de Remédios</a> <!-- Listagem dos tipos de remédios -->
                            <a class="collapse-item" href="../tiposRemedios/cadastrar">Cadastrar Tipo de Remédio</a>
                        </div>
                    <?php } ?>
                </div>
            </li>

            <!-- Nav Item - Agendamento Consulta Online -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-cog"></i>
                    <span class="text-white">Agendamentos</span>
                </a>
                <div id="collapseThree" class="collapse <?php if ($pagina == "paciente" || $pagina = "cadastroPaciente") echo 'show'; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <?php if ($_SESSION['tipo'] == "paciente") { ?>
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Consulta Online</h6>
                            <a class="collapse-item" href="/triagemonline">Triagem Online</a> <!-- triagem (paciente) -->
                            <a class="collapse-item" href="/solicitacoesOnline/cadastrar">Agendar Consulta Online</a> <!-- solicita consulta (paciente) -->
                        </div>
                    <?php } ?>
                    <?php if ($_SESSION['tipo'] == "secretario") { ?>
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Consulta Online</h6>
                            <a class="collapse-item" href="/consultasOnline/cadastrar">Cadastrar Consulta Online</a> <!-- cadastra a consulta (secretária) -->
                            <a class="collapse-item" href="/solicitacoesOnline">Solicitações Consulta Online</a> <!-- Lista as solicitações de consulta (secretário) -->
                        </div>
                    <?php } ?>
                </div>
            </li>
            </li>

            <!-- Nav Item - Exames -->
            <li class="nav-item ">
                <div id="collapseThree" class="collapse <?php if ($pagina == "exame" || $pagina = "solicitarExame") echo 'show'; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <?php if ($_SESSION['tipo'] == "paciente") { ?>
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Exames</h6>
                        <a class="collapse-item" href="/exame/meusexames">Meus Exames</a> <!-- lista os exames do paciente pro próprio paciente -->
                        <a class="collapse-item" href="/exame/solicitar">Solicitar Exames</a> <!-- paciente e médico solicitam exames -->
                    </div>
                    <?php } ?>
                    <?php if ($_SESSION['tipo'] == "medico") { ?>
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Exames</h6>
                        <a class="collapse-item" href="/exame/solicitar">Solicitar Exames</a> <!-- paciente e médico solicitam exames -->
                        <a class="collapse-item" href="/exame/listarexame">Exames</a> <!-- lista os exames do paciente para o médico -->
                    </div>
                    <?php } ?>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

               <!-- Main Content -->  
               <?php if($_SERVER['REQUEST_URI'] == '/error502'){
                echo '<div id="content_erro">';
            } else {
                echo '<div id="content">';
            }?>


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-med" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../resources/img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../resources/img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../resources/img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Renata</span>
                                <img class="img-profile rounded-circle" src="../resources/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../mod1/Perfil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Deseja realmente Encerrar Seção?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Selecione "Logout" se realmente deseja encerrar seção.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-med" href="../Login.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php $this->content(); ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; MedLus <?php echo date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../resources/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../resources/js/sb-admin-2.min.js"></script>


    <!-- Page level plugins -->
    <script src="../resources/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../resources/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../resources/js/demo/datatables-demo.js"></script>

    <script src="../resources/js/modulo1.js"></script>

     <!-- Page level custom scripts -->
     <script src="../resources/js/demo/error-demo.js"></script>

    <!-- <script src="../resources/js/SplitTextPlugin.min.js"></script> 
    <script src="../resources/js/TweenMax.min.js"></script>
    <script src="../resources/js/TimelineMax.min.js"></script> -->


</body>

</html>