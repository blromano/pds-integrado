<?php

include '../../../../controle/TiposProdutoseServicoDAO.php';
include '../../../../modelo/TiposProdutoseServico.php';

$TiposProdutoseServicoDAO = new TiposProdutoseServicoDAO();
$TiposProdutoseServico = new TiposProdutoseServico();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verifica_nome = $TiposProdutoseServicoDAO->pesquisar_igual($_POST['nomeup']);

        if($verifica_nome > 0){ 
            echo "<script>alert('Categoria já existente!')</script> <script>window.location='../../../index.php?pagina=11';</script>";
           }
           else{
               $TiposProdutoseServico->setId($_POST['idup']);
               $TiposProdutoseServico->setDescricao($_POST['nomeup']);
               $TiposProdutoseServicoDAO->editar($TiposProdutoseServico);
               header("location: ../../../index.php?pagina=11");
            }
                        
                        
};

