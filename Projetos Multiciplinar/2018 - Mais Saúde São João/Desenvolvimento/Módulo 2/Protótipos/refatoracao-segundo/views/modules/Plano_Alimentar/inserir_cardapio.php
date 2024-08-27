<?php
session_start();

require_once 'controllers/modules/Plano_Alimentar/inserir_cardapio_alimento.php';
require_once 'controllers/modules/Plano_Alimentar/inserir_usuario_cardapio.php';
    

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
                               
                                <h1>Inserir Novo Cardápio</h1>
                                     

                           <!-- Formulario para criar um cardapio-->
                           
                            <div class="alinhamento" name="criar cardapio" class="container text-center p-5"> 

                                <div class="alinhamento" id="origem" align="center" style="visibility: hidden;position: absolute">
                                    <div class="form-group"  class="alinhamento" name="periodo">
                                        <br/>
                                        
                                        <label>Período ideal:</label>
                                        
                                        <select class="form-control" id="periodos" onchange="optionCheck()" name="periodos" required>
                                            <option value="0">Período</option>
                                            <option value="1">Café da Manhã</option>
                                            <option value='2'>Almoço</option>
                                            <option value='3'>Lanche da Tarde</option>
                                            <option value='4'>Café da Tarde</option>
                                            <option value='5'>Janta</option>
                                            <option value='6'>Lanche da Noite</option>
                                        </select>
                                    
                                    </div>
                                    
                                    <div class="alinhamento" class="form-group" name="horario">
                                        <label> Horário ideal: </label> 
                                        <input  type="time" class="form-control" id="hora" placeholder="" name="hora" required> <br/>
                                    </div>



                                    <div id="addAlimentos" class="alinhamento">
                                        <div class="form-group" name="alimento" id="alimentos">
                                            <label> Alimento / Porção / Calorias indicado: </label> 
                                            <select name="alimento" id="alimentos_ind"  class="form-control" required> <br />
                                                <option value="0">Alimento</option>
                                                <?php
                                                foreach ($alimentos as $idn) {
                                                    echo ' <option value="' . $idn["ALI_CODIGO"] . '">' . $idn["ALI_NOME"] .' / '.$idn["ALI_CALORIAS"].' / '.$idn["ALI_PORCAO"]. '</option>';
                                                }
                                                ?>
                                            </select>
                                            
                                            <br/>
                                            
                                            <label> Porção ideal: </label> 
                                            <input  type="number" class="form-control" min="1" id="porcao" placeholder=""  name="porcao" required> <br/>

                                            <label> Quantidade de Calorias: </label> 
                                            <input  type="number" class="form-control" min="1" id="qtdCaloria" placeholder=""  name="qtdCaloria" required> <br/>

                                            <label>Variações do alimento: </label> 
                                            <input  type="text" class="form-control" id="variacao" placeholder="" name="variacao" required>
                                            
                                            <br/> 
                                            
                                            <p class="marge"></p>
                                        
                                        </div>
                                    </div>
                                    
                                    <div class="button">
                                    <input  type="button" class="btn btn-primary mb-2"  id="add_alimento" name="alimentos" value="+Alimentos" onclick="adicionarAlimentos(this)"/>
                                    </div>
                                    
                                </div>

                                <!--FORMULARIO AQUI-->
                                <form action="controllers/modules/Plano_Alimentar/valida_inserir_cardapio.php" method="POST" >
                                    <?php
                                      foreach ($usuario as $row) {
                                              if($_SESSION["CARDAPIO_USUARIO_ID"] == $row["USU_CODIGO"]){
                                    ?>
                                    <h2> <?php echo $row["USU_NOME"]." ".$row["USU_SOBRENOME"];}}?></h2>
                                    <div class="form-group" name="dataInicial">
                                        <label>Data de Inicio</label>
                                        <input type="date" class="form-control input-sm" id="data_inicio" name="data_inicio" required="" />
                                    </div>

                                    <div class="form-group" name="dataFinal">
                                        <label>Data de Termino</label>
                                        <input type="date" class="form-control input-sm" id="data_termino" name="data_termino"  required="" />
                                    </div>


                                    <div id="destino">
                                        <!--Adiciona o período + alimento + etc aqui--> 
                                    </div>

                                    <div class="form-group" name="add_botao"> 
                                        <br/>
                                        <input  type="button" class="btn btn-primary" id="add_periodo" value="+Períodos" onclick="duplicarCampos();">

                                    </div>
                                    <div class="form-group" name="Salvar"> 
                                        <input  type="submit" class="btn btn-primary" id="add_periodo" value="Salvar" >
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>

                    <!--Função para adicionar mais campos de periodo e alimentos-->

                    <script>
                        var cont = 0;
                        function adicionarAlimentos(e) {
                            var numero = e.getAttribute('id');
                            numero = numero.substr(12, numero.length - 12);
                            var cloneAlimentos = document.getElementById('alimentos').cloneNode(true);
                            var destinoAlimentos = document.getElementById('addAlimentos' + numero);
                            var qtdAlimentos = destinoAlimentos.childElementCount + 1;
                            var campo = cloneAlimentos.querySelector('#alimentos_ind');
                            campo.setAttribute('name', 'alimento[' + cont + '][' + qtdAlimentos + ']');
                            campo = cloneAlimentos.querySelector('#porcao');
                            campo.setAttribute('name', 'porcao[' + cont + '][' + qtdAlimentos + ']');
                            campo = cloneAlimentos.querySelector('#qtdCaloria');
                            campo.setAttribute('name', 'qtdCaloria[' + cont + '][' + qtdAlimentos + ']');
                            campo = cloneAlimentos.querySelector('#variacao');
                            campo.setAttribute('name', 'variacao[' + cont + '][' + qtdAlimentos + ']');
                            destinoAlimentos.appendChild(cloneAlimentos);
                            var camposClonados = cloneAlimentos.getElementsByTagName('input');
                            for (j = 0; j < camposClonados.length; j++) {
                                camposClonados[j].value = '';
                            }
                        }

                        function duplicarCampos() {
                            cont++;
                            var clone = document.getElementById('origem').cloneNode(true);
                            clone.style.visibility = 'visible';
                            clone.style.position = 'relative';
                            clone.setAttribute('id', 'origem' + cont);
                            var campo = clone.querySelector('#periodos');
                            campo.setAttribute('name', 'periodos[' + cont + ']');
                            campo = clone.querySelector('#hora');
                            campo.setAttribute('name', 'hora[' + cont + ']');
                            var divAlim = clone.querySelector('#addAlimentos');
                            campo = divAlim.querySelector('#alimentos_ind');
                            campo.setAttribute('name', 'alimento[' + cont + '][1]');
                            campo = clone.querySelector('#porcao');
                            campo.setAttribute('name', 'porcao[' + cont + '][1]');
                            campo = clone.querySelector('#qtdCaloria');
                            campo.setAttribute('name', 'qtdCaloria[' + cont + '][1]');
                            campo = clone.querySelector('#variacao');
                            campo.setAttribute('name', 'variacao[' + cont + '][1]');
                            divAlim.setAttribute('id', 'addAlimentos' + cont);
                            var botao = clone.querySelector('#add_alimento');
                            botao.setAttribute('id', 'add_alimento' + cont);
                            var destino = document.getElementById('destino');
                            destino.appendChild(clone);
                            var camposClonados = clone.getElementsByTagName('input');
                            for (i = 0; i < camposClonados.length; i++) {
                                if (camposClonados[i].getAttribute('type') != 'button')
                                    camposClonados[i].value = '';
                            }
                        }




                    </script>

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

        </header>
    </body>
</html>
