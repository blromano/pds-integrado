<?php
class ConsideracaoFinal
{
	
	private $COF_ID;
	private $COF_DESCRICAO;
	private $REC_ID;
	private $COF_STATUS_RESOLVIDO;
	
	function __construct() 
	{
		
	}

	public function getCOF_ID() {
        return $this->COF_ID;
    }
	
	public function setCOF_ID($COF_ID) {
        $this->COF_ID = $COF_ID;
    }
	
	public function getCOF_DESCRICAO() {
        return $this->COF_DESCRICAO;
    }
	
	public function setCOF_DESCRICAO($COF_DESCRICAO) {
        $this->COF_DESCRICAO = $COF_DESCRICAO;
    }
	
	public function getREC_ID() {
        return $this->REC_ID;
    }
	
	public function setREC_ID($REC_ID) {
        $this->REC_ID = $REC_ID;
    }
	
	public function getCOF_STATUS_RESOLVIDO() {
        return $this->COF_STATUS_RESOLVIDO;
    }
	
	public function setCOF_STATUS_RESOLVIDO($COF_STATUS_RESOLVIDO) {
        $this->COF_STATUS_RESOLVIDO = $COF_STATUS_RESOLVIDO;
    }
	
}
  
?>