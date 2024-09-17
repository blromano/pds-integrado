<?php
class NotificacaoReclamacao
{
	
	private $NOT_ID;
	private $NOT_ID_RECLAMACAO;
	private $NOT_NOME;
	private $NOT_DATA_EVENTO;
	private $NOT_STATUS;
	private $NOT_TIPO_NOTIFICACAO;
	private $CON_ID;
	
	function __construct() 
	{
		
	}

	public function getNOT_ID() {
        return $this->NOT_ID;
    }
	
	public function setNOT_ID($NOT_ID) {
        $this->NOT_ID = $NOT_ID;
    }
	
	public function getNOT_ID_RECLAMACAO() {
        return $this->NOT_ID_RECLAMACAO;
    }
	
	public function setNOT_ID_RECLAMACAO($NOT_ID_RECLAMACAO) {
        $this->NOT_ID_RECLAMACAO = $NOT_ID_RECLAMACAO;
    }
	
	public function getNOT_NOME() {
        return $this->NOT_NOME;
    }
	
	public function setNOT_NOME($NOT_NOME) {
        $this->NOT_NOME = $NOT_NOME;
    }
	
	public function getNOT_DATA_EVENTO() {
        return $this->NOT_DATA_EVENTO;
    }
	
	public function setNOT_DATA_EVENTO($NOT_DATA_EVENTO) {
        $this->NOT_DATA_EVENTO = $NOT_DATA_EVENTO;
    }
	
	public function getNOT_STATUS() {
        return $this->NOT_STATUS;
    }
	
	public function setNOT_STATUS($NOT_STATUS) {
        $this->NOT_STATUS = $NOT_STATUS;
    }
	
	public function getNOT_TIPO_NOTIFICACAO() {
        return $this->NOT_TIPO_NOTIFICACAO;
    }
	
	public function setNOT_TIPO_NOTIFICACAO($NOT_TIPO_NOTIFICACAO) {
        $this->NOT_TIPO_NOTIFICACAO = $NOT_TIPO_NOTIFICACAO;
    }
	
	public function getCON_ID() {
        return $this->CON_ID;
    }
	
	public function setCON_ID($CON_ID) {
        $this->CON_ID = $CON_ID;
    }
}
  
?>

