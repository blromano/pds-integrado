<?php

class usuarios {
    private $usu_codigo;
    private $usu_nome;
    
    function __construct() {
        
    }
    function getUsu_codigo() {
        return $this->usu_codigo;
    }

    function getUsu_nome() {
        return $this->usu_nome;
    }

    function setUsu_codigo($usu_codigo) {
        $this->usu_codigo = $usu_codigo;
    }

    function setUsu_nome($usu_nome) {
        $this->usu_nome = $usu_nome;
    }



}
