<?php

class PESOS_ALTURAS {

    private $PEA_DATA_HORA_CADASTRO;
    private $PEA_PESO;
    private $PEA_ALTURA;
    private $PEA_CODIGO;
    private $FK_USUARIOS_USU_CODIGO;
    
    function getPEA_DATA_HORA_CADASTRO() {
        return $this->PEA_DATA_HORA_CADASTRO;
    }

    function getPEA_PESO() {
        return $this->PEA_PESO;
    }

    function getPEA_ALTURA() {
        return $this->PEA_ALTURA;
    }

    function getPEA_CODIGO() {
        return $this->PEA_CODIGO;
    }

    function getFK_USUARIOS_USU_CODIGO() {
        return $this->FK_USUARIOS_USU_CODIGO;
    }

    function setPEA_DATA_HORA_CADASTRO($PEA_DATA_HORA_CADASTRO) {
        $this->PEA_DATA_HORA_CADASTRO = $PEA_DATA_HORA_CADASTRO;
    }

    function setPEA_PESO($PEA_PESO) {
        $this->PEA_PESO = $PEA_PESO;
    }

    function setPEA_ALTURA($PEA_ALTURA) {
        $this->PEA_ALTURA = $PEA_ALTURA;
    }

    function setPEA_CODIGO($PEA_CODIGO) {
        $this->PEA_CODIGO = $PEA_CODIGO;
    }

    function setFK_USUARIOS_USU_CODIGO($FK_USUARIOS_USU_CODIGO) {
        $this->FK_USUARIOS_USU_CODIGO = $FK_USUARIOS_USU_CODIGO;
    }



}
?>