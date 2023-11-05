<!DOCTYPE html>
<?php session_start();
	if(isset($_GET["id"])){
	$_SESSION["id"]	=$_GET["id"];}?>
<html lang="pt-br">
    <head>
        <title>Fichas de Treinamento</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
       <link rel="stylesheet" href="custom-css/build/mssj-style.css">     
    </head>
    <body>
     
        <section onclick="closeNav()">
        <div class="container">
        <br><br>
            <h3 class="text-center">Fichas de Treinamentos da Vitoria</h3>
           <br>
                <div  class="">
                    <form class="text-right ">
                        <div class="form-group">
                            <input type="text" class="form" >
                            <input type="button" value="Pesq
                            uisar" class="btn btn-primary btn-sm">
                       
                            <a href="#.php">
                                <button type="button" onclick="window.location.href='?mod=treinos&sub=adicionar_ficha_treinamento'" class="btn btn-success btn-sm">
                                    Adicionar ficha de treinamento
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
                <br><br>
            <div class=" text-center container-fluid">
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr class="row">
                            <th class="col-sm-2"></th>
                            <th class="col-sm-2">Data de Início</th>
                            <th class="col-sm-2">Nome da Atividade</th>
                            <th class="col-sm-2">Data de Término </th>
                            <th class="col-sm-2">Ultima Atualização</th>
                            <th class="col-sm-2"></th>
                            <th class="col-sm-2"></th>
                            
                        </tr>
                    </thead>
               <?php
                    // for($i=0;$i<count($resultado);$i++){
                ?>    
                    <tbody>
                        <tr  class="row">
                           <!-- <th class="col-sm-2"><?php echo $resultado[$i]["FTR_CODIGO"];?></th>
                            <td  class="col-sm-2"><?php echo $resultado[$i]["FTR_DATA_INICIO"]?></td>
                            <td  class="col-sm-2"><?php echo $resultado[$i]["FTR_DESCRICAO_PRINCIPAIS_EXERCICIOS"]?></td>  
                            <td  class="col-sm-2"><?php echo $resultado[$i]["FTR_DATA_TERMINO"]?></td> 
                            <td  class="col-sm-2"><?php echo $resultado[$i]["FTR_DATA_ATUALIZACAO"]?></td> -->
                            <td  class="col-sm-2">
                                <a href="perfilusuario.php">
                                    <button type="button" onclick="window.location.href='?mod=treinos&sub=ficha_treinamento_dados'" class="btn btn-primary btn-sm">
                                        Exibir dados
                                    </button>
                                </a>
                            </td>
                            <td class="col-sm-2">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEmail">
                                        Enviar por e-mail

                                </a>
                            </td> 
                        </tr> 
                    </tbody> 
                </table> 
                            
            </div> 
            <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Preencher Email</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                      
                    </div>
                    <form action="?mod=treinos&sub=EnviarEmail" method="post" class="form-group" enctype="multipart/form-data">
                        <label for="Nome">Nome:</label>
                        <input type="text" name="Nome" size="35" class="form-control"/>
                    </br>
                        <label for="Email">E-mail do usuario:</label>
                        <input type="text" name="Email" size="35"class="form-control" />
                    </br>
                        <label for="Assunto">Assunto:</label>
                        <input type="text" name="Assunto" size="35" class="form-control">
                    </br>
                        <label for="Arquivo">Ficha:</label>
                        <input type="file" name="Arquivo" value="100000" class="form-control">
                    </br>
                        <label for="Mensagem">Mensagem:</label>
                        <textarea name="Mensagem" rows="8" cols="30" class="form-control"></textarea>
                    </br>

                        <input type="submit" name="Enviar" value="Enviar" class="btn btn-primary col-md-4" />
                    </form>
                    <div class="modal-footer">        
                    </div>
                </div>
            </div>    

            <!--Mostra a mensagem de succeso ou falha do envio de email-->

        </div>
     </section>
    </body>
</html>
