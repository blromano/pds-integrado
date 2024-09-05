<?php
class Produto
{
	
	private $PDT_ID;
	private $PDT_NOME;
	private $PDT_DESCRICAO_PRODUTO;
	private $EST_ID;
	private $TRP_ID;
	
	function __construct() 
        {
            
        }
 
        function getPDT_ID() 
        {
            return $this->PDT_ID;
        }

        function getPDT_NOME() 
        {
            return $this->PDT_NOME;
        }

        function getPDT_DESCRICAO_PRODUTO() 
        {
            return $this->PDT_DESCRICAO_PRODUTO;
        }
		
		function getEST_ID() 
        {
            return $this->EST_ID;
        }
		
		function getTRP_ID() 
        {
            return $this->TRP_ID;
        }

        function setPDT_ID($PDT_ID) 
        {
            $this->PDT_ID = $PDT_ID;
        }

        function setPDT_NOME($PDT_NOME) 
        {
            $this->PDT_NOME = $PDT_NOME;
        }

        function setPDT_DESCRICAO_PRODUTO($PDT_DESCRICAO_PRODUTO) 
        {
            $this->PDT_DESCRICAO_PRODUTO = $PDT_DESCRICAO_PRODUTO;
        }
		
		function setEST_ID($EST_ID) 
        {
            $this->EST_ID = $EST_ID;
        }
		
		function setTRP_ID($TRP_ID) 
        {
            $this->TRP_ID = $TRP_ID;
        }
}
  
?>

