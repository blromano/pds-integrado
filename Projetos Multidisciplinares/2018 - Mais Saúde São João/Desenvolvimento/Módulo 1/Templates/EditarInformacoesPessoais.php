<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
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
        <header class="sticky">

            <div class="row">


                <nav id="main-nav-wrap">
                    <ul class="main-navigation">
                        <li class="current"><a class="smoothscroll"  href="#intro" title="">Início</a></li>
                        <li><a class="smoothscroll"  href="RegistrarPesoEAltura.php" title="">Registrar peso e altura</a></li>

                        <li><a class="smoothscroll"  href="#" data-toggle="modal" data-target="#myModal2">Excluir </a></li>
                        <li><a class="smoothscroll"  href="lista.php" title="">Lista de Usuários</a></li>
                        <li><a  href="#" title="">Rede Social</a></li>
                        <li class="highlight with-sep"><a href="index.php" title="">Inicio</a></li>
                        <li class="highlight " data-toggle="modal" data-target="#myModal3"><a href="#" title="">Sair</a></li>
                    </ul>
                </nav>



            </div>

        </header>
        <div class="container-fluid">

            <!--Corpo do texto --->
            <div class="container" role="main" style="height: 100%;width: 100%; padding:5%; float:left; min-height: 100%" >

                <h2> Editar informações pessoais Usuário </h2>

                <form>

                    <div class="form-group">
                        <label for="usr">Nome:</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>

                    <div class="form-group">
                        <label for="usr">Sobrenome:</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>

                    <div class="form-group">
                        <label for="date">Data de nascimento:</label>
                        <input type="date" class="form-control" id="date" style="width: 200px" >
                    </div>

                    <div class="form-group">
                        <label for="usr">Endereço:</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px" placeholder="Rua , numero">
                    </div>

                    <div class="form-group">
                        <label for="usr">Telefone:</label>
                        <input type="tel" class="form-control" id="usr" style="width: 400px" placeholder="(000)91234-4444">
                    </div>

                    <div class="form-group">
                        <label for="usr">Enviar foto:</label>
                        <input type="file" class="form-control" id="usr" style="width: 400px">
                    </div>


                    <div class="form-group">
                        <label for="usr">Senha:</label>
                        <input type="password" class="form-control" id="usr" style="width: 500px">
                    </div>
                    <div class="form-group">
                        <label for="usr">Confirmar senha:</label>
                        <input type="password" class="form-control" id="usr" style="width: 500px">
                    </div>

                    <button type="button" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-danger">Sair</button>

                </form>
                <br><br><br>
                <h2> Editar informações Nutricionista</h2>

                <form>

                    <div class="form-group">
                        <label for="usr">Nome:</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>

                    <div class="form-group">
                        <label for="usr">Sobrenome:</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>



                    <div class="form-group">
                        <label for="usr">Endereço:</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px" placeholder="rua , numero">
                    </div>

                    <div class="form-group">
                        <label for="usr">Telefone:</label>
                        <input type="tel" class="form-control" id="usr" style="width: 400px" placeholder="(000)91234-4444">
                    </div>

                    <div class="form-group">
                        <label for="usr">Enviar foto:</label>
                        <input type="file" class="form-control" id="usr" style="width: 400px">
                    </div>


                    <div class="form-group">
                        <label for="usr">Senha:</label>
                        <input type="password" class="form-control" id="usr" style="width: 500px">
                    </div>
                    <div class="form-group">
                        <label for="usr">Confirmar senha:</label>
                        <input type="password" class="form-control" id="usr" style="width: 500px">
                    </div>
                    <div class="form-group">
                        <label for="usr">Foco de trabalho</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>
                    <div class="form-group">
                        <label for="usr">Descricao de profissional</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>

                    <button type="button" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-danger">Sair</button>

                </form>




                <h2> Editar informações Educador Físico</h2>

                <form>

                    <div class="form-group">
                        <label for="usr">Nome:</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>

                    <div class="form-group">
                        <label for="usr">Sobrenome:</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>



                    <div class="form-group">
                        <label for="usr">Endereço:</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px" placeholder="rua , numero">
                    </div>

                    <div class="form-group">
                        <label for="usr">Telefone:</label>
                        <input type="tel" class="form-control" id="usr" style="width: 400px" placeholder="(000)91234-4444">
                    </div>

                    <div class="form-group">
                        <label for="usr">Enviar foto:</label>
                        <input type="file" class="form-control" id="usr" style="width: 400px">
                    </div>


                    <div class="form-group">
                        <label for="usr">Senha:</label>
                        <input type="password" class="form-control" id="usr" style="width: 500px">
                    </div>
                    <div class="form-group">
                        <label for="usr">Confirmar senha:</label>
                        <input type="password" class="form-control" id="usr" style="width: 500px">
                    </div>
                    <div class="form-group">
                        <label for="usr">Foco de trabalho</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>
                    <div class="form-group">
                        <label for="usr">Descricao de profissional</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>

                    <button type="button" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-danger">Sair</button>

                </form>



                <h2> Editar informações Administrador</h2>

                <form>
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>
                    <div class="form-group">
                        <label for="usr">Email:</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>

                    <div class="form-group">
                        <label for="usr">Senha:</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>





                    <button type="button" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-danger">Sair</button>

                </form>
                
                
                <h2> Visualizar Patologias e Medicações Continuas do Usuário</h2>
                <form>
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="usr" style="width: 500px">
                    </div>
                
                    <button type="button" class="btn btn-success">Enviar</button>
                    <button type="button" class="btn btn-danger">Cancelar</button>

                </form>
                
                
                




            </div>







            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>

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



