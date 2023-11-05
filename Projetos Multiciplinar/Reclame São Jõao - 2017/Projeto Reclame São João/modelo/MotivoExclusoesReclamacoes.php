<?php
class MotivoExclusoesReclamacoes
{
	
	private $MER_ID;
	private $MER_DATA_HORA;
	private $MER_MOTIVO_EXCLUSAO;
	private $MER_RECLAMACAO_CONSUMIDOR;
	private $CON_ID;
	
	function __construct() 
	{
		
	}

	public function getMER_ID() {
        return $this->MER_ID;
    }
	
	public function setMER_ID($MER_ID) {
        $this->MER_ID = $MER_ID;
    }
	
	public function getMER_DATA_HORA() {
        return $this->MER_DATA_HORA;
    }
	
	public function setMER_DATA_HORA($MER_DATA_HORA) {
        $this->MER_DATA_HORA = $MER_DATA_HORA;
    }
	
	public function getMER_MOTIVO_EXCLUSAO() {
        return $this->MER_MOTIVO_EXCLUSAO;
    }
	
	public function setMER_MOTIVO_EXCLUSAO($MER_MOTIVO_EXCLUSAO) {
        $this->MER_MOTIVO_EXCLUSAO = $MER_MOTIVO_EXCLUSAO;
    }
	
	public function getMER_RECLAMACAO_CONSUMIDOR() {
        return $this->MER_RECLAMACAO_CONSUMIDOR;
    }
	
	public function setMER_RECLAMACAO_CONSUMIDOR($MER_RECLAMACAO_CONSUMIDOR) {
        $this->MER_RECLAMACAO_CONSUMIDOR = $MER_RECLAMACAO_CONSUMIDOR;
    }
	
	public function getCON_ID() {
        return $this->CON_ID;
    }
	
	public function setCON_ID($CON_ID) {
        $this->CON_ID = $CON_ID;
    }
}
  
?>

