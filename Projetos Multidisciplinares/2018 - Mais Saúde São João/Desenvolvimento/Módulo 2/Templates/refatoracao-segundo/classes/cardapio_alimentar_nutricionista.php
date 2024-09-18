<?php


class cardapio_alimentar_nutricionista {

    private $CAN_CODIGO;
    private $CAN_DATA_CRIADO;
    private $CAN_DATA_INICIO;
    private $CAN_DATA_FIM;
    private $FK_USUARIOS_USU_CODIGO;

    function getFK_USUARIOS_USU_CODIGO() {
        return $this->FK_USUARIOS_USU_CODIGO;
    }

    function setFK_USUARIOS_USU_CODIGO($FK_USUARIOS_USU_CODIGO) {
        $this->FK_USUARIOS_USU_CODIGO = $FK_USUARIOS_USU_CODIGO;
    }

    //put your code here
    function __construct() {
        
    }

    function getCAN_CODIGO() {
        return $this->CAN_CODIGO;
    }

    function getCAN_DATA_CRIADO() {
        return $this->CAN_DATA_CRIADO;
    }

    function getCAN_DATA_INICIO() {
        return $this->CAN_DATA_INICIO;
    }

    function getCAN_DATA_FIM() {
        return $this->CAN_DATA_FIM;
    }

    function setCAN_CODIGO($CAN_CODIGO) {
        $this->CAN_CODIGO = $CAN_CODIGO;
    }

    function setCAN_DATA_CRIACAO($CAN_DATA_CRIADO) {
        $this->CAN_DATA_CRIACAO = $CAN_DATA_CRIADO;
    }

    function setCAN_DATA_INICIO($CAN_DATA_INICIO) {
        $this->CAN_DATA_INICIO = $CAN_DATA_INICIO;
    }

    function setCAN_DATA_FIM($CAN_DATA_FIM) {
        $this->CAN_DATA_FIM = $CAN_DATA_FIM;
    }

}
