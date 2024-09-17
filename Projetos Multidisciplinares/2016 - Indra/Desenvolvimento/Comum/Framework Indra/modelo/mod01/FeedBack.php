<?php

class FeedBack{
	protected $id;
	protected $topico;
	protected $mensagem;
	protected $status;
	protected $idUsuario;
	protected $dataHora;

	public function __construct($topico, $status, $id, $mensagem,  $idUsuario, $dataHora)
	{
		$this->topico = $topico;
		$this->status = $status;
		$this->id = $id;
		$this->mensagem = $mensagem;
		$this->idUsuario = $idUsuario;		
		$this->dataHora = $dataHora;
    }

    public function getId(){
    	return $this->id;
    }
     public function getTopico(){
    	return $this->topico;
    }
     public function getMensagem(){
    	return $this->mensagem;
    }
     public function getStatus(){
    	return $this->status;
    }
     public function getIdUsuario(){
    	return $this->idUsuario;
    }
     public function getDataHora(){
    	return $this->dataHora;
    }
}
?>
