<!DOCTYPE html>
<?php
include 'ConexaoBDD.php';

$sql="Select * From cadastro ";

$resultado= $banco -> prepare ($sql);
$resultado -> execute();

$registro = $resultado -> fetchAll();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="Cadastrar_POSTS.php" method="POST">
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
                <td><?php echo $linha['id'];?></td>                     
                <td><?php echo $linha['nome'];?></td>                     
                <td><?php echo $linha['comentario'];?></td>                     
                <td><?php echo "<a href='Editacao_POSTS.php?id=".$linha['id']."'>Editar</a>"?></td>   
                <td><?php echo "<a href='Excluir_POST.php?id=".$linha['id']."'>Excluir</a>"?></td>
            </tr>
            <?php } ?>
        </table>
        <?php } ?>
    </body>
</html>
