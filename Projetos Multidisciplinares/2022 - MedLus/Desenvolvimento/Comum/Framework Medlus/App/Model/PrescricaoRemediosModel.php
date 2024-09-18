<?php
    namespace App\Model;
    
    class PrescricaoRemedioModel{

        private $PRR_ID;
        private $PRR_PERIODICIDADE_HORAS;
        private $PRR_PERIODO_DIAS;
        private $FK_REMEDIOS_REM_ID;
        private $FK_PRESCRICOES_MEDICAS_PM_ID;
        
        
        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }
    }