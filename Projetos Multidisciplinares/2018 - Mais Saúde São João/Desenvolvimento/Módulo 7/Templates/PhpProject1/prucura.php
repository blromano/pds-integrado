<?php
//include 'ConexaoBDD.php';
if(isset($_POST['pesquisar']))
{
    $pesquisar = $_POST['pesquisanome'];
    $banco = "SELECT * FROM pagina1.usuarios where CONCAT(USU_CODIGO,USU_NOME) like '%".$pesquisar."%'";
    $resul = filterTable($banco);
    
}
else{
 $banco = "SELECT * FROM pagina1.usuarios";
 $resul = filterTable($banco);
    
}
function filterTable($banco)
{
    $connect = mysqli_connect("localhost","root","","pagina1");
    $filter = mysqli_query($connect, $banco);
    return $filter;
}


?>
<!DOCTYPE html>
<html lang="pt-Br">
    <head>
	 </head>
    <body>
	<h1 class="display"> Informe o nome do paciente: </h1>  
                
                               <form action="prucura.php" method="post">
                              <div class="form-group">
                                  <input type="text" class="form-control" name="pesquisanome"  placeholder="Nome">
                                </div>
                              
                              <button type="submit" class="btn btn-primary" name="pesquisar">Procurar</button>
                              <table>
                                  <tr>
                                      <th>id</th>
                                      <th>name</th>
                                  </tr>
                                  <?php while($row = mysqli_fetch_array($resul)):?>
                                  
                                  <tr>
                                      <td><?php echo $row['USU_CODIGO'];?></td>
                                      <td><?php echo $row['USU_NOME'];?></td>
                                  </tr>
                                  <?php endwhile;?>
                              </table>
                            </form>
							</body>
</html>
