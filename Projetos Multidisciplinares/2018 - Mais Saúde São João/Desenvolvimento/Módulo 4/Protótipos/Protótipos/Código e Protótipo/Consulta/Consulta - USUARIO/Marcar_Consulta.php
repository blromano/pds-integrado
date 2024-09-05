<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pesquisar Educador Físico</title>
        <link rel="icon" type="image/png" href="favicon.png">
        <link href="css/bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
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
        <header class="sticky">

            <div class="row">


                <nav id="main-nav-wrap">
                    <ul class="main-navigation">
                        <li><a class="smoothscroll"  href="#intro" title="">Início</a></li>
                        <li><a class="smoothscroll"  href="att.php" title="">Atualizar</a></li>
                        <li class="current"><a class="smoothscroll"  href="att.php" title="">Marcar Consulta</a></li>
                        <li><a class="smoothscroll"  href="#" data-toggle="modal" data-target="#myModal2">Excluir </a></li>
                        <li><a class="smoothscroll"  href="lista.php" title="">Lista de Usuários</a></li> 
                        <li><a class="smoothscroll"  href="PesquisarEducador.php" title="">Pesquisar Educador</a></li>
                        <li><a  href="#" title="">Rede Social</a></li> 
                        <li class="highlight with-sep"><a href="index.php" title="">Inicio</a></li>
                        <li class="highlight "><a href="index.php" title="">Sair</a></li>
                    </ul>
                </nav>
            </div>   	

        </header>
        <div class="container-fluid">

        <!--Corpo do texto ---> 
<div class="container" role="main" style="height: 100%;width: 100%; padding:5%; float:left; min-height: 100%" >
            <br/>
            <br/>
<div class="tabcontent p-md-4">
    <h3>Agendar consulta</h3> 

    <form action="agendarconsulta.php" method="post" class="container my-4">
        <div class="row form-group">
            <h4>Título da Consulta</h4>
            <input class="form-control" type="text" name="nomeconsulta" style="height: 30%; font-size: 12px;">
            <br/>
            <h4>Data e Hora </h4>
              <input type="date" name="diaconsulta" style="margin-left: 10%; height:30%;"> <input type="time" name="usr_time" style="height: 30%;margin-left: 5%;"><br/>
        <br>
        <br>
        </div>
        <div>
            <h3>Detalhes do evento</h3>
       <div class="row form-group">
            <h4>Local</h4>
        <input class="form-control" type="text" name="nomeconsulta" style="height: 5%;font-size: 15px;" value="Pronto Socorro" disabled>
            <h4>Adicionar notificação</h4>
                    <select id="options" name="filto_um" class="form-control" style="width: 30%;font-size: 12px; margin-left: 2%; margin-top: 0.2%;">
                        <option value="1">Notificação</option>
                        <option value="2">E-mail</option>
                    </select>
                    <input type="number" name="quantity" value="10" min="10" style="width: 10%; height: 10%;margin-left: 2%;">
                    <select id="options" name="filto_um" class="form-control" style="width: 30%;font-size: 12px;margin-left: 2%; margin-top: 0.2%;">
                        <option value="1">Minutos</option>
                        <option value="2">Horas</option>
                        <option value="3">Dias</option>
                        <option value="4">Semanas</option>
                    </select>

            <br/>
            <h4>Tipo de Agenda e Cor da Notificação</h4>
        <select id="options" name="filto_um" class="form-control" style="height: 10%;font-size: 12px;width:30%;margin-left: 5%;">
                <option value="1">Agenda 1 </option>
                <option value="2">Agenda 2</option>
        </select>
        <input type="color" style="margin-left: 2%;">
        <h4>Disponibilidade do Educador Físico</h4>
              <div class="table-responsive">
                <table class="table table-condensed  table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">Segunda</th>
                            <th scope="col">Terça</th>
                            <th scope="col">Quarta</th>
                            <th scope="col">Quinta</th>
                            <th scope="col">Sexta</th>
                        </tr>
                    </thead>
                    <tbody>
                    <th scope="row">9:00</th>
                    <td></td>
                    <td></td>
                    <td>X</td>
                    <td></td>
                    <td></td>
                    <tr>
                        <th scope="row">10:00</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>X</td>
                    </tr>
                    <tr>
                        <th scope="row">11:00</th>
                        <td></td>
                        <td></td>
                        <td>X</td>
                        <td></td>
                        <td></td>
                    </tr>
                    
                    <tr>
                        <th scope="row">14:00</th>
                        <td>X</td>
                        <td></td>
                        <td></td>
                        <td>X</td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">15:00</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">16:00</th>
                        <td></td>
                        <td></td>
                        <td>X</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">17:00</th>
                        <td>X</td>
                        <td></td>
                        <td></td>
                        <td>X</td>
                        <td></td>
                    </tr>
                   
                    </tbody>
                </table>
                  - A duração é de 1 hora 
                  <br/>
                  <br/>
            </div>  
                 <textarea rows="4" cols="100"> Anotações</textarea>
                 <input type="submit" value="Confirmar">
        </div>         
    </div>
        </div>
  </form>
	

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



