<?php

namespace App\Model;

class EspecialidadesMedicosModel {

    private $FK_ESPECIALIDADES_ESP_ID;
    private $FK_MEDICOS_MED_ID;
    private $EPM_ID;


    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }        
}
?>