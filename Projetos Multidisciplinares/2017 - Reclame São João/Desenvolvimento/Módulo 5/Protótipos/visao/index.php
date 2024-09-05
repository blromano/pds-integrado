<!DOCTYPE html>
<html>
    <head>
        <?php
        $pagina = 1;
        if ($_GET) {
            if (!empty($_GET["pagina"])) {
                $pagina = intval($_GET["pagina"]);
                if ($pagina == 1)
                    echo "<title>Gerenciamento - Dashboard</title>";
                elseif ($pagina == 2)
                    echo "<title>Gerenciamento - Reclamações</title>";
                elseif ($pagina == 3)
                    echo "<title>Gerenciamento - Respostas</title>";
                elseif ($pagina == 4)
                    echo "<title>Gerenciamento - Denúncias</title>";
                elseif ($pagina == 5)
                    echo "<title>Gerenciamento - Usuários/Clientes</title>";
                elseif ($pagina == 6)
                    echo "<title>Gerenciamento - Usuários/Estabelecimentos</title>";
                elseif ($pagina == 7)
                    echo "<title>Gerenciamento - Usuários/Staff</title>";
                elseif ($pagina == 8)
                    echo "<title>Gerenciamento - Usuários/Banidos</title>";
                elseif ($pagina == 9)
                    echo "<title>Gerenciamento - Categorias/Reclamações</title>";
                elseif ($pagina == 10)
                    echo "<title>Gerenciamento - Categorias/Estabelecimentos</title>";
                elseif ($pagina == 11)
                    echo "<title>Gerenciamento - Categorias/Produtos e Serviços</title>";
                elseif ($pagina == 12)
                    echo "<title>Gerenciamento - Mensagens/Recebidas</title>";
                elseif ($pagina == 13)
                    echo "<title>Gerenciamento - Mensagens/Respondidas</title>";
            }else {
                $pagina = 1;
            }
        } else {
            echo "<title>Gerenciamento - Dashboard</title>";
            //header("Location: index.php");
        }
        ?>
        <meta charset="utf-8">

        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


        <!-- Boostrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://bootswatch.com/3/paper/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- DataTables  -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

        <!-- Customizacao -->
        <link rel="stylesheet" href="css/estilo.css"> <!-- Boostrap -->
        <script src="js/dataTable.js"></script> <!-- DataTable -->
		
		<!-- Boostrap form validator -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="#">Administração</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="badge"><span class="glyphicon glyphicon-bell"></span> 2</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">Você possui 2 notificações!</li>
                                <li><a href="#">Nova resposta de Marcelo</a></li>
                                <li><a href="#">Denuncia de Carol</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Admin <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><span class="glyphicon glyphicon glyphicon-cog"></span> Meu Perfil</a></li>
                                <li class="divider"></li>
                                <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <ul class="nav nav-tabs nav-justified">
                <li <?php if ($pagina == 1) echo 'class="active"'; ?>>
                    <a href="?pagina=1"><span class="fa fa-tachometer" aria-hidden="true"></span> Dashboard</a>
                </li>
                <li <?php if ($pagina == 2) echo 'class="active"'; ?>>
                    <a href="?pagina=2"><span class="fa fa-fire" aria-hidden="true"></span> Reclamações</a>
                </li>
                <li <?php if ($pagina == 3) echo 'class="active"'; ?>>
                    <a href="?pagina=3"><span class="fa fa-reply" aria-hidden="true"></span> Respostas</a>
                </li>
                <li <?php if ($pagina == 4) echo 'class="active"'; ?>>
                    <a href="?pagina=4"><span class="glyphicon glyphicon-flag"></span> Denúncias</a>
                </li>
                <li <?php echo ($pagina == 5 || $pagina == 6) || ($pagina == 7) || ($pagina == 8) ? 'class="dropdown active"' : 'class="dropdown"'; ?>>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Usuários
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li <?php if ($pagina == 5) echo 'class="active"'; ?>>
                            <a href="?pagina=5">Clientes</a>
                        </li>
                        <li <?php if ($pagina == 6) echo 'class="active"'; ?>>
                            <a href="?pagina=6">Estabelecimentos</a>
                        </li>
                        <li <?php if ($pagina == 7) echo 'class="active"'; ?>>
                            <a href="?pagina=7">Administradores</a>
                        </li>
                        <li <?php if ($pagina == 8) echo 'class="active"'; ?>>
                            <a href="?pagina=8">Banidos</a>
                        </li>
                    </ul>
                </li>
                <li <?php echo ($pagina == 9 || $pagina == 10) || ($pagina == 11) ? 'class="dropdown active"' : 'class="dropdown"'; ?>>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-bookmark"></span> Categorias
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li <?php if ($pagina == 9) echo 'class="active"'; ?>>
                            <a href="?pagina=9">Reclamações</a>
                        </li>
                        <li <?php if ($pagina == 10) echo 'class="active"'; ?>>
                            <a href="?pagina=10">Estabelecimentos</a>
                        </li>
                        <li <?php if ($pagina == 11) echo 'class="active"'; ?>>
                            <a href="?pagina=11">Produtos e Serviços</a>
                        </li>
                    </ul>
                </li>
                <li <?php echo ($pagina == 12 || $pagina == 13) ? 'class="dropdown active"' : 'class="dropdown"'; ?>>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-envelope" aria-hidden="true"></span> Mensagens
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li <?php if ($pagina == 12) echo 'class="active"'; ?>>
                            <a href="?pagina=12">Recebidas</a>
                        </li>
                        <li <?php if ($pagina == 13) echo 'class="active"'; ?>>
                            <a href="?pagina=13">Respondidas</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--<hr>-->
        <div class="container">
            <?php
            if ($pagina == 1)
                include("paginas/01-dashboard.php");
            elseif ($pagina == 2)
                include("paginas/02-reclamacoes.php");
            elseif ($pagina == 3)
                include("paginas/03-respostas.php");
            elseif ($pagina == 4)
                include("paginas/04-denuncias.php");
            elseif ($pagina == 5)
                include("paginas/05-usuariocliente.php");
            elseif ($pagina == 6)
                include("paginas/06-usuarioempresa.php");
            elseif ($pagina == 7)
                include("paginas/07-usuarioadministrador.php");
            elseif ($pagina == 8)
                include("paginas/08-usuariobanido.php");
            elseif ($pagina == 9)
                include("paginas/09-categoriareclamacao.php");
            elseif ($pagina == 10)
                include("paginas/10-categoriaempresa.php");
            elseif ($pagina == 11)
                include("paginas/11-categoriaprodutoseservicos.php");
            elseif ($pagina == 12)
                include("paginas/12-mensagensrecebidas.php");
            elseif ($pagina == 13)
                include("paginas/13-mensagensrespondidas.php");
            ?>

        </div>
    </body>
</html>