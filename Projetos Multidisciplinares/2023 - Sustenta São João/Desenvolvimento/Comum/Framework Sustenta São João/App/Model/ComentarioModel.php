<?php
    namespace App\Model; 

    class ComentarioModel{

       private $COM_DATA_HORA;
       private $COM_TEXTO;
       private $COM_ID;
       private $FK_CIDADAOS_USU_ID;
       private $FK_DENUNCIAS_DEN_ID;

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }        
    }
?>