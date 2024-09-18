<!DOCTYPE html>
<?php
include '../control/EstabelecimentosDAO.php';
$dao = new EstabelecimentosDAO();
$registro = $dao->listarTodos();

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="cadastrarPost.php" method="POST">
            Nome: 
            <input type="text" name="nome"/> <br/>
            Comentário:
            <input type="text" name="comentario"/> <br/>
             
            <input type="submit" name="Enviar" value="Enviar"/> 
        </form>
        
        
        
        <h1> Lista </h1>
        
        <?php
        if (count($registro)<1)
        {
            echo"<br/> Não existem registros"; 
        }
        else 
        {
                   
        ?>
        
        <table border = "2"> 
            <tr>
            <th> EST_ID </th>
            <th> EST_NOME_ESTABELECIMENTO </th>
            <th> EST_DATA_CADASTRO </th>
            <th> EST_PONTUACAO </th>
            <th> TES_ID </th>            
            </tr>
            <?php foreach($registro as $linha) { ?>
            <tr>
                <td><?php echo $linha['EST_ID'];?></td>                     
                <td><?php echo $linha['EST_NOME_ESTABELECIMENTO'];?></td>                     
                <td><?php echo $linha['EST_DATA_CADASTRO'];?></td>                     
                <td><?php echo $linha['EST_PONTUACAO']?></td>   
				<td><?php echo $linha['TES_ID']?></td>  
            </tr>
            <?php } ?>
        </table>
        <?php } ?>
    </body>
</html>
