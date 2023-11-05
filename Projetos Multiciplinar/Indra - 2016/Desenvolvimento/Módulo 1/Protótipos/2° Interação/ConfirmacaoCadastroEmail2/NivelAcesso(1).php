<?php

class NivelAcesso {
	private $id;
	private $tipo;


		//acessa o Id do niveis_de_acesso
	public function getId() { 
		return $this->id;
	}

		//acessa o tipo do niveis_de_acesso
	public function getTipo(){
		return $this->tipo;
	}

		//modifica o Id do niveis_de_acesso
	public function setId($id) {
		$this->id = $id;
	}

		//modifica o tipo do niveis_de_acesso
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
}   
