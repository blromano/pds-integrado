<?php 
include 'ConexaoBDD.php';

$sql="Select * From cadastro where id=".$_GET['id'];

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
        <?php foreach($registro as $linha) { ?>
        <form action="Editar_POST.php" method="POST">
            Nome: 
            <input type="text" name="nome" value="<?php echo $linha['nome'];?>"/> <br/>
            Comentário:
            <input type="text" name="comentario"value="<?php echo $linha['comentario'];?>"/> <br/>
            <input type="hidden" name="id"value="<?php echo $linha['id'];?>"/> <br/>

            <input type="submit" name="Enviar" value="Editar"/>
            <?php } ?>
        </form>
    </body>
</html>

