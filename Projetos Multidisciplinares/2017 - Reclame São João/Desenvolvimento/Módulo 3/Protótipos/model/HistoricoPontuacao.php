<?php
class HistoricoPontuacao{
	private $id;
	private $fkid;
	private $DataHora;
	private $Pontuacao;

	public function __construct()
    {

    }

	public function getId() {
        return $this->id;
    }

	public function setId($id) {
        $this->id = $id;
    }
		public function getFkid() {
	        return $this->fkid;
	    }

		public function setFki($fkid) {
	        $this->fkid = $fkid;
	    }

	public function getDataHora() {
        return $this->DataHora;
    }

	public function setDataHora($DataHora) {
        $this->DataHora = $DataHora;
    }

	public function getPontuacao() {
        return $this->Pontuacao;
    }

	public function setPontuacao($Pontuacao) {
        $this->Pontuacao = $Pontuacao;
    }
}
?>
