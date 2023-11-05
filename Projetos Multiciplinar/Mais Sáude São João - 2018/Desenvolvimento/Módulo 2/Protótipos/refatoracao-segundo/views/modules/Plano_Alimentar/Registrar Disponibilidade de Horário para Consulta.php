<?php
require_once 'classes/DAO/usuariosDAO.php';

$oi =1;
$dao = new usuariosdao();
  
        $res = $dao->listarTodos();
       

?>

<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?= JQUERY_PATH ?>" charset="utf-8"></script>
        <script src="<?= POPPER_PATH ?>" charset="utf-8"></script>
        <script src="<?= THEME_JS_PATH ?>" charset="utf-8"></script>
        <script src="<?= ANIMATIONS_PATH ?>" charset="utf-8"></script>
        <link rel="stylesheet" href="<?= THEME_CSS_PATH ?>">
    </head>
    <body>
        <header>
            
            
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent-darker">
        <div class="container-fluid">
                <!-- <img class="position-absolute h-75 d-inline-block" src="resources/images/logo-texto.png" alt="logo_texto"> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <button class='btn btn-outline-light' onclick='openNav()'>Menu</button>
                <ul class="navbar-nav ml-auto active-hover">
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="./view.php?mod=Rede_Social"> Rede Social </a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="./view.php?mod=Treinos"> Treinamento </a>
                    </li>
                    <li class="nav-item my-auto">
                        <a class="nav-link" href="./view.php?mod=Plano_Alimentar"> Nutrição </a>
                    </li>
                    <li class="nav-item clearfix border mx-2"></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://openclipart.org/image/2400px/svg_to_png/211821/matt-icons_preferences-desktop-personal.png" style="width: 2rem">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">

                            <a class="dropdown-item" href="./view.php?mod=Usuarios">perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item btn-danger"  href="#">Sair</a>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


       
 
        <section id="about" class='bg-light'>
            
            
           
             <div class="row">
                 
                            <div class="container mx-auto">
                                <div class="row">

                                    <h1 class="display-4"> Registrar Disponibilidade de Horário para consulta </h1>
                                </div>
                            </div>
                        </div>
            
            
            <div class="container-fluid">
                <div class="row">
                    <div class="container text-center p-5">

                        <div name="busca_usuario">
                            
                            <form action="/action_page.php">
  <div class="form-group">
      <label for="sel1">Pessoa:</label>
<select class="form-control" id="pessoa">      
    <?php
        foreach ($res as $row) { 
            ?>
    <option value="saab"><?php echo $row['USU_NOME']; echo" ". $row['USU_SOBRENOME'];
                                        ?></option>
  </select>
                                <?php } ?>
  </div>
  <br>
  <div class="form-group">
      <label for="usr">Name:</label>
 <input type="date" class="form-control" name="bday">
  </div>
  <br>
  <div class="form-group">
        <label for="usr">segunda:</label> <div class="row">
            <div class="col-sm-6" >
                <input type="time" class="form-control" name="usr_time"></div>  
            <div class="col-sm-6" >
                <input type="time" class="form-control" name="usr_time"><br></div>
        </div>
  </div>
  
   <div class="form-group">
        <label for="usr">terça:</label> <div class="row">
            <div class="col-sm-6" >
                <input type="time" class="form-control" name="usr_time"></div>  
            <div class="col-sm-6" >
                <input type="time" class="form-control" name="usr_time"><br></div>
        </div>
  </div>
  
   <div class="form-group">
        <label for="usr">quarta:</label> <div class="row">
            <div class="col-sm-6" >
                <input type="time" class="form-control" name="usr_time"></div>  
            <div class="col-sm-6" >
                <input type="time" class="form-control" name="usr_time"><br></div>
        </div>
  </div>
  
   <div class="form-group">
        <label for="usr">quinta:</label> <div class="row">
            <div class="col-sm-6" >
                <input type="time" class="form-control" name="usr_time"></div>  
            <div class="col-sm-6" >
                <input type="time" class="form-control" name="usr_time"><br></div>
        </div>
  </div>
  
   <div class="form-group">
        <label for="usr">sexta:</label> <div class="row">
            <div class="col-sm-6" >
                <input type="time" class="form-control" name="usr_time"></div>  
            <div class="col-sm-6" >
                <input type="time" class="form-control" name="usr_time"><br></div>
        </div>
  </div>
  
   <div class="form-group">
        <label for="usr">sabado:</label> <div class="row">
            <div class="col-sm-6" >
                <input type="time" class="form-control" name="usr_time"></div>  
            <div class="col-sm-6" >
                <input type="time" class="form-control" name="usr_time"><br></div>
        </div>
  </div>
  <br>
 <button type="submit" class="btn btn-primary" name="pesquisar">Salvar</button>

</form>
                            <br>

                            

                        </div>

                    </div>
                </div>
            </div>
        </section>

        



        <div class='bg-darker py-2 text-center text-light container-fluid text-sm'>
            <div class="row">
                <div class="container mx-auto">
                    <small>© 2018 - Todos os Direitos Reservados - Mais Saúde São João</small>
                    <br>
                    <small>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo - Campus São João da Boa Vista</a></small>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
        
         <!-- The Modal -->
                        <div class="modal fade" id="editar">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Resultado nulo</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <!-- A PAGINA DE CADASTRO ESTÁ CORRETA OU PRECISA INICIAR O CONSTRUTOR/ COMO FAZER!-->
                                        
                                            <div class="form-group">
                                                <h1>Nenhum usuario encontrado</h1>
                                            </div>


                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
         
         
         <?php
         if($oi==2){
             
             ?><script>
                        $(function () {
                            $("#editar").modal("show");
                        });
                    </script>';<?php
             
         }
         
         ?>
        
        
    </body>
</html>
