<?php

class ALIMENTOS {

    private $ALI_NOME;
    private $ALI_CALORIAS;
    private $ALI_CODIGO;
    
    function getALI_NOME() {
        return $this->ALI_NOME;
    }

    function getALI_CALORIAS() {
        return $this->ALI_CALORIAS;
    }

    function getALI_CODIGO() {
        return $this->ALI_CODIGO;
    }

    function setALI_NOME($ALI_NOME) {
        $this->ALI_NOME = $ALI_NOME;
    }

    function setALI_CALORIAS($ALI_CALORIAS) {
        $this->ALI_CALORIAS = $ALI_CALORIAS;
    }

    function setALI_CODIGO($ALI_CODIGO) {
        $this->ALI_CODIGO = $ALI_CODIGO;
    }



}
