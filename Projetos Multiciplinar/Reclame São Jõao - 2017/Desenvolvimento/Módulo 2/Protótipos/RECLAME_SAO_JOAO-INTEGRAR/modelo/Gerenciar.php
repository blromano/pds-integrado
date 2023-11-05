<?php
class Reclamacao
{

	private $REC_DESCRICAO;
	private $REC_ID;
	private $REC_TITULO_RECLAMACAO;
	private $REC_APROVADO;
	private $REC_LINK_IMAGEM; 
	private $REC_NOTA_FORMATADA; 
	private $REC_DATA_HORA; 
	private $QUANT_CHECKBOX; 
	private $NOME_CHECKBOX;
	private $ADM_ID; 
	private $EST_ID;
	private $CON_ID; 
	
	public function __construct()
    {
        
    }
		
	public function getREC_ID() {
        return $this->REC_ID;
    }
	
	public function setREC_ID($REC_ID) {
        $this->REC_ID = $REC_ID;
    }
	
		public function getREC_TITULO_RECLAMACAO() {
        return $this->REC_TITULO_RECLAMACAO;
    }
	
	public function setREC_TITULO_RECLAMACAO($REC_TITULO_RECLAMACAO) {
        $this->REC_TITULO_RECLAMACAO = $REC_TITULO_RECLAMACAO;
    }
	
		public function getREC_DESCRICAO() {
        return $this->REC_DESCRICAO;
    }
	
	public function setREC_DESCRICAO($REC_DESCRICAO) {
        $this->REC_DESCRICAO = $REC_DESCRICAO;
    }

		public function getREC_DATA_HORA() {
        return $this->REC_DATA_HORA;
    }
	
	public function setREC_DATA_HORA($REC_DATA_HORA) {
        $this->REC_DATA_HORA = $REC_DATA_HORA;
    }
	
	public function getREC_APROVADO() {
        return $this->REC_APROVADO;
    }
	
	public function setREC_APROVADO($REC_APROVADO) {
        $this->REC_APROVADO = $REC_APROVADO;
    }
	
	public function getREC_LINK_IMAGEM() {
        return $this->REC_LINK_IMAGEM;
    }
	
	public function setREC_LINK_IMAGEM($REC_LINK_IMAGEM) {
        $this->REC_LINK_IMAGEM = $REC_LINK_IMAGEM;
    }
	
	public function getREC_NOTA_FORMATADA() {
        return $this->REC_NOTA_FORMATADA;
    }
	
	public function setREC_NOTA_FORMATADA($REC_NOTA_FORMATADA) {
        $this->REC_NOTA_FORMATADA = $REC_NOTA_FORMATADA;
    }
	
	public function getQUANT_CHECKBOX() {
        return $this->QUANT_CHECKBOX;
    }
	
	public function setQUANT_CHECKBOX($QUANT_CHECKBOX) {
        $this->QUANT_CHECKBOX = $QUANT_CHECKBOX;
    }
	
	public function getNOME_CHECKBOX() {
        return $this->NOME_CHECKBOX;
    }
	
	public function setNOME_CHECKBOX($NOME_CHECKBOX) {
        $this->NOME_CHECKBOX = $NOME_CHECKBOX;
    }
	
	public function getADM_ID() {
        return $this->ADM_ID;
    }
	
	public function setADM_ID($ADM_ID) {
        $this->ADM_ID = $ADM_ID;
    }
	
	public function getEST_ID() {
        return $this->EST_ID;
    }
	
	public function setEST_ID($EST_ID) {
        $this->EST_ID = $EST_ID;
    }
	
	public function getCON_ID() {
        return $this->CON_ID;
    }
	
	public function setCON_ID($CON_ID) {
        $this->CON_ID = $CON_ID;
    }
	
}
  
?>

