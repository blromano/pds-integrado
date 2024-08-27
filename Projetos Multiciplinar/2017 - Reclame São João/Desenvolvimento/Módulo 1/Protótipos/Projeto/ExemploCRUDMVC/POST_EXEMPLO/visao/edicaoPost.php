<?php 
include '../controle/PostDAO.php';

$postDAO = new PostDAO();
$registro = $postDAO->pesquisarPorId($_GET['id']);

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php foreach($registro as $linha) { ?>
        <form action="editarPost.php" method="POST">
            Nome: 
            <input type="text" name="nome" value="<?php echo $linha['nome'];?>"/> <br/>
            Comentário:
            <input type="text" name="comentario"value="<?php echo $linha['comentario'];?>"/> <br/>
            <input type="hidden" name="id"value="<?php echo $linha['idpost'];?>"/> <br/>

            <input type="submit" name="Enviar" value="Editar"/>
            <?php } ?>
        </form>
    </body>
</html>

