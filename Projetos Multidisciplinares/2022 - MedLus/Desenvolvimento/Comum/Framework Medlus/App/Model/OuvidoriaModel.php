<?php

namespace App\Model;

class OuvidoriaModel {

    private $OUV_RECADO;
    private $OUV_SITUACAO;
    private $OUV_MOTIVO;
    private $OUV_ID;
    private $FK_USUARIOS_USU_ID;
   

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }   

}
?>