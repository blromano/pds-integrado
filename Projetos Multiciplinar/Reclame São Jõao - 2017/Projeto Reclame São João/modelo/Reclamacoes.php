<?php
class Reclamacoes
{
	
	private $id;
	private $descricao; 
	private $date; 
	private $aprovado; 
	private $titulo; 
	private $nota;
	private $solucao;
    private $reclamacoesSolucionadas;
    private $reclamacoesTotais;
	
	//MOD02 ATRIBUTOS
	private $REC_ID;
	private $REC_TITULO_RECLAMACAO;
	private $REC_DESCRICAO;
	private $REC_APROVADO;
	private $REC_LINK_IMAGEM; 
	private $REC_NOTA_FORMATADA; 
	private $REC_DATA_HORA; 
	private $EST_ID;
	private $CON_ID; 
	
	public function __construct()
    {

    }
	
    public function setReclamacoesSolucionadas($reclamacoesSolucionadas)
    {
        $this->reclamacoesSolucionadas = $reclamacoesSolucionadas;
    }

    public function getReclamacoesSolucionadas()
    {
        return $this->reclamacoesSolucionadas;
    }

    public function setReclamacoesTotais($reclamacoesTotais)
    {
        $this->reclamacoesTotais = $reclamacoesTotais;
    }

    public function getReclamacoesTotais()
    {
        return $this->reclamacoesTotais;
    }
    
    public function setSolucao($solucao)
    {
    	$this->solucao = $solucao;
    }

    public function getSolucao()
    {
    	return $this->solucao;
    }

    public function getId() {
        return $this->id;
    }

    public function setid($id) {
        $this->id = $id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getAprovado() {
        return $this->aprovado;
    }

    public function setAprovado($aprovado) {
        $this->aprovado= $aprovado;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getNota() {
        return $this->nota;
    }

    public function setNota($nota) {
        $this->nota = $nota;
    }

    public function jsonSerialize() {
        return
        array(
            "REC_ID" => "$this->id",
            "REC_DATA_HORA" => "$this->date",
            "REC_APROVADO" => "$this->aprovado",
            "REC_TITULO_RECLAMACAO" => "$this->titulo",
            "REC_NOTA" => "$this->nota"
            );
    }

    public function jsonSerializeSolucionadas() {
		return
		array(
            //"REC_ID" => "$this->id",
            "REC_DATA_HORA" => "$this->date",
            "RER_STATUS_RESOLVIDO" => "$this->solucao",
            //"REC_APROVADO" => "$this->aprovado",
            //"REC_TITULO_RECLAMACAO" => "$this->titulo",
            "REC_NOTA" => "$this->nota"
            );
    }
	
	
	//MOD02 ATRIBUTOS GET E SET
	
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

