<?php
 class RespostaReclamacao{
	 private $id;
   private $Fkid;
	 private $StatusResolvido;
	 private $DataHora;

	 public function __construct()
    {

    }

	public function getId() {
        return $this->id;
    }

	public function setId($id) {
        $this->id = $id;
    }

    public function getFkId() {
          return $this->Fkid;
      }

  	public function setFkId($Fkid) {
          $this->Fkid = $Fkid;
      }

	public function getStatusResolvido() {
        return $this->StatusResolvido;
    }

	public function setStatusResolvido($StatusResolvido) {
        $this->StatusResolvido = $StatusResolvido;
    }
	public function getDataHora() {
        return $this->DataHora;
    }

	public function setDataHora($DataHora) {
        $this->DataHora = $DataHora;
    }
 }

?>
