<?php
class alteracaoDeStatus{

	private $id;
	private $dataHoraAlteracao;
	private $justificativa;
	private $statusAlterado;
	private $pcdId;
	private $usuarioId;



	public function __construct($id, $dataHoraAlteracao, $justificativa, $statusAlterado, $pcdId, $usuarioId){
		$this->id = $id;
		$this->dataHoraAlteracao = $dataHoraAlteracao;
		$this->justificativa = $justificativa;
		$this->statusAlterado = $statusAlterado;
		$this->pcdId = $pcdId;
    $this->usuarioId = $usuarioId;

	}

	public function getId(){
        return $this->id;
  }

  public function setId($id){
        $this->id = $id;
        return $this;
  }

	public function getDataHoraAlteracao(){
					return $this->dataHoraAlteracao;
  }

  public function setDataHoraAlteracao($dataHoraAlteracao){
  				$this->dataHoraAlteracao = $dataHoraAlteracao;
					return $this;
  }

	public function getJustificativa(){
					return $this->justificativa;
  }

  public function setJustificativa($justificativa){
  				$this->justificativa = $justificativa;
					return $this;
  }

	public function getStatusAlterado(){
					return $this->statusAlterado;
	}

	public function setStatusAlterado($statusAlterado){
					$this->statusAlterado = $statusAlterado;
					return $this;
	}

	public function getPcdId(){
			return $this->pcdId;
	}

	public function setPcdId($pcdId){
			$this->pcdId = $pcdId;
			return $this;
	}

	public function getUsuarioId(){
			return $this->usuarioId;
	}

	public function setUsuarioId($usuarioId){
			$this->usuarioId = $usuarioId;
			return $this;
	}
}
