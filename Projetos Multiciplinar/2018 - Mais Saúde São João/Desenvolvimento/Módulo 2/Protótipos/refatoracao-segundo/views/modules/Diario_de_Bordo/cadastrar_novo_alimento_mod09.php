<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Mais Saúde São João - Gerir Diário de Bordo</title>
        <script src="bower_components/jquery/dist/jquery.js" charset="utf-8"></script>
        <script src="bower_components/popper.js/dist/umd/popper.js" charset="utf-8"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.js" charset="utf-8"></script>
        <script src="scripts/animations.js" charset="utf-8"></script>
        <link rel="stylesheet" href="custom-css/build/mssj-stye.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent-darker fixed-top">
                <div class="container-fluid">
                        <!-- <img class="position-absolute h-75 d-inline-block" src="resources/images/logo-texto.png" alt="logo_texto"> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active border-bottom border-danger" id="link-intro">
                                <a class="nav-link" href="#intro">Inicio </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">O que é?</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#process">Como funciona?</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#team">Quem somos?</a>
                            </li>
                            <li class="nav-item clearfix border mx-2"></li>
                            <li class="nav-item">
                                <a class="nav-link text-success font-weight-bold" href="gerir_diario_de_bordo.php">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-danger font-weight-bold" href="">Registrar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <section id='intro' class='bg-light'>
            <div class="shadow-overlay"></div>
            <div class="container-fluid">
                <div class="row full-height">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="container mx-auto">
                                <div class="row">
                                    <img src="resources/images/Logo_Final v3.png" alt="logo" class='img-fluid mx-auto'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class='bg-light'>
            <div class="container-fluid">
                <div class="row">
                    <div class="container text-center p-5">
                        <?php include("./views/about.php"); ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="process" class='bg-light'>
            <div class="container-fluid">
                <div class="row">
                    <div class="container text-center p-5">
                        <?php include("./views/process.php"); ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="team" class='bg-light'>
            <div class="container-fluid">
                <div class="row">
                    <div class="container text-center p-5">
                        <?php include("./views/team.php"); ?>
                    </div>
                </div>
            </div>
        </section>

        <div class='bg-darker py-2 text-center text-light container-fluid text-sm'>
            <div class="row">
                <div class="container mx-auto">
                    <small>© 2018 - Todos os Direitos Reservados - Mais Saúde São João</small>
                    <br>
                    <small>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo - Campus São João da Boa Vista</a></small>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </body>
</html>
