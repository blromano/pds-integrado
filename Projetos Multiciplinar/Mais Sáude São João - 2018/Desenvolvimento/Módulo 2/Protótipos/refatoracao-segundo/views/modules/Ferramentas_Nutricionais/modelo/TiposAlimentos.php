<?php

class TiposAlimentos {

    private $idTipoAlimento;
    private $nome;
   
    public function __construct() {

    }

    public function getidTipoAlimento() {
        return $this->idTipoAlimento;
    }

    public function setidTipoAlimento($idTipoAlimento) {
        $this->idTipoAlimento = $idTipoAlimento;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
}
?>
