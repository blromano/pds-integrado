<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Lista de Suplementos</title>
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
	 <link rel="stylesheet" href="custom-css/build/mssj-style.css"> 
         <link rel="stylesheet" type="text/css" href="views/modules/Treinos/mod04.css"> 
    </head>
    <body>

        <div class="container">
            <br/>
            <br/>
            <h3 class="text-center">Lista de Suplementos alimentares</h3>
       
 <?php
           //if(isset($_SESSION['listar_suplemento_alimentar']))
           //{    
           //     $resultado = $_SESSION['listar_suplemento_alimentar'];
           //}
           //else
           {
            /*Utilizar include da página do controller para resgatar o $resultado e utilizar ele na estrutura HTML, dentro da página view :D*/           
                //include './controllers/modules/Treinos/listar_suplemento_alimentar.php';
           }
            
?>   
            <div  class="">
                    <form class="text-right" method = "post" action = "">
                        <div class="form-group">
                            <input type="text" class="form" name = "nomepesquisado">
                            <input type="submit" value="Pesquisar" class="btn btn-primary btn-sm">
                       
                            <a href="#.php">
                                <button type="button" class="btn btn-success btn-sm">
                                    Adicionar suplemento
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
                            <th class="col-sm-4">Nome</th>
                            <th class="col-sm-4">Tipo</th>
                            <th class="col-sm-3"></th>
                        </tr>
                    </thead>
                    <?php
                  //  for($i=0;$i<count($resultado);$i++){
                ?>  
                    <tbody>
                        <tr  class="row">
                            <th class="col-sm-1"><?php //echo $resultado[$i]["SUP_CODIGO"];?></th>
                            <td  class="col-sm-4"><?php //echo $resultado[$i]["SUP_NOME"]?></td>
                            <td  class="col-sm-4"><?php //echo $resultado[$i]["SUP_TIPO"]?></td> 
                            <td  class="col-sm-3">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                        Vizualizar dados
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalEmail">
                                        Excluir
                            </td> 
                        </tr> 
                    </tbody>                  
                </table>               
            </div>               
        
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="nomesuplemento"><?php //echo $resultado[$i]["SUP_CODIGO"];?>Creatina (250g) (Creapure®) - Growth Supplements</h5>
                            <br><br><img class="alinhamentoimgsuplemento" <?php//echo $resultado[$i]["SUP_FOTO"]?> src="http://d38srl572sbiks.cloudfront.net/Custom/Content/Products/98/59/985927_creatina-100g-creapure-growth-supplements_z2_636247412072642000.jpg">
                            <br><br><br><h7><span>Utilização:</span><?php//echo $resultado[$i]["SUP_DESCRICAO"]?> A creatina é um derivado de aminoácidos obtida através da dieta de síntese por nosso 
                                próprio organismo. Ela está presente essencialmente no músculo e auxilia na manutenção dos níveis de 
                                energia durante períodos breves de exercício intenso. Ou seja, sua função é crucial nos treinos com 
                                muito peso na busca pelo ganho de massa. </h7><br><br>
                            <h7><span>Composição:</span> <?php//echo $resultado[$i]["SUP_COMPOSICAO"]?> Creatina</h7><br><br>                           
                  </div>
                </div>
              </div>
		</div>
    </body>
</html>
