<?php
class DenunciaConsumidor
{
	
	private $DEC_MOTIVO;
	private $DEC_DATA_HORA_DENUNCIA;
	private $DEC_TIPO_DENUNCIA; 
	private $DEC_ID; 
	private $DEC_STATUS_APROVADO; 
	private $DEC_DATA_HORA_APROVACAO; 
	private $EST_ID;
	private $ADM_ID;
	private $CON_ID;

	public function __construct()
    {

    }
	
	public function getDEC_MOTIVO() {
        return $this->DEC_MOTIVO;
    }

    public function setDEC_MOTIVO($DEC_MOTIVO) {
        $this->DEC_MOTIVO = $DEC_MOTIVO;
    }

	public function getDEC_DATA_HORA_DENUNCIA() {
        return $this->DEC_DATA_HORA_DENUNCIA;
    }
	
    public function setDEC_DATA_HORA_DENUNCIA($DEC_DATA_HORA_DENUNCIA)
    {
        $this->DEC_DATA_HORA_DENUNCIA = $DEC_DATA_HORA_DENUNCIA;
    }

    public function setDEC_TIPO_DENUNCIA($DEC_TIPO_DENUNCIA)
    {
        $this->DEC_TIPO_DENUNCIA = $DEC_TIPO_DENUNCIA;
    }

    public function getDEC_TIPO_DENUNCIA()
    {
        return $this->DEC_TIPO_DENUNCIA;
    }
    
    public function setDEC_ID($DEC_ID)
    {
    	$this->DEC_ID = $DEC_ID;
    }

    public function getDEC_ID()
    {
    	return $this->DEC_ID;
    }

    public function getDEC_STATUS_APROVADO() {
        return $this->DEC_STATUS_APROVADO;
    }

    public function setDEC_STATUS_APROVADO($DEC_STATUS_APROVADO) {
        $this->DEC_STATUS_APROVADO = $DEC_STATUS_APROVADO;
    }

    public function getDEC_DATA_HORA_APROVACAO() {
        return $this->DEC_DATA_HORA_APROVACAO;
    }

    public function setDEC_DATA_HORA_APROVACAO($DEC_DATA_HORA_APROVACAO) {
        $this->DEC_DATA_HORA_APROVACAO = $DEC_DATA_HORA_APROVACAO;
    }
	
	public function getEST_ID() {
        return $this->EST_ID;
    }

    public function setEST_ID($EST_ID) {
        $this->EST_ID = $EST_ID;
    }
	
	public function getADM_ID() {
        return $this->ADM_ID;
    }

    public function setADM_ID($ADM_ID) {
        $this->ADM_ID = $ADM_ID;
    }
	
	public function getCON_ID() {
        return $this->CON_ID;
    }

    public function setCON_ID($CON_ID) {
        $this->CON_ID = $CON_ID;
    }
}