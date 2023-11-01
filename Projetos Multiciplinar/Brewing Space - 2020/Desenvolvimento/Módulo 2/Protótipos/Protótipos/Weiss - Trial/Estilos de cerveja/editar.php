<?php
session_start();
require_once('../../conexao/request.class.php');

$_SESSION['id'] = 1;
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        

        $id = $_SESSION['id'];
        $id_estilo = $_GET['id'];

        $conexao = new Receita();

        $estilo = $conexao->infoEstilo($id_estilo);
    }else{
        header("Location: index.php");
    }


}else {
    header("Location: ../../usuario/index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Brewing Space</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="includes/css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container-fluid">
                    
                    <a href="#" class="navbar-brand">
                        <img class="logo" src="includes/img/Logo-2-Transparente.png">
                    </a>
                    
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="nav-principal">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">Início</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ml-3">Dúvidas</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ml-3">Planos</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="#" class="btn btn-outline-light">Bem-Vindo, Administrador</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>               
            </nav>            
        </header>
        <main>
            <div class="container content-main">
                <div class="card">
                    <div class="card-header">
                        Editar Estilos de Cerveja
                    </div>
                    <div class="card-body">
                        <form method="POST" action="edit.php">
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <input style="display: none;" type="text" name="id_estilo" value="<?php echo $id_estilo;?>">
                                    <label for="inputNome">Nome do Estilo</label>
                                    <input type="text" class="form-control" name="nome" value="<?php echo $estilo->EST_NOME?>" required autofocus>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCpf">ABV Min</label>
                                    <input type="text" class="form-control" name="abv_min"  value="<?php echo $estilo->EST_ABVMIN?>%" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">ABV Max</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="abv_max"  value="<?php echo $estilo->EST_ABVMAX?>%" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">EBC Min</label>
                                    <input type="text" class="form-control" name="ebc_min" value="<?php echo $estilo->EST_EBCMIN?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">EBC Max</label>
                                    <input type="text" class="form-control" name="ebc_max" value="<?php echo $estilo->EST_EBCMAX?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">IBU Recomendada</label>
                                    <input type="text" class="form-control" name="ibu_rec" value="<?php echo $estilo->EST_IBU_RECOMENDADO?>" required>
                                </div>
                                
                            </div>
                            <br/>

                            <input type="submit" value="Confirmar" name="enviar" class="btn btn-primary active" role="button" aria-pressed="true">
                                <a href="index.php" class="btn btn-secondary active" role="button" aria-pressed="true">Cancelar</a>
                            
                        </form>
                    </div>
                </div>
            </div>
            
        </main>
        


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
        <footer class="mt-5">
            <div class="container-fluid bg-dark">
                <div class="row">
                    <div class="col">
                        <p class="lead text-center text-white">
                            © Copyright 4° ano de infomática do ano de 2020. Todos os Direitos Reservados.
                        </p>
                    </div>
                </div>
            </div>
        </footer>  
        
    </body>
</html>
