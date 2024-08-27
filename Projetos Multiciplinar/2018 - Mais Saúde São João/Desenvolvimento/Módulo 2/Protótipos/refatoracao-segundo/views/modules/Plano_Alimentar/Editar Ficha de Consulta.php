<?php

include 'classes/DAO/conexao.php';
session_start();
$id = $_SESSION['id'];
require_once 'classes/DAO/usuariosDAO.php';
    $banco = new usuariosDAO();
    


?>
<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
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

                                    <h1 class="display-1"> Criação de Ficha de Consulta </h1>
                                </div>
                            </div>
                        </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="container text-center p-5">
                         
                            <div >
                                <?php 
                                
                                foreach ($banco->listarTodos($id) as $idn){
        
        
        
   
                                
                                ?>
                   <h1 >Ficha de Consulta</h1>
                   <p>Nome : <?php echo $idn['USU_NOME'];?></p> 
                    <p>   D. Nascimento: <?php echo $idn['USU_DATA_NASCIMENTO'];?></p>	
                   <p>Naturalidade: Nacionalidade: Brasileira</p>			
                   <p>Endereço: <?php echo $idn['USU_ENDERECO'];?></p>											
                   <p>Fone: <?php echo $idn['USU_TELEFONE'];?>	| E-mail: <?php echo $idn['USU_EMAIL'];?></p>
                   <p>_______________________________________________________________________________________________</p>
                   <?php  } ?>
                   
                   <form action="?mod=palimentar&sub=teste" method="post">
                    <div class="form-group">
                      <label for="peso">Peso atual:</label>
                      <input required="" type="number" class="form-control" id="peso" placeholder="Peso atual" name="peso">
                    </div>
                       
                    <div class="form-group">
                      <label for="objetivo">Qual seu objetivo:</label>
                      <input required=""  type="text" class="form-control" id="objetivo" placeholder="Qual seu objetivo" name="objetivo">
                    </div>
                    
                       <div class="form-group">
                      <label for="objetivo">Estatura:</label>
                      <input required="" type="number" class="form-control" id="Estatura" placeholder="Qual sua Estatura" name="estatura">
                    </div>
                       
                        <div class="form-group">
                            <label for="objetivo">Pratica atividade física?</label><br>
                      <input type="radio" name="pratica" value="sim" > Sim<br>
                       <input required="" type="radio" name="pratica" value="nao"> Nao<br>
                        </div>
                       
                       <div class="form-group">
                      <label for="objetivo">Se sim qual:</label>
                      <input type="text" class="form-control" id="atividade" placeholder="Qual ?" name="atividade">
                    </div>
                       
                       <div class="form-group">
                      <label for="frequencia">Se sim quantas vezes por semana?</label>
                      <input type="number" class="form-control" id="frequencia" placeholder="Quantas vezes ?" name="frequencia">
                    </div>
                       
                       <div class="form-group">
                            <label for="objetivo">se nao, ja praticou?</label><br>
                      <input type="radio" name="praticava" value="sim" > Sim<br>
                       <input type="radio" name="praticava" value="nao"> Nao<br>
                        </div>
                       
                       <div class="form-group">
                      <label for="frequencia">Se sim, quais?</label>
                      <input type="text" class="form-control" id="atividadeAntiga" placeholder="Se sim, quais?" name="atividadeAntiga">
                    </div>
                       
                       <div class="form-group">
                            <label for="objetivo">Faz quantas refeições por dia:</label><br>
                      <input type="radio" name="refeicaoPD" value="1" > 1<br>
                       <input type="radio" name="refeicaoPD" value="2" > 2<br>
                       <input type="radio" name="refeicaoPD" value="3" > 3<br>
                       <input type="radio" name="refeicaoPD" value="4" > 4<br>
                       <input type="radio" name="refeicaoPD" value="5" > 5<br>
                       <input required="" type="radio" name="refeicaoPD" value="mais" > mais de5<br>
                        </div>
                       
                        <div class="form-group">
                            <label for="objetivo">Faz dieta ou suplementação alimentar?</label><br>
                      <input type="radio" name="dieta" value="sim" > Sim<br>
                       <input required="" type="radio" name="dieta" value="nao"> Nao<br>
                        </div>
                       
                        <div class="form-group">
                            <label for="objetivo">Tem plano de Saúde?</label><br>
                      <input type="radio" name="plano" value="sim" > Sim<br>
                       <input required="" type="radio" name="plano" value="nao"> Nao<br>
                        </div>
                       
                        <div class="form-group">
                            <label for="objetivo">Toma algum remédio atualmente?</label><br>
                      <input type="radio" name="tomaRemedio" value="sim" > Sim<br>
                       <input required="" type="radio" name="tomaRemedio" value="nao"> Nao<br>
                        </div>
                       
                       <div class="form-group">
                      <label for="objetivo">Se sim qual:</label>
                      <input required="" type="text" class="form-control" id="medicamento" placeholder="Qual ?" name="medicamento">
                    </div>
                       
                       <div class="form-group">
                            <label for="objetivo">Tem alguma restrição alimentar?</label><br>
                      <input type="radio" name="temRestricao" value="sim"> Sim<br>
                       <input required="" type="radio" name="temRestricao" value="nao"> Nao<br>
                        </div>
                       
                       <div class="form-group">
                      <label for="objetivo">Se sim qual:</label>
                      <input type="text" class="form-control" id="restricao" placeholder="Qual ?" name="restricao">
                    </div>
                       
                    <button type="submit" class="btn btn-primary">Salvar</button>
                  </form>
                        
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
    </body>
</html>
