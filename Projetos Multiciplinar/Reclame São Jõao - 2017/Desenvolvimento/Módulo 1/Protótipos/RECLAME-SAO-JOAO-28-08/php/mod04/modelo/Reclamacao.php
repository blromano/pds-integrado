<?php
class Reclamacoes{
	private $Fkid1;
	private $Fkid2;
	private $id;
	private $PontuacaoReclamacao;
	private $DataReclamacao;
	private $ConteudoReclamacao;

	public function __construct()
    {

    }

	public function getId() {
        return $this->id;
    }

	public function setId($id) {
        $this->id = $id;
    }
		public function getFkid1() {
	        return $this->Fkid1;
	    }

		public function setFkId1($Fkid1) {
	        $this->Fkid1 = $Fkid1;
	    }

			public function getFkid2() {
		        return $this->Fkid2;
		    }

			public function setFkId2($Fkid2) {
		        $this->Fkid2 = $Fkid2;
		    }
	public function getPontuacaoReclamacao() {
        return $this->PontuacaoReclamacao;
    }

	public function setPontuacaoReclamacao($PontuacaoReclamacao) {
        $this->PontuacaoReclamacao = $PontuacaoReclamacao;
    }
	public function getDataReclamacao() {
        return $this->DataReclamacao;
    }

	public function setDataReclamacao($DataReclamacao) {
        $this->DataReclamacao = $DataReclamacao;
    }
	public function getConteudoReclamacao() {
        return $this->ConteudoReclamacao;
    }

	public function setConteudoReclamacao($ConteudoReclamacao) {
        $this->id = $ConteudoReclamacaoConteudoReclamacao;
    }
}
?>
