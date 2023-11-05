<?php

class UnidadesMedidas {

    private $idUnidadeMedida;
    private $nome;
    private $abreviatura;
   
    public function __construct() {

    }
    function getIdUnidadeMedida() {
        return $this->idUnidadeMedida;
    }

    function getNome() {
        return $this->nome;
    }

    function getAbreviatura() {
        return $this->abreviatura;
    }

    function setIdUnidadeMedida($idUnidadeMedida) {
        $this->idUnidadeMedida = $idUnidadeMedida;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setAbreviatura($abreviatura) {
        $this->abreviatura = $abreviatura;
    }




}
?>
