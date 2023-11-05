<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Marcar Consulta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
	<link rel="stylesheet" href="custom-css/build/mssj-style.css">     
    <link rel="stylesheet" type="text/css" href="views/modules/Treinos/mod04.css"> 
    </head>
    <body>
        
        <section onclick="closeNav()">
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
<div class="semconsulta" role="main">
            <br/>
            <br/>
<div class="tabcontent p-md-4">
    <h3>Agendar consulta</h3> 

    <form action="agendarconsulta.php" method="post" class="container my-4">
        <div class="row form-group">
            <h4>Título da Consulta</h4>
            <input class="form-control inputformperfileducador" type="text" name="nomeconsulta">
            <br/>
            <h4>Data e Hora </h4>
              <input type="date" name="diaconsulta" class="Inputusuarioconsulta" > <input type="time" name="usr_time" class="Inputusuarioconsultatime"><br/>
        <br>
        <br>
        </div>
        <div>
            <h3>Detalhes do evento</h3>
       <div class="row form-group">
            <h4>Local</h4>
        <input class="form-control Inputusuarioconsultanome" type="text" name="nomeconsulta" value="Pronto Socorro" disabled>
            <h4>Adicionar notificação</h4>
                    <select id="options" name="filto_um" class="form-control InputusuarioconsultaNotifi">
                        <option value="1">Notificação</option>
                        <option value="2">E-mail</option>
                    </select>
                    <input type="number" name="quantity" value="10" min="10" class="Inputusuarioconsultaquantidade">
                    <select id="options" name="filto_um" class="form-control" class="Inputusuarioconsultaquantidade2">
                        <option value="1">Minutos</option>
                        <option value="2">Horas</option>
                        <option value="3">Dias</option>
                        <option value="4">Semanas</option>
                    </select>

            <br/>
            <h4>Tipo de Agenda e Cor da Notificação</h4>
        <select id="options" name="filto_um" class="form-control Inputusuarioconsultaquantidade3">
                <option value="1">Agenda 1 </option>
                <option value="2">Agenda 2</option>
        </select>
        <input type="color" class="Inputusuarioconsultaedu">
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

            <div class="footer-main footermarcarconsulta">

                <div class="row">

                    <div class="col-twelve">
                        <div class="copyright">
                            <span>© Copyright Mais Saúde São João 2018. | <br></span> 
                            <span>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo Campus São João da Boa Vista</a></span>                 
                        </div>

                        <div id="go-top" class="footermarcarconsultapartedebaixo" >
                            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon ion-android-arrow-up"></i></a>
                        </div>         
                    </div>

                </div> <!-- /footer-bottom -->      

            </div>
</div> 
        </footer>  
        </section>
    </body>
</html>




