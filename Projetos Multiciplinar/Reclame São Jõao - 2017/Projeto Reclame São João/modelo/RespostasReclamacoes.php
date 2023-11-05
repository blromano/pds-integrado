<?php
class RespostasReclamacoes
{
	
	private $RER_ID;
	private $RER_DATA_HORA;
	private $RER_NOME_EMPRESA; 
	private $RER_AVALIACAO; 
	private $RER_STATUS_APROVADO; 
	private $RER_DESCRICAO; 
	private $RER_STATUS_RESOLVIDO;
	private $REC_ID;
	private $ADM_ID;

	public function __construct()
    {

    }

	public function getRER_ID() {
        return $this->RER_ID;
    }

    public function setRER_ID($RER_ID) {
        $this->RER_ID = $RER_ID;
    }

    public function setRER_DATA_HORA($RER_DATA_HORA)
    {
        $this->RER_DATA_HORA = $RER_DATA_HORA;
    }

    public function getRER_DATA_HORA()
    {
        return $this->RER_DATA_HORA;
    }

    public function setRER_NOME_EMPRESA($RER_NOME_EMPRESA)
    {
        $this->RER_NOME_EMPRESA = $RER_NOME_EMPRESA;
    }

    public function getRER_NOME_EMPRESA()
    {
        return $this->RER_NOME_EMPRESA;
    }
    
    public function setRER_AVALIACAO($RER_AVALIACAO)
    {
    	$this->RER_AVALIACAO = $RER_AVALIACAO;
    }

    public function getRER_AVALIACAO()
    {
    	return $this->RER_AVALIACAO;
    }

    public function getRER_STATUS_APROVADO() {
        return $this->RER_STATUS_APROVADO;
    }

    public function setRER_STATUS_APROVADO($RER_STATUS_APROVADO) {
        $this->RER_STATUS_APROVADO = $RER_STATUS_APROVADO;
    }

    public function getRER_DESCRICAO() {
        return $this->RER_DESCRICAO;
    }

    public function setRER_DESCRICAO($RER_DESCRICAO) {
        $this->RER_DESCRICAO = $RER_DESCRICAO;
    }

    public function getRER_STATUS_RESOLVIDO() {
        return $this->RER_STATUS_RESOLVIDO;
    }

    public function setRER_STATUS_RESOLVIDO($RER_STATUS_RESOLVIDO) {
        $this->RER_STATUS_RESOLVIDO= $RER_STATUS_RESOLVIDO;
    }
	
	public function getREC_ID() {
        return $this->REC_ID;
    }

    public function setREC_ID($REC_ID) {
        $this->REC_ID = $REC_ID;
    }
	
	public function getADM_ID() {
        return $this->ADM_ID;
    }

    public function setADM_ID($ADM_ID) {
        $this->ADM_ID = $ADM_ID;
    }
}