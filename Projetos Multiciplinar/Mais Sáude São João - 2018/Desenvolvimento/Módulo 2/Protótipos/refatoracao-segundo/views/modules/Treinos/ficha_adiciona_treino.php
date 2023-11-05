<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
        <link href="views\modules\Treinos\mod04.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
                    <br>
                    <br>
            <div class="tabcontent">  <br>                   
                <!--FICHA DE TREINAMENTO -->
                <button type="button" class="btn btn-success" >Adicionar treino</button>
                <br><br>            
                <input type="text">                    
            <div class="tabcontent">  <br>                                       
                <div id="treino">
                    <div>
                        <div class="card-header">
                            <a class="card-link " data-toggle="collapse" href="javascript:void(0);" data-target="#collapseOne1">
                                Nome do treino
                            </a>
                        </div>
                        <div id="collapseOne1" class="collapse" data-parent="#treino">
                            <div class="card-body">
                                <div class="container"><br><br>
                                    <div class="row">
                                        <div class="col ">

                                            <label>Nome do treino:</label>
                                        </div>
                                        <div class="col">
                                            <input type="text" >
                                        </div>
                                        <div class="col">                          
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-info">
                                                    <input type="checkbox" name="diasemana1" id="seg" value="segunda">Seg
                                                </label>
                                                <label class="btn btn-info">
                                                    <input type="checkbox" name="diasemana2" id="ter" value="terça">Ter
                                                </label>
                                                <label class="btn btn-info">
                                                    <input type="checkbox" name="diasemana3" id="qua" value="quarta">Qua
                                                </label>
                                                <label class="btn btn-info">
                                                    <input type="checkbox" name="diasemana4" id="qui" value="quinta">Qui
                                                </label>
                                                <label class="btn btn-info">
                                                    <input type="checkbox" name="diasemana5" id="sex" value="sexta">Sex
                                                </label>
                                                <label class="btn btn-info">
                                                    <input type="checkbox" name="diasemana6" id="sab" value="sabado">Sab
                                                </label>
                                                <label class="btn btn-info">
                                                    <input type="checkbox" name=diasemana7" id="dom" value="domingo">Dom
                                                </label>
                                            </div>                                               
                                        </div>
                                    </div>
                                    <!-- Grupo muscular-->
                                    <div class="container separacao"> <br>
                                        <h3 class="text-center">Exercício </h3>
                                    </div>
                                    <br> 
                                    <div class="menu-container">
                                        <ul class="menu clearfix">
                                            <li><a href="#">Aeróbico</a></li>
                                            <li><a href="#">Abdomen</a></li>                                               
                                            <li><a href="#">M. Inferiores</a></li>
                                            <li><a href="#">M. Superiores</a>
                                            <!-- Nível 1 -->
                                                <!-- submenu -->
                                                <ul class="sub-menu clearfix">
                                                    <li><a href="#">Bíceps</a>
                                                        <!-- Nível 2 -->
                                                        <!-- submenu do submenu -->
                                                        <ul class="sub-menu">
                                                            <li><a href="#">Branquial</a></li>
                                                            <li><a href="#">Branquial anterior</a></li>
                                                            <li><a href="#">Coracobraquial</a></li>
                                                        </ul><!-- submenu do submenu -->
                                                    </li>
                                                    <li><a href="#">Tríceps</a></li>
                                                </ul><!-- submenu -->
                                            </li>
                                            <li><a href="#">Peitoral</a></li>
                                            <li><a href="#">Períneo</a></li>
                                            <li><a href="#">Pescoço</a></li>
                                            <li><a href="#">Posterior do Tronco</a></li>
                                            <li><a href="#">Tórax</a></li>
                                        </ul>
                                    </div><br><br>
                                    <table class="offset-1">
                                        <!-- COLOCAR 3 POR LINHA -->
                                        <tr>
                                            <td class="col-4" ><input type="checkbox"> Rosca concentrada com halteres</td>
                                            <td class="col-4" ><input type="checkbox"> Rosca Scoot</td>
                                            <td class="col-4" ><input type="checkbox"> Rosca direta na polia</td>

                                        </tr>
                                        <tr>
                                            <td class="col-4" ><input type="checkbox"> Rosca direta com barra reta</td>
                                            <td class="col-4"><input type="checkbox"> Rosca Scoot com halter</td>
                                        </tr>                           
                                    </table>
                                    <br><br>
                                    <!-- EXERCICIO -->
                                    <div class="row">
                                        
                                        <div class="offset-1 "></div>
                                        <div class="col col-4" id="card1">
                                            <div class="card">
                                                <div class="card-header">
                                                <a class="card-link " data-toggle="collapse" href="javascript:void(0);" data-target="#collapseOne">
                                                  nnnnnnnnnnnnnnnnnn  
                                                </a>
                                                </div>
                                                <div id="collapseOne" class="collapse" data-parent="#card1">
                                                   <div class="offset-md-1 card-body">
                                                       <div class="row form-group">
                                                           <div class=" col">
                                                               <label class="col-12">Séries: </label>
                                                           </div>
                                                           <div class=" col">
                                                               <input type="number" min="0" max="10" class="col-10">
                                                           </div>
                                                           <div class="col">    
                                                               <label class="col-12">Repetições: </label>
                                                           </div> 
                                                           <div class="col">    
                                                               <input  min="0" type="number" class="col-10">
                                                           </div>                                                                      
                                                       </div>
                                                       <div class="row form-group"> 
                                                           <div class="col">    
                                                               <input  type="number" min="0.5" step="0.5" placeholder="peso" class="col-10">
                                                           </div>
                                                           <div class="col">    
                                                               <label >Kilogramas</label>
                                                           </div>                
                                                       </div>
                                                      <textarea rows="3" cols="23" placeholder="Observação"></textarea>
                                                   </div>
                                                </div>
                                           </div>
                                        </div>
                                        <div class="offset-1 col col-4 " id="card2">
                                            <div class="card">
                                              <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="javascript:void(0);" data-target="#collapseTwo">
                                                  Caminhada
                                                </a>
                                              </div>
                                              <div id="collapseTwo" class="collapse" data-parent="#card2">
                                                  <br>
                                                <div class="offset-md-1 card-body">
                                                       <div class="row form-group"> 
                                                            <div class="col">    
                                                                <input type="number" min="0.5" step="0.5" class="col-10">
                                                            </div>
                                                            <div class="col">    
                                                                <select>
                                                                    <option>Km</option>
                                                                    <option>Minutos</option>
                                                                </select>
                                                            </div>                
                                                        </div>
                                                       <textarea rows="3" cols="23" placeholder="Observação"></textarea>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>    
                                </div> 
                            </div>
                            <br><br>                            
                        </div>
                    </div>  
                    <br><br>
                    <div class="offset-3">
                        <button type="button" class="offset-2 btn btn-success" onclick="finalizar()">Confirmar Dados</button>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
            </div>
        </div>     
    </body>
</html>

