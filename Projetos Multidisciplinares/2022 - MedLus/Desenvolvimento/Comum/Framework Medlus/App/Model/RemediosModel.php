<?php

namespace App\Model;

class RemediosModel {

    private $REM_ID;
    private $REM_NOME;
    private $REM_DOSAGEM;
    private $REM_CONTRAINDICACAO;
    private $REM_INDICACAO;
    private $REM_OBSERVACOES;
    private $FK_TIPOS_REMEDIOS_TIP_ID;

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }    
}
?>
