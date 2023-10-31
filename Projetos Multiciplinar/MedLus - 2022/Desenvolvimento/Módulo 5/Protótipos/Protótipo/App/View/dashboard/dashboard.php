<!DOCTYPE html>
<html>
<head>
  <title>DASHBOARD</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="<?php echo $this->view->include; ?>resources/img/logo.png" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="<?php echo $this->view->include; ?>resources/css/estilo2.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>  

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo $this->view->include; ?>resources/js/roteiro.js"></script>

</head>
<body class="fundo-dash">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 p-0">
                    <div id="nav-side-menu">
                        <div class="brand p-2 text-center">
                            <a href="/painel-controle">
                                <img class="img-fluid" src="<?php echo $this->view->include ?>resources/img/logo.png" alt="logotipo">
                            </a>
                        </div>                        
                        <nav class="nav flex-column text-secondary dash">
                            <a class="nav-link text-secondary" href="/painel/usuario"><span class="far fa-user sidebar-icon"></span> Usuários</a>
                            <a class="nav-link text-secondary" href="/painel/dados"><span class="far fa-address-card sidebar-icon"></span> Meus Dados</a>
                            <a class="nav-link text-secondary link-sair" href="/usuario/logout"><span class="fas fa-sign-out-alt sidebar-icon"></span> Sair</a>
                        </nav>
                    </div>
                </div>
                <div class="col-md-10">
                    <?php $this->content(); ?>
                </div>
            </div>
        </div>
        
    </body>
</html>
