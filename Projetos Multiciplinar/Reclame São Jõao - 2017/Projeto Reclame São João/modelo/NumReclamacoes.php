<?php
class NumReclamacoes
{
	private $date;
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
    
    

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
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

    public function jsonSerializeTotais() {
        return
        array(
            //"REC_ID" => "$this->id",
            "DATE" => strtotime($this->date),
            //"RER_STATUS_RESOLVIDO" => "$this->solucao",
            //"REC_APROVADO" => "$this->aprovado",
            //"REC_TITULO_RECLAMACAO" => "$this->titulo",
            //"REC_NOTA" => "$this->nota"
            "NUM" => "$this->reclamacoesTotais"
            );
    }
}

?>

