<!DOCTYPE html>
<?php
include 'ConexaoBDD.php';

$sql="Select * From post ";

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
        <form action="Login_USU.php" method="POST">
            Nome: 
            <input type="text" name="nome"/> <br/>
            Senha:
            <input type="text" name="senha"/> <br/>
            
             
            <input type="submit" name="entrar" value="Entrar"/> 
            
        </form>
        <form action="Cadastrar_Tela.php" method="POST">
            <input type="submit" name="cadastrar" value="Cadastar"/> 
        </form>
        
        
        
        
    </body>
</html>
