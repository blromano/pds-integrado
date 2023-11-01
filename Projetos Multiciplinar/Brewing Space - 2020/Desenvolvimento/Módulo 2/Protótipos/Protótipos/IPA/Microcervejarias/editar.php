<?php
session_start();
require_once('../../conexao/request.class.php');

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        

        $id = $_SESSION['id'];
        $id_microcervejaria = $_GET['id'];

        $conexao = new Receita();

        $usuario = $conexao->infoUser($id);
        $microcervejaria = $conexao->infoMicrocervejaria($id_microcervejaria);
        $redes_sociais = explode(',', $microcervejaria->MIC_REDES_SOCIAIS);

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
                        Editar Microcervejarias
                    </div>
                    <div class="card-body">
                        <form method="POST" action="edit.php">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input style="display: none;" type="text" name="id_micro" value="<?php echo $id_microcervejaria;?>">
                                    <label for="inputNome">Foto</label>
                                    <input type="text" class="form-control" name="foto" required autofocus value="<?php echo $microcervejaria->MIC_FOTO?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCpf">CNPJ da empresa</label>
                                    <input type="text" class="form-control" name="cnpj"  value="<?php echo $microcervejaria->MIC_CNPJ?>" required disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Nome da microcervejaria</label>
                                    <input type="text" class="form-control" name="nome_empresa" value="<?php echo $microcervejaria->MIC_NOME?>" required>
                                </div>
                            </div>

                            <hr/>

                            <h4>Ingredientes</h4><br/>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Endereço da microcervejaria</label>
                                    <input type="text" class="form-control" name="endereco" value="<?php echo $microcervejaria->MIC_ENDERECO?>" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Telefone da microcervejaria</label>
                                    <input type="text" class="form-control" name="telefone" value="<?php echo $microcervejaria->MIC_TELEFONE?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" value="<?php echo $redes_sociais[0]?>" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Instagram</label>
                                    <input type="text" class="form-control" name="instagram" value="<?php echo $redes_sociais[1]?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Twitter</label>
                                    <input type="text" class="form-control" name="twitter" value="<?php echo $redes_sociais[2]?>" required>
                                </div>
                            </div>

                            <hr/>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <h4>Descrição da microcervejaria</h4><br/>
                                    <textarea class="form-control" name="desc_empresa" rows="10" required><?php echo $microcervejaria->MIC_DESCRICAO?></textarea>
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
