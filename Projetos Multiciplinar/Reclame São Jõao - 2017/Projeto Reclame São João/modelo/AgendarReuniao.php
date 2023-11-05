<?php
class AgendarReuniao
{
	
	private $REU_NOME_EVENTO;
	private $REU_REPRESENTANTE;
	private $REU_DATA;
	private $REU_HORARIO_INICIO;
	private $REU_HORARIO_TERMINO;
	private $REU_LOCAL;
	private $REU_DESCRICAO;
	private $EST_ID;
	private $CON_ID;
	
	
	function __construct() 
        {
            
        }
 
        function getREU_NOME_EVENTO() 
        {
            return $this->REU_NOME_EVENTO;
        }

        function getREU_REPRESENTANTE() 
        {
            return $this->REU_REPRESENTANTE;
        }

        function getREU_DATA() 
        {
            return $this->REU_DATA;
        }
		
		function getREU_HORARIO_INICIO() 
        {
            return $this->REU_HORARIO_INICIO;
        }
		
		function getREU_HORARIO_TERMINO() 
        {
            return $this->REU_HORARIO_TERMINO;
        }
		
		function getREU_LOCAL() 
        {
            return $this->REU_LOCAL;
        }
		
		function getREU_DESCRICAO() 
        {
            return $this->REU_DESCRICAO;
        }
		
		function getEST_ID() 
        {
            return $this->EST_ID;
        }
		
		function getCON_ID() 
        {
            return $this->CON_ID;
        }
		
		
		

        function setREU_NOME_EVENTO($REU_NOME_EVENTO) 
        {
            $this->REU_NOME_EVENTO = $REU_NOME_EVENTO;
        }

        function setREU_REPRESENTANTE($REU_REPRESENTANTE) 
        {
            $this->REU_REPRESENTANTE = $REU_REPRESENTANTE;
        }

        function setREU_DATA($REU_DATA) 
        {
            $this->REU_DATA = $REU_DATA;
        }
		
		function setREU_HORARIO_INICIO($REU_HORARIO_INICIO) 
        {
            $this->REU_HORARIO_INICIO = $REU_HORARIO_INICIO;
        }
		
		function setREU_HORARIO_TERMINO($REU_HORARIO_TERMINO) 
        {
            $this->REU_HORARIO_TERMINO = $REU_HORARIO_TERMINO;
        }
		
		function setREU_LOCAL($REU_LOCAL) 
        {
            $this->REU_LOCAL = $REU_LOCAL;
        }
		
		function setREU_DESCRICAO($REU_DESCRICAO) 
        {
            $this->REU_DESCRICAO = $REU_DESCRICAO;
        }
		
		function setEST_ID($EST_ID) 
        {
            $this->EST_ID = $EST_ID;
        }
		
		function setCON_ID($CON_ID) 
        {
            $this->CON_ID = $CON_ID;
        }
}
  
?>

