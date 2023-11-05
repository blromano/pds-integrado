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
}

?>

