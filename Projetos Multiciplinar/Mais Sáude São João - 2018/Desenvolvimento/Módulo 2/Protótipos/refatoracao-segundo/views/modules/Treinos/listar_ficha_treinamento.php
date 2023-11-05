<?php session_start(); ?>
<!DOCTYPE html>
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
          <?php
           if(isset($_SESSION['listar_ficha_treinamento']))
           {    
                $resultado = $_SESSION['listar_ficha_treinamento'];
           }
           else
           {
            /*Utilizar include da página do controller para resgatar o $resultado e utilizar ele na estrutura HTML, dentro da página view :D*/           
                include './controllers/modules/Treinos/listar_fichas_treinamento_usuario.php';
           }
           
            ?>  
        <div class="container">
		<br><br>
            <h3 class="text-center"><?php echo 'Fichas de Treinamentos';?></h3>
           <br>
           
                <div  class="">
                    <form class="text-right" method = "post" action = "./controllers/modules/Treinos/pesquisar_fichas_treinamento_usuario.php">
                        <div class="form-group">
                            <input type="text" class="form" name = "nomepesquisado">
                            <input type="submit" value="Pesquisar" class="btn btn-primary btn-sm">
                       
                            <a href="#.php">
                                <button type="button" class="btn btn-success btn-sm">
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
                            <th class="col-sm-1"></th>
                            <th class="col-sm-2">Data de Início</th>
                            <th class="col-sm-2">Nome da Atividade</th>
                            <th class="col-sm-2">Data de Término </th>
                            <th class="col-sm-2">Ultima Atualização</th>
                            <th class="col-sm-3"></th>
                            
							
                        </tr>
                    </thead>
               <?php
                    for($i=0;$i<count($resultado);$i++){
                        //DEIXANDO A DATA PADRAO DIA MES ANO
                        $date = new DateTime($resultado[$i]["FTR_DATA_INICIO"]);
                       $resultado[$i]["FTR_DATA_INICIO"]= $date->format('d-m-Y');
                        
                        $date2 = new DateTime($resultado[$i]["FTR_DATA_TERMINO"]);
                        $resultado[$i]["FTR_DATA_TERMINO"] = $date2->format('d-m-Y'); 
                        
                        $date3 = new DateTime($resultado[$i]["FTR_DATA_ATUALIZACAO"]);
                        $resultado[$i]["FTR_DATA_ATUALIZACAO"] = $date3->format('d-m-Y');
                ?>    
                    <tbody>
                        <tr  class="row">
                            <th class="col-sm-1"><?php echo $resultado[$i]["FTR_CODIGO"];?></th>
                            <td  class="col-sm-2"><?php echo $resultado[$i]["FTR_DATA_INICIO"]?></td>
                            <td  class="col-sm-2"><?php echo $resultado[$i]["FTR_NOME"]?></td>  
                            <td  class="col-sm-2"><?php echo $resultado[$i]["FTR_DATA_TERMINO"]?></td> 
                            <td  class="col-sm-2"><?php echo $resultado[$i]["FTR_DATA_ATUALIZACAO"]?></td>
                            <td  class="col-sm-3">
                                <a href="perfilusuario.php">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Exibir dados
                                    </button>
                                </a>
                                    <form class="d-inline" action="?mod=treinos&sub=enviar_email" method="post">
                                    <input type="hidden" name="idficha" value="<?=$resultado[$i]["FTR_CODIGO"]?>">
                                    <input type="hidden" name="idusuario" value="<?=$resultado[$i]["FK_USUARIOS_USU_CODIGO"]?>">
                                    <button type="submit" class="btn btn-primary btn-sm">Enviar por e-mail</button>  

                                    </form>

                            </td> 
                        </tr> 
                    </tbody> 
               
                <?php } unset($_SESSION['listar_ficha_treinamento']);?>  
                </table>          
            </div> 
             
            <!--Mostra a mensagem de succeso ou falha do envio de email-->

        </div>
     </section>
    </body>
</html>