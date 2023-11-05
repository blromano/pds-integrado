<?php
class Tipos_Produtos
{
	
	private $IPO_ID;
	private $IPO_DESCRICAO;
	
        
        function __construct()
        {
           
        }

        function getIPO_ID()
        {
            return $this->IPO_ID;
        }

        function getIPO_DESCRICAO()
        {
            return $this->IPO_DESCRICAO;
        }

        function setIPO_ID($IPO_ID) 
        {
            $this->IPO_ID = $IPO_ID;
        }

        function setIPO_DESCRICAO($IPO_DESCRICAO) 
        {
            $this->IPO_DESCRICAO = $IPO_DESCRICAO;
        }


}
  
?>

