<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> +Saúde São João </title>
    <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
    <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
    <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
    <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="hover.css">
    <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
    <link href="views\modules\Treinos\mod04.css" rel="stylesheet" type="text/css"/>
</head>
    <body>               
    <!--FICHA DE TREINAMENTO -->                                     
        <div class="container"><br><br>
                <div class="row">                                   
                    <div class="col ">
                        <h3>Nome do treino:</h3>
                    </div>
                    <div class="col form-">
                        <input id='nometreino' disabled  type="text" name="nometreino" >
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
            <button onclick="editanome()" type="button"  class="btn btn-primary btn-sm" >Atualizar Nome</button>
            <br><br>
                <!-- Grupo muscular-->
                <div class="container separacao"> <br>
                    <h3 class="text-center">Exercício </h3>
                </div>
                <br> 

   <!--  3pra cada um -->
 <div class="menu-container text-center ">
<table class="table"> 
                 <tr>
                    <td class="estilo menu">
                        <li> Aeróbico</li>
                    </td>
                    <td class=" estilo menu">
                        <li>Antebraço</li>
                    </td>
                    
                    <td class=" estilo menu">
                        <li>aaa</li>
                    </td>
                    
                    <td class=" estilo menu">
                        <li>bbb</li>
                    </td>
                    
                </tr>
                
                <tr class="tabelatreino">
                    <td class="estilo menu">
                        <li> Aeróbico</li>
                    </td>
                    <td class="estilo menu">
                        <li>Antebraço</li>
                    </td>
                    
                    <td class="estilo menu">
                        <li>aaa</li>
                    </td>
                    
                    <td class="estilo menu">
                        <li>bbb</li>
                    </td>
                    
                </tr>
                
                <tr class="tabelatreino">
                    <td class="estilo menu">
                        <li> Aeróbico</li>
                    </td>
                    <td class="estilo menu">
                        <li>Antebraço</li>
                    </td>
                    
                    <td class="estilo menu">
                        <li>aaa</li>
                    </td>
                    
                    <td class="estilo menu">
                        <li>bbb</li>
                    </td>
                    
                </tr>
                
                <tr class="tabelatreino">
                    <td class="estilo menu">
                        <li> Aeróbico</li>
                    </td>
                    <td class="estilo menu">
                        <li>Antebraço</li>
                    </td>
                    
                    <td class="estilo menu">
                        <li>aaa</li>
                    </td>
                    
                    <td class="estilo menu">
                        <li>bbb</li>
                    </td>
                    
                </tr>
                    
               
</table>
</div>
   
   
   <br><br>
                <table class="table table-striped table-condensed">
                    <!-- COLOCAR 3 POR LINHA -->
                    <tr class="row">
                        <td class="col-sm-4" ><input type="checkbox"> Rosca concentrada com halteres</td>
                        <td class="col-sm-4" ><input type="checkbox"> Rosca Scoot</td>
                        <td class="col-sm-4" ><input type="checkbox"> Rosca direta na polia</td>

                    </tr>
                    <tr class="row">
                        <td class="col-sm-4" ><input type="checkbox"> Rosca direta com barra reta</td>
                        <td class="col-sm-4"><input type="checkbox"> Rosca Scoot com halter</td>
                        <td class="col-sm-4"><input type="checkbox"> Rosca Scoot com halter</td>
                        
                    </tr>                           
                </table>
    <table> 
                <!-- EXERCICIO -->
                <div id="exercicios" >
                    
                    <br/>
                    <br/>
                    
                <?php
                function criaanaerobico(){
                    echo '<div class="offset-1 col col-4 float-left" id="card1">
                        <div class="card">
                            <div class="card-header">
                            <a class="card-link " data-toggle="collapse" href="javascript:void(0);" data-target="#anaerobico">
                              nnnnnnnnnnnnnnnnnn  
                            </a>
                            </div>
                            <div id="anaerobico" class="collapse" data-parent="exercicios">
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
                       </div>';
                }

                function criaaerobico(){
                    echo'<div class=" col col-4 float-left" id="card2">
                        <div class="card">
                          <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" href="javascript:void(0);" data-target="#aerobico">
                              Caminhada
                            </a>
                          </div>
                          <div id="aerobico" class="collapse" data-parent="exercicios">
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
                    </div>';
                }
                criaaerobico();
                criaaerobico();
                ?>
                          

                <br>                            
            </div>
        </div>
    </body>
    <script>
        var j=0;
         function editanome(){
                if (j==1){
                   document.getElementById("nometreino").disabled = true;
                   j=0;
                }
                else if (j==0){
                  document.getElementById("nometreino").disabled = false;
                   j=1;  
                }
                
            }
        
    </script>
</html>

