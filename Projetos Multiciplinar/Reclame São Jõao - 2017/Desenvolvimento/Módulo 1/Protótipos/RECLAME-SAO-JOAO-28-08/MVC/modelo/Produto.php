<?php
class Produto
{
	
	private $PRO_ID;
	private $PRO_NOME_PRODUTO;
	private $PRO_DESCRICAO_PRODUTO;
	private $IPO_ID;
	
	function __construct() 
        {
            
        }
 
        function getPRO_ID() 
        {
            return $this->PRO_ID;
        }

        function getPRO_NOME_PRODUTO() 
        {
            return $this->PRO_NOME_PRODUTO;
        }

        function getPRO_DESCRICAO_PRODUTO() 
        {
            return $this->PRO_DESCRICAO_PRODUTO;
        }
		
		function getIPO_ID() 
        {
            return $this->IPO_ID;
        }

        function setPRO_ID($PRO_ID) 
        {
            $this->PRO_ID = $PRO_ID;
        }

        function setPRO_NOME_PRODUTO($PRO_NOME_PRODUTO) 
        {
            $this->PRO_NOME_PRODUTO = $PRO_NOME_PRODUTO;
        }

        function setPRO_DESCRICAO_PRODUTO($PRO_DESCRICAO_PRODUTO) 
        {
            $this->PRO_DESCRICAO_PRODUTO = $PRO_DESCRICAO_PRODUTO;
        }
		
		function setIPO_ID($IPO_ID) 
        {
            $this->IPO_ID = $IPO_ID;
        }
}
  
?>

