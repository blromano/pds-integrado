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
        <style>
            #conteudo{
                display: flex;              
            }
            label{
                padding: 15px;
            }
            .horario{
 
                width:100px;
            }
        </style>
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
    <h3>Horário de atendimento</h3>
    <div id="conteudo">
        <div>
            <label> Das</label>
        </div>
        <div>
            <input class="horario" type="text" name="horarioinicio" placeholder="Início">
        </div>
        <div>
            <label> às </label>
        </div>
        <div>
            <input class="horario" type="text" name="horariotermino" placeholder="Termino">
        </div>
        <div>
            <label> Tempo de consulta (de 15 em 15) minutos  </label>
        </div>
        <div>
            <input class="horario" type="number" step="15" min="15" max="60" name="tempoconsulta" value="checked">
        </div>
        <div>
        <input  class="horario" style="width: 150px; margin-left: 25px;" type="submit" value="Gerar tabela">
        </div>
    </div>
    
        <div class="table-responsive">
                <table class="table table-condensed  table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="row" style="text-align:left;"><input type="checkbox" name="disponivel" value="checked" >  Segunda</th>
                            <th scope="row" style="text-align:left;"><input type="checkbox" name="disponivel" value="checked" >  Terça</th>
                            <th scope="row" style="text-align:left;"><input type="checkbox" name="disponivel" value="checked" >  Quarta</th>
                            <th scope="row" style="text-align:left;"><input type="checkbox" name="disponivel" value="checked" >  Quinta</th>
                            <th scope="row" style="text-align:left;"><input type="checkbox" name="disponivel" value="checked" >  Sexta</th>
                        </tr>
                    </thead>
                    
                    <tbody>
               
                <tr>
                    <th scope="row">8:00 às 9:00</th>
                    <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                </tr>
                <tr>
                    <th scope="row">9:00 às 10:00</th>
                    <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                </tr>
                    <tr>
                        <th scope="row">10:00 às 11:00</th>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    </tr>
                    <tr>
                        <th scope="row">11:00 às 12:00</th>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    </tr>
                    <tr>
                        <th scope="row">12:00 às 13:00</th>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    </tr>
                    <tr>
                        <th scope="row">13:00 às 14:00</th>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    </tr>
                    <tr>
                        <th scope="row">14:00 às 15:00</th>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    </tr>
                    <tr>
                        <th scope="row">15:00 às 16:00</th>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                        <td><input type="checkbox" name="disponivel" value="checked"       style="margin-left:auto; margin-right:auto;width:20px; height:20px;"></td>
                    </tr>
               
                    </tbody>
                    <br><br>
                </table>
                  
                  <br/>
                  <br/>
            </div>  
        
         <h4>Local</h4>
            <input class="form-control" type="text" name="localconsulta" style="height: 5%;font-size: 15px;">
            <input class="form-control" type="text" name="linkmaps" placeholder="Digite o link do Google Maps aqui"style="height: 5%;font-size: 15px;">
            
            <input type="submit" value="Confirmar" style="width: 150px;">
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



