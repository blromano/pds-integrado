<?php
session_start();
include '../../../../controle/TiposProdutoseServicoDAO.php';
include '../../../../modelo/TiposProdutoseServico.php';

$TiposProdutoseServicoDAO = new TiposProdutoseServicoDAO();
$TiposProdutoseServico = new TiposProdutoseServico();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verifica_nome = $TiposProdutoseServicoDAO->pesquisar_igual($_POST['nomeup']);

        if($verifica_nome > 0){
			$_SESSION["Modal"] = ["Produtos/Servi?os","Produto/Servi?o j? existente!"];
			header("location: ../../../../admin.php?pagina=11");
           }
           else{
               $TiposProdutoseServico->setId($_POST['idup']);
               $TiposProdutoseServico->setDescricao($_POST['nomeup']);
               $TiposProdutoseServicoDAO->editar($TiposProdutoseServico);
			   $_SESSION["Modal"] = ["Produtos/Servi?os","Produto/Servi?o alterado com sucesso!"];
			   header("location: ../../../../admin.php?pagina=11");
            }
                        
                        
};

