<?php
class Contato
{
	
	private $CNT_ID;
	private $CNT_TITULO;
	private $CNT_DATA_HORA_ENVIO;
	private $CNT_DESCRICAO;
	private $CNT_DATA_HORA_RESPOSTA;
	private $CNT_ANEXO;
	private $CNT_RESPOSTA_ADM;
	private $CNT_RESPONDIDO;
	private $ADM_ID;
	private $CON_ID;
	private $CNT_NOME;
	private $CNT_EMAIL;

	
	
	public function __construct()
    {
        
    }
		
	public function getCNT_ID() {
        return $this->CNT_ID;
    }
	
	public function setCNT_ID($CNT_ID) {
        $this->CNT_ID = $CNT_ID;
    }
    
	public function getCNT_TITULO() {
        return $this->CNT_TITULO;
    }
	
	public function setCNT_TITULO($CNT_TITULO) {
        $this->CNT_TITULO = $CNT_TITULO;
    }

	public function getCNT_DATA_HORA_ENVIO() {
        return $this->CNT_DATA_HORA_ENVIO;
    }
	
	public function setCNT_DATA_HORA_ENVIO($CNT_DATA_HORA_ENVIO) {
        $this->CNT_DATA_HORA_ENVIO = $CNT_DATA_HORA_ENVIO;
    }
	
	public function getCNT_DESCRICAO() {
        return $this->CNT_DESCRICAO;
    }
	
	public function setCNT_DESCRICAO($CNT_DESCRICAO) {
        $this->CNT_DESCRICAO = $CNT_DESCRICAO;
    }
	
	public function getCNT_DATA_HORA_RESPOSTA() {
        return $this->CNT_DATA_HORA_RESPOSTA;
    }
	
	public function setCNT_DATA_HORA_RESPOSTA($CNT_DATA_HORA_RESPOSTA) {
        $this->CNT_DATA_HORA_RESPOSTA = $CNT_DATA_HORA_RESPOSTA;
    }
	
	public function getCNT_ANEXO() {
        return $this->CNT_ANEXO;
    }
	
	public function setCNT_ANEXO($CNT_ANEXO) {
        $this->CNT_ANEXO = $CNT_ANEXO;
    }
	
	public function getCNT_RESPOSTA_ADM () {
        return $this->CNT_RESPOSTA_ADM ;
    }
	
	public function setCNT_RESPOSTA_ADM ($CNT_RESPOSTA_ADM) {
        $this->CNT_RESPOSTA_ADM  = $CNT_RESPOSTA_ADM;
    }
	
	public function getADM_ID () {
        return $this->ADM_ID;
    }
	
	public function setADM_ID ($ADM_ID) {
        $this->ADM_ID  = $ADM_ID;
    }
	
	public function getCON_ID () {
        return $this->CON_ID;
    }
	
	public function setCON_ID ($CON_ID) {
        $this->CON_ID = $CON_ID;
    }
	
	public function getCNT_NOME() {
        return $this->CNT_NOME;
    }
	
	public function setCNT_NOME($CNT_NOME) {
        $this->CNT_NOME = $CNT_NOME;
    }
	
	public function getCNT_EMAIL() {
        return $this->CNT_EMAIL;
    }
	
	public function setCNT_EMAIL($CNT_EMAIL) {
        $this->CNT_EMAIL = $CNT_EMAIL;
    }
	
	public function getCNT_RESPONDIDO() {
        return $this->CNT_RESPONDIDO;
    }
	
	public function setCNT_RESPONDIDO($CNT_RESPONDIDO) {
        $this->CNT_RESPONDIDO = $CNT_RESPONDIDO;
    }
}
  
?>

