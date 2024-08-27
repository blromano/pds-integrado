<?php

session_start();
$tipo=3;  //esse é o educador físico, pegar do módulo de usuario os dados da sessão

require_once ("classes/DAO/tipos_exercicios_fisicos_dao.php");

    $obj_tef_dao = new tipos_exercicios_fisicos_DAO();
    $todos_tef = $obj_tef_dao ->listar_todos_tipos();
    
    require_once ("classes/DAO/medidas_exercicios_fisicos_dao.php");
    $obj_uef_dao = new medidas_exercicios_fisicos_DAO();
    $todos_uef = $obj_uef_dao -> listar_todas_medidas();
    
    
    
// canal no youtube para inserir os vídeos de demonstração https://www.youtube.com/channel/UCZMtJCVnc90d51QlSadyNxg //  !!!!!!!!!
    
?>

<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?= JQUERY_PATH ?>" charset="utf-8"></script>
        <script src="<?= POPPER_PATH ?>" charset="utf-8"></script>
        <script src="<?= THEME_JS_PATH ?>" charset="utf-8"></script>
        <script src="<?= ANIMATIONS_PATH ?>" charset="utf-8"></script>
        <script src="scripts/mod06.js" charset="utf-8"></script>
        <link rel="stylesheet" href="<?= THEME_CSS_PATH ?>">
        <link rel="stylesheet" type="text/css" href="views/modules/Ferramentas_Esportivas/css.css">
    </head>
    <body>
        <?php
        $vertical_menu_links = [
            "Nome do link" => "link_de_redirecionamento.html"
        ];
        include(VIEWS_PATH . '/module_base.php');
        ?>
        <section onclick="closeNav()">

            <div class="container">
                <table class="table">
                    <br>
                    <div><h1> Lista de Exercícios físicos </h1> </div>
                    <br/>
                        <div>
                         <?php 
                        if ($tipo==3){
                            ?>
                        
                        <button type="button" id="ba" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Novo Exercício</button>
                            <br/>
                        <?php 
                        
                        }
                        ?>
                        
                        
                        <?php 
                        
                            ?>
                        <form action="controllers/modules/Ferramentas_Esportivas/ctl_busca_exercicios_fisicos.php" method="post">  
                            <input type="text" name="busca"> 
                            <input type="submit" value="Buscar">
                        </form>
                            
                            </div>
                        <?php
                        
                        
                        ?>
                        
                        
                        <?php
                        
                                require_once ("controllers/modules/Ferramentas_Esportivas/listar_exercicios_fisicos.php");
                                              
                        ?>
                        <br>
                        <thead>
                            <tr>
                                
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Demonstração</th>
                                <th>Gif Demonstrativo</th>
                                
                                <?php 
                                if($tipo==3){
                                    ?>
                                    <th></th>
                                    <th></th>
                                <?php
                                
                                }
                                ?>
                                    
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php 
                        foreach ($todos as $resultado){
                            ?>  
                            <tr>
                                <td><?php echo $resultado["EXF_NOME"];?></td>
                                <td><?php echo $resultado["EXF_DESCRICAO"];?></td>
                                <td>
                                   
                                    <iframe width="252" height="141" src="<?php echo $resultado["EXF_DEMONSTRACAO_YOUTUBE"];?>" frameborder="0" allowfullscreen></iframe>
                                </td>
                                <td><img id="gif_imagem" src="<?php echo "assets/images/mod06/". $resultado["EXF_COMO_EXECUTAR_GIF"];?>"></td>
                                
                                <?php 
                                    if($tipo==3){
                                ?>
                                
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3" onclick='javascript:editar_exf(<?php echo $resultado["EXF_CODIGO"];?>,"<?php echo $resultado['EXF_DESCRICAO'];?>","<?php echo $resultado['EXF_NOME'];?>","<?php echo $resultado['EXF_DEMONSTRACAO_YOUTUBE'];?>",<?php echo $resultado['FK_UNIDADES_MEDIDAS_ESPORTIVAS_UNE_CODIGO'];?>,<?php echo $resultado['FK_TIPOS_EXECICIOS_FISICOS_TEF_CODIGO'];?>)'>Editar</button></td>
                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2" onclick='javascript:excluir_exf(<?php echo $resultado["EXF_CODIGO"];?>)'>Excluir</button></td> 
                                
                                <?php
                                
                                }
                                
                                ?>
                                
                            </tr>   
                        <?php 
                        
                                } 
                        ?>
                            
                        </tbody>
                        
                </table>
            </div> 

        </section>  

       
        <!-- INSERIR -->

        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Adicionar Exercício Fisico</h4>
                    </div>
                    <div class="container">
                        <form class="form" method="post" action="controllers/modules/Ferramentas_Esportivas/inserir_exercicios_fisicos.php"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="und">Nome:</label>
                                <input type="text" class="form-control" id="txt_n_exercicio"name="txt_n_exercicio">
                            </div>
                            
                             <div class="form-group">
                                <label for="abr">Descrição:</label>
                                <input type="text" class="form-control" id="txt_d_exercicio" name="txt_d_exercicio">
                            </div>
                            
                             <div class="form-group">
                                <label for="abr">Vídeo demonstrativo no youtube:</label>
                                <input type="url" class="form-control" id="url_vd_exercicio" name="url_vd_exercicio">
                            </div>
                            
                            <div class="form-group">
                                <label for="abr">Tipo:</label>
                                 <select name="tipos_exercicios">
                              <?php foreach ($todos_tef as $resultado){ ?>
                              
                                    <option value="<?php echo $resultado["TEF_CODIGO"];?>"><?php echo $resultado["TEF_NOME"];?></option>
                               
                               <?php } ?>
                               
                               </select>

                            </div>
                            
                             <div class="form-group">
                                <label for="abr">Unidade de medida:</label>
                                 <select name="unidade_exercicio">
                              <?php foreach ($todos_uef as $resultado){ ?>
                              
                                    <option  value="<?php echo $resultado["UNE_CODIGO"];?>"><?php echo $resultado["UNE_NOME"];?></option>
                               
                               <?php } ?>
                               
                               </select>

                            </div>
                            
                            <div class="form-group">
                                    <label for="avatar">GIF de como realizar o exercício físico:</label>
                                    <br>
                                    <input type="file" id="file_gif_exercicio" name="gif_exercicio" accept="image/gif"/>
                            </div>
                            
                            <button type="submit">Salvar</button></a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
         <!-- ATUALIZAR -->

        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Editar Exercício Fisico</h4>
                    </div>
                    <div class="container">
                        <form class="form" method="post" action="./controllers/modules/Ferramentas_Esportivas/atualizar_exercicios_fisicos.php"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="und">Nome:</label>
                                <input type="text" class="form-control" id="txt_n_exercicio" name="txt_n_exercicio">
                            </div> 
                            
                            <input type="hidden" class="form-control" id="txt_c_exercicio" name="txt_c_exercicio">
                            
                            <div class="form-group">
                                <label for="abr">Descrição:</label>
                                <input type="text" class="form-control" id="txt_d_exercicio" name="txt_d_exercicio">
                            </div>
                            
                            <div class="form-group">
                                <label for="abr">Vídeo demonstrativo no youtube:</label>
                                <input type="url" class="form-control" id="url_vd_exercicio" name="url_vd_exercicio">
                            </div>
                            
                             <div class="form-group">
                                    <label for="avatar">GIF demonstrativo do exercício:</label>
                                    <br>
                                    <input type="file" id="file_gif_exercicio" name="file_gif_exercicio" accept="image/gif"/>
                            </div>

                            
                            <div class="form-group">
                                <label for="abr">Tipo:</label>
                                <select name="tipos_exercicios">
                                    <?php foreach ($todos_tef as $resultado) { ?>

                                        <option value="<?php echo $resultado["TEF_CODIGO"]; ?>"><?php echo $resultado["TEF_NOME"]; ?></option>

                                    <?php } ?>

                                </select>
                            </div>
                            
                             <div class="form-group">
                                <label for="abr">Unidade de medida:</label>
                                 <select name="unidade_exercicio">
                              <?php foreach ($todos_uef as $resultado){ ?>
                              
                                    <option value="<?php echo $resultado["UNE_CODIGO"];?>"><?php echo $resultado["UNE_NOME"];?></option>
                               
                               <?php } ?>
                               
                               </select>

                            </div>
                            
                            <button type="submit">Salvar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
         
         
         <!-- EXCLUIR -->

        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Deseja realmente excluir o exercício?</h4>
                    </div>
                    <form class="form" method="post" action="./controllers/modules/Ferramentas_Esportivas/excluir_exercicios_fisicos.php">
                        <input type="hidden" class="form-control" id="txt_c_exercicio" name="txt_c_exercicio">
                        
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-danger"> Excluir</button>
                           <button type="button" class="btn btn-primary" data-dismiss="modal"> Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

        <!-- FOOTER -->

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