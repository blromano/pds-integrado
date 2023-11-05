<?php
class Tipo_Estabelecimentos
{
	
	private $TIP_ID;
	private $TIP_NOME;
	
	function __construct() 
        {
            
        }
        
 
        function getTIP_ID() 
        {
            return $this->TIP_ID;
        }

        function getTIP_NOME()
        {
            return $this->TIP_NOME;
        }

        function setTIP_ID($TIP_ID) 
        {
            $this->TIP_ID = $TIP_ID;
        }

        function setTIP_NOME($TIP_NOME) 
        {
            $this->TIP_NOME = $TIP_NOME;
        }
}
  
?>

