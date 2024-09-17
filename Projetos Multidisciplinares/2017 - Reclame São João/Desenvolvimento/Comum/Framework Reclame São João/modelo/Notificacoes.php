<?php
class Notificacoes
{
	
	private $NOT_ID;
	private $NOT_NOME;
	private $NOT_TIPO_NOTIFICACAO;
	private $NOT_VISUALIZADA;
	private $NOT_ID_CONSUMIDORES;
	private $NOT_ID_ADM;
	private $NOT_ID_RECLAMACAO;
	private $NOT_ID_ESTABELECIMENTO;
	private $NOT_ID_DENUNCIAS_COSUMIDORES;
	private $NOT_DATA_EVENTO;
	private $NOT_ID_REUNIAO_AGENDADA;
	
	function __construct() 
	{
		
	}

	public function getNOT_ID() {
        return $this->NOT_ID;
    }
	
	public function setNOT_ID($NOT_ID) {
        $this->NOT_ID = $NOT_ID;
    }
	
	public function getNOT_NOME() {
        return $this->NOT_NOME;
    }
	
	public function setNOT_NOME($NOT_NOME) {
        $this->NOT_NOME = $NOT_NOME;
    }
	
	public function getNOT_TIPO_NOTIFICACAO() {
        return $this->NOT_TIPO_NOTIFICACAO;
    }
	
	public function setNOT_TIPO_NOTIFICACAO($NOT_TIPO_NOTIFICACAO) {
        $this->NOT_TIPO_NOTIFICACAO = $NOT_TIPO_NOTIFICACAO;
    }
	
	public function getNOT_VISUALIZADA() {
        return $this->NOT_VISUALIZADA;
    }
	
	public function setNOT_VISUALIZADA($NOT_VISUALIZADA) {
        $this->NOT_VISUALIZADA = $NOT_VISUALIZADA;
    }
	
	public function getNOT_ID_CONSUMIDORES() {
        return $this->NOT_ID_CONSUMIDORES;
    }
	
	public function setNOT_ID_CONSUMIDORES($NOT_ID_CONSUMIDORES) {
        $this->NOT_ID_CONSUMIDORES = $NOT_ID_CONSUMIDORES;
    }
	
	public function getNOT_ID_ADM() {
        return $this->NOT_ID_ADM;
    }
	
	public function setNOT_ID_ADM($NOT_ID_ADM) {
        $this->NOT_ID_ADM = $NOT_ID_ADM;
    }
	
	public function getNOT_ID_RECLAMACAO() {
        return $this->NOT_ID_RECLAMACAO;
    }
	
	public function setNOT_ID_RECLAMACAO($NOT_ID_RECLAMACAO) {
        $this->NOT_ID_RECLAMACAO = $NOT_ID_RECLAMACAO;
    }
	
	public function getNOT_ID_ESTABELECIMENTO() {
        return $this->NOT_ID_ESTABELECIMENTO;
    }
	
	public function setNOT_ID_ESTABELECIMENTO($NOT_ID_ESTABELECIMENTO) {
        $this->NOT_ID_ESTABELECIMENTO = $NOT_ID_ESTABELECIMENTO;
    }
	
	public function getNOT_ID_DENUNCIAS_COSUMIDORES() {
        return $this->NOT_ID_DENUNCIAS_COSUMIDORES;
    }
	
	public function setNOT_ID_DENUNCIAS_COSUMIDORES($NOT_ID_DENUNCIAS_COSUMIDORES) 
	{
        $this->NOT_ID_DENUNCIAS_COSUMIDORES = $NOT_ID_DENUNCIAS_COSUMIDORES;
    }
	
	public function getNOT_DATA_EVENTO() {
        return $this->NOT_DATA_EVENTO;
    }
	
	public function setNOT_DATA_EVENTO($NOT_DATA_EVENTO) {
        $this->NOT_DATA_EVENTO = $NOT_DATA_EVENTO;
    }
	
	public function getNOT_ID_REUNIAO_AGENDADA() {
        return $this->NOT_ID_REUNIAO_AGENDADA;
    }
	
	public function setNOT_ID_REUNIAO_AGENDADA($NOT_ID_REUNIAO_AGENDADA) {
        $this->NOT_ID_REUNIAO_AGENDADA = $NOT_ID_REUNIAO_AGENDADA;
    }
}
  
?>

