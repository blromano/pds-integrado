<?php

namespace App\Controller;
use FW\Controller\Action;
use App\Model\ProdutoModel;
use App\DAO\ProdutoDAO;
use Error;

class ProdutoController extends Action{
  
   public function listarEstoque(){
      $title = "Estoque";
      $this->getView()->title = $title;
      $ProdutoDAO = new ProdutoDAO();
      $produtos = $ProdutoDAO->listar();
      $this->getView()->produtos = $produtos;
      $this->render('listarProduto/index', 'dashboard');
   }

   public function viewInserirEstoque(){
      $title = "Inserir Produto no Estoque";
      $this->getView()->title = $title;
      $this->render('InserirProduto/index', 'dashboard');
   }

   public function inserirProduto(){
      $produto = new ProdutoModel();
      $produtoDAO = new ProdutoDAO();
      if(!isset($_POST['PRO_NOME']) || !isset($_POST['PRO_VALOR']) ||!isset($_POST['PRO_QUANTIDADE']) || !isset($_POST['FOR_NOME']) || !isset($_POST['FOR_CNPJ']) || !isset($_POST['FOR_EMAIL']) || !isset($_POST['FOR_TELEFONE'])){
         header('Location: /produto/listarProduto?msg=Erro_no_Inserir');
         die();
      }
      $produto->__set('PRO_VALOR', $_POST['PRO_VALOR']);
      $produto->__set('PRO_NOME', $_POST['PRO_NOME']);
      $produto->__set('PRO_QUANTIDADE', $_POST['PRO_QUANTIDADE']);
      $produto->__set('TPP_NOME', $_POST['TPP_NOME']);
      $produto->__set('FOR_NOME', $_POST['FOR_NOME']);
      $produto->__set('FOR_CNPJ', $_POST['FOR_CNPJ']);
      $produto->__set('FOR_EMAIL', $_POST['FOR_EMAIL']);
      $produto->__set('FOR_TELEFONE', $_POST['FOR_TELEFONE']);
      $produtoDAO->inserir($produto);
      header('Location: /produto/listarProduto?msg=Sucesso');
   }

   public function validaAutenticacao(){}
}

?>