<?php

namespace App\Model;

class SolicAgendOnlineModel {

    private $SOL_STATUS;
    private $SOL_HORARIO;
    private $SOL_DATA;
    private $SOL_ID;
    private $FK_SECRETARIAS_SEC_ID;
    private $FK_ESPECIALIDADES_ESP_ID;
    private $FK_PACIENTES_PAC_ID;
    private $SOL_JUSTIFICATIVARECUSAO;
    private $FK_MEDICOS_MED_ID;
   
    

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    } 

}
