<?php
    include 'conexao.php';
    $sqlUsuario = $conexao->prepare("SELECT * FROM cadastro");
    $sqlUsuario->execute();
    $resultado = $sqlUsuario->fetchAll();
 
    include 'Listar.php';
    
        echo "<table><tr><th>Data de início</th>";
        echo "<th>Exercícios</th>";
        echo "<th>Dificuldade</th>";
        echo "<th>Última atualização</th>";
        echo "<th>Opção</th></tr>";
    
        for($i=0;$i<count($resultado);$i++)
        {
            echo "<tr><td>".$resultado[$i]["data"]."</td>"; 
            echo "<td>".$resultado[$i]["exercicio"]."</td>";
            echo "<td>".$resultado[$i]["dificuldade"]."</td>";
            echo "<td>".$resultado[$i]["atualizacao"]."</td>";
            echo "<td>".$resultado[$i]["id"] . "<br/><a href='VisualizarFicha.php?id=".$resultado[$i]["id"]."'>Visualizar</a></td></tr>";
        } 
        
        echo "</table>";
?>