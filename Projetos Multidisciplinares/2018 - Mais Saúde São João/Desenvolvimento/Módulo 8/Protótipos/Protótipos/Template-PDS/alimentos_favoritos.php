<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Alimentos Favoritos</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <link href="css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <!--- basic page needs
  ================================================== -->
        <meta charset="utf-8">
        <title>Mais Saúde São João</title>

        <!-- mobile specific metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
   ================================================== -->
        <link rel="stylesheet" href="css/base.css">  
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/vendor.css">     

        <!-- script
        ================================================== -->
        <script src="js/modernizr.js"></script>

        <!-- favicons
             ================================================== -->
        <link rel="icon" type="image.png" href="favicon.png">

    </head>
    <body style="background-color:white">
        <script>
            function mostrar(elemento){
  var display = document.getElementById(elemento).style.display;
    if(display == "none"){
        document.getElementById(elemento).style.display = 'block';
    }else{
        document.getElementById(elemento).style.display = 'none';
    }    
}
        </script>
        <header class="sticky">

            <div class="row">


                <nav id="main-nav-wrap">
                    <ul class="main-navigation">
                        <li class="current"><a class="smoothscroll"  href="#intro" title="">Início</a></li>
                        <li><a class="smoothscroll"  href="att.php" title="">Atualizar</a></li>
                        <li><a class="smoothscroll"  href="#" data-toggle="modal" data-target="#myModal2">Excluir </a></li>
                        <li><a class="smoothscroll"  href="lista.php" title="">Lista de Usuários</a></li> 	
                        <li><a  href="#" title="">Rede Social</a></li> 
                        <li><a  href="diario_bordo.php" title="">Diário de Bordo</a></li> 
                        <li class="highlight with-sep"><a href="index.php" title="">Inicio</a></li>
                        <li class="highlight "><a href="index.php" title="">Sair</a></li>
                    </ul>
                </nav>



            </div>   	

        </header>
        <div class="container-fluid">

        <!--Corpo do texto ---> 
        <div class="container" role="main" style="height: 100%;width: 100%; padding:5%; float:left; min-height: 100%" >
            <!-- Lista de Alimentos Favoritos
        ================================================== -->
            <div class="page-header">
            <h1 style='color:#104999'> Lista de Alimentos Favoritos</h1>
            </div>
             
            <div class="table-responsive">
                <table class="table table-condensed  table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome do Alimento</th>
                            <th scope="col">Favorito</th>
                            <th scope="col">Mais Informações </th>
                        </tr>
                    </thead>
                    <tbody>
                    <img src="" alt=""/>
                    <th scope="row">1</th>
                    <td> <a href="#" data-toggle="modal" data-target="#myModal2"><span style="color: red">X</span></a> Maça</td>
                    <td> 
                        <img src="images/estrela (mouse).png" alt="">
                    </td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#myModal4">
                        <img src="images/icone mais novo.png" alt="Mais Informações"/>
                        </a>
                    </td>
                    
                    <tr>
                        <th scope="row">2</th>
                        <td> <a href="#" data-toggle="modal" data-target="#myModal2"><span style="color: red">X</span></a> Chocolate</td>
                        <td>
                            <img src="images/estrela (mouse).png" alt=""/>
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#myModal4">
                            <img src="images/icone mais novo.png" alt="Mais Informações"/>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                
                <div style="width: 100%;height: 50%;text-align:center;clear:both">
                        <button onclick="mostrar('tabela')" class="btn btn-primary">Adicionar Alimentos Favoritos</button>
                </div>
            </div>
            <!-- Adicionar Alimentos Favoritos
        ================================================== -->
            <div class="table-responsive">
                <form method="post"  id="tabela" style="display: none;">
                    <div class="page-header" >
					<input type="text" style="text-align:center" name="procurar_alimento" placeholder="Procurar Alimento Pré-Cadastrado" required="Informe o nome do alimento que você deseja buscar">
					<input type="submit" name="buscar" value="Buscar"> 
					</div>
					<div class="page-header">
                        <h1 style='color:#104999'> Alimentos Pré Cadastrados</h1>
                    </div>
                    <div class="table-responsive">
                <table class="table table-condensed  table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome do Alimento</th>
                            <th scope="col"> Adionar aos favoritos</th>
                            <th scope="col">Mais Informações </th>
                        </tr>
                    </thead>
                    <tbody>
                    <img src="" alt=""/>
                    <th scope="row">1</th>
                    <td>Pêra</td>
                    <td> 
                        <a href="#" data-toggle="modal" data-target="#myModal3">
                            <img src="images/estrela.png" 
                            onMouseOver="this.src='images/estrela (mouse).png'"
                            onMouseOut="this.src='images/estrela.png'"
                            >
                        </a>
                    </td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#myModal4">
                        <img src="images/icone mais novo.png" alt="Mais Informações"/>
                        </a>
                    </td>
                    
                    
                    <tr>
                    <th scope="row" colspan="4" style="text-align: center"><a href="add_novo_alimento.php"> Novo Alimento Favorito </a></th>
                    </tr>
                   
                    </tbody>
                </table>
                
                <div style="width: 100%;height: 50%;text-align:center;clear:both">
                        <button onclick="mostrar('tabela')" class="btn btn-primary">Recolher</button>
                </div>
            </div>
                </form>
            </div>
        </div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>


        <?php
        $situacao_usuario = "logado";
        if ($situacao_usuario == "logado") {
            ?>
            <script>
                $(document).ready(function () {
                    $('#myModal').modal('show');
                });
            </script>
        <?php } ?>
        </div>
    <!-- Modal 2-->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja que deseja excluir o alimento?</h4>
                    </div>
                    <div style="font-family: Verdana"class="modal-footer">
                        <a href="#"><button type="button" class="btn btn-danger">Sim, desejo excluir!</button>

                        </a> 
                        <button type="button" class="btn btn-success" data-dismiss="modal">Não,quero cancelar!</button>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- Modal 3 Alimento Favorito Adicionado com Sucesso-->
        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Alimento Adicionado com sucesso!</h4>
                    </div>
                    <div style="font-family: Verdana"class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- Modal 4 Mais Informações Sobre o Alimento-->
        <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Nome: Pêra</h4>
                        <h4 class="modal-title" id="myModalLabel">Calorias: 10 kcal</h4>
                        <h4 class="modal-title" id="myModalLabel">Gorduras: Nenhuma</h4>
                    </div>
                    <div style="font-family: Verdana"class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- footer
        ================================================== -->
    <footer>

            <div class="footer-main" style="text-align: center; clear: both; ">

                <div class="row">

                    <div class="col-twelve">
                        <div class="copyright">
                            <span>© Copyright Mais Saúde São João 2018. | <br></span> 
                            <span>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo Campus São João da Boa Vista</a></span>		         	
                        </div>

                        <div id="go-top" style="display: block;">
                            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon ion-android-arrow-up"></i></a>
                        </div>         
                    </div>

                </div> <!-- /footer-bottom -->     	

            </div>
</div> 
        </footer>  
    </body>
</html>
