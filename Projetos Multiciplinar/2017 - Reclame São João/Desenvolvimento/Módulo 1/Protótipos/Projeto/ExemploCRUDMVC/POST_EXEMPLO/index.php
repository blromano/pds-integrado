<!DOCTYPE html>
<?php
include '../controle/PostDAO.php';
$dao = new PostDAO();
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
            <th> ID </th>
            <th> Nome </th>
            <th> Comentário </th>
            <th> Editar </th>
            <th> Excluir </th>            
            </tr>
            <?php foreach($registro as $linha) { ?>
            <tr>
                <td><?php echo $linha['idpost'];?></td>                     
                <td><?php echo $linha['nome'];?></td>                     
                <td><?php echo $linha['comentario'];?></td>                     
                <td><?php echo "<a href='edicaoPost.php?id=".$linha['idpost']."'>Editar</a>"?></td>   
                <td><?php echo "<a href='excluirPOST.php?id=".$linha['idpost']."'>Excluir</a>"?></td>
            </tr>
            <?php } ?>
        </table>
        <?php } ?>
    </body>
</html>
