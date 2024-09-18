<?php
    namespace App\Model;
    
    class ConsultaPresencialModel{

        private $COP_RETORNO;
        private $COP_DATA_RETORNO;
        private $COP_DESCRICAO;
        private $COP_ID;
        private $COP_DATA_ATEDIMENTO;
        private $COP_HORA_ATENDIMENTO;
        private $FK_PACIENTES_PAC_ID;
        private $COP_LOCAL_CONSULTA_DIRECIONADA;
        private $COP_NIVEL_PRIORIDADE;
        private $FK_MEDICOS_MED_ID;
        private $FK_CONSULTAS_ONLINE_CTO_ID;
        private $PM_ID;
        
        
        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }
    }