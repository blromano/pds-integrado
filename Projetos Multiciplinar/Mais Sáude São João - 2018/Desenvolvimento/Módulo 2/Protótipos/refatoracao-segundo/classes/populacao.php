<?php

class Populacao {

    private $pop_cod;
    private $pop_sexo;

    function __construct() {
        
    }

    function getPop_cod() {
        return $this->pop_cod;
    }

    function getPop_sexo() {
        return $this->pop_sexo;
    }

    function setPop_cod($pop_cod) {
        $this->pop_cod = $pop_cod;
    }

    function setPop_sexo($pop_sexo) {
        $this->pop_sexo = $pop_sexo;
    }

}
