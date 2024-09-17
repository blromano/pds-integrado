<?php

include '../../controle/TiposEstabelecimentosDAO.php';
include '../../modelo/TiposEstabelecimentos.php';

$TiposEstabelecimentosDAO = new TiposEstabelecimentosDAO();
$TiposEstabelecimentos = new TiposEstabelecimentos();
$comparaexistente = new TiposEstabelecimentos();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $comparaexistente-> setCategoria($_POST['nomeadd']);
    $verifica_nome = $TiposEstabelecimentosDAO->pesquisar_igual($_POST['nomeadd']);
    
    if(empty($_POST['nomeadd'])){
        echo "<script>alert('campo nome em branco')</script> <script>window.location='../../../php/mod05/index.php?pagina=10';</script>";
        }
        if($verifica_nome > 0){ 
            echo "<script>alert('Nome inserido ja conten no banco')</script> <script>window.location='../../../php/mod05/index.php?pagina=10';</script>";
           }
           else{
                $TiposEstabelecimentos->setCategoria($_POST['nomeadd']);
                $TiposEstabelecimentosDAO->inserir($TiposEstabelecimentos);
                header("location: ../../../php/mod05/index.php?pagina=10");
            }
                        
                        
};

?>