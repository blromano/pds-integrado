<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Peso Ideal e IMC</title>
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
		<script>
		alert("Peso e altura não cadastrados, clique em OK e atualize agora");
		</script>
        <!--Corpo do texto ---> 
        <div class="container" role="main" style="height: 100%;width: 100%; padding:5%; float:left; min-height: 100%" >
            <div class="page-header">
            <h1 style='color:#104999'>Peso Ideal e IMC</h1>
            </div>
            <h2> Seu Peso Ideal é de - </h2>
            
            <div class="table-responsive">
                <form method="post"  id="tabela" style="display: none;">
                <h2> Seu IMC é 21,98 </h2>
                <table class="table table-condensed  table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Categoria</th>
                            <th scope="col">IMC</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> Abaixo do Peso</td>
                            <td> Abaixo de 18.4</td>
                        </tr>
                        <tr bgcolor="greenyellow">
                            <td style="color:black"> Peso Normal</td>
                            <td style="color:black"> De 18.5 - 24.9</td>
                        </tr>
                        <tr>
                            <td> Sobrepeso </td>
                            <td> De 25.0 - 29.9</td>
                        </tr>
                        <tr>
                            <td> Obesidade Grau I</td>
                            <td> De 30.0 - 34.9 </td>
                        </tr>
                        <tr>
                            <td> Obesidade Grau II</td>
                            <td> De 35.0 - 39.9 </td>
                        </tr>
                        <tr>
                            <td> Obesidade Grau III</td>
                            <td> Acima de 40 </td>
                        </tr>
                    
                    <tr>
                        <th scope="row">Sua Categoria:</th>
                        <td>Peso Normal</td>
                    </tr>
                   
                    </tbody>
                </table>
                </form>
                <div style="width: 100%;height: 50%;text-align:center;clear:both">
                        <button onclick="mostrar('tabela')" class="btn btn-primary">Mostrar IMC e tabela de pesos ideais</button>
                </div>
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
    <!-- Modal 1-->
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Tem certeza que deseja que deseja enviar a refeição?</h4>
                    </div>
                    <div style="font-family: Verdana"class="modal-footer">
                        <a href="diario_bordo.php"><button type="button" class="btn btn-success">Sim, desejo enviar!</button>

                        </a> 
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não,quero cancelar!</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- footer
        ================================================== -->
    <footer>

            <div class="footer-main" style="text-align: center; clear: both; margin-bottom: 0px ">

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
 
        </footer>  
    </body>
</html>

