<?php
class Estabelecimentos{
	private $id;
	private $NomeEstabelecimento;
	private $DataCadastro;
	private $Pontuacao;
	private $TesID;

	public function __construct()
    {

    }

	public function getId() {
        return $this->id;
    }

	public function setId($id) {
        $this->id = $id;
    }

	public function getNomeEstabelecimento() {
        return $this->NomeEstabelecimento;
    }

	public function setNomeEstabelecimento($NomeEstabelecimento) {
        $this->NomeEstabelecimento = $NomeEstabelecimento;
    }

	public function getDataCadastro() {
        return $this->DataCadastro;
    }

	public function setDataCadastro($DataCadastro) {
        $this->DataCadastro = $DataCadastro;
    }

	public function getPontuacao() {
        return $this->Pontuacao;
    }

	public function setPontuacao($Pontuacao) {
        $this->Pontuacao = $Pontuacao;
    }

		public function getTesID() {
	        return $this->TesID;
	    }

		public function setTesID($TesID) {
	        $this->TesID = $TesID;
	    }
}
?>
