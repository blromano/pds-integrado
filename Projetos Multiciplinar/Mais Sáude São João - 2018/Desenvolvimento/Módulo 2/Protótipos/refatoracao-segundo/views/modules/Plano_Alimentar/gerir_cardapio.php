<?php
session_start();


include (CONTROLLERS_PATH . 'modules/Plano_Alimentar/inserir_usuario_cardapio.php');
include (CONTROLLERS_PATH . 'modules/Plano_Alimentar/visualizar_cardapio.php');



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
        <link href="styles/build/mod07_css.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    </head>

    <body>
        <header>
            <!--MENU-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent-darker">
                <div class="container-fluid">
                    <img style="padding-left:50px; width: 20%; height: 40%;"  src="assets/images/logo-texto.png" alt="logo_texto"/>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
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
          <script>
                var nav1aberta = true;
                var nav2aberta = true;

                function openNav() {

                    document.getElementById("mySidenav").style.width = "250px";
                    // document.getElementById("main").style.marginLeft = "250px";
                    nav1aberta = false;
                    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                    //document.getElementById("main").style.marginLeft= "0";
                    document.body.style.backgroundColor = "white";
                    nav1aberta = true;
                }
            </script>
     <!--------------------------------------------------------------------------------------------------------------------------------------------------->

            <!--MINHA PARTE-->

                        <div class="container text-center p-5">


                           <div>
                               
                                <h1>Gerir Cardápios</h1>
                               <?php
                               
                                      foreach ($usuario as $row) {
                                              if($_SESSION["CARDAPIO_USUARIO_ID"] == $row["USU_CODIGO"]){
                                    ?>
                                      <h2> <?php echo $row["USU_NOME"]." ".$row["USU_SOBRENOME"];}}?></h2>
                              
                           </div>
                            
                            
                              <table class="table">



                                <tr>
                                    <th scope="col">Cardápio</th>
                                    <th scope="col">Data de Criação</th>
                                    <th scope="col">Período</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                               
                                <?php foreach ($cardapio as $row) { 
                                    if($_SESSION["CARDAPIO_USUARIO_ID"] == $row["FK_USUARIOS_USU_CODIGO"]){
                                  
                                    ?>
                                                   
                                   <br/>
                                   <br/>

                                    <tr scope="row">
                              
                                    <th scope="row">Cardápio<?php echo$row["CAN_CODIGO"];?></th>
                                    <th scope="row"><?php echo date( 'd-m-Y' , strtotime($row["CAN_DATA_CRIADO"] ) );?></th>
                                    <th scope="row"><?php echo date( 'd-m-Y' , strtotime($row["CAN_DATA_INICIO"])).' até '.date( 'd-m-Y' , strtotime($row["CAN_DATA_FIM"]));?></th>
                                    <th scope="row"><a href=?mod=palimentar&sub=visualizar_cardapio><input type="button" style="color:white;" class="btn btn-primary" value="Visualizar" name="Visualizar"></a></th>
                                    <th scope="row"><a href=#><input type="button" class="btn btn-danger" value="Excluir" name="Excluir"></a></th>
                                   
                                </tr>
                                <?php }}?>
                        
                            </table>
                            <br/>
                            <button class="btn btn-primary"><a style="color:white;" href="?mod=palimentar&sub=inserir_cardapio">Inserir Cardápio</a></button>


                            
                            
                            
                        </div>
          

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

        </header>
    </body>
</html>
