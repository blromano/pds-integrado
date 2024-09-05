<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> +Saúde São João </title>
    <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
    <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
    <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
    <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
    <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">


        
<body>
    <?php 
    $vertical_menu_links = [
        "Nome do link"=>"link_de_redirecionamento.html"
    ]; 
    include(VIEWS_PATH.'/module_base.php'); 
    ?>
    <section onclick="closeNav()">

    <div class="container-fluid">

       <h1 class="text-left mr-5 mt-4" >Gestão de Programas de Treinamento</h1> 

        <div class="input-group-append mt-5">
                  <button type="button" class="btn btn-primary mb-2" id="novo_pt" data-toggle="modal" data-target="#exampleModal5">Adicionar Novo Programa de Treinamento</button>
                </div>
        <form method="POST" action="?mod=fesportiva&sub=programa_treinamento">
       <div class="row justify-content-md-center mt-5">
                <div class="col-sm-2 ">
                           <div>
                           <select class="custom-select" name="pesquisa_tipo" >
                              
                              <option value="Corpo todo">Corpo todo</option>
                              <option value="Abdômen">Abdômen</option>
                              <option value="Braço">Braço</option>
                              <option value="Costas e Ombros">Costas e Ombros</option>
                              <option value="Perna">Perna</option>
                              <option value="Peito">Peito</option>
                            </select>
                            </div>
                </div>
                <div class="col-sm-4 ">
                        <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Digite aqui" aria-label="Recipient's username" aria-describedby="button-addon2" name="pesquisa_nome">
                              <div class="input-group-append">
                                <button type="submit" class="btn btn-dark" id="pesquisar">Pesquisar</button>
                              </div>
                        </div>
                </div>
        </div>
      </form>

        <h3 class="ml-5 mt-5 mb-5">Resultados encontrados:</h3> 


            <?php
            $conexao = new
            PDO("mysql:host=localhost;dbname=pds_teste","root","");
            $conexao->exec("SET CHARACTER SET utf8");

            $sql="SELECT * FROM programas_de_treinamento";

            if(isset($_POST["pesquisa_tipo"])){
              if($_POST["pesquisa_tipo"]!="Corpo todo"){
              $sql=$sql.' where PGT_NOME like :PGT_NOME';}
            }

            $sqlUsuariopt = $conexao->prepare($sql);

            if(isset($_POST["pesquisa_tipo"])){
              if($_POST["pesquisa_tipo"]!="Corpo todo"){
            $pesquisar="%".$_POST["pesquisa_tipo"]."%".$_POST["pesquisa_nome"]."%";
            $sqlUsuariopt->bindParam(':PGT_NOME', $pesquisar);}
            }

            $sqlUsuariopt->execute();
            $resultadopt = $sqlUsuariopt->fetchAll();
            
             

            for($i=0; $i<count($resultadopt); $i++)

            { 
              

              ?>
              <div class="row justify-content-md-center mb-2 mt-4">
      
              <div class="col col-lg-2">
                <a class="btn btn-dark" data-toggle="collapse" href="javascript:void(0)" data-target="#multiCollapseExample<?php echo $resultadopt[$i]['PGT_CODIGO']?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><h5><?php echo $resultadopt[$i]["PGT_NOME"];?></h5></a>
              </div>
              <div class="col-md-auto mt-2">
                 <div>
            <h4>Dificuldade:</h4>
                 </div>
              </div>
              <div class="col col-lg-2 ml-2 mt-3">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $resultadopt[$i]['PGT_DIFICULDADE']; ?>%"></div>
                     </div>
              </div>



                <!-- EDITAR PT -->


              <div class="col-md-auto mt-1">
                  <div class="input-group-append">
                  <button  type="button" class="btn btn-primary mb-2" id="button-addon2" data-toggle="modal" data-target="#modaleditar<?php echo $resultadopt[$i]['PGT_CODIGO']?>">Editar Programa de Treinamento</button>
                </div>
                </div>
                <div class="modal fade" id="modaleditar<?php echo $resultadopt[$i]['PGT_CODIGO']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Programa de Treinamento</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="\PDS - Teste\views\modules\Ferramentas_Esportivas\programa_treinamento_atualizar.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                       <label for="recipient-name" class="col-form-label">Nome do programa de treinamento:</label>
                      <input type="text" class="form-control" id="pt_nome" name="pt_nome" value="<?php echo $resultadopt[$i]['PGT_NOME']?>">
                      <label for="recipient-name" class="col-form-label">Dificuldade:</label>
                      <input type="text" class="form-control" id="pt_dificuldade" name="pt_dificuldade" value="<?php echo $resultadopt[$i]['PGT_DIFICULDADE']?>">
                      <input type="hidden" class="form-control" id="pt_id" name="pt_id" value="<?php echo $resultadopt[$i]['PGT_CODIGO']?>">
                    </div>
                </div>
                 <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                  </form>
              </div>
            </div>
          </div>

              <!-- ADICIONAR EPT -->

                <div class="col-md-auto mt-1">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-info mb-2" id="button-addon2" data-toggle="modal" data-target="#adicionarept<?php echo $resultadopt[$i]['PGT_CODIGO']?>">Adicionar novo exercício</button>
                </div>
                </div>
                
                <div class="modal fade" id="adicionarept<?php echo $resultadopt[$i]['PGT_CODIGO']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Novo Excercício do Programa de Treinamento</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="\PDS - Teste\views\modules\Ferramentas_Esportivas\exerciciopt_inserir.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                      <select class="custom-select" name="ex_id">
                        <?php
                          $conexao = new
                          PDO("mysql:host=localhost;dbname=pds_teste","root","");
                          $conexao->exec("SET CHARACTER SET utf8");

                          $sqlUsuarioex = $conexao->prepare("SELECT * FROM exercicios_fisicos");
                          $sqlUsuarioex->execute();
                          $resultadoex = $sqlUsuarioex->fetchAll();
                          
                           

                          for($k=0; $k<count($resultadoex); $k++)

                          { 
                            

                            ?>
                              
                              <option value="<?php echo $resultadoex[$k]["EXF_CODIGO"];?>"><?php echo $resultadoex[$k]["EXF_NOME"];?></option>

                            <?php
                              }
                            ?>
                            </select>
                      <label for="recipient-name" class="col-form-label">Número de repetições:</label>
                      <input type="text" class="form-control" id="ept_nr" name="ept_nr">
                      <label for="recipient-name" class="col-form-label">Intervalo:</label>
                      <input type="text" class="form-control" id="ept_intervalo" name="ept_intervalo">
                      <label for="recipient-name" class="col-form-label">Carga/Peso:</label>
                      <input type="text" class="form-control" id="ept_cp" name="ept_cp">

                      <input type="hidden" class="form-control" id="ept_id" name="ept_id" value="<?php echo $resultadopt[$i]['PGT_CODIGO']?>">
                    </div>    
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
                </form>
              </div>
            </div>
          </div>


                <!-- EXCLUIR PT -->



                <div class="col-md-auto mt-1">
                  <div class="input-group-append">
                  <button type="button" class="btn btn-danger mb-2" id="button-addon2" data-toggle="modal" data-target="#modalexcluir<?php echo $resultadopt[$i]['PGT_CODIGO']?>">Excluir Programa de Treinamento</button>
                </div>
                </div>
                   <div class="modal fade" id="modalexcluir<?php echo $resultadopt[$i]['PGT_CODIGO']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="\PDS - Teste\views\modules\Ferramentas_Esportivas\programa_treinamento_excluir.php" method="POST">
                        <div class="modal-body">
                          Tem certeza que deseja que excluir o programa de treinamento?
                          <input type="hidden" class="form-control" id="pt_id" name="pt_id" value="<?php echo $resultadopt[$i]['PGT_CODIGO'];?>">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Ecluir</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
          
                </div>



                 <?php 

                  $sqlUsuarioept = $conexao->prepare("select EXF_NOME,EPT_CARGA_PESO,EPT_PGT_REPETICOES,EPT_INTERVALO,EPT_CODIGO,FK_EXERCICIOS_FISICOS_EXF_CODIGO
            from exercicios_fisicos, exercicio_fisicos_programas_treinamento
            where exercicios_fisicos.EXF_CODIGO=exercicio_fisicos_programas_treinamento.FK_EXERCICIOS_FISICOS_EXF_CODIGO
            and exercicio_fisicos_programas_treinamento.FK_PROGRAMAS_DE_TREINAMENTO_PGT_CODIGO=:PGT_CODIGO
            order by EXF_NOME");
            $sqlUsuarioept->bindParam(':PGT_CODIGO',$resultadopt[$i]['PGT_CODIGO']);

            $sqlUsuarioept->execute();
            $resultadoept = $sqlUsuarioept->fetchAll();
            ?>
            <div class="collapse multi-collapse" id="multiCollapseExample<?php echo $resultadopt[$i]['PGT_CODIGO'];?>">
            <div class="card-body"> 

          
            <table class="table table-striped table-dark" >
           <thead class="thead-dark">
              <tr>
                <th scope="col">Exercício</th>
                <th scope="col">Número de repetições</th>
                <th scope="col">Intervalo</th>
                <th scope="col">Carga/Peso</th>
                <th></th>
                <th></th>

              </tr>
            </thead>
             
            <tbody>
              <?php
                 for($j=0; $j<count($resultadoept); $j++)
            {


              ?>

             <!-- LISTAR EPT -->

            
            
            
              <tr>
               
                <td> <?php echo $resultadoept[$j]["EXF_NOME"];?></td>
                <td> <?php echo $resultadoept[$j]["EPT_PGT_REPETICOES"];?></td>
                <td> <?php echo $resultadoept[$j]["EPT_INTERVALO"];?></td>
                <td> <?php echo $resultadoept[$j]["EPT_CARGA_PESO"];?></td>

                <td> <button type="button" class="btn btn-primary" id="button-addon2" data-toggle="modal" data-target="#modaleditarept<?php echo $resultadoept[$j]['EPT_CODIGO']?>">Editar</button></td>
                <td> <button type="button" class="btn btn-danger" id="button-addon2" data-toggle="modal" data-target="#modalexcluirept<?php echo $resultadoept[$j]['EPT_CODIGO']?>">Excluir</button></td>
              </tr>
          
       





           <!-- EDITAR EPT -->


       <div class="modal fade" id="modaleditarept<?php echo $resultadoept[$j]['EPT_CODIGO']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Editar Excercício do Programa de Treinamento</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="\PDS - Teste\views\modules\Ferramentas_Esportivas\exerciciopt_atualizar.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nome do exercício:</label>
                     <select class="custom-select" name="ex_id" disabled>
                        <?php
                          $conexao = new
                          PDO("mysql:host=localhost;dbname=pds_teste","root","");
                          $conexao->exec("SET CHARACTER SET utf8");

                          $sqlUsuarioex = $conexao->prepare("SELECT * FROM exercicios_fisicos");
                          $sqlUsuarioex->execute();
                          $resultadoex = $sqlUsuarioex->fetchAll();
                          
                           

                          for($k=0; $k<count($resultadoex); $k++)

                          { 
                            

                            ?>
                              
                              <option value="<?php echo $resultadoex[$k]["EXF_CODIGO"];?>" <?php if ($resultadoept[$j]["FK_EXERCICIOS_FISICOS_EXF_CODIGO"]==$resultadoex[$k]["EXF_CODIGO"]){echo "selected";}?>><?php echo $resultadoex[$k]["EXF_NOME"];?></option>

                            <?php
                              }
                            ?>
                            </select>
                      <label for="recipient-name" class="col-form-label">Número de repetições:</label>
                      <input type="text" class="form-control" id="ept_nr" name="ept_nr" value="<?php echo $resultadoept[$j]['EPT_PGT_REPETICOES']?>">
                      <label for="recipient-name" class="col-form-label">Intervalo:</label>
                      <input type="text" class="form-control" id="ept_intervalo" name="ept_intervalo" value="<?php echo $resultadoept[$j]['EPT_INTERVALO']?>">
                      <label for="recipient-name" class="col-form-label">Carga/Peso:</label>
                      <input type="text" class="form-control" id="ept_cp" name="ept_cp" value="<?php echo $resultadoept[$j]['EPT_CARGA_PESO']?>">
                      <input type="hidden" class="form-control" id="ept_id" name="ept_id" value="<?php echo $resultadoept[$j]['EPT_CODIGO']?>">
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Salvar</button>
                     </div>
                  </form>           
              </div>
            </div>
          </div>


            <!-- EXCLUIR EPT -->


                   <div class="modal fade" id="modalexcluirept<?php echo $resultadoept[$j]['EPT_CODIGO']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="\PDS - Teste\views\modules\Ferramentas_Esportivas\exerciciopt_excluir.php" method="POST">
                        <div class="modal-body">
                          Tem certeza que deseja que excluir o exercício do programa de treinamento?
                          <input type="hidden" class="form-control" id="ept_id" name="ept_id" value="<?php echo $resultadoept[$j]['EPT_CODIGO'];?>">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Ecluir</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>

       <?php

          }

          echo ("</table>");
          echo (" </div>  </div>");

            
        }

            ?>


        
    </div>
    
    </section>  

           

          <!-- NOVO PT -->

          <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Novo Programa de Treinamento</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="\PDS - Teste\views\modules\Ferramentas_Esportivas\programa_treinamento_inserir.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nome do programa de treinamento:</label>
                      <input type="text" class="form-control" id="pt_nome" name="pt_nome">
                      <label for="recipient-name" class="col-form-label">Dificuldade:</label>
                      <input type="text" class="form-control" id="pt_dificuldade" name="pt_dificuldade">
                    </div>
                     </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Salvar</button>
                      </div>
                       </form>
              </div>
            </div>
          </div>


    <footer class="footer bg-dark text-white">
        <div class="container center ">
            <div class="row justify-content-center ">
                <span>© 2018 - Todos os Direitos Reservados - Mais Saúde São João</span>
                <br>
                <span>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo - Campus São João da Boa Vista</a></span>
            </div>
        </div>
    </footer>
</body>
</html>