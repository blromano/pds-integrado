<?php

include '../../../../controle/TiposEstabelecimentosDAO.php';
include '../../../../modelo/TiposEstabelecimentos.php';

$TiposEstabelecimentosDAO = new TiposEstabelecimentosDAO();
$TiposEstabelecimentos = new TiposEstabelecimentos();
$id = new TiposEstabelecimentos();
$comparaexistente = new TiposEstabelecimentos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $comparaexistente-> setCategoria($_POST['nomeup']);
    $verifica_nome = $TiposEstabelecimentosDAO->pesquisar_igual($_POST['nomeup']);
    
    if(empty($_POST['nomeup'])){
        echo "<script>alert('campo nome em branco')</script> <script>window.location='../../../index.php?pagina=10';</script>";
        }
        if($verifica_nome > 0){ 
            echo "<script>alert('Nome inserido ja conten no banco')</script> <script>window.location='../../../index.php?pagina=10';</script>";
           }
           else{
               $id->setId($_POST['idup']);
                    $TiposEstabelecimentos->setCategoria($_POST['nomeup']);
                    $TiposEstabelecimentosDAO->editar($TiposEstabelecimentos,$id);
                    header("location: ../../../index.php?pagina=10");
            }
                        
                        
};

